<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

$categories_id= $_GET["categories_id"];
 $type= $_GET["merchant_type"];
  if (empty($categories_id)) 
  {
     $categories_id= $_SESSION["categories_id"];
  }
 
  $sortBy=$_GET["sortBy"];
 $price = $_GET["price"];
 $search = $_GET["search"];
   $max = $_GET["max"];
    $min = $_GET["min"];
    $address = $_GET["address"];
$subcat=$_GET["subcat"];

?>

                            <div id="container-fluid">
                            <div id="grid" class="c_product_grid_details">
                               <!-- item -->

                               <!-- item -->
                               
                             <?

                             include("sql.php");
$sql="SELECT * FROM product where product_name !='' and seller_type = '$type'"; 

                             if(!empty($subcat))
                             {
                               $sql.="and product_subCat ='$subcat'";
                             }
                             if(!empty($price))
                              {
                                  if ($max == "max") 
                                  {
                                    if (empty($categories_id)) 
                                {
                                   $sql.="AND product_price <= '$search' ";  
                                }
                                else
                                {
                                  $sql.="and product_cat='$categories_id' AND product_price <= '$search'";
                                }
                             
                                  }
                                
                                  if ($min == "min")
                                 {
                                  if (empty($categories_id)) 
                                {
                                   $sql.="AND product_price >= '$search' ";  
                                }
                                else
                                {
                                  $sql.="and product_cat='$categories_id'AND product_price >= '$search' ";
                                }
                            
                                  }
                                  
                                   
                                  
                              }
                                if(!empty($address))
                              {
                                
                                 if(empty($categories_id))
                                {
                                   $sql.=" and address ='$address' ";
                                }
                                else
                                {
                                  $sql.=" and address ='$address' and product_cat='$categories_id'";
                                }
                              }
                           

                              if(!empty($_GET["find"]))
                              {

               $find = "%".$_GET["find"]."%";  
              $sql.="AND product_name LIKE '$find'  ";    

                              }
                                
                          if ($sortBy=="low") 
                              {
                                if(empty($categories_id))
                                {
                                  $sql.=" ORDER BY product_price ASC";
                                }
                                else
                                {
                                  $sql.=" and product_cat='$categories_id' ORDER BY product_price ASC";
                                }
                                
                              }
                              else if ($sortBy=="high") 
                              {
                                if(empty($categories_id))
                                {
                                  $sql.="ORDER BY product_price Desc Limit 20";
                                }
                                else
                                {
                                  $sql.=" and product_cat='$categories_id' ORDER BY product_price desc Limit 20";
                                }
                              }
                              else
                              {
                                  $sql.="ORDER BY date Desc  Limit 12";
                              }

                          


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
                                    $u_u = $row["u_u"];
                                    $date = $row['date'];
                                     $postID = $row["product_id"];

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

                             if ($result-> num_rows >= 12) 
                             {
                           
                             ?>


      <div class="show_more_main Z-1 l-r" id="show_more_main<?php echo $postID; ?>">
    <span id="<?php echo $postID; ?>" class="show_more_shop" title="Load more posts">Show more</span>
        <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    
             <?
}
             ?>
  
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

 <div class="row">            <div>
  <img itemprop="image" src="<?echo $img;?>" class="q-w-e q-aa" alt="" itemprop="image" style="border-radius: 50%; width: 30px; height: 30px;">
</div>
<div >
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
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date)
            {


                            include("sql.php");


                            $sql="SELECT * FROM product_images where product_id = '$product_id' GROUP by product_id"; 
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

                  $r = substr($productName, 0, 20);
                if (strlen($r) > 10)
                 {
                   $productName = $r."...";
                }
                else
                {
                    $productName = $r;
                }
                    ?>



<div style="margin-left: 0px; margin-right: 0px; padding-right: 0px; padding-left: 0px;" class="col-6 col-lg-3 col-sm-6 m-20">   
 <figure class="q-wa H-d">
<div class="card-group">
<div class="card bd" style="border:none; margin-right: 10px; margin-left: 10px;" >
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
           <p class="deo_price"><?echo "PHP ".$product_price;?></p>
   
        <?
if (empty($desco))
 {
$desco="No Product Description available";
}

        ?>
        
            <p class="des zero_margin"><?echo $desco;?></p>

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
          <button class="product_heart"><i class="fa fa-heart"></i></button>
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
                                      <span class="fa fa-star checked"></span>

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
.c_1 {
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

.c_d1 {
  transition: transform .5s;
    width: 99%;

}
.c_d1::after {
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
.c_d1:hover, .c_d1:focus {
  transform: scale3d(1.006, 1.006, 1);
}
.c_d1:hover::after, .c_d1:focus::after {
  opacity: 1;
}
.tz {
    color: #c9ced6;
    margin-left: -50px;
    margin-top: 15px;

}


</style>




