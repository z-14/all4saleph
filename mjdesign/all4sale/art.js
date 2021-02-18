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
if(what == "dateVar"){ dateVar = value}
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
var d2 = d.replace(","," ");
toPost.push(d2);
var toPostNew = toPost.join();
//readytoPost = toPostNew.replace(",", "&");
readytoPost = toPostNew.replace(new RegExp(',', 'g'), '&');
//ShowInfo(readytoPost);
//alert(readytoPost);
informArt(readytoPost);
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
}

function postIt(url){
	informArt(url);
	SendPost(readytoPost,url);
	//setTimeout(ClearPost(), 5000);
} 


function postItGoTo(url, GoTo){
	informArt(url);
	SendPostGoTo(readytoPost,url,GoTo);
	setTimeout(ClearPost(), 2000);
}

function postItGoBack(url){
	informArt(url);
	SendPostGoTo(readytoPost,url,GoTo);
	setTimeout(ClearPost(), 2000);
}

function postItData(data,url){
addtoPost(data);
setTimeout(SendPost(readytoPost,url), 1000);
}

function postItDataGoTo(data,url,GoTo){
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
     
    }else{
    //setTimeout(reSendPost(data,urltarget), 2000);
    //ShowInfo("Internet connection or server request overload please try again later");
    ShowInfo(this.responseText);
    }
    
  	};
  
  xhttp.onerror = function() {
  ShowInfo("Internet connection or server request overload please try again later");
	};
  
  xhttp.open("POST", urltarget + "?" + data, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(data);
	
	anchorIt('menu');
}

function SendPostGoTo(data, urltarget,GoTo) {

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
}




function reSendPost(d,t){
	SendPost(d,t);

}


function ClearPost(){
	toPost = [];
	toPost.length = 0;
}


function ShowInfo(i){
		if(i.trim()=="logging in..."){
			doLog();
			ClearPost();
		}
		
		if(i.includes("success") || i.includes("Success")){						
			ClearPost();
		}
		
		
	var x = document.getElementById("info");
	x.style.display = 'block';
	x.innerHTML = i;
	setTimeout(HideInfo, 2000);
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
    //var x = document.getElementById("menu");
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
	//x.style.display = "block";
	}

};
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

function doLog(){
	ajaxpagefetcher.load('menu', 'menu_mobile.php', true);
	ajaxpagefetcher.load('window', 'blank.php', true);
	//setTimeout(goHome(), 3000); 
	//ajaxpagefetcher.load('mainbanner', 'mainbanner.php', true);
	//var footer = document.getElementById("footer");
	//footer.style.display = "none";
}

function removeFoot(){
	var footer = document.getElementById("footer");
	footer.style.display = "none";
}

function Logout(){
postIt("logout.php");
ShowInfo("Logging out...");
setTimeout(ClearPost(),
ajaxpagefetcher.load('menu', 'menu_mobile.php', true),	
ajaxpagefetcher.load('window', 'blank.php', true)
, 3000);
//setTimeout(goHome(), 3000); 
//document.getElementById("mainbanner").innerHTML = "";
//var footer = document.getElementById("footer");
//footer.style.display = "block";

}






var pH = [];
var requestedPage="";
var pagenum=0;

function pageHistory(p){
var n = pH.length - 1;
//informArt(pH[n] + p);
if(p != pH[n]){
pH.push(p);
var pgs = pH.join();
requestedPage=p;
}
}

function backButton(m){
pH.splice(pH.length - 1,1);
var pgs = pH.join();
var n = pH.length;
n--;
var pg = pH[n]; 
if(pg == undefined){
if(m=="mobile"){
window.location.href = 'https://aturservice.ph/?m=mobile';
}else{
window.location.href = 'https://aturservice.ph/';
}
} else{
ajaxpagefetcher.load('window', pg , true);
}
}

var requestedPage;

function refreshButton(){
if(requestedPage !="" && requestedPage!="menu_mobile.php"){
ajaxpagefetcher.load('window', requestedPage , true);
//ShowInfo(requestedPage);
	}
	
}


function reloadRequestedPage(){
ajaxpagefetcher.load('window', pg , true);
ajaxpagefetcher.load('menu', 'menu_mobile.php', true);
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
 
function changeLodge(l,n,a,f){
	informArt(l + n + a);
	SendPost('&l='+ l +'&n='+ n +'&a='+ a, 'set_sessions.php');
	ajaxpagefetcher.load('menu', 'menu.php', true);
	ajaxpagefetcher.load('window', 'home.php', true);
	
		var p = document.getElementById("profileinfotext");
		p.innerHTML = a+"<br>"+ f +"<br> Viewing Masonic Lodge: "+l;
		
		
} 

function anchorIt(x){

// Scroll to a certain element
document.querySelector('#' + x).scrollIntoView({ 
  behavior: 'smooth' 
});


//window.location.href = "#"+x;

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

function getdataFB(){
	//alert("getdataFB");	
	window.location.href = 'magetech://getdataFB?&fb'; 
		ajaxpagefetcher.load('menu', 'menu.php', true);
	    ajaxpagefetcher.load('window', 'pleasewait.php', true);
	  
  
	    
} 

function goHome(){
window.location.href = 'https://aturservice.ph/?m=mobile';
}


function OpenMsgr(fb_name){	
	window.location.href = 'magetech://OpenMsgr?&fb_name=' +fb_name; 
}
