var date ="";  
var Newdata="";        
var toPost = [];
var readytoPost ="";


var day;
var month;
var year;
var dateVar;

function addtoDate(what, value){
if(what == "day"){ day = value; }
if(what == "month"){ month = value; }
if(what == "year"){ year = value; }
if(what == "dateVar"){ dateVar = value;}
		if(day!= null && month != null &&  year != null){
		addtoPost("&"+dateVar+"="+ month+"-"+ day +"-"+ year );
			dateVar=null;day=null;month=null;year=null;
		}
}

function processDate(table_item){	//alert("&"+table_item+"="+ month+"-"+ day +"-"+ year );
	addtoPost("&"+table_item+"="+ month+"-"+ day +"-"+ year );
}



function setDate(d){
//alert(d);
date = d;
var dateData =  Newdata + date;
//alert(dateData); 
addtoPost(dateData);
}


function addtoPost(d){
var t=0;
//var d2 = d.replace(",","-comma-");
var d2 = d.replace(/&/g,function (match) {
  t++;
  return (t > 1) ? " and " : match;
});
//informArt(d2);
toPost.push("&" + d2);
var toPostNew = toPost.join();
//readytoPost = toPostNew.replace(",", "&");
readytoPost = toPostNew.replace(new RegExp(',', 'g'), '&');
//ShowInfo(readytoPost);
//alert(readytoPost);
informArt(readytoPost);
document.getElementById("art_header").style.opacity="1.0";
}

function checkInput(str){
var res = str.split("=");
validateInput(res[0],res[1]);
}

function validateInput(key,val){
var numbers = ["telephone_number","mobile_number"];
if(numbers.indexOf(key)){
	if(isNaN(val)){
		//ShowInfo("please input numbers only");
	}
}
}


function addtoPostConfirm(d){
var r = confirm("Are you sure you want to proceed on this request!");
    if (r == true) {
        var toPostNew = toPost.join();
		readytoPost = toPostNew.replace(new RegExp(',', 'g'), '&');
		informArt(readytoPost);
    } else {
        //alert(cancelled);
    }
document.getElementById("art_header").style.opacity="1.0";
}

function postIt(url){
	informArt(url);
	SendPost(readytoPost,url);
	//setTimeout(ClearPost(), 5000);
} 

var goingTo = "";
function postItGoTo(url, GoTo){
	goingTo = GoTo;
	informArt(url);
	SendPostGoTo(readytoPost,url,GoTo);
	setTimeout(ClearPost(), 2000);
}



function postItData(data,url){
addtoPost(data);
setTimeout(SendPost(readytoPost,url), 1000);
}


function postItDataGoTo(data,url,GoTo){

	goingTo = GoTo;
	addtoPost(data);
	setTimeout(SendPost(readytoPost,url), 1000);
}          
          
function SendPost(data, urltarget) {

//alert('data='+data + ': url='+urltarget);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("popup").style.display = inline;
	//     document.getElementById("info").innerHTML = this.responseText;
     //alert(this.responseText);
     ShowInfo(this.responseText);
     informArt(this.responseText);
    }else{
    //setTimeout(reSendPost(data,urltarget), 2000);
    //ShowInfo("Internet connection or server request overload please try again later");
    ShowInfo(this.responseText);
    informArt(this.responseText);
    }
    
  	};
  
  xhttp.onerror = function() {
  ShowInfo("Internet connection or server request overload please try again later");
	};
  
  xhttp.open("POST", urltarget + "?" + data, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
	
	anchorIt('menu');
document.getElementById("art_header").style.opacity="1.0";
}

function SendPostGoTo(data, urltarget,GoTo) {
goingTo = GoTo;
//alert('data='+data + ': url='+urltarget);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("popup").style.display = inline;
	//     document.getElementById("info").innerHTML = this.responseText;
     //alert(this.responseText);
     ShowInfo(this.responseText);
     ajaxpagefetcher.load('window', GoTo, true);
    }else{
    //setTimeout(reSendPost(data,urltarget), 2000);
    //ShowInfo("Internet connection or server request overload please try again later");
    ShowInfo(this.responseText);
    ajaxpagefetcher.load('window', GoTo, true);
    }
    
  	};
  
  xhttp.onerror = function() {
  ShowInfo("Internet connection or server request overload please try again later");
	};
  
  xhttp.open("POST", urltarget + "?" + data, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
	
	anchorIt('menu');
	document.getElementById("art_header").style.opacity="1.0";
}



function SendPostGoToConfirm(data, urltarget, GoTo) {
var r = confirm("Are you sure you want to proceed on this request!");

if (r == true) {
//alert('data='+data + ': url='+urltarget);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     //document.getElementById("popup").style.display = inline;
	//     document.getElementById("info").innerHTML = this.responseText;
     //alert(this.responseText);
     ShowInfo(this.responseText);
     //informArt(this.responseText);
     ajaxpagefetcher.load('window', GoTo, true);
    }else{
    //setTimeout(reSendPost(data,urltarget), 2000);
    //ShowInfo("Internet connection or server request overload please try again later");
     ajaxpagefetcher.load('window', GoTo, true);
    }
    
  	};
  
  xhttp.onerror = function() {
  ShowInfo("Internet connection or server request overload please try again later");
	};
  
  xhttp.open("POST", urltarget + "?" + data + readytoPost, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
	
	anchorIt('menu');
	}
document.getElementById("art_header").style.opacity="1.0";
}




function reSendPost(d,t){
	SendPost(d,t);

}


function ClearPost(){
	toPost = [];
	toPost.length = 0;	
	
	//var element = document.getElementsByClassName("collapse navbar-collapse");
	//element[0].classList.toggle("collapse navbar-collapse show"); 
	
	
}


function ShowInfo(i){
		
		if(i.includes("logging in...")){
			doLog();
			//alert("logging in");
			//informArt("logging in");
		}
		
		

				
		
	var x = document.getElementById("info");
	x.style.display = 'block';
	x.innerHTML = "<br><br>" +i;
	//setTimeout(HideInfo, 2000);
	
	var str = i.search("uccess");
		if(str > 0){						
			ClearPost();
			//informArt("Success!!!");
			showThisItem('windowPoP');
			setTimeout(HideInfo, 2000);
				
			if(goingTo==""){
			ajaxpagefetcher.load('windowPoP', 'success.php', true);
			} else{
			ajaxpagefetcher.load('windowPoP', goingTo, true);
			}		
			


		}else{
			setTimeout(HideInfo, 2000);
		}
	
	goingTo="";
}

function HideInfo(){
		document.getElementById("info").innerHTML = "";
		var x = document.getElementById("info");
		x.style.display = 'none';
}


function reLoad(m){
ClearPost();
setTimeout(ajaxpagefetcher.load('window',m,true), 5000);
ClearPost();
}

var searchString;
function addSearchItem(s){
	searchString = s;	
}

function goSearch(){
	ajaxpagefetcher.load('window', searchString , true);
}

      


function ShowHideMenu() {
	//alert("showhidemenu");
	if(window.innerWidth < 500){	
    var x = document.getElementById("menu");
    if (x.style.display === "none") {
    		//ajaxpagefetcher.load('menu', 'menu_mobile.php', true);
       	 	x.style.display = "block";
    	} else {
        	x.style.display = "none";
    	}
    }
}

function HideMenu() {	
    document.getElementById("menu").style.background="white";
    document.getElementById("art_search_input").style.border="1px solid red";
    
    
       // x.style.display = "none";

}


function jsUpdateSize(){
    // Get the dimensions of the viewport
    var width = window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;
    var height = window.innerHeight ||
                 document.documentElement.clientHeight ||
                 document.body.clientHeight;

   // document.getElementById('info').innerHTML = width + " : " + height;  // Display the width
	var x = document.getElementById("menu");
	if(width < 500){
	//x.style.display = "none";
	}
	if(width > 500){
	x.style.display = "block";
	}

}
window.onload = jsUpdateSize;       // When the page first loads
window.onresize = jsUpdateSize;

function OpenSubMenu(o){
	
	var c = o.childNodes;
	if (c[1].style.display === "none") {
        c[1].style.display = "block";
    } else {
        c[1].style.display = "none";
    }

}



function removeFoot(){
	var footer = document.getElementById("footer");
	footer.style.display = "none";
}








var pH = [];
var requestedPage="";
var pagenum=0;

function pageHistoryBack(p){
var n = pH.length - 1;
informArt(pH[n] + p);
if(p != pH[n]){
pH.push(p);
var pgs = pH.join();
requestedPage=p;
}



}


var excludedPages = ['success','menu_mobile','menu_mobile_new'];

function pageHistory(p){
var pp = p.split(".php");

var inc = excludedPages.includes(pp[0]);
if(inc == true){
//ShowInfo('true' + pp[0]);
return;
}

if(pp[0] =="notif_pop_art"){
informArt('notif_pop_art');
} else{
ShowInfo('');
}


//ShowInfo('false' + pp[0]);
var n = pH.length - 1;
//informArt(pH[n] + p);
if(p != pH[n]){
pH.push(p);
var pgs = pH.join();
requestedPage=p;
}
document.getElementById("art_search_input").style.border="1px solid gray";

}


var requestedPage;

function refreshButton(){

var inc = excludedPages.includes(pp[0]);
if(inc == true){
//ShowInfo('true' + pp[0]);
return;
}

if(requestedPage !="" && requestedPage!="menu_mobile.php"){
ajaxpagefetcher.load('window', requestedPage , true);
//ShowInfo(requestedPage);
	}
	
}




function WaitThenOpenPage(p){
setTimeout(ajaxpagefetcher.load('window', requestedPage , true), 4000);
//alert(p);
}


		function getDate(data){
		var datediv = document.getElementById("date");
		datediv.style.display = "block";
		Newdata = data;
		}
		
		function closeDateBox(){
		var datediv = document.getElementById("date");
		datediv.style.display = "none";
		}
		
		var activeObj ="";
		function makeActive(n){
		activeObj = n;
		}
		function maskDate(o, n){
		if(activeObj == n){
		o.value = date;
		}
		}

 function HideMenuNow(){
 	var n = "ohhhh";
 }
  

function anchorIt(x){
// Scroll to a certain element
	if(platform == "android"){
		document.querySelector('#' + x).scrollIntoView({ 
  			behavior: 'smooth' 
		});
		document.getElementById("art_header").style.opacity="0.1";
	} 
}

function anchorScrollIt(){
	setTimeOut(anchorScrollItNow(),2000);
		informArt('scrollTop');
}

function anchorScrollItNow(){
// Scroll to a certain element
		document.querySelector('#art_header').scrollIntoView({ 
  			behavior: 'smooth' 
		});
}

function toggleClass(i){

/*
	var element = document.getElementById(i);
    element.classList.toggle("inedit");
*/
}

function showPass(x) {
/*

    var y = document.getElementById("ptext");
    y.style.display = "block";
    y.innerHTML = x;
    var z = document.getElementById("ptext_container");
    z.style.display = "block";
*/

}

function showHidePT(){
	var y = document.getElementById("ptext_container");
    if (y.style.display === "none") {
        y.style.display = "block";
    } else {
        y.style.display = "none";
    }
}

function hidePT(){
	var y = document.getElementById("ptext_container");
        y.style.display = "none";
    
}



function popwin(url){
	var p = document.getElementById("popwin");
	p.style.display = "inline-block";
	ajaxpagefetcher.load('popwin', url, true);
}

function closePopWin(){
	var p = document.getElementById("popwin");
	p.style.display = "none";
}


function postItSaveData(url){
	//window.location.href = 'uniwebview://savedata?&' + readytoPost;
	setTimeout(SendPost(readytoPost,url), 3000);
} 


 






function OpenMsgr(fb_name){	
	window.location.href = 'magetech://OpenMsgr?&fb_name=' +fb_name; 
}

function FbShareIt(photolink){
informArt(photolink);
window.location.href = 'magetech://FbShare?&photolink=' +photolink;
}


function  whichPage(pageurl){
		
		document.body.style.background = "white";
		
		
		var element = document.getElementById("window");
  
		var n = pageurl.search("art_product_highlight.php");				

		if(n == 0){						
		//informArt(n +"-"+ pageurl);
		anchorIt("info");
		setTimeout(element.classList.add("windowTop"), 2000); 
			
		}else{

		element.classList.remove("windowTop");	
		}


}

function showPhotoLoader(){

}

function AnimateArt(t){
	var bg = t.style.background;
	t.style.background = "white";
	AnimateArtBack(t,bg);
	//setTimeout(	t.style.background = bg, 3000);
}

function AnimateArtBack(t,bg){
alert(t + bg);
//t.style.background = bg;
}

function showThisItem(id){
document.getElementById(id).style.display = "block";
}

function hideThisItem(id){
document.getElementById(id).style.display = "none";
}

function showArtheader(){
document.getElementById("art_header").style.opacity="1.0";
}


var chatNow = "";
function startChat(pg){
chatNow = "yes";
}

setInterval(goChat(pg),10000);

function goChat(pg){
if(chatNow =="yes"){
ajaxpagefetcher.load('window', pg, true);
}
informArt('chatNow');
}


function OnEnterPostIt(postPage){
var x = event.charCode || event.keyCode;
if(x == "13"){
postIt(postPage);
}
}


