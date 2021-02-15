<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include ("globalconfig.php");
$referer = $_SERVER['HTTP_REFERER']; 
$server = $_SERVER['SERVER_NAME'];
$url = $_SERVER['PHP_SELF'];
$referer2 = explode ( '/', $referer);
$referer3 = $referer2 [2]; 
if ($referer3 == $server ) {
} else {
echo "<br>oooopppppzzzz! Your computer must be infected by a virus or malware that is preventing you to access this section!";
print "<script>";
//print "self.location='/';";
print "</script>";
include ('logout.php');
}
include ('sql.php');

function safe($str){
	$str2 = htmlspecialchars($str, ENT_QUOTES);
	return($str2);
	}
	
function safeStr($str){
	$str2=htmlspecialchars_decode($str);
	return($str2);
}

$d = safe($_POST["d"]); 



$data = explode(":",$d);

$fb_id = $data[0];
$u = $data[1];
$email = $data[1];
$fb_name = $data[2];
$pass = $data[3];


$passcode = md5($fb_id . $email . $fb_name);



if($pass != $passcode){
echo "error occured";
exit;
}

function registerFB($u,$fb_name,$fb_id,$fb_email){

include ('sql.php');
$u_regdate_num = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
$sql = "INSERT INTO `u` (`u_u`,`fb_name`,`fb_id`,`u_email`,`u_regdate_num`)
 VALUES ('$fb_id','$fb_name','$fb_id','$fb_email','$u_regdate_num');";
if ($conn->query($sql) === TRUE) {

	//$last_id = $conn->insert_id;
    //echo "successfully updated";
} else {
    //$sql."Error updating record: " . $conn->error;
}

}


function updateFB($fb_name,$u_id){

include ('sql.php');
 
$sql="UPDATE `u` SET `fb_name`='$fb_name' WHERE `u_id` = '$u_id'";  
if ($conn->query($sql) === TRUE) {

    //echo "successfully updated";
} else {
    //$sql."Error updating record: " . $conn->error;
}

}






function getuid($fb_id){
include ('sql.php');
$sql="SELECT * FROM u WHERE fb_id = '$fb_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
return $u_id =$row["u_id"];
    }
}
	
}







$sql="SELECT * FROM u WHERE u_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

session_name("art");
$_SESSION["error"]="";

    while($row = $result->fetch_assoc()) {
$u_id =$row["u_id"];
$u_u =$row["u_u"];
$merchant =$row["merchant"];
$email =$row["email"];
$blocked=$row["blocked"];
    }
    updateFB($fb_name,$u_id);
    
    $_SESSION["merchant"] = $merchant;
    $_SESSION["email"] = $email;
    $_SESSION["blocked"] =$blocked;
    
    include ('set_cookie.php');
	echo "logging in..." ;

    }else{
	
	registerFB($u,$fb_name,$fb_id,$email);
	$u_id =	getuid($fb_id);
	$u_u = $fb_name;	
	 $_SESSION["email"] = $email;
	include ('set_cookie.php');
	echo "logging in..." ;
		
    }
    	
$_SESSION["interface"] = "mobile";    	
?>