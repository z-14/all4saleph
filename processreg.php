<?php
include ("globalconfig.php");
# m_year_reg.php
# include file

include("safe.php");


$u = safe($_POST["username"]); 
$p = safe($_POST["password"]); 
$email = $_POST["email"]; 
$password2	= md5($p);
$reg_date =  date('Y-j-m') ;
$reg_time =  date(' h:i:s') ;
$reg_date_num = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
include ("sql.php");


$sql = "INSERT INTO `u` (
`u_u` ,
`u_pass` ,
`u_regdate`,
`u_regdate_num`,
`u_email` 
) VALUES (\"$u\", \"$password2\", \"$reg_date\",\"$reg_date_num\", \"$email\") " ; 

if ($conn->query($sql) === TRUE) {
    include_once ("send_email.php");
	echo "Hi $u, registration is successful";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    echo "Please check your entries and try again?";
}
?>

