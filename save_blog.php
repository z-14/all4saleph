<?php

 $product_id = $_SESSION["product_id"];
 $dateadded = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
 $u_id = $_SESSION["u_id"];
 $url = $file_name;

if($product_id == "left_blog")
{
$sql2 = "UPDATE  `mission` SET `left_image` = '$file_name' where `m_id` = 27";
}
else
{
$sql2 = "UPDATE  `mission` SET `right_image` = '$file_name' where `m_id` = 27";
}


if ($conn->query($sql2) === TRUE) {
   echo "success";
} else {
 $sql2."Error updating record: " . $conn->error;
}

?>