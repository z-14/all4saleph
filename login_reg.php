<?php
session_start();
error_reporting(0);
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

$u = safe($_POST["username"]); 
$p= $_POST["password"]; 
$hash = $_POST["hash"]; 
$email = $_POST["email"];
$p2	= md5($p);
$u = strtolower("$u");
//echo "$username $password2";
//exit;

#$ad_date = $_POST["ad_date"]; 




$sql="SELECT * FROM u WHERE u_u = '$u' AND u_pass = '$p2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

session_name("art");
$_SESSION["error"]="";

    while($row = $result->fetch_assoc()) {
$u_id =$row["u_id"];
$u_u =$row["u_u"];
$merchant =$row["merchant"];
$email =$row["email"];
    }
    
    $_SESSION["merchant"] = $merchant;
    $_SESSION["email"] = $email;
    
    include ('set_cookie.php');
	echo "logging in..." ;
	header("location:../all4sale.ph")
    }else{
    	echo 'error occured: username and password did not match';
					session_name("art");
					$_SESSION["error"]=$error;
				
    	}
    	
$_SESSION["interface"] = "mobile";    	
?>