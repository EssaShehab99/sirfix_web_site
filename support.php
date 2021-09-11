<?php


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <title>SirFix</title>


    <style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>






</head>
<body>

<!-- <div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div> -->


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>
     






<div class="container">
    
    
    <div class="card text-white bg-primary mb-3" style="height: 380px; margin: 0 20%; width : 800px; position: relative;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h1 class="card-title" style="font-size:64px ; color: #000; right:20px; top :20px;     position: absolute;">الرؤية</h1>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div> <hr>

        <div class="card text-white bg-warning mb-3" style="height: 380px; margin: 0 20%; width : 800px; position: relative;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h1 class="card-title" style="font-size:64px ; color: #000; right:20px; top :20px;     position: absolute;">الــرسالة</h1>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>


</div>




<div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
     <hr>
    </div>








    
    
  </div>
</div>











    
</body>
</html>