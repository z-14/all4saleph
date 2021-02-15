<?

include("sql.php");
include("sessions.php");
include ("globalconfig.php");



$u_u = $_SESSION["u_u"];
$_SESSION["m"]=$_GET["m"];


if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure 
    $url = 'https://' . $_SERVER['HTTP_HOST']
    . $_SERVER['REQUEST_URI'];
    header('Location: ' . $url);
    exit;
} 
?>


<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.10.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
   <link rel="icon" href="img/fav-icon.png" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>All 4 Sale</title>
    <!-- Owl Stylesheets -->
    

  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
 
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit.min.css" />


  <!----shop-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <!-- Bootstrap -->
        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="css/slick.css"/>
        <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <!--box_slider-->
         <link rel="stylesheet" href="jquery.flipbox.css">

         <!--carousel---->
             <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
     <!--carousel---->


  <link rel="stylesheet" href="deo_head.css" type="text/css">

        <style type="text/css">
          .item {display: inline-block; height: 100%; width: 100%; text-align: center; vertical-align: top; font-size: 0;}
            .box {width: 100%; height: 100%; font-size: initial;}
            .box .side { font-size: 80px; font-weight: 700; color: #fff; text-align: center; user-select: none;}
 .info{
display: none;
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
background: white url(loading2.gif) no-repeat center center; 
background-size: 40%;
color: black;
z-index:99999999999;
padding: 30px;
}
  .color-box 
{
  display:inline-block;
  background-color: #1A2223;
  color: white;
  position: absolute;
  background-color: rgba(0,0,0,0.5);
  border-radius: 0px;
  width: 100%;
  font-size: 20px;
font-size: 19px;
left: 0;
bottom: 0;
}
.cube_text
{
  padding: 10px;
}

.deo_con
{
  position: relative;
  text-align: center;
  color: black;
  font-size: 12px;
}
.deo_con img
{
  height: 250px;
  width: 100%;
}

.deo_product_name
{
line-height: 22px;
    white-space: nowrap;
    word-break: normal;
overflow-wrap: normal;
overflow: hidden;
hyphens: auto;
text-overflow: ellipsis;
}
.bottom-left {
  position: absolute;
}


.full
{
   margin-top: 275px;
}
.mobile_view
{
  display: none;
}
@media only screen and (max-width: 480px)
 {
.mobile
{
    margin-top: 250px;
  margin-left: 0px;
}
.mobile_1
{
    margin-top: 20px;
  margin-left: 0px;
}
.full
{
   margin-top: 0;
}

.deo_margin_top
{
  margin-top: 275px;
}

.deo_title_bold
{
  font-size: 50px;
}



.navbar-toggleable-sm .nav-dropdown .dropdown-submenu {

    left: 0px;
 
}
}


#popNotifArt{
position: fixed;
top: 80px;
left: 20px;
width: 0px;
height: 0px;
z-index:999999;
}

.popNotifsArt{
width: 300px;
display: inline-block;
border: 1px solid white;
border-radius: 20px;
box-shadow: 1px 1px 2px 2px #aaaaaa;
color: gray;
padding: 10px;
clear: both;
font-size: 10px;
margin-bottom: 2px;
background: white;
}

</style>

</head>
<body>
   

  <header class="shop_header_area" id="menu">

   <?include ("menu_mobile.php");?>

</header>

   <div style="height: 4rem;" >
         
 </div>
   <div id="info" class="info" style="display: none;"></div>

  <div id="windowPoP" style="display: none;"></div>
  <div id="popNotifArt">
  
  </div> 

<div id="window">
 <?
      include("sql.php");
       $sql="SELECT * FROM mission where paralax != ''";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{
  $image='photos/'.$row['paralax'];

}

}?>


<section class="mbr-fullscreen cid-rv7Qam26I0 mbr-parallax-background mbr-parallax-background"  style="background-image: url('<?echo $image?>');" id="header2-g">
 
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);"></div>

    <div class="container ">

   
        <div class="row">
            <div class="mbr-white col-md-10">
              <p style="margin-bottom: 0px; " class="mbr-text mbr-fonts-style display-5 deo_title">WHERE
                </p>
                <p class="mbr-text mbr-fonts-style display-5 deo_title_bold">
                    You can Sell
                </p>
                <p class="mbr-text mbr-fonts-style display-5  deo_title_bold">
                    ANYTHING
                </p>
                
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>


<section class="mbr-section article content3 cid-rv7QtQjtSv deo_margin_tb deo_bg_color" id="content3-h">
    <div class="container">
        <div class="media-container-row">
            <div class="row col-12 col-md-12">
                <div class="col-12 mbr-text mbr-fonts-style col-md-6 display-5">
                     <strong><p>MISSION</p></strong>
                </div>
                <div class="col-12 mbr-text mbr-fonts-style display-7 col-md-12">
                     <p><?
                      include("sql.php");
  $sql2="SELECT * FROM mission  ORDER by m_id desc LIMIT 0, 1"; 
    $result = $conn->query($sql2);
        //$result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                        {  
                            echo $row["mission"];
                        }

                      }
                     ?></p>
                </div>
                
            </div>
        </div>
    </div>
</section>


<section class="features3 deo_bg_color" id="features3-4">
<div class="container-fluid">
<div class="row">
<div class="col-lg-7 p-0">
  
<div id="wowslider-container1">
    <div class="ws_images"><ul>
      <?
      include("sql.php");
       $sql="SELECT * FROM product_categories where big_box = 'yes'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{

 
while($row = $result->fetch_assoc()) 
{

  $type = $row['cat_type'];
 $cat_name = $row['cat_name'];
$image='photos/'.$row['image'];
      ?>
        <li>
          <img onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')"  src="<?echo $image;?>" alt="Chrysanthemum" title="" /><div onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')"  class="color-black"><span><?echo $row["cat_name"];?></span></div>
          
        </li>
        <?
      }
    }?>
      
 
    </ul></div>
 

    <div class="ws_shadow"></div>
    </div>  

</div>

<div class="col-lg-5" >
   <div class="container-fluid p-0">
      <div class="row">
    <div class="col-lg-6 mobile_1">
      <div class="item">
            <div class="box " id="box4">

                    <?
      include("sql.php");
       $sql="SELECT * FROM product_categories where small_box1 = 'yes'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{
  $image='photos/'.$row['image'];
  $type = $row['cat_type'];
 $cat_name = $row['cat_name'];
?>
   <div class="side side1 deo_con"><img onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><div class="bottom-left color-box "><span class="cube_text" onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><?echo $row["cat_name"];?></span></div></div>


<?
}

}?>
               
            


            </div>

        </div>
        </div>
          <div class="col-lg-6 mobile">
      <div class="item">
            <div class="box" id="box5">
                    <?
      include("sql.php");
       $sql="SELECT * FROM product_categories where small_box2 = 'yes'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{
  $image='photos/'.$row['image'];
  $type = $row['cat_type'];
 $cat_name = $row['cat_name'];
?>
   <div class="side side1 deo_con"><img onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><div class="bottom-left color-box "><span class="cube_text" onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><?echo $row["cat_name"];?></span></div></div>


<?
}

}?>
            
            </div>

            
        </div>
        
        </div>  
<div class="full"></div>
         <div class="col-lg-6 mobile">
      <div class="item">
            <div class="box" id="box6">
            <?
      include("sql.php");
       $sql="SELECT * FROM product_categories where small_box3 = 'yes'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{
  $image='photos/'.$row['image'];
  $type = $row['cat_type'];
 $cat_name = $row['cat_name'];
?>
   <div class="side side1 deo_con"><img onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><div class="bottom-left color-box "><span class="cube_text" onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><?echo $row["cat_name"];?></span></div></div>


<?
}

}?>
            </div>  
        </div>
        </div>  


         <div class="col-lg-6 mobile">
      <div class="item">
            <div class="box" id="box7">
                 <?
      include("sql.php");
       $sql="SELECT * FROM product_categories where small_box4 = 'yes'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{
   $image='photos/'.$row['image'];
  $type = $row['cat_type'];
 $cat_name = $row['cat_name'];
?>
   <div class="side side1 deo_con"><img onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><div class="bottom-left color-box "><span class="cube_text" onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')" src="<?echo $image;?>"><?echo $row["cat_name"];?></span></div></div>


<?
}

}?>
            
            </div>

            
        </div>
        
        </div>  
         
</div>
</div>




</div>
 
</div>

</div>

</section>
<section class="deo_margin_top">
      
  </section>

<section class="mbr-section article content10 cid-rv7MSn33bu" id="content10-f">
    
    <div class="container">
        <div class="inner-container" style="width: 66%;">
            <hr class="line" style="width: 25%;">
            <div class="deo_margin_tb_nocolor section-text align-center mbr-white mbr-fonts-style display-5">
               <?
      include("sql.php");
       $sql="SELECT * FROM mission where big_blog !='' ";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{
 echo "\"".$row['big_blog']."\"";
}

}?>
                </div>
            <hr class="line" style="width: 25%;">
        </div>
    </div>
</section>


<section class="mbr-section content7 cid-rv7Mxjud2B" id="content7-e">
    <div class="container">
        <div class="media-container-row">
            <div class="col-lg-6 col-md-8 ">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-center mb-0 mbr-fonts-style display-7">
                   <?
      include("sql.php");
       $sql="SELECT * FROM mission where left_blog !='' ";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
while($row = $result->fetch_assoc()) 
{
   $image='photos/'.$row['left_image']; 

 echo "\"".$row['left_blog']."\"";
}

}?>
               
                            </p>
                        </div>
                    </div>
                    <div class="mbr-figure"  style="width: 60%;">
                     <img src="<?echo $image;?>" >  
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 ">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-center mb-0 mbr-fonts-style display-7">
                <?
      include("sql.php");
       $sql="SELECT * FROM mission where right_blog !='' ";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
while($row = $result->fetch_assoc()) 
{
   $image='photos/'.$row['right_image']; 

 echo "\"".$row['right_blog']."\"";
}

}?>
               
                            </p>
                        </div>
                    </div>
                    <div class="mbr-figure" style="width: 60%;">
                     <img src="<?echo $image;?>" >  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--footer-->
<section class="cid-qTkAaeaxX5" id="footer1-2" style="margin-top: 10px;">

    <div class="container">
        <div class="media-container-row">

            <div class="col-md-9">
                <p class="mbr-text align-center links mbr-fonts-style display-7" style="font-size: 12px;text-align: center;">
                    <a   style="color: #767676;">FAQ</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a   style="color: #767676;">TERMS OF SERVICE</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a  style="color: #767676;">PRIVACY POLICY</a> &nbsp;&nbsp;&nbsp;&nbsp;
                    <a   style="color: #767676;">VOLUNTEER</a> &nbsp;&nbsp;&nbsp;&nbsp;
                        <a   style="color: #767676;">CONTACT US</a>
                </p>
                 <div class="footer-lower">

            <div class="media-container-row mbr-white">
                <div class="col-sm-5 copyright">
                    <p class="mbr-text lign-center  mbr-fonts-style display-7">
                        Copyright © 2019. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
            </div>
        </div>
       
    </div>
</section>

<!--footer-->
</div>



                  <a  href="https://all4sale.ph">
                         <img class="float_main" src="logo1.png" style="height: 6.5rem; z-index: 999999999999999999;">
                  </a>
         

<?
if (!empty($_SESSION['u_id'])) 
{
$u_id =$_SESSION['u_id'];
?>
<div>

  <?
      include("sql.php");
       $sql="SELECT *  FROM cart where u_id ='$u_id'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
while($row = $result->fetch_assoc()) 
{
   $countCaty +=1; 

}

 }
?>
<a onclick="next('window','cart.php');"  href="#" class="float">
<i  class="fa fa-cart-plus  fa-lg" style="margin-top: 18px;" aria-hidden="true"></i>
<?
if(empty($countCaty))
{

}
else
{
echo "<div class=\"deo_qty\">$countCaty</div>";
}


?>
</a>

 

 <?
      include("sql.php");
       $sql="SELECT *  FROM product_wishlist where u_id ='$u_id'";
        $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
while($row = $result->fetch_assoc()) 
{
   $dd +=1; 

}

 }
?>
<a onclick="next('window','wishlist.php');"  href="#" class="float" style="margin-top: 60px;">
<i class="fa fa-heart my-float fa-lg" style="margin-top: 18px;"aria-hidden="true"></i>

<?
if(empty($dd))
{

}
else
{
echo "<div class=\"deo_qty\">$dd</div>";
}


?>
</a>

</div>

<?
}
?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="jquery.flipbox.js"></script>
               <script>
            $('#box4').flipbox({
                vertical: false,
                autoplay: true,
                autoplayReverse: true,
                autoplayWaitDuration: 4000,
                autoplayPauseOnHover: true
            });
             $('#box5').flipbox({
                vertical: false,
                autoplay: true,
                autoplayReverse: true,
                autoplayWaitDuration: 5000,
                autoplayPauseOnHover: true
            });
              $('#box6').flipbox({
                vertical: false,
                autoplay: true,
                autoplayReverse: true,
                autoplayWaitDuration: 2000,
                autoplayPauseOnHover: true
            });
               $('#box7').flipbox({
                vertical: false,
                autoplay: true,
                autoplayReverse: true,
                autoplayWaitDuration: 3000,
                autoplayPauseOnHover: true
            });
     


            // Buttons
            $('button.prev').click(function() {
                $(this).closest('.item').find('.box').flipbox('prev', $(this).hasClass('reverse'));
            });
            $('button.next').click(function() {
                $(this).closest('.item').find('.box').flipbox('next', $(this).hasClass('reverse'));
            });
            $('button.jump').click(function() {
                $(this).closest('.item').find('.box').flipbox('jump', $(this).data('index'), $(this).hasClass('reverse'));
            });
            $('button.config').click(function() {
                $(this).closest('.item').find('.box')
                    .flipbox({
                        animationDuration: $(this).data('duration'),
                        animationEasing: $(this).data('easing')
                    })
                    .flipbox('next');
            });
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

function next(id,goto)
{
  ajaxpagefetcher.load(id,goto);
}

</script>
<?

if($_GET["testing"]=="yes"){
    ?>
    <script>
        function informArt(info){
      
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
<?
if($_GET["m"] == "mobile"){
    ?>
    
      <script>
function  loadMobile(){
window.location.href = 'magetech://loadMobile?';
}
</script>
    


    <script src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="smoothscrolltoelement.js"></script> 
    <?
}
?>
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

   function hideMe(id){
var x = document.getElementById(id);
x.style.display = "none";
hidden = x;
}
</script>        


<?

include("body_end.php");
include("body_end_dev2.php");

?>
<style type="text/css">
 .modal-backdrop
{
    opacity:0.1 !important;
}
.mbr-fullscreen {
     background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


</style>
  
<!---carousel-->
   <script src="assets/vendors/highlight.js"></script>
    <script src="assets/js/app.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script type="text/javascript" src="engine1/wowslider.js"></script>
    <script type="text/javascript" src="engine1/script.js"></script>
  <script type="text/javascript" src="ajax.js"></script>
    <script type="text/javascript" src="art.js"></script>

   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/nouislider.min.js"></script>
        <script src="js/jquery.zoom.min.js"></script>
        <script src="js/main.js"></script>
</body>
</html>