<?
session_start();
include("sessions.php");
include("globalconfig.php");
include("sql.php");
$u_u = $_SESSION["u_u"];
$product_id = $_GET["product_id"];
$merchant_id=$_GET["merchant_id"];

function get_views($product_id)
{
  
}


if(isset($_GET["product_id"]))
{

$sql="SELECT * FROM product where product_id = '$product_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               $row = $result->fetch_assoc();
               $views=$row["views"]+1;
                }
                

  $sql1 = "UPDATE `product` SET views = '$views' WHERE `product_id` = '$product_id'";
if ($conn->query($sql1) == TRUE)
 {
} else {
    echo $sql."Error updating record: " . $conn->error;
     
}
}

              $sql="SELECT * FROM product where product_id = '$product_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) 
                  {

              $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];
                                    $product_cat = $row["product_cat"];
                                     $product_subcat = $row["product_subcat"];
                                     $u_id= $row["u_id"];
                                     $date = $row['date'];
                                    $pro_id = $row["u_id"];
                                      $size = $row["size"];
                            $color = $row["color"];
                            $model = $row["model"];
                            $series = $row["series"];
                            $ram = $row["ram"];
                            $storage = $row["storage"];
                            $type = $row["type"];
                            $brand = $row["brand"];
                            $hdd = $row["hhd"];
                            $special_feature = $row["special_feature"];
                            $getting_this = $row["getting_this"];
                            $screen_tech = $row["screen_tech"];
                            $screen_size = $row["screen_size"];
                            $materials = $row["materials"];
                            $location= $row["location"];
                            $fee= $row["fee"];
                         $full_details = $row["full_details"];
                         $addr = $row["address"];
                         $seller_id=$row["u_id"];
                         $seller_type=$row["seller_type"];

 $stock= $row["sold_out"];
          product($productName,$product_price,$productDescription,$product_id,$product_cat,$pro_id,$size,$color,$model,$series,$ram,$storage,$type,$brand,$special_feature,$getting_this,$screen_tech,$screen_size,$materials,$product_subcat,$hdd,$location,$fee,$u_id,$stock,$full_details,$merchant_id,$addr, $seller_id,$seller_type);


                  }
              }

?>


<?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date)
            {


                            include("sql.php");


                            $sql="SELECT * FROM product_images where product_id = '$product_id' group by product_id"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              
                         
                              if (empty($row['file_name']) ) 
                                {
                                    $img = "blank.jpg";
                                }else{
                                    $img =  "photos/".$row['file_name'];
                                }

                                    $r = substr($productDescription, 0, 20);
                if (strlen($r) > 10)
                 {
                   $desco = $r."...";
                }
                else
                {
                    $desco = $r;
                }


                    ?>


                        
<div style="margin-left: 0px; margin-right: 0px; padding-right: 0px; padding-left: 0px;" class="col-6 col-lg-2 col-sm-6 m-20">   
 <figure class="q-wa H-d">
<div class="card-group">
<div class="card bd" style="border:none; margin-right: 2px; margin-left: 2px;">
  <div class="card-header bg-transparent ">  <?
profile($u_id,$u_u,$date);
?></div>
  <div class="card-body p-0">
      <div class="H-e">
        <div class="H-p product_image">
            <img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $u_id;?>', true)"alt="" src="<?php echo $img; ?>"> 
        </div>
        </div>
  </div>
  <div class="card-footer bg-transparent">  

      <p class="deo_product_name zero_margin"><?echo $productName;?></p>
<p class="deo_price zero_margin"><?echo "PHP ".$product_price;?></p>
  
           
        <?
if (empty($desco))
 {
$desco="No Product Description available";
}

        ?>
        
            <p class="des"><?echo $desco;?></p>
      
         <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }
?>
<div class="product_buttons">
          <button  onClick="postIt('wishlist.php?product_id=<?echo $product_id;?>'),hidePT()" class="product_heart"><i class="fa fa-heart"></i></button>
          <button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="add_to_cart"><i class="fa fa-shopping-cart"></i></button>

<?
                            
                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                      $number_ave = number_format($row['AVG(rating)'], 1);
                                      $number_format = number_format($row['AVG(rating)'], 0);
                                    }
                                  }
                                  while ($number_format != 0) {
                                    ?>
                                      <span class="fa fa-star checked hd"></span>

                                    <?$number_format--;
                                  }
                                ?>


<div style="align-items: center; float: bottom;">
                </div>
                 
        </div>
</div>
</div>

</div>
         

            </figure>
            </div>
    
      


                                <?
                            }}

                            
                              }

        ?>

<?
function getImage_i($id,$u_u,$firstname,$address,$merchant_id)
{
     include("sql.php");

                            $sql="SELECT * FROM user_image where u_id = '$id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              $img=$row['url'];
                              
                            }
                        }


                        if (empty($img) ) 
                                {
                                    $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                                }else{
                                    $img =  "photos/".$img;
                                }
                        ?>
                        
  <a onclick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $id;?>')" >
<img  src="<?echo $img;?>" class="Z-l Z-z" >
<h5><?echo $firstname;?></h5>
<h5><?echo $u_u?></h5>
<div ><span>Joined</span>&nbsp;<span>Oct 2017</span></div>
<? review($merchant_id);?>
</a>
<div>
            </div>
                        <?
                     
                    }

?>

<?
  function relatedProduct($categories_id,$merchant_type)
  {

   

    ?>
     <div id="container-fluid">
                            <div id="grid" class="c_product_grid_details">
                               <!-- item -->

                               <!-- item -->
                               
                             <?

                             include("sql.php");
 $categories_id;

          $sql="SELECT * FROM product where product_cat='$categories_id' and seller_type='$merchant_type'   ORDER BY date DESC LIMIT 20";  


                           $result = $conn->query($sql);

                            
                            if ($result->num_rows > 0) {

                                ?>
                                      
                                    <div class="clearfix visible-sm ">
  
                                         <div class="row">
          
                            <?

                            while($row = $result->fetch_assoc()) 
                            {
                                $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];
                                    $u_id = $row["u_id"];
                                    $date = $row['date'];
                                    $u_u = $row["u_u"];

                           $count=1;

                                    
                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u,$date);

                               
                            }
                             ?>

                          
                     
                     </div>
                   </div>
                                <?
                             }
                             else
                             {
                                echo "No product ".$categories_id;
                             }

                             ?>
                            </div>
                        </div>
      
      <?                  
  }

?>


<?
function profile($u_id,$u_u, $date)
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
                  


   <?

    if (empty($img)) 
    {
        ?>
       <img itemprop="image" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="ab-b ab-k" alt="">
       </div>
<div onclick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $u_id;?>')" class="q-w">
<div class="q-w"><?echo $merchant_name;?></div>
  <time class="t-m"><span><?echo time_elapsed_string("@".$date);?></span></time>

</div>
</a>
       <?
    }
    else
    {
         ?>

       <div onclick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $u_id;?>')" class="row" style="margin-top: 10px;">              <div>
  <img itemprop="image" src="<?echo $img;?>" class="q-w-e q-aa" alt="" itemprop="image" style="border-radius: 50%; width: 30px; height: 30px;">

</div>
<div style="margin-left: 10px;">
  <?


  ?>
  <div class="q-a"><?echo $merchant_name;?></div>
  <time class="t-m"><span><?echo time_elapsed_string("@".$date);?></span></time>
</div>
</div>
       <?

    }
  



}

?>
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
function review($u_id)
{
?>

                  <?php
                   include("sql.php");

                   $sql = "SELECT AVG(rating) FROM merchant_rating WHERE m_id ='$u_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from merchant_rating WHERE m_id='$u_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }

                                ?>
                                <span class="heading" style="margin-top: 0;margin-right: 0px; color: black;font-weight: bold;">Seller Rating</span>
                                <?
                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                      $number_ave = number_format($row['AVG(rating)'], 1);
                                      $number_format = number_format($row['AVG(rating)'], 0);
                                    }
                                  }
                                  while ($number_format != 0) {
                                    ?>
                                      <span style="align-items: center;" class="fa fa-star checked"></span>

                                    <?$number_format--;
                                  }
                                ?>
                                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <style>
              .checked {
                color: orange;
              }
              </style>


                   
        </tbody> 
      </table>



</div>
</div>


  </div>


<?
}
?>

                     
              


        <?
          function product($productName,$product_price,$productDescription,$product_id,$product_cat,$pro_id,$size,$color,$model,$series,$ram,$storage,$type,$brand,$special_feature,$getting_this,$screen_tech,$screen_size,$materials,$product_subcat,$hdd,$location,$fee,$u_id,$stock,$full_details,$merchant_id,$addr,$seller_id,$seller_type)
          {
                include("sql.php");
                            $sql="SELECT * FROM product_images where product_id = '$product_id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              ?>
  <div class="col-sm-12 col-lg-1 thum">
                             <!---<div>
<div class="tp-thumbs-inner-wrapper" style="position: relative; height: 461px; width: 78px; top: 0px;">

  <div data-liindex="0" data-liref="rs-28" class="tp-thumb selected" style="width: 78px; height: 104px; top: 0px; left: 0px;"><span class="tp-thumb-img-wrap">  <span class="tp-thumb-image" style="background-image: url(&quot;photos/<?echo $image?>&quot;);"></span></span></div>

  <div data-liindex="1" data-liref="rs-303" class="tp-thumb" style="width: 78px; height: 104px; top: 119px; left: 0px;"><span class="tp-thumb-img-wrap">  <span class="tp-thumb-image" style="background-image: url(&quot;photos/<?echo $image?>&quot;);"></span></span></div>

  <div data-liindex="2" data-liref="rs-301" class="tp-thumb" style="width: 78px; height: 104px; top: 238px; left: 0px;"><span class="tp-thumb-img-wrap">  <span class="tp-thumb-image" style="background-image: url(&quot;photos/<?echo $image?>&quot;);"></span></span></div>

</div>

</div>-->

                  </div>

                       <section style="margin-top: 10px; padding-left: 0; padding-right: 0;" class="col-sm-4 col-lg-12">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-sm-4 col-lg-7 m-0">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

 
                              <?
                              $x=0;
                            while($row = $result->fetch_assoc()) 
                            {
                              $active="active";
                            $image = "photos/".$row["file_name"];
                    ?>
 <!--================Product Details Area =================-->

<!--start1 of div-->
   <?
    if ($x==0) {
?>      
<div class="carousel-item active">
  <img class="d-block w-100" src="<?echo $image;?>" alt="">
    </div>
<?
    }
    else
    {
      ?>
       <div class="carousel-item">
      <img class="d-block w-100" src="<?echo $image;?>" alt="">
    </div>
    <?
    }
    $x++;
   ?>
      
   
    


                          <?
          }
        }

?>
   </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                 </div>
                        <!-- another line--->
                    <div style="padding: 0;" class="col-sm-4 col-lg-4">
                            <div class="p-id1" >
<!--for name-->
                 <div class="container-fluid">
            <div class="row no-gutter">
    <div class="col-lg-12 margin-left 0 ">
       <p class="d-b d-e">
      <div class="deo_product_name_details"><h1><?echo $productName;?></h1></div>

      <!---
     white review here


        --->
         <div class="container-fluid">
        <div class="row">
         
  <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }


                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                      $number_ave = number_format($row['AVG(rating)'], 1);
                                      $number_format = number_format($row['AVG(rating)'], 0);
                                    }
                                  }
                                  while ($number_format != 0) {
                                    ?>
                                       <ul class="p_rating">
                                      <span class="fa fa-star checked"></span>
                                      </ul>
                                    <?$number_format--;
                                  }
                                ?>
                                <div class="add_review">
                          <a style="margin-right: 2px;" ><?echo $count;?> Reviews</a>

                            </div>

               </div>
       </div>
       </p>
     </div>
   </div>
    <p class="deo_details">PHP <?echo " ".$product_price;?></p>

    <?
    if($stock != "yes")
    {
?>
<h6>Available In <span style="color: #0dda2a;">Stock</span></h6>
<?
    }
    else
    {
      ?>
    <h6 style="color: #8B0000;">SOLD OUT</h6>

<?
    }


if($full_details == "no")
  {

     if($getting_this == "Meet")
     {
   echo "<p class=\"ff-t\">Meet-up</span>"; 
   echo "<p  class=\"ff-t\">$location</p>";   

     }
     else if ($getting_this == "Delivery")
     {
     echo "<p class=\"ff-t\" >Delivery</p>"; 
    echo "<p  class=\"ff-t\">$fee</p>";   
    }
     echo "<label class=\"deo_details\">Address</label>";
      echo "<p  class=\"ff-t\">$addr</p>";
   echo "<label class=\"deo_details\">Description</label>";
    if (empty($productDescription))
     {
   echo "<p class=\"ff-t\">No Description Available</p>"; 
    }
    else
    {
       
           echo "<p class=\"ff-t\">$productDescription</span>"; 
    }
  }


else if($full_details == "yes")
{
  
if($product_subcat == "Tv")
  {
      
       echo "<label class=\"deo_details\">Brand</label>";
     echo "<p class=\"ff-t\">$brand</p>"; 
     echo "<label class=\"deo_details\">Screen tech.</label>";
      echo "<p class=\"ff-t\">$screen_tech</p>"; 
       echo "<label class=\"deo_details\">Screen Size</label>"; 
        echo "<p class=\"ff-t\">$screen_size</p>";      
           
  }
 if($product_subcat == "Makeup")
  {
      makeup();
  }
  else if($product_subcat == "Cellphones")
  {
    cellphone($color,$storage);
  }
  else if($product_subcat == "Men" || $product_subcat=="Women")
  {
Men($type,$color,$size,$brand,$product_subcat);
  }

 
     if($getting_this == "Meet")
     {
       echo "<label class=\"deo_details\">Meet-up</label>";
       echo "<p  class=\"ff-t\">$location</p>";   

     }
     else if ($getting_this == "Delivery")
     {
             echo "<label class=\"deo_details\">Delivery</label>";

    echo "<p  class=\"ff-t\">$fee</p>";   
    }
     echo "<label class=\"deo_details\">Description</label>";

    if (empty($productDescription))
     {
   echo "<p class=\"ff-t\">No Description Available</p>"; 
    }
    else
    {
           echo "<p class=\"ff-t\">$productDescription</p>"; 
    }
  }
  

  if($_SESSION["u_id"] == $pro_id)
  {
       
?>
 

 <div style="margin-left: -10px; margin-right: -10px;"  class="row-fluid">
    <p class="d-b d-e ">
      <div class="mbt-_a">
<div class="btn1">

  <button type="button" class="aa kk-gc undefined g-i"><span><i class="fa fa-times"></i></span>Delete</button>

          <button onclick="javascript:ajaxpagefetcher.load('window','product_edit.php?product_id=<?echo $product_id;?>',true)" type="button" class="aa kk-gc undefined g-i"><span><i class="fa fa-edit"></i></span>Edit</button>
       
      <button type="button"  onClick="postItGoTo('product_details_update_reg.php?product_id=<?echo $product_id;?>','product_details.php?product_id=<?echo $product_id;?>', true)" class="aa kk-gc undefined g-i"><span><i class="fa fa-check" aria-hidden="true"></i></span>Mark Sold</button>


        </div>
      </div>
   
  </p>
   </div>

<?
}
else
{
  ?>


  
      <div style="margin-left: -15px; margin-right: -15px;"   class="row-fluid">
    <p class="d-b d-e ">
      <div class="mbt-_a">
<div class="btn1"><button type="button" onClick="postIt('wishlist.php?product_id=<?echo $product_id;?>'),hidePT()" class="aa aac-c kk-gc"><span><i class="fa fa-heart icon-right-margin"></i></span></button>
 
    <button type="button" class="aa kk-gc undefined g-i"  onClick="javascript:ajaxpagefetcher.load('window', 'conversation.php?product_id=<?echo$product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $seller_id;?>&dd=<?echo "no";?>', true)"><span><i class="fa fa fa-envelope icon-right-margin"></i></span>Chat</button>
    
             <button type="button" onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()" class="aa kk-gc undefined g-i"><span><i class="fa fa-shopping-cart icon-right-margin"></i></span>Add to cart</button>


        </div>
      </div>
   
  </p>
   </div>

<?}?>
 </div>
       

   <style type="text/css">
     .btn1, .gc-b {
    display: -ms-flexbox;
    display: flex;
}
.icon-right-margin {
    margin-right: .6em;
}
.g-i {
    color: #4b4d52;
}
.kk-gc:not(:last-child) {
    
}
.aac-c {
    color: #8f939c;
    max-width: 100%;
}
.aa {
    font-size: 18px;
    font-weight: 300;
    background-color: transparent;
    border: none;
    height: 5rem;
    line-height: 5rem;
    -ms-flex: 1 0 auto;
    flex: 1 0 auto;
    border-radius: 0;
    border-top: 1px solid #c9ced6;
    border-bottom: 1px solid #c9ced6;

}
.btn1 {
    background-color: #fff;
}

   </style>
 <!--for name-->
                                   
                            </div>
                        </div>

                         <!--for description-->
 <div class="partition"></div>
  <!--for description-->
<div class="col-sm-4 col-lg-12">
           <div  class="container">
            <div class="row">
              <div class="col-lg-12">
                 <div  class="container">
            <div class="row">
              <div class="col-lg-2"><p class="d-b d-e"><h5>Seller</h5></p>
              </div>
              <div style="margin-left: 0px;"class="col-lg-4">
                <div class="deo_float_center">
              <?
include("sql.php");
 $merchant_id = $_GET["merchant_id"];
 $_SESSION["merchant_id"]=$merchant_id;
  $sql="SELECT * FROM user_profile WHERE u_id ='$merchant_id' LIMIT 0, 1"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$user_profile_id = $row["user_profile_id"]; 
$u_id  = $row["u_id"];  
$u_u = $row["u_u"]; 
$firstname = $row["firstname"]; 
$middlename = $row["middlename"];   
$surname = $row["surname"]; 
$name_extension = $row["name_extension"];   
$birthday = $row["birthday"];   
$address = $row["address"]; 
$mobile_number = $row["mobile_number"]; 
$email = $row["email"]; 
$website = $row["website"]; 
$telephone_number = $row["telephone_number"];   
$merchant  = $row["merchant"];
$salutation  = $row["salutation"];
$term_condition = $row["term_condition"];
$merchant_type=$row["merchant_type"];
}
}
   
?>

  <?
 getImage_i($u_id,$u_u,$firstname,$address,$merchant_id);
 ?>
 </div>
</div>
</div>
</div>
</div>
  
             <div class="partition1" ></div>

            </div>
        </div>
</div>
       
 <!--for description-->


        
<!--end1 of div-->
</div>
</div>

</section>
<!--end1 of div-->


 <section class="product_description_area">
            <div class="container">

   <span class="heading" style="color: black;font-weight: bold; margin-right: 0px;">   Product Reviews</span>


                <div class="tab-content" id="nav-tabContent">
                    
                  
                  
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   <ul>


                  <div id="review_container"  class="col-12 col-lg-12 mt-30">
<span class="heading" style="color: black;font-weight: bold;">Leave a Review</span>
<br>
<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" onclick="addtoPost('&ratings='+this.value)"/><label class = "full" for="star5" title="5 stars"></label>
    <input type="radio" id="star4" name="rating"  value="4" onclick="addtoPost('&ratings='+this.value)"/><label class = "full" for="star4" title="4 stars"></label>
    <input type="radio" id="star3" name="rating" checked="true" value="3" onclick="addtoPost('&ratings='+this.value)"/><label class = "full" for="star3" title="3 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" onclick="addtoPost('&ratings='+this.value)"/><label class = "full" for="star2" title="2 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" onclick="addtoPost('&ratings='+this.value)"/><label class = "full" for="star1" title="1 star"></label>
</fieldset>

          <div class="form-group">
                                  <textarea class="form-control" rows="5" cols="50" id="reviews" onchange="addtoPost('&reviewsID='+this.value)" placeholder="Write your review here!"></textarea>
                                  
                              </div>
                              <div class="col-12 col-lg-12">
                  <button type="submit" style="width: 200px;" class="add_cart_btn py-2 px-5" onClick="postItGoTo('rating_reg.php?product_id=<?php echo $product_id; ?>', 'product_details.php?product_id=<?php echo $product_id; ?>&merchant_id=<?echo $merchant_id;?>'),hidePT()">Submit</button>
                                 </div>
                             </div>
 
      </ul>
                            <br>  

                        <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }

                                ?>
                                <span class="heading" style="margin-right: 0px; color: black;font-weight: bold;">Overall rating</span>
                                <?
                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                      $number_ave = number_format($row['AVG(rating)'], 1);
                                      $number_format = number_format($row['AVG(rating)'], 0);
                                    }
                                  }
                                  while ($number_format != 0) {
                                    ?>
                                      <span class="fa fa-star checked"></span>

                                    <?$number_format--;
                                  }
                                ?>


                       <?php  $sql = "SELECT * FROM product_rating WHERE product_id = '$product_id' ORDER BY date DESC";
                                $result = $conn->query($sql);?>

                                   <div class="container">
  <div class="col-md-12">
      <table style="padding: 0px; width: 100%"> 

        <tbody> 
        <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $ratingsCount = $row['rating'];
        ?>
          <tr>
            <td style="font-size: 14px; font-weight: bold; padding-top: 20px; vertical-align: bottom; color: black;"><?php echo $row['u_u']; ?></td> 

            <td style="font-size: 10px; vertical-align: bottom; text-align: right;"><?
            date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $row['date']);?></td>
            
          </tr> 

          <tr>
            <td>
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <style>
              .checked {
                color: orange;
              }
              </style>
              <?
                
                while ($ratingsCount != 0) {
                  ?>
                    <span class="fa fa-star checked"></span>

                  <?$ratingsCount--;
                }
              ?>
            </td>
          </tr>
          <tr>
            <td style="font-size: 12px;">
              <?php echo $row['review']; ?>
            </td>
          </tr>
        <?php }} ?>
        </tbody> 
      </table>

  </div>
</div>



                     
                    </div>

                    <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="form-group">
                                  <textarea class="form-control" rows="5" cols="50" id="reviews" onchange="addtoPost('&reviewsID='+this.value)" placeholder=""></textarea>
                                  
                              </div>
                              <div class="col-12 col-lg-12">
      <button type="submit" class="btn btn-primary py-3 px-5" onClick="postItGoTo('merchant_messages.php?merchant_id=<?echo $u_id;?>','merchan_profile.php?u_id=<?php echo $u_id; ?>'),hidePT()">Submit</button>
                                 </div>
                    </div>
          <!-- Search section -->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p></p>

                    </div>
                  
                </div>
            </div>
</section>
  <!--================Related Product =================-->
        <div class="partition1" ></div>
        <h2 class="single_c_title">Related Products</h2>
          <div>
            <?
            relatedProduct($product_cat,$seller_type);
            ?>

          </div>
          
<?
    }


 
        ?>
        
  
        <!--================End Product Details Area =================-->



          <style>
         

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/


.heading {
  font-size: 18px;
  margin-right: 25px;
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

    <!-- for profile--->

.box-middle {
    vertical-align: middle;
    padding-left: 10px;
}
.box-body, .box-left, .box-right {
    display: table-cell;
    vertical-align: top;
}
.box-left, .box>.pull-left {
    padding-right: 0;
}
*, :after, :before {
    box-sizing: border-box;
}
.d-_img, .Z-l {
    text-align: center;
}
.d-_img {
    position: relative;
}


.Z-z {
    width: 50px;
    height: 50px;
}
.Z-l {
    border-radius: 50%;
}

     
              </style>

          


        </style>  




<style type="text/css">
  .example-1 {
position: relative;
overflow-y: scroll;
height: 300px; 

width: 90%;
}
@media(max-width: 720px)
{
    .example-1 {
position: relative;
overflow-y: scroll;
height: 300px; 
width: 100%;
}
}
.p-id1 
{
box-shadow: 1px 0px 3px 1px rgba(235,228,235,1);
border-radius: 10px;
box-sizing: border-box;
}

.p-id 
{
  margin-top: -100px;
}

.p-id img {
    object-fit: cover;
    height: 400px;
    width: 114%;
    border: grey;
    border-width: 1px;
}
///*title Name*///
.d-e {
    font-weight: 500;
    font-size: 22px;
    line-height: 10px;
}
.d-b {
    color: #4b4d52;
    display: inline-block;
    word-break: break-word;
    padding: 0;
    margin: 1px;
}
      
.partition
{
  width: 100%;
  margin-right: 5px;
  margin-left: 5px;
  margin-top: 20px;
  margin-bottom: 20px;
  border-top: 1px solid #d6d6d6;
  border-bottom: 1px solid #d6d6d6;

}
.partition1
{
    width: 100%;
  margin-right: 5px;
  margin-left: 5px;
  margin-top: 20px;
  margin-bottom: 20px;
      border-top: 1px solid #d6d6d6;
    border-bottom: 1px solid #d6d6d6;

}
@media(min-width: 720px)
{
  .partition
  {
  width: 120%;
  }
}

.verrical
{
    width: 2px;
    height: 14px;
    background: #666666;
    position: absolute;
}
.add_review {
    display: inline-block;
    padding-left: 15px;
}

@media (min-width: 768px)
.mbt-_a {
    margin-left: -1.6rem;
    width: calc(100% + 3.2rem);
}

</style>


       <style>
          
              .checked {
                color: orange;
              }
               @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }



/****** Style Star Rating Widget *****/
.selectpicker
{
    border: white;
    text-decoration-style: none;
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

.H-z {
    display: -ms-flexbox;
    display: flex;
}


.button4:hover {background-color: #e7e7e7;}
.card_product {
  position: relative;
  flex: 1 1 100%;
  padding: 5px;
  background: white;
  width: 99%;
  height: 350px;
  margin: 2px 0;
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

.card_product_1 {
  transition: transform .5s;
    width: 99%;

}
.card_product_1::after {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  transition: opacity 2s cubic-bezier(0.165, 0.84, 0.44, 1);
  box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.5);
  content: '';
  opacity: 0;
  z-index: -1;
}
.card_product_1:hover, .card_product_1:focus {
  transform: scale3d(1.006, 1.006, 1);
}
.card_product_1:hover::after, .card_product_1:focus::after {
  opacity: 1;
}
.card_one1 >.card_product_1 >img
{
    height: 100%;
    width :100%;
}
.single_c_title
{
  margin-top: 50px;
  margin-bottom: 50px;
}

.hart {
 
   position:absolute;                  
                bottom:0;                          
                align-items: center;
                width: 100%;
                padding: 0;
                margin: 0;
                margin-left: -5px;

    }
    


</style>


<style>

.mySlides {display: none}
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
img {vertical-align: middle;}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.t-m {
    color: #c9ced6;
    font-size: 14px;
    margin-top: -20px;
    padding-bottom: 10px;

}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.activee, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.slider{
  width: 100%; /*Same as width of the large image*/

  /*Instead of height we will use padding*/
 /*That helps bring the labels down*/
  box-shadow: 0px;
  
  /*Lets add a shadow*/
  
}


/*Last thing remaining is to add transitions*/
.slider>img{
  position: absolute;
  left: 0; top: 0;
  transition: all 0.5s;
}

.slider input[name='slide_switch'] {
  display: none;
}

.slider label {
  /*Lets add some spacing for the thumbnails*/
  margin: 18px 0 0 18px;
  border: 3px solid #999;
  
  float: left;
  cursor: pointer;
  transition: all 0.5s;
  
  /*Default style = low opacity*/
  opacity: 0.6;
}

.slider label img{
  display: block;
}

/*Time to add the click effects*/
.slider input[name='slide_switch']:checked+label {
  border-color: #666;
  opacity: 1;
}
/*Clicking any thumbnail now should change its opacity(style)*/
/*Time to work on the main images*/
.slider input[name='slide_switch'] ~ img {
  opacity: 0;
  transform: scale(1.1);
}
/*That hides all main images at a 110% size
On click the images will be displayed at normal size to complete the effect
*/
.slider input[name='slide_switch']:checked+label+img {
  opacity: 1;
  transform: scale(1);
}


.slider {

    box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0);
}

.ff-t{
font-size: 13px;
    font-family: "Poppins", sans-serif;
    line-height: 24px;
    color: #666666;
    padding: 5px 0px;
    margin-top: -5px;
    margin-left: 15px;

  }

</style>
  
<style type="text/css">
  
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);

.slider {
    width: 100%;
    position: relative;
    padding-top: 320px;
    margin: 100px auto;
}

.slider {
  height: 100%;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: row nowrap;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
  -webkit-box-align: end;
  -webkit-align-items: flex-end;
      -ms-flex-align: end;
          align-items: flex-end;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__nav {
  width: 12px;
  height: 12px;
  margin: 2rem 12px;
  border-radius: 50%;
  z-index: 10;
  outline: 6px solid #ccc;
  outline-offset: -6px;
  cursor: pointer;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;

}
.slider__nav:checked {
  -webkit-animation: check 0.4s linear forwards;
          animation: check 0.4s linear forwards;
}
.slider__nav:checked:nth-of-type(1) ~ .slider__inner {
  left: 0%;
}
.slider__nav:checked:nth-of-type(2) ~ .slider__inner {
  left: -100%;
}
.slider__nav:checked:nth-of-type(3) ~ .slider__inner {
  left: -200%;
}
.slider__nav:checked:nth-of-type(4) ~ .slider__inner {
  left: -300%;
}
.slider__inner {
  position: absolute;
  top: 0;
  left: 0;
  width: 400%;
  height: 100%;
  -webkit-transition: left 0.4s;
  transition: left 0.4s;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-flex-flow: row nowrap;
      -ms-flex-flow: row nowrap;
          flex-flow: row nowrap;
}
.slider__contents {
  height: 100%;
  padding: 2rem;
  text-align: center;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-flex: 1;
  -webkit-flex: 1;
      -ms-flex: 1;
          flex: 1;
  -webkit-flex-flow: column nowrap;
      -ms-flex-flow: column nowrap;
          flex-flow: column nowrap;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}
.slider__image {
  font-size: 2.7rem;
      color: #2196F3;
}
.slider__caption {
  font-weight: 500;
  margin: 2rem 0 1rem;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  text-transform: uppercase;
}
.slider__txt {
  color: #999;
  margin-bottom: 3rem;
  max-width: 300px;
}

@-webkit-keyframes check {
  50% {
    outline-color: #333;
  }
  100% {
    outline-color: #333;
  }
}

@keyframes check {
  50% {
    outline-color: #333;
  }
  100% {
    outline-color: #333;
  }
}

@media only screen and (max-width: 600px) {
  .thum {
    display: none;
  }
  .slider__nav
  {

  margin-top: 200px;
  width: 30px; 
  height: 30px; 
  border-radius: 50%;

  }
  .p-id 
{
  margin-top: -100px;
}
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
</style><?

function Tv($screen_tech,$brand,$screen_size)
{
  ?>

  <div class="form-group col-lg-4">
            <label for="storage">Brand<span>*</span></label>
    <input type="text" id="ram"  value="<?php echo $brand; ?>" onchange="addtoPost('&brand='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>

 <div class="form-group col-lg-4"   >
            <label for="storage">Screen Tech<span>*</span></label>
    <select id="ram"class="form-control input-lg" onchange="addtoPost('&screen_tech='+this.value)" >
        <option disabled selected="" value="<?php echo $screen_tech; ?>"><?php echo $screen_tech; ?></option>

      <option value="LED">LED</option>
        <option value="CRT">CRT</option>
          <option value="QLED">QLED</option>
            <option value="LCD">LCD</option>
              <option value="PlASMA">PlASMA</option>
    </select>
    </div>

    <div class="form-group col-lg-4"   >
            <label for="storage">Screen Size(in)<span>*</span></label>
    <select id="ram"class="form-control input-lg" onchange="addtoPost('&screen_size='+this.value)" >
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

   echo "<label class=\"deo_details\">Brand</label>"; 
   echo "<p class=\"ff-t\">$brand</p>"; 
    echo "<label class=\"deo_details\">Type</label>"; 
   echo "<p class=\"ff-t\">$type</p>";   

}

function cellphone($color,$storage)
{

   echo "<label class=\"deo_details\">Color</label>"; 
   echo "<p class=\"ff-t\">$color</p>"; 
    echo "<label class=\"deo_details\">Storage</label>"; 
   echo "<p class=\"ff-t\">$storage</p>"; 
 
}

function Men($type,$color,$size,$brand,$sub_name)
{

  echo "<label class=\"deo_details\">Type</label>"; 
   echo "<p class=\"ff-t\">$type</p>"; 
    echo "<label class=\"deo_details\">Storage</label>"; 
   echo "<p class=\"ff-t\">$storage</p>"; 

if($type == "Bag and wallet" || $type =="Accessories" || $type == "Watches")
{
?>

 

<?
}
else
{
  echo "<label class=\"deo_details\">Color</label>"; 
   echo "<p class=\"ff-t\">$color</p>"; 
    echo "<label class=\"deo_details\">Size</label>"; 
   echo "<p class=\"ff-t\">$size</p>"; 

}
echo "<label class=\"deo_details\">Brand</label>"; 
echo "<p class=\"ff-t\">$brand</p>"; 


}