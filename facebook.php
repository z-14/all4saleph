<?
if($_GET["m"]!="mobile"){
if($_GET["set"]!="yes"){


?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2210246252375520',
      xfbml      : true,
      cookie     : true,
      version    : 'v3.1'
    });
    FB.AppEvents.logPageView();
  
  var MyAccessToken;
   
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
      
      if (response.status === 'connected') {

	 var uid = response.authResponse.userID;
  	MyAccessToken = response.authResponse.accessToken;

  // authUser(uid);
  } else if (response.status === 'authorization_expired') {
  } else if (response.status === 'not_authorized') {
  } else {
  }
    });
  
  
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2210246252375520&autoLogAppEvents=1";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>




<script>

var uid;
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      
      
    uid = response.authResponse.userID;
    var accessToken = response.authResponse.accessToken;
    var email = response.authResponse.email;
      testAPI(response.authResponse.userID);
      
    } else {
    	    
       //The person is not logged into your app or we are unable to tell.
      //document.getElementById('fbstatus').innerHTML = 'Please log ' + 'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI(uid) {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me',{fields: 'first_name'}, function(response) {
      console.log('Successful login for: ' + response.name);
      //document.getElementById('fbstatus').innerHTML = response.first_name ;
      goFB(uid + ":" +response.first_name);
    });
  }
  
  
  function logoutInFB(){
  
  FB.logout();

  }
  
  
  
  
</script>

<?
}}

?>
<div style="display:none;">
<iframe name="fbframe"></iframe>
</div>
