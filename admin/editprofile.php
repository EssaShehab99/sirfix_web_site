<?php
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name']!="") 
{
require_once("dbconnections.php");
include_once("mainheaderprofile.php");

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
//if(isset($_GET['action'],$_GET['id']) && $_GET['action']=='editprofile' )
{
    $getid=$_GET['id'];
$sql="select u.id'id',u.name'name',u.password'password',u.email'email',u.phone'phone',u.country'country',u.profile_img'profile_img',CONCAT(c.name_ar, ',', c.name_en) AS namecountry from users u join country c on(u.country=c.id) where u.id=?";
$stm = $con->prepare($sql);
$stm->execute(array($getid));
if ($stm->rowCount()) {
    foreach ($stm->fetchAll() as $row) {
        $getid = $row['id'];
        $getname = $row['name'];
        //$getpassword = sha1($row['password']);
        $getemail = $row['email'];
        $getphone = $row['phone'];
        $getcountryid= $row['country'];
        $getcountry= $row['namecountry'];
        $getprofile_img= $row['profile_img'];
    }
}
}

if(isset($_POST['editbtn']))
{
    $id=$_GET['id'];
    $name=trim($_POST['name']);
    $password=trim($_POST['password']);
    $pass=sha1($password);
    $confpassword=trim($_POST['confpassword']);
    $email=trim($_POST['email']);
    $phone=trim($_POST['phone']);
    $country=$_POST['country'];
    $filename = $_FILES["upload"]["name"];
    $temp = $_FILES["upload"]["tmp_name"];
    $folder = "Img/".$filename;
    move_uploaded_file($temp ,$folder);
    $errors=array();
    if(empty($name))
    {
        $errors['ename']="<div style='color=red'>ادخل الاسم</div>";
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
    $query="update users set name=? , password=? , email=? , phone=? , country=?,profile_img=? where id=? ";
    $sql=$con->prepare($query);
    $sql->execute(array($name,$pass,$email,$phone,$country,$folder,$id));
    if ($stm->rowCount()) {
        ?>
        echo "<div class='alert alert-success'>تم تعديل بياناتك بنجاح</div>";
       <?php 
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
                                <h3>Edit Profile</h3>
                            </div>
                            <form action="" method="POST"  enctype="multipart/form-data">
                                
                            <div class="container">
                                <div class="picture-container">
                                    <div class="picture">
                                        <input type="file" name="upload" id="wizard-picture" class="">
                                        <img src="<?php echo$getprofile_img;?>" class="picture-src" id="wizardPicturePreview" title="">
                                    </div>
                                    <h6 class="">اختر صورة</h6>
                                </div>
                            </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">اسمك الكامل</label>
                                            <input type="text" id="first-name-column" class="form-control"  name="name" value="<?php echo$getname?>">
                                        </div>
                                        <div style="font-size: 15px;color:red;margin-top:-8px;color:red;padding: 1%;">
                                                <?php if(isset($errors['ename'])) echo $errors['ename'];?>
                                                <?php if(isset($errors['enameNumber'])) echo $errors['enameNumber'];?>
                                                <?php if(isset($errors['enameNumberleters'])) echo $errors['enameNumberleters'];?>
                                            </div>

                                    </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">الدولة</label>
                                        <select class="form-control" name="country">
                                        <option value=<?php echo $getcountryid?>selected><?php echo $getcountry?></option>
                                            <?php
                                                $query="select * from country where id!=?";
                                                $sql=$con->prepare($query);
                                                $sql->execute(array($getcountryid));
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
                                        <input type="tel" class="form-control rounded" name="phone" value="<?php echo$getphone?>" placeholder="Please Enter your Phone Number"/>
                                    </div>
                                    <div style="font-size: 15px;color:red;margin-top:-8px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ephone'])) echo $errors['ephone'];?>
                                                    <?php if(isset($errors['ephonenu'])) echo $errors['ephonenu'];?>
                                                    <?php if(isset($errors['ephoneleters'])) echo $errors['ephoneleters'];?>                                                    
                                            </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">كلمة المرور</label>
                                        <input type="password" class="form-control rounded" name="password" value="" placeholder="Please Enter password "/>
                                    </div>
                                    <div style="font-size: 15px;color:red;margin-top:-8px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['epassword'])) echo $errors['epassword'];?>
                                                    <?php if(isset($errors['epasswordNumber'])) echo $errors['epasswordNumber'];?>
                                                    <?php if(isset($errors['epasswordleters'])) echo $errors['epasswordleters'];?>
                                            </div>
                                </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">الإيميل</label>
                                            <input type="email" id="email-id-column" class="form-control" name="email" value="<?php echo$getemail?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label >تأكيد كلمة المرور</label>
                                            <input type="password" class="form-control rounded" name="confpassword" value="" placeholder="Please Enter confirm password "/>
                                        </div>
                                        <div style="font-size: 15px;color:red;margin-top:-8px;color:red;padding: 1%;">
                                        <?php if(isset($errors['epasswordConf'])) echo $errors['epasswordConf'];?>
                                        </div>
                                    </div>                                   
                                    <a href="login.php"style="text-decoration: none;">Have an account? Login</a>
                                    <div class="clearfix">
                                        <button class="btn btn-primary d-grid gap-2 col-3 mx-auto" name="editbtn">تعديل</button>
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

}
else
{
  header('Location: ../index.php');
}
?>
