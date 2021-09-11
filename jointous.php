  <?php
   include('header.php');
   require('admin/dbconnections.php');

        ?>
<!DOCTYPE html>
<html lang="en">
  
<!--  13:28  -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="js/bootstrap.min.js" rel="stylesheet" />
	<link href="css/flaticon.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

    <title>SirFix</title>
  </head>
  <body>
	
  
  
    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts" style="margin-top:5%;" class="container-fluid">

      <div class="row match-height" >
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        
          <div class="card" style="text-align:right">
            <div class="card-header">
              <h4 class="card-title">ادخل بياناتك للانضمام إلينا</h4>
            </div>
            <?php
            if(isset($_POST['jointous']))
            {
              $name=trim($_POST['name']);
              $email=trim($_POST['email']);
              $contact=trim($_POST['contact']);
              $filename = $_FILES["upload"]["name"];
              $temp = $_FILES["upload"]["tmp_name"];
              $folder = "CV/".$filename;
              move_uploaded_file($temp ,$folder);
              // $file_type = $_FILES['upload']['type']; //returns the mimetype
              // $extention = end(explode('.', $file_type));
              $size = $_FILES["upload"]["size"];
            
              // $fileinfo= pathinfo($_FILES['upload']['name']);
              // $extension_upload = $fileinfo['extension'];
              // $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
              // if (in_array($extension_upload, $extensions_allowed ))
              // {
              //     //upload file
              // }
              
              // $fileinfo= pathinfo($_FILES['upload']['name']);
              // $extension_upload = $fileinfo['extension'];
              // $extensions_allowed = array('jpg', 'jpeg', 'gif', 'png');
              $errors=array();
              
            //   if(!in_array($file_array["type"],$vlaidmim) && !in_array($exten,$vlaidext))
            //   {
            //    $errors['imgtype']="<div style='color:red'> نوع الصورة غير صحيح</div>";
            //   }
            // }
             
            if(empty($name))
                  {
                      $errors['ename']="<div style='color:red'>ادخل اسمك</div>";
                  }
                  elseif(is_numeric($name))
                  {

                      $errors['enameNumber']="<div style='color:red'>اسمك يجب ان يكون نص</div>";
                  
                  }
                  elseif(empty($email))
                  {

                      $errors['eemail']="<div style='color:red'>ادخل ايميلك </div>";
                  }
                  
                  elseif(empty($contact))
                  {

                      $errors['econ']="<div style='color:red'>ادخل  رقمك</div>";
                  }
                  elseif(!is_numeric($contact))
                  {

                      $errors['econNumber']="<div style='color:red'>ادخل مفتاح الدولة</div>";
                  
                  }
                  elseif(strlen($contact)>14)
                  {

                      $errors['econleters']="<div style='color:red'>رقم الهاتف غير صحيح</div>";
                  }
                  // elseif (!in_array($extension_upload, $extensions_allowed ))
                  // {
                  //   $errors['imgtype']="<div style='color:red'> image size is to wwron.</div>";
                  // }
                
                 elseif($size > 2097152)
                  {
                  $errors['imgsize']="<div style='color:red'> image size is to large than 2MB.</div>";
                  }
                
                
                  else
                  {            
                      $query="insert into joinus(name,email,phone,cv_dir) values(?,?,?,?)";
                      $sql=$con->prepare($query);
                      $sql->execute(array($name,$email,$contact,$folder));
                      if($sql->rowCount())
                      {
                           echo "<div class='alert alert-success'>تم ارسال طلبك </div>";
                      }
                      else
                      {
                          echo"<div class='alert alert-danger'>لم يتم  ارسال طلبك</div>";
                      }
                      
                  }

            }
            ?>
            <div class="card-content" style="margin-top:5%;">
              <div class="card-body" >
                <form class="form form-vertical" enctype="multipart/form-data" action="" method="post">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="first-name-vertical">اسمك</label>
                          <input type="text" id="first-name-vertical" class="form-control" name="name"
                              placeholder="ادخل اسمك" style="text-align:right;">
                        </div>
                      
                          <?php if(isset($errors['ename'])) echo $errors['ename'];?>
                          <?php if(isset($errors['enameNumber'])) echo $errors['enameNumber'];?>
                      </div>
                        <div class="col-12"style="margin-top:5%;">
                          <div class="form-group">
                            <label for="email-id-vertical">إيميلك</label>
                            <input type="email" id="email-id-vertical" class="form-control" name="email"
                              placeholder="ادخل إيميلك" style="text-align:right;">
                          </div>
                          <?php if(isset($errors['eemail'])) echo $errors['eemail'];?>
                        </div>
                          <div class="col-12" style="margin-top:5%;">
                            <div class="form-group">
                              <label for="contact-info-vertical">رقم هاتفك</label>
                              <input type="phone" id="contact-info-vertical" class="form-control" name="contact"
                                 placeholder="ادخل رقم هاتفك" style="text-align:right;">
                            </div>
                            <?php if(isset($errors['econNumber'])) echo $errors['econNumber'];?>
                          <?php if(isset($errors['econleters'])) echo $errors['econleters'];?>
                          <?php if(isset($errors['econ'])) echo $errors['econ'];?>

                          </div>
                                
                          <div style="margin-top:5%;">
                          <label for="contact-info-vertical">ارفاق السيرة الذاتية</label>

                                    <div class="form-file">
                                        <input type="file" class="form-file-input" id="customFile" name="upload">
                                        <label class="form-file-label" for="customFile">
                                            <span class="form-file-text">Choose file...</span>
                                            <span class="form-file-button btn-primary "><i data-feather="upload"></i></span>
                                        </label>
                                    </div>
                                    <?php //if(isset($errors['imgtype'])) echo $errors['imgtype'];?>
                                    <?php if(isset($errors['imgsize'])) echo $errors['imgsize'];?>

                                </div>
                          
                                <div style="margin-top:7%;">
                                  <div class="col-12 d-flex justify-content-end"> 
                                  <button  name="jointous" class="btn btn-outline-primary"> ارسال الطلب</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
          </div>
                  <div class="col-sm-3"></div>

    </section>
    <!-- // Basic Vertical form layout section end -->
    
    <script src="js/feather-icons/feather.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>

  </body>

</html>  
<?php
            include('footer.php');
?>