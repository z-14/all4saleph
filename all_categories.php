<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

 $categories_id= $_GET["categories_id"];
 $_SESSION["categories_id"]=$categories_id;
 $u_u = $_SESSION["u_u"];
 $type= $_GET["cat_type"];



?>
        <!--================Categories Product Area =================-->
        <div class="container">
                    <div class="row">
           

                             <?
                             include("sql.php");

                         $sql="SELECT * FROM product_categories where cat_type = '$type' order by cat_id desc"; 
  
                           $result = $conn->query($sql);

                            if ($result->num_rows > 0) 
                            {
                              
                            while($row = $result->fetch_assoc()) 
                            {
                                  $product_id = $row["product_id"];
                                  $productName = $row["cat_name"];
                                    $productDescription = $row["cat_type"];

                                    $product_price = $row["product_price"];
                                    $u_id = $row["u_id"];
                                    $u_u = $row["u_u"];
                                     $postID = $row['product_id'];
                                      $date = $row['date'];

if($productName == "Mobile and Gadgets")
{
  $img="https://cdn.shopify.com/s/files/1/1465/0252/collections/Mobile_Gadgets_1350x.jpg?v=1533903888";
}
else if($productName == "Fashion")
{
 $img="https://www.frontdoorfashion.com/wp-content/uploads/2016/09/Front-Door-Fashion-Banner-Image-1.jpg";
}
else if($productName == "Beauty Products")
{
 $img="https://www.readersdigest.ca/wp-content/uploads/sites/14/2017/05/shutterstock_328775612.jpg";
}
else if($productName == "Sports Products")
{
 $img="https://imgusr.tradekey.com/p-5140327-20110323131551/sports-products.jpg";
}
else if($productName == "Toys")
{
$img="https://zdnet2.cbsistatic.com/hub/i/r/2017/07/18/071068d1-e257-4abf-811d-48a626f621f7/resize/770xauto/72e298cc964f48604e0edb0a3ee72339/bear.jpg";
}

else if($productName == "Vehicle")
{
$img="https://d17099vy52visk.cloudfront.net/wp-content/uploads/2015/01/i20-Active-3-Door-w.png";
}

else if($productName == "School and Office Supplies")
{
$img="https://www.franchiseindia.com/uploads/content/edu/art/5bd70dbda6d64.jpeg";
}

else if($productName == "Local Delicacies and Native Products")
{
$img="http://images.summitmedia-digital.com/entrepph/images/article/2015/5_2015/amors_checklist_1.png";
}
else if($productName == "Food")
{
$img="https://i.kinja-img.com/gawker-media/image/upload/s--vHt6tbFa--/c_scale,f_auto,fl_progressive,q_80,w_800/xjmx1csashjww8j8jwyh.jpg";
}
else if($productName == "Frozen Products")
{
$img="https://www.rd.com/wp-content/uploads/2017/10/00_Myths-About-Frozen-Food-You-Need-to-Stop-Believing_223395673_Niloo_FT.jpg";
}

else if($productName == "Home Appliances")
{
$img="https://mondrian.mashable.com/uploads%252Fstory%252Fthumbnail%252F84549%252F405227d2-eb54-4770-8511-d40b5c54c117.png%252F950x534.png?signature=VC9finjeLq6I9vHW67dQyCsJ3Nc=&source=https%3A%2F%2Fblueprint-api-production.s3.amazonaws.com";
}

else if($productName == "Electronic Devices")
{
$img="https://img3.exportersindia.com/product_images/bc-full/dir_110/3289247/electronic-gadgets-1729159.jpg";
}

else if($productName == "Bookstore")
{
$img="https://www.anunlikelystory.com/sites/anunlikelystory.com/files/bookstore.jpg";
}

else if($productName == "Flower")
{
$img="https://cdn11.bigcommerce.com/s-a4z7rskb8w/images/stencil/original/products/402/812/pink-glamour-flower-arrangement-burnaby-flower-AR2057__86853.1552668707.jpg?c=2";
}

else if($productName == "Home Appliances")
{
$img="https://i0.wp.com/www.ghofficedepot.com.ph/wp-content/uploads/2016/11/01-08x.jpg?resize=800%2C600&ssl=1";
}

else if($productName == "Poultry")
{
$img="https://smokyvalleyag.com/wp-content/uploads/2015/03/Vet-Supplies2-1.jpg";
}
else if($productName == "Hardware Supplies")
{
$img="https://i0.wp.com/www.ghofficedepot.com.ph/wp-content/uploads/2016/11/01-08x.jpg?resize=800%2C600&ssl=1";
}

else if($productName == "Livestock")
{
$img="https://www.slu.se/globalassets/ew/org/andra-enh/vh/lovsta/bilder/livestock-at-lovsta.jpg?width=400";
}

else if($productName == "Farm Products")
{
$img="https://image-english.vov.vn/w490/uploaded/tmt2b47lhgly8uzveukg/2017_06_23/farm_products_1__KFWU.jpg";
}

else if($productName == "Catering")
{
$img="https://images.getbento.com/accounts/e1f9df69fd62383848d1fd95ead6d349/mediausers/custom_fields_galleries/images/w3CXiKnuQwqqKLHrdEfy_serving%20line.jpg?fit=max&w=1800&auto=format,compress";
}

else if($productName == "Home Daily Needs")
{
$img="https://i.pinimg.com/originals/79/f8/b8/79f8b8bf1a1b7b4a6b3aa989276b5229.jpg";
}



else
{
  $img="https://wallpaperplay.com/walls/full/2/a/c/58118.jpg";
}

                                ?>
<div  onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php?categories_id=<?echo $row["cat_name"];?>&cat_type=<?echo $productDescription;?>&cat_id=<?echo $row["cat_id"];?>', true),HideMenu()" style="margin-left: 0px; margin-bottom: 5px; margin-right: 0px; padding-right: 5px; padding-left: 5px;"  class="col-lg-3 col-sm-6 m-20 ">
                  <div class="from_blog_item H-e">
         <img class="img-fluid" src="<?echo $img;?>" alt="">
                                <div class="f_blog_text" style="bottom: 0px; padding: 0px 0px;">
                                    <h5><?echo $productName;?></h5>
                                    <p></p>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                                <?
                               
                            }
                             

                             }
                             else
                             {
                                echo "No product ".$categories_id;
                             }

                 ?>
  
                          
                        </div>
                          </div>  

    
        <!--================End Categories Product Area =================-->
        <?
function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'year',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hour',
    'i' => 'minute',
    's' => 'second',
  );
  foreach ($string as $k => &$v) {
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>


<?
function profile($u_id,$u_u,$date)
{
     include("sql.php");

  $sql ="SELECT * ,( SELECT url FROM user_image where u_id = '$u_id') AS image FROM user_profile WHERE u_id = '$u_id' ";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              
                              if (empty($row['image']) ) 
                                {
                                    $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                                }else{
                                    $img =  "photos/".$row['image'];
                                }

                                $merchant_name= $row["u_u"];
                            }
                        }
?>
                  

  <a class="Z-l" onClick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $u_id;?>', true),HideMenu()"  >
<div class="z-a ">


   <?

    if (empty($img)) 
    {
        ?>
       <img  src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="q-w-e q-aa" alt="">
       </div>
<div class="q-w">
<div class="q-a"><?echo $merchant_name;?></div></div>
<time class="t-m"><span><?echo time_elapsed_string("@".$date);?></span></time>

</span>
</a>
       <?
    }
    else
    {
         ?>

 <img  itemprop="image" src="<?echo $img;?>" class="q-w-e q-aa" alt="">
       </div>
<div class="q-w">
<div class="q-a"><?echo $merchant_name;?></div>
  <time class="t-m"><span><?echo time_elapsed_string("@".$date);?></span></time>

</div>
</a>
</span>
       <?

    }
  



}

?>


        <?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date,$img)
            {





  ?>      
<div  onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php?categories_id=<?echo $productName;?>&cat_type=<?echo $productDescription;?>&cat_id=<?echo $product_price;?>', true),HideMenu()"  style="margin-left: 0px; margin-bottom: 5px; margin-right: 0px; padding-right: 5px; padding-left: 5px;"  class="col-lg-4 col-sm-6 m-20 ">
                  <div class="from_blog_item H-e">
         <img class="img-fluid" src="<?echo $img;?>" alt="">
                                <div class="f_blog_text" style="bottom: 0px; padding: 0px 0px;">
                                    <h5><?echo $productName;?></h5>
                                    <p></p>
                                    <h6></h6>
                                </div>
                            </div>
                        </div>



                                <?
                            }
                            


        ?>
<?
function subcat($cat_id)
{
include("sql.php");
$sql="SELECT * FROM product_subCat where cat_id ='$cat_id'";
    $result = $conn->query($sql);
           if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) 
                    {
                      ?>
    <option value="<?echo $row["sub_name"];?>"><?echo $row["sub_name"];?></option>"
    <?

                    }
                  }
}






?>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       <style>
          
              .checked {
                color: orange;
              }
               @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/
.selectpicker
{
    border: white;
    text-decoration-style: none;
}

.cont {
    width: 100%;

}
.for1
{
    position: relative;
    width: 100%;
    min-height: 1px;

}

/*****/
.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}


/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
              </style>
          </style>


<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
    .button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.Z-l {
    display: -ms-flexbox;
    display: flex;
}


.button4:hover {background-color: #e7e7e7;}

.H-d .H-e img {
    border-radius: 0;
  
}
.H-e img {
    object-fit: cover;
    height: 160px;
    width: 90%;
    border-radius: 6px 6px 0 0;
      margin: 2px 0;
}
img {
    vertical-align: middle;
}
img {
    border: 0;
}
.q-aa {
    width: 32px;
    height: 32px;
}
.q-w-e {
    border-radius: 50%;
}
.z-a, .q-w-e {
    text-align: center;
}


.card_one_::after {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;

  content: '';
  opacity: 0;
  z-index: -1;
}

.card_one_:hover::after, .card_one_:focus::after {
  opacity: 1;
}
.card_one1 >.card_one_ >img
{
    height: 100%;
    width :100%;
}


</style>


<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
    .button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.H-z {
    display: -ms-flexbox;
    display: flex;
}


.button4:hover {background-color: #e7e7e7;}
.card_dev_2 {
  position: relative;
  flex: 1 1 100%;
  padding: 5px;
  background: white;
    width: 90%;
    height: 350px;

}

.H-d .H-e img {
    border-radius: 0;
  
}
.H-e img {
    object-fit: cover;
    height: 160px;
    width: 100%;
    border-radius: 6px 6px 0 0;
      margin: 2px 0;
}

.ab-k {
    width: 32px;
    height: 32px;
}
.ab-b {
    border-radius: 50%;
}
.ab-_a, .ab-b {
    text-align: center;
}
.H-A {
    color: #262629;
    font-weight: 500;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow-x: hidden;
    margin-left: 5px;
}


.card_one_::after {
  position: absolute;
  top: 0;
  left: 0;
  width: 99%;
  height: 100%;

  content: '';
  opacity: 0;
  z-index: -1;
}
.card_one_:hover, .card_one_:focus {
  transform: scale3d(1.006, 1.006, 1);
}
.card_one_:hover::after, .card_one_:focus::after {
  opacity: 1;
}
.card_one1 >.card_one_ >img
{
    height: 100%;
    width :100%;
}
p 
{
    margin-bottom: 0px;
}

select#sorter {
    background: transparent;
    border: 1px solid #AAA;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}
.card_one_ {
    transition: transform .5s;
    width: 99%;
}




.card_one_2 {
  transition: transform .5s;
    width: 99%;

}
.card_one_2::after {
  position: absolute;
  top: 0;
  left: 5;
  width: 99%;
  height: 100%;
  transition: opacity 2s cubic-bezier(1, 1, 1, 1);
  content: '';
  opacity: 0;
  z-index: -1;
}
.card_one_2:hover, .card_dev_2:focus {
  box-shadow: 1px 1px 1px 1px rgba(0.1, 0.1, 0.1, 0.1), 1px 1px 1px 1px rgba(0.1, 0.1, 0.1, 0.1);
}
.card_one_2:hover::after, .card_dev_2:focus::after {
  opacity: 1;
}

</style>


<style>



.ims {
  position: relative;
  border-radius: 2px;
  font-size: 16px;
  position: center;
  margin-left: 10px;
  margin-bottom: 10px;
}

.ims img {vertical-align: middle;}

.ims p {
  position: absolute;
  bottom: 0;
  color: #f1f1f1;
}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #f7a992;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(253, 69, 8, 0.25);
}
@media screen and (max-width: 380px) {
  .hd
  {
    display: none;
  }
}
.bd:hover
{
box-shadow: 0px 0px 0px 1px rgba(227,227,227,1);
position: relative;
  z-index: 2;
}
.deo_box
{
      background-color: #ffffff;
    border: 1px solid rgba(0, 34, 51, 0.1);
    box-shadow: 2px 4px 10px 0 rgba(0, 34, 51, 0.05), 2px 4px 10px 0 rgba(0, 34, 51, 0.05);
    border-radius: 0.15rem;
  
}

</style>
