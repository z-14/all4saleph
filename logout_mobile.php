<?php
session_start();
$ip=$_SERVER['REMOTE_ADDR'];
$ip2 = md5($ip);
$if = md5($ip2);

$m = $_SESSION["m"];
foreach($_SESSION as $key => $val)
{
	//retain some session if any
    if ($key !== 'somekey')
    {
      unset($_SESSION[$key]);
    }

}
$_SESSION["m"] = $m;
?>
