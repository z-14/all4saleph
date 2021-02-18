<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

//$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];
$product_id =  $_SESSION["product_id"]; 
function processDateUpdate($name, $value){
$n = explode("-",$value);
$newvalue = mktime(0,0,0, $n[0] , $n[1], $n[2]);
return "`".$name."`='".$newvalue."'";
}

function processDateInsert($value){
$n = explode("-",$value);
$newvalue = mktime(0,0,0, $n[0] , $n[1], $n[2]);
return "'".$newvalue."'";
}


//$datakeys = array();
$datavalues = array();
foreach ($_POST as $name => $value) {

  				  array_push( $datavalues, "`".$name."`='".$value."'");
  
}

//$datakeysfin = implode(",",$datakeys);
$datavaluesfin = implode(",",$datavalues);
//$reg_date_YM = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

//$sql2 = "INSERT INTO `product` (`u_id`,".$datakeysfin.") VALUES ('$u_id',".$datavaluesfin.");";
 $p_date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
   //$product_id = $_GET["product_id"];
$sql1 = "UPDATE `product` SET ".$datavaluesfin." WHERE `product_id` = '$product_id'";
if ($conn->query($sql1) === TRUE) {

   //$_SESSION["product_id"] = $conn->insert_id;
      //$item_id = $conn->insert_id;


    echo "successfully Created";
} else {
    echo $sql."Error updating record: " . $conn->error;
    //echo $datavaluesfin;
     
}









?>

