<?php

$flag="OK";   // This is the flag and we set it to OK
$msg="";        // Initializing the message to hold the error messages

if(strlen($u) < 5){    // checking the length of the entered userid and it must be more than 5 character in length
$msg=$msg."Please enter a username more than 5 character length<br>";
$flag="NOTOK";   //setting the flag to error flag.
}
if(strlen($u) > 20){    // checking the length of the entered userid and it must be more than 5 character in length
$msg=$msg."Please enter a username less than 20 character length<br>";
$flag="NOTOK";   //setting the flag to error flag.
}
if(strlen($p) < 5 ){    // checking the length of the entered password and it must be more than 5 character in length
$msg=$msg."Please enter a password of more than 5 character length<br>";
$flag="NOTOK";   //setting the flag to error flag.
}
if($flag <>"OK"){
echo "$msg<br>" ; # <A HREF=\"process_register.php\">back</A><br><br><br><br><br><br><br><br><br><br><br><br>" ;
include ("process_register.php");
//echo "<center>$msg <br> <input type='button' value='Retry' onClick='history.go(-2)'></center>";
exit;	
} 
if(preg_match('[^A-Za-z]', $userid)){    //Only lower or upper case letters allowed.
$msg=$msg."Please use only alphabets a to z as userid<br>";
$flag="NOTOK";   //setting the flag to error flag.
}

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
// Run the preg_match() function on regex against the email address
if (preg_match($regex, $email)) {
     //echo "$email is a valid email. We can accept it.";
} else { 
     echo "The email $email is invalid<br>";
	
}



if (preg_match('/\s/',$u)) {
	echo "username must only be one word (without any spaces)<br>";

} 


?>