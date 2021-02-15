<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("safe.php");



 echo $product_id =  $_GET["product_id"]; 


if($_GET["delete"]=='yes')
{
$sql2 = "UPDATE `product` SET deleted = 'yes' WHERE product_id = ' $product_id'";

if ($conn->query($sql2) === TRUE) {
    echo "Mark as sold";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
}
else
{
	$sql2 = "UPDATE `product` SET sold_out = 'yes' WHERE product_id = ' $product_id'";

if ($conn->query($sql2) === TRUE) {
    echo "Mark as sold";
} else {
    echo $sql."Error updating record: " . $conn->error;
}

}










?>

