<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
 
$product_id = $_POST["product_id"];
 
$e = explode(";",$product_id); 
 
$t = $e[0];//id

$d = $e[1];//featured


$sql2="UPDATE product set product_highlights= '$d' where product_id = '$t'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}

?>