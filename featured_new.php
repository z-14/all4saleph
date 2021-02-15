Featured
<div class="owl-carousel owl-theme" style="width:103%; padding: 0px; left: -5px;">
<?
	include("sql.php");
	$sql="SELECT * FROM product where product_highlights = 'featured'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	 	while($row = $result->fetch_assoc()) {
	 		$product_id = $row["product_id"];
      		$productName = $row["product_name"];
      		$productName = $row["product_name"];
            $productDescription = $row["product_desc"];
            $product_price = $row["product_price"];
            $u_id = $row["u_id"];
            $u_u = $row["u_u"];
            $postID = $row['product_id'];
            $date = $row['date'];
      		$imageURL = getProductImage($product_id);
      		  $r = substr($productDescription, 0, 30);
                if (strlen($r) >= 30)
                 {
                   $productDescription = $r."...";
                }
                else
                {
                    $productDescription = $r;
                }
      		?>
      		<div class="item" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $u_id;?>', true)">
			<div class="item_contents " style="background: url('<?echo $imageURL;?>')center; background-size: cover; background-repeat: no-repeat; ">
			<div class="item_info">
			<div class="item_title"><div class="flag"></div>
			 <?echo $productName?></div>
			<div class="item_date">
			 <span style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?echo $productDescription;?></span>
			By <a onClick="#">  <?echo $u_u?>  </a>
			</div>
			<div class="item_price">
			<div class="item_price_amount"> <?echo $product_price?></div><div class="item_price_label">Php</div></div>


			<div class="comment_text"  onClick="#">Reviews
			<br>
			<img src="star_rating.png" style="width: 6px; height: 6px; float: right;"><img src="star_rating.png" style="width: 6px; height: 6px; float: right;"><img src="star_rating.png" style="width: 6px; height: 6px; float: right;"></div>

				
										
			</div>
			</div>
			</div>
	 	<?}
	 }
?>
</div>

Most Viewed
<div class="owl-carousel owl-theme" style="width:100%; padding: 0px;">
<?
	include("sql.php");
	$sql="SELECT * FROM product where views > 0 order by views asc Limit 10 ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	 	while($row = $result->fetch_assoc()) {
	 		$product_id = $row["product_id"];
      		$productName = $row["product_name"];
      		$productName = $row["product_name"];
            $productDescription = $row["product_desc"];
            $product_price = $row["product_price"];
            $u_id = $row["u_id"];
            $u_u = $row["u_u"];
            $postID = $row['product_id'];
            $date = $row['date'];
      		$imageURL2 = getProductImage($product_id);

      		  $r = substr($productDescription, 0, 20);
                if (strlen($r) > 10)
                 {
                   $productDescription = $r."...";
                }
                else
                {
                    $productDescription = $r;
                }
      		?>
      		<div class="item2"   onClick="#">
				<div class="item_contents">
					<div class="item_photo" style="background: url('<?echo $imageURL2;?>'); background-size: 200px 170px;"></div>
					<div class="item_info2">
					<div class="item_title">
					 <?echo $productName?></div>
					<div class="item_date">
				<span style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical;"><?echo $productDescription;?></span>
				By <a onClick="#">  <?echo $u_u?>  </a>
				</div>
					<div class="item_price2">
					<div class="item_price_amount"> <?echo $product_price?></div><div class="item_price_label">Php</div></div>


					<div class="comment_text"  onClick="javascript:ajaxpagefetcher.load('window', 'comments.php?tour_id=103&m_u_id=40', true),HideMenu()">Reviews
					<br>
					</div>

						
												
					</div>
					</div>
			</div>
	 	<?}
	 }
?>
</div>

<?
	function getProductImage($product_id) {
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
?>

