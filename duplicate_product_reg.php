<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("safe.php");

$aa= $_POST["qty"];


if ($aa == "yes" )
 {
$product_qty = $_POST["quantity"];
$product_id = $_POST["product_id"];
  $sql1 = "UPDATE `product` SET product_qty = '$product_qty'   WHERE `product_id` = '$product_id'";
if ($conn->query($sql1) == TRUE) {
} else {
    echo $sql."Error updating record: " . $conn->error;
     
}

  }
else
{
  $u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];
 $product_id =  $_GET["product_id"]; 
$split = explode("?", $product_id); 
$product_id = $split['0']; 
$p_key = array();
$p_values = array();

include("sql.php");
  $sql2="SELECT * FROM product WHERE product_id ='$product_id' LIMIT 0, 1"; 
    $result = $conn->query($sql2);
        //$result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                        { 
          foreach ($row as $name => $value) {
            if ($name == "product_id") 
            {
              
            }
            else
            {
               array_push( $p_key, "`".$name."`"); 
               array_push( $p_values, "'".safe($value)."'");  
            }
                                      }
              $product_name = $row["product_name"];

                        }
                  } 
 $p_key_pin = implode(",",$p_key);
$p_values_pin = implode(",",$p_values);  


$sql2 = "INSERT INTO `product` (".$p_key_pin." ) VALUES (".$p_values_pin.");";

if ($conn->query($sql2) === TRUE) {

     $dd = $conn->insert_id;
} else {
    echo $sql."Error updating record: " . $conn->error;
}


/////hiwalay para sa update ng duplicate product

$datakeys = array();
$datavalues = array();
foreach ($_POST as $name => $value) {
   array_push( $datakeys, "`".$name."`"); 
   array_push( $datavalues, "'".safe($value)."'"); 
}


$datavalues = array();
foreach ($_POST as $name => $value) {
  array_push( $datavalues, "`".$name."`='".$value."'");
}


 $datavaluesfin = implode(",",$datavalues);

$sql1 = "UPDATE `product` SET ".$datavaluesfin." WHERE `product_id` = '$dd'";
if ($conn->query($sql1) == TRUE) {
} else {
    echo $sql."Error updating record: " . $conn->error;
     
}

$aa = array();
foreach ($_POST as $name => $value) 
{
  if($name!="product_qty")
  {
  array_push( $aa, "/".$value);
}
}
 $datavaluesfin = implode("",$aa);

$sql1 = "UPDATE `product` SET duplicate_no = '$product_id',product_name= '".$product_name."".$datavaluesfin."' WHERE `product_id` = '$dd'";
if ($conn->query($sql1) == TRUE) {
} else {
    echo $sql."Error updating record: " . $conn->error;
     
}
}



?>

