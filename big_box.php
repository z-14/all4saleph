<?include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

 $fil = $_POST["id"];
 $yn = $_POST["yn"];

 if( $yn=='no')
 {
 $sql2="UPDATE `product_categories` SET `big_box` = 'yes' WHERE `cat_id` = '$fil'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
 }
 else
 {
 	 $sql2="UPDATE `product_categories` SET `big_box` = '' WHERE `cat_id` = '$fil'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
 }


?>