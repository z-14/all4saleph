<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");



$cat_name =$_GET["cat_name"];
$cat_type=$_GET["cat_type"];
$banner = $_GET["img"];
if ($cat_type == "Retail") {
 $cat_type="Retailer";
}
else if($cat_type == "Others")
{
 $cat_type="Others";
}
else
{
    $cat_type="Supplier";
}



?>

<?
  function getProfileImage($u_id) {
    include("sql.php");
    $sql="SELECT * FROM user_image where u_id = '$u_id'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        if (empty($row['url'])) {
            
          } else {
            $img =  "https://all4sale.ph/photos/".$row['url'];
          }
      }
    }
    else
    {
      $img = "https://haes.ca/wp-content/plugins/everest-timeline/images/no-image-available.png";
    }
    return $img;
  }
?>


<div class="container-fluid">
    <div class="row">
      <div class="col-lg-4"></div>
         <div class="col-lg-4 float-md-right">
            <div class="box card profile-box">
<span class="box-left box-middle">
<div class="d-_img ">
        <img src="<?echo $banner;?>" class="Z-l Z-z" >
<div class="profile-box">

</div>

</div>

</span>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
<h1 class="deo_pag_title"><?echo $cat_type;?></h1>
</div>
<div class="col-lg-6">
<h1 class="deo_pag_title" style="float: right;"><?echo $cat_name;?></h1>
</div>
</div>
</div>
        </div>
      </div>
      <div class="col-lg-4"></div>

         <div class="col-lg-12 float-md-right">

        <div class="container">
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

              
              $sql="SELECT * FROM product where seller_type='$cat_type' and product_cat = '$cat_name' Group by u_id ";      
                           $result = $conn->query($sql);

                            
                            if ($result->num_rows > 0) {

                                ?>
                                      
                                    <div class="clearfix visible-sm">
  
                                         <div class="row">      
                            <?

                            while($row = $result->fetch_assoc()) 
                            {
                                $product_id = $row["product_id"];
                                    $productName = $row["u_u"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];
                                    $u_id = $row["u_id"];
                                    $date = $row['date'];
                                    

                           $count=1;

           $user_image=getProfileImage($u_id);

                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u,$date,$user_image);

                               
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
function profile($u_id)
{
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
                                else
                                {
                                  
                                    echo "No Ratings Available";
                                
                                }

                               


                                  if ($result_ave->num_rows > 0) {
                                    while($row = $result_ave->fetch_assoc()) {
                                      $number_ave = number_format($row['AVG(rating)'], 1);
                                      $number_format = number_format($row['AVG(rating)'], 0);
                                    }
                                  }
                                  else
                                {
                                  
                                    echo "No Ratings Available";
                                
                                }
                                
                                  while ($number_format != 0) {
                                    ?>
                                      <span class="fa fa-star checked"></span>

                                    <?$number_format--;
                                  }
        
  


}

?>




        <?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$date,$user_image)
            {

                         ?>
                         <div style="margin-top: 20px;" class="col-lg-4">
<div onclick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $u_id;?>')" class="deo_profile_card">
    <div class="box">
        <div class="img">
            <img src="<?php echo $user_image; ?>">
        </div>
        <h2><?echo $productName;?><br><span></span></h2>
        <p></p>
        <span>
            <ul>
               <?
          profile($u_id);
          ?>

            </ul>
        </span>
    </div>
</div>
</div>


            
           

 <?
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
    margin-top: 5px;
}


.Z-z {
    width: 150px;
    height: 150px;
}
.Z-l {
    border-radius: 60%;
}



.media:first-child {
    margin-top: 0;
}
.profile-box 
{

}
.card {
    margin-bottom: 1em;
    margin-top: 1em;
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