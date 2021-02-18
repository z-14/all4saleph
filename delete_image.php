
       <?php
                if($_GET['id'] != '' && $_GET['action'] == 'update')
                     {
                       $get_imgs = "SELECT * FROM product_images WHERE product_id = '{$_GET['id']}'";
                       $get_res = $conn->query($get_imgs);
                        while ($row_img = $get_res->fetch_assoc()) 
                          {

  $ur = "update_image.php?action=update&id=".$_GET['id']."&delete_photo=true&image_id=".$row_img['image_id']."url=photos/".$row_img['file_name'];

 $ura =  "remove_image.php?action=update&id=".$_GET['id']."&delete_photo=true&image_id=".$row_img['image_id']."url=photos/".$row_img['file_name'];

                            ?>

                             <div style="padding-left: 5px; padding-right: 5px;"  class="single-blog-post style-3 col-6 col-sm-3 deo_img">
                                <!-- Post Thumb -->
                                <div class="H-p">
             <div style="padding: 5px;" class="deo_card">
          <img  style="height: 15px; width: 15px; margin-bottom: 10px;"src="img/icon/close-icon.png"  onclick="rejectIt('dd','<?echo $ura;?>','<?echo $ur;?>','You really want to remove this Image')" alt="">
                           
                               <img class="img-fluid" src="<?php echo 'photos/'.$row_img['file_name']; ?>" alt="" height='300'/>
                                 </div>
                                  </div>
                            </div>
 
                            <?php
                          }
                   } 
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




        </style>
