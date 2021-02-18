<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

$remove = $_GET["remove"];

$e = explode(";",$remove); 
 
$t = $e[0];//yes

$d = $e[1];//featured

if($t=="yes")
{

$sql2="UPDATE product set product_highlights= ' ' where product_id = '$d'";
if ($conn->query($sql2) === TRUE) {
} else {
    echo $sql."Error updating record: " . $conn->error;
}

}






?>
                            <div id="container-fluid">
                            <div id="grid" class="c_product_grid_details">
                               <!-- item -->
                               <!-- item -->
                               
                             <?

                             include("sql.php");

                           
                      $sql="SELECT * FROM product where  product_highlights= 'featured' ORDER by Date DESC";        
                            

                           
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
                                    $product_qty = $row["product_qty"];
                                     $date = $row['date'];
                                    $u_id = $row["u_id"];
                                    $u_u = $row["u_u"];
                                    $product_price = $row['product_price'];

                           $count=1;

                                    
                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u,$product_qty,$date);

                               
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
       <img itemprop="image" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="ab-b ab-k" alt="">
       </div>
<div class="H-_">
<div class="q-a"><?echo $merchant_name;?></div></div>
</a>
       <?
    }
    else
    {
         ?>
              <div class="row" style="margin-top: 10px;">              <div>
  <img itemprop="image" src="<?echo $img;?>" class="q-w-e q-aa" alt="" itemprop="image" style="margin-left: 20px;border-radius: 50%; width: 30px; height: 30px;">
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
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$product_qty,$date)
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
                if (strlen($r) >= 20)
                 {
                   $productDescription = $r."...";
                }
                else
                {
                   $productDescription = $r;
                }

  $r = substr($productName, 0, 20);
                if (strlen($r) >= 20)
                 {
                   $productName = $r."...";
                }
                else
                {
                    $productName = $r;
                }

                    ?>





                        
           <div class="col-6 col-sm-12 col-md-12 col-lg-3">
    <figure class="H-_a H-d">

   <div class="card1 card__one1">
    
    <?
profile($u_id,$u_u,$date);
?>


    <div class="H-e">
        <div class="H-p">
            <img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>', true)"alt="" src="<?php echo $img; ?>"> 
        </div>
        </div>
          <p class="deo_product_name zero_margin"><?echo $productName;?></p>

           <p class="deo_price zero_margin"><?echo "PHP ".$product_price;?></p>
<?
if (empty($productDescription)) {
    $productDescription = "No Description Available";
}
?>
         <div class="desc_dev2">
              <span class="des" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; color: #a6a6a6; text-align: left;"><?echo $productDescription;?></span>
            </div>

         <div class="desc_dev2">
              <span class="des" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; text-align: left;"><?echo "Quantity: ".$product_qty;?></span>
            </div>
                    
  <button style="margin-top: 5px;" onClick="javascript:ajaxpagefetcher.load('grid','admin_item_management_list.php?remove=yes;<? echo $product_id;?>', true),HideMenu()" class="add_cart_btn">
   Remove
  </button>
                </div>
            </figure>
            </div>
    
      


                                <?
                            }}

                            
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
.like-content {
    display: inline-block;
    width: 100%;
    font-size: 18px;
}
.like-content span {
  color: #9d9da4;
  font-family: monospace;
}
.like-content .btn-secondary {
    display: block;
    text-align: left;
    background: #ed2553;
    border-radius: 3px;
    box-shadow: 0 10px 20px -8px rgb(240, 75, 113);
    font-size: 12px;
    cursor: pointer;
    border: none;
    outline: none;
    color: #ffffff;
    text-decoration: none;
    -webkit-transition: 0.3s ease;
    transition: 0.3s ease;
}
.like-content .btn-secondary:hover {
    transform: translateY(-3px);
    margin-bottom: 5px;
}
.like-content .btn-secondary .fa {
    margin-right: 5px;
}
.animate-like {
  animation-name: likeAnimation;
  animation-iteration-count: 1;
  animation-fill-mode: forwards;
  animation-duration: 0.65s;
}
@keyframes likeAnimation {
  0%   { transform: scale(30); }
  100% { transform: scale(1); }
}


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
    width: 110%;
    height: 350px;
    margin: 2px 0;
  
  
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
}

.H-d .H-e img {
    border-radius: 0;
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
    width: 110%;

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
