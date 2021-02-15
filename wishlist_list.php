<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_id = $_SESSION["u_id"];
$u_u = $_SESSION["u_u"];

if (!empty($_SESSION["u_id"]))
 {


?>

  <div class="container mt-3 mb-4">

    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div class="card border-light bg-white card proviewcard shadow-sm">
             <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8">
            <span> Wishlist</span>
            </div>
            <div class="col-lg-4">

<input id="art_search_input" type="text" value="<?echo $_GET["search"];?>" placeholder="Search here" name="" onchange="javascript:ajaxpagefetcher.load('window', 'wishlist_list.php?search='+this.value, true)" style="color: gray; border: 1px solid red;">    
</div>
            
             </div>
             </div>
          </div>
            <div class="card-body">
          
<?







 $sql="SELECT * FROM product_wishlist where u_id = '$u_id'";

  if (isset($_GET["search"])) 
 {
       $find = "%".$_GET["search"]."%";  
        $sql.="AND product_name LIKE '$find'  ";   
 }
 
$sql.="group by product_id ORDER by date desc ";
$result = $conn->query($sql);
$total=mysqli_num_rows($result);
$page = $_GET["page"];

if (isset($limit)){
  }else{$limit = 10;}
$pages = $total / $limit;
$page_in = $page * $limit;
$sql.="LIMIT $page_in ,$limit ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
  
  $product_id = $row["product_id"];
                  $productName = $row["product_name"];
                  $productDescription = $row["product_desc"];
                  $product_price = $row["product_price"];
                  $w_id = $row['w_id'];
                   $u_u = getMerchant($product_id);
                   $merchant_id = $row['merchant_id'];
                  $imageURL = getProductImage($product_id);


                  wistlist($productName,$product_price,$productDescription,$product_id,$w_id,$u_u,$merchant_id,$imageURL);

}
}

              

?>


            </div>
            <div class="card-footer border-light cart-panel-foo-fix">
              <a onClick="javascript:ajaxpagefetcher.load('window', 'shop_item_list.php', true)"  class="btn btn-add-con">Continue Shopping</a>
              <div style="float: right;">
              <?
              if($total >$limit )
              {
include("deo_pagination.php");
}
?>
</div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

<? 
}else
{

  include("login_mobile.php");
}


?>



<?
function  wistlist($productName,$product_price,$productDescription,$product_id,$w_id,$u_u,$merchant_id,$imageURL)
{
  ?>

 <div class="col-lg-12 p-3 cardlist">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="row">
                        <div class="col-4 col-lg-3 col-xl-2">
                          <div class="row">
                            <a  class="w-100">
                              <img style="width: 100px; "  src="<?echo $imageURL;?>" class="mx-auto d-block mb-1 addcartimg">
                            </a>
                          </div>
                        </div>
                        <div class="col-8 col-lg-9 col-xl-10">
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

                         <div class="col-lg-3 col-5"><a  class="addcardrmv"> <button onclick="confirmation('window','remove_to_wishlist.php?w_id=<?echo $w_id;?>','wishlist_list.php')" type="button" class="btn btn-danger ">
                            <span class="fa fa-cross"></span>Remove
                        </button></a></div>
                      </div>
                    </div>
                    <div class="col-lg-3 ml-lg-auto align-self-start mt-2 mt-lg-0">
                      <div class="row-fluid">
                        <div class="prostatus">
                           <div class="product_buttons f-l">
    <button  onClick="javascript:ajaxpagefetcher.load('window', 'conversation.php?product_id=<?echo$product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $merchant_id;?>&dd=<?echo "no";?>', true)" class="product_heart"><i class="fa fa-envelope"></i></button>
   <button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
 </div>
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>

  <?
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
</style>