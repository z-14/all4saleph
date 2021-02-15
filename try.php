<?php 
include("sessions.php");
include("globalconfig.php");
include("sql.php");


//$u_id = $_SESSION['u_id'];
//$today = date("m-d-Y");

// function processDateInsert($value)
// {
// 	$n = explode("-",$value);
// 	$newvalue = mktime(0,0,0, $n[0] , $n[1], $n[2]);
// 	return $newvalue;
// }


//$date = processDateInsert($today);
$product_id = $_GET['product_id'];
//$renter = $_GET['u_id'];
//$msg = "message here";
//$title = "Your request has been approved";

$sql = "UPDATE `product` SET post = '1' WHERE product_id = '$product_id'";

if($conn->query($sql))
{
	echo "done";
}

else
{
	echo "Something went wrong : ".$conn->error;
}
?>