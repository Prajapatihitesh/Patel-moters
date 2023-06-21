<?php 
include("fpdf/fpdf.php");
include ("connect.php");
$ESTI_ID = $_GET['PE_Id'];

class Pdf extends Fpdf{
   
   // custom cell 
   function mycell($w,$h,$x,$t){
      $height = $h/3;
      $first = $height+2;
      $second = $height+$height+$height+3;
      $len = strlen($t);
      if ($len>25) {
      $txt=str_split($t,25);
      $this->SetX($x);
      $this->cell($w,$first,$txt[0],'','','');
      $this->SetX($x);
      $this->cell($w,$second,$txt[1],'','','');
      $this->SetX($x);
      $this->cell($w,$h,'','LRTB',0,'C',0);
      }
      else{
      $this->SetX($x);
      $this->cell($w,$h,$t,'LRTB',0,'C',0);
     }
  }

  // header
  function Header(){

    $this->SetX(135);
    $this->SetFont('Arial','',12,'C');
    $this->MultiCell(70,7,"Mob. No. : +919879714061 +919879714061",0,'R',false);

    $this->Image('image/logo.png',5,10,35);

    $this->SetY(15);
    $this->SetFont('Arial','B',35);
    $this->cell(0,20,"PATEL MOTOR",0,0,'C');

    $this->SetY(35);
    $this->SetFont('Arial','',12);
    $this->MultiCell(0,5,'ALL TYPE OF DIESEL & PETROL CAR VEHICLES REPAIRING,
      CITY CLUTCH KIT FITTING ','B','C',false);

    $this->Ln(1);
    $this->MultiCell(0,5,'Plot No. 12-B,Ward 7D,Nr.Rotary Circle,Tagore Road,GANIDHAM(Kutch)370201.
      E-mail : patelmotorsgim@gmail.com ','B','C',false);
    $this->Ln(10);
    $this->user();

    $this->SetFont("Arial","B",9);
    $this->cell(10,10,"NO",1,0,'C');
    $this->cell(50,10,"PARTTICULARS",1,0);

    $this->cell(15,5,"Taxable",'LRT',0,'C');
    $this->cell(8,5,"C",'LRT',0,'C');
    $this->cell(15,5,"CGST",'LRT',0,'C');    
    $this->cell(8,5,"S",'LRT',0,'C');
    $this->cell(15,5,"SGST",'LRT',0,'C');    
    $this->cell(8,5,"I",'LRT',0,'C');
    $this->cell(15,5,"IGST",'LRT',0,'C');
    $this->cell(10,10,"QTY",1,0,'C');
    $this->cell(15,10,"RATE",1,0,'C');
    $this->cell(0,10,"Total",1,0,'C');

    

    $this->SetY(117);
    $this->SetX(70);

    $this->cell(15,5,"amt",'LRB',0,'C');
    $this->cell(8,5,"(%)",'LRB',0,'C');
    $this->cell(15,5,"AMT",'LRB',0,'C');
    $this->cell(8,5,"(%)",'LRB',0,'C');
    $this->cell(15,5,"AMT",'LRB',0,'C'); 
    $this->cell(8,5,"(%)",'LRB',0,'C');
    $this->cell(15,5,"AMT",'LRB',1,'C');    
  }

  // user detail
  function user(){

    $this->SetFont('Arial','U',12,'C');
    $this->cell(0,10,"PERFORM INVOICE",0,1,'C');    
    global $conn, $ESTI_ID;
    $result2 = $conn->query("select * from invoice WHERE INVOICE_NO = '$ESTI_ID'");

    $this->SetFont("Arial","",10);

    while($rst=$result2->fetch_object()){
  
    
    $this->SetY(80); //top to buttom
    $this->cell(190,8,"CUST NAME :- $rst->CUSTOMER_NAME",'LRT',1,);
    $this->cell(190,8,"I/C Name :- $rst->company_name",'LR',1);
    $this->cell(125,8,"VEHICLE NO :- $rst->VEHICLE_NO",'LRT',0);
    $this->cell(65,8,"Invoice No :- $rst->INVOICE_NO",'LRT',1);
    $this->cell(125,8,"MODEL :- $rst->MODEL",'LR',0);
    $this->cell(65,8,"Invoice Date :- $rst->DATE",'LR',1);
    }
  }

  // invoice
  function invoice(){

    global $conn, $ESTI_ID,$sum,$POF,$qut,$total,$PCGST18,$PSGST18,$PIGST18,$PCGST28,$PSGST28,$PIGST28,$LCGST,$LSGST,$r3;

    //parts detail
    $PCGST18=0;
    $PSGST18=0;
    $PIGST18=0;
    $PCGST28=0;
    $PSGST28=0;
    $PIGST28=0;
    $LCGST=0;
    $LSGST=0;
        $result2 = $conn->query("select * from invoce_part WHERE invoice_no = '$ESTI_ID'");
    $rowcount = 1;
    for ($i=0; $i < mysqli_num_rows($result2) ; $i++) {
      $rowcount++;

        $this->SetFont("Arial","",8);
        $rs=$result2->fetch_object();
     
        $result3 = $conn->query("select * from list_of_parts WHERE name = '$rs->PARTTICULARS'");
        $rs1=$result3->fetch_object();

        $x=$this->GetX();
        $this->mycell(10,8,$x,$rs->SR_NO);

        $x=$this->GetX();
        $this->mycell(50,8,$x,$rs->PARTTICULARS);

        $x=$this->GetX();
        $this->mycell(15,8,$x,$rs->RATE);

        
        $x=$this->GetX();
        $this->mycell(8,8,$x,$rs1->CGST."%");
        
        $CGSTA=(($rs->RATE*$rs1->CGST)/100);
        if($rs1->CGST==9){
          $PCGST18 += $CGSTA;
        }else{
          $PCGST28 += $CGSTA;    
        }

        $x=$this->GetX();
        $this->mycell(15,8,$x,$CGSTA);
        
        $x=$this->GetX();
        $this->mycell(8,8,$x,$rs1->SGST."%");
        
        $SGSTA=(($rs->RATE*$rs1->SGST)/100);
        if($rs1->SGST==9){
          $PSGST18 += $SGSTA;
        }else{
          $PSGST28 += $SGSTA;    
        }
        $x=$this->GetX();
        $this->mycell(15,8,$x,$SGSTA);

        $x=$this->GetX();
        $this->mycell(8,8,$x,$rs1->IGST."%");

        $IGSTA=(($rs->RATE*$rs1->IGST)/100);
        if($rs1->IGST==9){
          $PIGST18 += $IGSTA;
        }else{
          $PIGST28 += $IGSTA;    
        }
        $x=$this->GetX();
        $this->mycell(15,8,$x,$IGSTA);

        $x=$this->GetX();
        $this->mycell(10,8,$x,$rs->QTY);

        $sum=($rs->RATE+$CGSTA+$SGSTA+$IGSTA);
        $x=$this->GetX();
        $this->mycell(15,8,$x,$sum);

        $x=$this->GetX();
        $this->mycell(0,8,$x,($sum*$rs->QTY));
        $total=($total+($sum*$rs->QTY));


        $this->ln();


        $qut += $rs->QTY;
    }
    
      // total parts
      $this->SetFont("Arial","B",10);
      $this->cell(10,8,"",1,0);
      $this->cell(50,8,"TOTAL PARTS",1,0,"R");
      $this->cell(15,8,"",1,0);
      $this->cell(8,8,"",1,0);
      $this->cell(15,8,"",1,0);
      $this->cell(8,8,"",1,0);
      $this->cell(15,8,"",1,0);
      $this->cell(8,8,"",1,0);
      $this->cell(15,8,"",1,0);
      $this->cell(10,8,"$qut",1,0,"C");
      $this->cell(15,8,"",1,0);
      $this->cell(0,8,$total,1,1,"C");
    
   
    
    // labor work
    $result2 = $conn->query("select * from invoice_labor WHERE INVOICE_NO = '$ESTI_ID'");
    for ($i=0; $i <mysqli_num_rows($result2); $i++) {
      $rs=$result2->fetch_object() ;
      $rowcount++;
        $r1=$rs->SR_NO; 
        $r2=$rs->PARTTICULARS;
        $r3=$rs->POF;    

        $this->SetFont("Arial","",8);

        $x=$this->GetX();
        $this->mycell(10,8,$x,$r1);
        
        $x=$this->GetX();
        $this->mycell(50,8,$x,$r2);


        $x=$this->GetX();
        $this->mycell(15,8,$x,$r3);

        $x=$this->GetX();
        $this->mycell(8,8,$x,"9%");
       
        $x=$this->GetX();
        $LCGST=($r3*9)/100;
        $this->mycell(15,8,$x,$LCGST);
        
        $x=$this->GetX();
        $this->mycell(8,8,$x,"9%");
        
        $x=$this->GetX();
        $LSGST=($r3*9)/100;
        $this->mycell(15,8,$x,$LSGST);

        $x=$this->GetX();
        $this->mycell(8,8,$x,"0%");
        
        $x=$this->GetX();
        $this->mycell(15,8,$x,"0");

        $x=$this->GetX();
        $this->mycell(10,8,$x,"-");

        $x=$this->GetX();
        $this->mycell(15,8,$x,$r3+$LCGST+$LSGST);

        $x=$this->GetX();
        $this->mycell(0,8,$x,$r3+$LCGST+$LSGST);
        $this->ln();  



        $POF += $r3;
    }
    $rowcount++;

    // total laber
    $this->SetFont("Arial","B",10);
    $this->cell(10,8,"",1,0);
    $this->cell(50,8,"TOTAL LABOUR",1,0,"R");
    $this->cell(15,8,"",1,0);
    $this->cell(8,8,"",1,0);
    $this->cell(15,8,"",1,0);
    $this->cell(8,8,"",1,0);
    $this->cell(15,8,"",1,0);
    $this->cell(8,8,"",1,0);
    $this->cell(15,8,"",1,0); 
    $this->cell(10,8,"",1,0);
    $this->cell(15,8,"",1,0);
    $this->cell(0,8,$r3+$LCGST+$LSGST,1,1,"C");
     
    // blank space 
     $rowcount1 = $rowcount%20;
    // blank space

    if($rowcount1 > 11)
      $rowcount1 = 19-$rowcount1 + 11;
    else
      $rowcount1 = 19-$rowcount1-8;
    for ($i=0; $i < $rowcount1 ; $i++) {
      $rowcount++;
    
        $this->cell(10,8,"",1,0);
        $this->cell(50,8,"",1,0);
        $this->cell(15,8,"",1,0);
        $this->cell(8,8,"",1,0);
        $this->cell(15,8,"",1,0);
        $this->cell(8,8,"",1,0);
        $this->cell(15,8,"",1,0);
        $this->cell(8,8,"",1,0);
        $this->cell(15,8,"",1,0);
        $this->cell(10,8,"",1,0);
        $this->cell(15,8,"",1,0);
        $this->cell(0,8,"",1,1);
      } 
        $this->SetFont("Arial","",8);
        $this->cell(129,6,"RS",1,0);
        $this->cell(25,6,"TOTAL LAB",'LTR',0,'C');
        $this->cell(0,6,$r3+$LCGST+$LSGST,'LR',1);

        $this->cell(64.5,6,"PARTS SUMMARY",'LTR',0);
        $this->cell(64.5,6,"LABOUR SUMMARY",'LTR',0);
        $this->cell(25,6,"TOTAL PARTS",'LR',0,'C');
        $this->cell(0,6,$total,'LR',1);
    
        $this->SetFont("Arial","",6);
        $this->cell(13,6,"TAX TYPE",'LB',0,'C');
        $this->cell(15.5,6,"GROSS AMT",'B',0,'C');
        $this->cell(12,6,"CGST",'B',0,'C');
        $this->cell(12,6,"SGST",'B',0,'C');
        $this->cell(12,6,"IGST",'RB',0,'C');
        $this->cell(13,6,"TAX TYPE",'LB',0,'C');
        $this->cell(15.5,6,"GROSS AMT",'B',0,'C');
        $this->cell(12,6,"CGST",'B',0,'C');
        $this->cell(12,6,"SGST",'B',0,'C');
        $this->cell(12,6,"IGST",'B',0,'C');
        $this->SetFont("Arial","",8);
        $this->cell(25,6,"GST Amt",'LR',0,'C');
        $this->cell(0,6,($PCGST18+$PSGST18+$PIGST18)+($LCGST+$LSGST+0)+($PCGST28+$PSGST28+$PIGST28),'LR',1);
        
        $this->SetFont("Arial","B",7);
        $this->cell(13,6,"18%",'LT',0,'C');
        $this->cell(15.5,6,($PCGST18+$PSGST18+$PIGST18),'T',0,'C');
        $this->cell(12,6,$PCGST18,'T',0,'C');
        $this->cell(12,6,$PSGST18,'T',0,'C');
        $this->cell(12,6,$PIGST18,'RT',0,'C');
        $this->cell(13,6,"18%",'LT',0,'C');
        $this->cell(15.5,6,($LCGST+$LSGST+0),'T',0,'C');
        $this->cell(12,6,$LCGST,'T',0,'C');
        $this->cell(12,6,$LSGST,'T',0,'C');
        $this->cell(12,6,"0",'RT',0,'C');

        $this->SetFont("Arial","B",9);
        $this->cell(25,6,"GRANDTOTAL",'LRB',0,'C');
        $this->cell(0,6,($PCGST18+$PSGST18+$PIGST18)+($LCGST+$LSGST+0)+($PCGST28+$PSGST28+$PIGST28)+$POF+$total,'LRB',1);


        $this->SetFont("Arial","B",7);
        $this->cell(13,6,"28%",'LB',0,'C');
        $this->cell(15.5,6,($PCGST28+$PSGST28+$PIGST28),'B',0,'C');
        $this->cell(12,6,$PCGST28,'B',0,'C');
        $this->cell(12,6,$PSGST28,'B',0,'C');
        $this->cell(12,6,$PIGST28,'RB',0,'C');
        $this->cell(64.5,6,"",'BRL',0,'C');
        $this->SetFont("Arial","B",12);
        $this->cell(0,6,"For, PATEL MOTORS",'LRT',1);

        $this->SetFont("Arial","",8);
        $this->cell(129,6,"PAN: AALFP95791",'LR',0);
        $this->cell(0,6,"",'LR',1);

        $this->cell(129,6,"",'LR',0);
        $this->cell(0,6,"",'LR',1);

        $this->SetFont("Arial","B",8);
        $this->cell(129,6,"Note:",'LR',0);
        $this->cell(0,6,"",'LR',1);

        $this->cell(129,6,"This Invoice is not a Bill,it is just for information",'LR',0);
        $this->cell(0,6,"",'LR',1);

        $this->cell(129,6,"",'LRB',0);
        $this->SetFont("Arial","B",12);
        $this->cell(0,6,"AUTHORISED SIGNATORY",'LRB',1);



  }

}
$pdf = new PDF();
$pdf ->AliasNbPages();
$pdf->AddPage('P','A4',0);//new page add
$pdf->invoice();
$pdf->output();
?>