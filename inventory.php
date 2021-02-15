
<div style="height: 4rem; margin-bottom: 10px;" >
            <!-- container -->
          
            <!-- /container -->
 </div>

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

<input class="deo_form" type="text" value="<?echo $_GET["search"];?>" placeholder="Search here" name="" onchange="javascript:ajaxpagefetcher.load('window', 'inventory.php?search='+this.value, true)" style="color: gray; border: 1px solid red;">    

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
              <a onClick="javascript:ajaxpagefetcher.load('window', 'create_product.php', true)"  class="btn btn-add-con">Sell Item</a>
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
                            <span class="oldamt"><?echo $product_subcat; ?></span>
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
                  <button type="button" onClick="subtract(<?echo $product_id;?>);" class="btn btn-sm btn-qty m-0"><i class="fa fa-minus"></i></button>
                            </div>
   <input type="text" style="width: 70px;" class="form-control-sm text-center" id="<?echo $product_id;?>" aria-describedby="" onchange="manual(<?echo $product_id;?>);"  value="<?echo $quantity;?>" required>


                    <div class="input-group-append">
               <button type="button" onclick="add(<?echo $product_id;?>);" class="btn btn-sm btn-qty m-0"><i class="fa fa-plus"></i></button>
                          </div>
                            <?
                          }}?>
                           
                          </div>
                        </div>
                          <?if(empty($sold))
                          {
                           
                          ?>

    <div class="col-lg-4 col-sm-5"><a  class="addcardrmv"> <button  onclick= "rejectIt('window','product_details_update_reg.php?product_id=<?echo $product_id;?>','inventory.php','Mark this item sold?')" type="button" class="button full-width button-sliding-icon ripple-effect  p-2">
                            <span class="fa fa-check"></span>Mark as sold
                        </button></a></div>

                          <?}
                        ?>
                      </div>
                    </div>
                    <div class="col-lg-3 ml-lg-auto align-self-start mt-2 mt-lg-0">
                      <div class="row-fluid">
                        <div class="prostatus">

                           <div class="circle_btn f-l">

   <?if(empty($sold))
                          {
                          ?>

                          <button  onClick="javascript:ajaxpagefetcher.load('window','product_edit.php?product_id=<?echo $product_id;?>&fulldetails=<?echo $fulldetails;?>&product_subcat=<?echo $product_subcat;?>', true),HideMenu()"  class="product_heart"><i class="fa fa-pencil"></i></button>


                          <?}?>
  <button onclick="rejectIt('window','product_details_update_reg.php?product_id=<?echo $product_id;?>&delete=yes','inventory.php','Are you sure you want to delete this product?')"  class="product_heart"><i class="fa fa-trash"></i></button>

  
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





<style type="text/css">
  .card .card-footer {
  
      z-index: 99;
}
</style>