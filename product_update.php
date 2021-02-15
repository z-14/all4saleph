<?
session_start();
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];

if(isset($_GET['delete_photo']))
{
  $image_id = $_GET['image_id'];
  $sql_del = "DELETE FROM `product_images` WHERE image_id = '$image_id'";
  $file = "photos/".$_GET['url'];

  if($conn->query($sql_del))
  {

    try 
    {
       unlink($file);
       
    } catch (Exception $e) 
    {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }

}

if(isset($_GET['action'])) 
{
  $action = "product_reg.php?action".$_GET['action'];
}else
{
  $action = "product_reg.php?action=register";
}

if($_GET['id'] !== '' && $_GET['action'] == 'update')
  {

     $product_id = $_GET["product_id"];

    $sql2="SELECT * FROM product WHERE product_id ='{$_GET['id']}' LIMIT 0, 1"; 
    $result = $conn->query($sql2);
        //$result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                        {  
                            $product_id = $row["product_id"];  
                            $u_id  = $row["u_id"]; 
                            $u_u  = $row["u_u"];  
 

                            $product_name = $row["product_name"]; 
                            $product_cat = $row["product_cat"];  
                            $product_code = $row["product_code"];

                            $product_keyword = $row["product_keyword"]; 
                            $product_qty = $row["product_qty"];  
                            $product_price = $row["product_price"];  
                            $product_desc = $row["product_desc"];    
                        }
                }
    }









if($product_cat==""){
$product_info = "Select";
}else{
$product_info = $salutation;

  }
?>



<!--================Form Area =================-->
<section class="register_area p_100">
            <div class="container">
                <div class="register_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="billing_details">
                                <h2 class="reg_title">Product Detail</h2>
                                <div class="l_p_text" style="float: left;">
                                    <button class="add_cart_btn"  type="submit" onClick="javascript:ajaxpagefetcher.load('product','photo_upload.php', true),HideMenu()"  class="btn col-12 col-md-2 viral-btn mt-15">Add Photos</button>  
                                </div>
                              
                                <br/>
                                <br/>
                                <div class="row">
                                 <div id="product" class="col-12 col-lg-12"></div>
                                       <?php
                                    if (isset($_GET['action'])) 
                                    {
                                     include 'product_images.php';
                                    }
                                  ?>
                              </div>
                                <div class="billing_inner">
                                     
                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="product_name">Product Name <span>*</span></label>
                                          <input type="text" id="product_name"  value="<?php echo $product_name; ?>"onchange="addtoPost('&product_name='+this.value)"  oninput="showPass('product_name: '+ this.value);" onclick="showPass('product_name: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Name" name="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                           <label for="product_cat">Select Category<span>*</span></label>
                                                <select class="form-control"  id="product_cat"  value="<?php echo $product_cat; ?>" onchange="addtoPost('&product_cat='+this.value)" onclick="anchorIt(this.id)">

                                                    <option value=""><? echo $product_info; ?></option>
                                                    <option value="Electronic Devices">Electronic Devices</option>
                                                    <option value="Electronic Accessoriest">Electronic Accessoriest</option>
                                                    <option value="TV & Home Appliances">TV & Home Appliances</option>
                                                    <option value="Health & Beauty">Health & Beauty</option>
                                                    <option value="Babies & Toys">Babies & Toys</option>
                                                    <option value="Groceries & Pets">Groceries & Pets</option>
                                                    <option value="Womens Fashion">Women's Fashion</option>
                                                    <option value="Mens Fashion">Men's Fashion</option>
                                                    <option value="Fashion Accessories">Fashion Accessories</option>
                                                    <option value="Sports & Travel">Sports & Travel</option>
                                                    <option value="Automotive & Motorcycles">Automotive & Motorcycles</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="product_code">Product Code <span>*</span></label>
                                          <input type="number" id="product_code"  value="<?php echo $product_code; ?>" onchange="addtoPost('&product_code='+this.value)"  oninput="showPass('product_code: '+ this.value);" onclick="showPass('product_code: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Code" name="" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                           <label for="product_keyword">Product Keyword <span>*</span></label>
                                                         <input type="text" id="product_keyword"  value="<?php echo $product_keyword; ?>" onchange="addtoPost('&product_keyword='+this.value)"  oninput="showPass('product_keyword: '+ this.value);" onclick="showPass('product_keyword: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product keyword" name="" />
                                        </div>
                                    </div></div>
                                <div class="col-lg-6">
                                   <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Product Quantity <span>*</span></label>
                                                <input type="number" id="product_qty"  value="<?php echo $product_qty; ?>" onchange="addtoPost('&product_qty='+this.value)"  oninput="showPass('product_qty: '+ this.value);" onclick="showPass('product_qty: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Quantity" name="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                           <label for="product_price">Product Price <span>*</span></label>
                                            <input type="number" id="product_price"  value="<?php echo $product_price; ?>" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Price" name="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                           <label for="product_desc">Product Description <span>*</span></label>
                                             <input type="text" id="product_desc"  value="<?php echo $product_desc; ?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Description" name="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                           <label for="percentage_sale">Product Sale in Percentage <span>*</span></label>
                                             <input type="text" id="percentage_sale"  value="<?php echo $percentage_sale; ?>" onchange="addtoPost('&percentage_sale='+this.value)"  oninput="showPass('percentage_sale: '+ this.value);" onclick="showPass('percentage_sale: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Description" name="" />
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
                <div class="l_p_text" style="float: right;">
                                    <button class="add_cart_btn"  type="submit" class="btn col-12 col-md-2 viral-btn mt-15"  onclick="postItGoTo('product_reg.php?product_id=<?echo  $product_id;?>','product_list_merchant.php')">UPDATE</button>   

                                    
                                </div>
            </div>
        </section>


        <!--================End Form Area =================-->
  
          
  
  