


<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
userAccessAdmin($admin);
echo "hi";

$output = '';
if(isset($_POST["query"]))
{
 $search = "%".$_POST['query']."%";
 $sql = "
  SELECT * FROM user_profile 
  WHERE firstname LIKE $search
  OR middlename LIKE $search
  OR surname LIKE $search 
  OR address_street LIKE $search 
  OR address_brgy LIKE $search
  OR address_city LIKE $search
  OR u_u LIKE $search
 ";
}
else
{
 $sql = "SELECT * FROM user_profile order by user_profile_id"; 
}
$result = $conn->query($sql);
  if ($result->num_rows > 0) 
{?>
  <div class="table-responsive">
  <table class="table table bordered">
    <tr>
     <th>Name</th>
<th  >Username</th>
<th  >Birthday</th>
<th  >Street</th>
<th >Baranggay</th>
<th  >City</th>
    </tr><?
 while($row = $result->fetch_assoc()) 
 {?>
  <tr>
    <td  role="cell"><?  echo $row["firstname"].' '.$row["middlename"].' '.$row["surname"];?></td>
               <td  role="cell"><?  echo $row["u_u"]; ?></td> 
               <td  role="cell"><?  echo date("M j, Y",$row["birthday"]);; ?></td>
               <td  role="cell"><?  echo $row["address_street"]; ?></td>
               <td  role="cell"><?  echo $row["address_brgy"]; ?></td>
               <td  role="cell"><?  echo $row["address_city"]; ?></td>
   </tr>
 <?}?>

</table>
</div>
<?}
else
{
 echo 'Data Not Found';
}

?>