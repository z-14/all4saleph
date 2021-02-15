<?php

$reg_date_num = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
$product_id = $_SESSION["u_id"];
$u_u = $_SESSION["u_u"];
$url = $file_name;


$sql="SELECT * FROM user_image WHERE u_id ='$u_id'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{

		$sql2 = "UPDATE user_image set url = '$url',u_u = '$u_u', date = '$reg_date_num' WHERE u_id = '$u_id'";
if ($conn->query($sql2) === TRUE) {
 
} else {
   echo $sql."Error updating record: " . $conn->error;
}
}
else
{

	$sql2 = "INSERT INTO `user_image` (`u_u`, `url`, `u_id`,`date`) VALUES ('$u_u','$file_name', '$product_id','$reg_date_num');";
if ($conn->query($sql2) === TRUE) {
  echo "successfully updated";
} else {
   echo $sql."Error updating record: " . $conn->error;
}

}



//$_SESSION["request_photo"] ="";
?>