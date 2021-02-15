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

if($_GET["testing"]=="yes"){
$_SESSION["testing"] = "yes";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>



    <title>All 4 Sale</title>
	<meta charset="UTF-8">
	<meta name="description" content="Trobi ">
	<meta name="keywords" content="travel, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<style>
	
	html {
  scroll-behavior: smooth;
  font-family: Arial, Helvetica, sans-serif;
}
	
	
	.info, .uploading, .successpage{
display: none;
background-color:rgba(64,7,64, 0.9) ;
width: 100%;
height: 100%;
font-size: 20px;
text-align: center;
position: fixed;
top: 0px;
bottom: 0px;
left: 0px;
padding: 15px;
background: white url(bunny_skate.gif) no-repeat center center; 
background-size: 60%;
color: green;
z-index:99999;
padding-top: 100px;
font-family: Arial, Helvetica, sans-serif;
}
.successpage{
background: white url(bunny_skate.gif) no-repeat center center; 
}	
	
	
	.menu_icons{
width: 100%;
height: 10%;
position:relative;
text-align: center;
margin-top: 10px;
margin-bottom: 10px;
margin-left: 0 auto !important;
}

.menu_icons_container{
text-align: justify;
display: inline-block;
width:90%;

margin: 0 auto !important;
}

.menu_icon_items{
width: calc(100% / 5);
float: left;
text-align: center;
font-family: Arial, Helvetica, sans-serif;
font-size: 8px;
color: gray;
}




.showhidemenu{
position: absolute;
top: 25px;
right: 20px;
width: 40px;
height: 40px;
border-radius: 50px;
background: orange;
text-align: center;
padding: 10px;
color: white;
font-size: 10px;
background: url("./icon/menu_sml.png") no-repeat center;
background-size: 100%;
}


#window{
margin-left: 0 auto !important;
display: inline-block;
width: 100%;
padding: 10px;
background: white;
font-family: Arial, Helvetica, sans-serif;
letter-spacing: 1px;
}

.menu{
width: 100%;
position: absolute;
top: 200px;
z-index: 99999;
display: none;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 1px;
    background-color:  white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu ul li:hover{
    background-color: orange;
}

.menu ul li ul{
display: none;
}

.menu li ul li  {
    padding: 8px;
    margin-bottom: 1px;
    background-color:  white;
    color: black;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    z-index:100;
    margin-left: 20px;
}

.menu a{
color: black;
text-decoration: none;
}

.menu a:hover{
color: black;
text-decoration: none;
}

#ptext_container{
position: fixed;
top:200px;
left: 0px;
right: 0px;
width: 100%;
height: 100%;
background: rgba(255,42,107,0.7);
display: none;
}

#ptext{
width: 85%;
height: 50px;
padding: 10px;
background-color: white;
border: 1px solid white;
overflow: hidden;
position: fixed;
top:35%;
left: 30px;
display: inline-block;
}
.inedit{
position: fixed;
top:35%;
left: 30px;
}





.search_input{
width: 100%;
height: 30px;
background: white url(search_icon_smaller.png) no-repeat scroll 6px 4px;
background-size: 17px 17px; 
padding-left:30px;
border: 2px solid white;
border-radius: 3px;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
color: gray;
}
.search_icon_{
position: absolute;
top: 0px;
right: 20px;
width: 30px;
height: 30px;
border-radius: 50px;
text-align: center;
padding: 10px;
color: white;
font-size: 10px;
background: url("./icon/search_icon.png") no-repeat center;
background-size: 100%;
}


.backbutton{
background: url("arrow_left_white.png") no-repeat center;
background-size: 30px 30px;
width: 30px;
height: 50px;
font-size: 8px;
text-align: center;
position: fixed;
top: 15px;
left: 15px;
z-index: 9999999999;
padding: 15px;
border: 0px solid white;
border-radius: 25px 25px 25px 25px;
}

.refreshbutton{
width: 50px;
height: 50px;
font-size: 8px;
text-align: center;
position: fixed;
bottom: 15px;
right: 15px;
background-image: url('./images/reload.png');
background-size: 100%;
z-index:100;
padding: 15px;
border: 0px solid white;
border-radius: 25px 25px 25px 25px;
}

.bsf-btn{
margin-top: 5px;
margin-bottom: 5px;
}

.trobi_font {
font-family: 'Oleo Script', cursive;
}



.item{
height: 300px; width:320px; margin: 0px; left: -10px; ;
}

.item2{
height: 200px; width:200px; ;
}


.item_contents{

width: 97%;
height: 90%;
box-shadow:1px 1px 3px 1px #D3D3D3;
border: 1px #D3D3D3;
border-radius: 5px;
margin: auto;
margin-top:5px;
overflow: hidden;
background-repeat: no-repeat;
background-size: cover;
}
.item_photo{
background-repeat: no-repeat;
width: 100%;
height: 100px;
}

.item_info{
	color: gray;
  position: absolute;
  width: 97%;
  height: 100px;
  bottom: 30px;
background: white;
padding: 5px;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px;
overflow: hidden;
}
.item_info2{
	color: gray;
  position: absolute;
  width: 97%;
  height: 70px;
  bottom: 20px;
background: white;
padding: 5px;
font-family: Arial, Helvetica, sans-serif;
font-size: 9px;
overflow: hidden;
}


.item_title{
color: black;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
width: 70%;
float: left;
overflow: hidden;
height: 25px;
}

.item_price{
color: black;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 20px;
width: 80%;
right: 5px;
bottom: 0px;
position: absolute;
text-align: right;
overflow: visible;
}

.item_price2{
color: black;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 18px;
width: 80%;
right: 5px;
bottom: 0px;
position: absolute;
text-align: right;
}



.item_price_label{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
margin-top: 3px;
margin-right: 3px;
bottom: 4px;
float: right;
letter-spacing: 0px;
}
.item_price_amount{
color: #f42c38;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 20px;
display: inline-block;
text-align: right;
float: right;
letter-spacing: 0px;
}



.item_date{
float: left;
width: 60%;
}

.item_tour_data{
height: 290px; width:100%; margin: 0px; left: -10px; ;
}

.item_contents_tour_data{

width: 97%;
height: 88%;
box-shadow:1px 1px 3px 1px #D3D3D3;
border: 1px #D3D3D3;
border-radius: 1px;
margin: auto;
margin-top:5px;
overflow: hidden;
background-repeat: no-repeat;
}



.item_info_tour_data{
color: gray;
position: relative;
width: 100%;
height: 100px;
bottom: 30px;
background: white;
padding: 5px;
font-family: Arial, Helvetica, sans-serif;
font-size: 10px;
}

.star_rating{
background: url('star_rating.png') center ;
width: 8px;
height: 8px;
float: right;
}

.flag{
background: white url('flag_icon_20px.png') no-repeat scroll 1px 3px;
background-size: 15px 15px;
width: 15px;
height: 15px;
float: left;
margin-top: 2px;
}

.comment_text{
font-size: 9px;
color: black;
position: absolute;
right: 10px;
width: 25%;
text-align: right;
}

.textarea_trobi{
font-family: 'Poppins', sans-serif;
padding:10px;
font-size: 12px;
}

.cart{
float: left; width: 100%; height: 120px;
}
.cart_photo{
width: 30%; height: 100px;
 background-size: cover;

}

.cart_photo2{
width: 30%; height: 120px;
 background-size: cover;

}

.cart_title{
color: black;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
padding-left: 5px;
}

.cart_item{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
}

.cart_overall_price{
float: right;
font-family: Arial, Helvetica, sans-serif;
font-size: 30px;
text-align: right;
}
.cart_cancel{
color: white;
width: 40px;
font-family: Arial, Helvetica, sans-serif;
font-size: 8px;
position: absolute;
right: 5px;
background: red;
text-align: center;
}

.cart_paylater{
color: red;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
}

.cart_add2cart{
color: white;
width: 60px;
font-family: Arial, Helvetica, sans-serif;
font-size: 11px;
position: absolute;
right: 5px;
background: green;
text-align: center;
}


.tour_data_info_share{
margin-top: 10px;
width: 40px;
height: 40px;
float: right;
z-index: 99999999;
}
.tour_data_photo{
position: relative;
height: 275px;
width: 105%;
left: -10px;
}
.tour_data_info_title{
color: black;
font-family: Arial, Helvetica, sans-serif;
font-weight: bold;
font-size: 27px;
padding-top: 5px;
padding-left: 5px;
background: white;
width: 100%;
}
.tour_data_info_subtitle{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
padding-left: 5px;
background: white;
width: 100%;
}
.tour_data_info_price{
color: black;
font-family: Arial, Helvetica, sans-serif;
font-size: 30px;
padding-left: 5px;
background: white;
width: 100%;
font-weight: bold;
}
.tour_data_info_price_label{
color: #C0C0C0;
float: left;
font-size: 20px;
margin-top: 3px;
padding-top: 5px;
padding-right: 10px;
}
.tour_data_info_text{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
background: white;
width: 100%;
background-size: 15px 15px;
padding-left:20px;
}

.tour_data_info_text_slots{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
width: 100%;
background: white url(slots.png) no-repeat scroll 2px 2px;
background-size: 15px 15px;
padding-left:20px;
}

.tour_data_info_text_price_g{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
width: 100%;
background: white url(check_info_icon.png) no-repeat scroll 2px 2px;
background-size: 15px 15px;
padding-left:20px;
}


.tour_data_info_text_people{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
width: 100%;
background: white url(people.png) no-repeat scroll 2px 2px;
background-size: 15px 15px;
padding-left:20px;
}

.tour_data_info_text_voucher{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
width: 100%;
background: white url(voucher_info_icon.png) no-repeat scroll 2px 2px;
background-size: 15px 15px;
padding-left:20px;

}

.tour_data_info_text_reviews{
color: gray;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding-left: 5px;
width: 100%;
background: white url(reviews_info_icon.png) no-repeat scroll 2px 2px;
background-size: 15px 15px;
padding-left:20px;

}






.tour_data_info_details{
color: black;
font-family: Arial, Helvetica, sans-serif;
font-size: 11px;
padding-left: 5px;
background: white;
width: 100%;
}

.tour_data_info_ratings{
color: black;
font-family: Arial, Helvetica, sans-serif;
font-size: 50px;
padding-top: 5px;
padding-left: 5px;
background: white;
width: 100%;
}

.rating_stars{



}
.tour_data_info_review_button{
text-align: center;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
padding: 3px;
border: 1px solid gray;
}

.tour_data_info_itinerary{
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
padding: 10px;
background:  #f8f9f9;
}
.reviewers{
color: black;
font-family: Arial, Helvetica, sans-serif;
font-size: 11px;
padding-left: 5px;
background: white;
width: 100%;
}
.trobi_join_button{
position: fixed;
bottom: 5px;
left:5%;
width: 70%;
height: 60px;
padding: 5px;
background: white;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
text-align: center;
color: white;
border: 1px solid white;
border-radius: 3px;
box-shadow: 1px 1px 2px 2px #aaaaaa;
}
.trobi_join_button_cart, .trobi_join_button_book{
float: left;
width: 45%;
margin: 5px;
color: white;
height: 40px;
margin-top: 5px;
border: 1px solid white;
border-radius: 3px;
padding-top: 7px;
}
.trobi_join_button_cart{
background: orange;
}
.trobi_join_button_book{
background: red;
float: right;
}
.trobi_join_button_heart{
position: fixed;
bottom: 19px;
right:10%;
width: 40px;
height: 40px;
background:url(white-heart.png) no-repeat scroll 2px 2px;
background-size: 40px 40px;
}



.spacer{
width: 100%;
height: 150px;
}

.windowTop{
position: absolute; 
top: -20px;
z-index: 9999;
width: 105%;
}

.get_voucher{
position: absolute;
right: 5px;
width: 30px;
height: 30px;
background: url('voucher_sml.png') 100% ;
font-family: Arial, Helvetica, sans-serif;
font-size: 8px;
color: white;
padding: 2px;
}

#file{
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.booking{
clear: both;
padding-left: 50px;
width: 100%;
}
.booking_addpax{
font-size: 25px;
width: 65%;
float: left;
}
.booking_addpaxswitch{
font-size: 25px;
width: 10%;
padding-left: 10px;
float: left;
}

.book_calendar{
width: 100%;
height: 50px;
}

.book_m_num{
width: 40px;
height: 40px;
float: left;
background: gray;
border: 1px solid #f8f8f8;
border-radius: 20px;
padding: 6px;
color: white;
text-align: center;
}

.book_m_details{
float: right;
min-height: 20px;
width: 98%;
background:  #f8f8f8 ;
padding: 5px;
display: inline-block;
margin: 2px;
border-bottom: 1px solid gray;
}


.book_m_details_header{
float: right;
height: 40px;
width: 82%;
background:  #f8f8f8 ;
padding: 5px;
text-align: center;
color: gray;
font-size: 14px;
}


.book_m_items, .book_m_items_hylyt, .ucancel, .mcancel, .maccept{
float: left;
border: 1px solid gray;
background: gray;
padding: 5px;
padding-top: 5px;
padding-bottom: 5px;
padding-left: 10px;
padding-right: 10px;
border-radius: 5px;
color: white;
overflow: hidden;
margin-left: 2px;
margin-top: 2px;

}
.book_m_items_hylyt{
border: 1px solid #f42c38;
background: #f42c38;
}
.maccept{
border: 1px solid #3CD672; 
background: #3CD672;
}

.mcancel{
border: 1px solid #EE9AC2;
background: #EE9AC2;
}
.ucancel{
border: 1px solid #932258;
background: #932258;
}


.bookpaid{
float: right;
color: white;
font-size: 8px;
width:3px;
height: 8px;
margin-left: 2px;
}

.bookinDateHead{
width: 100%;
text-align: center;
font-size: 20px;
clear: both;
margin-bottom: 10px;
}


.bookinDateHeadButtonLeft, .bookinDateHeadButtonRight{
border: 1px solid #f8f8f8;
background: #f8f8f8;
padding-top: 4px;
padding-bottom: 1px;
padding-left: 5px;
padding-right: 10px;
border-radius:50px;
color: gray;
width: 30px;
height: 30px;
float: left;
font-size: 12px;
}
.bookinDateHeadButtonRight{
float: right;
}

.footBookinInfo{
position: fixed;
bottom: 10px;
left: 15%;
background-color: orange;
border: 5px solid white;
width: 70%;
border-radius:50px;
padding: 20px;
text-align: center;
color: white;
}

.refund_butt{

position: absolute;
right: 5px;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
color: white;
padding: 2px;
color: white;
display: inline-block;
position: absolute;
background: #f42c38;
text-align: center;
}

body{
font-family: Arial, Helvetica, sans-serif;
}

.april29_design{
display: inline-block;
}

.april29_menu_header{
width: 100%;
height: 50px;
padding: 2px;
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
margin-top: 2px;
letter-spacing: 1px;
padding-top: 10px; 
border-bottom: 3px solid #f8f8f8;
margin-bottom: 2px;
}

.april29_menu_header_back_button{
background: white url(arrow_left.png) no-repeat scroll 2px 1px;
background-size: 25px 25px;
float: left;
width: 25px;
height: 25px;
margin-right: 20px;
}


.april29_menu_title{
width: 100%;
height: 40px;
padding: 10px;
padding-left:10px;
background: #f8f8f8;
color: #bebebe;
font-family: Arial, Helvetica, sans-serif;
font-weight: normal;
font-size: 12px;
margin-top: 2px;
letter-spacing: 1px;
border-bottom: 1px solid #f8f8f8;
}
.april29_menu_items{
width: 100%;
height: 40px;
padding: 8px;
color: black;
padding-left:10px;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
font-weight: normal;
letter-spacing: 1px;
border-bottom: 1px solid #f8f8f8;
}
.go{
background: white url(arrow_right.png) no-repeat scroll 2px 2px;
background-size: 15px 15px;
float: right;
width: 20px;
height: 20px;
}

.top_spacer{
width: 100%;
height: 20px;
background: white;
}


.april29_input_text, .april29_input_text a{
width: 100%;
height: 80px;
padding: 8px;
color: black;
padding-left:10px;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
font-weight: normal;
letter-spacing: 1px;
border-bottom: 2px solid #f8f8f8;
}

.april29_textarea{
width: 100%;
display: inline-block;
padding: 8px;
color: black;
padding-left:10px;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
font-weight: normal;
letter-spacing: 1px;
border-bottom: 2px solid #f8f8f8;
}


.april29_input_box{
width: 100%;
height: 40px;
float: left;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
letter-spacing: 1px;
color: gray;
border: none !important;
border-color: transparent !important;
}

.april29_button{
width: 100%;
height: 40px;
padding: 8px;
color: black;
padding-left:10px;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
font-weight: normal;
letter-spacing: 1px;
border: none;
margin-bottom: 3px;
}
.april29_photo_box{
width: 250px;
height:250px;
border: 1px solid white;
border-radius: 250px;
overflow: hidden;
}
.tap_to_change{
border: 1px solid white;
width: 50px;
height: 50px;
border-radius: 50px;
font-family: Arial, Helvetica, sans-serif;
color: black;
position: absolute;
bottom: 100px;
left: 35%;
}

.april29_select{
width: 100%;
height: 40px;
padding: 8px;
color: black;
padding-left:10px;
font-family: Arial, Helvetica, sans-serif;
font-size: 14px;
font-weight: normal;
letter-spacing: 1px;
border: none;
margin-bottom: 2px;
}

.artdatepickerDateHead{
width: 100%;
text-align: center;
font-size: 25px;
clear: both;
margin-bottom: 10px;
}


.artdatepickerDateHeadButtonLeft, .artdatepickerDateHeadButtonRight{
border: 1px solid #f8f8f8;
background: #f8f8f8;
padding-top: 4px;
padding-bottom: 1px;
padding-left: 5px;
padding-right: 10px;
border-radius:40px;
color: gray;
width: 40px;
height: 40px;
float: left;
font-size: 20px;
}
.artdatepickerDateHeadButtonRight{
float: right;
}
.artdatepickerDays{
float: right;
height: 40px;
width: 100%;
padding-top: 7
background:  #f8f8f8 ;
padding: 5px;
display: inline-block;
margin: 2px;
border-bottom: 1px solid gray;
text-align: center;
}
#picker, #picker2{
z-index: 999999;;
}

	</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">





	
		<script>
parentFunction = function(m) {
	ajaxpagefetcher.load('window',m,true);
}
</script>
	
	
	<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/function.js" type="text/javascript"></script>

	
	
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="kyle.css"/>
<style>

 #artdatepicker, #windowPoP{
 position: absolute;
 top: 0px;
 width: 100%;
 height: 100%;
 overflow: scroll;
 z-index: 9999999999;
 background: white;
 }
#windowPoP{
position: fixed;
top: 0px;
left: 0px;
}

.info , #artdatepicker,#windowPoP{
display: none;
}


</style>
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

<link href="datepicker_nice/css/window-date-picker.css" rel="stylesheet">

<?
include("head_dev1.php");
include("head_dev2.php");
include("head_new.php");
?>



</head>
<body>
    <?
    include("body_start_dev1.php");
    include("body_start_dev2.php");
    include("body_start_new.php");
    ?>
<div class="info" id="info" onclick="hideThisItem('info')">Loading</div>
<div id="windowPoP"></div>
<div id="picker"></div><div id="picker2"></div>

<?
/*
<div class="backbutton" onclick="backButton()"></div>
*/
?>


	<!-- Page Preloder -->
	<?
	/*
	<div id="preloder">
		<div class="loader"></div>
	</div>
	*/
	?>
	<!-- Page Preloder -->



<div class="showhidemenu" onClick="javascript:ajaxpagefetcher.load('window', 'menu_mobile_new.php', true),HideMenu()" style="z-index:9999; position: absolute; top:90px; left: 20px;">  </div>







<!-- Menu icon section end -->

<div class="menu" id="menu">
  <ul>

  </ul>
</div>

<div id="ptext_container" onclick ="showHidePT()">
<div onclick ="showHidePT()" id="ptext"></div>
</div>

<?

//include("joiner_count.php");
//include ('tour_photo.php');
////window test style="position: absolute; top: 0px; z-index: 999999; "
?>
<div id="anchorTop" style="width=100%; height:1px; position: relative;" ></div>
<div id="picker" style="background: red;"></div><div id="picker2" style="background: red;"></div>



<div style="width: 100%; height: 140px;"></div>
<div id="window" >

<div style="padding: 10px; width: 100%; display: inline-block;">
<?
include("categories_main.php");
?>
</div>

<?
	include("featured_new.php");
	//include("recent_post.php");
	//include("tour_data_top_views.php");
	//include("recent_viewed.php");
	//include("tour_data.php");
	?>


</div>


<? 
if($_GET["testing"]=="yes"){
?>
<a onClick="javascript:ajaxpagefetcher.load('window', 'menu_mobile_icons.php', true),HideMenu()"> i </a>
<?
}
?>



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
      //ShowInfo(oReq.responseText);
      //informArt(oReq.responseText);
      var str = oReq.responseText;      	
		if(str.includes('success')){
      ajaxpagefetcher.load('window', thengoto, true);
      hideThisItem('windowPoP');
      }
      
    } else {
      ShowInfo("Error " + oReq.status + " occurred when trying to upload your file.");
      hidden.style.display = "block";
      hideThisItem('windowPoP');
    }
  };
	informArt(oReq.responseText);
  oReq.send(oData);
  ev.preventDefault();
}, false);
}

function hideMe(id){
var x = document.getElementById(id);
//x.style.display = "none";
x.innerHTML = "Uploading please wait <img src=\"./images/loading.gif\" width=\"20px\"> ";
hidden = x;
//ShowInfo("Uploading please wait");
}

function showMe(){
hidden.style.display = "block";
}
</script>




	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script>



(function() {
   
   //HideInfo();
   //alert("hide info now");
   
})(); 




</script>



<?
if($_GET["testing"] == "yes"){
?>
<script>
function informArt(url){ alert(url); }
</script>
<?
} else{
?>
<script>
function informArt(url){}
</script>
<?
}
?>

<script type="text/javascript" src="art.js"></script>
<script type="text/javascript" src="smoothscrolltoelement.js"></script>	

<script src="datepicker_nice/js/window-date-picker.js"></script>
    <script>

$('.owl-carousel').owlCarousel({
    margin:0,
    loop:true,
    autoWidth:true,
    items:10
})


var dateUrlPostTarget;
var bookin;
var isBooking;
var numPaxAdult = Number(0);
var numPaxChild = Number(0);
var date_begin = ""; //see date picker
var date_end = ""; //see date picker
var date_total=Number(1);
var price =Number(0);
var req_dp =Number(0);
var pax_add=Number(0);


var newID;
var newID2;

function getDate(id, isItBooking){
	isBooking = isItBooking;
  const picker = new WindowDatePicker({
    el: '#picker',
    toggleEl: document.getElementById(id),
    inputEl: document.getElementById(id),
    inputToggle: true,
    dateType: "MM-D-YYYY",
    type: 'DATE'
});
	newID = id;	
		  informArt(newID);		  
}

function getDate2(id, isItBooking){
	isBooking = isItBooking;
  const picker = new WindowDatePicker({
    el: '#picker2',
    toggleEl: document.getElementById(id),
    inputEl: document.getElementById(id),
    inputToggle: true,
    dateType: "MM-D-YYYY",
    type: 'DATE'
});
	newID2 = id;		
}


document.getElementById('picker').addEventListener("click", function(){
  var val = document.getElementById(newID).value;
  var val2 = '&'+ newID +'='+val;
  informArt(val2);
  		  if(isBooking !="yes"){
			addtoPost(val2);	  
		  }
  calculateDateDays(val2);
  enableBookingButton();
});

document.getElementById('picker2').addEventListener("click", function(){
  var val = document.getElementById(newID2).value;
  var val2 = '&'+ newID2 +'='+val;
  //addtoPost(val2);
  informArt(val2);
  calculateDateDays(val2); 
  enableBookingButton(); 
});








function countPax(id,n,tao){
var p = document.getElementById(id).children; 
		//alert(p[0].id);		
		
		if(tao=="numPaxAdult"){		
			if(n == "add"){
				numPaxAdult = numPaxAdult + 1;
			}else{
				numPaxAdult = numPaxAdult - 1;
			}
				if(numPaxAdult < 0){
				numPaxAdult = 0;
				}
				
				if(numPaxAdult > 4){
				numPaxAdult = 4;
				}
				
				
				p[0].innerHTML="Adult "+numPaxAdult;
		}
		
		
		if(tao=="numPaxChild"){		
			if(n == "add"){
				numPaxChild = numPaxChild + 1;
			}else{
				numPaxChild = numPaxChild - 1;
			}
				if(numPaxChild < 0){
				numPaxChild = 0;
				}
				
				if(numPaxChild > 4){
				numPaxChild = 4;
				}
				
				
				p[0].innerHTML="Children "+numPaxChild;
		}		
		reCalc();
}


var dateNow = Number(0);
function calculateDateDays(v){
	var x = v.split("=");

	if(v.includes("from")){							
	date_begin = x[1];
	//ShowInfo('date_from '+ date_begin);	
	dateNow = new Date();
	}
	
	if(v.includes("to")){		
	date_end = x[1];
	//ShowInfo('date_to '+date_end);
	dateNow = new Date();
	}
	
	calculateDateDaysNow();

//date_begin
//date_end

}

function calculateDateDaysNow(){

if(date_begin !="" && date_end !=""){

var x = date_begin.split("/");
var y = date_end.split("/");
var d1 = new Date(x[2],x[1]-1,x[0]);
var d2 = new Date(y[2],y[1]-1,y[0]);



var d3 = Number(d2) - Number(d1);
if(d3 <= 0){ d3 = 86400000;} 
var d4 = d3/86400000;
date_total = d4;
if(date_total < 0){
date_total = 1;
}
//informArt("d1:"+ d1 +", d2:"+ d2 + ", d3:"+d3);

//informArt(date_begin + date_end);



if(dateNow > d1){
ShowInfo("Date can't be today or earlier than today");
informArt("Date can't be today or earlier than today");
disableBookingButton();
return;
} else{
reCalc();
}

if(d1 > d2){
ShowInfo("Please check the date");
informArt("Please check the date");
disableBookingButton();
return;
} else{
reCalc();
}


if(d1 == d2){
ShowInfo("Please check the date");
informArt("Please check the date");
disableBookingButton();
return;
} else{
reCalc();
}
} 

}


function setBookInfo(id,p,d,add){		
price = p;
req_dp = d;
pax_add = add;
//ShowInfo(price);
bookin = document.getElementById(id).children;
reCalc();
isBooking ="yes";
}

function reCalc(){
var t = Number(numPaxAdult  * pax_add);
var t1 = Number(numPaxChild * pax_add);

if(isBooking =="yes"){
addtoPost("&additional_pax_cost=" + (t + t1));
addtoPost('&date_from='+date_begin);
addtoPost('&date_to='+date_end);
}
var t2 = t + t1 + Number(price); 
var t3 = date_total * t2;
var req_dp;
totalIt(t3);
//bookin[0].innerHTML = 't='+t + ": t1="+t1 +": t2="+ t2  ;
enableBookingButton();
}


function totalIt(newprice){
bookin[0].innerHTML = "Total price <br>Php "+ newprice  ;
addtoPost("&price="+newprice);
var addpax = numPaxAdult + numPaxChild;
addtoPost("&additional_pax="+addpax);

}

function enableBookingButton(){

if(date_begin != "" && date_end !="" ){
//informArt(date_begin + date_end);

bookin[10].style.display = "none";
bookin[11].style.display = "block";
} else{
disableBookingButton();
}
}

function disableBookingButton(){
bookin[10].style.display = "block";
bookin[11].style.display = "none";
}

</script>
<?
include("body_end.php");
include("body_end_dev1.php");
include("body_end_dev2.php");
include("body_end_dev3.php");
?>

</body>
</html>