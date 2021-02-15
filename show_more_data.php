<?php

//fetch_data.php

include("sessions.php");
include("globalconfig.php");
include("sql.php");



 $type = $_SESSION["deo_type"];
 $cat = $_SESSION["deo_cat"];


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



if (isset($_POST["action"])) 
{



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

 $p_id =$_POST['id'];
$totalRowCount = 3;
 $sql="SELECT * FROM product where product_name !=''and product_cat = '$cat' and deleted !='yes' and seller_type = '$type' and duplicate_no = 0 and product_id < '$p_id'";
  $allcount_query = $sql;
            $allcount_result = mysqli_query($conn,$allcount_query);
            $allcount_fetch = $allcount_result->num_rows;
            $allcount = $allcount_fetch;


   if(isset($_POST["sub"]))
 {
$sub = implode("','", $_POST["sub"]);
  $sql .="AND product_subcat IN('".$sub."')";
 }

   if(isset($_POST["search"]))
 {
$search = $_POST["search"];
  $sql .="AND product_name LIKE '%$search%'";
 }

   if(isset($_POST["sortBy"]))
 {
$search=$_POST["sortBy"];

if (empty($search)) 
{
  
}
else
{
 $sql .="AND address = '$search'"; 
}
  
 }



  if(isset($_POST["sort"]))
 {
 $fil = implode("','",$_POST["sort"]);

    if( $fil == "high")
    {
        $sql .="ORDER BY product_price DESC,date DESC LIMIT 12";
    }
    else
    {
      $sql .="ORDER BY product_price ASC,date DESC LIMIT 12";
    }
 }
 else
 {
    $sql.=" ORDER BY date DESC LIMIT  12 ";
 }




 $result = $conn->query($sql);
if ($result->num_rows > 0) {

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
                <div class="product">
                  <a ><div class="product-img">
      <img  onclick="javascript:ajaxpagefetcher.load('window','product_details.php?product_id=<?echo $product_id;?>')" src="<?echo getProductImage($row['product_id']);?>" alt="">
                    <div class="product-label">
                      <!--<span class="new"></span>-->
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

                      <button   onClick="javascript:ajaxpagefetcher.load('window', 'convo.php?product_id=<?echo$product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $seller_id;?>&dd=<?echo "no";?>', true)"  class="add-to-wishlist"><i class="fa fa fa-envelope icon-right-margin"></i><span class="tooltipp">Chat</span></button>
                        
                      
                    </div>
                  </div>
                  <div class="add-to-cart">
                    <button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                  </div>
                </div>
              </div>
            

<?
}

                                 if($allcount > 12){ 
                                  ?>
       <div class="show_more_main Z-1 l-r" id="show_more_main<?php echo $postID; ?>">
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
