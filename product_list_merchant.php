<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


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
        <section class="categories_product_main " >
            <div class="container-fluid">
                <div class="categories_main_inner">
                    <div class="row-fluid">
        

                        <div class="col-lg-12">
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


                  $sql="SELECT * FROM `product`  where u_id = '$u_id' AND product_name != ''   ";    
                             

              
                          
                           $result = $conn->query($sql);

                            
                            if ($result->num_rows > 0) {

                                ?>
                                      
                                    <div class="clearfix visible-sm " >
  
                                         <div class="row">
               
                            <?

                            while($row = $result->fetch_assoc()) 
                            {
                                $product_id = $row["product_id"];
                                    $productName = $row["product_name"];
                                    $productDescription = $row["product_desc"];
                                    $product_price = $row["product_price"];
                                     $product_cat = $row["product_cat"];
                                    $product_qty = $row["product_qty"];
                                    $u_id = $row["u_id"];
                                    $u_u = $row["u_u"];

                           $count=1;

                                    
                                image($productName,$product_price,$productDescription,$product_id, $u_id,$u_u,$product_qty,$product_cat);

                               
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
                  

                     <a class="H-z" onClick="javascript:ajaxpagefetcher.load('window','merchan_profile.php?u_id=<?echo $u_id;?>', true),HideMenu()"  >
<div class="ab-_a "  style="margin-left: 15px;">

   <?

    if (empty($img)) 
    {
        ?>
       <img itemprop="image" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="ab-b ab-k" alt="" >
       </div>
<div class="H-_">
<div class="q-a">&nbsp;&nbsp;<?echo $merchant_name;?></div></div>
</a>
       <?
    }
    else
    {
         ?>

       <img itemprop="image" src="<?echo $img;?>" class="ab-b ab-k" alt="">
       </div>
<div class="H-_">
<div class="q-a">&nbsp;&nbsp;<?echo $merchant_name;?></div></div>
</a>
       <?

    }
  




}

?>



        <?
            function image($productName,$product_price,$productDescription,$product_id,$u_id,$u_u,$product_qty,$product_cat)
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


           <div class="col-12 col-lg-3 col-sm-6">
    <div class="H-_a H-d">

   <div class="card1 card__one1" style="height: 400px !important">
    
<?
profile($u_id,$u_u);
?>



<div class="item-container" style="margin-left: 15px; margin-right: 15px;">

   <div class="H-e" style="margin-top: 10px">
        <div class="H-p">
            <figure class="snip0016">
 <img class="img-fluid" onClick="javascript:ajaxpagefetcher.load('window', 'product_update.php?product_id=<?echo $product_id;?>', true)"alt="" src="<?php echo $img; ?>"> 
  <figcaption>
    <h2><span>Edit</span></h2>
    <p>This Item!</p>
    <a href="#"  onClick="javascript:ajaxpagefetcher.load('window', '<?php echo  "product_update.php?action=update&id=".$row['product_id']; ?>', true),HideMenu()"></a>
  </figcaption>     
</figure>
        </div>
        </div>
<div class="row">
   <div class="col-12"><b>PRODUCT NAME:</b>&nbsp;&nbsp;&nbsp;<?echo $productName;?></div> 
</div>

<div class="row">
   <div class="col-12"><b>PRODUCT CATEGORY:</b>&nbsp;&nbsp;&nbsp;<?echo $product_cat;?></div> 
</div>
<div class="row">
   <div class="col-12"><b>PRODUCT PRICE:</b>&nbsp;&nbsp;&nbsp;<?echo $product_price;?></div> 
</div>
<div class="row">
   <div class="col-12"><b>PRODUCT QUANTITY:</b>&nbsp;&nbsp;&nbsp;<?echo $product_qty;?></div> 
</div>
<div class="row">
   <div class="col-12"><b>DATE ADDED:</b>&nbsp;&nbsp;&nbsp;<?  echo date("M j, Y",$row['date']); ?></div> 
</div>

</div>
   

        
      
          
             
                </div>
            </div>
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

  @import url(https://fonts.googleapis.com/css?family=Raleway:400,200,300,800);
figure.snip0016 {
  font-family: 'Raleway', Arial, sans-serif;
  color: #fff;
  position: relative;
  overflow: hidden;
background-color: black; 
  text-align: left;
      height: 160px;
}
figure.snip0016 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
figure.snip0016 img {
  max-width: 100%;
  opacity: 1;
  width: 100%;
  -webkit-transition: opacity 0.35s;
  transition: opacity 0.35s;
}
figure.snip0016 figcaption {
  position: absolute;
  bottom: 0;
  left: 0;
  padding: 30px 3em;
  width: 100%;
  height: 100%;
}
figure.snip0016 figcaption::before {
  position: absolute;
  top: 30px;
  right: 30px;
  bottom: 30px;
  left: 100%;
  border-left: 4px solid rgba(255, 255, 255, 0.8);
  content: '';
  opacity: 0;
  background-color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  -webkit-transition-delay: 0.6s;
  transition-delay: 0.6s;
}
figure.snip0016 h2,
figure.snip0016 p {
  margin: 0 0 5px;
  opacity: 0;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s,-webkit-transform 0.35s,-moz-transform 0.35s,-o-transform 0.35s,transform 0.35s;
}
figure.snip0016 h2 {
  word-spacing: -0.15em;
  font-weight: 300;
  text-transform: uppercase;
  -webkit-transform: translate3d(30%, 0%, 0);
  transform: translate3d(30%, 0%, 0);
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
}
figure.snip0016 h2 span {
  font-weight: 800;
}
figure.snip0016 p {
  font-weight: 200;
  -webkit-transform: translate3d(0%, 30%, 0);
  transform: translate3d(0%, 30%, 0);
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
figure.snip0016 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  color: #ffffff;
}
figure.snip0016:hover img {

  opacity: 0.3;
}
figure.snip0016:hover figcaption h2 {
  opacity: 1;
  -webkit-transform: translate3d(0%, 0%, 0);
  transform: translate3d(0%, 0%, 0);
  -webkit-transition-delay: 0.4s;
  transition-delay: 0.4s;
}
figure.snip0016:hover figcaption p {
  opacity: 0.9;
  -webkit-transform: translate3d(0%, 0%, 0);
  transform: translate3d(0%, 0%, 0);
  -webkit-transition-delay: 0.6s;
  transition-delay: 0.6s;
}
figure.snip0016:hover figcaption::before {
  background: rgba(255, 255, 255, 0);
  left: 30px;
  opacity: 1;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}
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
<script>
  $(function(){
  $(document).one('click', '.like-review', function(e) {
    $(this).html('<i class="fa fa-heart" aria-hidden="true"></i> You liked this');
    $(this).children('.fa-heart').addClass('animate-like');
  });
});
</script>


