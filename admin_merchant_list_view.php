<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
?>

<table class="blueTable">
<thead>
<tr>
<th>User</th>
<th>Destination</th>
</tr>
</thead>


<tfoot>
<tr>
<td colspan="2">
<div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
</td>
</tr>
</tfoot>
<tbody>



<?
$u_id = $_GET["u_id"];
$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 1"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$tour_id  = $row["tour_id "];	
	
$type = $row["type"];	
$destination = $row["destination"];	
$price = $row["price"];	
$date_from = $row["date_from"];	
$date_to = $row["date_to"];	
$intro = $row["intro"];	

$details = $row["details"];	
$sms = $row["sms"];	
$messenger = $row["messenger"];	
$telephone_number = $row["telephone_number"];	
$email = $row["email"];	

$website = $row["website"];	

$u_id = $row["u_id"];	

$u_u = $row["u_u"];	

$rank = $row["rank"];	

$pax = $row["pax"];	

$pax_avail= $row["pax_avail"];	


 		
}
}
?>
<tr><td>Fistname</td><td><?  echo $row["destination"]; ?></td></tr>	
<tr><td></td><td><?  echo $row["destination"]; ?></td></tr>

	
</tbody>

</table>	
 