<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];
$_SESSION["product_id"]=$_GET["product_id"];
 $full_details=$_GET["fulldetails"];
 $product_subcat=$_GET["product_subcat"];
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


?>


<div class="login-form" style="height: 100%;">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="deo_card_container deo_card_create  deo_card_shadow">
                    <div class="">
<span class="deo_span" style="border-bottom-style: line; font-size: 20px;">
    <?if($full_details == "yes")
    {
      echo "Full Details";
     
    }
    else
    {
       echo "Basic Details";
    }
    ?>

  </span>
<hr>


                    </div>
                    <div class="card-body">
    <div class="sc">
 
        <div class="cotainer-fluid">
           <div style="margin-left:0; margin-right: 0;" class="row">      
<?
          if($full_details == "yes")
          {
            full_details($_GET["product_id"],$product_subcat);
           
          }else
          {
               basic_details($_GET["product_id"]);
          }
         
?>
<div class="form-group col-lg-12" >
<div id="Load_edit_image"></div>
</div>
<div class="form-group col-lg-12" >
                          <div class="container">
                            <div class="row">

<div class="col-md-12 col-lg-12">
  <button  style="margin-top: 10px;" class="button full-width button-sliding-icon ripple-effect"  type="submit"data-toggle="modal" data-target=".bd-example-modal-lg">Add Photos</button>
                              </div>
<div class="col-md-12 col-lg-12">
 <button style="margin-top: 10px;" class="button full-width button-sliding-icon ripple-effect" onClick="postIt('duplicate_product_reg.php?product_id=<?echo $_GET["product_id"];?>'),hidePT()">Save</button>

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

 
        <?
           
    
function basic_details($product_id)
{

include("sql.php");
  $sql2="SELECT * FROM product WHERE product_id ='$product_id' LIMIT 0, 1"; 
    $result = $conn->query($sql2);
        //$result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                        {  
                            $product_id = $row["product_id"];  
                            $u_id  = $row["u_id"];  
                            $product_name = $row["product_name"]; 
                            $product_cat = $row["product_cat"];  
                            $product_code = $row["product_code"];
                            $product_keyword = $row["product_keyword"]; 
                            $product_qty = $row["product_qty"];  
                            $product_price = $row["product_price"];  
                           $product_desc = $row["product_desc"]; 
                            $product_subcat = $row["product_subcat"];
                            $size = $row["size"];
                            $color = $row["color"];
                            $model = $row["model"];
                            $series = $row["series"];
                            $storage = $row["storage"];
                            $hhd = $row["hhd"];
                            $type = $row["type"];
                            $brand = $row["brand"];
                            $special_feature = $row["special_feature"];
                            $getting_this = $row["getting_this"];
                             $screen_tech = $row["screen_tech"];
                             $screen_size = $row["screen_size"];
                                $materials = $row["materials"];
                                 $ram= $row["ram"];
                                 $add= $row["address"];

  ?>
  <div class="form-group col-lg-12">
       <label for="product_name"><span class="deo_span">Product Name </span></label>
      <input type="text" value="<?echo $product_name;?>" onchange="addtoPost('&product_name='+this.value)"class="deo_form" placeholder="Product Name"/>
 </div>

 <div class="form-group col-lg-12"><label for="product_price"><span class="deo_span">Product Price </span></label>
        <input type="number" id="product_price"  value="<?echo $product_price;?>" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Product Price" name="" /></div>

        
         <div class="form-group col-lg-12">
<label for="product_cat"><span class="deo_span">Address</span></label>
<select id="province"class="deo_form input-lg" value="<?echo $add;?>" onchange="addtoPost('&address='+this.value)">
  <option disabled selected="" value="<?echo $add;?>"><?echo $add;?></option>
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
           <textarea type="text" id="product_desc"  value="<?php echo $product_desc;?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Describe what you are selling any details a buyer be interested." name="" ><?php echo $product_desc;?></textarea>
  </div>


<?
}

                        }
                }

?>

<?

function Tv($screen_tech,$brand,$screen_size)
{
  ?>

  <div class="form-group col-lg-4">
            <label for="storage"><span class="deo_span">Brand</span></label>
    <input type="text" id="ram"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="brand" name="" />
    </div>

 <div class="form-group col-lg-4"   >
            <label for="storage"><span class="deo_span">Screen Tech</span></label>
    <select id="ram"class="deo_form input-lg" onchange="addtoPost('&screen_tech='+this.value)" >
        <option disabled selected="" value="<?php echo $screen_tech; ?>"><?php echo $screen_tech; ?></option>

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
        <option disabled selected="" value="<?php echo $screen_size; ?>"><?php echo $screen_size; ?></option>

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

function makeup($brand,$type)
{
  ?>

  <div class="form-group col-lg-4">
            <label for="storage"><span class="deo_span">Brand</span></label>
    <input type="text"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="brand" name="" />
    </div>

 <div class="form-group col-lg-4"   >
            <label for="storage"><span class="deo_span">Type</span></label>
    <select id="Brand"class="deo_form input-lg" onchange="addtoPost('&type='+this.value)" >
        <option disabled selected="" value="<?php echo $type; ?>"><?php echo $type; ?></option>
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

function cellphone($color,$storage)
{
  ?>
    <div class="form-group col-lg-4">
            <label for="color"><span class="deo_span">Color</span></label>
    <input type="text"  value="<?php echo $color; ?>" onchange="addtoPost('&color='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="color" name="" />
    </div>
    <div class="form-group col-lg-4" id="tv2" >
            <label for="storage">Storage<span>*</span></label>
    <select id="ram"class="deo_form input-lg" onchange="addtoPost('&storage='+this.value)" >
      <option disabled selected="" value="<?php echo $storage; ?>"><?php echo $storage; ?></option>
      <option value="8GB">8GB</option>
        <option value="16GB">16GB</option>
          <option value="32GB">32GB</option>
            <option value="64GB">64GB</option>
              <option value="128GB">128GB</option>
    </select>
    </div>


  <?
}

function Men($type,$color,$size,$brand,$sub_name)
{
  ?>
   
    <div class="form-group col-lg-12" id="tv2" >
            <label for="storage"><span class="deo_span">Type</span></label>
    <select id="type"class="deo_form input-lg" onchange="checkvalue(this.value);addtoPost('&type='+this.value)" >
      <option disabled selected="" value="<?php echo $type; ?>"><?php echo $type; ?></option>
      <option value="Bag and wallet">Bag & Wallets</option>
        <option value="Footwear">Footwear</option>
          <option value="Clothes">Clothes</option>
            <option value="Accessories">Accessories</option>
              <option value="Watches">Watches</option>
    </select>
    </div>

<?
if($type == "Bag and wallet" || $type =="Accessories" || $type == "Watches")
{
?>

 

<?
}
else
{
  ?>
<div class="form-group col-lg-12" id="deo_color">
            <label for="color"><span class="deo_span">Color</span></label>
    <input type="text"  value="<?php echo $color; ?>" onchange="addtoPost('&color='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="color" name="" />
    </div>

 <div class="form-group col-lg-12" id="deo_size">
            <label for="color"><span class="deo_span">Size</span></label>
    <input type="text"  value="<?php echo $size; ?>" onchange="addtoPost('&size='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Size" name="" />
    </div>
  <?
}


?>


    
      <div class="form-group col-lg-12">
            <label for="color"><span class="deo_span">Brand</span></label>
    <input type="text"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('color: '+ this.value);" onclick="showPass('color: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Optional" name="" />
    </div>




  <?
}



?>

<?
function full_details($product_id,$sub_name)
{
  include("sql.php");
  $sql2="SELECT * FROM product WHERE product_id ='$product_id' LIMIT 0, 1"; 
    $result = $conn->query($sql2);
        //$result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                        {  
                            $product_id = $row["product_id"];  
                            $u_id  = $row["u_id"];  
                            $product_name = $row["product_name"]; 
                            $product_cat = $row["product_cat"];  
                            $product_code = $row["product_code"];
                            $product_keyword = $row["product_keyword"]; 
                            $product_qty = $row["product_qty"];  
                            $product_price = $row["product_price"];  
                           $product_desc = $row["product_desc"]; 
                            $product_subcat = $row["product_subcat"];
                            $size = $row["size"];
                            $color = $row["color"];
                            $model = $row["model"];
                            $series = $row["series"];
                            $storage = $row["storage"];
                            $hhd = $row["hhd"];
                            $type = $row["type"];
                            $brand = $row["brand"];
                            $special_feature = $row["special_feature"];
                            $getting_this = $row["getting_this"];
                             $screen_tech = $row["screen_tech"];
                             $screen_size = $row["screen_size"];
                                $materials = $row["materials"];
                                 $ram= $row["ram"];
                                 $add= $row["address"];
                                 $location= $row["location"];
                               }}

  ?>

  <div class="form-group col-lg-12">
       <label for="product_name"><span class="deo_span">Product Name </span></label>
                             <input type="text" id="product_name"  value="<?php echo $product_name; ?>"onchange="addtoPost('&product_name='+this.value)"  oninput="showPass('product_name: '+ this.value);"  class="deo_form" placeholder="Product Name" name="" />
 </div>
   <div class="form-group col-lg-12">
       <label for="product_qty"><span class="deo_span">Product Quantity</span></label>
                             <input type="text" id="product_qty"  value="<?php echo $product_qty; ?>"onchange="addtoPost('&product_qty='+this.value)"  oninput="showPass('product_qty: '+ this.value);"  class="deo_form" placeholder="Product Quantity" name="" />
 </div>
<?


  if ($sub_name == "Tv") 
  {
   Tv($screen_tech,$brand,$screen_size);
  }
  else if($sub_name == "Makeup")
  {
      makeup($brand,$type);
  }
  else if($sub_name == "Cellphones")
  {
    cellphone($color,$storage);
  }
  else if($sub_name == "Men" || $sub_name=="Women")
  {
Men($type,$color,$size,$brand,$sub_name);
  }


?>
  <div class="form-group col-lg-12">
<label for="product_cat"><span class="deo_span">Getting This</span></label>
<select class="deo_form input-lg" onchange="deliver(this.value);addtoPost('&getting This='+this.value)">
     <option disabled selected="" value="<?echo $getting_this;?>"><?echo $getting_this;?></option>
    <option value="Meet">Meet-up</option>
     <option value="Delivery">Delivery</option>
     <option value="both">both</option>
   </select>
 </div>
<? if ($getting_this == "Meet")
{
?>
<div class="form-group col-lg-12"id="meet"   >
            <label for="storage"><span class="deo_span">Location</span></label>
    <input type="text" id="ram"  value="<?echo $location;?>" onchange="addtoPost('&location='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="" name="" />
    </div>
<?
}
else
{
  ?>
     <div class="form-group col-lg-12"id="add"  >
            <label for="storage"><span class="deo_span">Fee</span></label>
    <input type="text" id="ram"  value="" onchange="addtoPost('&fee='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Fee" name="" />
    </div>

  <?
}

?>
    



 <div class="form-group col-lg-12"><label for="product_price"><span class="deo_span">Product Price</span></label>
        <input type="number" id="product_price"  value="<?echo $product_price;?>" onchange="addtoPost('&product_price='+this.value)"  oninput="showPass('product_price: '+ this.value);" onclick="showPass('product_price: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="deo_form" placeholder="Product Price" name="" /></div>

        
         <div class="form-group col-lg-12">
<label for="product_cat"><span class="deo_span">Address</span></label>
<select id="province"class="deo_form input-lg" value="<?echo $add;?>" onchange="addtoPost('&address='+this.value)">
  <option disabled selected="" value="<?echo $add;?>"><?echo $add;?></option>
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
           <textarea type="text" id="product_desc"  value="<?php echo $product_desc;?>" onchange="addtoPost('&product_desc='+this.value)"  oninput="showPass('product_desc: '+ this.value);" onclick="showPass('product_desc: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Describe what you are selling any details a buyer be interested." name="" ><?php echo $product_desc;?></textarea>
  </div>



<?
}
?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Upload Product image</h4>
        <button  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <?
include("update_image.php");
   ?>
      </div>

    </div>
  </div>
</div>