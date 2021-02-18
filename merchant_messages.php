<?php 
	include("sessions.php");
	include("globalconfig.php");
	include("sql.php");
	$u_u = $_SESSION["u_u"];
	$u_id = $_SESSION["u_id"];

$messages = $_POST["messages"];
$merchant_id = $_GET["merchant_id"];
$seller_id = $_GET["seller_id"];
$i = $_GET["product_id"];
$product_id = str_replace(array('?'),'',$i);
$seller_id = str_replace(array('?'),'',$seller_id);
	
$sql="SELECT * FROM merchant_conversation where (sender_id='$u_id' OR reciever_id = '$u_id') and product_id = '$product_id' "; 
 $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {

 	
                	$row = $result->fetch_assoc();
                	$convo_id = $row["convo_id"];
                 if ($messages != '') {
$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
		$sql = "INSERT INTO merchant_messages(sender_id,reciever_id,seller_id,messages,date,product_id,convo_id) VALUES ('$u_id','$merchant_id','$seller_id','$messages','$timestamp','$product_id','$convo_id' )";
		if ($conn->query($sql) === TRUE) 
		{
			echo "Messages Sent";
			include("notif.php");
				if($row["sender_id"]== $u_id)
				{
  notif($u_id,$row["reciever_id"], $u_u.' Sent a messages', 'convo.php?product_id='.$product_id.'&merchant_id='.$merchant_id.'&seller_id='.$seller_id.'&dd=no');
				}
				else
				{
 notif($row["reciever_id"],$row["Sentder_id"], $u_u.' Sent a messages', 'convo.php?product_id='.$product_id.'&merchant_id='.$merchant_id.'&seller_id='.$seller_id.'&dd=no');
				}



		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else {
		echo "Messages should not be empty!";
	}
             	}
             	else
             	{
if ($messages != '') {
		$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
$sql = "INSERT INTO merchant_conversation(date,sender_id,reciever_id,product_id) VALUES ('$timestamp','$u_id','$merchant_id','$product_id' )";
		if ($conn->query($sql) === TRUE) {
			
			$convo_id = $conn->insert_id;
		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else {
		echo "Messages should not be empty!";
	}

	    if ($messages != '') {
$timestamp = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
		$sql = "INSERT INTO merchant_messages(sender_id,reciever_id,seller_id,messages,date,product_id,convo_id) VALUES ('$u_id','$merchant_id','$seller_id','$messages','$timestamp','$product_id','$convo_id' )";
		if ($conn->query($sql) === TRUE) {
			echo "Messages Sent";
		} else {
			echo $sql."Error updating record: " . $conn->error;
		}
	} else {
		echo "Messages should not be empty!";
	}
             	}

	

	
 