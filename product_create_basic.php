<?
session_start();
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


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
 

  $action = "product_reg.php?action=register&full=no";

if($_GET['details'] == "basic") 
{

   $action = "product_reg.php?action=register&full=no";
         if($_SESSION['merchant'] > 0)
                                         {
                                          ?>
                                            <!--================Form Area =================-->
  
             
                    <div class="contact_us_form row" >
                        <div class="form-group col-lg-4">

                          <label for="product_name">Product Name <span>*</span></label>
                             <input type="text" id="product_name"  value="<?php echo $product_name; ?>"onchange="addtoPost('&product_name='+this.value)"  oninput="showPass('product_name: '+ this.value);" onclick="showPass('product_name: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Name" name="" />
                           
                        </div>
                        <div class="form-group col-lg-4">

                  
         <label for="product_cat">Select Category<span>*</span></label>
         <select class="form-control"  id="product_cat" value="" onchange="basic(this.id,'slct2');addtoPost('&product_cat='+this.value)" onclick="anchorIt(this.id)">
                        
               <option disabled selected value="">Please select..</option>
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
                   
                   <option value="Food">Food</option>
                   <option value="Poltry supply">Poltry supply</option>
                  <option value="School supply">School supply</option>
                  <option value="Local pasalubong">Local pasalubong</option>
                  <option value="Livestock">Livestock</option>
                   <option value="Hardware">Hardware</option>
                                              </select>

                        </div>
  <div class="form-group col-lg-4">
<label for="product_cat">Select Sub-categories<span>*</span></label>
<select id="slct2" name="slct2" class="form-control input-lg" onchange="addtoPost('&product_subcat='+this.value);">
    <option value="">Please select Categories..</option>
   </select>
 </div>

  
             <div class="form-group col-lg-4">
                   <label for="phone">Product Quantity <span>*</span></label>
                  <input type="number" id="product_qty"  value="<?php echo $product_qty; ?>" onchange="addtoPost('&product_qty='+this.value)"  oninput="showPass('product_qty: '+ this.value);" onclick="showPass('product_qty: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Quantity" name="" />
                          </div>
                            <div class="form-group col-lg-4"><label for="product_price">Product Price <span>*</span></label>
                                            <input type="number" id="product_price"  value="<?php echo $product_price; ?>" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Price" name="" /></div>
   <div class="form-group col-lg-4">
<label for="product_cat">Address<span>*</span></label>
<select id="province"class="form-control input-lg" onchange="addtoPost('&address='+this.value)">
  <option disabled selected="" value="">Please select..</option>
    <option value="Abra">Abra</option>
    <option value="Agusan del Norte">Agusan del Norte</option>
    <option value="Agusan del Sur">Agusan del Sur</option>
    <option value="Aklan">Aklan</option>
    <option value="Albay">Albay</option>
    <option value="Antique">Antique</option>
    <option value="Apayao">Apayao</option>
    <option value="Aurora">Aurora</option>
    <option value="Basilan">Basilan</option>
    <option value="Bataan">Bataan</option>
    <option value="Batanes">Batanes</option>
    <option value="Batangas">Batangas</option>
    <option value="Benguet">Benguet</option>
    <option value="Biliran">Biliran</option>
    <option value="Bohol">Bohol</option>
    <option value="Bukidnon">Bukidnon</option>
    <option value="Bulacan">Bulacan</option>
    <option value="Cagayan">Cagayan</option>
    <option value="Camarines Norte">Camarines Norte</option>
    <option value="Camarines Sur">Camarines Sur</option>
    <option value="Camiguin">Camiguin</option>
    <option value="Capiz">Capiz</option>
    <option value="Catanduanes">Catanduanes</option>
    <option value="Cavite">Cavite</option>
    <option value="Cebu">Cebu</option>
    <option value="Compostela Valley">Compostela Valley</option>
    <option value="Cotabato">Cotabato</option>
    <option value="Davao del Norte">Davao del Norte</option>
    <option value="Davao del Sur">Davao del Sur</option>
    <option value="Davao Oriental">Davao Oriental</option>
    <option value="Dinagat Islands">Dinagat Islands</option>
    <option value="Eastern Samar">Eastern Samar</option>
    <option value="Guimaras">Guimaras</option>
    <option value="Ifugao">Ifugao</option>
    <option value="BoIlocos Nortehol">Ilocos Norte</option>
    <option value="Ilocos Sur">Ilocos Sur</option>
    <option value="Iloilo">Iloilo</option>
    <option value="Isabela">Isabela</option>
    <option value="Kalinga">Kalinga</option>
    <option value="La Union">La Union</option>
    <option value="Laguna">Laguna</option>
     <option value="Lanao del Norte">Lanao del Norte</option>
      <option value="Lanao del Sur">Lanao del Sur</option>
       <option value="Leyte">Leyte</option>
        <option value="Maguindanao">Maguindanao</option>
         <option value="Marinduque">Marinduque</option>
          <option value="Masbate">Masbate</option>
           <option value="Metro Manila">Metro Manila</option>
            <option value="Misamis Occidental">Misamis Occidental</option>
             <option value="Misamis Oriental">Misamis Oriental</option>
              <option value="Mountain Province">Mountain Province</option>
             <option value="Negros Occidental">Negros Occidental</option>
             <option value="Negros Oriental">Negros Oriental</option>
             <option value="Northern Samar">Northern Samar</option>
             <option value="Nueva Ecija">Nueva Ecija</option>
             <option value="Nueva Vizcaya">Nueva Vizcaya</option>
             <option value="Occidental Mindoro">Occidental Mindoro</option>
             <option value="Oriental Mindoro">Oriental Mindoro</option>
             <option value="Palawan">Palawan</option>
              <option value="Pampanga">Pampanga</option>
               <option value="Pangasinan">Pangasinan</option>
                <option value="Quezon">Quezon</option>
                 <option value="Quirino">Quirino</option>
                  <option value="Rizal">Rizal</option>
                   <option value="Romblon">Romblon</option>
                    <option value="Samar">Samar</option>
                     <option value="Sarangani">Sarangani</option>
                     <option value="Shariff Kabunsuan">Shariff Kabunsuan</option>
                     <option value="Siquijor">Siquijor</option>
                     <option value="Sorsogon">Sorsogon</option>
                     <option value="South Cotabato">South Cotabato</option>
                     <option value="Southern Leyte">Southern Leyte</option>
                     <option value="Sultan Kudarat">Sultan Kudarat</option>
                     <option value="Sulu">Sulu</option>
                     <option value="Surigao del Norte">Surigao del Nortehol</option>
                     <option value="Surigao del Sur">Surigao del Sur</option>
                     <option value="Tarlac">Tarlac</option>
                     <option value="Tawi-Tawi">Tawi-Tawi</option>
                     <option value="Zambales">Zambales</option>
                     <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                     <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                     <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>




   </select>
 </div>


                        <div class="form-group col-lg-12">
                            

                            <label for="product_desc">Product Description <span>*</span></label>
           <textarea type="text" id="product_desc"  value="<?php echo $product_desc; ?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Description" name="" ></textarea>
                        </div>



                        <div class="form-group col-lg-12" >
                          <div class="container">
                            <div class="row">
                              <div class="col-md-4 col-lg-2">
                                <button style="margin-top: 10px;" class="add_cart_btn  btn-block" onClick="postItGoTo('<?php echo $action; ?>','merchant_inventory_product.php'),hidePT()">Save</button>
                              </div><!-- /col -->
                                <div class="col-md-4 col-lg-2">
                                <button  style="margin-top: 10px;" class="add_cart_btn  btn-block"  type="submit" onClick="javascript:ajaxpagefetcher.load('add_photo','photo_upload.php', true),HideMenu()">Add Photos</button>
                              </div><!-- /col -->

                            </div><!-- /row --> 
</div>

                        </div>
                           </div>
                            
                    <div id="add_photo" class="col-12 col-lg-12"></div>


                    </div>
                    
                           
   

                                          <?
                                         }
                                  
                                 else
                                 {
                                       ?>


                                   <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Please Log In to Continue</h3>
                    <h4>If you already have an account <a href="#"  onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)">LOG IN HERE</a></h4>
                </div>
            </div>
        </section>
                <!--================End Form Area =================-->

                                     <?
                                 }

                                     


  
}else
{
  $action = "product_reg.php?action=register&full=yes";
  ?>
  <div class="contact_us_form row" >
                        <div class="form-group col-lg-4">

                          <label for="product_name">Product Name <span>*</span></label>
                             <input type="text" id="product_name"  value="<?php echo $product_name; ?>"onchange="addtoPost('&product_name='+this.value)"  oninput="showPass('product_name: '+ this.value);" onclick="showPass('product_name: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Name" name="" />
                           
                        </div>
                        <div class="form-group col-lg-4">

                  
         <label for="product_cat">Select Category<span>*</span></label>
         <select class="form-control"  id="product_cat" value="" onchange="populate(this.id,'slct2');addtoPost('&product_cat='+this.value)" onclick="anchorIt(this.id)">
                        
               <option disabled selected value="">Please select..</option>
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
                   
                   <option value="Food">Food</option>
                   <option value="Poltry supply">Poltry supply</option>
                  <option value="School supply">School supply</option>
                  <option value="Local pasalubong">Local pasalubong</option>
                  <option value="Livestock">Livestock</option>
                   <option value="Hardware">Hardware</option>
                                              </select>

                        </div>
  <div class="form-group col-lg-4">
<label for="product_cat">Select Sub-categories<span>*</span></label>
<select id="slct2" name="slct2" class="form-control input-lg" onchange="checkvalue(this.value);addtoPost('&product_subcat='+this.value);">
    <option value="">Please select Categories..</option>
   </select>
 </div>


  <div class="form-group col-lg-4" id="phone" style="display: none;" >
            <label for="Model">Model<span>*</span></label>
    <input type="text" id="Model"  value="<?php echo $Model; ?>" onchange="addtoPost('&model='+this.value)"  oninput="showPass('Model: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Model" name="" />
    </div>
     <div class="form-group col-lg-4" id="tabs" style="display: none; margin-bottom: 10px;" >
            <label for="storage">Series<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&series='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Series" name="" />
    </div>
      <div class="form-group col-lg-4"id="strg" style="display: none;"  >
            <label for="storage">Storage<span>*</span></label>
    <input type="text" id="storage"  value="<?php echo $storage; ?>" onchange="addtoPost('&storage='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="storage" name="" />
    </div>


    <div class="form-group col-lg-4" id="ra" style="display: none;" >
            <label for="storage">Ram(GB)<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&ram='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Ram" name="" />
    </div>

    <div class="form-group col-lg-4" id="comp" style="display: none;" >
    <label for="storage">HDD STORAGE(GB)<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&hhd='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="HDD" name="" />
    </div>



      <div class="form-group col-lg-4" id="comp" style="display: none;" >
            <label for="storage">SDD STORAGE(GB)<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&ssd='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="ram" name="" />
    </div>
 

    <div class="form-group col-lg-4"id="aud" style="display: none; "  >
            <label for="storage">Type<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&type='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Type" name="" />
    </div>
    <div class="form-group col-lg-4" id="aud" style="display: none;" >
            <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>

      <div class="form-group col-lg-4" id="aud" style="display: none;" >
            <label for="storage">Special Features<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&special_feature='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="specialFeature" name="" />
    </div>


    <div class="form-group col-lg-4" id="com_parts" style="display: none; " >
            <label for="storage">Type<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&type='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Type" name="" />
    </div>

    <div class="form-group col-lg-4"id="com_parts" style="display: none; " >
            <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>




   <div class="form-group col-lg-4" id="cse" style="display: none;" >
            <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>


    <div class="form-group col-lg-4" id="tv" style="display: none;" >
            <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>

    
      <div class="form-group col-lg-4" id="tv1" style="display: none;" >
            <label for="storage">Screen Tech<span>*</span></label>
    <input type="text" id="ram" onchange="addtoPost('&screen_tech='+this.value)"   class="form-control" placeholder="Screen Tech"  />
    </div>
    <div class="form-group col-lg-4" id="tv2" style="display: none;" >
            <label for="storage">Screen Size(in)<span>*</span></label>
    <input type="text" id="ram" onchange="addtoPost('&screen_size='+this.value)"   class="form-control" placeholder="Screen Tech"  />
    </div>


    <div class="form-group col-lg-4" id="firni" style="display: none; " >
            <label for="storage">Type<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&type='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Type" name="" />
    </div>


    <div class="form-group col-lg-4" id="firni1" style="display: none; " >
     <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>

     <div class="form-group col-lg-4" id="sz" style="display: none; " >
     <label for="storage">Size<span>*</span></label>
    <input type="text" id="ram" onchange="addtoPost('&size='+this.value)"  oninput="showPass('storage: '+ this.value);" class="form-control"  placeholder="Size" name="" />
    </div>

   <div class="form-group col-lg-4" id="f1" style="display: none; " >
     <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>

   <div class="form-group col-lg-4" id="f2" style="display: none; " >
     <label for="storage">Materials<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&materials='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Materials" name="" />
    </div>
   
     <div class="form-group col-lg-4" id="clr" style="display: none;" >
   <label for="storage">Color<span>*</span></label>
    <input type="text" id="storage"  value="<?php echo $storage; ?>" onchange="addtoPost('&color='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Color" name="" />
    </div>


    <div class="form-group col-lg-4"id="tp" style="display: none; "  >
            <label for="storage">Type<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $storage; ?>" onchange="addtoPost('&type='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Type" name="" />
    </div>

 <div class="form-group col-lg-4">
<label for="product_cat">Getting This<span>*</span></label>
<select class="form-control input-lg" onchange="deliver(this.value);addtoPost('&getting This='+this.value)">
      <option value="">Please select</option>
    <option value="Meet">Meet-up</option>
     <option value="Delivery">Delivery</option>
     <option value="both">both</option>
   </select>
 </div>

    <div class="form-group col-lg-4"id="meet" style="display: none; "  >
            <label for="storage">Location<span>*</span></label>
    <input type="text" id="ram"  value="" onchange="addtoPost('&location='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Type" name="" />
    </div>

     <div class="form-group col-lg-4"id="add" style="display: none; "  >
            <label for="storage">Fee<span>*</span></label>
    <input type="text" id="ram"  value="" onchange="addtoPost('&fee='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Fee" name="" />
    </div>
  
  
             <div class="form-group col-lg-4">
                            <label for="phone">Product Quantity <span>*</span></label>
                                                <input type="number" id="product_qty"  value="1" onchange="addtoPost('&product_qty='+this.value)"  oninput="showPass('product_qty: '+ this.value);" onclick="showPass('product_qty: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Quantity" name="" />
                          </div>
                            <div class="form-group col-lg-4"><label for="product_price">Product Price <span>*</span></label>
                                            <input type="number" id="product_price"  value="1" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Price" name="" /></div>
   <div class="form-group col-lg-4">
<label for="product_cat">Address<span>*</span></label>
<select id="province"class="form-control input-lg" onchange="addtoPost('&address='+this.value)">
  <option disabled selected="" value="">Please select..</option>
    <option value="Abra">Abra</option>
    <option value="Agusan del Norte">Agusan del Norte</option>
    <option value="Agusan del Sur">Agusan del Sur</option>
    <option value="Aklan">Aklan</option>
    <option value="Albay">Albay</option>
    <option value="Antique">Antique</option>
    <option value="Apayao">Apayao</option>
    <option value="Aurora">Aurora</option>
    <option value="Basilan">Basilan</option>
    <option value="Bataan">Bataan</option>
    <option value="Batanes">Batanes</option>
    <option value="Batangas">Batangas</option>
    <option value="Benguet">Benguet</option>
    <option value="Biliran">Biliran</option>
    <option value="Bohol">Bohol</option>
    <option value="Bukidnon">Bukidnon</option>
    <option value="Bulacan">Bulacan</option>
    <option value="Cagayan">Cagayan</option>
    <option value="Camarines Norte">Camarines Norte</option>
    <option value="Camarines Sur">Camarines Sur</option>
        <option value="Camiguin">Camiguin</option>
    <option value="Capiz">Capiz</option>
    <option value="Catanduanes">Catanduanes</option>
    <option value="Cavite">Cavite</option>
    <option value="Cebu">Cebu</option>
    <option value="Compostela Valley">Compostela Valley</option>
    <option value="Cotabato">Cotabato</option>
    <option value="Davao del Norte">Davao del Norte</option>
    <option value="Davao del Sur">Davao del Sur</option>
    <option value="Davao Oriental">Davao Oriental</option>
    <option value="Dinagat Islands">Dinagat Islands</option>
    <option value="Eastern Samar">Eastern Samar</option>
    <option value="Guimaras">Guimaras</option>
    <option value="Ifugao">Ifugao</option>
    <option value="BoIlocos Nortehol">Ilocos Norte</option>
    <option value="Ilocos Sur">Ilocos Sur</option>
    <option value="Iloilo">Iloilo</option>
    <option value="Isabela">Isabela</option>
    <option value="Kalinga">Kalinga</option>
    <option value="La Union">La Union</option>
    <option value="Laguna">Laguna</option>
     <option value="Lanao del Norte">Lanao del Norte</option>
      <option value="Lanao del Sur">Lanao del Sur</option>
       <option value="Leyte">Leyte</option>
        <option value="Maguindanao">Maguindanao</option>
         <option value="Marinduque">Marinduque</option>
          <option value="Masbate">Masbate</option>
           <option value="Metro Manila">Metro Manila</option>
            <option value="Misamis Occidental">Misamis Occidental</option>
             <option value="Misamis Oriental">Misamis Oriental</option>
              <option value="Mountain Province">Mountain Province</option>
             <option value="Negros Occidental">Negros Occidental</option>
             <option value="Negros Oriental">Negros Oriental</option>
             <option value="Northern Samar">Northern Samar</option>
             <option value="Nueva Ecija">Nueva Ecija</option>
             <option value="Nueva Vizcaya">Nueva Vizcaya</option>
             <option value="Occidental Mindoro">Occidental Mindoro</option>
             <option value="Oriental Mindoro">Oriental Mindoro</option>
             <option value="Palawan">Palawan</option>
              <option value="Pampanga">Pampanga</option>
               <option value="Pangasinan">Pangasinan</option>
                <option value="Quezon">Quezon</option>
                 <option value="Quirino">Quirino</option>
                  <option value="Rizal">Rizal</option>
                   <option value="Romblon">Romblon</option>
                    <option value="Samar">Samar</option>
                     <option value="Sarangani">Sarangani</option>
                     <option value="Shariff Kabunsuan">Shariff Kabunsuan</option>
                     <option value="Siquijor">Siquijor</option>
                     <option value="Sorsogon">Sorsogon</option>
                     <option value="South Cotabato">South Cotabato</option>
                     <option value="Southern Leyte">Southern Leyte</option>
                     <option value="Sultan Kudarat">Sultan Kudarat</option>
                     <option value="Sulu">Sulu</option>
                     <option value="Surigao del Norte">Surigao del Nortehol</option>
                     <option value="Surigao del Sur">Surigao del Sur</option>
                     <option value="Tarlac">Tarlac</option>
                     <option value="Tawi-Tawi">Tawi-Tawi</option>
                     <option value="Zambales">Zambales</option>
                     <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                     <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                     <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>




   </select>
 </div>


                        <div class="form-group col-lg-12">
                            

                            <label for="product_desc">Product Description <span>*</span></label>
           <textarea type="text" id="product_desc"  value="<?php echo $product_desc; ?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Description" name="" ></textarea>
                        </div>



                        <div class="form-group col-lg-12" >
                          <div class="container">
                            <div class="row">
                              <div class="col-md-4 col-lg-2">
                                <button style="margin-top: 10px;" class="add_cart_btn  btn-block" onClick="postItGoTo('<?php echo $action; ?>','merchant_inventory_product.php'),hidePT()">Save</button>
                              </div><!-- /col -->
                                <div class="col-md-4 col-lg-2">
                                <button  style="margin-top: 10px;" class="add_cart_btn  btn-block"  type="submit" onClick="javascript:ajaxpagefetcher.load('add_photo','photo_upload.php', true),HideMenu()">Add Photos</button>
                              </div><!-- /col -->

                            </div><!-- /row --> 
</div>

                        </div>
                           </div>
                            
                    <div id="add_photo" class="col-12 col-lg-12"></div>
  <?

}

?>

  <style>
    
 @media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px) {
.btn update_btn form-control{
  max-width: 100%;
}


}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #f7a992;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(253, 69, 8, 0.25);
}
  </style>
 