<?php 
	include("sessions.php");
	include("globalconfig.php");
	include("sql.php");

	$u_u = $_SESSION["u_u"];
	$u_id = $_SESSION["u_id"];
	$product_id = $_GET["product_id"];
	$reviews = $_POST["reviewsID"];
	$ratings = $_POST['ratings'];
	$defaultRatings = 3;
	$edited = str_replace(array('?'), '',$product_id);


	if ($reviews != '' && $ratings != '')
	 {
		$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

		$sql = "INSERT INTO product_rating (product_id,u_id,u_u,review,rating,date) VALUES ('$edited','$u_id','$u_u','$reviews','$ratings','$timestamp')";
		if ($conn->query($sql) === TRUE) {
			echo "Success ";
		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else if ($ratings == '') {
		$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

		$sql = "INSERT INTO product_rating (product_id,u_id,u_u,review,rating,date) VALUES ('$edited','$u_id','$u_u','$reviews','$defaultRatings','$timestamp')";
		if ($conn->query($sql) === TRUE) {
		echo "Comment sent.";

		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else {
		echo "Ratings should not be empty!";
	}

	
?>