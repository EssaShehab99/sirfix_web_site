<?php
session_start();
require_once("dbconnections.php");
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name']!="") 
    {
        header('Location: index.php');
    }
    else
    {
        if(isset($_POST['enterbtn']))
            {
                $name=trim($_POST['username']);
                $password=trim($_POST['password']);
                $pass=sha1($password);
                $errors=array();
                $query="select * from users where name=? and password=?";
                $sql=$con->prepare($query);
                $sql->execute(array($name,$pass));
                $row=$sql->fetch(PDO::FETCH_ASSOC);
                if($sql->rowCount())
                {
                    $_SESSION['sess_user_id']   = $row['id'];
                    $_SESSION['sess_user_name'] = $row['name'];
                    $_SESSION['sess_user_email'] = $row['email'];
                    $_SESSION['sess_user_privaliges'] = $row['id_privaliges'];
                    $_SESSION['sess_user_img'] = $row['profile_img'];
                    header('Location:../index.php');
                   
                }
                else{
                    $errors['epassword']="<div style='color=red'> اسم المستخدم أو كلمة المرور غير صحيح</div>";
                }
            }
    }
    require_once("mainheader.php"); 

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SirFix</title>
<!-- <link href="../css/app.css" rel="stylesheet" /> -->

</head>
<body>

       
        <div class="container"style="margin-top:5%;">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="../images/logo-1.png" height="48" class='mb-4'>
                                <h3>تسجيل الدخول</h3>
                            </div>
                            <form method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example1">اسم المستخدم</label>
                                        <input type="text" class="form-control" name="username"/>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">كلمة المرور</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="password" id="password">                                        
                                    </div>
                                    <div style="font-size: 15px;color:red;margin-top:-2px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['epassword'])) echo $errors['epassword'];?>
                                            </div>
                                    <!-- <a href="#" class='float-right' style="text-decoration: none;">
                                            <small>Forgot password?</small>
                                        </a> -->
                                </div>
        
                                <div class='form-check clearfix my-4'>
                                    <!-- <div class="checkbox float-left">
                                        <input type="checkbox" id="checkbox1" class='form-check-input' >
                                        <label for="checkbox1">Remember me</label>
                                    </div> -->
                                    <div class="float-right">
                                        <a href="register.php" style="text-decoration: none;">ليس لديك حساب؟</a>
                                    </div>
                                </div>
                                <div>
                                <div class="d-grid gap-2 col-3 mx-auto" >
                                    <button class="btn btn-primary" name="enterbtn">دخول</button>
                                </div>
                                </div>
                            </form>
                         
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