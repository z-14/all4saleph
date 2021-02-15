
<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

$id=$_POST['id'];
 $sql="SELECT * FROM product_categories where cat_id = '$id'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{

if(empty($row['image']))
{
  $image="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
}
else
{
  $image='photos/'.$row['image'];
}



?>

<img src="<?php echo $image;?>" width="50" height="50">


<?
}
}
  ?>
