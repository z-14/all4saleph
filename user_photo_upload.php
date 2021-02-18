<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
//$_SESSION["file_name"] = $_GET["file_name"];



$url =  "profile_setting.php?action=update?id=".$_SESSION['u_id'];
?>
<!-- Search section -->
	<div class="search-form-section">
	
	
		<div class="sf-warp">
			<div class="container">
			
				<div class="big-search-form">
					<form enctype="multipart/form-data" method="post" name="uploadphoto" >
						<label>Upload Photo</label><br/>
					  <input type="file" id="file" name="upload[]" accept="image/*" onclick="showMe();"  multiple="true" required /><br/>

				<button style="width: 100%; margin-top: 10px;" id="uploadbutton" class="button full-width button-sliding-icon ripple-effect" onclick="uploadIt('uploadphoto','user_photo_upload_reg.php','profile.php'), hideMe(this.id),ShowInfo('Upload Done')," >Upload</button>


    

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Search section end -->