<?php 
include("mainheader.php"); 
require("dbconnections.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SirFix</title>
<link href="../css/style.css" rel="stylesheet" />
<script>
$(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</head>
<body>
<?php
    if(isset($_POST["register"]))
        {
            $name = $_POST["fullname"];
            $country = $_POST["country"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $pass=sha1($password);
            $confpassword=trim($_POST['confpassword']);
            $email = $_POST["email"];
            $permission  = 3;
            $statue = 0;
            $filename = $_FILES["upload"]["name"];
            $temp = $_FILES["upload"]["tmp_name"];
            $folder = "Img/".$filename;
            if(empty($name))
                                            {
                                                $errors['ename']="<div style='color=red'>ادخل اسم المستخدم</div>";
                                            }
                                            elseif(is_numeric($name))
                                            {
                                                $errors['enameNumber']="<div style='color=red'>اسم المستخدم يجب ان يكون نص</div>";
                                            
                                            }
                                            elseif(strlen($name)<5)
                                            {
                                                $errors['enameNumberleters']="<div style='color=red'>اسم المستخدم يجب ان يكون اكبر من 5 احرف</div>";
                                            }
                                            elseif(empty($password))
                                            {
                                                $errors['epassword']="<div style='color=red'>ادخل كلمة المرور</div>";
                                                
                                            }
                                            elseif(is_numeric($password))
                                            {
                                                $errors['epasswordNumber']="<div style='color=red'>كلمة المرور يجب ان تحتوي نص</div>";
                                            }
                                            elseif($password!=$confpassword)
                                            {
                                                $errors['epasswordConf']="<div style='color=red'>كلمة المرور غير متطابقة</div>";
                                               
                                            }
                                            elseif(strlen($password)<9)
                                            {
                                                $errors['epasswordleters']="<div style='color=red'>كلمة المرور يجب ان تكن اكبر من 9 احرف</div>";
                                            }
                                            elseif(empty($phone))
                                            {
                                                $errors['ephone']="<div style='color=red'>ادخل رقم الهاتف</div>";
                                            }
                                            elseif(!is_numeric($phone))
                                            {
                                                $errors['ephonenu']="<div style='color=red'>رقم الهاتف لا يجب أن يحتوي على احرف</div>";
                                            }
                                            elseif(strlen($phone)>14)
                                            {
                                                $errors['ephoneleters']="<div style='color=red'>رقم الهاتف غير صحيح</div>";
                                            }
                                            else
                                            {  
            move_uploaded_file($temp ,$folder);
            $query="insert into users(name,password,email,phone,id_privaliges,statue,profile_img,country ) values(?,?,?,?,?,?,?,?)";
            $sql=$con->prepare($query);
            $sql->execute(array($name,$pass,$email,$phone,$permission,$statue,$folder,$country));
            if($sql->rowCount())
            {

                        echo "<div class='alert alert-success'>تمت عملية التسجيل بنجاح</div>";
                        echo "<script>window.open('../index.php')</script>";

            }
            else
            {
                echo"<div class='alert alert-danger'>لم تتم العملية بنجاح</div>";
            }
        }
        }
?>

<div id="auth">
        
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="../images/logo-1.png" height="48" class='mb-4'>
                                <h3>تسجيل حساب جديد</h3>
                                <p>يرجى ملء النموذج للتسجيل.</p>
                            </div>
                            <form action="" method="POST"  enctype="multipart/form-data">
                                
                            <div class="container">
                                <div class="picture-container">
                                    <div class="picture">
                                        <input type="file" name="upload" id="wizard-picture" class="">
                                        <img src="" class="picture-src" id="wizardPicturePreview" title="">
                                    </div>
                                    <h6 class="">اختر صورة</h6>
                                </div>
                            </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">الاسم كامل</label>
                                            <input type="text" id="first-name-column" class="form-control"  name="fullname">
                                        </div>
                                        <div style="font-size: 15px;color:red;color:red;padding: 1%;">
                                                <?php if(isset($errors['ename'])) echo $errors['ename'];?>
                                                <?php if(isset($errors['enameNumber'])) echo $errors['enameNumber'];?>
                                                <?php if(isset($errors['enameNumberleters'])) echo $errors['enameNumberleters'];?>
                                            </div>
                                    </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">الدولة</label>
                                        <select class="form-control" name="country">
                                            <?php
                                                $query="select * from country";
                                                $sql=$con->prepare($query);
                                                $sql->execute();
                                                if($sql->rowCount())
                                                {
                                                    foreach($sql->fetchAll() as $row)
                                                    {
                                                        ?>
                                                        <option value=<?php echo $row['id']?>><?php echo $row['name_ar'].",".$row['name_en']?></option>
                                                        <?php
                                                    }
                                                }           
                                                        ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label >الهاتف</label>
                                        <input type="tel" class="form-control rounded" name="phone" placeholder="Please Enter your Phone Number"/>
                                    </div>
                                    <div style="font-size: 15px;color:red;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ephone'])) echo $errors['ephone'];?>
                                                    <?php if(isset($errors['ephonenu'])) echo $errors['ephonenu'];?>
                                                    <?php if(isset($errors['ephoneleters'])) echo $errors['ephoneleters'];?>                                                    
                                            </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">كلمة المرور</label>
                                        <input type="password" class="form-control rounded" name="password" placeholder="Please Enter password "/>
                                    </div>
                                    <div style="font-size: 15px;color:red;color:red;padding: 1%;">
                                                    <?php if(isset($errors['epassword'])) echo $errors['epassword'];?>
                                                    <?php if(isset($errors['epasswordNumber'])) echo $errors['epasswordNumber'];?>
                                                    <?php if(isset($errors['epasswordleters'])) echo $errors['epasswordleters'];?>
                                            </div>
                                </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">الإيميل</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label >تأكيد كلمة المرور</label>
                                            <input type="password" class="form-control rounded" name="confpassword" placeholder="Please Enter confirm password "/>
                                        </div>
                                        <div style="font-size: 15px;color:red;color:red;padding: 1%;">
                                        <?php if(isset($errors['epasswordConf'])) echo $errors['epasswordConf'];?>
                                            </div>
                                    </div>                                   
                                    <a href="login.php"style="text-decoration: none;">هل لديك حساب؟ تسجيل الدخول</a>
                                    <div class="clearfix">
                                        <button class="btn btn-primary d-grid gap-2 col-3 mx-auto" name="register">تسجيل</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <script src="../js/feather-icons/feather.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
<?php
include('footer.php');
?>
<script>
    $('#delete').click(function(){
        return confirm('Are You Sure !!');
    });
</script>