<?php 
session_set_cookie_params(604800,"/");
session_start();
session_name("art");

$bluelodgenumber = $_POST["l"];
$bluelodgename = $_POST["n"];
$myotheraccess = $_POST["a"];

$_SESSION['viewinglodge'] = "yes";
$_SESSION['lodgenumber'] = $bluelodgenumber;
$_SESSION['lodgename'] = $bluelodgename;
$_SESSION['accesses']= $myotheraccess ;


include ("sql.php");
$sql="SELECT * FROM glp_access WHERE lodgenumber = '$bluelodgenumber' ORDER BY access_id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
$access=$row["access"];
$lodgenumber=$row["lodgenumber"];
$membernumber=$row["membernumber"];
$u_id=$row["u_id"];
$fullname = $row["fullname"];
$r_item_value=$row["r_item_value"];
$num_rank=$row["num_rank"];

if($access=="Worshipful Master"){
$_SESSION['lodge_wm']=$fullname;
}


if($access=="GLI"){
$_SESSION['lodge_gli']=$fullname;
}

if($access=="Secretary"){
$_SESSION['lodge_sec']=$fullname;
}


}
}



//$results = $_SESSION['result1'] ." - ". $_SESSION['result2'];


//$premium_account = $_SESSION["premium_account"];
//echo '<pre>' . print_r($view_pages, TRUE) . '</pre>';


if($u_u =="artpologabriel"){
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
}


?>