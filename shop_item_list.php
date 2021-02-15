<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

 $categories_id= $_GET["categories_id"];
 $_SESSION["categories_id"]=$categories_id;
 $u_u = $_SESSION["u_u"];
 $type= $_GET["cat_type"];
 $cat_id= $_GET["cat_id"];
 $sub_name=$_GET["sub_name"];
if ($type == "Retail") {
 $type="Retailer";
}
else if($type == "Others")
{
 $type="Others";
}
else
{
    $type="Supplier";
}



?>

        <!--================Categories Product Area =================-->



        <div class="cont">
            <div class="cont">
                <div class="categories_main_inner">
                    <div class="row-fluid">
                        <div  style="padding-left: 20px; padding-right: 20px;" class="col-lg-9 p0 float-md-right ">
                            <div id="all">
                            <div id="grid" class="c_product_grid_details">
 
                             <?                            

 include("sql.php");
  $sql="SELECT * FROM product where product_name !='' and deleted !='yes' and seller_type = '$type' ";
                    if(!empty($categories_id))
                    {
                      $sql.="and product_cat = '$categories_id'";

                      if (!empty($sub_name)) 
                      {
                       $sql.="and product_subcat = '$sub_name'";
                      }
                    }

$sql.="ORDER BY date DESC LIMIT 12";
         

                       $result = $conn->query($sql);
                       $number=$result->num_rows;
                            
                            if ($result->num_rows > 0) 
                            {
                              
                                ?>
                                  <div class="clearfix visible-sm">
                                         <div class="row">
<!----                             <?if( $u_u=="zylei14" )
                                          {

                                          ?>
     <div>
<div data-liindex="1" data-liref="rs-136228343" class="tp-thumb ims" style="width: 80px; height: 80px; border-radius: 50%;"><span ></span><span class="tp-thumb-over"></span><span class="tp-thumb-image" style="border-radius: 10px; background-image: url(&quot;https://img.kpopmap.com/2017/12/1512334879_186_twice-sana-looks-like-a-real-life-princess-when-she-wears-her-hair-like-this.jpg&quot;);"></span><p style="align-items: center; margin-left: 10px;">Wallet</p> </div>
</div>


    <div >
<div data-liindex="1" data-liref="rs-136228343" class="tp-thumb ims" style="width: 80px; height: 80px; border-radius: 50%;"><span ></span><span class="tp-thumb-over"></span><span class="tp-thumb-image" style="border-radius: 10px; background-image: url(&quot;https://img.kpopmap.com/2017/12/1512334879_186_twice-sana-looks-like-a-real-life-princess-when-she-wears-her-hair-like-this.jpg&quot;);"></span><p style="align-items: center; margin-left: 10px; ">Shoes</p> </div>

</div>

   <?
                                          }

                                          ?>
                                          --->
             
</nav>
</div>
</div>

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
                                    $u_u = $row["u_u"];
                                     $postID = $row['product_id'];
                                      $date = $row['date'];
                                  
                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u, $date);
                               
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

                             if ($result-> num_rows >=12) 
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
          <div style="
 margin-top: 50px;" class="col-lg-3 p-0 card shadow">
                            <div class="categories_sidebar">
                                <aside class="l_widgest l_p_categories_widget">
                                 
                             <div class="container-fluid">
                            <div class="row">
                              
                 <div style="margin-top: 20px;" class="col-lg-12">
                                 <h6>Search</h6>
                          
                
                       <div class="input-group input-group-sm mb-3">
    <input type="text" class="form-control" placeholder="Search Here" name="" onchange="javascript:ajaxpagefetcher.load('all', 'filtering_table.php?merchant_type=<?echo $type;?>&find='+this.value,true)">
    <div class="input-group-prepend">
    <button class="input-group-text" id="inputGroup-sizing-sm">Go</span></button>
  </div>
</div> 
 <h6>Related categories</h6>
<div class="input-group input-group-sm mb-3">
    <select  class="form-control" onchange="javascript:ajaxpagefetcher.load('all', 'filtering_table.php?merchant_type=<?echo $type;?>&subcat='+this.value, true)" id="deo_sub_drop">
    <?if (!empty($sub_name))
    {
      ?>
  <option disabled selected="" value=""><?echo $sub_name;?></option>
  <?
  }
  else
  {
        ?>
  <option disabled selected="" value="">Please select</option>
  <?
  }
  ?>
   <?

   subcat($_GET["cat_id"]);
   ?>

</select>
  </div>
                
                    

                                
                                 <h6>Sort By</h6>
              <div class="list-group-item checkbox">
                    <label>Price - High to Low</label><input name='foo' style="float: right;" type="radio" class="common_selector brand"  onclick="javascript:ajaxpagefetcher.load('all','filtering_table.php?merchant_type=<?echo $type;?>&cat_id=<?echo $cat_id;?>&sortBy='+this.value)" value="high" >
                    </div>

                       <div class="list-group-item checkbox">
                    <label>Price - Low to High</label><input name='foo' style="float: right;" type="radio" class="common_selector brand" onclick="javascript:ajaxpagefetcher.load('all','filtering_table.php?merchant_type=<?echo $type;?>&sortBy='+this.value)" value="low" >
                    </div>
                     <div style="margin-top: 10px;" class="list-group">
   <h6>Price</h6>
                                      
       <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Min</span>
  </div>
    <input type="number" class="form-control" placeholder="Search Here" name="" onchange="javascript:ajaxpagefetcher.load('all', 'filtering_table.php?merchant_type=<?echo $type;?>&price=min&min=min&search='+this.value, true)">
    <div class="input-group-prepend">
    <button class="input-group-text" id="inputGroup-sizing-sm">Go</span></button>
  </div>
</div> 

   <div class="input-group input-group-sm mb-3">
   <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Max</span>
    </div>
    <input type="number" class="form-control" placeholder="Search Here" name="" onchange="javascript:ajaxpagefetcher.load('all', 'filtering_table.php?merchant_type=<?echo $type;?>&price=max&max=max&search='+this.value, true)">
    <div class="input-group-prepend">
    <button class="input-group-text" id="inputGroup-sizing-sm">Go</span></button>
  </div>
</div>
</div>

  <h6>Location</h6>
  <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
  </div>
 <select class="form-control" onchange="javascript:ajaxpagefetcher.load('all', 'filtering_table.php?merchant_type=<?echo $type;?>&address='+this.value, true)" id="sortBy">
  <option disabled selected="" value="">Please select location</option>
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
    <option value="BoIlocos Nortehol">Ilocos Norte</option>
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
                    
                            </div>


        </div>
                   
                     
      
                        </div>
                    </div>
                                </aside>
                               
                                
                            </div>
                        </div>
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
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date)
            {


                            include("sql.php");


                            $sql="SELECT * FROM product_images where product_id = '$product_id' group by product_id "; 
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

  $r = substr($productName, 0, 50);
                if (strlen($r) > 10)
                 {
                   $productName = $r."...";
                }
                else
                {
                    $productName = $r;
                }



                    ?>





                        
<div style="margin-left: 0px; margin-right: 0px; padding-right: 5px; padding-left: 5px;" class="col-6 col-lg-3 col-sm-6 m-20 bd">   
 <figure class="q-wa H-d">
<div class="card-group">
<div class="card" style="border:none; margin-right: 2px; margin-left: 2px;" >
  <div style="padding-left:10px ;"  class="card-header bg-transparent ">  <?
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
                            else
                            {
                                 while($row = $result->fetch_assoc()) 
                            {

                     $img = "http://textiletrends.in/gallery/1547020644No_Image_Available.jpg";
                               
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

                        
<div style="margin-left: 0px; margin-right: 0px; padding-right: 0px; padding-left: 0px;" class="col-6 col-lg-3 col-sm-6 m-15">   
 <figure class="q-wa H-d">

   <div class="card_dev_2 card_one_2">
    
    <?
profile($u_id,$u_u,$date);
?>


    <div class="H-e">
        <div class="H-p">
            <img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $u_id;?>', true)"alt="" src="<?php echo $img; ?>"> 
        </div>
        </div>
         <div class="price_dev2">
            <h5><p style="margin-bottom: 0px;"><?echo $productName;?></p><h5>
        </div>

        <div class="price_dev2">
           <span > <h6><?echo "PHP ".$product_price;?> <h6></span>
        </div>
    

         <div class="desc_dev2">
            <span class="des"><?echo $desco;?></span>
        </div>
<div style="align-items: center; float: bottom;">
                </div>
                </div>
            </figure>
            </div>
    
      

          
                

                                <?
                            }
                            }


                            
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
