<?php
include("sessions.php");
include("globalconfig.php");
include("sql.php");

?>

<table class="blueTable">
	<thead>
<tr>
<th>Product ID</th>
<th>Product Name</th>
</tr>
</thead>



<tbody>
<?

	$page = $_GET["page"];
	include("sql.php");
	$sql="SELECT * FROM `product` ORDER BY product_id ASC "; //  
	 
	$result = $conn->query($sql);
	$total=mysqli_num_rows($result);

	if (isset($limit)){
		}else{$limit = 10;}
			$pages = $total / $limit;
			$page_in = $page * $limit;
				$sql.=" LIMIT $page_in ,$limit";
					$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$u_id =$row["u_id"];

?>


<tr>
	<td>
		<a onClick="javascript:ajaxpagefetcher.load('window','merchant_list_view_product.php?product_id=<? echo $product_id; ?>', true),HideMenu()"><?  echo $row["product_id"];?> </a>
	</td>
	<td>
		<?  echo $row["product_name"]; ?>
	</td>
</tr>






<?
}
}

?>
</tbody>
<tfoot>
<tr>
<td colspan="2">
<div class="links">


<?php 
include("pagination.php");
?>
</div>
</td>
</tr>
</tfoot>
</table>

				
				
				
