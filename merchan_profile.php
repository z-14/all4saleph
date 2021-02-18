<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

 $u_id=$_GET["u_id"];

 $_SESSION["merchant_id"]=$u_id;

$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 1"; 
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
$merchant_type = $row["merchant_type"];


        
}
}

?>



<div class="container">
    <div class="row">
         <div class="col-lg-4 float-md-right">
            <div class="box card profile-box">
<span class="box-left box-middle">
<div class="d-_img ">
<?

get_image($u_id,$u_u,$firstname,$address,$merchant_type);

?>
</div>

</span>
</div>

 <section class="product_description_area">
            <div class="container">
                <nav class="tab_menu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</a>

                      
                     
                      
                     
                    </div>
                </nav>


                <div class="tab-content" id="nav-tabContent">
                    
                  
                  
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
   <ul>


                  <div id="review_container"  class="col-12 col-lg-12 mt-30">
<hr>
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
                                   <button type="submit" class="add_cart_btn py-2 px-5" onClick="postItGoTo('merchan_rating_reg.php','merchan_profile.php? u_id=<?php echo $u_id; ?>'),hidePT()">Submit</button>
                                 </div>
                             </div>
 
      </ul>
                            <br>  

                        <?php $sql = "SELECT AVG(rating) FROM merchant_rating WHERE m_id ='$u_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from merchant_rating WHERE m_id='$u_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }

                                ?>
                                <span class="heading" style="color: black;font-weight: bold;">Overall rating</span>
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


                       <?php $sql = "SELECT * FROM merchant_rating WHERE m_id = '$u_id' ORDER BY date DESC";
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
            <td style="font-size: 14px; font-weight: bold; padding-top: 20px; vertical-align: bottom; color: black;"><?php echo $row['c_uu']; ?></td> 

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
                                   <button type="submit" class="add_cart_btn py-2 px-5" onClick="postItGoTo('merchant_messages.php?merchant_id=<?echo $u_id;?>','merchan_profile.php?u_id=<?php echo $u_id; ?>'),hidePT()">Submit</button>
                                 </div>
                    </div>
          <!-- Search section -->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p></p>

                    </div>
                  
                </div>
            </div>
</section>

        </div>
         <div class="col-lg-8 float-md-right">
            <div class="card">
            <div class="profile-bio">

               <div class="preline profile-bio-body"><?echo $term_condition;?></div>
        
            </div>

         
        </div>
        

        <div id="filter">
        <div class="showing_fillter">
                                <div class="row m0">
                                
                              <!----
                                       <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">SORT BY</span>
  </div>
 <select onchange="javascript:ajaxpagefetcher.load('filter','merchan_profile_item_filter.php?sortBy='+this.value)" id="sorter" style="width: 200px;">
                                            <option value="Name">Name</option>
                                            <option value="Price">Price</option>
                                        </select>

</div>------>
                                    
                                   
                                </div>
                            </div>

        <div class="my-product">
            

                            <div id="all">
                            <div id="grid" class="c_product_grid_details">
                               <!-- item -->

                               <!-- item -->
                               
                             <?

                             include("sql.php");

              
              $sql="SELECT * FROM product where u_id = '$u_id' and product_name !=''";      
                           $result = $conn->query($sql);

                            
                            if ($result->num_rows > 0) {

                                ?>
                                      
                                    <div class="clearfix visible-sm">
  
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
                          </div>
                        </div>


<?
function profile($id,$u_u)
{
     include("sql.php");

                            $sql="SELECT * FROM user_image where u_id = '$id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              
                                
                         
                              if (empty($row['url']) ) 
                                {
                                    $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                                }else{
                                    $img =  "photos/".$row['url'];
                                }
                            }
                        }
?>
                  

                     <a class="H-z" >
<div class="ab-_a ">

   <?

    if (empty($img)) 
    {
        ?>
       <img itemprop="image" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="ab-b ab-k" alt="">
       </div>
<div class="H-_">
<div class="H-A"><?echo $u_u;?></div></div>
</a>
       <?
    }
    else
    {
         ?>
       <img itemprop="image" src="<?echo $img;?>" class="ab-b ab-k" alt="">
       </div>
<div class="H-_">
<div class="H-A"><?echo $u_u;?></div></div>
</a>
       <?

    }
  



}

?>



        <?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date)
            {


                            include("sql.php");


                            $sql="SELECT * FROM product_images where   product_id = '$product_id' Group by product_id"; 
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





            <div class="col-6 col-sm-12 col-md-12 col-lg-4 p-0">
   <figure class="q-wa H-d">
<div class="card-group">
<div class="card bd" style=" border:none;margin-right: 2px; margin-left: 2px;" >

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
if (empty($productDescription))
 {
$productDescription="No Product Descr.....";
}

        ?>
        
            <p class="des zero_margin"><?echo $productDescription;?></p>
      
         <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }
if (empty($_SESSION['u_u'])) {
  
                            ?>


    <div class="product_buttons">
    <button  onClick="javascript:ajaxpagefetcher.load('window','login_mobile.php', true)" class="product_heart"><i class="fa fa-heart"></i></button>
   <button onClick="javascript:ajaxpagefetcher.load('window','login_mobile.php', true)" class="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
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
        <?
      }

else
 {
  ?>
  <div class="product_buttons">
 <button  onClick="postIt('wishlist.php?product_id=<?echo $product_id;?>'),hidePT()" class="product_heart"><i class="fa fa-heart"></i></button>
   <button onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()"  class="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
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
  <?
}

 

      ?>





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
function get_image($id,$u_u,$firstname,$address,$merchant_type)
{
     include("sql.php");

                            $sql="SELECT * FROM user_image where u_id = '$id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              
                                
                         
                              if (empty($row['url']) ) 
                                {
                                    $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                                }else{
                                    $img =  "photos/".$row['url'];
                                }
                            }
                        }
                        if (empty( $img)) 
     {
             $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
        }

                        $_SESSION["img"]=$img;
                        ?>

<img src="<?echo $img;?>" class="Z-l Z-z" >
<div class="profile-box">
<h1 class="f_name"><?echo $firstname;?></h1><div class=""><?echo $u_u?></div>
<div ><span>Joined</span>&nbsp;<span>May 2019</span></div>
<div><?echo $address;?></div>
<div style="float: right;"><STRONG><?echo $merchant_type;?></STRONG></div>

</div>
                        <?
                    }


?>
<br>

<style>
.over-allrating.rating-padding {
    padding: .4em 1em;
}
.over-allrating {
    background: #e6e6e6;
    border-top: 1px solid #ccc;
    font-size: 5px;
}

.profile-bio {
    padding: 1em;
    min-height: 120px;
    white-space: pre-line;
    word-break: break-word;
}

    .deo {
    object-fit: cover;
    height: 160px;
    width: 100%;
 border-radius: 50%;
}
.box-middle {
    vertical-align: middle;
}
.box-body, .box-left, .box-right {
    display: table-cell;
    vertical-align: top;
}
.box-left, .box>.pull-left {
    padding-right: 10px;
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
    width: 100px;
    height: 100px;
}
.Z-l {
    border-radius: 50%;
}



.media:first-child {
    margin-top: 0;
}
.profile-box 
{

}
.card {
    margin-bottom: 1em;
    background: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,.15);
    border-radius: 6px;
    font-size: 14px;
    padding: 2px;
}
.media, .media-body {
    zoom: 1;
    overflow: hidden;
}

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
.card1 {
  position: relative;
  flex: 1 1 100%;
  padding: 5px;
  background: white;
    width: 95%;
    height: 300px;
    margin: 1px 0;
  
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

.card__one1 {
  transition: transform .5s;
    width: 95%;

}
.card__one1::after {
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
.card__one1:hover, .card__one1:focus {
  transform: scale3d(1.006, 1.006, 1);
}
.card__one1:hover::after, .card__one1:focus::after {
  opacity: 1;
}
.card_one1 >.card__one1 >img
{
    height: 100%;
    width :100%;
}

</style>




</style>