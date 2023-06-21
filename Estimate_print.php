<?php 
include("fpdf/fpdf.php");
include ("connect.php");
$ESTI_ID = $_GET['PE_Id'];

class Pdf extends Fpdf{
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

    $this->SetFont("Arial","B",10);
    $this->cell(15,8,"SR NO",1,0,'C');
    $this->cell(110,8,"PARTTICULARS",1,0);
    $this->cell(15,8,"QTY",1,0,'C');
    $this->cell(15,8,"RATE",1,0,'C');
    $this->cell(20,8,"AMOUNT",1,0,'C');
    $this->cell(0,8,"P.O/F",1,1,'C');

    
  }


  function user(){

    $this->SetFont('Arial','U',12,'C');
    $this->cell(0,10,"ESTIMATE",0,1,'C');    
    global $conn, $ESTI_ID;
    $result2 = $conn->query("select * from estimate WHERE ESTIMATE_NO = '$ESTI_ID'");

    $this->SetFont("Arial","",10);

    while($rst=$result2->fetch_object()){
  
    
    $this->SetY(80); //top to buttom
    $this->cell(190,8,"I/C Name :- $rst->INSURANCE_COMPANY",'LTR',1);
    $this->cell(190,8,"PERIOD OF INSURANCE:-  $rst->PERIOD_OF_INSURANCE_START TO $rst->PERIOD_OF_INSURANCE_END",'LR',1);

    $this->cell(125,8,"MODEL :- $rst->MODEL",'LTR',0);
    $this->cell(65,8,"Estimate No :- $rst->ESTIMATE_NO",'LRT',1);
    $this->cell(125,8,"DATE OF ACCIDENT:- $rst->DT_OF_ACCIDENT  $rst->TIME_OF_ACCIDENT",'LR',0);
    $this->cell(65,8,"DATE :- $rst->DATE",'LR',1);
    $this->cell(125,8,"VEHICLE NO :- $rst->VEHICLE_NO",'LR',0);
    $this->cell(65,8,"POLICY NO:- $rst->POLICY_NO",'LR',1);
    $this->cell(125,8,"CUST NAME :- $rst->CUST_NAME",'LRB',0);
    $this->cell(65,8,"ESTIMATE TYPE:- $rst->ESTIMATE_TYPE",'LRB',1);
  }

  }

  function estimate(){

    global $conn, $ESTI_ID,$sum,$POF;

    //parts detail

    $this->SetFont("Arial","",8);

    $result2 = $conn->query("select * from parts WHERE ESTIMATE_NO = '$ESTI_ID'");
    $rowcount = 1;
    for ($i=0; $i < mysqli_num_rows($result2) ; $i++) {
      $rowcount++;
    if($rowcount%15 === 0)
        $this->AddPage(); 

    $rs=$result2->fetch_object();
        $r1=$rs->SR_NO; 
        $r2=$rs->PARTTICULARS;
        $r3=$rs->RATE;     
        $r4=$rs->QTY;    
        $r5=$rs->AMT;

        $this->cell(15,6,$r1,1,0);
        $this->cell(110,6,$r2,1,0);
        $this->cell(15,6,$r4,1,0,'C');
        $this->cell(15,6,$r3,1,0,'R');
        $this->cell(20,6,$r5,1,0,'R');
        $this->cell(0,6,"",1,1);

        $sum += $r5;
    }

    // blank space

    for ($i=0; $i < 5; $i++) {
      $rowcount++;
    if($rowcount%15 === 0)
        $this->AddPage();  
    
        $this->cell(15,6,"",1,0);
        $this->cell(110,6,"",1,0);
        $this->cell(15,6,"",1,0);
        $this->cell(15,6,"",1,0);
        $this->cell(20,6,"",1,0);
        $this->cell(0,6,"",1,1);
    
    }

      $this->SetFont("Arial","B",8);
      $this->cell(15,6,"",1,0);
      $this->cell(110,6,"LABOUR CHARGES",1,0);
      $this->cell(15,6,"",1,0);
      $this->cell(15,6,"",1,0);
      $this->cell(20,6,"",1,0);
      $this->cell(0,6,"",1,1);
      $rowcount++;
      if($rowcount%15 === 0)
        $this->AddPage();
    // labor work

    $result2 = $conn->query("select * from estimate_labor WHERE ESTIMATE_NO = '$ESTI_ID'");


    for ($i=0; $i <mysqli_num_rows($result2); $i++) {
    $rs=$result2->fetch_object() ;
      $rowcount++;
    if($rowcount%15 === 0)
        $this->AddPage();  
        $r1=$rs->SR_NO; 
        $r2=$rs->PARTTICULARS;
        $r3=$rs->POF;    

        $this->SetFont("Arial","",8);

        $this->cell(15,6,$r1,1,0);
        $this->cell(110,6,$r2,1,0);
        $this->cell(15,6,"",1,0);
        $this->cell(15,6,"",1,0);
        $this->cell(20,6,"",1,0);
        $this->cell(0,6,$r3,1,1,'C');

        $POF += $r3;
    }
     
    while($rowcount%14 != 0){
      $rowcount++;
    
        $this->cell(15,6,"",1,0);
        $this->cell(110,6,"",1,0);
        $this->cell(15,6,"",1,0);
        $this->cell(15,6,"",1,0);
        $this->cell(20,6,"",1,0);
        $this->cell(0,6,"",1,1);
    }
    $this->cell(15,6," ",'LRT',0);
    $this->cell(110,6," ",'LRT',0);
    $this->cell(15,6,"","LRT",0,'C');
    $this->cell(15,6,"",1,0,'C');
    $this->cell(20,6,"",1,0,'C');
    $this->cell(0,6,"",1,1,'C');
    
    $this->cell(15,6," ",'LRT',0);
    $this->cell(110,6,"RS ",'LRT',0);
    $this->SetFont("Arial","B",10);
    $this->cell(30,6,"","LRT",0,'C');
    $this->cell(20,6,$sum,1,0,'C');
    $this->cell(0,6,$POF,1,1,'C');
    
    $Total =$sum + $POF;
    
    $this->cell(15,6," ",'LRB',0,'C');
    $this->cell(110,6,"",'LRB',0,'C');
    $this->SetFont("Arial","B",12);
    $this->cell(30,6,"TOTAL",'LRB',0,'C');
    $this->cell(0,6,$Total,1,0,'C');

}
  function footer(){
    global $conn, $ESTI_ID,$sum,$POF;


    $this->SetY(260);
    $this->SetFont("Arial","",10);
    $this->MultiCell(100,5,"Terms & Conditions \nE & OE\nSubject to Gandhidham Jurisdiction.\nService Tax will be charge Extra.");

    $this->SetY(260);
    $this->SetX(150);
    $this->SetFont("Arial","B",14);
    $this->MultiCell(100,5,"For,PATEL MOTORS \n\n\n\n\n\n Authorised Signatory");
    $this->Ln(10);
    
  }
}


$pdf = new PDF();

$pdf ->AliasNbPages();

$pdf->AddPage('P','A4',0);//new page add
$pdf->estimate();

$pdf->output();


?>