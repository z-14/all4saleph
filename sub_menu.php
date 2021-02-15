 
<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
 $dd = $_GET["c_id"];

$rr = explode("=",$dd);

$c_id = $rr[0];
$cat_name = $rr[1];
$_SESSION['deo_seller'] = $rr[2];
?>
  <?
          include("sql.php");

             $sql="SELECT * FROM product_subCat WHERE `cat_id` = '$c_id'"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          ?>
 <div class="col-xl-12">
                        <span  class="deo_span" >Related category</span>
    <div class="input-group input-group-sm mb-3">
      <select class="form-control" onchange="next('field','field.php?cat_name=<?echo $cat_name;?>&sub_name='+this.value,true) " title="Select Category" id="category" >
      


          <option value="" disabled selected>Please Select Categories</option>


          <?
        while($row = $result->fetch_assoc()) 
        {
?>
            <option value="<?echo $row["sub_name"];?>"><?echo $row["sub_name"];?></option>
            
                <?

            }
        }
        else
        {

?>
 <div class="container mt-3 mb-4">
    <div class="row">
     
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div>
             <div >
              <div style="margin-top: 20px; margin-bottom: 20px;" class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">

                      <div class="container row pull-right">

<div class="col-lg-6">
                 <div class="input-radio">
                  <input type="radio" onClick="javascript:ajaxpagefetcher.load('sub','field.php?sub_name=<?echo $sub_name;?>&cat_name=<?echo $cat_name;?>&other=<?echo $other;?>&detail=full', true),HideMenu()" name='price_id' id="low" value="high"  >
                  <label class="deo_label" for="low">
                    <span class="deo_checkbox"></span>
                   Full Details
                    <small></small>
                  </label>
                </div>
              </div>


<div class="col-lg-6 checkbox-filte">
        <div class="input-radio">
                  <input type="radio" onClick="javascript:ajaxpagefetcher.load('sub','field.php?sub_name=<?echo $sub_name;?>&cat_name=<?echo $cat_name;?>&other=<?echo $other;?>&detail=basic', true),HideMenu()" name='price_id' id="high" value="high" >
                  <label class="deo_label" for="high">
                    <span class="deo_checkbox"></span>
                    Basic Details
                    <small></small>
                  </label>
                </div>
</div>






 


</div>





            </div>
    
             </div>
             </div>
          </div>
            <div class="card-body">
       <div class="sc">
 
        <div class="cotainer-fluid">
           <div style="margin-left:0; margin-right: 0;" class="row">      
<?

if ($_GET["detail"]== "full") 
{
 
   
    full_details($sub_name);
 }
 else
 {
basic_details();
 }
?>

<div class="form-group col-lg-12" >
                          <div class="container">
                            <div class="row">
<div class="col-md-12 col-lg-12">
 <button style="margin-top: 10px;" class="button full-width button-sliding-icon ripple-effect  btn-block" onClick="postItGoTo('product_reg.php?action=register&full=<?echo $_GET["detail"];?>&cat_name=<?echo $cat_name;?>&sub_name=<?echo $sub_name;?>&other=<?echo $other;?>','inventory.php'),hidePT()">Save</button>

                              </div><!-- /col -->
                               <!-- /col -->

                            </div><!-- /row --> 
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

  </div>

<?
function full_details($sub_name)
{

  ?>
  <div class="form-group col-lg-12">
       <label for="product_name"><span class="deo_span">Product Name </span></label>
                             <input type="text" id="product_name"  value="<?php echo $product_name; ?>"onchange="addtoPost('&product_name='+this.value)"  oninput="showPass('product_name: '+ this.value);"  class="deo_form" placeholder="Product Name" name="" />
 </div>
   <div class="form-group col-lg-12">
       <label for="product_qty"> <span class="deo_span">Product Quantity</span></label>
                             <input type="text" id="product_qty"  value="<?php echo $product_qty; ?>"onchange="addtoPost('&product_qty='+this.value)"  oninput="showPass('product_qty: '+ this.value);"  class="deo_form" placeholder="Product Quantity" name="" />
 </div>
<?



  if ($sub_name == "Tv") 
  {
    Tv();
  }
  else if($sub_name == "Makeup")
  {
      makeup();
  }
  else if($sub_name == "Cellphones")
  {
    cellphone();
  }
  else if($sub_name == "Laptop and Desktop")
  {
laptop();
  }
  else if($sub_name == "Men" || $sub_name=="Women")
  {
Men();
  }









?>
  <div class="form-group col-lg-12">
<label for="product_cat"><span class="deo_span">Getting This</span></label>
<select class="deo_form input-lg" onchange="deliver(this.value);addtoPost('&getting This='+this.value)">
     <option disabled selected="" value="">Please select..</option>

    <option value="Meet">Meet-up</option>
     <option value="Delivery">Delivery</option>
     <option value="both">both</option>
   </select>
 </div>

    <div class="form-group col-lg-12"id="meet" style="display: none; "  >
            <label for="storage"><span class="deo_span">Location</span></label>
    <input type="text" id="ram"  value="" onchange="addtoPost('&location='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="" name="" />
    </div>

     <div class="form-group col-lg-12"id="add" style="display: none; "  >
            <label for="storage"><span class="deo_span">Fee</span></label>
    <input type="text" id="ram"  value="" onchange="addtoPost('&fee='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Fee" name="" />
    </div>

 <div class="form-group col-lg-12"><label for="product_price"><span class="deo_span">Product Price</span></label>
        <input type="number" id="product_price"  value="" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Product Price" name="" /></div>
         <div class="form-group col-lg-12">
<label for="product_cat"><span class="deo_span">Address</span></label>
<select id="province"class="deo_form input-lg" onchange="addtoPost('&address='+this.value)">
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
    <option value="Ilocos Norte">Ilocos Norte</option>
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
                            

                            <label for="product_desc"><span class="deo_span">Product Description</span></label>
           <textarea type="text" id="product_desc"  value="<?php echo $product_desc; ?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Product Description" name="" ></textarea>
                        </div>

<?
}
?>

<?
function basic_details()
{
  ?>
  <div class="form-group col-lg-12">
       <label for="product_name"><span class="deo_span">Product Name </span></label>
      <input type="text" onchange="addtoPost('&product_name='+this.value)"class="deo_form" placeholder="Product Name"/>
 </div>

 <div class="form-group col-lg-12"><label for="product_price"><span class="deo_span">Product Price </span></label>
        <input type="number" id="product_price"  value="" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Product Price" name="" /></div>


         <div class="form-group col-lg-12">
<label for="product_cat"><span class="deo_span">Address</span></label>
<select id="province"class="deo_form input-lg" onchange="addtoPost('&address='+this.value)">
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
 <label for="product_desc"><span class="deo_span">Product Description </span></label>
           <textarea type="text" id="product_desc"  value="<?php echo $product_desc; ?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Describe what you are selling any details a buyer be interested." name="" ></textarea>
  </div>



<?
}
?>
<br>
<br>
<br>
<br>

<?

function Tv()
{
  ?>

  <div class="form-group col-lg-4">
            <label for="storage"><span class="deo_span">Brand</span></label>
    <input type="text" id="ram"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="brand" name="" />
    </div>

 <div class="form-group col-lg-4"   >
            <label for="storage"><span class="deo_span">Screen Tech</span></label>
    <select id="ram"class="deo_form input-lg" onchange="addtoPost('&screen_tech='+this.value)" >
        <option disabled selected="" value="<?php echo $screen_tech; ?>">Please select..</option>

      <option value="LED">LED</option>
        <option value="CRT">CRT</option>
          <option value="QLED">QLED</option>
            <option value="LCD">LCD</option>
              <option value="PlASMA">PlASMA</option>
    </select>
    </div>

    <div class="form-group col-lg-4"   >
            <label for="storage"><span class="deo_span">Screen Size(in)</span></label>
    <select id="ram"class="deo_form input-lg" onchange="addtoPost('&screen_size='+this.value)" >
        <option disabled selected="" value="<?php echo $screen_size; ?>">Please select..</option>

      <option value="up to 23 in">up to 23 in</option>
        <option value="24 to 31 in">24 to 31 in</option>
          <option value="32 to 39 in">32 to 39 in </option>
            <option value="40 to 47 in">40 to 47 in</option>
              <option value="48 to 54 in">48 to 54 in</option>
              <option value="55 in and above">55 in and above</option>
    </select>
    </div>

  <?
}

function makeup()
{
  ?>

  <div class="form-group col-lg-4">
            <label for="storage"><span class="deo_span">Brand</span></label>
    <input type="text"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="brand" name="" />
    </div>

 <div class="form-group col-lg-4"   >
            <label for="storage"><span class="deo_span">Type</span></label>
    <select id="Brand"class="deo_form input-lg" onchange="addtoPost('&type='+this.value)" >
        <option disabled selected="" value="<?php echo $type; ?>">Please select..</option>
      <option value="Foundation">Foundation</option>
        <option value="Highlighter">Highlighter</option>
          <option value="Primer">Primer</option>
            <option value="Eyeliner">Eyeliner</option>
              <option value="Eyeshadow">Eyeshado</option>
              <option value="Lip Stain/Tint">Lip Stain/Tint</option>
              <option value="Lip Gloss">Lip Gloss</option>
              <option value="Bronzer">Bronzer</option>
              <option value="Concealer and Corection">Concealer and Corection</option>
              <option value="Palettes">Palettes</option>
              <option value="Eyeglow">Eyeglow</option>
              <option value="Flase Eyelashes">Flase Eyelashes</option>
              <option value="Lipstick">Lipstick</option>
              <option value="Lip Balm">Lip Balm</option>
                <option value="Lip Liner">Lip Liner</option>
                <option value="Other">Other</option>
    </select>
    </div>


  <?

}

function cellphone()
{
  ?>
    <div class="form-group col-lg-4">
            <label for="color"><span class="deo_span">Color</span></label>
    <input type="text"  value="<?php echo $color; ?>" onchange="addtoPost('&color='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="color" name="" />
    </div>
    <div class="form-group col-lg-4" id="tv2" >
            <label for="storage"><span class="deo_span">Storage</span></label>
    <select id="ram"class="deo_form input-lg" onchange="addtoPost('&storage='+this.value)" >
      <option disabled selected="" value="<?php echo $storage; ?>">Please select..</option>
      <option value="8GB">8GB</option>
        <option value="16GB">16GB</option>
          <option value="32GB">32GB</option>
            <option value="64GB">64GB</option>
              <option value="128GB">128GB</option>
    </select>
    </div>


  <?
}

function Men()
{
  ?>
   
    <div class="form-group col-lg-12" id="tv2" >
<span  class="deo_span" >Type</span>     <select id="type"class="deo_form input-lg" onchange="checkvalue(this.value);addtoPost('&type='+this.value)" >
      <option disabled selected="" value="<?php echo $type; ?>">Please select..</option>
      <option value="Bag and wallet">Bag & Wallets</option>
        <option value="Footwear">Footwear</option>
          <option value="Clothes">Clothes</option>
            <option value="Accessories">Accessories</option>
              <option value="Watches">Watches</option>
    </select>
    </div>

 <div class="form-group col-lg-12" id="deo_color">
<span  class="deo_span" >Color</span>     <input type="text"  value="<?php echo $color; ?>" onchange="addtoPost('&color='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="color" name="" />
    </div>

     <div class="form-group col-lg-12" id="deo_size">
  <span  class="deo_span" >Size</span>    <input type="text"  value="<?php echo $size; ?>" onchange="addtoPost('&size='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Size" name="" />
    </div>
      <div class="form-group col-lg-12">
              <span  class="deo_span" >Brand</span>
    <input type="text"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Optional" name="" />
    </div>




  <?
}

function laptop()
{
  ?>
   
     <div class="form-group col-lg-4" >
<span  class="deo_span" >Ram(GB)</span>     <input type="text" id="ram"  value="<?php echo $ram; ?>" onchange="addtoPost('&ram='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Ram" name="" />
    </div>

    <div class="form-group col-lg-4">
<span  class="deo_span" >hdd</span>     <input type="text" id="ram"  value="<?php echo $hhd; ?>" onchange="addtoPost('&hhd='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="hdd" name="" />
    </div>



      <div class="form-group col-lg-4" id="comp">
<span  class="deo_span" >Sdd</span>     <input type="text" id="ram"  value="<?php echo $sdd; ?>" onchange="addtoPost('&sdd='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Sdd" name="" />
    </div>




  <?
}

?>


<style type="text/css">
  
  .ddd
  {
    background-color: rgba(0,0,0,0);
  }

  .deo_checkbox
  {
    position: absolute;

left: 0px;

top: 4px;

width: 20px;

height: 20px;

border: 2px solid #E4E7ED;

background: #FFF;

margin-right: 20px;
  }

  .deo_label
  {
    font-weight: 500;

min-height: 20px;

padding-left: 40px;

margin-bottom: 5px;

cursor: pointer;
  }
</style>

<?
include("deo_design.php");


        }
  ?>



                               </select>


</div>
</div>
<div id ="field"></div>
