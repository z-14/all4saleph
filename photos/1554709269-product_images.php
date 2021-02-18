        <?php
                if($_GET['id'] !== '' && $_GET['action'] == 'update')
                     {
                       $get_imgs = "SELECT * FROM product_images WHERE product_id = '{$_GET['id']}'";
                       $get_res = $conn->query($get_imgs);
                        while ($row_img = $get_res->fetch_assoc()) 
                          {

                             $ur = "product_create.php?action=update&id=".$_GET['id']."&delete_photo=true&image_id=".$row_img['image_id']."url=photos/".$row_img['file_name'];
                            ?>

                             <div class="single-blog-post style-3 col-12 col-sm-4">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img class="img-fluid" src="<?php echo 'photos/'.$row_img['file_name']; ?>" alt="" height='300'/>
                                    <button class="btn btn-sm btn-block btn-danger rounded-0" onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $ur; ?>', true),ShowInfo('Updating please wait.'),HideMenu()">Remove</button>
                                  </div>
                            </div>    
                            <?php
                          }
                   } 
        ?>
