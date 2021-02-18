<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

userAccess($u_id);

$u_u = $_SESSION["u_u"];
$id = $_SESSION["u_id"];

$sql="SELECT * FROM user_profile WHERE u_id ='$id' LIMIT 0, 1"; 
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

if(empty($_GET["sortBy"]) && empty($_GET["myList"]))
{
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

                            <br>  

                        <?php $sql = "SELECT AVG(rating) FROM buyer_rating WHERE m_id ='$u_id'";
                                $result_ave = $conn->query($sql);
                                $sql_res = "SELECT count(*) as total from buyer_rating WHERE m_id='$u_id'";
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


                       <?php $sql = "SELECT * FROM buyer_rating WHERE m_id = '$u_id' ORDER BY date DESC";
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
               <div onClick="javascript:ajaxpagefetcher.load('window', 'profile_setting.php')" style="text-align: right;"><a href="#" >Edit Term and condition</a></div>
            </div>
            
        </div>

  <?
}
  ?>     

        <div id="filter">
        <div class="showing_fillter">
                                <div class="row m0">
                                
                                    <div class="secand_fillter">
<!---

                                        <h4>SORT BY :</h4>
                                        <select onchange="javascript:ajaxpagefetcher.load('filter','user_profile.php?sortBy='+this.value)" id="sorter" style="selectpicker">
                                            <option value="Name">Name</option>
                                            <option value="Price">Price</option>
                                        </select>
                                        --->
                                    </div>

                                      <?
                                        if($merchant>0)
                                        {
                                          ?>
       <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">My</span>
  </div>
 <select onchange="javascript:ajaxpagefetcher.load('filter','user_profile.php?myList='+this.value)" id="sortBy" style="width: 200px;">
                          
                                          <?
                                            if($_GET["myList"] == "product_wishlist")
                                            {
                                              ?>
                                             <option value="product_wishlist">Wish list</option>
                                             <option value="product">Product</option>
                                                <?
                                            }
                                            else if($_GET["myList"] == "product")
                                            {
                                              ?>
                                               <option value="product">Product</option>
                                             <option value="product_wishlist">Wish list</option>
                                           
                                                <?
                                            }
                                            else
                                            {
                                          ?>
                                             <option value="product_wishlist">Wish list</option>
                                              <option value="product">Product</option>

                                           
                                                <?

                                            }
                                          ?>
                                        </select>
                                   </div> 

                                            <?
                                        }
                                      ?>
                                    
                                   
                                </div>
                            </div>

        <div class="my-product">
            
                            <div id="all">
                            <div id="grid" class="c_product_grid_details">
                               <!-- item -->

                              <!-- item -->
                               
                             <?

                             include("sql.php");

                             if(isset($_GET["myList"]))
                             {

                                 
                                     $s = $_GET["myList"];
      
                                    $sql="SELECT * FROM $s where  u_id = '$u_id'";      
                                  
                         }
else
{
        $sql="SELECT * FROM product_wishlist where  u_id = '$u_id'";      

}
                           
                           

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
                                    $date = $row["date"];
                                    $u_id = $row["merchant_id"];
                                    

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
                  



   <?

    if (empty($img)) 
    {
        ?>
       <?
    }
    else
    {
         ?>

 <div  onClick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $u_id;?>', true),HideMenu()"  class="row" style="margin-top: 10px;">              <div>
  <img itemprop="image" src="<?echo $img;?>" class="q-w-e q-aa" alt="" itemprop="image" style="margin-left: 20px;border-radius: 50%; width: 30px; height: 30px;">

</div>
<div >
  <?


  ?>
  <div class="q-a"><?echo $merchant_name;?></div>
  <!---<time class="t-m"><span><?echo time_elapsed_string("@".$date);?></span></time>-->
  <time class="t-m"><span>2 days ago</span></time>
</div>
</div>
       <?

    }
  




}

?>




        <?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date)
            {


                            include("sql.php");


                            $sql="SELECT * FROM product_images where product_id = '$product_id' Group by product_id"; 
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
  <div class="card-header bg-transparent "> 
       <?
       if($_GET["myList"] == "product")
       {

      }
else
{
  profile($u_id,$u_u,$date);
}
?>
</div>
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
                              $img=$row['url'];
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

                        ?>
<img src="<?echo $img;?>" class="Z-l Z-z" >
<div class="profile-box">
<h1 class="f_name"><?echo $firstname;?></h1><div class=""><?echo $u_u?></div>
<div ><span>Joined</span>&nbsp;<span>May 2019</span></div>
<div><?echo $address;?></div>
<div style="float: left;"><STRONG><?echo $merchant_type;?></STRONG></div>
<div onClick="javascript:ajaxpagefetcher.load('window', 'profile_setting.php')" style="text-align: right;"><a href="#" >Edit profile</a></div>
</div>

                        <?
                    }


?>

<br>
<style>
.profile-bio-body {
    padding: 1em;
    min-height: 128px;
    white-space: pre-line;
    word-break: break-word;
}
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
    padding:10px;

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
.q-aa {
    width: 32px;
    height: 32px;
}
.q-w-e {    border-radius: 50%;
}
.z-a, .q-w-e {
    text-align: center;
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







</styl