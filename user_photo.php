<?
function get_photo($u_id){
include("globalconfig.php");
include("sql.php");

$sql="SELECT * FROM tour_photo WHERE u_id = '$u_id' AND user_photo = 'yes' ORDER BY `photo_id` DESC  LIMIT 0, 1 "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "photos/". $row["url"];
}
}else{
	
	echo "img/blog/1.jpg";
	
}
}
?>