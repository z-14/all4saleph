<?php
$ip=$_SERVER['REMOTE_ADDR'];
$ip2 = md5($ip);
$ip = md5($ip2);
session_name("art");

$_SESSION['u_id'] = $u_id ;
$_SESSION['fb_name'] = $fb_name ;

if(empty($fb_name)){
$_SESSION['u_u'] = $u_u;
}else{
$_SESSION['u_u'] = $fb_name;
}

$sql2="SELECT * FROM `priviledges` WHERE u_id = '$u_id' LIMIT 0 , 30 ";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {

session_name("art");

while($row2 = $result2->fetch_assoc()) {
$u_id =$row2["u_id"];
$u_u =$row2["u_u"];
$admin=$row2["admin"];

$_SESSION['admin'] = $admin ;

 }
	
    }


?>
