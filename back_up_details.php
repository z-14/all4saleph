<?
session_start();
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_u = $_SESSION["u_u"];
if($u_u != "zylei14")
{
  echo "this section is in process, please come back later";
  exit();
}

$product_id = $_GET["product_id"];


              $sql="SELECT * FROM product where product_id = '$product_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) 
                  {
              $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];

                       product($productName,$product_price,$productDescription,$product_id);


                  }
              }

?>
<?
function get_image($id,$u_u,$firstname,$address)
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

                        $_SESSION["img"]=$img;
                        ?>
                        <a onclick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $id;?>')" >
<img  src="<?echo $img;?>" class="Z-l Z-z" >
<div class="profile-box">
<h1 class="f_name"><?echo $firstname;?></h1><div class=""><?echo $u_u?></div>
<div ><span>Joined</span>&nbsp;<span>Oct 2017</span></div>
</a>
                        <?
                     
                    }


?>


<?
function review($u_id)
{
?>


                    <br>  
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
                                <span class="heading" style="margin-left: 30px; color: black;font-weight: bold;">Seller Overall Rating</span>
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

                            <div style="padding: 0;" class="container-fluid">
  <div style="padding-right: 0" class="col-sm-6 col-md-12">
         

  <div  class="example-1 scrollbar-ripe-malinka">
  <div class="wrap">
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


<?
}
?>

                     
              


        <?
          function product($productName,$product_price,$productDescription,$product_id)
          {

                include("sql.php");
                            $sql="SELECT * FROM product_images where product_id = '$product_id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                            $image = $row["file_name"];
                    ?>




 



 <!--================Product Details Area =================-->



        <section class="product_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-5">
                        <div class="product_details_slider">
                        
                        </div>
                        <section class="product_description_area">
            <div class="container">
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
                                   <button type="submit" class="btn btn-primary py-3 px-5" onClick="postItGoTo('rating_reg.php?product_id=<?php echo $product_id; ?>', 'product_details.php?product_id=<?php echo $product_id; ?>'),hidePT()">Submit</button>
                                 </div>
                             </div>


  
  <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
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

                 <div id="deo">
   <div class="card">
  <div  class="example-1 scrollbar-ripe-malinka">
  <div class="wrap">

                       <?php $sql = "SELECT * FROM product_rating WHERE product_id = '$product_id' ORDER BY date DESC";
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
             </div>
           </div>
         </div>         

                    </div>
                  
      </div>







  <div class="col-sm-4 col-lg-7">

    <ul class="nav nav-pills nav-fill" role="tablist">
  <li class="nav-item">
    <a class="nav-link active show" href="#inprogress" role="tab" data-toggle="tab" aria-selected="false">Product details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#completed" role="tab" data-toggle="tab" aria-selected="false">Meet the Seller</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#proposals" role="tab" data-toggle="tab" aria-selected="true">Message Seller</a>
  </li>
</ul>


<div style="margin-bottom: : 10px;" class="spacer" ></div>


<div style="height: 200px" class="tab-content">
<?
 $merchant_id = $_GET["merchant_id"];
 $product_id = $_GET["product_id"];

?>

   <div role="tabpanel" class="tab-pane fade " id="proposals">
<div class="card " style="height: 400px;  border-top:none;height:auto;">
  <div class="card-body ">
    <div class="form-group">
       <textarea class="form-control" rows="5" cols="50" id="reviews" onchange="addtoPost('&mess='+this.value)" placeholder=""></textarea>   
                              </div>
                              <div class="col-12 col-lg-12">
   <button type="submit" class="btn btn-primary py-3 px-5" onClick="postItGoTo('merchant_messages.php?merchant_id=<?echo $merchant_id;?>&product_id=<?echo $product_id;?>','product_details.php?merchant_id=<?echo $merchant_id;?>&product_id=<?echo $product_id;?>'),hidePT()">Submit</button>
                                 </div>
 
  </div>
</div>    
  </div>


 <div role="tabpanel" class="tab-pane fade in active show" id="inprogress">
  <div class="card " style="border-top:none;height:auto">
  <div class="card-body">

 <div class="product_details_text">
                            <h3><?echo $productName; ?></h3>

                              <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id='$product_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                                $result_count = $conn->query($sql_res);
                                if ($result_count->num_rows > 0) {
                                 while ($rows = $result_count->fetch_assoc()) {
                                   $count = $rows['total'];
                                 }
                                }

                                ?>
                              

                                <!--  -->

                            <div class="add_review">
                          <a href="#"><?echo $count;?> Reviews  </a>
                            </div>
                               <?
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
                                 <h6>Available In <span>Stock</span></h6>
                            <h4><?echo $product_price; ?></h4>
                            <p><?echo $productDescription; ?></p>
                       <div class="p_color">
                                <h4 class="p_d_title">color <span>*</span></h4>
                                <select class="color_list" value ="Blue" onchange="addtoPost('&color='+this.value)" >
                                    <option  value="">Select Color</option>
                                    <option value="Red ">Red</option>
                                    <option value="Pink">Pink</option>
                                </select>
                                   
                                </ul>
     </div>


                                                        <div class="p_color">
                                <h4 class="p_d_title">size <span>*</span></h4>
                               <select id="Size" value ="S"onchange="addtoPost('&size='+this.value)"  oninput="showPass(':size'+ this.value);" onclick="showPass('size: '+this.value),anchorIt(this.id),toggleClass(this.id);">

                                    <option>Select your size</option>
                                    <option value="S">S</option>
                                    <option  value="M">M</option>
                                </select>
                            </div>
                       <div class="quantity">
                                <div class="custom">


                                
                                    <button  disabled="disabled" onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>

                                    <input type="text" name="qty"  onchange="addtoPost('&quantitya='+this.value)"  id="sst" maxlength="12" value="01" title="Quantity:" class="input-text qty">


                            <button disabled="disabled" onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>

                                </div>

                  <br>
                            <br>

                      <!-----dwadawd---->
                    
                      <div class="row">
                        
                        <div class="col-ms">
                             <a class="add_cart_btn" href="#" onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>product_name=<?echo $productName; ?>'),hidePT()">add to cart</a>

                             </div>

                      <div class="col-ms">
                             <a class="add_cart_btn" href="#" onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>product_name=<?echo $productName; ?>'),hidePT()">Buy now</a>
                             </div>

                             <div class="col-ms">
                             <a class="add_cart_btn" href="#"  onClick="postItData('&approve=yes-<? echo $product_id ;?>','wishlist.php'),hidePT()">Add to Wishlist</a>

                             
                              </div>
                              </div>




                            
                        </div>






 </div>


    
</div>
</div>
</div>
<!--- merchant profile-->
<div role="tabpanel" class="tab-pane fade" id="completed">
<div style="border-top:none;height:auto">
<div class="box card profile-box">
<span class="box-left box-middle">
<div class="d-_img ">


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
}
}
   
?>


  <?
 get_image($u_id,$u_u,$firstname,$address);

 ?>


</div>

</span>
</div>
 <?
 review($merchant_id);
 ?>
</div> 

</div>


<!---end merchant profile-->
  

  </div>

                      
                            <div class="shareing_icon">
                                <h5>share :</h5>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        <?
          }
        }
    }
        ?>
        
        <!--================Product Description Area =================-->
  
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
height: 400px; 
}
.p-id img {
    object-fit: cover;
      height: 400px;
    width: 100%;

}

</style>
