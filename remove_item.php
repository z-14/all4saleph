<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

include("access.php");
userAccessAdmin($admin);


$product_id = $_GET["product_id"];


include("sql.php");
$sql="UPDATE product SET post='deleted' WHERE `product_id` = '$product_id'";
if ($conn->query($sql) === TRUE) {
    echo "successfully updated";

} else {
    echo $sql."Error updating record: " . $conn->error;
}


?>

