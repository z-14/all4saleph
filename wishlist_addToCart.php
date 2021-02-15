<?php 
    include("sessions.php");
    include("globalconfig.php");
    include("sql.php");

    $w_id = $_GET['w_id'];


$sql2="DELETE from product_wishlist where w_id = '$w_id'";
if ($conn->query($sql2) === TRUE) {
} else {
}

$u_u = $_SESSION["u_u"];
    $u_id = $_SESSION["u_id"];
    $product_id = $_GET["product_id"];

 $color = $_POST['color'];
 $size = $_POST['size'];
 $quantity = $_POST['quantitya'];
$product_name =$_GET['product_name'];

      $sql="SELECT * FROM product where product_id = '$product_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();

                 $merchant_id = $row["u_id"];
            $product_name =$row['product_name'];
             $product_price =$row['product_price'];

                }

// for trial only, need to validate first if empty before to add to cart
      if(empty($quantity))
      {
         $quantity = 1;
      }
      if(empty($color))
      {
         $color = "White";
      }
      if(empty($size))
      {
         $size = "S";
      }

      //
     

    $edited = str_replace(array('?'), '',$product_id);

    $w_date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

    
      $sql = "INSERT INTO cart (product_price,product_id,u_id,color,size,date,quantity,product_name,merchant_id) VALUES ('$product_price','$edited','$u_id','$color','$size','$w_date','$quantity','$product_name','$merchant_id')";
       if ($conn->query($sql) === TRUE) {
           echo "Added to cart ";
        } else {
           echo $sql."Error updating record: " . $conn->error;
        }



  ?>