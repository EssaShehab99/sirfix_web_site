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
                            <h1 class="card-title"style="margin: auto;font-size:30px;">اضافة مستخدم</h1>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12"style="padding:20px;">
                            <div class="card-body px-0 pb-0">
                                <p>
                                    <?php

                                        if(isset($_POST['btnadd']))    
                                        {
                                            $name=trim($_POST['name']);
                                            $password=trim($_POST['password']);
                                            $pass=sha1($password);
                                            $confpassword=trim($_POST['confpassword']);
                                            $email=trim($_POST['email']);
                                            $phone=trim($_POST['phone']);
                                            $permission=$_POST['permission'];//$_POST['permission']
                                            $statue=1;
                                            $profile_img=0;
                                            $country=$_POST['country'];
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
                                                $query="insert into users(name,password,email,phone,id_privaliges,statue,profile_img,country ) values(?,?,?,?,?,?,?,?)";
                                                $sql=$con->prepare($query);
                                                $sql->execute(array($name,$pass,$email,$phone,$permission,$statue,$profile_img,$country));
                                                if($sql->rowCount())
                                                {
                                                            echo "<div class='alert alert-success'>تم اضافة مستخدم جديد </div>";
                                                }
                                                else
                                                {
                                                    echo"<div class='alert alert-danger'>لم يتم اضافة المستخدم</div>";
                                                }
                                                
                                            }

                                        }

       
                                        if (isset($_GET['action'], $_GET['id'])) 
                                        {
                                            if($_GET['action']=="delete")
                                            {
                                                    $id = $_GET['id'];
                                                    $stm = $con->prepare("delete from users where id=:id");
                                                    $stm->execute(array("id"=>$id));
                                                    if($stm->rowCount()==1)
                                                    {
                                                        echo "<div class='alert alert-success'> تم حذف المستخدم بنجاح</div>";
                                                        }
                                                    else{   
                                                        echo "<div class='alert alert-danger'> لم تتم عملية حذف المستخدم </div>";
                                                        }
                                            
                                            }
                                        }
                                               
                                        if (isset($_GET['action'], $_GET['id'])) 
                                        {
                                            if($_GET['action']=="active")
                                            {
                                                    $id = $_GET['id'];                       
                                                    $stm = $con->prepare("update users set statue='1' where id=:id");
                                                    $stm->execute(array("id"=>$id));
                                                    if($stm->rowCount()==1)
                                                    {
                                                        echo "<div class='alert alert-success'> تم تفعيل المستخدم </div>";
                                                    }
                                                    else{
                                                    echo "<div class='alert alert-danger'> لم تتم عملية تفعيل المستخدم</div>";
                                                    }
                                            }
                                        }
                                        if (isset($_GET['action'], $_GET['id'])) 
                                        {
                                            if($_GET['action']=="inctive")
                                            {
                                                    $id = $_GET['id'];                       
                                                    $stm = $con->prepare("update users set statue='0' where id=:id");
                                                    $stm->execute(array("id"=>$id));
                                                    if($stm->rowCount()==1)
                                                    {
                                                        echo "<div class='alert alert-success'> تم ايقاف المستخدم </div>";
                                                    }
                                                    else{
                                                        echo "<div class='alert alert-danger'> لم تتم عملية ايقاف المستخدم</div>";
                                                    }
                                            }
                                        }


                    ?>


                                </p>

                                <form class="input-group mb-3" method="post">
                                <input type="hidden" name="id"/>                                            
                                        
                                            <div  class="form-text"style="font-size:20px;">اسم المستخدم</div>
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="text" name="name" class="form-control rounded" placeholder="Please Enter your Name "/>                                            
                                            </div>
                                            <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                <?php if(isset($errors['ename'])) echo $errors['ename'];?>
                                                <?php if(isset($errors['enameNumber'])) echo $errors['enameNumber'];?>
                                                <?php if(isset($errors['enameNumberleters'])) echo $errors['enameNumberleters'];?>
                                            </div>
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">كلمة المرور
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="password" class="form-control rounded" name="password" placeholder="Please Enter password "/>
                                                </div>
                                                <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['epassword'])) echo $errors['epassword'];?>
                                                    <?php if(isset($errors['epasswordNumber'])) echo $errors['epasswordNumber'];?>
                                                    <?php if(isset($errors['epasswordleters'])) echo $errors['epasswordleters'];?>
                                            </div>
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">تأكيد كلمة المرور
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="password" class="form-control rounded" name="confpassword" placeholder="Please Enter confirm password "/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                        <?php if(isset($errors['epasswordConf'])) echo $errors['epasswordConf'];?>
                                            </div>
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">الإيميل
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="email" class="form-control rounded" name="email" placeholder="PLease Enter Eamil "/>
                                            </div>                                                                                    
                                        </div>

                                        <div  class="form-text"style="font-size:20px;">رقم الهاتف
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="tel" class="form-control rounded" name="phone" placeholder="Please Enter your Name "/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ephone'])) echo $errors['ephone'];?>
                                                    <?php if(isset($errors['ephoneleters'])) echo $errors['ephoneleters'];?>                                                    
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                        <div  class="form-text"style="font-size:20px;">الدولة
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

                                        <div  class="form-text"style="font-size:20px;">اختر صورة
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="file" class="form-control rounded" id="customFile" placeholder="Please Enter your Name "/>  
                                            </diV>
                                        </diV>

                                        
                                        <div class="form-group mb-3">
                                        <div  class="form-text"style="font-size:20px;">نوع المستخدم
                                                <select class="form-control" name="permission">
                                                <?php
                                        $query="select * from privaliges";
                                        $sql=$con->prepare($query);
                                        $sql->execute();
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
                                                <button type="submit" name="btnadd" class="btn btn-primary">Add User</button>
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                        </div>
                                        </div>

                                    </div>                                                            
                                </form>
                            </div>
                        </div>
                </div>
            </div>


            <div class="main-content container-fluid">
                <div class="row mb-4">
                    <div class="col-md-9"style="width:100%">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title"style="margin: auto;font-size:30px;">قائمة المستخدمين</h4>
                                <div class="d-flex ">
                                </div>
                            </div>
                            <div class="card-body px-0 pb-0">
                                <div class="table-responsive">
                                    <table class='table mb-0' id="table1">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>privaliges</th>
                                                <th>statue</th>
                                                <th>country</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $stm = $con->prepare("select u.id'id',u.name'name',u.password'password',u.email'email',u.phone'phone',u.statue'statue',p.permission'permission',c.name_ar'name_ar' from users u join privaliges p on(u.id_privaliges=p.id) join country c on(u.country=c.id)");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $id = $row['id'];
                                            $username = $row['name'];
                                            $userpassword = $row['password'];
                                            $useremail = $row['email'];
                                            $userphone = $row['phone'];
                                            $privaliges  = $row['permission'];
                                            $country = $row['name_ar'];
                                            $statue = $row['statue'];



                                    ?>
                                            <tr>
                                            
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $username;?></td>
                                                <td><?php echo $userpassword;?></td>
                                                <td><?php echo $useremail;?></td>
                                                <td><?php echo $userphone;?></td>
                                                <td><?php echo $privaliges;?></td>
                                                <td><?php echo $statue;?></td>
                                                <td><?php echo $country;?></td>
                                                <td>

                                                <a href="edituser.php?action=edit&id=<?php echo$id?>" class="badge btn-success">Edit</a>
                                                <a href="?action=delete&id=<?php echo$id?>" class="badge btn-danger"id="delete">Delete</a>
                                                <a href="?action=active&id=<?php echo$id?>" class="badge btn-success"id="delete">Active</a>
                                                <a href="?action=inctive&id=<?php echo$id?>" class="badge btn-danger"id="delete">Inctive</a>
                                                </td>
                                            </tr>
                                            <?php  }
                                    } else { ?>

                                        <div class='alert alert-danger'>Not Row </div>
                                    <?php } ?>


                                        </tbody>
                                    </table>
                            </div>
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
    $('#delete').click(function(){
        return confirm('Are You Sure !!');
    });
</script>