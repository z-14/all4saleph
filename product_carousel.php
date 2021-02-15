
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
  $u_u=$row["u_u"];
  $product_id = $row["product_id"];
  $merchant_id = $row['u_id'];
       		$product_name = $row["product_name"];
       		$product_price = $row["product_price"];
       		$product_desc = $row["product_desc"];
       		 $product_cat = $row["product_cat"];
                                     $product_subcat = $row["product_subcat"];
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
                         $seller_type=$row["seller_type"];

 $stock= $row["sold_out"];
       }

   }



  function getProductImage($product_id) 
  {

    include("sql.php");

    $sql="SELECT * FROM product_images where product_id = '$product_id' group by product_id"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 
       	?>
<div class="product-preview">
	<img src="https://all4sale.ph/photos/<?echo $row["file_name"];?>"alt="">
</div>

       	<?
       
          }
      }
    }
    
  function tumb($product_id) 
  {

    include("sql.php");

    $sql="SELECT * FROM product_images where product_id = '$product_id'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 
       	?>
<div class="product-preview">
	<img src="https://all4sale.ph/photos/<?echo $row["file_name"];?>"alt="">
</div>

       	<?
       
          }
      }
    }
?>

<!DOCTYPE >
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">
   <link rel="stylesheet" href="deo_head.css" type="text/css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>
<style type="text/css">
  .info{
display: none;
width: 100%;
height: 100%;
font-size: 16px;
text-align: center;
position: fixed;
top: 0px;
bottom: 0px;
left: 0px;
z-index:100;
padding: 15px;
background: white url(loading2.gif) no-repeat center center; 
background-size: 40%;
color: black;
z-index:99999999999;
padding: 30px;
}
</style>
    </head>

	<body>
  <div id="windowPoP"></div>
  <div id="info" class="info" style="display: none;"></div>
<style type="text/css">
.product-details .product-rating > i.fa-star {
    color: #fff300;
}
</style>
		<div class="section">
			<!-- container -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							
							<?
							tumb($product_id) ;
							?>
						

						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							
							<?
							tumb($product_id)  ;
							?>

						</div>
					</div>
					<!-- /Product thumb imgs -->

						<div class="col-md-5">
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
				</div>
			</div>
			
		</div>
<?
function cellphone($color,$storage)
{

   echo "<label class=\"deo_details\">Color</label>"; 
   echo "<p class=\"ff-t\">$color</p>"; 
    echo "<label class=\"deo_details\">Storage</label>"; 
   echo "<p class=\"ff-t\">$storage</p>"; 
 
}

function ScreenTech($color,$product_id)
{
	
   
           include("sql.php");
	$sql="SELECT * FROM product where duplicate_no ='$product_id'";
 $result =$conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 
       	?>
<option value="<?echo $row["screen_tech"];?>"><?echo $row["screen_tech"];?></option>
<?
       }

       }

?>
<option value="<?echo $color;?>"><?echo $color;?></option>
<? 

  
}

function ScreenSize($color,$product_id)
{

	include("sql.php");
	$sql="SELECT * FROM product where duplicate_no ='$product_id'";
 $result =$conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 
       	?>
<option value="<?echo $row["screen_size"];?>"><?echo $row["screen_size"];?></option>
<?
       }

       }

?>
<option value="<?echo $color;?>"><?echo $color;?></option>
<? 

	
}

function color($color,$product_id)
{
include("sql.php");
	$sql="SELECT * FROM product where duplicate_no ='$product_id'";
 $result =$conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 
       	?>
<option value="<?echo $row["color"];?>"><?echo $row["color"];?></option>
<?
       }

       }

?>
<option value="<?echo $color;?>"><?echo $color;?></option>
<? 

}


function storage($storage,$product_id)
{
include("sql.php");
	$sql="SELECT * FROM product where duplicate_no ='$product_id'";
 $result =$conn->query($sql);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 

       	if ($row["storage"]== $storage) 
       	{
       		
       	}
       	else
       	{
       		?>
<option value="<?echo $row["storage"];?>"><?echo $row["storage"];?></option>
<?	
       	}
       
       }

       }

?>
<option value="<?echo $storage;?>"><?echo $storage;?></option>
<? 

}

?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="dd">
 <div class="form-group col-lg-12">
           <textarea type="text" id="product_desc"  placeholder="Messages" onchange="addtoPost('&messages='+this.value)" class="form-control" ></textarea>
                        </div> 
                      <div class="col-lg-2">
   <button  onClick="postIt('merchant_messages.php?merchant_id=<?echo $merchant_id;?>&product_id=<?echo $product_id;?>&seller_id=<?echo $seller_id;?>'),hidePT()" class="button ml-15 border-0" id="send" style="padding:14px;">send</button>
                            </div>
                          </div>
    </div>
  </div>
</div>





		<!-- /NEWSLETTER -->

<style type="text/css">
	.ff-t{
font-size: 13px;
    font-family: "Poppins", sans-serif;
    line-height: 24px;
    color: #666666;
    padding: 5px 0px;
    margin-top: -5px;
    margin-left: 15px;

  } .modal-backdrop
{
    opacity:0 !important;
}

</style>
		<!-- /FOOTER -->

<script type="text/javascript">



</script>
 <script>
        function informArt(info){ }
    </script>
		<!-- jQuery Plugins -->
			<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript" src="art.js"></script>
	</body>
</html>
