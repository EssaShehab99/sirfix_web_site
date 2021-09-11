<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="js/bootstrap.min.js" rel="stylesheet" />
	<link href="css/flaticon.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

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
  <a class="nav-link" href="tel:+967777339975 = "><i data-feather="phone"></i>+967 777339975 |</a>
</li>
<li class="nav-item disabled">
  <a class="nav-link" href="#"> SA - TH: 7:00am - 6:00pm </a>
</li>

         
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->
</nav>
</div>
<hr/>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/logo-1.png"alt></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"style="margin:auto;font-size:15px;">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php"><i data-feather="home"></i>الرئيسي</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ourservice.php">خدماتنا</a>
		  </li>
		  <li class="nav-item">
            <a class="nav-link" href="servicerequest.php">طلب خدمة</a>
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
            <a class="nav-link" href="jointous.php">أنظم معنا</a>
		  </li>    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">الدعم</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown03">
            <li><a class="dropdown-item" href="policy.php">السياسة والخصوصية</a></li>
              <li><a class="dropdown-item" href="connectwithus.php">تواصل معنا</a></li>
			      </ul>
          </li>
        </ul>
        <form class="d-flex" method="get">
        <li class="nav-item">
          <?php
          session_start();
          if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_privaliges']=="1") 
          {

  echo'<a  class="btn btn-outline-success" href="admin/index.php" tabindex="-1" aria-disabled="true"> إدارة الموقع</a>';
          }
          elseif(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_privaliges']=="2")
          {
            echo'<a  class="btn btn-outline-success" href="admin/index.php" tabindex="-1" aria-disabled="true">إدارة الموقع</a>';

          }
          elseif(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_privaliges']=="3")
          {
            $x=$_SESSION['sess_user_id'];
            echo"<a  class='btn btn-outline-success' href='admin/editprofile.php?action=editprofile&id=$x' tabindex='-1' aria-disabled='true'>الحساب</a>";
            
          }
          else
          {
            echo'<a  class="btn btn-outline-success" href="admin/login.php" tabindex="-1" aria-disabled="true">تسجيل الدخول</a>';

          }
  ?>
</li>
</form>

      </div>
    </div>
  </nav>
  


  
  <script src="js/feather-icons/feather.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


  </body>
</html>