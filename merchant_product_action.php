<?
	include("sessions.php");
	include("globalconfig.php");
	include("sql.php");
	$product_id = $_GET['product_id'];
	$check = $_GET['approved'];
	$approved = str_replace('?', '', $check);
	if ($approved == "yes") {
		$sql = "UPDATE product SET post='approved' WHERE product_id='$product_id'";
		if ($conn->query($sql) === TRUE) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	} else {
		$sql = "UPDATE product SET post='declined' WHERE product_id='$product_id'";
		if ($conn->query($sql) === TRUE) {
		    echo "Record updated successfully";
		} else {
		    echo "Error updating record: " . $conn->error;
		}
	}
?>