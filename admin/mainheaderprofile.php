<?php

if(isset($_POST['logout']))
{
  $_SESSION['sess_user_id']="";
  $_SESSION['sess_user_name']="";
  $_SESSION['sess_user_email']="";
  $_SESSION['sess_user_privaliges']="";
  $_SESSION['sess_user_img']="";
  if(empty($_SESSION['sess_user_id']))
  {
     session_destroy();
  echo "<script>window.open('../index.php')</script>";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../js/bootstrap.min.js" rel="stylesheet" />
	<link href="../css/flaticon.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" />
    <title>SirFix</title>
  </head>
  <body style="direction:rtl">
<span class="iconify" data-icon="feather:fast-forward" data-inline="false"></span>
  <i class="fas fa-map-marker-alt"></i>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
  <div class="container-fluid">

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample" >
      <!-- Left links -->
      <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link " aria-current="page" href="#"><i data-feather="map-pin"></i>صنعاء - حدة - جولة المصباحي |</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i data-feather="phone"></i>+967 777339975 |</a>
      </li>
      <li class="nav-item disabled">
        <a class="nav-link" href="#"> Mon - fri: 7:00am - 6:00pm </a>
      </li>
    
         
      </ul>
      <!-- Left links -->
    </div>
    </div>
    <!-- Collapsible wrapper -->
</nav>
<hr/>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
  <a class="navbar-brand" href="../index.php"><img src="../images/logo-1.png"alt></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0"style="margin:auto;">
      
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">الرئيسي</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../ourservice.php">خدماتنا</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../servicerequest.php">طلب خدمة</a>
        </li>      
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">تسوق</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
              <li><a class="dropdown-item" href="#">أجهزة كمبيوتر</a></li>
              <li><a class="dropdown-item" href="#">أجهزة شبكات</a></li>
              <li><a class="dropdown-item" href="#">تصاميم</a></li>
			      </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../jointous.php">أنظم معنا</a>
		  </li> 
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">الدعم</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
            <li><a class="dropdown-item" href="../policy.php">السياسة والخصوصية</a></li>
              <li><a class="dropdown-item" href="../connectwithus.php">تواصل معنا</a></li>
			      </ul>
          </li>
               
        </ul>    
    </div>
    <div class="avatar mr-1">
    <?php
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name']!="") 
{
?>
          echo'<a href="logout.php?action=logout" class="badge btn-success">تسجيل الخروج</a> ';

                                    <a href="editprofile.php?action=editprofile&id=<?php echo$_SESSION['sess_user_id'];?>"><img src="<?php echo$_SESSION['sess_user_img'];?>" alt="" srcset="" style="width: 40px;height: 42px;border-radius: 50%;"></a>
                                <?php }?>
                                </div>
  </div>
</nav>  


<script src="../js/feather-icons/feather.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>



  </body>
