<?php 
    include("sessions.php");
    include("globalconfig.php");
    include("sql.php");

    $cart_id = $_GET['cart_id'];


$sql2="DELETE from cart where c_id = '$cart_id'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}



  ?>