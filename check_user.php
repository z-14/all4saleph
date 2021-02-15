<?php
$u = $_POST["username"]; 
$p = $_POST["password"];
$p2 = $_POST["password2"]; 
$email = $_POST["email"];
		
		if ($u == '')
	{ echo "please provide a username<br>"; 
	  //include ("process_register.php");
	  exit;
	  } 
		
				if ($p== '')
	{ echo "please provide a password<br>"; 
	//include ("process_register.php");
	  exit;
	  } 
	  
	  if ($email == '')
	{ echo "please provide an email<br>";
	//include ("process_register.php"); 
	  exit;
	  }
	  
	  	  if ($p != $p2)
	{ echo "Password not matched<br>";
	//include ("process_register.php"); 
	 exit;
	  } 
	  

	  
	  
include ('sql.php') ;

include ('validate.php') ;



$sql="SELECT * FROM u WHERE u_u = '$u' OR u_email = '$email' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
$u_u =$row["u_u"];
$u_email =$row["u_email"];
echo "The username or email you entered is already registered on our data base<br>";
        
    }
} else {
    include ('processreg.php');
}
$conn->close();

?>
