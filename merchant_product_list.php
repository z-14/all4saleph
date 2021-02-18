<?php
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
userAccessAdmin($admin);
?>

<section class="product_compare_area">
            <div class="container">
                <div class="compare_table">
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="border-bottom: 1px solid #cccccc !important; ">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>



<tbody>
<?

$page = $_GET["page"];

include("sql.php");
$sql="SELECT * FROM product WHERE product_name != '' LIMIT 10"; 
$result = $conn->query($sql);
$total=mysqli_num_rows($result);

if (isset($limit)){
	}else{$limit = 10;}
$pages = $total / $limit;
$page_in = $page * $limit;
$sql.="LIMIT $page_in ,$limit";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
	
	$product_id =$row["product_id"];
    $product_name =$row["product_name"];


?>




                                <tr>
                                    <td>
                                        <h6><?  echo $row["product_name"]; ?></h6>
                                    </td>
                                    <td><h6><?  echo $row["product_price"]; ?></h6></td>
                                    <td><h6><a onClick="javascript:ajaxpagefetcher.load('window','merchant_list_view_product.php?product_id=<? echo $product_id; ?>', true),HideMenu()">
                                    		<button type="button" class="btn btn-info"><i class="fa fa-eye"></i>view </button>
                                    	</a></h6></td>
                                </tr>



<?
}
}

?>
</tbody>
<tfoot>

</tfoot>
</table>
<div colspan="2" style="text-align: right;">
<div class="links">


<?php 
include("pagination.php");
?>
</div>
</div>
 </div>
                    
                </div>
            </div>
        </section>

				
				
				
