<?php
include("sessions.php");
include("globalconfig.php");
include("sql.php");
// configuration
?>
  <section class="product_listing_area">
            <div class="container">
                <div class="row p_listing_inner">
                     <?php
                        $row = $_POST['row'];

                                        /*$row = 0;*/
                        $rowperpage = 15;
                        $sql="SELECT *,product_id as id,(SELECT file_name FROM product_images WHERE product_id = id LIMIT 1) AS img FROM product AS tbl WHERE product_name != '' LIMIT 10,".$row; 
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                          {
                            while($row = $result->fetch_assoc()) 
                              {

                            
                                if ($row['img'] == '') 
                                {
                                    $img = "blank.jpg";
                                }else{
                                    $img =  "photos/".$row['img'];
                                }

                             // $url =  "product_create.php?action=update&id=".$_GET['product_id'];
                                 $url = "product_update.php?action=update&id=".$row['product_id'];

                             

                                ?>
                                   <br/>   <br/>

                    <div class="col-lg-6" style="margin-top:20px; width: auto !important;">

                        <div class="row" style=" border: 1px solid #ccc;  margin-right: 20px; width: 100%;">
                            
                            <div class="col-lg-6 col-sm-8">
                                <div class="p_list_text"  style="border-left: 1px solid #cccccc !important;     border-right: 1px solid #cccccc !important; padding-right: 7px;">
                                     <h3 ><?php echo $row['product_name']; ?> </h3>
                                      
                                    <ul>
                                        <li>Price: <?php echo "&#8369; ". number_format($row['product_price']); ?></li>
                                        <li>Category: <?php echo $row['product_cat']; ?></li>
                                        <li>Qty in Stock: <?php echo $row['product_qty']; ?></li>
                                        <li>Description: <?php echo $row['product_desc']; ?></li>

                                        <li><button onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $url; ?>', true),HideMenu()" class="btn btn-sm btn-link">Edit</button> </li>
                                    </ul>

                               
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                               
                                <div class="from_blog_item">
                                <!--  -->
                              <img src="<?php echo $img; ?>" alt="" height='250' width='260'></a>
                                <div class="f_blog_text">
                                   
                                  

                                <!--   <h5>fashion</h5> -->
                                </div>
                            </div>
                            </div>
                           <br/>
                        </div>
                        <br/>
                    </div>
                    <br/>
                    <?php
                              }

                          }
                        ?>
                    
                </div>
                  <br/>
            </div>
        </section>
