<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

include("access.php");
//userAccessAdmin($admin);

	$datavalues = array();
		foreach ($_POST as $name => $value)
			{
				array_push( $datavalues, "`".$name."`='".$value."'");
  			}

  	$datavaluesfin = implode(",",$datavalues);
  			
$product_id = $_GET["product_id"];


include("sql.php");
$sql1 = "UPDATE `product` SET ".$datavaluesfin." WHERE `product_id` = '$product_id'";
if ($conn->query($sql) === TRUE) {
    echo "successfully updated";

} else {
    echo $sql."Error updating record: " . $conn->error;
}


?>
