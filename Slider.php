<style>
    
    body {font-family: Verdana}
    
    #container {
      position: relative;
      margin: 50px ;
      padding-left: 50px;
    }
    
    .Detail img{
      height: 200px;
      display: inline-block;
      width: 300px;
      overflow:   hidden  ;
    }
    #right_contain{
      display: inline-block;
      overflow:   hidden  ;
      width: 700px;
      height:  150px;
      padding-left: 100px;
    }

    .Detail{
      height: auto;
      display: inline-block;
      
      width: 95%;
      padding-right: 50px;
      margin: 15px;
      overflow: hidden;
    }
    
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -30px;
      padding: 16px;
      color: #888;
      font-weight: bold;
      font-size: 20px;
    }
    
    .next {
      border-radius: 0 100% 100% 0 ;
      right: 0;
    } 
    .prev {
      border-radius: 100% 0 0 100%;
      left: 0;
    }
    
    .prev:hover, .next:hover {
      background-color: #0073e6;
      color: white;
    }
    
</style>

<body>


<div id="container">
  <?php 
  include('connect.php');
  $result = mysqli_query($conn,"select* from insurance_company");
  
  while ($res=mysqli_fetch_array($result)) {
  ?>
        <div class="Detail">
          <img src="<?php echo "$res[C_logo]";?>">

          <div id="right_contain">
            <h2><?php echo "$res[C_name]"; ?></h2>
            <p><?php echo "$res[C_Discription]"; ?>
            <a href="<?php echo "$res[C_URL]"; ?>" target="_blank">Click here</a></p>
         </div>
        </div>
      <?php
      }
    ?>
 
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

</div>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("Detail");
        
      if (n > slides.length) {slideIndex = 1} 
      
      if (n < 1) {slideIndex = slides.length}
      
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      
      slides[slideIndex-1].style.display = "block";  
    }
</script>

</body>