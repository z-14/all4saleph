<?
include("globalconfig.php");
include("sql.php");
include("sessions.php");
include("access.php");

?>
<hr/>     
     <?
      include("sql.php");
       if(empty( $categories_id))
         {
            $sql="SELECT * FROM product where post ='approved'  ORDER BY date DESC LIMIT 100;";
         }
       else
          {
            $sql="SELECT * FROM product where product_cat='$categories_id' and  post ='approved'ORDER BY date DESC;";
          }
      
      $result = $conn->query($sql);
        if ($result->num_rows > 0)
         {
            ?>
              <div class="clearfix visible-sm">
                <div class="row" style="margin-right: 5px;">
                   <?
                    while($row = $result->fetch_assoc()) 
                      {
                        $product_id = $row["product_id"];
                        $productName = $row["product_name"];
                        $productDescription = $row["product_desc"];
                        $product_price = $row["product_price"];
                        $u_id = $row["u_id"];
                        $u_u = $row["u_u"];

                        $count=1;
                          if ($count%4==0)
                            {
                              ?>
                                 <div class="row" style="margin-right: 5px;">
                              <?
                                      
                            }
                          else
                            {
                              ?><?

                            }
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

                             
       
     <?
function profile($u_id,$u_u)
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
                  
<span>
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
</span>
</a>
       <?
    }
    else
    {
         ?>

 <img  itemprop="image" style="border-radius: 50%; width: 30px; height: 30px;" src="<?echo $img;?>" class="q-w-e q-aa" alt="">
<div class="q-w">
  <div class="q-a"><?echo $merchant_name;?></div>
<time style="margin-top: -10px;" class="t-m"><span>2 hours ago</span></time>
</div>

</a>
</span>
       <?

    }
  



}

?>




        <?
          function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u)
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
        ?>
             <div class="col-6 col-lg-2 col-sm-6 " id="grid">
              <figure class="card1_dev1 card1_card1_dev1">
                <div class="card1 card__one1">
              
              <?profile($u_id,$u_u);?>


            
            <div class="card_product_image_dev1">
              <div class="card_card_product_image_dev1">
                <img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>', true)"alt="" src="<?php echo $img; ?>"> 
               </div>
            </div>

        <br/>
              <div class="price_dev2">
                <p style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box;  line-height:20px; font-weight: 500; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; text-align: left; margin-bottom: 2px;"><?echo $productName;?></p>
               </div>

              <div class="price_dev2">
                         <span> <h6 style="text-align: left; margin-bottom: 0px;"><?echo "PHP ".$product_price;?></h6></span></div>


              <div class="desc_dev2">
                <span class="des" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; font-size:.75rem; line-height:18px; -webkit-line-clamp: 1; -webkit-box-orient: vertical; width:100%; color: #a6a6a6; text-align: left;"><?echo $productDescription;?></span>
              </div>


  
         <!--  <div class="b"><?echo $productDescription;?></div> -->
            <?php 
            include("sql.php");
              $sql = "SELECT AVG(rating) FROM product_rating WHERE product_id='$product_id'";
                $result_ave = $conn->query($sql);
                  $sql_res = "SELECT count(*) as total from product_rating WHERE product_id='$product_id'";
                    $result_count = $conn->query($sql_res);
                      if ($result_count->num_rows > 0)
                        {
                          while ($rows = $result_count->fetch_assoc()) 
                            {
                              $count = $rows['total'];
                            }
                         }
            ?>
            <?
              if ($result_ave->num_rows > 0) 
                {
                  while($row = $result_ave->fetch_assoc()) 
                    {
                      $number_ave = number_format($row['AVG(rating)'], 1);
                      $number_format = number_format($row['AVG(rating)'], 0);
                    }
                }
              
              while ($number_format != 0)
                {
            ?>
                  <span class="fa fa-star checked"></span>

                   <?
                    $number_format--;
                }
            ?>


                </div>
            </figure>
            </div>
    
          <?
            }}
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
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/
.selectpicker
{
    border: white;
    text-decoration-style: none;
}
.l {
 color: #807f7f;
    /*width: 180px;*/
    /*height: 50px;*/
    height:2.4em;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    /*white-space: nowrap; */
    position:relative;
    padding:0 0.5em;
}
.l:after {
    content:'...';
    background:inherit;
    position:absolute;
    bottom:0;
    right:0;

}
/*div.b {
  white-space: nowrap; 
  width: 200px; 
  overflow: hidden;
  text-overflow: ellipsis; 
/*  border: 1px solid #000000;
}
*/.heading {
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

.card_card_dev1 {
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

.card1_card1_dev1 .card_product_image_dev1 img {
    border-radius: 0;
  
}
.card_product_image_dev1 img {
    object-fit: cover;
    height: 160px;
    width: 100%;
    border-radius: 6px 6px 0 0;
      margin: 2px 0;
}
img {
    vertical-align: middle;
}
img {
    border: 0;
}
.ab-k {
    width: 32px;
    height: 32px;
}
.ab-b {
    border-radius: 50%;
}
.card2_card_dev1, .ab-b {
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
  box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.15);
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

@media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px) {



}
</style>



