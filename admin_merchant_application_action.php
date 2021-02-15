<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
userAccessAdmin($admin);

echo $yes=$_GET["user"];

if ($yes =="yes") 
{

echo  $p_date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

	$user = $_GET["user"];
$a = explode("-",$user);
$yes = $a[0];
$u_id = $a[1];







function updateU($merchant, $u_id){
include("sql.php");
$sql="UPDATE u SET merchant='$merchant' WHERE `u_id` = '$u_id'";
if ($conn->query($sql) === TRUE) {
    echo "Successfully Removed";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
}


function updateUP($merchant2, $u_id,$send_email_msg,$ad){
include("sql.php");
$sql2="UPDATE user_profile SET merchant='$merchant2' WHERE `u_id` = '$u_id'";
if ($conn->query($sql2) === TRUE) {

} else {
    echo $sql2."Error updating record: " . $conn->error;
}
}



}

else
{
$approve = $_GET["approve"];
$a = explode("-",$approve);
$approve = $a[0];
$u_id = $a[1];
$ad = $_SESSION["u_id"];


if($approve == "yes"){
echo "application approved : ";
$merchant = "1";
$send_email_msg ="Congratulations! Your application has been approved, Please relogin";
}else{
echo "application declined : ";
$merchant = "0";
$send_email_msg ="We regret to inform you that your application has been declined";
}




function updateU($merchant, $u_id){
include("sql.php");
$sql="UPDATE u SET merchant='$merchant' WHERE `u_id` = '$u_id'";
if ($conn->query($sql) === TRUE) {

    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
}

updateU($merchant, $u_id);

if($approve == "yes"){
$merchant2 = "2";
}else{
$merchant2 = "0";
}

function updateUP($merchant2, $u_id,$send_email_msg,$ad){
include("sql.php");
$sql2="UPDATE user_profile SET merchant='$merchant2' WHERE `u_id` = '$u_id'";
if ($conn->query($sql2) === TRUE) {
	include("notif.php");
  notif($ad,$u_id,$send_email_msg,'logout.php');
    echo "successfully updated";
} else {
    echo $sql2."Error updating record: " . $conn->error;
}
}

updateUP($merchant2, $u_id,$send_email_msg);
}
?>