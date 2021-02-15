<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_id = $_SESSION["u_id"];
$u_u = $_SESSION["u_u"];



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
            <span> Inventory</span>
            </div>
            <div class="col-lg-4">

<input id="art_search_input" type="text" value="<?echo $_GET["search"];?>" placeholder="Search here" name="" onchange="javascript:ajaxpagefetcher.load('window', 'merchant_inventory_product.php?search='+this.value, true)" style="color: gray; border: 1px solid red;">    

</div>
            
             </div>
             </div>
          </div>
            <div class="card-body">
          
<?
 $sql="SELECT * FROM product where u_id = '$u_id' and product_name !='' and deleted !='yes' "; 

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
                                    $u_id = $row["u_id"];
                                    $u_u = $row["u_u"];
                                      $date = $row['date']; 
                                      $sold = $row['sold_out'];
                                      $product_cat = $row["product_cat"];
                                      $product_subcat = $row["product_subcat"];
                                      $quantity = $row["product_qty"];
                                      $duplicate_no = $row["duplicate_no"];
                     $imageURL = getProductImage($product_id,$duplicate_no);
                  $fulldetails=$row["full_details"];

                  wistlist($productName,$product_price,$productDescription,$product_id,$w_id,$u_u,$merchant_id,$imageURL,$product_cat,$product_subcat,$quantity,$sold, $fulldetails,$duplicate_no);
}
}

               

?>


            </div>
            <div class="card-footer border-light cart-panel-foo-fix">
              <a onClick="javascript:ajaxpagefetcher.load('window', 'product_image_first.php', true)"  class="btn btn-add-con">Sell Item</a>
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
function  wistlist($productName,$product_price,$productDescription,$product_id,$w_id,$u_u,$merchant_id,$imageURL,$product_cat,$product_subcat,$quantity, $sold, $fulldetails,$duplicate_no)
{
  ?>

 <div class="col-lg-12 p-3 cardlist">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="row">
                        <div class="col-6 col-lg-3 col-xl-2">
                          <div class="row">
                            
                            <a  class="w-100">
                              <div class="on_sale">
                              <div class="product_sale">
                            <?
                            if (empty($sold)) 
                            {
                            echo "<p style=\"background-color:green\">On Sale</p>";
                            }
                            else
                            {
                           echo "<p>Sold out</p>";

                            }

                            ?>
                                   
                              </div>
                              <img on style="width: 100px; "  src="<?echo $imageURL;?>" class="mx-auto d-block mb-1 addcartimg">
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="col-6 col-lg-9 col-xl-10">
                          <div class="d-block text-truncate mb-1">
                            <a  class="cartproname deo_product_name"><?echo $productName;?></a>
                          </div>
                          <div class="seller d-block">
                            <span>Seller: </span>
                            <span><?echo $u_u;?></span>
                          </div>
                          <div class="cartviewprice d-block">
                            <span class="amt deo_color_price"><?echo "Php ".$product_price;?></span>
                            <span class="oldamt"></span>
                            <span class="disamt"></span>
                          </div>
                          <div class="cartviewprice d-block">
                            <span class="oldamt"><?echo $product_cat; ?></span>
                            <span class="disamt"><?echo $product_subcat; ?></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4 col-lg-3 col-xl-2 p-0 qty">
                          <div class="input-group">

                            <?if(!empty($quantity))
                            {
                              if(empty($sold))
                            {
                              ?>
                          <div class="input-group-prepend">
                  <button type="button" onClick="subtract(<?echo $product_id;?>);" class="btn btn-sm btn-qty"><i class="fa fa-minus"></i></button>
                            </div>
   <input type="text" class="form-control form-control-sm text-center" id="<?echo $product_id;?>" aria-describedby="" onchange="manual(<?echo $product_id;?>);" value="<?echo $quantity;?>" required>
                    <div class="input-group-append">
               <button type="button" onclick="add(<?echo $product_id;?>);" class="btn btn-sm btn-qty"><i class="fa fa-plus"></i></button>
                          </div>
                            <?
                          }}?>
                           
                          </div>
                        </div>
                          <?if(empty($sold))
                          {
                           
                          ?>

    <div class="col-lg-3 col-5"><a  class="addcardrmv"> <button onclick= "rejectIt('window','product_details_update_reg.php?product_id=<?echo $product_id;?>','merchant_inventory_product.php','Mark this item sold?')" type="button" class="btn btn-success ">
                            <span class="fa fa-check"></span>Mark as sold
                        </button></a></div>

                          <?}
                        ?>
                      </div>
                    </div>
                    <div class="col-lg-3 ml-lg-auto align-self-start mt-2 mt-lg-0">
                      <div class="row-fluid">
                        <div class="prostatus">
                           <div class="product_buttons f-l">

   <?if(empty($sold))
                          {
                          ?>

                          <button  onClick="javascript:ajaxpagefetcher.load('window','product_edit.php?product_id=<?echo $product_id;?>&fulldetails=<?echo $fulldetails;?>&product_subcat=<?echo $product_subcat;?>', true),HideMenu()"  class="product_heart"><i class="fa fa-pencil"></i></button>


                          <?}?>
  <button onclick="rejectIt('window','product_details_update_reg.php?product_id=<?echo $product_id;?>&delete=yes','merchant_inventory_product.php','Are you sure you want to delete this product?')"  class="product_heart"><i class="fa fa-trash"></i></button>

  
   <?
   if($duplicate_no == 0 and empty($sold) and $fulldetails=="yes")
   {
   ?>
     <button onClick="javascript:ajaxpagefetcher.load('window','duplicate_product.php?product_id=<?echo $product_id;?>&fulldetails=<?echo $fulldetails;?>&product_subcat=<?echo $product_subcat;?>', true),HideMenu()"  class="product_heart">
   <i class="fa fa-clone" aria-hidden="true"></i></button>

<?}?>

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
  function getProductImage($product_id,$duplicate_no) 
  {

    if($duplicate_no != 0 )
    {
      $product_id=$duplicate_no;
    }
    else
    {

    }

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
.product_sale
{
  position: absolute;
z-index: 99;
right: -27px;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
transform: rotate(45deg);
}
  .product_sale p {
    margin: 0;
    color: #fff;
    background: #ff0000;
    padding: 3px 25px;
    box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.4);
  }
  .on_sale
{
background: #fff;
padding: 5px;
position: relative;
overflow: hidden;
overflow: hidden;
}
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