<?
function get_photo($u_id){
include("globalconfig.php");
include("sql.php");

$sql="SELECT * FROM product_image WHERE u_id = '$u_id' AND file_name = '$image_id' ORDER BY `image_id` DESC  LIMIT 0, 1 "; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "photos/". $row["url"];
}
}else{
	
	echo "no image";
	
}
}
?>