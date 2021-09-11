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
            <h3>تعديل أجهزة تسوق</h3>
        </div>

        <section class="section"style="width:100%;margin-bottom:10%;">
            <div class="card col-md-9"style="width:100%">
                <div class="row mb-4">
                    <div class="col-md-12" >
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h1 class="card-title"style="margin: auto;font-size:30px;">تعديل بيانات الأجهزة</h1>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-12"style="padding:20px;">
                            <div class="card-body px-0 pb-0">
                                <p>
                                  
<?php
if(isset($_GET['action'],$_GET['id']) && $_GET['action']=='edit' )
{
    $id=$_GET['id'];
 $stm = $con->prepare("select d.id'id',d.device_name'name',d.statue'statue',d.price'price',d.description'description',d.available'available',c.id'categoryid',c.categorie_name'category_name'from devices d join categories c on(d.categorie_id=c.id) where d.id=:id");

 $stm->execute(array("id"=>$id));
 if ($stm->rowCount()) {
   
     foreach ($stm->fetchAll() as $row) {
         $id = $row['id'];
         $name = $row['name'];
         //$statue = $row['statue'];
         $price = $row['price'];
         $desc = $row['description'];
         $cat_name = $row['category_name'];
         $categoryid = $row['categoryid'];

       
         if(isset($_POST['submit']))    
         {
             $id=($_POST['id']);
             $name=trim($_POST['name']);
             $cat=trim($_POST['cate_id']);
             $price=trim($_POST['price']);
             $description=$_POST['desc'];//$_POST['permission'];
             //$statue=1;
             //$avail=0;
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
                 $errors['dcat']="<div style='color=red'>ادخل نوع الصنف</div>";
                 
             }
             elseif(is_numeric($cat))
             {
                 $errors['number_cat']="<div style='color=red'> اسم الجهاز يجب ان تحتوي نص</div>";
             }
             
             
             elseif(empty($price))
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
                                                $query="update devices set device_name=? , categorie_id=? , price=? , description=? where id=?";
                                                $sql=$con->prepare($query);
                                                $sql->execute(array($name,$cat,$price,$description,$id));
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
                                                     echo "<script>
                                                     alert('تم تعديل بيانات الجهاز');
                                                     window.open('devicerequest.php','_self');
                                                      </script> 
                                                     ";
                                                 } else {
                                                     echo "<div class='alert alert-danger'>لم يتم تعديل بيانات الجهاز</div>";
                                                 }
                                                
                                            }

                                        }

                                    ?>



                                </p>

                                <form class="input-group mb-3" method="post">
                                <input type="hidden" name="id" value="<?php echo $id ?>"/>                                            
    
                                <div  class="form-text"style="font-size:20px;"> اسم الجهاز</div>
                                            <div class="input-group mb-3">                                                                                    
                                                <input type="text" name="name" class="form-control rounded" placeholder="Please Enter Name of device" value="<?php echo $name ?>"/>/>                                            
                                            </div>
                                            <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                <?php if(isset($errors['dname'])) echo $errors['dname'];?>
                                                <?php if(isset($errors['dnameNumber'])) echo $errors['dnameNumber'];?>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                        <div  class="form-text"style="font-size:20px;">نوع الصنف
                                                <select class="form-control" name="cate_id" >
                                                <option value=<?php echo $categoryid?>selected><?php echo $cat_name?></option>

                                               <?php
                                        $query="select * from categories where id=?";
                                        $sql=$con->prepare($query);
                                        $sql->execute(array($categoryid));
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



                                    

                                        <div  class="form-text"style="font-size:20px;">السعر
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="number" class="form-control rounded" name="price" placeholder="PLease Enter price" value="<?php echo $price ?>"/>
                                         </div> 
                                            <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                <?php if(isset($errors['dprice'])) echo $errors['dprice'];?>
                                            </div>                                                                                   
                                        </div>

                                        <div  class="form-text"style="font-size:20px;"> وصف الجهاز
                                        <div class="input-group mb-3">                                                                                    
                                            <input type="text" class="form-control rounded" name="desc" placeholder="Please Enter description" value="<?php echo $desc?>"/>
                                            </div>                                            
                                        <div style="font-size: 15px;color:red;margin-top:-25px;color:red;padding: 1%;">
                                                    <?php if(isset($errors['ddescription'])) echo $errors['ddescription'];?>
                                                    <?php if(isset($errors['ddescnum'])) echo $errors['ddescnum'];?>                                                    
                                            </div>
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