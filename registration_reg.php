<?
session_start();
error_reporting(0);

include ('check_user.php');

if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		// Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
		//echo 'Thank you. Your message said "'.$_POST['message'].'"';
		//unset($_SESSION['security_code']);
	
   } else{
//   echo "Incorrect Security Code";
   }
      
?>