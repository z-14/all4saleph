<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
 $type = $_GET["type"];
 $_SESSION['deo_type']=$type ;
  $_SESSION['deo_cat']=$cat = $_GET["cat"];
$sub = $_GET["sub"];

$rowperpage = 3;

  function getCatId($cat_name,$type)
  {

  	   include("sql.php");
    $sql="SELECT * FROM product_categories where cat_name = '$cat_name' and cat_type = '$type'"; 
 $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) 
      { 
      		$id = $row['cat_id'];
      }

  }

	 return $id;	
  }
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



function shop_product()
{

							 include("sql.php");

							 if(!empty($_GET['id']))
							 {
							 $type = $_GET['id'];
							 }
							 else
							 {
							 	$type = $_GET["type"];
							 }

$cat = $_GET["cat"];
$sub = $_GET["sub"];
if ($type == "Retail") 
{
  $type="Retailer";
}
else if($type == "Others")
{
 $type="Others";
}
else
{
 $type="Supplier";
}


  $sql="SELECT * FROM product where product_name !='' and deleted !='yes' and seller_type = '$type' and duplicate_no = 0 ";


if (!empty($cat)) 
{
	$sql.="and product_cat ='$cat'";

	if(!empty($sub))
	{
		$sql.="and product_subcat ='$sub'";
	}
}

if (!empty($_GET['value'])) 
{
	$name=$_GET['value'];
	$sql.="AND product_name LIKE '%$name%'";
}

  			$allcount_query = $sql;
            $allcount_result = mysqli_query($conn,$allcount_query);
            $allcount_fetch = $allcount_result->num_rows;
            $allcount = $allcount_fetch;

    $rowperpage = 12;

$sql.="ORDER BY date DESC LIMIT 0,$rowperpage";
 $result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
	<div class="row post">
	<?
while($row = $result->fetch_assoc())
{
	$u_u=$row["u_u"];
	$product_name=$row["product_name"];
	$product_price=$row["product_price"];
	$product_id = $row["product_id"];
	$merchant_id = $row['u_id'];
	$seller_id = $row['u_id'];

$postID = $row['product_id'];

?>

							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div id="post_<?php echo $postID; ?>"  class="product ">
									<a >
										<div class="product-img">
										
			<img  onclick="javascript:ajaxpagefetcher.load('window','product_details.php?product_id=<?echo $product_id;?>')" src="<?echo getProductImage($row['product_id']);?>" alt="">

										<div class="product-label">
											<!---
											<span class="new">NEW</span>
											-->
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
										<?
											if(!empty($_SESSION['u_u']))
											{
										?>
										<div class="product-btns">
											<button  onClick="postIt('wishlist_reg.php?product_id=<?echo $product_id;?>'),hidePT()"  class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										
											<button  	onClick="javascript:ajaxpagefetcher.load('window', 'convo.php?product_id=<?echo$product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $seller_id;?>&dd=<?echo "no";?>', true)"  class="add-to-wishlist"><i class="fa fa fa-envelope icon-right-margin"></i><span class="tooltipp">Chat</span></button>
												
										
											
										</div>
										<?
											}
											else
											{
												?>
										<div class="product-btns">
											<button  onclick="next('window','login.php');"  class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										
											<button  	 onclick="next('window','login.php');"  class="add-to-wishlist"><i class="fa fa fa-envelope icon-right-margin"></i><span class="tooltipp">Chat</span></button>
												
										
											
										</div>
										<?
											}
										?>
									</div>
									<div class="add-to-cart">
											<?
											if(!empty($_SESSION['u_u']))
											{
										?>
										<button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
										<?}else
										{
											?>

	<button  onclick="next('window','login.php');"  class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
											<?
										}?>
									</div>
								</div>
							</div>
						

<?
}
?>
</div>
<?
               if($allcount > 12){ 
                                  ?>
       <div  class="show_more_main Z-1 l-r" id="show_more_main<?php echo $postID; ?>">
        <span id="<?php echo $postID; ?>" class="show_more_shop" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
    </div>
    <?
     } 


}
else
{
	echo "No Product";
}
}



?>

	<div style="height: 2rem;" >

		</div>
		<?

?>
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Search</h3>
							                 <div class="input-group input-group-sm mb-3">
    <input type="text" id="search_id" class="deo_form" placeholder="Search Here" name="" onchange="dd();">
    <div class="input-group-prepend">
  </div>
</div> 
							<div class="checkbox-filter">
                                
								
								<?
include("sql.php");



	 $cat_id = getCatId($cat,$_GET['type']);
  $sql="SELECT * FROM product_subCat where cat_id = '$cat_id'";
 $result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
 <h6>Related Categories</h6>
	<?
	
while($row = $result->fetch_assoc())
{
								?>	
<div class="input-checkbox">
<input type="checkbox" name="shop_chech" onclick="dd();";  class="common_selector shop_class" value="<?echo $row['sub_name']?>" id="<?echo $row['s_id'];?>">
									<label for="<?echo $row['s_id']?>">
										<span></span>
										<?echo $row['sub_name']?>
										<small>(740)</small>
									</label>
								</div>

								<?
}}
								?>


									
 <h6>Sort By</h6>


							       <div class="input-radio">
									<input type="radio" onclick="dd();";  name='price_id' id="high" value="high">
									<label for="high">
										<span></span>
										Price - High to low
										<small></small>
									</label>
								</div>


							            	<div class="input-radio">
									<input type="radio" onclick="dd();";  name='price_id' id="low" value="low">
									<label for="low">
										<span></span>
										Price - Low to High
										<small></small>
									</label>
								</div>





							</div>
							           
        <h6>Location</h6>
  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
  </div>
 <select class="form-control" onchange="dd();" id="sortBy">
  <option  value="">Please select location</option>
    <option value="Abra">Abra</option>
    <option value="Agusan del Norte">Agusan del Norte</option>
    <option value="Agusan del Sur">Agusan del Sur</option>
    <option value="Aklan">Aklan</option>
    <option value="Albay">Albay</option>
    <option value="Antique">Antique</option>
    <option value="Apayao">Apayao</option>
    <option value="Aurora">Aurora</option>
    <option value="Basilan">Basilan</option>
    <option value="Bataan">Bataan</option>
    <option value="Batanes">Batanes</option>
    <option value="Batangas">Batangas</option>
    <option value="Benguet">Benguet</option>
    <option value="Biliran">Biliran</option>
    <option value="Bohol">Bohol</option>
    <option value="Bukidnon">Bukidnon</option>
    <option value="Bulacan">Bulacan</option>
    <option value="Cagayan">Cagayan</option>
    <option value="Camarines Norte">Camarines Norte</option>
    <option value="Camarines Sur">Camarines Sur</option>
        <option value="Camiguin">Camiguin</option>
    <option value="Capiz">Capiz</option>
    <option value="Catanduanes">Catanduanes</option>
    <option value="Cavite">Cavite</option>
    <option value="Cebu">Cebu</option>
    <option value="Compostela Valley">Compostela Valley</option>
    <option value="Cotabato">Cotabato</option>
    <option value="Davao del Norte">Davao del Norte</option>
    <option value="Davao del Sur">Davao del Sur</option>
    <option value="Davao Oriental">Davao Oriental</option>
    <option value="Dinagat Islands">Dinagat Islands</option>
    <option value="Eastern Samar">Eastern Samar</option>
    <option value="Guimaras">Guimaras</option>
    <option value="Ifugao">Ifugao</option>
    <option value="BoIlocos Nortehol">Ilocos Norte</option>
    <option value="Ilocos Sur">Ilocos Sur</option>
    <option value="Iloilo">Iloilo</option>
    <option value="Isabela">Isabela</option>
    <option value="Kalinga">Kalinga</option>
    <option value="La Union">La Union</option>
    <option value="Laguna">Laguna</option>
     <option value="Lanao del Norte">Lanao del Norte</option>
      <option value="Lanao del Sur">Lanao del Sur</option>
       <option value="Leyte">Leyte</option>
        <option value="Maguindanao">Maguindanao</option>
         <option value="Marinduque">Marinduque</option>
          <option value="Masbate">Masbate</option>
           <option value="Metro Manila">Metro Manila</option>
            <option value="Misamis Occidental">Misamis Occidental</option>
             <option value="Misamis Oriental">Misamis Oriental</option>
              <option value="Mountain Province">Mountain Province</option>
             <option value="Negros Occidental">Negros Occidental</option>
             <option value="Negros Oriental">Negros Oriental</option>
             <option value="Northern Samar">Northern Samar</option>
             <option value="Nueva Ecija">Nueva Ecija</option>
             <option value="Nueva Vizcaya">Nueva Vizcaya</option>
             <option value="Occidental Mindoro">Occidental Mindoro</option>
             <option value="Oriental Mindoro">Oriental Mindoro</option>
             <option value="Palawan">Palawan</option>
              <option value="Pampanga">Pampanga</option>
               <option value="Pangasinan">Pangasinan</option>
                <option value="Quezon">Quezon</option>
                 <option value="Quirino">Quirino</option>
                  <option value="Rizal">Rizal</option>
                   <option value="Romblon">Romblon</option>
                    <option value="Samar">Samar</option>
                     <option value="Sarangani">Sarangani</option>
                     <option value="Shariff Kabunsuan">Shariff Kabunsuan</option>
                     <option value="Siquijor">Siquijor</option>
                     <option value="Sorsogon">Sorsogon</option>
                     <option value="South Cotabato">South Cotabato</option>
                     <option value="Southern Leyte">Southern Leyte</option>
                     <option value="Sultan Kudarat">Sultan Kudarat</option>
                     <option value="Sulu">Sulu</option>
                     <option value="Surigao del Norte">Surigao del Nortehol</option>
                     <option value="Surigao del Sur">Surigao del Sur</option>
                     <option value="Tarlac">Tarlac</option>
                     <option value="Tawi-Tawi">Tawi-Tawi</option>
                     <option value="Zambales">Zambales</option>
                     <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                     <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                     <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>

                          
                                </select>
                                   </div> 
                    
                            </div>


                     
			
						<!-- /aside Widget -->

						<!-- aside Widget
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span></span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						 -->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- /aside Widget -->

						<!-- aside Widget 
						<div class="aside">
							<h3 class="aside-title">Most View</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>
						</div>
					 /aside Widget -->
					</div>
					<!-- /ASIDE -->

					
					<div class="col-md-9 filter_data">
						<?
							 shop_product();
						?>
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

		
	</tbody>


<style type="text/css">
	.checkbox-filter > div + div {
    margin-top: 0px;


}

.deo_sm:enabled:hover {
    background: rgba(28, 29, 30, 0.15);
}



</style>