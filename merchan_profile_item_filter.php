<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

 $u_id=$_SESSION["merchant_id"];

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


        
}
}

?>

        <div id="filter">
        <div class="showing_fillter">
          <!---
         <div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">SORT BY</span>
  </div>
 <select onchange="javascript:ajaxpagefetcher.load('filter','merchan_profile_item_filter.php?sortBy='+this.value)" id="sorter" style="width: 200px;">
                                            <option value="Name">Name</option>
                                            <option value="Price">Price</option>
                                        </select>

</div>
      --->
                            </div>

        <div class="my-product">
            

                            <div id="all">
                            <div id="grid" class="c_product_grid_details">
                               <!-- item -->

                               <!-- item -->
                               
                             <?

  if(isset($_GET['sortBy']))
  {
          $sorter = $_GET['sortBy'];

        if ($sorter=="Name") 
                              {
                                
                                  $sql="SELECT * FROM product where post ='approved'and u_id = '$u_id'ORDER BY product_name ASC";
  
                                
                              }

                               else if ($sorter=="Price") {
                              
                                  $sql="SELECT * FROM product where post ='approved'and u_id = '$u_id ' ORDER BY product_price ASC";
                                }
                                
            

  }
  else
  {
           $sql="SELECT * FROM product where post ='approved' and u_id = '$u_id'";      

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
                                    $u_id = $row["u_id"];
                                    

                           $count=1;

                                    
                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u);

                               
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

}

?>



        <?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u)
            {


                            include("sql.php");


                            $sql="SELECT * FROM product_images where product_id = '$product_id'"; 
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




    <div style="margin-left: 0px; margin-right: 0px; padding-right: 0px; padding-left: 0px;" class="col-6 col-sm-12 col-md-12 col-lg-3"> 
   
    <figure class="H-_a H-d">

   <div class="card1 card__one1">
    


    <div class="H-e">
        <div class="H-p">
            <img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>', true)"alt="" src="<?php echo $img; ?>"> 
        </div>
        </div>
         <div class="price_dev2">
              <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box;  line-height:20px; font-weight: 500; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; text-align: left; margin-bottom: 2px;"><?echo $productName;?></p>
            </div>

              <div class="price_dev2">
             <span class="deo_price"><?echo "PHP ".$product_price;?></span></div>


             <div class="desc_dev2">
              <span class="des" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; color: #a6a6a6; text-align: left;"><?echo $desco;?></span>
            </div>

              <?php $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id ='$product_id'";
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
                                      <span class="fa fa-star checked"></span>

                                    <?$number_format--;
                                  }
                                ?>

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




</style>