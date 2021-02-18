<?php 
error_reporting(0);
if(!isset($_SESSION["u_u"])){
session_set_cookie_params(604800,"/");
session_start();
session_name("art");
$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];
$admin = $_SESSION["admin"];
$lang = $_SESSION["lang"];
$limit=$_SESSION["limit"];
$merchant = $_SESSION['merchant'];
$u_email=$_SESSION['email'];
}


?>
