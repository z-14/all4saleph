<?        
 if($_GET["m"]=="mobile" || $_SESSION["m"]=="mobile"){ 
 $_SESSION["m"]="mobile";
 ?>
       <style>
 body{
background: white;
font-family: Arial;
}
.top_spacer{
width: 100%;
height: 150px;
}

#footer, .header_top_area, .feature_add_area, shop_header_area, .c_main_title{
display: none;
}

#windowPoP{
top: 0px;
left: 0px;
position: fixed;
z-index: 1120;
width: 100%;
height: 100%;
overflow: scroll;
background: white;
display: none;
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
background: gray;
color: white;
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

#art_header{
top:0px;
left: 0px;
width: 100%;
height: 130px;
position: fixed;
z-index: 1000;
color: white;
clear: both;
background-image: url(greentelcom.jpg) ;
background-size: 80% 80%;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center; 
background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(142, 37, 37,0.6) 0%, rgba(255,0,0,1) 75%, rgba(255,0,0,1) 100%);
transition: 0.6s;
}
.art_header_img{
max-width: 100%;
height: 100px;
object-fit: cover;
}

#cute_icons{
z-index: 1002;
position: absolute;
top: 55px;
left: 6%;
display: inline-block;
width: 85%;
height: 40px;
}


#art_search{
width: 75%;
float: left;
margin-right: 3px;
}
#art_search input{
padding: 3px;
width: 100%;
height: 35px;
background: white url(search_icon_smaller.png) no-repeat scroll 6px 6px;
padding-left:30px;
border: 2px solid white;
border-radius: 3px;
}


#art_sale, #art_favorites{
width: 30px;
height: 30px;
float: left;
margin: 3px;
background: url(heart_icon_white.png) no-repeat;
background-size: 25px 25px;
}
#art_sale{
background: url(price_tag.png) no-repeat;
background-size: 25px 20px;
}


#art_tabs{
width: 100%;
height: 30px;
clear: both;
position: absolute;
bottom: 0px;
z-index: 1004;
}


.art_tabs_title{
width: 25%;
float: left;
height: 30px;
text-align: center;
}




.messaging_textarea{
resize: none;

}

.card{
width: 100%;
}

    .info, .uploading{
display: none;
background-color:white ;
width: 100%;
height: 100%;
font-size: 16px;
text-align: center;
position: fixed;
top: 0px;
bottom: 0px;
left: 0px;
z-index:1100;
padding: 15px;
background: white url(cart-loading.gif) no-repeat center center; 
background-size: 40%;
color: red;
z-index:99999;
}

</style>   
<?
} else {
?>



<style>
 body{
background: white;
}
.top_spacer{
display: none;
}

#art_header{
top:0px;
left: 0px;
width: 100%;
height: 130px;
position: fixed;
z-index: 1000;
color: white;
clear: both;
background-image: url(greentelcom.jpg) ;
background-size: 80% 80%;
background-repeat: no-repeat;
background-attachment: fixed;
background-position: center; 
background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(142, 37, 37,0.6) 0%, rgba(255,0,0,1) 75%, rgba(255,0,0,1) 100%);
transition: 0.6s;
}
.art_header_img{
max-width: 100%;
height: 100px;
object-fit: cover;
}

#cute_icons{
z-index: 1002;
position: absolute;
top: 55px;
left: 6%;
display: inline-block;
width: 85%;
height: 40px;
}


#art_search{
width: 100%;
float: left;
margin-right: 3px;
transition: 0.6s;
}
#art_search_input{
padding: 3px;
width: 80%;
height: 35px;
background: white url(search_icon_smaller.png) no-repeat scroll 6px 6px;
padding-left:30px;
border: 1px solid gray;
border-radius: 1px;
}


#art_sale, #art_favorites{
width: 40px;
height: 40px;
float: left;
margin: 3px;
background: url(price_tag_red.png) no-repeat;
background-size: 30px 25px;
}
#art_favorites{
background: url(heart_icon_white.png) no-repeat;
}


#art_tabs{
width: 100%;
height: 30px;
clear: both;
position: absolute;
bottom: 0px;
z-index: 1004;
}


.art_tabs_title{
width: 25%;
float: left;
height: 30px;
text-align: center;
}
.selectpicker{

width: 100%;

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
z-index:1100;
padding: 15px;
background: white url(loading2.gif) no-repeat center center; 
background-size: 30%;
color: red;
z-index:99999;
}

</style>

<?
}
?>


<style>



        

 

#menu{
transition: 0.6s;

}

.backbutton{
width: 50px;
height: 50px;
font-size: 8px;
text-align: center;
position: fixed;
top: 5px;
left: 5px;
background-image: url('backbutton.png');
background-size: 100%;
z-index: 9999999999;
padding: 15px;
border: 0px solid white;
border-radius: 25px 25px 25px 25px;
transition: 0.6s;
}

#top_cute_menu{
width: 100px;
height: 30px;
position: fixed;
top: 15px;
left: 15px;
z-index: 9999999999;
} 
.top_cute_menu_icon{
width: 50px;
height: 30px;
text-align: center;
float: left;
}

#backbutton{
background-image: url('backbutton.png');
background-size: 100%;
border: 0px solid white;
border-radius: 25px 25px 25px 25px;
overflow: hidden;
padding: 15px;
font-size: 8px;
width: 30px;
}


#window{
margin-left: 0 auto !important;
display: inline-block;
width: 100%;
padding: 10px;
background: white;
} 

.item_carousel{
height: 450px; width:320px; margin: 0px; left: -10px; ;
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
  height: 90px;
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
a{
color: red;
}

@media screen and (max-width: 600px) {

#window{
position: relative;
width: 100%;
padding: 0px;
} 

} 

#success_mobile{
display: none;
}

#popNotifArt{
position: fixed;
top: 150px;
left: 15px;
width: 1px;
height: 1px;
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

