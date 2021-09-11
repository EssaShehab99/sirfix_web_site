<!doctype html>
<html lang="en">
<?php 

require("dbconnections.php");
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->

    <title>SirFix</title>
  </head>
  <body>

  <footer class="bg-light text-center text-lg-start"style="margin-top:10%;">
                                    <?php

                                        if(isset($_POST['submit']))    
                                        {
                                         
                                          $phone=trim($_POST['phone']);
                                         
                                            $errors=array();
                                            if(empty($phone))
                                            {
                                                $errors['ephone']="<div style='color=red'>ادخل رقم الهاتف</div>";
                                            }
                                            elseif(!is_numeric($phone)){
                                              $errors['ephonnum']="<div style='color=red'>ادخل رقم</div>";

                                            }
                                            elseif(strlen($phone)>14)
                                            {
                                                $errors['ephoneleters']="<div style='color=red'>رقم الهاتف غير صحيح</div>";
                                            }
                                            else
                                            {                                                
                                                $query="insert into joinwhatsspp(phone) values(?)";
                                                $sql=$con->prepare($query);
                                                $sql->execute(array($phone));
                                                if($sql->rowCount())
                                                {
                                                            echo "<div class='alert alert-success'>تم ارسال طلبك للإنضمام إلى مجموعة الواتساب</div>";
                                                }
                                                else
                                                {
                                                    echo"<div class='alert alert-danger'>فشلت عملية إرسال الرقم أو أن رقمك موجود مسبقاً</div>";
                                                }
                                                
                                            }
                                          }
                                            ?>
  <!-- Grid container -->
  <div class="container p-4 pb-0">
  <form action="" class="input-group mb-3" method="post">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-auto mb-4 mb-md-0">
          <p class="pt-2"><strong>إدخل رقمك الواتساب للإنضمام إلى مجموعتنا في الواتساب</strong></p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-5 col-12 mb-4 mb-md-0">
          <!-- Email input -->
          <div class="form-outline mb-4">                                                                                   
                                            <input type="tel" class="form-control rounded"value="ادخل رقمك الواتساب" onblur="if(this.value == '') { this.value ='ادخل رقمك الواتساب'; }" onfocus="if(this.value =='ادخل رقمك الواتساب') { this.value = ''; }" id="form5Example2" class="form-control" name="phone" placeholder="Please Enter your Name "/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ephone'])) echo $errors['ephone'];?>
                                                    <?php if(isset($errors['ephoneleters'])) echo $errors['ephoneleters'];?> 
                                                    <?php if(isset($errors['ephonnum'])) echo $errors['ephonnum'];?>                                                    
                                                   
                                            </div>
                                        </div>
        <!--Grid column-->

        <!--Grid column-->
                                        
                  
        
                                        <div  class="col-auto mb-4 mb-md-0"style="margin: auto;">
                                                <button type="submit" name="submit" class="btn btn-primary mb-4" id="delete">انضمام</button>
                                            
                                        </div>

                                        
                                        
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </form>
    <!--Grid row-->
    <div class="row">	
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">عنواننا</h5>

       
        <ul class="list-unstyled">
		<li><i class="wmicon-pin"></i> المصباحي، صنعاء‎، اليَمَن, 15.320179625865261, 44.198813484536075</li>
		<li><i class="wmicon-phone"></i> +967 777339975</li>
        <li><i class="wmicon-letter"></i> <a href="sirfix.service@gmail.com">sirfix.service@gmail.com</a> </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">@SirFixTc</h5>

        <p>
		فريق متخصص ذوي خبرة عالية بكافة الجوانب التقنية والحاسوبية نعمل على تقديم الدعم التقني والفني

        </p>
      </div>
	  <!--Grid column-->
	  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">مواقعنا</h5>

        <ul class="list-unstyled">
          <li>
            <a href="https://www.facebook.com/SirFixTc" class="text-dark">فيسبوك</a>
          </li>
          <li>
            <a href="https://twitter.com/SirFixTc" class="text-dark">تويتر</a>
          </li>
          <li>
            <a href="https://www.instagram.com/sirfixtc" class="text-dark">إنستجرام</a>
          </li>
          <li>
            <a href="https://t.me/SirFixTic" class="text-dark">تيليجرام</a>
          </li>
        </ul>
      </div>
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2021 Copyright:
    <a class="text-dark" href="https://SirFixTc.com/">SirFixTc.com</a>
  </div>
  <!-- Copyright -->
</footer>


  </body>
</html>
<script>
    $('#delete').click(function(){
        return confirm('Are You Sure !!');
    });
</script>