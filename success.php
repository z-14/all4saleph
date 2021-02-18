<? 
include ("sessions.php");
include ("globalconfig.php");

    if($_GET['m']=="mobile" || $_SESSION["m"]=="mobile"){  
 	$m ="mobile";
 	?>
<div style="width: 100%; height: 40px; background: red;"></div>
<div style="width: 100%; height: 40px; background: red;" id="success_mobile"></div>
<div class="april29_menu_header"><div class="april29_menu_header_back_button" onclick="hideThisItem('windowPoP'),refreshButton()"></div> All 4 Sale </div>
<br><br>
<center>Success<c/enter>


<?

} else{

?>
<div class="info"><br><br><br> Success!!! </div>

<?
}
?>