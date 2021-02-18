<?
error_reporting(0);
session_start();
if($_POST["key"]=="ha7aidhadf829j2"){
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
}
session_name("art");
echo md5($_SESSION["u_id"]);
?>