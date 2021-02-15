<?
error_reporting(0);
include ("sessions.php");
include ("globalconfig.php");
include ('sql.php');
$u_u = $_SESSION["u_u"];

?>
<br>
<br>
  <?if ($u_u == "zylei14")
     {?>


<div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" style="background-color: #fff;">

<h3 class="deo_side">CATEGORIES</h3>

   </div>
                    <div class="card-body">
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
      	<div>
        <img style="width: 100px; height: 100px; margin: 0 8px;" src="auto.png">
        <p style="float: bottom;">Automotive</p>
        </div>
           

	 	<?}
	 }
?>
</div>
                    </div>
                     
                     
                </div>
          

            </div>
        </div>
     <?
   }
   ?>


