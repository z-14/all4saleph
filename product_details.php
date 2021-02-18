 <?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$product_id = $_GET["product_id"];


 $sql="SELECT * FROM product where product_id='$product_id'";
 $result =$conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 

       		$product_name = $row["product_name"];
       		$product_price = $row["product_price"];
       		$product_desc = $row["product_desc"];
       		 $product_cat = $row["product_cat"];
             $product_subcat = $row["product_subcat"];
             $seller_type=$row["seller_type"];
                                     $u_id= $row["u_id"];
                                     $date = $row['date'];
                                    $pro_id = $row["u_id"];
                                      $size = $row["size"];
                            $color = $row["color"];
                            $model = $row["model"];
                            $series = $row["series"];
                            $ram = $row["ram"];
                            $storage = $row["storage"];
                            $type = $row["type"];
                            $brand = $row["brand"];
                            $hdd = $row["hhd"];
                            $special_feature = $row["special_feature"];
                            $getting_this = $row["getting_this"];
                            $screen_tech = $row["screen_tech"];
                            $screen_size = $row["screen_size"];
                            $materials = $row["materials"];
                            $location= $row["location"];
                            $fee= $row["fee"];
                         $full_details = $row["full_details"];
                         $addr = $row["address"];
                         $seller_id=$row["u_id"];
                         

 $stock= $row["sold_out"];
       }

   }
if(isset($_GET["product_id"]))
{

$sql="SELECT * FROM product where product_id = '$product_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $views=$row["views"]+1;
                }

  $sql1 = "UPDATE `product` SET views = '$views' WHERE `product_id` = '$product_id'";
if ($conn->query($sql1) == TRUE)
 {
} else {
    echo $sql."Error updating record: " . $conn->error;
     
}
}

?>


		<!-- NAVIGATION -->

		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->

		<!-- /BREADCRUMB -->

		<!-- SECTION -->
    <style type="text/css">
  @media only screen and (max-width: 991px)
 {
.deo_ca
{
  display: block !important;
}
}

.deo_ca
{
  display: none;
}
</style>
		<div class="section"> 
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
				
				  <iframe scrolling="no" src="product_carousel.php?product_id=<?echo $product_id;?>" class="dd section" style="width: 100%; height:495px; max-height: 100%; max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;" marginheight="0" marginwidth="0" ></iframe>
					<!-- /Product thumb imgs -->
					
<!-- Product details -->
					

            <div class="col-md-12 col-sm-12 deo_ca"  >
            <div class="product-details">
              <h2 class="product-name"><?echo $product_name;?></h2>
              <div>
                   <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }?>
  <div class="product-rating">

                             <?
                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                     $number_ave = number_format($row['AVG(rating)'], 1);
                                 $number_format = number_format($row['AVG(rating)'], 0);

                                 $total = $number_format;
                                    }
                                  }
                                  while ($number_format != 0) {
                                    ?>
<i class="fa fa-star"></i>
                                    <?$number_format--;
                                  }

                                 $total-= $number_format;

            while ($total != 5) {
                                    ?>
<i class="fa fa-star-o"></i>
                                    <?$total++;
                                  }
                                 
                                ?>

                    </div>
                <a class="review-link" href="#"><?echo  $count;?> Review(s)</a>
              </div>
              <div>
                <h3 class="product-price"><?echo "₱". $product_price.".00";?><del class="product-old-price"></del></h3>

    <?
    if($stock != "yes")
    {
?>
<span class="product-available">In Stock</span>
<?
    }
    else
    {
      ?>
    <h6 style="color: #8B0000;">SOLD OUT</h6>

<?
    }
    ?>

              </div>
              <p><?echo $product_desc;?></p>





              <div class="product-options">
<?
 if($full_details == "yes")
{

  if(!empty($color))
  {
  ?>
            <label>
                  Color
                  <select class="input-select">
                    <?
                      color($color,$product_id);
                    ?>
                  </select>
                </label>

  <?
}

if (!empty($storage)) 
{
  ?>
            <label>
                  Storage
                  <select class="input-select">
                    <?
                      storage($storage,$product_id)
                    ?>
                  </select>
                </label>

  <?
  
}


if (!empty($screen_tech)) 
{
  ?>
            <label>
                  Screen Tech.
                  <select class="input-select">
                    <?
                      ScreenTech($screen_tech,$product_id)
                    ?>
                  </select>
                </label>

  <?
  
}
if (!empty($screen_size)) 
{
  ?>
            <label>
                  Screen Size
                  <select class="input-select">
                    <?
                      ScreenSize($screen_size,$product_id)
                    ?>
                  </select>
                </label>

  <?
  
}


  }

?>
            
              </div>

              <div class="add-to-cart">
                <div class="qty-label">
                  Qty
                  <div class="input-number">
                    <input type="number" value="1">
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                  </div>
                </div>
                <?if(!empty($_SESSION['u_u']))
                {?>
                <button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                <?}else{

                  ?>
  <button onClick="getLogin();" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>

                  <?
                }
  

                ?>
              </div>

              <ul class="product-btns">
                <li><a href="#" onClick="postIt('wishlist_reg.php?product_id=<?echo $product_id;?>'),hidePT()"><i class="fa fa-heart-o"></i> add to wishlist</a></li>

                <li><a href="#" data-toggle="modal"  data-target="#exampleModal" ><i class="fa fa fa-envelope icon-right-margin"></i> Leave messages</a></li>
              </ul>

              <ul class="product-links">
                <li>Category:</li>
                <li><a href=""><?echo $product_cat;?></a></li>
              </ul>

            

            </div>
          </div>
					<!-- Product details -->
			
					<!-- /Product details -->

					<!-- Product tab -->
				<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav background">
							
								<li class="active"><a data-toggle="tab" href="#tab2" aria-expanded="false">Details</a></li>
								<li class=""><a data-toggle="tab" href="#tab3" aria-expanded="false">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade ">
									<div class="row">
										<div class="col-md-12">
											<p><?echo $product_desc;?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade active in">
									<div class="row">
										<div class="col-md-12">
											<?
											if($full_details == "no")
  {

     if($getting_this == "Meet")
     {
   echo "<p class=\"deo_span\">Meet-up</span>"; 
   echo "<p  class=\"af-t mb-0 mb-0 \">$location</p>";   

     }
     else if ($getting_this == "Delivery")
     {
     echo "<p class=\"deo_span\" >Delivery</p>"; 
    echo "<p  class=\"af-t mb-0 mb-0\">$fee</p>";   
    }
     echo "<label class=\"deo_span\">Address</label>";
      echo "<p  class=\"af-t mb-0 mb-0\">$addr</p>";
   echo "<label class=\"deo_span\">Description</label>";
    if (empty($product_desc))
     {
   echo "<p class=\"af-t mb-0 mb-0\">No Description Available</p>"; 
    }
    else
    {
       
           echo "<p class=\"af-t mb-0 mb-0\">$product_desc</span>"; 
    }
  }

  else if($full_details == "yes")
{
  
if($product_subcat == "Tv")
  {
      
       echo "<label class=\"deo_span\">Brand</label>";
     echo "<p class=\"af-t mb-0\">$brand</p>"; 
     echo "<label class=\"deo_span\">Screen tech.</label>";
      echo "<p class=\"af-t mb-0\">$screen_tech</p>"; 
       echo "<label class=\"deo_span\">Screen Size</label>"; 
        echo "<p class=\"af-t mb-0\">$screen_size</p>";      
           
  }
 if($product_subcat == "Makeup")
  {
      makeup($brand,$type);
  }
  else if($product_subcat == "Cellphones")
  {
    cellphone($color,$storage);
  }
  else if($product_subcat == "Men" || $product_subcat=="Women")
  {
Men($type,$color,$size,$brand,$product_subcat);
  }

 
     if($getting_this == "Meet")
     {
       echo "<label class=\"deo_span\">Meet-up</label>";
       echo "<p  class=\"af-t mb-0\">$location</p>";   

     }
     else if ($getting_this == "Delivery")
     {
             echo "<label class=\"deo_span\">Delivery</label>";

    echo "<p  class=\"af-t mb-0\">$fee</p>";   
    }
     echo "<label class=\"deo_span\">Description</label>";

    if (empty($product_desc))
     {
   echo "<p class=\"af-t mb-0\">No Description Available</p>"; 
    }
    else
    {
           echo "<p class=\"af-t mb-0\">$product_desc</p>"; 
    }
  }
  
?>
										</div>
									</div>
								</div>
								<!-- /tab2  -->
<?tab3($product_id,$seller_id);?>
								<!-- /tab3  -->
							</div>
					
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">

						
						<div class="section-title text-center background">
							<h3 class="title ">Related Products</h3>
						</div>
					</div>

					<!-- product -->
				
					<!-- /product -->

					<!-- product -->
				
					<!-- /product -->

					<div class="clearfix visible-sm visible-xs"></div>

					

					<!-- product -->

				
					<?shop_product($product_id,$product_cat, $product_subcat ,$seller_type);?>
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<div style="margin-bottom: 100px;"></div>
		<!-- /Section -->


		<!-- /NEWSLETTER -->
		<?

function Tv($screen_tech,$brand,$screen_size)
{
  ?>

  <div class="form-group col-lg-4">
            <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>

 <div class="form-group col-lg-4"   >
            <label for="storage">Screen Tech<span>*</span></label>
    <select id="ram"class="form-control input-lg" onchange="addtoPost('&screen_tech='+this.value)" >
        <option disabled selected="" value="<?php echo $screen_tech; ?>"><?php echo $screen_tech; ?></option>

      <option value="LED">LED</option>
        <option value="CRT">CRT</option>
          <option value="QLED">QLED</option>
            <option value="LCD">LCD</option>
              <option value="PlASMA">PlASMA</option>
    </select>
    </div>

    <div class="form-group col-lg-4"   >
            <label for="storage">Screen Size(in)<span>*</span></label>
    <select id="ram"class="form-control input-lg" onchange="addtoPost('&screen_size='+this.value)" >
        <option disabled selected="" value="<?php echo $screen_size; ?>"><?php echo $screen_size; ?></option>

      <option value="up to 23 in">up to 23 in</option>
        <option value="24 to 31 in">24 to 31 in</option>
          <option value="32 to 39 in">32 to 39 in </option>
            <option value="40 to 47 in">40 to 47 in</option>
              <option value="48 to 54 in">48 to 54 in</option>
              <option value="55 in and above">55 in and above</option>
    </select>
    </div>

  <?
}

function makeup($brand,$type)
{

   echo "<label class=\"deo_span\">Brand</label>"; 
   echo "<p class=\"af-t mb-0\">$brand</p>"; 
    echo "<label class=\"deo_span\">Type</label>"; 
   echo "<p class=\"af-t mb-0\">$type</p>";   

}

function cellphone($color,$storage)
{

   echo "<label class=\"deo_span\">Color</label>"; 
   echo "<p class=\"af-t mb-0\">$color</p>"; 
    echo "<label class=\"deo_span\">Storage</label>"; 
   echo "<p class=\"af-t mb-0\">$storage</p>"; 
 
}

function Men($type,$color,$size,$brand,$sub_name)
{

  echo "<label class=\"deo_span\">Type</label>"; 
   echo "<p class=\"af-t mb-0\">$type</p>"; 
    echo "<label class=\"deo_span\">Storage</label>"; 
   echo "<p class=\"af-t mb-0\">$storage</p>"; 

if($type == "Bag and wallet" || $type =="Accessories" || $type == "Watches")
{
?>

 

<?
}
else
{
  echo "<label class=\"deo_span\">Color</label>"; 
   echo "<p class=\"af-t mb-0\">$color</p>"; 
    echo "<label class=\"deo_span\">Size</label>"; 
   echo "<p class=\"af-t mb-0\">$size</p>"; 

}
echo "<label class=\"deo_span\">Brand</label>"; 
echo "<p class=\"af-t mb-0\">$brand</p>"; 


}
?>

<style type="text/css">

.show
{
	display: none;
}
@media only screen and (max-width: 480px)
 {
.show
{
  display: block;
}
.dd
{
	height: 1000px;
}


}

#product-tab .tab-nav li {
    display: inline-block;
    background: #FFF;
    padding: 0px 15px;
}
.background {
    position: relative;
    z-index: 1;
    
    &:before {
        border-top: 2px solid #dfdfdf;
        content:"";
        margin: 0 auto; /* this centers the line to the full width specified */
        position: absolute; /* positioning must be absolute here, and relative positioning must be applied to the parent */
        top: 50%; left: 0; right: 0; bottom: 0;
        width: 95%;
        z-index: -1;
    }

    span { 
        /* to hide the lines from behind the text, you have to set the background color the same as the container */ 
        background: #fff; 
        padding: 0 15px; 
    }
}
 .fade:not(.show) {
    opacity: 1;
}
.af-t{
font-size: 13px;
    font-family: "Poppins", sans-serif;
    line-height: 24px;
    color: #666666;
    padding: 5px 0px;
    margin-top: -5px;
    margin-left: 15px;

  }
.deo_span
{
	margin-bottom:0px;
}
</style>
		<!-- /FOOTER -->

<?
 function getProductImage($product_id) 
  {

  
    include("sql.php");
    $sql="SELECT * FROM product_images where product_id = '$product_id' group by product_id"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        if (empty($row['file_name'])) {
            $img = "https://all4sale.ph/blank.jpg";
          } else {
            $img =  "https://all4sale.ph/photos/".$row['file_name'];
          }
      }
    }
    return $img;
  }


function shop_product($product_id,$product_cat, $product_subcat ,$seller_type)
{


 include("sql.php");
  $sql="SELECT * FROM product where product_name !='' and duplicate_no !='$product_id' and deleted !='yes' and seller_type = '$seller_type' and product_cat = '$product_cat' and product_subcat = '$product_subcat' ";

$sql.="ORDER BY date DESC LIMIT 4";
 $result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
	<?
while($row = $result->fetch_assoc())
{
	$u_u=$row["u_u"];
	$product_name=$row["product_name"];
	$product_price=$row["product_price"];
	$product_id = $row["product_id"];
	
?>

							<!-- product -->
							<div class="col-md-3 col-xs-6">
								<div class="product">
									<a ><div class="product-img">
			<img  onclick="javascript:ajaxpagefetcher.load('window','product_details.php?product_id=<?echo $product_id;?>')" src="<?echo getProductImage($row['product_id']);?>" alt="">
										<div class="product-label">
											<span class="new">NEW</span>
										</div>
									</div>
								</a>
									<div class="product-body">
										<p class="product-category deo_product_name"><?echo "Seller : ".$u_u;?></p>
										<h3 class="product-name deo_product_name"><a href="#"><?echo $product_name;?></a></h3>
										<h4 class="product-price"><?echo "₱".$product_price.".00";?><del class="product-old-price"></del></h4>
										   <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }?>
										<div class="product-rating">
											 <?
                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                     $number_ave = number_format($row['AVG(rating)'], 1);
                                 $number_format = number_format($row['AVG(rating)'], 0);

                                 $total = $number_format;
                                    }
                                  }
                                  while ($number_format != 0) {
                                    ?>
<i class="fa fa-star"></i>
                                    <?$number_format--;
                                  }

                                 $total-= $number_format;

 						while ($total != 5) {
                                    ?>
<i class="fa fa-star-o"></i>
                                    <?$total++;
                                  }
                                 
                                ?>
										</div>
										<div class="product-btns">
											<button  onClick="postIt('wishlist_reg.php?product_id=<?echo $product_id;?>'),hidePT()"  class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
											
										</div>
									</div>
									<div class="add-to-cart">
										<button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
							</div>


						

<?
}
?>

<?
}
}



?>
<style type="text/css">
.product-details .product-rating > i.fa-star {
    color: #fff300;
}
i.fa-star
{
	 color: #fff300;
}
</style>

<?
function tab3($product_id,$merchant_id)
{

  include("sql.php");

?>




	<div id="tab3" class="tab-pane fade">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
												
 <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                  
                                 }
                                }?>



                             <?
                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                     $number_ave = number_format($row['AVG(rating)'], 1);
                                 $number_format = number_format($row['AVG(rating)'], 0);

                                 $total = $number_format;
                                    }
                                  }
                                  ?>
 <span><?echo  $number_ave;?></span>
                            <div class="rating-stars">

                                  <?
                                  while ($number_format != 0) {
                                    ?>
<i class="fa fa-star"></i>
                                    <?$number_format--;
                                  }

                                 $total-= $number_format;

            while ($total != 5) {
                                    ?>
<i class="fa fa-star-o"></i>
                                    <?$total++;
                                  }
                                 
                                ?>

													</div>
												</div>
											
											</div>
										</div>
										<!-- /Rating -->
 <style>
              .reviews .review-heading .review-rating > i.fa-star,.rating-avg .rating-stars > i.fa-star,.rating .rating-stars > i.fa-sta {
    color: #fff300;
}

.rating .rating-stars > i.fa-star
{
  color: #fff300;
}
              </style>
										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
											
													<li>
														<div class="review-heading">
                               <?php  $sql = "SELECT * FROM product_rating WHERE product_id = '$product_id' ORDER BY date DESC LIMIT 2" ;
      $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $ratingsCount = $row['rating'];
            $total= $ratingsCount;
            $review = $row['review'];
             
        ?>
															<h5 class="name"><?php echo $row['u_u']; ?></h5>
															<p class="date"><?
            date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $row['date']);?></p>
															<div class="review-rating">
																
																    <?
                
                while ($ratingsCount != 0) {
                  ?>
                   <i class="fa fa-star checked"></i>

                  <?$ratingsCount--;
                }
                    

            while ($total != 5) {
                                    ?>
<i class="fa fa-star-o"></i>
                                    <?$total++;
                                  }
                                 
              ?>
															</div>

                              <?}}?>




														</div>
														<div class="review-body">
                                  <?php  $sql = "SELECT * FROM product_rating WHERE product_id = '$product_id' ORDER BY date DESC LIMIT 2" ;
      $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $review = $row['review'];
           echo  "<p>$review</p>";
             }}
        ?>

															
														</div>
													</li>
												</ul>
                        <!----
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
                        ---->
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<div class="review-form">
													<textarea class="input" onchange="addtoPost('&reviewsID='+this.value)" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio" onclick="addtoPost('&ratings='+this.value)"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio" onclick="addtoPost('&ratings='+this.value)"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"onclick="addtoPost('&ratings='+this.value)"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"onclick="addtoPost('&ratings='+this.value)"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"onclick="addtoPost('&ratings='+this.value)"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn" onClick="postItGoTo('rating_reg.php?product_id=<?php echo $product_id; ?>', 'product_details.php?product_id=<?php echo $product_id; ?>&merchant_id=<?echo $merchant_id;?>'),hidePT()">Submit</button>
												</div>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
<?

}


?>

