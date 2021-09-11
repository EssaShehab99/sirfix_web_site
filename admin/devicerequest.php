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
            <h3>أجهزة تسوق</h3>
        </div>

        <section class="section"style="width:100%;margin-bottom:10%;">
            <div class="card col-md-9"style="width:100%">
                <div class="row mb-4">
                    <div class="col-md-12" >
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h1 class="card-title"style="margin: auto;font-size:30px;">إضافة أجهزة</h1>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12"style="padding:20px;">
                            <div class="card-body px-0 pb-0">
                                <p>
                                    <?php

                                        if(isset($_POST['submit']))    
                                        {
                                            $name=trim($_POST['name']);
                                            $cat=trim($_POST['category']);
                                            $price=trim($_POST['price']);
                                            $description=$_POST['desc'];//$_POST['permission']
                                            $statue=1;
                                            $avail=0;
                                            $errors=array();
                                            if(empty($name))
                                            {
                                                $errors['dname']="<div style='color=red'>ادخل اسم الجهاز</div>";
                                            }
                                            elseif(is_numeric($name))
                                            {
                                                $errors['dnameNumber']="<div style='color=red'>اسم الجهاز يجب ان يكون نص</div>";
                                            
                                            }
                                            
                                            elseif(empty($cat))
                                            {
                                                $errors['dcat']="<div style='color=red'>ادخل كلمة المرور</div>";
                                                
                                            }
                                            elseif(is_numeric($cat))
                                            {
                                                $errors['number_cat']="<div style='color=red'> اسم الجهاز يجب ان تحتوي نص</div>";
                                            }                                            
                                            elseif(empty($price))
                                            {
                                                $errors['dprice']="<div style='color=red'>ادخل سعر الجهاز</div>";
                                            }  
                                            elseif(is_numeric($price))
                                            {
                                                $errors['dprice']="<div style='color=red'>ادخل سعر الجهاز</div>";
                                            }
                                            if(empty($description))
                                            {
                                                $errors['ddescription']="<div style='color=red'>ادخل وصف الجهاز</div>";
                                            }
                                            elseif(is_numeric($description))
                                            {
                                                $errors['ddescnum']="<div style='color=red'> ادخل نص لوصف الجهاز</div>";
                                            
                                            }
                                            
                                            else
                                            {                                                
                                                $query="insert into devices(statue,device_name,categorie_id,price,description) values(?,?,?,?,?)";
                                                $sql=$con->prepare($query);
                                                $sql->execute(array($statue,$name,$cat,$price,$description));
                                                if($sql->rowCount())
                                                {
                                                            echo "<div class='alert alert-success'> تمت اضافة جهاز </div>";
                                                }
                                                else
                                                {
                                                    echo"<div class='alert alert-danger'> لم تتم اضافة جهاز</div>";
                                                }
                                                
                                            }

                                        }

       
                                        if (isset($_GET['action'], $_GET['id'])) 
                                        {
                                            if($_GET['action']=="delete")
                                            {
                                                    $id = $_GET['id'];
                                                    $stm = $con->prepare("delete from devices where id=:id");
                                                    $stm->execute(array("id"=>$id));
                                                    if($stm->rowCount()==1)
                                                    {
                                                        echo "<div class='alert alert-success'> تم حذف الجهاز بنجاح</div>";
                                                        }
                                                    else
                                                    {   
                                                        echo "<div class='alert alert-danger'> لم تتم عملية حذف الجهاز </div>";
                                                    }
                                            
                                            }
                                        }
                                               
                                        if (isset($_GET['action'], $_GET['id'])) 
                                        {
                                            if($_GET['action']=="active")
                                            {
                                                    $id = $_GET['id'];                       
                                                    $stm = $con->prepare("update devices set statue='1' where id=:id");
                                                    $stm->execute(array("id"=>$id));
                                                    if($stm->rowCount()==1)
                                                    {
                                                        echo "<div class='alert alert-success'>  الكمية متوفرة</div>";
                                                    }
                                                  else
                                                  {
                                                    echo "<div class='alert alert-danger'>  الكمية غير متوفرة  </div>";

                                                  }
                                            }
                                        }
                                        if (isset($_GET['action'], $_GET['id'])) 
                                        {
                                            if($_GET['action']=="inctive")
                                            {
                                                    $id = $_GET['id'];                       
                                                    $stm = $con->prepare("update devices set statue='0' where id=:id");
                                                    $stm->execute(array("id"=>$id));
                                                    if($stm->rowCount()==1)
                                                    {
                                                        echo "<div class='alert alert-success'>  الكمية غير متوفرة</div>";
                                                    }
                                                     else
                                                  {
                                                    echo "<div class='alert alert-danger'>  الكمية متوفرة  </div>";

                                                  }
                                                    
                                            }
                                        }


                    ?>


                                </p>

                                <form class="input-group mb-3" method="post">
                                <input type="hidden" name="id"/>                                            
                                        
                                            <div  class="form-text"style="font-size:20px;"> اسم الجهاز</div>
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="text" name="name" class="form-control rounded" placeholder="Please Enter Name of device"/>                                            
                                            </div>
                                            <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                <?php if(isset($errors['dname'])) echo $errors['dname'];?>
                                                <?php if(isset($errors['dnameNumber'])) echo $errors['dnameNumber'];?>
                                            </div>
                                        </div>

                                        <div  class="form-text"style="font-size:20px;"> نوع الصنف
                                            <div class="input-group mb-3">                                                                                    
                                             <select class="form-control" name="category">
                                                <?php
                                        $query="select * from categories";
                                        $sql=$con->prepare($query);
                                        $sql->execute();
                                        if($sql->rowCount())
                                        {
                                            foreach($sql->fetchAll() as $row)
                                            {
                                                ?>
                                                <option value=<?php echo $row['id']?>><?php echo $row['categorie_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                                </select>
                                            </div>
                                        </div>

                                        

                                        <div  class="form-text"style="font-size:20px;">السعر
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="text" class="form-control rounded" name="price" placeholder="PLease Enter price"/>
                                         </div> 
                                            <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                <?php if(isset($errors['dprice'])) echo $errors['dprice'];?>
                                            </div>                                                                                   
                                        </div>

                                        <div  class="form-text"style="font-size:20px;"> وصف الجهاز
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="text" class="form-control rounded" name="desc" placeholder="Please Enter description"/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ddescription'])) echo $errors['ddescription'];?>
                                                    <?php if(isset($errors['ddescnum'])) echo $errors['ddescnum'];?>                                                    
                                            </div>
                                        </div>

                                        

                                        <div class="input-group mb-3" style="margin-top:5%;">
                                        <div style="margin: auto;">
                                                <button type="submit" name="submit" class="btn btn-primary">Add device</button>
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
                                <h4 class="card-title"style="margin: auto;font-size:30px;">قائمة الأجهزة</h4>
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
                                                <th>statue</th>
                                                <th>price</th>
                                                <th>description</th>
                                                <th>available</th>
                                                <th>category_name</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $stm = $con->prepare("select d.id'id',d.device_name'name',d.statue'statue',d.categorie_id'categoryid',d.price'price',d.description'description',d.available'available',c.categorie_name'categorie_name'from devices d join categories c on(d.categorie_id=c.id)");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $statue = $row['statue'];
                                            $price = $row['price'];
                                            $description  = $row['description'];
                                            $avail = $row['available'];
                                            $cat_name = $row['categorie_name'];




                                    ?>
                                            <tr>
                                            
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $statue;?></td>
                                                <td><?php echo $price;?></td>
                                                <td><?php echo $description;?></td>
                                                <td><?php echo $avail;?></td>
                                                <td><?php echo $cat_name;?></td>
                                                <td>

                                                <a href="editdevice.php?action=edit&id=<?php echo$id?>" class="badge btn-success">Edit</a>
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
    $('#delete').click(function(){
        return confirm('Are You Sure !!');
    });
</script>