<?php
session_start();
//require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["product_qty"])) {
		    $productByproduct_id = $productArray[$_POST["product_id"]];
		    $itemArray = array($productByproduct_id["product_id"]=>array('product_name'=>$productByproduct_id["product_name"], 'product_id'=>$productByproduct_id["product_id"], 'product_qty'=>$_POST["product_qty"], 'product_price'=>$productByproduct_id["product_price"]));
			
			if(!empty($_SESSION["cart_item"])) {
			    $cartproduct_idArray = array_keys($_SESSION["cart_item"]);
			    if(in_array($productByproduct_id["product_id"],$cartproduct_idArray)) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByproduct_id["product_id"] == $k) {
							    $_SESSION["cart_item"][$k]["product_qty"] = $_SESSION["cart_item"][$k]["product_qty"]+$_POST["product_qty"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["product_id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table class="tutorial-table">
<tbody>
<tr>
<th><strong>product_name</strong></th>
<th><strong>product_id</strong></th>
<th class="align-right"><strong>product_qty</strong></th>
<th class="align-right"><strong>product_price</strong></th>
<th></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["product_name"]; ?></strong></td>
				<td><?php echo $item["product_id"]; ?></td>
				<td align="right"><?php echo $item["product_qty"]; ?></td>
				<td align="right"><?php echo "$".$item["product_price"]; ?></td>
				<td align="center"><a onClick="cartAction('remove','<?php echo $item["product_id"]; ?>')" class="btnRemoveAction cart-action"><img src="images/icon-delete.png" /></a></td>
				</tr>
				<?php
        $item_total += ($item["product_price"]*$item["product_qty"]);
		}
		?>

<tr>
<td colspan="3" align=right><strong>Total:</strong></td>
<td align=right><?php echo "$". number_format($item_total,2); ?></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
}
?>