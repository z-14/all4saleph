<?
include ("sessions.php");
include ("globalconfig.php");


function notif($n_from,$n_to, $n_details, $n_page){
include("sql.php");


$date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

$sql = "INSERT INTO `notif` (`n_from`,`n_to`,`n_details`,`n_page`,`n_date`) VALUES ('$n_from','$n_to','$n_details', '$n_page','$date');";
if ($conn->query($sql) === TRUE) {
	$tour_id = $conn->insert_id;
    //echo "successfully updated";
} else {
    //echo $sql."Error updating record: " . $conn->error;
}

sendNotif($n_to, $n_details);
}


//notif(1,1,'hey there!','user_profile.php');

?>