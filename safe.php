<?
function safe($str){
	$str2 = htmlspecialchars($str, ENT_QUOTES);
	return($str2);
	}
	
function safeStr($str){
	$str2=htmlspecialchars_decode($str);
	return($str2);
}
?>