<?
    include("sessions.php");
    include("globalconfig.php");
    include("sql.php");

    $u_u = $_SESSION["u_u"];
    $u_id = $_SESSION["u_id"];
    $product_id = $_GET["product_id"];


$w_date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));

 $sql="SELECT * FROM product where product_id = '$product_id'"; 
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                 $row = $result->fetch_assoc();

             $merchant_id = $row["u_id"];
            $product_name =$row['product_name'];
            $product_qty =$row['product_qty'];
            $product_desc =$row['product_desc'];
            $product_price =$row['product_price'];
            $product_id =$row['product_id'];

                }


  
  $sql = "INSERT INTO product_wishlist (product_id,u_id,date,product_name,merchant_id,product_desc,product_qty,product_price,u_u) VALUES ('$product_id','$u_id','$w_date','$product_name','$merchant_id','$product_desc','$product_qty','$product_price','$u_u')";
       if ($conn->query($sql) === TRUE) {
           echo "Added to Wishlist";
        } else {
           echo $sql."Error updating record: " . $conn->error;
        }
        
    
    
?>