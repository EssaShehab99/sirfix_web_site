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
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="js/bootstrap.min.js" rel="stylesheet" />
	<link href="css/flaticon.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

    <title>SirFix</title>
  </head>
  <body>  
  <?php

            if(isset($_POST['send']))
            {

              $name=trim($_POST['name']);
              $email=trim($_POST['email']);
              $sms=trim($_POST['message']);
              $errors=array();

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
                  elseif(empty($sms))
                  {
             
                      $errors['esms']="<div style='color:red'>ادخل رسالتك </div>";
                  }
                  else
                  {            
        
                                              
                      $query="insert into connectwithus(name,email,message) values(?,?,?)";
                      $sql=$con->prepare($query);
                      $sql->execute(array($name,$email,$sms));
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

        <div class="container px-4">
  <div class="row ">
    <div class="col">

    <section id="basic-vertical-layouts">
    <div class="  row match-height">
        <div class="col-md-15 col-30">
        <div class="card" style=" margin: 10px;">
            <div class="card-header">
            <h4 class="card-title">تواصل معنا</h4>


            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="post">
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="first-name-vertical"> الاسم</label>
                        <input type="text" id="first-name-vertical" class="form-control" name="name"
                            placeholder="ادخل اسمك  ">
                        </div>
                        
                        <?php if(isset($errors['ename'])) echo $errors['ename'];?>
                          <?php if(isset($errors['enameNumber'])) echo $errors['enameNumber'];?>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <label for="email-id-vertical">الايمل</label>
                        <input type="email" id="email-id-vertical" class="form-control" name="email"
                            placeholder="ادخل ايميلك">
                        </div>
                        <?php if(isset($errors['eemail'])) echo $errors['eemail'];?>
                    </div>
                    <div class="col-12">
                    
                        <div class="form-g roup">
                        <label for="contact-info-vertical">الرسالة</label>
                        <textarea name="message" rows="4" cols="90" class="form-control" 
                            placeholder="اكتب رسالتك"></textarea>
                      
                        </div>
                        <?php if(isset($errors['esms'])) echo $errors['esms'];?>
                    </div>
                   
                    <div class="col-12 d-flex justify-content-end" style=" margin: 10px;"> 
                        <button type="submit" class="btn btn-primary mr-1 mb-1" name="send">أرسل</button>
                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">ألغاء</button>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>


    </div>
    <div class="col">
     
    <section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-15 col-30">
        <div class="card"  style=" margin: 10px;">
            <div class="card-header">
            <h4 class="card-title">بيانات التواصل </h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <img src="images\2.jpg" alt="" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <h4> صنعاء -حدة-المصباحي  </h4>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <p><a style="text-decoration:none" href="tel:+967777339975 = "  class="link-primary" ><i data-feather="phone"></i>+967777339975</a></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                        <p><a style="text-decoration:none" href="mailto:SirFix.Sirfic@gmail.com" class="link-primary" ><i data-feather="mail"></i>SirFix.service@gmail.com</a></p>
                        </div>
                    </div>
                   
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
    </div>
  </div>
</div>


<div class="container px-4">
  <div class="row gx-5">
    <div class="col">
        
    <section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-15 col-30">
        <div class="card"  style=" margin: 10px;">
            <div class="card-header">
            <h4 class="card-title">خدماتنا  </h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="button">تركيب شكبات</button>
                            <button class="btn btn-primary" type="button">تركيب كامرات</button>
                            <button class="btn btn-primary" type="button">صيانة أجهزة</button>
                            <button class="btn btn-primary" type="button">تصاميم جرافيك</button>
                        </div>
                               

                                                </div>
                                                                </div>


                   
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>

    
    </div>
    <div class="col">
     
    <section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-15 col-30">
        <div class="card"  style=" margin: 10px;">
            <div class="card-header">
            <h4 class="card-title">روابط أخرى  </h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                       
                        <div class="tab_content"> 
                                
                                <a style="text-decoration:none" href="#"class="link-primary" >من نحن</a><br>
                               <a style="text-decoration:none" href="#" class="link-primary">أطلب خدمتك</a><br>
                                <a style="text-decoration:none" href="" class="link-primary">انظم معنا</a><br>
                                <a style="text-decoration:none" href="" class="link-primary">أبلاغ عن مشكلة</a>
                                
                        </div>
                        </div>
                    </div>
                   
                   
                   
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section> 
    </div>
  </div>
</div>
  <div class="container">
 
  
  
        
        
   
    
         </div>
 
</div>
</div>
        




        
<script src="js/feather-icons/feather.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>


  </body>

</html>


<?php
            include('footer.php');
        ?>