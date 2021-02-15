<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
  $categories_id= $_GET["categories_id"];
 $_SESSION["cat_filter"]=$categories_id;

$product_id = $_GET["product_id"];
 if(empty($product_id))
 {

}
else
{
  $e = explode(";",$product_id); 
$t = $e[0];//id
$d = $e[1];//featured
$sql2="UPDATE product set product_highlights= '$d' where product_id = '$t'";
if ($conn->query($sql2) === TRUE) {
} else {
    echo $sql."Error updating record: " . $conn->error;
}
}

?>

        <!--================Categories Product Area =================-->
       
    <!-- Sidebar -->

    <?
if (empty($product_id)) 
    {
?>
 <tbody class="container-fluid">
        <section class="categories_product_main ">
            <div class="container-fluid">
                <div class="categories_main_inner">
                    <div class="row-fluid">
         <div class="col-lg-4 float-md-left">

                 <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                    <div  class="sidebar-heading">Item Management</div>
                                    <ul class="navbar-nav">
                                           <li class="nav-item dropdown list-group list-group-flush">
                                            <a style="padding: 10px;"  onClick="javascript:ajaxpagefetcher.load('all','admin_item_management_list.php', true),HideMenu()" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           Featured List
                                           
                                            </a>
                                            <!--
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                            </ul>
                                        -->
                                        </li>


                        <li class="nav-item dropdown list-group list-group-flush">
                                            <a style="padding: 10px;"  class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Promo Request
                                           
                                            </a>
                                            <!--
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                            </ul>
                                        -->
                                        </li>

                                   <li class="nav-item dropdown list-group list-group-flush">
                                            <a style="padding: 10px;"   class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Sale's Request
                                         
                                            </a>
                                            <!--
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                            </ul>
                                        -->
                                        </li>
                                         <li   class="nav-item dropdown list-group list-group-flush">
                                            <a style="padding: 10px;"  onClick="javascript:ajaxpagefetcher.load('window','admin_item_management.php', true),HideMenu()" class="nav-link dropdown-toggle list-group-item list-group-item-action bg-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           All Item
                                           
                                            </a>
                                            <!--
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li class="nav-item"><a class="nav-link" href="#">Hoodies & Sweatshirts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Jackets & Coats</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#">Blouses & Shirts</a></li>
                                            </ul>
                                        -->
                                        </li>
                                      
                                    </ul>
                                </aside>
                               
                                
                            </div>
                          </div>
                          </div>

                        <div class="col-lg-8 float-md-right">
                        <?
                          }
                        ?>
                       
    
                        
                        
                            <div id="all">
                            <div id="grid" class="c_product_grid_details">
                              <div id="container-fluid">
                               <!-- item -->

                               <!-- item -->
                               
                             <?

                             include("sql.php");


                     $sql="SELECT * FROM product where product_highlights='' ORDER by date desc";      
                             

              
                          
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
                                    $product_qty = $row["product_qty"];
                                    $u_id = $row["u_id"];
                                    $u_u = $row["u_u"];
                                    $date = $row['date'];

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
              <span class="des" style="overflow-wrap: break-word;text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; color: #a6a6a6; text-align: left;"><?echo $productDescription;?></span>
            </div>

         <div class="desc_dev2">
              <span class="des" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; text-align: left;"><?echo "Quantity: ".$product_qty;?></span>
            </div>
                    
  <button style="margin-top: 5px;" onClick="javascript:ajaxpagefetcher.load('grid','admin_item_management.php?product_id=<? echo $product_id;?>;featured',true),HideMenu()" class="add_cart_btn">
   Set Feature
  </button>

    <!--  <div class="col-4 col-sm-12 col-md-12 col-lg-4"> 
                    <div class="like-content">
  <button class="btn-secondary like-review">
  <p>Set Promo</p>
  </button>
</div>
</div>
  <div class="col-4 col-sm-12 col-md-12 col-lg-4"> 
                    <div class="like-content">
  <button class="btn-secondary like-review">
   <p>Set Sale</p>
  </button>
</div>
</div>-->

             
                </div>
            </figure>
            </div>
    
      


                                <?
                            }}

                            
                              }

        ?>
          
                            </div>
                            </div>
                          </div>


      
                    </div>
                               
        </section>
        </tbody>
        <!--================End Categories Product Area =================-->



  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


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


  #sidebar-wrapper {

  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem;
  font-size: 1.2rem;
}


#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

@media (min-width: 100%) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
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
.t-m {
    color: #c9ced6;
    font-size: 14px;
    margin-top: -20px;
    padding-bottom: 10px;

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
<script>
  $(function(){
  $(document).one('click', '.like-review', function(e) {
    $(this).html('<i class="fa fa-heart" aria-hidden="true"></i> You liked this');
    $(this).children('.fa-heart').addClass('animate-like');
  });
});
</script>



