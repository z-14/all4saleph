<?php 
    include("sessions.php");
    include("globalconfig.php");
    include("sql.php");

    $w_id = $_POST['product_id'];

$sql2="DELETE from merchant_docs where m_id = '$w_id'";
if ($conn->query($sql2) === TRUE) {

} else {
    echo $sql."Error updating record: " . $conn->error;
}



  ?>