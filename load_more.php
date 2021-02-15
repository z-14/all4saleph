<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


  if(!empty($_POST["id"]))
  { 
 $id=$_POST["id"];

$query = $conn->query("SELECT COUNT(*) as num_rows FROM product where product_name !='' and product_id < '$id' ORDER BY date DESC");

$row = $query->fetch_assoc();
 $totalRowCount = $row['num_rows'];
       $showLimit = 12;

?>
<div class="container-fluid">
  <div class="row">

   <?

                             include("sql.php");
                              $id=$_POST["id"];
               
   $sql="SELECT * FROM product  where product_name !='' and product_id < '$id' ORDER BY date DESC LIMIT  $showLimit ";                      
 
                           $result = $conn->query($sql);

                            
                            if ($result->num_rows > 0) {

                                ?>
                                      
  

                                      
                            <?

                            while($row = $result->fetch_assoc()) 
                            {
                                $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];
                                    $u_id = $row["u_id"];
                                    $u_u = $row["u_u"];
                                     $postID = $row['product_id'];
                                      $date = $row['date'];


                           $count=1;

                                    
                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u,$date);

                               
                            }
                             ?>

                          
                     
                     </div>
                   </div>
                                
                                 <?php 
                                 if($totalRowCount > $showLimit){ 
                                  ?>
       <div class="row">
  <div class="col-lg-5 col-sm-12"></div>
        <div class="col-lg-2  col-sm-12 col-center" style="align-items: center; float: bottom;">
   <div class="show_more_main Z-1 l-r" id="show_more_main<?php echo $postID; ?>">
    <span id="<?php echo $postID; ?>" class="show_more" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
</div>
 <div class="col-lg-5 col-sm-12"></div>
</div>
    <?
     } 
    

                             }
                             else
                             {
                                echo "No product ";
                             }

                             ?>
                        
                          </div>

                          <?
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
  <img  src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="q-w-e q-aa" alt="">
</div>
<div class="q-w">
  <div class="q-a"><?echo $merchant_name;?></div></div>
</span>
</a>
<?
}
else
{
 ?>



 <div class="row" ">              
  <div>
  <img itemprop="image" src="<?echo $img;?>" class="q-w-e q-aa" alt="" itemprop="image" style="border-radius: 50%; width: 30px; height: 30px;">
</div>

<div>
  <div class="q-a"><?echo $merchant_name;?></div>
  <time class="t-m"><span><?echo time_elapsed_string("@".$date);?></span></time>
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
  $sql="SELECT * FROM product_images where product_id = '$product_id' group by product_id"; 
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()) 
    { 
      if (empty($row['file_name']) ) 
      {
        $img = "blank.jpg";
      }
      else
      {
        $img =  "photos/".$row['file_name'];
      }

       $r = substr($productDescription, 0, 20);
                if (strlen($r) >= 20)
                 {
                   $productDescription = $r."...";
                }
                else
                {
                   $productDescription = $r;
                }


      ?>
 <div style="margin-left: 0px; margin-right: 0px; padding-right: 0px; padding-left: 0px;" class="col-6 col-lg-2 col-sm-6 m-20">   
 <figure class="q-wa H-d">
<div class="card-group">
<div class="card bd" style=" border:none;margin-right: 2px; margin-left: 2px;" >
  <div class="card-header bg-transparent "> 
   <?
profile($u_id,$u_u,$date);
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
   <button class="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
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



.cad_dev_1_loadmore {
  position: relative;
  flex: 1 1 100%;
  padding: 5px;
  background: white;
    width: 100%;
    height: 350px;
    margin: 2px 0;
  
}
.deaa {
  transition: transform .5s;
    width: 99%;

}

.deaa::after {
  position: absolute;
  top: 0;
  left: 0;
  width: 99%;
  height: 100%;
  transition: opacity 2s cubic-bezier(0.165, 0.84, 0.44, 1);
  box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.5);
  content: '';
  opacity: 0;
  z-index: -1;
}
.deaa:hover, .deaa:focus {
  transform: scale3d(1.006, 1.006, 1);
}
.deaa:hover::after, .deaa:focus::after {
  opacity: 1;
}
.card_one1 >.deaa >img
{
    height: 100%;
    width :100%;
}
.t-m {
    color: #c9ced6;
    margin-left: 10px;
    margin-top: 5px;

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






