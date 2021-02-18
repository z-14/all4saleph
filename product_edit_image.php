 <?php
include("sessions.php");
include("globalconfig.php");
include("sql.php");
 
$product_id = $_SESSION["product_id"];

     $get_imgs = "SELECT * FROM product_images WHERE product_id = '$product_id'";
                       $get_res = $conn->query($get_imgs);
                    if ($get_res->num_rows > 0) 
                    {
                      ?>

                      <div class="container">
                        <div class="row">

                      <?
                      
                        while ($row_img = $get_res->fetch_assoc()) 
                          {

                            ?>
         <div style="margin-top: 5px;  margin-bottom: 10px;padding-left: 5px; padding-right: 5px;"  class="single-blog-post style-2 col-lg-6 col-sm-3 deo_img">
                                <!-- Post Thumb -->
                       <div class="H-p">
             <div style="padding: 5px;" class="deo_card">
          <img  style="height: 15px; width: 15px; margin-bottom: 10px;"src="img/icon/close-icon.png"  onclick="delete_image('<?echo $row_img['image_id'];?>','delete_product_image.php','You want to remove this image?')" alt="">
                      <img class="img-fluid" src="<?php echo 'photos/'.$row_img['file_name']; ?>" alt="" height='300'/>
                                 </div>
                                  </div>
                            </div>
 
                            <?php
                          }

                          ?>
                  <?
                        }
                          ?>
</div>
</div>
    


                          <?
                   
        ?>

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
 .swal2-cancel
  {
    margin-right: 10px;
  }




        </style>
