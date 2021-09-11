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
<script type="text/javascript" src="../js/clock.js"></script>
<title>SirFix</title>


</head>
<body onLoad="showTime(),fade()">
<div class="wrapper">
    	<div class="top-bar">
        	<p class="clock" id="MyClockDisplay"></p>
            
			<p class="marquee">
                
            </p>
        </div>
                  <?php
                    if (isset($_GET['action'], $_GET['id'])) {
                        $id = $_GET['id'];
                        switch ($_GET['action']) {
                            case "delete":
                                $stm = $con->prepare("delete from  connectwithus where id=:id");
                                $stm->execute(array("id"=>$id));
                                if($stm->rowCount()==1)
                                {
                                    echo "<div class='alert alert-success'> One Row Deleted</div>";
                                }
                                break;
                                case "readen":
                                $stm = $con->prepare("update  connectwithus set readen=1 where id=:id");
                                $stm->execute(array("id"=>$id));
                                if($stm->rowCount()==1)
                                {
                                    echo "<div class='alert alert-success'>تم اضافة الرقم</div>";
                                }
                                break;
                                case "unreaden":
                                $stm = $con->prepare("update  connectwithus set readen=0 where id=:id");
                                $stm->execute(array("id"=>$id));
                                if($stm->rowCount()==1)
                                {
                                    echo "<div class='alert alert-success'>تم الغاء الاضافة</div>";
                                }
                                break;

                            default:
                                echo "ERROR";
                                break;
                        }
                    }

?>

<div id="main">
<div class="main-content container-fluid">
        <div class="page-title">
            <h3>Whatsapp MANAGE</h3>
        </div>

        <section class="section"style="width:100%;margin-bottom:10%;">
               


            <div class="main-content container-fluid">
                <div class="row mb-4">
                    <div class="col-md-9"style="width:100%">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title"style="margin: auto;font-size:30px;">قائمة الرسائل</h4>
                                <div class="d-flex ">
                                </div>
                            </div>
                            <div class="card-body px-0 pb-0">
                                <div class="table-responsive">
                                    <table class='table mb-0' id="table1">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>name</th>
                                                <th>email </th>
                                                <th>message</th>
                                                <th>readen </th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $stm = $con->prepare("select * from connectwithus");
                                    $stm->execute();
                                    if ($stm->rowCount()) {
                                        foreach ($stm->fetchAll() as $row) {
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $message = $row['message'];
                                            $readen = $row['readen'];
                                            


                                    ?>
                                            <tr>
                                            
                                                <td><?php echo $id;?></td>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $email;?></td>
                                                <td><?php echo $message;?></td>
                                                <td><?php echo $readen;?></td>
                                                <td>
                                                <a href="?action=delete&id=<?php echo$id?>" class='badge btn-success' id='delete'>Delete</a>
                                                <a href="?action=readen&id=<?php echo$id?>" class="badge btn-success" id="readen">Readen</a>
                                                <a href="?action=unreaden&id=<?php echo$id?>" class="badge btn-danger"id="unreaden">unreaden</a>
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
<script>
    $('#delete').click(function(){
        return confirm('Are You Sure !!');
    });
</script>
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