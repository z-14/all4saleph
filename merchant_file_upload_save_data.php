<?php
$url = $file_name;
$u_id = $_SESSION["u_id"];
$u_u = $_SESSION["u_u"];
$sql2 = "INSERT INTO `merchant_docs` ( `url`, `u_id`,`u_u`)
 VALUES ('$url', '$u_id','$u_u');";
if ($conn->query($sql2) === TRUE) {
  // echo  $info= "successfully updated";
} else {
   //echo $sql."Error updating record: " . $conn->error;
}
?>