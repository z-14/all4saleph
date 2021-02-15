 <?include("sessions.php");
 $_SESSION["user_photo"] = "yes";
 
 ?>
 
 <?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
$_SESSION["user_photo"] = $_GET["user_photo"];
   $url =  "merchant_apply.php?action=update";


function docs($u_id)
{
  include("sql.php");
            $sql="SELECT * FROM merchant_docs WHERE u_id ='$u_id'"; 
              $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                    while($row = $result->fetch_assoc())
                     { 
                     $id=$row["m_id"];
                    
                              ?>


      <div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <button type="button" onclick="merchant_docu(<?echo $id;?>)" class="close" data-dismiss="alert" aria-label="Close">
		    <span   aria-hidden="true">×</span>
		  </button>
		  <?  echo $row['url']; ?>		
		</div>
                              <?    

                             
                          }
                              }
              
}


?>

<div id="dd">
<?docs($_SESSION["u_id"]);?>


	<br>
					<br>
					<form  enctype="multipart/form-data" method="post" name="uploadphoto" >
						<label></label><br/>
 <input  style="margin-bottom: 10px;" type="file" id="file" name="upload[]" accept="image/*" onclick="showMe();"  multiple="true" required />

<button id="uploadbutton" class="add_cart_btn  btn-block col-md-4 col-12 mt-15" onclick="upload_image_deo('uploadphoto','merchant_apply_file_upload.php','merchant_apply_docs.php','dd'), hide_deo(this.id),ShowInfo('')">Upload</button>

					</form>
	</div>
 <?

 exit
 ?>
 onChange="uploadIt('uploadphoto','merchant_apply_file_upload.php')"
 
 <iframe src="merchant_apply_file_upload.php" height="100%" width="100%" scroll="none" frameBorder="0"></iframe> 