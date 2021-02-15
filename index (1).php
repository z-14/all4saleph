<?
include ("sessions.php");
include ("globalconfig.php");



$u_u = $_SESSION["u_u"];


if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
    $url = 'https://' . $_SERVER['HTTP_HOST']
                      . $_SERVER['REQUEST_URI'];
    header('Location: ' . $url);
    exit;
} 


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, , shrink-to-fit=no" />
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ALL4SALE</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <link href="vendors/jquery-ui/jquery-ui.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

<?        
 if($_GET["m"]=="mobile"){ 
 ?>
       <style>
html {
  scroll-behavior: smooth; 
}
     </style>   
<?
}
?>


 <style>       
        body{
background: #fff5ee;
        }
    .info, .uploading{
display: none;
background-color:rgba(64,7,64, 0.9) ;
width: 100%;
height: 100%;
font-size: 16px;
text-align: center;
position: fixed;
top: 0px;
bottom: 0px;
left: 0px;
z-index:100;
padding: 15px;
background: rgba(64,64,64, 0.9) url(./images/loading.gif) no-repeat center center; 
background-size: 10%;
color: white;
z-index:99999;
}        

#window{
margin-left: 0 auto !important;
display: inline-block;
width: 100%;
padding: 10px;
background: white;
}        
#b,
#b::after {
  -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
  -o-transition: all 0.3s;
    transition: all 0.3s;
}

#b {
/*  background: white;*/
  opacity: .9;
  border: 3px solid #fff;
  border-radius: 5px;
  color: #000;
  text-align: center;

  margin: 1em auto;
/*  padding: 2em 6em;*/
  position: relative;
  /*text-transform: uppercase;*/
}

#b::before,
#b::after {
  background: #fff;
  content: '';
  position: absolute;
  z-index: -1;
}
   
#b:hover {
  color: #000;
}

/* BUTTON 1 */

/* BUTTON 4 */
.b::before {
  height: 100%;
  left: 0;
  top: 0;
  width: 100%;
}

.b::after {
  background: #2ecc71;
  height: 100%;
  left: 0;
  top: 0;
  width: 100%;
}

.b:hover:after {
  height: 0;
  left: 50%;
  top: 50%;
  width: 0;
}
     
        
        </style>
        <script>
parentFunction = function(m) {
    ajaxpagefetcher.load('window',m,true);
}
</script>

<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/function.js" type="text/javascript"></script>
<script type="text/javascript" src="datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="datepicker.css"/>
    <link rel="stylesheet" href="./css/pikaday.css">
    <link rel="stylesheet" href="./css/theme.css">
    <link rel="stylesheet" href="./css/triangle.css">

        
    </head>
    <body>
        <div class="info" id="info">Loading</div>
        <!--================Top Header Area =================-->
        <div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="top_header_left">
                            <div class="selector">
                                <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                  <option value='yt' data-image="img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                                  <option value='yu' data-image="img/icon/flag-1.png" data-imagecss="flag yu" data-title="Bangladesh">Bangla</option>
                                  <option value='yt' data-image="img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                                  <option value='yu' data-image="img/icon/flag-1.png" data-imagecss="flag yu" data-title="Bangladesh">Bangla</option>
                                </select>
                            </div>
                            <select class="selectpicker usd_select">
                                <option>USD</option>
                                <option>$</option>
                                <option>$</option>
                            </select>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                                <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"><i class="icon-magnifier"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="top_header_middle">
                            <a href="#"><i class="fa fa-phone"></i> Call Us: <span>+63 987 654 321</span></a>
                            <a href="#"><i class="fa fa-envelope"></i> Email: <span>support@all4sale.ph</span></a>
                            <img src="img/logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="top_right_header">
                            <ul class="header_social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                            <ul class="top_right">
                                <li class="user" onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)"><a href="#"><i class="icon-user icons"></i></a></li>
                                <li class="cart" onClick="javascript:ajaxpagefetcher.load('window', 'cart_list.php', true)"><a href="#"><i class="icon-handbag icons"></i></a></li>
                                <li class="h_price">
                                    <select class="selectpicker">
                                        <option>$0.00</option>
                                        <option>$0.00</option>
                                        <option>$0.00</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Top Header Area =================-->
        
        <!--================Menu Area =================-->
        
        <header class="shop_header_area" id="menu">
            <?
            include("menu_mobile.php");
            ?>
        </header>
        
<!--================End Menu Area =================-->
<div id="window">        
                
        <!--================Slider Area =================-->
        <section class="main_slider_area">
            <div class="container">
                <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                    <ul>
                        <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="img/home-slider/slider-1.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                            <!-- LAYER NR. 1 -->
                            <div class="slider_text_box">
                                <div class="tp-caption tp-resizeme first_text" 
                                data-x="['right','right','right','center','center']" 
                                data-hoffset="['0','0','0','0']" 
                                data-y="['top','top','top','top']" 
                                data-voffset="['60','60','60','80','95']" 
                                data-fontsize="['54','54','54','40','40']"
                                data-lineheight="['64','64','64','50','35']"
                                data-width="['470','470','470','300','250']"
                                data-height="none"
                                data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
                                data-type="text" 
                                data-responsive_offset="on" 
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['left','left','left','left','left','center']"
                                style="z-index: 8;font-family: Montserrat,sans-serif;font-weight:700;color:#29263a;"><img src="img/home-slider/2017-text.png" alt=""></div>

                                <div class="tp-caption tp-resizeme secand_text" 
                                    data-x="['right','right','right','center','center',]" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['255','255','255','230','220']"  
                                    data-fontsize="['48','48','48','48','36']"
                                    data-lineheight="['52','52','52','46']"
                                    data-width="['450','450','450','450','450']"
                                    data-height="none"
                                    data-whitespace="normal"
                                    data-type="text" 
                                    data-responsive_offset="on"
                                    data-transform_idle="o:1;"
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']"
                                    >Best Summer <br />Collection 
                                </div>

                                <div class="tp-caption tp-resizeme third_btn" 
                                    data-x="['right','right','right','center','center','center']" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['385','385','385','385','350']" 
                                    data-width="['450','450','450','auto','auto']"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-type="text" 
                                    data-responsive_offset="on" 
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']">
                                    <a class="checkout_btn" href="#">read more</a>
                                </div>
                            </div>
                        </li>
                        <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="img/home-slider/slider-1.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="slider_text_box">
                                <div class="tp-caption tp-resizeme first_text" 
                                data-x="['right','right','right','center','center']" 
                                data-hoffset="['0','0','0','0']" 
                                data-y="['top','top','top','top']" 
                                data-voffset="['60','60','60','80','95']" 
                                data-fontsize="['54','54','54','40','40']"
                                data-lineheight="['64','64','64','50','35']"
                                data-width="['470','470','470','300','250']"
                                data-height="none"
                                data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
                                data-type="text" 
                                data-responsive_offset="on" 
                                data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                data-textAlign="['left','left','left','left','left','center']"
                                style="z-index: 8;font-family: Montserrat,sans-serif;font-weight:700;color:#29263a;"><img src="img/home-slider/2017-text.png" alt=""></div>

                                <div class="tp-caption tp-resizeme secand_text" 
                                    data-x="['right','right','right','center','center',]" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['255','255','255','230','220']"  
                                    data-fontsize="['48','48','48','48','36']"
                                    data-lineheight="['52','52','52','46']"
                                    data-width="['450','450','450','450','450']"
                                    data-height="none"
                                    data-whitespace="normal"
                                    data-type="text" 
                                    data-responsive_offset="on"
                                    data-transform_idle="o:1;"
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']"
                                    >Best Summer <br />Collection 
                                </div>

                                <div class="tp-caption tp-resizeme third_btn" 
                                    data-x="['right','right','right','center','center','center']" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['385','385','385','385','350']" 
                                    data-width="['450','450','450','auto','auto']"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-type="text" 
                                    data-responsive_offset="on" 
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']">
                                    <a class="checkout_btn" href="#">read more</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Slider Area =================-->
        
        <!--================Feature Add Area =================-->
        <section class="feature_add_area">
            <div class="container">
                <div class="row feature_inner">
                    <div class="col-lg-5">
                        <div class="f_add_item">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-1.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4>Best Summer <br />Collection</h4>
                                <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                            <div class="sale">Sale</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f_add_item right_dir">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-2.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4>Best Summer <br />Collection</h4>
                                <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                            <div class="off">10% off</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="f_add_item">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-3.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Add Area =================-->

</div>
        
        <!--================Our Latest Product Area =================-->

        <section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                    <h2>Our Latest Product</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                     <?php

                        $sql="SELECT * FROM product WHERE post = 'approved';"; 
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                          {
                            while($row = $result->fetch_assoc()) 
                              {

                            
                                if ($row['img'] == '') 
                                {
                                    $img = "blank.jpg";
                                }else{
                                    $img =  "photos/".$row['img'];
                                }

                                $url = "view_product.php?product_view_id=".$row['product_id'];

                                ?>

                    <div class="item">

                        <div class="l_product_item">
                            <div class="l_p_img">
                                <a id="<?php echo $row['product_id']; ?>" onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $url; ?>', true),HideMenu()">
                                        <img src="<?php echo $img; ?>" alt=""></a>
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4 id="<?php echo $row['product_id']; ?>" onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $url; ?>', true),HideMenu()"><?php echo $row['product_name']; ?></h4>
                                <h5><?php echo "&#8369; ". number_format($row['product_price']); ?></h5>
                            </div>
                        </div>
                       
                    </div>
                     <?php
                              }

                          }
                        ?>
               
                    </div>
                </div>
            </div>
        </section>
        <!--================End Our Latest Product Area =================-->
        
        <!--================Feature Big Add Area =================-->
        <section class="feature_big_add_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="f_add_item white_add">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-4.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4>Best Summer <br />Collection</h4>
                                <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="f_add_item white_add">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-5.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4>Best Summer <br />Collection</h4>
                                <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Big Add Area =================-->
        
        <!--================Product_listing Area =================-->
        <section class="product_listing_area">
            <div class="container">
                <div class="row p_listing_inner">
                     <?php

                        $sql="SELECT * FROM product WHERE post = 'approved';";  
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                          {
                            while($row = $result->fetch_assoc()) 
                              {

                            
                                if ($row['img'] == '') 
                                {
                                    $img = "blank.jpg";
                                }else{
                                    $img =  "photos/".$row['img'];
                                }

                             // $url =  "product_create.php?action=update&id=".$_GET['product_id'];
                                 $url = "product_update.php?action=update&id=".$row['product_id'];

                             

                                ?>
                                   <br/>   <br/>

                    <div class="col-lg-6" style="margin-top:20px; width: auto !important;">

                        <div class="row" style=" border: 1px solid #ccc;  margin-right: 20px; width: 100%;">
                            
                            <div class="col-lg-6 col-sm-8">
                                <div class="p_list_text"  style="border-left: 1px solid #cccccc !important;     border-right: 1px solid #cccccc !important; padding-right: 7px;">
                                     <h3 ><?php echo $row['product_name']; ?> </h3>
                                      
                                    <ul>
                                        <li>Price: <?php echo "&#8369; ". number_format($row['product_price']); ?></li>
                                        <li>Category: <?php echo $row['product_cat']; ?></li>
                                        <li>Qty in Stock: <?php echo $row['product_qty']; ?></li>
                                        <li>Description: <?php echo $row['product_desc']; ?></li>

                                        <li><button onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $url; ?>', true),HideMenu()" class="btn btn-sm btn-link">Edit</button> </li>
                                    </ul>

                               
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-4">
                               
                                <div class="from_blog_item">
                                <!--  -->
                              <img src="<?php echo $img; ?>" alt="" height='250' width='260'></a>
                                <div class="f_blog_text">
                                   
                                  

                                <!--   <h5>fashion</h5> -->
                                </div>
                            </div>
                            </div>
                           <br/>
                        </div>
                        <br/>
                    </div>
                    <br/>
                    <?php
                              }

                          }
                        ?>
                    
                </div>
                  <br/>
            </div>
        </section>




     
        <!--================End Product_listing Area =================-->
        
        <!--================Featured Product Area =================-->
        <section class="feature_product_area">
            <div class="container">
                <div class="f_p_inner">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="f_product_left">
                                <div class="s_m_title">
                                    <h2>Featured Products</h2>
                                </div>
                                <div class="f_product_inner">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/featured-product/f-p-1.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Oxford Shirt</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/featured-product/f-p-2.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Puffer Jacket</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/featured-product/f-p-3.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Leather Bag</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="img/product/featured-product/f-p-4.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Casual Shoes</h4>
                                            <h5>$45.05</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="fillter_slider_inner">
                                <ul class="portfolio_filter">
                                    <li class="active" data-filter="*"><a href="#">men's</a></li>
                                    <li data-filter=".woman"><a href="#">Woman</a></li>
                                    <li data-filter=".shoes"><a href="#">Shoes</a></li>
                                    <li data-filter=".bags"><a href="#">Bags</a></li>
                                </ul>
                                <div class="fillter_slider owl-carousel">
                                    <div class="item shoes">
                                        <div class="fillter_product_item bags">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-1.jpg" alt="">
                                                <h5 class="sale">Sale</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>Nike Max Air Vapor Power</h5>
                                                <h4>$45.05</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item woman shoes bags">
                                        <div class="fillter_product_item">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-2.jpg" alt="">
                                                <h5 class="new">New</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>Fossil Watch</h5>
                                                <h4><del>$250</del> $110</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item woman shoes">
                                        <div class="fillter_product_item">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-3.jpg" alt="">
                                                <h5 class="discount">-10%</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>High Heel</h5>
                                                <h4>$45.05</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item shoes">
                                        <div class="fillter_product_item bags">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-1.jpg" alt="">
                                                <h5 class="sale">Sale</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>Nike Max Air Vapor Power</h5>
                                                <h4>$45.05</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item woman shoes bags">
                                        <div class="fillter_product_item">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-2.jpg" alt="">
                                                <h5 class="new">New</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>Fossil Watch</h5>
                                                <h4><del>$250</del> $110</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item woman shoes">
                                        <div class="fillter_product_item">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-3.jpg" alt="">
                                                <h5 class="discount">-10%</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>High Heel</h5>
                                                <h4>$45.05</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item shoes">
                                        <div class="fillter_product_item bags">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-1.jpg" alt="">
                                                <h5 class="sale">Sale</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>Nike Max Air Vapor Power</h5>
                                                <h4>$45.05</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item woman shoes bags">
                                        <div class="fillter_product_item">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-2.jpg" alt="">
                                                <h5 class="new">New</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>Fossil Watch</h5>
                                                <h4><del>$250</del> $110</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item woman shoes">
                                        <div class="fillter_product_item">
                                            <div class="f_p_img">
                                                <img src="img/product/fillter-product/f-product-3.jpg" alt="">
                                                <h5 class="discount">-10%</h5>
                                            </div>
                                            <div class="f_p_text">
                                                <h5>High Heel</h5>
                                                <h4>$45.05</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Featured Product Area =================-->
        
        <!--================Form Blog Area =================-->
        <section class="from_blog_area">
            <div class="container">

                <div class="from_blog_inner">
                    <div class="c_main_title">
                        <h2>Products</h2>
                    </div>
                    <div class="row">
                         <?php

                         $sql="SELECT * FROM product WHERE post = 'approved';"; 
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) 
                          {
                            while($row = $result->fetch_assoc()) 
                              {

                            
                                if ($row['img'] == '') 
                                {
                                    $img = "blank.jpg";
                                }else{
                                    $img =  "photos/".$row['img'];
                                }

                                $url = "view_product.php?product_view_id=".$row['product_id'];

                                ?>
                        <div class="col-lg-4 col-sm-6">
                           

                            <div class="from_blog_item">
                                <a id="<?php echo $row['product_id']; ?>" onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $url; ?>', true),HideMenu()">
                                        <img src="<?php echo $img; ?>" alt="" height='250' width='365'></a>
                                <div class="f_blog_text">
                                    <div id="b"class="b"><h4 id="<?php echo $row['product_id']; ?>" onClick="javascript:ajaxpagefetcher.load('window', '<?php echo $url; ?>', true),HideMenu()"><?php echo $row['product_name']; ?></h4></div>
                                    
                                <h5><?php echo "&#8369; ". number_format($row['product_price']); ?></h5>

                                <!--   <h5>fashion</h5> -->
                                </div>
                            </div>
                            <br/>

                           
               
                        </div>
                            <br/>
                                <br/>
                          <?php
                              }

                          }
                        ?>
                       
                    </div>
                </div>
            </div>
        </section>
        <!--================End Form Blog Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="container">
                <div class="footer_widgets">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6">
                            <aside class="f_widget f_about_widget">
                                <img src="img/logo.png" alt="">
                                <p>Persuit is a Premium PSD Template. Best choice for your online store. Let purchase it to enjoy now</p>
                                <h6>Social:</h6>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_info_widget">
                                <div class="f_w_title">
                                    <h3>Information</h3>
                                </div>
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Delivery information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Returns & Refunds</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_service_widget">
                                <div class="f_w_title">
                                    <h3>Customer Service</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_extra_widget">
                                <div class="f_w_title">
                                    <h3>Extras</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Brands</a></li>
                                    <li><a href="#">Gift Vouchers</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Specials</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_account_widget">
                                <div class="f_w_title">
                                    <h3>My Account</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="footer_copyright">
                    <h5>© <script>document.write(new Date().getFullYear());</script> 
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 

</h5>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="vendors/image-dropdown/jquery.dd.min.js"></script>

        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        
        <script src="js/theme.js"></script>
        
        <script >
         
    </script>
        <script>

var hidden;

function uploadIt(name,target, thengoto){
var form = document.forms.namedItem(name);
form.addEventListener('submit', function(ev) {

      oData = new FormData(form);

  oData.append("CustomField", "This is some extra data");

  var oReq = new XMLHttpRequest();
  oReq.open("POST", target, true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {      
      ShowInfo(oReq.responseText);
      if(oReq.responseText=="success"){
      ajaxpagefetcher.load('window', thengoto, true);
      }
    } else {
      ShowInfo("Error " + oReq.status + " occurred when trying to upload your file.");
      hidden.style.display = "block";
    }
  };

  oReq.send(oData);
  ev.preventDefault();
}, false);
}

function hideMe(id){
var x = document.getElementById(id);
//x.style.display = "none";
x.innerHTML = "Uploading please wait <img src=\"./images/loading.gif\" width=\"20px\"> ";
hidden = x;
ShowInfo("Uploading please wait");
}

function showMe(){
hidden.style.display = "block";
}
</script>

<?
if($_GET["m"] == "mobile"){
?>
<script>
var m = "mobile";
</script>

<script src="js/smoothscroll.js"></script>
<script type="text/javascript" src="smoothscrolltoelement.js"></script> 
<?
}
?>
<script type="text/javascript" src="art.js"></script>


    <script src="./js/pikaday.js"></script>
    <script>

    function getDate(id){

    var pickerTheme = new Pikaday(
    {
        field: document.getElementById(id),
        theme: 'dark-theme',
        format: 'M-D-YYYY',toString(date, format) {
        // you should do formatting based on the passed format,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${month}-${day}-${year}`;
    },
    parse(dateString, format) {
        // dateString is the result of `toString` method
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1] - 1, 10);
        const year = parseInt(parts[1], 10);
        return new Date(year, month, day);
    }
    });
}
    </script>        





<?
if($_GET["testing"]=="yes"){
?>
<script>
function informArt(info){
alert(info);
}
</script>
<?
} else{
?>
<script>
function informArt(info){ }
</script>
<?
} 
?>

        
    </body>
</html>