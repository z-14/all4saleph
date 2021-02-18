<?
session_start();
?>

<!--================login Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="login_title">
                                <h2>Registration</h2>
                                <p>Create an account now!</p>
                            </div>
                            <div class="login_form row">
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Name" id="u" onchange="addtoPost('&username='+this.value)" onclick="anchorIt(this.id)">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" id="p" type="password" placeholder="Password" onchange="addtoPost('&password='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" id="p2" type="password" placeholder="Confirm Password" onchange="addtoPost('&password2='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                 <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Email" id="e" onchange="addtoPost('&email='+this.value)" onclick="anchorIt(this.id)">
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <button class="add_cart_btn  btn-block"  onClick="postIt('registration_reg.php')">Go</button>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button class="add_cart_btn  btn-block"  onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)">Login here</button>
                                </div>
                                
                                
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->

<?
exit;
?>




	<!-- Search section -->
	<div class="search-form-section">
		<div class="sf-warp">
			<div class="container">
				<div class="big-search-form">
				<h3>Registration</h3><br>
					<input type="text" id="u" placeholder="Username" onchange="addtoPost('&username='+this.value)"  oninput="showPass('username: '+ this.value);" onclick="showPass('Username: '+this.value),anchorIt(this.id),toggleClass(this.id);">
					<input type="password" id="p" placeholder="Password" placeholder="Password must be 5 - 20 characters" onchange="addtoPost('&password='+this.value)" oninput="showPass('password: '+ this.value);" onclick="showPass('Password: '+this.value);">
					<input type="password" id="p2" placeholder="Confirm Password" onchange="addtoPost('&password2='+this.value)" oninput="showPass('confirm password: '+ this.value);" onclick="showPass('Password: '+this.value);">
					<input type="text" id="e" placeholder="Email" onchange="addtoPost('&email='+this.value)" oninput="showPass('email: '+ this.value);" onclick="showPass('Email: '+this.value);">
					<img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" width="400px" /><br><br>
					<input type="text" id="c" placeholder="Security Code" onchange="addtoPost('&security_code='+this.value)" oninput="showPass('code: '+ this.value);" onclick="showPass('Code	: '+this.value); ">
					<button class="bsf-btn" onClick="postIt('registration_reg.php'),hidePT()">Go</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Search section end -->