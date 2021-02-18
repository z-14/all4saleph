<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];

echo $_POST["telephone_number"];

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






$dateName = array("birthday", "date_from", "date_to");


$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 10"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {


$data = array();
foreach ($_POST as $name => $value) {
	
	
	


			if (in_array($name, $dateName))
  			{
 				 array_push( $data, processDateUpdate($name, $value)); 
 			 }
				else
  			{
  				array_push( $data, "`".$name."`='".$value."'"); 
  			}




	
	}
$datas = implode(",",$data);

$sql2="UPDATE `user_profile` SET ".$datas." WHERE `u_id` = '$u_id'";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}


}
 else 
{

/*
$firstname  = $_POST["firstname"];
$middlename = $_POST["middlename"];
$surname = $_POST["surname"];
$name_extension = $_POST["name_extension"];
$birthday  = $_POST["birthday"];
$firstname  = $_POST["age"];
$address = $_POST["address"];
$mobile_number  = $_POST["mobile_number"];
$email = $_POST["email"];
$website = $_POST["website"];
$telephone_number = $_POST["telephone_number"];



$sql = "INSERT INTO `user_profile` (`u_id`,`u_u`,`firstname` ,`middlename`,`surname`,`name_extension`,`birthday`,`age`,`address`,`mobile_number`,`email`,`website`,`telephone_number`,`photo`)
 VALUES ('$u_id','$u_u','$firstname','$middlename','$surname','$name_extension','$birthday','$age','$address','$mobile_number','$email','$website','$telephone_number','$photo');";
if ($conn->query($sql) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}
*/
$datakeys = array();
$datavalues = array();
foreach ($_POST as $name => $value) {

   
   
   			if (in_array($name, $dateName))
  			{
  				array_push( $datakeys, "`".$name."`"); 
 				 array_push( $datavalues, processDateInsert($value)); 
 			 }
				else
  			{
  				   array_push( $datakeys, "`".$name."`"); 
  					 array_push( $datavalues, "'".$value."'"); 
  			}
   
   
   
   
}

$datakeysfin = implode(",",$datakeys);
$datavaluesfin = implode(",",$datavalues);
$reg_date_YM = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
$sql2 = "INSERT INTO `user_profile` (`u_id`,`u_u`,".$datakeysfin.") VALUES ('$u_id','$u_u',".$datavaluesfin.");";
if ($conn->query($sql2) === TRUE) {
    echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}







}

?>

