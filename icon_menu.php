<?
error_reporting(0);
include ("sessions.php");
include ("globalconfig.php");
include ('sql.php');
$u_u = $_SESSION["u_u"];
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="style1.css" rel="stylesheet">
<style>
	
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

li {
  display: inline;
}

ul li ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

ul li ulli {
  display: inline;
}
.nav-link {
    display: inline;
    padding: .5rem 1rem;
}
</style>
 <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav">
                           


                            <li class="nav-item dropdown submenu active">
                                <a class="nav-link dropdown-toggle"onClick="javascript:ajaxpagefetcher.load('window', 'shop_item_list.php', true)" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="carts.png">
                                </a>
                               
                            
                            </li>
                            
                            <?
                            if($_SESSION['merchant'] > 0){
                            ?>
                            
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <img src="carts.png"> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#"onClick="javascript:ajaxpagefetcher.load('window', 'product_create.php', true)">Sell an item</a></li>   
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'product_list_merchant.php', true)">My items for sale</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'merchant_inventory_product.php', true)">Product Inventory</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Buyer's Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true)">Messages</a></li>
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
                                 <img src="carts.png"><i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'user_profile.php', true)">My Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'wishlist_list.php', true)">My Wishlist</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My Wallet</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Track my order</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Transaction History</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>

                                     <?
                                         if($_SESSION['merchant'] > 0)
                                         {
                                         }
                                  
                                 else
                                 {
                                       ?>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'merchant_apply.php', true)">Be a merchant</a></li> 
                                     <?
                                 }

                                     ?>


                                    
                                    
                                    
                                    <?
                                    if($_SESSION["m"]=="mobile" || $_GET["m"]=="mobile"){
                                    ?>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="Logout()">Logout</a></li>
                                    <?
                                    } else{
                                    ?>
                                    <li class="nav-item"><a class="nav-link" href="logout.php" >Logout</a></li>
                                    
                                    <?
                                    }
                                    ?>
                                    
                                    
    
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
                                 <img src="carts.png"> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'admin_user_list.php', true)">User's list</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchants_list.php', true)">Mechant's list</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new.php', true)">New merchant applications</a></li>
                                   

                                  <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'merchant_list_view_product.php', true,['datatables.js'])">Item's for approvals</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#"onClick="javascript:ajaxpagefetcher.load('window', 'admin_item_management.php',true)">Item's management</a></li>
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
