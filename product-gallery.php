<?php
//require_once ("Product.php");
$product = new Product();
$productArray = $product->getAllProduct();
?>
<div id="product-grid">
    <div class="txt-heading">Products</div>
<?php
if (! empty($productArray)) {
    foreach ($productArray as $k => $v) {
        ?>
		<div class="product-item">
        <form id="frmCart">
            <div class="product-image">
                <img src="<?php echo [$k]["product_image"]; ?>">
            </div>
            <div>
                <div class="product-info">
                    <strong><?php echo [$k]["product_name"]; ?></strong>
                </div>
                <div class="product-info product-price"><?php echo "$".[$k]["product_price"]; ?></div>
                <div class="product-info">
                    <button type="button"
                        id="add_<?php echo [$k]["product_id"]; ?>"
                        class="btnAddAction cart-action"
                        onClick="cartAction('add','<?php echo [$k]["product_id"]; ?>')">
                        <!-- <img src="images/add-to-cart.png" /> -->
                    </button>
                    <input type="text"
                        id="qty_<?php echo [$k]["product_id"]; ?>"
                        name="quantity" value="1" size="2" />
                </div>
            </div>
        </form>
    </div>
	<?php
    }
}
?>
</div>