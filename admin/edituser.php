<?php
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name']!="") 
{
include("mainheader.php"); 
include("header.php"); 
require("dbconnections.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SirFix</title>

</head>
<body>

<div id="main">
<div class="main-content container-fluid">
        <div class="page-title">
            <h3>USERS MANAGE</h3>
        </div>

        <section class="section"style="width:100%;margin-bottom:10%;">
            <div class="card col-md-9"style="width:100%">
                <div class="row mb-4">
                    <div class="col-md-12" >
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h1 class="card-title"style="margin: auto;font-size:30px;">تعديل بيانات المستخدمين</h1>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12"style="padding:20px;">
                            <div class="card-body px-0 pb-0">
                                <p>
                                  
<?php
if(isset($_GET['action'],$_GET['id']) && $_GET['action']=='edit' )
{
    $getid=$_GET['id'];
 $stm = $con->prepare("select u.id'id',u.name'name',u.password'password',u.email'email',u.phone'phone',p.id'idprivaliges',p.permission'permission'from users u join privaliges p on(u.id_privaliges=p.id) where u.id=:id");

 $stm->execute(array("id"=>$getid));
 if ($stm->rowCount()) {
   
     foreach ($stm->fetchAll() as $row) {
         $getid = $row['id'];
         $getname = $row['name'];
         $getpassword = $row['password'];
         $getemail = $row['email'];
         $getphone = $row['phone'];
         $getpermission = $row['permission'];
         $getidprivaliges = $row['idprivaliges'];
       
                                        if(isset($_POST['submit']))    
                                        {
                                            $id=$_POST['id'];
                                            $name=trim($_POST['name']);
                                            $password=trim($_POST['password']);
                                            $pass=sha1($password);
                                            $confpassword=trim($_POST['confpassword']);
                                            $email=trim($_POST['email']);
                                            $phone=trim($_POST['phone']);
                                            $permission_id=$_POST['permission_id'];//$_POST['permission']
                                            $errors=array();
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
                                            elseif(strlen($phone)>14)
                                            {
                                                $errors['ephoneleters']="<div style='color=red'>رقم الهاتف غير صحيح</div>";
                                            }
                                            else
                                            {                                                
                                                $query="update users set name=? , password=? , email=? , phone=? , id_privaliges=? where id=? ";
                                                $sql=$con->prepare($query);
                                                $sql->execute(array($name,$pass,$email,$phone,$permission_id,$id));
                                                if ($stm->rowCount()) {
                                                    ?>
                                                    <div id="myModal" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <!-- dialog body -->
                                                            <div class="modal-body">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                Hello world!
                                                            </div>
                                                            <!-- dialog buttons -->
                                                            <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                   <?php 
                                                //     echo "<script>
                                                //     alert('تم تعديل بيانات المستخدم');
                                                //     header('location:index.php');
                                                //      </script> 
                                                //     ";
                                                // } else {
                                                //     echo "<div class='alert alert-danger'>لم يتم تعديل بيانات المستخدم</div>";
                                                 }
                                                
                                            }

                                        }

                                    ?>



                                </p>

                                <form class="input-group mb-3" method="post">
                                <input type="hidden" name="id" value="<?php echo $getid ?>"/>                                            
    
                                            <div  class="form-text"style="font-size:20px;">اسم المستخدم</div>
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="text" name="name" class="form-control rounded" placeholder="Please Enter your Name " value="<?php echo $getname ?>"/>                                            
                                            </div>
                                            <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                <?php if(isset($errors['ename'])) echo $errors['ename'];?>
                                                <?php if(isset($errors['enameNumber'])) echo $errors['enameNumber'];?>
                                                <?php if(isset($errors['enameNumberleters'])) echo $errors['enameNumberleters'];?>
                                            </div>
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">كلمة المرور
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="text" class="form-control rounded" name="password" placeholder="Please Enter password " value="<?php echo $getpassword ?>"/>
                                                </div>
                                                <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['epassword'])) echo $errors['epassword'];?>
                                                    <?php if(isset($errors['epasswordNumber'])) echo $errors['epasswordNumber'];?>
                                                    <?php if(isset($errors['epasswordleters'])) echo $errors['epasswordleters'];?>
                                            </div>
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">تأكيد كلمة المرور
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="text" class="form-control rounded" name="confpassword" placeholder="Please Enter confirm password " value="<?php echo $getpassword ?>"/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                        <?php if(isset($errors['epasswordConf'])) echo $errors['epasswordConf'];?>
                                        </div>
                                        
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">الإيميل
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="enail" class="form-control rounded" name="email" placeholder="PLease Enter Eamil " value="<?php echo $getemail ?>"/>
                                            </div>                                                                                    
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">رقم الهاتف
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="tel" class="form-control rounded" name="phone" placeholder="Please Enter your Name " value="<?php echo $getphone ?>"/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ephone'])) echo $errors['ephone'];?>
                                                    <?php if(isset($errors['ephoneleters'])) echo $errors['ephoneleters'];?>                                                    
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                        <div  class="form-text"style="font-size:20px;">نوع المستخدم
                                                <select class="form-control" name="permission_id" >
                                                <option value=<?php echo $getidprivaliges?>selected><?php echo $getpermission?></option>

                                               <?php
                                        $query="select * from privaliges where id!=?";
                                        $sql=$con->prepare($query);
                                        $sql->execute(array($getidprivaliges));
                                        if($sql->rowCount())
                                        {
                                            foreach($sql->fetchAll() as $row)
                                            {
                                                ?>
                                                <option value=<?php echo $row['id']?>><?php echo $row['permission']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                                </select>
                                        </div>

                                        <div class="input-group mb-3" style="margin-top:5%;">
                                        <div style="margin: auto;">
                                                <button type="submit" name="submit" class="btn btn-primary">EDIT</a>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                        </div>
                                        </div>

                                    </div>                                                            
                                </form>
                                <?php } } } ?>
                            </div>
                        </div>
                </div>
            </div>



        </section>
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


<script>
    $("#myModal").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#myModal a.btn").on("click", function(e) {
            console.log("button pressed");   // just as an example...
            $("#myModal").modal('hide');     // dismiss the dialog
        });
    });
        
    $("#myModal").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#myModal a.btn").off("click");
    });
            
    $("#myModal").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#myModal").remove();
    });
            
    $("#myModal").modal({                    // wire up the actual modal functionality and show the dialog
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true                     // ensure the modal is shown immediately
    });
</script>