<?
include("sessions.php");
?>


        <header class="shop_header_area" id="menu">
            

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
                            
                                                        
                            
                            
                                                        
                             <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="#"  onClick="javascript:ajaxpagefetcher.load('window', 'product_create.php', true)">My Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'product_create.php', true)">Upload Product</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My Wallet</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">My Orders</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Track my order</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Transaction History</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
                                     <li class="nav-item"><a class="nav-link" href="#" onClick="javascript:ajaxpagefetcher.load('window', 'merchant_apply.php', true)">Be a merchant</a></li> 
                                    <li class="nav-item"><a class="nav-link" href="#" onClick="Logout()">Logout</a></li>
    
                                </ul>
                            </li>
                            
                                                        
                                                        
                        </ul>
                    </div>
                </nav>
            </div>


        </header>