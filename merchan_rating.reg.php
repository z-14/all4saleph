<?php 
	include("sessions.php");
	include("globalconfig.php");
	include("sql.php");

	$u_u = $_SESSION["u_u"];
	$u_id = $_SESSION["u_id"];
	$m_id=$_SESSION["merchant_id"];
	$reviews = $_POST["reviewsID"];
	$ratings = $_POST['ratings'];
	$defaultRatings = 3;
	$edited = str_replace(array('?'), '',$product_id);


	if ($reviews != '' && $ratings != '') {
		$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

		$sql = "INSERT INTO merchan_rating (m_id,c_uu,c_id,review,rating,date) VALUES ('$m_id','$u_u','$u_id','$reviews','$ratings','$timestamp')";
		if ($conn->query($sql) === TRUE) {
			echo "Success ";
		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else if ($ratings == '') {
		$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

		$sql = "INSERT INTO merchan_rating (m_id,c_uu,c_id,review,rating,date) VALUES ('$m_id','$u_u','$u_id','$reviews','$ratings','$defaultRatings')";
		if ($conn->query($sql) === TRUE) {
						echo "Success ";


		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else {
		echo "Ratings should not be empty!";
	}

	
?>