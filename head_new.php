<?        
 //if($_GET["m"]=="mobile" || $_SESSION["m"]=="mobile"){ 
 //$_SESSION["m"]="mobile";
 ?>
       <style>
 body{
background: white;
font-family: Arial;
}
#footer, .header_top_area{
display: none;
}
.top_spacer{
width: 100%;
height: 150px;
}

.feature_add_area, shop_header_area, .c_main_title{
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


</style>   
<?
//} else {
?>



<style>
 bodyx{
background: rgb(255,245,238);
background: linear-gradient(180deg, rgba(255,245,238,1) 0%, rgba(255,255,255,1) 15%, rgba(255,255,255,0.8) 90%, rgba(255,245,238,0.5) 100%);
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


</style>

<?
//}
?>


<style>



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
background: rgba(64,64,64, 0.9) url(./images/loading.gif) no-repeat center center; 
background-size: 10%;
color: white;
z-index:99999;
}        

 



.backbutton{
width: 50px;
height: 50px;
font-size: 8px;
text-align: center;
position: fixed;
top: 15px;
left: 15px;
background-image: url('backbutton.png');
background-size: 100%;
z-index: 9999999999;
padding: 15px;
border: 0px solid white;
border-radius: 25px 25px 25px 25px;
}

#window{
margin-left: 0 auto !important;
display: inline-block;
width: 100%;
padding: 10px;
background: white;
} 


@media screen and (max-width: 600px) {

#window{
position: relative;
width: 100%;
padding: 0px;
} 

} 

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

