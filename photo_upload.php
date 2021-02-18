<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
//$_SESSION["file_name"] = $_GET["file_name"];

$u_id=$_SESSION['u_id'];
$product_id = $_SESSION["product_id"];
$_SESSION["product_id"]=$product_id;

   include("sql.php");
            $sql="SELECT * FROM product_images WHERE product_id ='$product_id'"; 
              $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                    	?>
  <div class="container">
                              <div class="row">
                    	<?
                    while($row = $result->fetch_assoc())
                     { 
               
                              ?>
                            
          <div style="padding-left: 5px; padding-right: 5px;"  class="single-blog-post style-3 col-lg-6 col-sm-3 deo_img">
                                <!-- Post Thumb -->
                                <div class="H-p">
             <div style="padding: 5px;" class="deo_card">
          <img  style="height: 15px; width: 15px; margin-bottom: 10px;"src="img/icon/close-icon.png"  alt="">
                        
                     <img class="img-fluid" src="<?php echo 'photos/'.$row['file_name'];?>" alt="" height='300'/>
                                 </div>
                                  </div>
                              </div>
                            

                              <?    

                          }

                          ?>

                            </div>
                             </div>
                          <?
                              }

                            ?>




<!-- Search section -->
					<br>
					<br>

<div id="uploadImage">
<div class="search-form-section">

		<div class="sf-warp">
			<div class="container">
			
				<div class="big-search-form">
					<form enctype="multipart/form-data" method="post" name="uploadphoto" >
						<label>Upload Photo</label><br/>
					  <input  style="margin-bottom: 10px;" type="file" id="file" name="upload[]" accept="image/*" onclick="showMe();"  multiple="true" required />

					  <button id="uploadbutton" class="button full-width button-sliding-icon ripple-effect  btn-block col-md-4 col-12 mt-15" onclick="upload_image_deo('uploadphoto','photo_upload_reg.php','photo_upload.php','uploadImage'), hide_deo(this.id),ShowInfo(''),message()">Upload</button>

					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<style type="text/css">
          .deo_img img {
    object-fit: cover;
    height: 200px;
    width: 100%;


}
.deo_card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  border-radius: 5px;
}

.deo_card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}




        </style>