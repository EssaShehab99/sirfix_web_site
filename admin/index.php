<?php
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name']!="") 
{
require_once("dbconnections.php");
include_once("mainheader.php");
include_once("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet" />
  <title>SirFix</title>
</head>
<body>
<main class="container py-5">
    <div class="row" data-masonry='{"percentPosition": true }'>
  <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">المستخدمين</h5>
          <p class="card-text">
                    <?php
                    $query="select * from users";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                    </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">أجهزة التسوق</h5>
          <p class="card-text">
                    <?php
                    $query="select * from users";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">تبليغ عن مشكلة</h5>
                  <p class="card-text">
                    <?php
                    $query="select * from users";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">طلبات تسجيل مستخدم</h5>
          <p class="card-text">
                    <?php
                    $query="select * from users";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">طلبات إضافة أجهزة</h5>
          <p class="card-text">
                    <?php
                    $query="select * from devices where available=0";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>
    
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">طلبات الإنظمام</h5>
          <p class="card-text">
                    <?php
                    $query="select * from joinus where accept=0";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>
    
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">طلبات خدمات</h5>
          <p class="card-text">
                    <?php
                    $query="select * from requestservice";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>
    
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">طلبات إنظمام الواتساب</h5>
          <p class="card-text">
                    <?php
                    $query="select * from joinwhatsspp where readen=0";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>
    
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">الرسائل</h5>
          <p class="card-text">
                    <?php
                    $query="select * from connectwithus where accept=0";
                    $sql=$con->prepare($query);
                    $sql->execute();
                    echo $sql->rowCount();
                    ?>
                  </p>
        </div>
      </div>
    </div>
    
    
  </div>

</main>





        

  
   
  
        <script src="../js/feather-icons/feather.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include('footer.php');

}
else
{
  header('Location: ../index.php');
}
?>
