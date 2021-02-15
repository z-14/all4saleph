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



function shop_product()
{

include("sql.php");
$type = $_GET["type"];
$cat = $_GET["cat"];
$sub = $_GET["sub"];

if ($type == "Retail") {
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


  $sql="SELECT * FROM product where product_name !='' and deleted !='yes' and seller_type = '$type' ";


if (!empty($cat)) 
{
	$sql.="and product_cat ='$cat'";

	if(!empty($sub))
	{
		$sql.="and product_subcat ='$sub'";
	}
}

$sql.="ORDER BY date DESC LIMIT 12";
 $result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
	<div class="row">
	<?
while($row = $result->fetch_assoc())
{
	$u_u=$row["u_u"];
	$product_name=$row["product_name"];
	$product_price=$row["product_price"];
	$product_id = $row["product_id"];
	
?>

							<!-- product -->
							<div class="col-md-4 col-xs-6">
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
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
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
</div>

<?
}
}



?>