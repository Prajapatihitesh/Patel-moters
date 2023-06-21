  <style>
		.nbar{
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #004687;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }
    .nbar a{
      font-size: 20px;
      color: white;
      transition: 0.3s;
      display: block;
      border-radius: 40px;
      padding: 8px 20px 8px 20px;
      text-decoration: none;
    }
    .nbar a:hover {
      background-color: white;
      color: black;
    }

    .closebut:hover {
      background-color: black;
      color: white;

    }
    .nbar .closebut {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
      }
      #main {
        transition: margin-left .5s;
    }

	</style>
</head>
<body>
	<div id="mynbar" class="nbar">
  <a href="javascript:void(0)" class="closebut" onclick="closeNav()">&times;</a>
    <a href="service.php">Home</a>
    <a href="Estimate.php">Estimate Entry</a>
    <a href="Estimate_search.php">Search Estimate</a>
    <a href="Invoice.php">Invoice Entry</a>
    <a href="Invoice_search.php">Search Invoice</a>
    <a href="New_parts.php">Enter New parts</a>
    <a href="New_labor_work.php">Enter New labor</a>
    <a href="New_Car_model.php">Enter New Car Model</a>

    <a href="Index.php" class="but">Log Out</a>
  </div>


<script>
   function openNav(){
    document.getElementById("mynbar").style.width="250px";
    document.getElementById("main").style.marginLeft="250px";
   }
   function closeNav(){
    document.getElementById("mynbar").style.width="0";
    document.getElementById("main").style.marginLeft="0";
   }
 </script>