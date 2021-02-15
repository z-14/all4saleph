<?
include ("sessions.php");
include ("globalconfig.php");

if (isset($_SESSION["u_u"])){


?>
<!--================login Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="login_title">
                                <h2>You are logged in <? echo $_SESSION["u_u"]; ?></h2>
                                <p>Wanna go out?</p>
                            </div>
                            <form class="login_form row">
                             
                                <div class="col-lg-12 form-group">
                                    <button type="submit" class="add_cart_btn  btn-block" onClick="Logout()">Logout</button>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
    



<?
}else{
?>


<!--================login Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="login_title">
                                <h2>log in your account</h2>
                                <p>Log in to your account to discovery all great features in this site.</p>
                            </div>

                                
                                
                               
                                
  
                                
                                
                                
                                <div class="login_form row">
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Username" id="u" onchange="addtoPost('&username='+this.value)" onclick="anchorIt(this.id)" onkeypress="OnEnterPostIt('processlogin_mobile.php')">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" id="p" placeholder="Password" onchange="addtoPost('&password='+this.value)" onclick="anchorIt(this.id)" onkeypress="OnEnterPostIt('processlogin_mobile.php')">
                                </div>
                                <div>
                                <input onkeypress="OnEnterPostIt('processlogin_mobile.php')" style="width: 0px; height: 0px; position: fixed; bottom: 0px; left: 0px;">
                                 </div>                             
                                 <div class="col-lg-6 form-group">
                                    <button class="add_cart_btn  btn-block" onClick="postItGoTo('processlogin_mobile.php')">Login</button>
                                </div>
                                 
                                </div>
                                
                              
                                <br>
                          <div class="login_form row">      
                                <div class="col-lg-6 form-group">
                                    <button class="add_cart_btn  btn-block" onClick="javascript:ajaxpagefetcher.load('window', 'registration.php', true),HideMenu()">Register here</button>
                                </div>
                                
                                
                            
                        
                        </div>
                        </div>                        
                    </div>
                    			
                    			
                    			
                    
                    
                    
                </div>
            </div>
            	</div>
            	</div>
        </section>
        <!--================End login Area =================-->


	
	
<?
}
?>
