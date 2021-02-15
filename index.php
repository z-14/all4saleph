<?
include ("sessions.php");
include ("globalconfig.php");

$u_u = $_SESSION["u_u"];
$_SESSION["m"]=$_GET["m"];


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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, , shrink-to-fit=no,viewport-fit=cover">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>All 4 Sale</title>

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
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src="js/ajax.js" type="text/javascript"></script>
        <script src="js/function.js" type="text/javascript"></script>
<script type="text/javascript" src="datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="datepicker.css"/>
<link rel="stylesheet" href="./css/pikaday.css">
<link rel="stylesheet" href="./css/theme.css">
<link rel="stylesheet" href="./css/triangle.css">

<?

include("head_dev1.php");
include("head_dev2.php");
include("head.php");
?>
           
        
    </head>
    <body>
        
            <?
            
include("facebook.php");
    include("body_start_dev1.php");
    include("body_start_dev2.php");
    include("body_start.php");
    ?>
    
    <div class="info" id="info">Loading</div>
    
    
    
    <!--================Top Header Area =================-->



	<div id="windowPoP"></div>
    <div class="header_top_area" style="padding-bottom: 0;">
        <div style="padding-left: 0px; margin-left: 50px; margin-right: 40px;">
            <div class="row">
                <div class="col-lg-8">
                    <div class="top_right_header">
                        <div class="row">
                            <div class="col-lg-3" style="padding-right: 0px;"><img src="img/logo.png" alt="" style="
                            float: left; margin-top: 30px;
                            "></div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-8" style="padding-left: 0px; margin-top: 28px;"><div class="list-group">
                               <div class="list-group">

                                   <div class="input-group input-group-sm mb-3" id="art_search">
                                      
                                        <input id="art_search_input" type="text" placeholder="Search here" name="" onchange="javascript:ajaxpagefetcher.load('window', 'search.php?search='+this.value, true)">
                                        <div id="art_sale"></div>
                                    </div> 
                                    
                      </div></div>
                  </div>
              </div>
          </div>
      </div>



      <div class="col-lg-4">
        <div class="top_right_header">
            <ul class="top_right">
                <li class="user" onclick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)" style="margin-right: 2px;"><a href="#"><i class="icon-user icons"></i></a></li>
                <li class="cart" onclick="javascript:ajaxpagefetcher.load('window', 'cart_list.php', true)" style="
                margin-right: 3px;
                "><a href="#"><i class="icon-handbag icons"></i></a></li>

                <li onclick="javascript:ajaxpagefetcher.load('window', 'product_create.php', true)" class="user" style="
                /* height: 50px; */
                "><a style="/* font-size:17px; */height: 50px;"><img src="shopping-bag.png" style="
                padding-bottom: 7px;
                "><span style="
                font-size: 17px;
                ">SELL ITEM</span>

            </a></li>
        </ul>


    </div>
</div>
</div>
</div>
</div>


<header class="shop_header_area" id="menu">
    <?
    include("menu.php");
    ?>
</header>






<!--================End Top Header Area =================-->
  
 <div id="window"> 
        
 <?

if($_GET["m"]=="" || $_SESSION["m"]==""){
//include("home_carousel_area.php");
include("featured_new.php");
}
?>




<?
include("categories_main.php");
?>

<?
if($_GET['m']=="mobile"){
include("featured_new.php");
}
?>       

 
<!--================Our Latest Product Area =================-->
<?
include("our_latest_product.php");
?>
<!--================End Our Latest Product Area =================-->








 </div>   

<!--================Feature  =================-->
<?
//include("featured_products.php");
?>  




 
 
        

  <div id="popNotifArt">
  
  </div>  
        
        
        
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
        <script src="js/smoothscroll.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        
        <script src="js/theme.js"></script>
        
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
function  loadMobile(){
window.location.href = 'magetech://loadMobile?';
}
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

<?
include("body_end.php");
include("body_end_dev1.php");
include("body_end_dev2.php");
include("body_end_dev3.php");
?>
  
      
        
    </body>
</html>
