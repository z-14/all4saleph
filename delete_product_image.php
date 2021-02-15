<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");

  $image_id = $_POST['product_id'];
  $sql_del = "DELETE FROM `product_images` WHERE image_id = '$image_id'";
  $file = "photos/".$_GET['url'];

  if($conn->query($sql_del))
  {

   try 
    {
       unlink($file);
       
    } catch (Exception $e) 
    {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }

?>