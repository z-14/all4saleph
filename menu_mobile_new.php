<?
include ("sessions.php");
include ("globalconfig.php");
include ('sql.php');
$u_u = $_SESSION["u_u"];
$go = "<div class=\"go\">  </div>";
$hideThis = ",hideThisItem('windowPoP')";
                                    if(!empty($u_u)){
                                    
                                                                        
?>
<div style="width: 100%; height: 40px; background: red;"></div>
<div class="april29_menu_header"><div class="april29_menu_header_back_button" onclick="hideThisItem('windowPoP')"></div> Menu </div>




<?
	echo"
	<div class=\"april29_menu_title\" onClick=\"OpenSubMenu(this)\">User settings</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'user_profile.php', true) $hideThis\">My Profile $go</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true) $hideThis\">Messages $go</div>
	
	
	
	
	";
?>



<?
if($merchant =="0"){
?>
<div class="april29_menu_title" >Opportunities</div>
<div class="april29_menu_items"  onClick="javascript:ajaxpagefetcher.load('window', 'merchant_apply.php', true) <? echo $hideThis; ?>">Apply as Merchant </div>
<?
}
?>


<?

	
	if($_SESSION['merchant'] > 0){
	
	echo"
	<div class=\"april29_menu_title\"  onClick=\"OpenSubMenu(this)\">Merchant
	</div>
	<div class=\"april29_menu_items\"  onClick=\"javascript:ajaxpagefetcher.load('window', 'product_create.php', true) $hideThis\">Sell an item $go</div>
	<div class=\"april29_menu_items\"  onClick=\"javascript:ajaxpagefetcher.load('window', 'merchant_inventory_product.php', true) $hideThis\">Product inventory $go</div>
	<div class=\"april29_menu_items\"  onClick=\"javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true) $hideThis\">Messages $go</div>
	";
	

	}
	

                                    

	
	if($admin == "yes"){
	$date_today = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
	echo "<div class=\"april29_menu_title\" onClick=\"OpenSubMenu(this)\">Site Administrator:
	</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_user_list.php', true) $hideThis \">User list $go</div>
    <div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new_user.php', true) $hideThis\">New Merchant Application $go</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_merchants_list.php', true) $hideThis\">Merchants list $go</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'merchant_list_view_product.php', true,['datatables.js']) $hideThis\">Item's for approval $go</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_item_management.php', true) $hideThis\">Item management $go</div>
	";
	
	
	
	}
	
echo "<div class=\"april29_menu_title\" >Access</div>
	<div class=\"april29_menu_items\" onClick=\"Logout() $hideThis\">Logout $go</div>";
	

	}else{
	
	echo "<div class=\"april29_menu_title\" >Access</div>
	<div class=\"april29_menu_items\" onClick=\"javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true) $hideThis\">Login $go</div>";
	
		
        ?>
			
    	




		<? } ?>

<div class="top_spacer"></div>
<div class="top_spacer"></div>
<div class="top_spacer"></div>
<div class="top_spacer"></div>
	  
<?
//<div onClick="javascript:ajaxpagefetcher.load('window', 'tour_i_joined.php', true)">Previous Tours</div>
//<div onClick="javascript:ajaxpagefetcher.load('window', 'messages.php', true)">Messages</div>
//	<div onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_user_list_search.php', true)\">User Management</div>
/*

<div class="april29_menu_title" >Access</div>	
    	<div  class="april29_menu_items" onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)">Login</div>

*/
?>
