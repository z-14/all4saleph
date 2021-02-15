<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
//$_SESSION["file_name"] = $_GET["file_name"];

$url =  "update_image.php?action=update&id=".$_SESSION['product_id'];

?>
<!-- Search section -->
					<br>
					<br>


<div id="dd" class="search-form-section">
	
	<div class="container">
	<div class="row">	
	</div>
	</div>
		<div class="sf-warp">
			<div class="container">
			
				<div class="big-search-form">
					<form enctype="multipart/form-data" method="post" name="uploadphoto" >
						<label>Upload Photo</label><br/>
					  <input  style="margin-bottom: 10px;" type="file" id="file" name="upload[]" accept="image/*" onclick="showMe();"  multiple="true" required />

					 
            <button id="uploadbutton" class="add_cart_btn  btn-block col-md-4 col-12 mt-15" onclick="upload_image_deo('uploadphoto','photo_upload_reg.php','<?echo $url;?>','dd'), hide_deo(this.id),ShowInfo('')">Upload</button>

					</form>
				</div>
			</div>
		</div>
</div>