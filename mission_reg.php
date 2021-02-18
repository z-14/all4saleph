<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
$datakeys = array();
$datavalues = array();

$data = array();

function real_escape_and_trim($value)
{
    $value = trim($value);
    $value = mysql_real_escape_string($value);
    return $value;
}



function cleanQuery($string)
{
  if(get_magic_quotes_gpc())  // prevents duplicate backslashes
  {
    $string = stripslashes($string);
  }
  if (phpversion() >= '4.3.0') 
  {
    $string = mysql_real_escape_string($string);
  }
  else
  {
    $string = mysql_escape_string($string);
  }
  return $string;  
}


foreach ($_POST as $name => $value) 
{
$data_in=addslashes($value);
array_push( $data, "`".$name."`='".$data_in."'"); 

  }
$datas = implode(",",$data);

$sql2="UPDATE `mission` SET ".$datas." WHERE `m_id` = '27'";
if ($conn->query($sql2) === TRUE) {
    echo "DOne";

} else {
    echo $sql."Error updating record: " . $conn->error;
}

?>