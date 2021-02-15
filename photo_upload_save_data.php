<?php

$product_id = $_SESSION["product_id"];
$dateadded = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
$u_id = $_SESSION["u_id"];

$url = $file_name;
$sql2 = "INSERT INTO `product_images` ( `file_name`, `product_id`,`dateadded`,`u_id`) VALUES ('$file_name', '$product_id', '$dateadded','$u_id');";
if ($conn->query($sql2) === TRUE) {
   echo "success";
} else {
   //echo $sql."Error updating record: " . $conn->error;
}
