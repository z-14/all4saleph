<?php 


function userAccess($u_id){
if(!isset($u_id)){
include("login_mobile.php");

exit;
}
}

function userAccessMerchant($merchant){
if(!isset($merchant)){
include("login_mobile.php");
exit;
}
}


function userAccessAdmin($admin){
if(!isset($admin)){
include("login_mobile.php");
exit;
}
}
?>
