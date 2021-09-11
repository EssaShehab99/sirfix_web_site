<?php
session_start();
if(isset($_GET['action']) && $_GET['action']=='logout' )
{
if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name']!="") 
{
    $_SESSION['sess_user_id']="";
    $_SESSION['sess_user_name']="";
    $_SESSION['sess_user_email']="";
    $_SESSION['sess_user_privaliges']="";
    $_SESSION['sess_user_img']="";
    if(empty($_SESSION['sess_user_id']))
    {
       session_destroy();
    echo"<script>window.open('../index.php')</script>";
    }
}
}
?>