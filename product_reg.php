<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];
$product_id = $_SESSION["product_id"];

$dd = $_GET["full"];
$cat_name =$_GET["cat_name"];
$sub_name=$_GET["sub_name"];
$deo_sel = $_SESSION["deo_seller"];



$sub_name = str_replace(array('?'), '',$sub_name);

$full = str_replace(array('?'), '',$dd);


$dda=$_GET["other"];
$other = str_replace(array('?'), '',$dda);
if(empty($full))
{
	$full="no";

}
else if($full=="basic")
{
	$full="no";
}
else
{
	$full="yes";
}


$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 1"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
	 $merchant_type=$row["merchant_type"];
}
}

if(!empty($deo_sel))
{
	$merchant_type=$deo_sel;
}


$datavalues = array();
foreach ($_POST as $name => $value) {
	$data_in=addslashes($value);
  				  array_push( $datavalues, "`".$name."`='".$data_in."'");
}

 $datavaluesfin = implode(",",$datavalues);

 $p_date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
$sql1 ="UPDATE `product` SET ".$datavaluesfin.",`u_u` = '$u_u',`seller_type`='$merchant_type',`full_details`= '$full',`product_cat`='$cat_name',`product_subcat`='$sub_name' WHERE `product_id` = '$product_id'";
if ($conn->query($sql1) == TRUE) {
    echo "Product has been post";
} else {
    echo $sql."Error updating record: " . $conn->error;
     
}


?>

