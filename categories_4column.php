
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <div id="grid" class="c_product_grid_details">
                               <!-- item -->

                               <!-- item -->
                               
                             <?
                             include("sql.php");

                             $categories_id= $_GET["categories_id"];

                         

if(empty( $categories_id))
                             {
                                 $sql="SELECT * FROM product where post ='approved'"; 
                             }
                             else
                             {
                                  $sql="SELECT * FROM product where product_cat='$categories_id' and  post ='approved'"; 
                             }


                            $result = $conn->query($sql);
                            $total=mysqli_num_rows($result);
                            
                            if ($result->num_rows > 0) 
                            {
                                  ?>
                                    <div class="two_column_product">
                                     <div class="row">
                                     
                                      <?
                            while($row = $result->fetch_assoc()) 
                            {
                                $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];

                                    $count=1;

                                    if ($count%3==0)
                                     {


                                       ?>
                                     <div class="row">
                                      <?
                                      
                                    }
                                    else
                                    {
                                    ?>
                                      <div class="col-lg-4 col-sm-6">
                                      <?

                                    }
                                  
                                      image($productName,$product_price,$productDescription,$product_id); 

                                       ?>
                                       
                                        </div>

                                      <?


                                                                         
                            }
                            ?>
                                        </div>
                                        </div>
                                       

                                      <?


                             }

                             ?>
            </div>

                              <?
            function image($productName,$product_price,$productDescription,$product_id)
            {

                            include("sql.php");
                            $sql="SELECT * FROM product_images where product_id = '$product_id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                            $image = $row["file_name"];
                      ?>
                   
                        
                            <div class="l_product_item">
                                <div  class="l_p_img">
                                    <img  onClick="javascript:ajaxpagefetcher.load('window', 'product_details.php?product_id=<?echo $product_id;?>', true)" style=" height: 250px; width: 100%;"class="img-fluid" src="photos/<?echo $image;?>"alt="">
                                   
                                </div>
                                <div class="l_p_text">
                                   <ul>
                                        <li class="p_icon"><a  href="#"><i class="icon_piechart"></i></a></li>


                                        <li><a  onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>product_name=<?echo $productName; ?>'),hidePT()" class="add_cart_btn" href="#">Add To Cart</a></li>
                                        <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                    </ul>
                                    <h4><?echo $productName ?></h4>
                                    <h5><?echo "₱ ".$product_price ?></h5>
                                </div>
                            </div>
                        
                        
                   
              
                                <?
                            }}
                              }

        ?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style>
           
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
              </style>
          </style>