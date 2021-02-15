<?
include("globalconfig.php");
include("sql.php");
include("sessions.php");

$u_id= $_SESSION["u_id"];

?>





   <!--================Categories Banner Area =================-->

        <!--================End Categories Banner Area =================-->
        
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_items">
                            <h3>Your Cart Items</h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
<?

                      $sql="SELECT * FROM cart where u_id = '$u_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) 
                  {
                            $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];
                                    $c_id = $row['c_id'];
                                    

                       product($productName,$product_price,$productDescription,$product_id,$c_id);

         


               }


?>



<?

              }
            else
             {

                ?>


        
       
            <!--================End login Area =================-->
                <?
               
            }

                 ?>

                                    
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>


        </section>


        <!--================End Shopping Cart Area =================-->
        <?


            function product($productName,$product_price,$productDescription,$product_id,$c_id)
            {

                    include("sql.php");
                            $sql="SELECT * FROM product_images where product_id = '$product_id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                            $image = $row["file_name"];
                           
                    ?>

 <div class="grid">
  <div class="card card__one">
    
    <div class="card__desc">
   
                                  

                                        <div class="row">
                                           <div class="col-lg-1 form-group">
                                              <img  src="img/icon/close-icon.png"  onclick="deleted('<?echo $c_id;?>')" alt="">
                                             </div>
                                            
                                            <div class="col-lg-3 form-group">
                                              <div class="col">
                                                 <img  style="height: 150px; width: 150px" class="img-fluid" src="photos/<?echo $image;?>" alt="">
                                               </div>
                                            </div>
                                            
                                            <div class="col-lg-6 form-group">
                                               <div class="media-body">
                                                   <h6><?echo $productName; ?></h6>
                                                 
                                                  <p class="red"><?echo "₱".$product_price;?></p>
                                                </div>
                                            </div>
                                                        
   

                                                
                                          <div class="col-lg-2 form-group">
                                           <a class="add_cart_btn" href="#" onClick="postIt('add_to_cart.php?product_id=<?echo $product_id;?>'),hidePT()">add to cart</a>
                                        </div>
                                    </div>
                                    
                              
                               
                           
                             
    </div>
  </div>

</div>
                        
                                        <?

                                    }}
                                }

                    ?><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
       <style>
          
              .checked {
                color: orange;
              }
               @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }




.grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  max-width: 340px;
  margin: 0 auto;
  margin-top: 10px;
}
@media screen and (min-width: 768px) {
  .grid {
    max-width: 1200px;
  }
}

.card {
  position: relative;
  flex: 1 1 100%;
  margin: 31px 0;
  padding: 20px;
  background: white;
}
@media screen and (min-width: 768px) {
  .card {
    flex-basis: calc(33.33% - (62px + 40px));
    margin: 0 31px;
  }
}

.card__thumb {
  overflow: hidden;
}

.card__img {
  margin: -20px -20px 0;
}
.card__img img {
  max-width: 100%;
  height: auto;
  border: 0;
  vertical-align: middle;
  box-sizing: border-box;
}

.card__desc {
  margin-top: 5px;
}



.card__one {
  transition: transform .5s;
}
.card__one::after {
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
.card__one:hover, .card__one:focus {
  transform: scale3d(1.006, 1.006, 1);
}
.card__one:hover::after, .card__one:focus::after {
  opacity: 1;
}



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

