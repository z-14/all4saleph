<?php 
    include("sessions.php");
    include("globalconfig.php");
    include("sql.php");

    $w_id = $_GET['w_id'];


$sql2="DELETE from product_wishlist where w_id = '$w_id'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully deleted";
} else {
    echo $sql."Error updating record: " . $conn->error;
}



  ?>