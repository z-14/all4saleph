<?
include("globalconfig.php");
include("sql.php");
include("sessions.php");


$u_id= $_SESSION["u_id"];

    



?>


   <!--================Categories Banner Area =================-->
       
        <!--================End Categories Banner Area =================-->
        
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_items">
                            <h3></h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
                                      <div class="row">
                                      <div class="col-12 col-lg-12 p-0">
                                         <div class="container mt-3 mb-4">


<?

                      $sql="SELECT * FROM cart where u_id = '$u_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                ?>   <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-7 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div class="card border-light bg-white card proviewcard shadow-sm">

            <div class="card-body">

                <?
               while($row = $result->fetch_assoc()) 
                  {
                            $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_description"];
                                    $product_price = $row["product_price"];
                                    $cart_id = $row['c_id'];
                                    $u_id = $row['u_id'];
                                    $u_u = getMerchant($product_id);
                                    $product_image=getProductImage($product_id);
                                    $merchant_id=$row['merchant_id'];
                                    
                                    ?>

                                    
                              <?product($productName,$product_price,$productDescription,$product_id,$cart_id,$u_id,$product_image,$merchant_id,$u_u);?>
                                      
                                      
<?
                      
                        $total_amout +=$product_price;
               }


?>
</div>
            <div class="card-footer border-light cart-panel-foo-fix">
              <a onClick="javascript:ajaxpagefetcher.load('window', 'shop_item_list.php', true)"  class="btn btn-add-con">Continue Shopping</a>
            </div>
          </div>
        </div>
          <div class="col-12 col-lg-5">
                                        <div class="container">
                                          <div class="row">
                                            <div class="col-12 col-lg-12">
                                             <div class="cart_totals_area">
                                              <h4>Cart Totals</h4>
                                              <div class="cart_t_list">
                                                <div class="media">
                                                  <div class="d-flex">
                                                    <h5>Subtotal</h5>
                                                  </div>
                                                  <div class="media-body">
                                                    <h6><?echo "PHP ".$total_amout;?></h6>
                                                  </div>
                                                </div>
                                                <div class="media">
                                                  <div class="d-flex">
                                                    <h5>Shipping</h5>
                                                  </div>
                                                  <div class="media-body">
                                                    <p></p>
                                                  </div>
                                                </div>
                                                <div class="media">
                                                  <div class="d-flex">

                                                  </div>
                                                  <div class="media-body">
                                                    <select class="selectpicker">
                                                      <option>Calculate Shipping</option>
                                                      <option>Calculate Shipping</option>
                                                      <option>Calculate Shipping</option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="total_amount row m0 row_disable">
                                                <div class="float-left">
                                                  Total
                                                </div>
                                                <div style="margin-left: 10px;" class="float-right">
                                               <h6><?echo "PHP ".$total_amout;?></h6>
                                                </div>
                                              </div>

                                            <button type="submit" style="float: center" value="submit" class="add_cart_btn py-2 px-5 subs_btn">Proceed to checkout</button>
                                            </div>

                                          </div>
                                          <div class="col-12 col-lg-12" style="margin-top: 20px;">

                                            <div class="total_amount_area">
                                              <div class="cupon_box">
                                                
                                                <div class="cupon_box_inner">
                                                  <h3 style="text-align: center;" class="cart_single_title">Discount Coupon</h3>
                                                  <input type="text" placeholder="Enter your code here">
                                                  <button type="submit" class=" add_cart_btn py-2 px-5 subs_btn">apply cupon</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


</div>

      </div>
    </div>
  
  </div>

</div>


</div>
              <?}
            else
             {

                ?>


        
        <!--================login Area =================-->
        <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Your Cart is Empty</h3>
                    <h4>back to <a onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php', true),HideMenu()" href="#">shopping</a></h4>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
                <?
               
            }

                 ?>

                                    
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>


        </section>
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

<?
  function getMerchant($product_id) {
    include("sql.php");
    $sql="SELECT * FROM product where product_id = '$product_id'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        if (empty($row['u_u'])) {
            $u_u = "No name";
          } else {
            $u_u = $row["u_u"];
          }
      }
    }
    return $u_u;
  }
?>
<?
function getProductDesc($product_id) {
  include("sql.php");
  $sql="SELECT * FROM product where product_id = '$product_id'"; 
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())  {
        $productDesc = $row["product_desc"];?>
        <span class="des" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 3; -webkit-box-orient: vertical; width:100%; color: #a6a6a6; text-align: left;"><?echo $productDesc;?></span>
    <?}
  }
}

?>

        <!--================End Shopping Cart Area =================-->
        <?


function product($productName,$product_price,$productDescription,$product_id,$cart_id,$u_id,$product_image,$merchant_id,$u_u)
{
  ?>
  <div class="col-lg-12 p-3 cardlist">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="row">
                        <div class="col-4 col-lg-3 col-xl-4">
                          <div class="row">
                            <a  class="w-100">
                              <img style="width: 100px; "  src="<?echo $product_image;?>" class="mx-auto d-block mb-1 addcartimg">
                            </a>
                          </div>
                        </div>
                        <div class="col-8 col-lg-9 col-xl-8">
                          <div class="d-block text-truncate mb-1">
                            <a  class="cartproname deo_product_name"><?echo $productName;?></a>
                          </div>
                          <div class="seller d-block">
                            <span>Seller: </span>
                            <span><?echo $u_u;?></span>
                          </div>
                          <div class="cartviewprice d-block">
                            <span class="amt deo_color_price"><?echo "Php ".$product_price;?></span>
                            <span class="disamt"></span>
                          </div>
                          <div class="cartviewprice d-block">
                            <span class="oldamt"><?echo $productDescription; ?></span>
                            <span class="disamt"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4 col-lg-3 col-xl-2 p-0 qty">
                          <div class="input-group">
                         
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 ml-lg-auto align-self-start mt-2 mt-lg-0">
                      <div class="row-fluid">
                        <div class="prostatus">
                           <div class="product_buttons f-l">
    <button  onClick="javascript:ajaxpagefetcher.load('window', 'conversation.php?product_id=<?echo$product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $merchant_id;?>&dd=<?echo "no";?>', true)" class="product_heart"><i class="fa fa-envelope"></i></button>


   <button onclick="rejectIt('window','remove_to_cart.php?cart_id=<?echo $cart_id;?>','cart_list.php','Removed this item?')" class="add_to_cart"><i class="fa fa-trash"></i></button>
 </div>
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
<?
}?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .card{
    border-radius: 0;
}
.card .card-header{
    background-color: #fff;
    font-size: 18px;
    padding: 10px 16px;
}
.proviewcard .card-body{
    padding: 0;
}
.cardlist{
    border-bottom: 1px solid #f0f0f0;
}
.cardlist:last-child{
    border: 0;
}
.addcartimg{
    height: 100px;
}
.cartproname{
    font-size: 15px;
    color: #212529;
    line-height: 1;
    display: inline;
}
.cartproname:hover{
    color: #c16302;
    text-decoration: none;
}
.seller{
    font-size: 12px;
    color: #666;
    margin-bottom: 5px;
    line-height: 1;
}
.cartviewprice{
    margin-bottom: 8px;
    line-height: 1;
}
.cartviewprice span{
    display: inline-block;
    padding-right: 10px;
    margin-bottom: 5px;
}
.cartviewprice .amt{
    font-size: 18px;
    font-weight: 600;
}
.cartviewprice .oldamt{
    color: #757575;
    font-weight: 600;
    overflow: hidden;
hyphens: auto;
text-overflow: ellipsis;
}
.cartviewprice .disamt{
    font-weight: 600;
    color: #c16302;
}
.qty .input-group{
    width: 100%;
    height: 25px;
}
.btn-qty{
    height: 25px;
    color: #fff !important;
    background-color: #555 !important; 
    border-color: #555 !important;
    padding: 0px 3px !important;
}
.qty input{
    height: 25px;
}
.addcardrmv{
    font-size: 14px;
    line-height: 1.8;
    text-transform: uppercase;
    color: #212529;
}
.addcardrmv:hover{
    color: #c16302;
    text-decoration: none;
    font-weight: 600;
}
.prostatus .del-time {
    font-size: 12px;
    color: #757575;
    margin-right: 10px;
}
.prostatus .del-time > span {
    font-weight: 600;
    color: #555;
}
.proviewcard .card-footer{
    text-align: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px -2px 10px 0px;
    padding: 8px 15px;
}
.btn-add-con{
    background-color: #fff;
    color: #212121;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 2px 0px;
    font-size: 16px;
    font-weight: 500;
    padding: 8px 20px;
    border-radius: 2px;
    border-width: 1px;
    border-style: solid;
    border-color: #E0E0E0;
    border-image: initial;
    min-width: 185px;
}
.card .card-footer{
    background-color: #fff;
}

/*Card Footer Fixed*/
@supports (box-shadow: 2px 2px 2px black){
  .cart-panel-foo-fix{
    position: sticky;
    bottom: 0;
    z-index: 9;
  }
}

.btn-cust {
    background-color: #e96125 !important;
    color: #fff !important;
    font-size: 16px;
    padding: 8px 8px;
    min-width: 128px;
}
.btn-cust:hover {
    background-color: #c74b14 !important;
    color: #fff !important;
}
.f-l
{
  float: right;
}
.swal2-cancel
  {
    margin-right: 10px;
  }
</style>