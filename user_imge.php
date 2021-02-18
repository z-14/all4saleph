

       <?php
   
                if($_GET['id'] !== '' && $_GET['action'] == 'update')
                     {
                       $get_imgs = "SELECT * FROM user_image WHERE u_id = '$u_id'";
                       $get_res = $conn->query($get_imgs);
                        while ($row_img = $get_res->fetch_assoc()) 
                          {
                            $ur = "user_profile.php?action=update&id=".$u_id."&delete_photo=true&image_id=".$row_img['image_id']."url=photos/".$row_img['url'];
                            ?>
                             <div class="single-blog-post style-3 col-12 col-sm-4">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img class="img-fluid" src="<?php echo 'photos/'.$row_img['url']; ?>" alt="" height='300'/>

                                    < <button class="btn subs_btn form-control"  type="submit" onClick="javascript:ajaxpagefetcher.load('window','user_imge.php?id=<?echo $u_id;?>', true),HideMenu()"  class="btn col-12 col-md-2 viral-btn mt-15">Refresh image</button> 
                                  
                                  </div>
                            </div>    
                            <?php
                          }
                   } 
        ?>