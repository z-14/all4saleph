<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("safe.php");


$add_cat = $_GET["add_cat"];
if(!empty($add_cat))
{
	$cat_type= $_POST["cat_type"];
	$cat_name= $_POST["cat_name"];
	if (!empty($cat_type)) 
	{
		$_SESSION["cat_type"]=$cat_type;
	}
	else
	{
		$cat_type=$_SESSION["cat_type"];
	}


	if (!empty($cat_name)) {
		$_SESSION["cat_name"]=$cat_name;
	}
	else
	{
		$cat_name=$_SESSION["cat_name"];
	}
	
 $sql = "INSERT INTO `product_categories` (`cat_type`,`cat_name`) VALUES ('$cat_type','$cat_name');";
  if ($conn->query($sql) === TRUE) 
  {
echo "Ok";
     
  }else
  {
    echo $sql."Not working: " . $conn->error;
  }
}
else
{$cat_id = $_POST["cat_id"];
$sub_name = $_POST["sub_name"];


if(empty($cat_id))
{
	$cat_id=$_SESSION["cat_id"];
}
else
{
	$_SESSION["cat_id"]=$cat_id;
}
  $sql = "INSERT INTO `product_subCat` (`cat_id`,`sub_name`) VALUES ('$cat_id','$sub_name');";
  if ($conn->query($sql) === TRUE) 
  {
echo "Ok";
     
  }else
  {
    echo $sql."Not working: " . $conn->error;
  }}
?>