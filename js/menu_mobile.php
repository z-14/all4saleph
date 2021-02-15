<?
include ("sessions.php");
include ("globalconfig.php");
include ('sql.php');
$u_u = $_SESSION["u_u"];

?>


            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown submenu active">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sale Sale Sale <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#">Home Simple</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Home Carousel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Home Full Width</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Home Parallax</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Home Boxed</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Home Fixed</a></li>
                                </ul>
                            </li>
                            
                            <?
                            if($_SESSION['merchant'] == "yes"){
                            ?>
                            
                            
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Merchant's <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#">Sell an item</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My items for sale</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Buyer's Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
                                </ul>
                            </li>
                            
                            <?
                            }
                            ?>
                            
                            
                            
                            <?
                            if(!empty($u_id)){
                            ?>
                            
                                                        <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#">My Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My Wallet</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Track my order</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Transaction History</a></li>

                                </ul>
                            </li>
                            
                            <?
                            } else{                                                        
                            ?>
                            
                            <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)">Login</a></li>
                            
                            <?
                            }                            
                            ?>
                            
                            <?
                            if($_SESSION['admin'] == "yes"){
                            ?>
                            
                            
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#">User's list</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Mechant's list</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">New merchant applications</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Item's for approval</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Item's management</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Option's management</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
                                    
                                </ul>
                            </li>
                            
                            <?
                            }
                            ?>
                            
                        </ul>
                    </div>
                </nav>
            </div>


<?
exit;


                                    if(!empty($u_u)){
                                    
                                    
                                    echo"<ul>";
  
                                    
/*
<li onClick="FbShareIt('https://trobi.ph/trobi_banner.png')"><a href="#p_mod/" class="a" >Share to FB</a></li>
*/
?>
<li onClick="javascript:ajaxpagefetcher.load('window', 'cart.php', true)"><a href="#p_mod/" class="a" >Cart</a></li>

<?
	echo"
	<li class=\"a\" onClick=\"OpenSubMenu(this)\">Joiners Menu:
	<ul>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'tour_upcoming.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Upcoming Tours</a></li>	
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'tour_previous.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Previous Tours</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'tour_cancelled.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Cancelled Tours</a></li>
   		
	</ul>
	</li>
	";
?>




<?
if($merchant =="0"){
?>
<li onClick="javascript:ajaxpagefetcher.load('window', 'merchant_apply.php', true)"><a href="#p_mod/" class="a" >Apply as Merchant</a></li>
<?
}
?>


<?

	
	if($_SESSION['merchant'] > 0){
	
	echo"
	<li class=\"a\" onClick=\"OpenSubMenu(this)\">Merchant Menu:
	<ul>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'tour_add.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Add Tour</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'tour_user.php', true)\"><a href=\"#p_mod/\" class=\"a\" >My Tours</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'tour_user_cancelled.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Cancelled Tours</a></li>	
	</ul>
	</li>
	";
	

	}
	
	
	
	
echo"
	<li class=\"a\" onClick=\"OpenSubMenu(this)\">My profile:
	<ul>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'user_profile.php', true)\"><a href=\"#p_mod/\" class=\"a\" >View Profile</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'w.php', true)\"><a href=\"#p_mod/\" class=\"a\" >My Wallet</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'bank_info.php', true)\"><a href=\"#p_mod/\" class=\"a\" >My Bank Info</a></li>
	</ul>
	</li>
	";
                                    

	
	if($admin == "yes"){
	
	echo "<li class=\"a\" onClick=\"OpenSubMenu(this)\">Site Administrator:
	<ul>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_tour_data_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Tour List</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_user_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >User List</a></li>
    <li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new_user.php', true)\"><a href=\"#p_mod/\" class=\"a\" >New Merchant Application</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_merchants_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Merchants List</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_cashIn_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Cash In List</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_cash_out_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Cash Out List</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_refund_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >Refund Request List</a></li>
	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_user_wallet_list.php', true)\"><a href=\"#p_mod/\" class=\"a\" >User Wallets</a></li>
	</ul>
	</li>
	";
	
	
	
	}
	
echo "<li onClick=\"Logout()\"><a class=\"a\"  >Logout</a></li>";
	

	}else{
        ?>

    	<li onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)"><a href="#p_mod/" class="a" >Login</a></li>
    	<li onClick="javascript:ajaxpagefetcher.load('window', 'search_advanced.php', true)"><a href="#p_mod/" class="a" >Advanced Search</a></li>




		<? } ?>

  </ul>
	  
<?
//<li onClick="javascript:ajaxpagefetcher.load('window', 'tour_i_joined.php', true)"><a href="#p_mod/" class="a" >Previous Tours</a></li>
//<li onClick="javascript:ajaxpagefetcher.load('window', 'messages.php', true)"><a href="#p_mod/" class="a" >Messages</a></li>
//	<li onClick=\"javascript:ajaxpagefetcher.load('window', 'admin_user_list_search.php', true)\"><a href=\"#p_mod/\" class=\"a\" >User Management</a></li>

?>
