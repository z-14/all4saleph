<script type="text/javascript" src="smoothscrolltoelement.js"></script>

<script>
$('.owl-carousel').owlCarousel({
    margin:0,
    loop:true,
    autoWidth:true,
    items:10,
    autoplay: true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn'
})
</script>


<?
if($_GET["platform"]=="android"){
?>
<script>
var platform="android";
</script>
<?
} else{
?>
<script>
var platform="desktop";
</script>
<?
}
?>



<?



if($_GET["m"]=="mobile"){
?>
<script>

function getdataFB(){
	informArt("getdataFB");	
	window.location.href = 'magetech://getdataFB?&fb'; 
    ajaxpagefetcher.load('window', 'home.php', true);		    
}


var oneSignalID;
var oneSignalIDKey;

function setoneSignal(key){
	oneSignalIDKey = key;
	if(oneSignalIDKey==""){
	oneSignalIDKey = key;
	//ShowInfo('key initiated' + oneSignalIDKey);
	}else{
	//ShowInfo('no key oneSignal' + key);
	}	
}
 
 
 function doLog(){
 	//alert('logging in');
 	//ShowInfo('Setting push' + oneSignalIDKey);
	oneSignalGetData("&key="+oneSignalIDKey,'onesignalgetuserinfo.php');
//	ajaxpagefetcher.load('window', 'home.php', true);
}

function oneSignalGetData(data,urltarget) {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("popup").style.display = inline;
	//     document.getElementById("info").innerHTML = this.responseText;
     //alert(this.responseText);
     ShowInfo("Setting up push");    
      oneSignalID = this.responseText;
                               
     	ajaxpagefetcher.load('menu', 'menu_mobile.php', true);
	ajaxpagefetcher.load('window', 'home.php', true);
      window.location.href = 'magetech://SetOneSignal?&id=' + oneSignalID; 
    } 
    
  	};
  
  xhttp.onerror = function() {

	};
  
  xhttp.open("POST", urltarget + "?" + data, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
	

}


function Logout(){
ShowInfo("Logging out...");
postIt("logout.php");
	ajaxpagefetcher.load('window', 'home.php', true);
window.location.href = 'magetech://SetOneSignal?&id=' + 0; 
}

function LogoutHome(){
window.location.href = 'https://all4sale.ph/?m=mobile';
}


function backButton(){
pH.splice(pH.length - 1,1);
var pgs = pH.join();
var n = pH.length;
n--;
var pg = pH[n]; 
if(pg == undefined){
window.location.href = 'https://all4sale.ph/?m=mobile';
} else{
ajaxpagefetcher.load('window', pg , true);
}
}


    var w = $(window), d = $(document);
   var load_num = 0;
    w.scroll(function() {
       if(w.scrollTop() + w.height() == d.height())
       {
          informArt("You have hit the bottom!");
          UnliScrollLoadProduct("div", load_num++);
          //loadPageNaArt();
       } 
    });


function UnliScrollLoadProduct(div, n) {
//alert(div + n);
  var node = document.createElement(div);
  node.setAttribute("id", "newDiv" + n);
  node.setAttribute("class","scrolldiv");
  
  
  var textnode = document.createTextNode("Water");
  node.appendChild(textnode);
  document.getElementById("UnliScroll").appendChild(node);
  ajaxpagefetcher.load('newDiv' + n, 'showmore.php?p='+n);
  //ajaxpagefetcher.load('newDiv' + n, 'products_unliscroll.php?p='+n);
  //loadPageNaArt();
}

function goHome(){
ajaxpagefetcher.load('menu', 'menu_mobile.php', true);	
}


</script>
<?
} 
else
{
?>
<script>

setInterval(function(){ checkNotifArt() }, 60000);

function checkNotifArt(){
	//informArt('Yey');
	ajaxpagefetcher.load('popNotifArt', 'notif_pop_art.php', true);
}


function getdataFB(){
	FB.login();		    
}


 function goFB(d){
 SendPost('&d='+ d, 'processlogin_web_fb.php');
 }


function doLog(){
	//informArt("dolog");
	//ajaxpagefetcher.load('menu', 'menu_mobile.php', true);
	//ajaxpagefetcher.load('window', 'home.php', true);
	//alert("doLog");
	setTimeout(function(){goHome()}, 2000);
	//setTimeout(goHome(), 3000); 
	//var footer = document.getElementById("footer");
	//footer.style.display = "none";
}

function goHome(){
window.location.href = 'https://all4sale.ph/?set=yes';	
}

function Logout(){
	ShowInfo("Logging out...");
	//if(MyAccessToken !=""){ alert('fblogout'); LogoutFB();}
	//logoutInFB();
	//LogoutFB();
	setTimeout(function(){LogoutSite()}, 3000);
}

function LogoutFB(){
window.open("https://m.facebook.com/logout.php?h=AffcKuegrzs9pU7g&t=1559872676&button_name=logout&button_location=footer&source=mbasic_logout_button&ref_component=mbasic_footer&ref_page=XMenuController", "fbframe");
}
function LogoutSite(){
alert("logging out");
window.location.href = 'https://all4sale.ph/logout.php'; 
}

function backButton(){
pH.splice(pH.length - 1,1);
var pgs = pH.join();
var n = pH.length;
n--;
var pg = pH[n]; 
if(pg == undefined){
window.location.href = 'https://all4sale.ph/?set=yes';
} else{
ajaxpagefetcher.load('window', pg , true);
}
}


 var load_num = 0;
 
 function UnliScrollLoadProduct() {	
	
	load_num++;
	//alert('hey');
	
  var node = document.createElement('div');
  node.setAttribute("id", "newDiv" + load_num);
  node.setAttribute("class","scrolldiv");
  
  
  var textnode = document.createTextNode("Water");
  node.appendChild(textnode);
  document.getElementById("UnliScroll").appendChild(node);
  ajaxpagefetcher.load('newDiv' + load_num, 'products_unliscroll.php?p='+load_num);

}

function hideUnliLoading(){

document.getElementById("UnliLoading").style.display = "none";	
} 


// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50) {
    document.getElementById("backbutton").style.width = "10px";
    document.getElementById("backbutton").style.height = "10px";
    document.getElementById("backbutton").style.opacity = "0.5";
    
    document.getElementById("menu").style.position = "fixed";
    document.getElementById("menu").style.zIndex = "100";
    document.getElementById("menu").style.width = "100%";
    document.getElementById("menu").style.top = "0";
    //document.getElementById("menu").style.background = "rgb(255,245,238)";
    document.getElementById("art_search_input").style.color="##F0F0F0";
    document.getElementById("art_search_input").style.border = "1px solid #E0E0E0";
    document.getElementById("art_search").style.zIndex = "200";
    document.getElementById("art_search").style.position = "fixed";
    document.getElementById("art_search").style.top = "20px";
    document.getElementById("art_search").style.right = "20px";
    document.getElementById("art_search").style.width = "40%";
    
  } else {
    document.getElementById("backbutton").style.width = "5px";
    document.getElementById("backbutton").style.height = "5px";
    document.getElementById("backbutton").style.opacity = "0.2";
    document.getElementById("menu").style.position = "relative";
     document.getElementById("menu").style.zIndex = "100";
      //document.getElementById("menu").style.background = "rgb(255,245,238)";
      document.getElementById("art_search_input").style.color="gray";
      document.getElementById("art_search_input").style.border = "1px solid #F0F0F0";
      document.getElementById("art_search").style.zIndex = "100";
      document.getElementById("art_search").style.position = "relative";
      document.getElementById("art_search").style.width = "100%";
      document.getElementById("art_search").style.top = "0px";
      
      
      
  }
  
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
  document.getElementById("menu").style.background = "white";
   
  }
  
}
</script>

<?
}
?>