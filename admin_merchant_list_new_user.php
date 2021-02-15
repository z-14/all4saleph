<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
userAccessAdmin($admin);

?>


        <!--================

<div class="row no-gutters">
    <div class="col-12 col-sm-6 col-md-8">.col-12 .col-sm-6 .col-md-8</div>
    <div class="col-6 col-md-4">.col-6 .col-md-4</div>
  </div>


        	Categories Product Area =================-->
        	<br>
        	
            	<h4 style="text-align: center;"> New applicantions for merchant </h4>
            	<br>
        <section class="categories_product_main p_80">

            <div class="container">
            	
                <div class="categories_main_inner">
                    <div class="row row_disable">
                        <div class="col-lg-9 float-md-left">
                        
                            <div class="c_product_grid_details">
                              
                               
                        <?


									include("sql.php");
									$sql="SELECT * FROM user_profile WHERE merchant ='1' "; 
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) 
									{										
										$u_id_u =$row["u_id"];
										  ?>
                                 <div class="c_product_item">
                                  <div class="row">


                                      <div class="col-lg-4 col-md-6">

   									 <div class="c_product_text">
                         			 <h3><?  echo $row["firstname"].' '.$row["middlename"].' '.$row["surname"]; ?></h3>
                                                <h5><?  echo $row["u_u"];?></h5>
                                              
                                                <p><?echo $productDescription;?></p>
                                                <ul class="c_product_btn">
                                                  
                                                    <li><a class="add_cart_btn" onClick="postItDataGoTo('&approve=yes-<? echo $u_id_u;?>','admin_merchant_application_action.php','admin_merchant_list_new_user.php'),hidePT()" href="#">Accept</a></li>

                                                       <li><a class="add_cart_btn"onClick="postItDataGoTo('&approve=no-<? echo $u_id_u;?>','admin_merchant_application_action.php','admin_merchant_list_new_user.php'),hidePT()" href="#">Decline</a></li>

                                                                                                       
                                                </ul>
                                            </div>




                                  
									

                                            </div>
                                        <div class="col-lg-8 col-md-6">

										<table class="blueTable">

											<tr><td>Birthday </td><td><?  echo $row["birthday"]; ?></td></tr>
											<tr><td>Address 1</td><td><?  echo $row["address"]; ?></td></tr>
											<tr><td>Bldg </td><td><?  echo $row["address_bldg"]; ?></td></tr>
											<tr><td>Street</td><td><?  echo $row["address_street"]; ?></td></tr>
											<tr><td>Brgy.</td><td><?  echo $row["address_brgy"]; ?></td></tr>
											<tr><td>City</td><td><?  echo $row["address_city"]; ?></td></tr>

										</table>

                                       
                                        </div>
                                    </div>
                                </div>
                                <?

									}

								}

									?>
                            </div>
                        
                          </div>
                       
        </section>


        <?


function all($u_id_u)

{

															
						$sql="SELECT * FROM merchant_docs WHERE u_id ='$u_id_u'"; 
							$result = $conn->query($sql);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {

															?>
															<tr><td>Uploaded document</td><td> <a target="_blank" href="https://<? echo $domain; ?>/merchant_docs/<?  echo $row['url']; ?>"> download document</a></td></tr>	
															<? 		
															}
															}
                                          					
}

        ?>


		

