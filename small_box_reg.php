<?include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

 $id = $_POST["id"];
 $yn = $_POST["yn"];
  $box = $_POST["box"];



 $sql2="UPDATE `product_categories` SET `$box` = '$yn' WHERE `cat_id` = '$id'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
 


?>