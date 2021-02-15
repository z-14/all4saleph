    

    <div id="blogImage">
<div class="search-form-section">

    <div class="sf-warp">
      <div class="container">
      
        <div class="big-search-form">
          <form enctype="multipart/form-data" method="post" name="uploadphoto" >
            <label>Upload Photo</label><br/>
            <input  style="margin-bottom: 10px;" type="file" id="file" name="upload[]" accept="image/*" onclick="showMe();"  multiple="true" required />

            <button id="uploadbutton" class="button full-width button-sliding-icon ripple-effect  btn-block col-md-4 col-12 mt-15" onclick="upload_image_deo('uploadphoto','blog_photo_upload_reg.php','blog_upload.php','blogImage'), hide_deo(this.id),ShowInfo('')">Upload</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>