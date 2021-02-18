
 <?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
 
$product_id = $_SESSION["product_id"];

     $get_imgs = "SELECT * FROM product_images WHERE product_id = '$product_id'";
                       $get_res = $conn->query($get_imgs);
                    if ($get_res->num_rows > 0) 
                    {
                     while ($row_img = $get_res->fetch_assoc()) 
                          {
                    	?>
  <div class="col-lg-6 ">
   <div class="deo_card_container deo_card_create  deo_card_shadow p-0"><a class="p-0 m-0" onclick="delete_image('<?echo $row_img['image_id'];?>','delete_product_image.php','You want to remove this image?')">X</a>
  <div class="deo_card_create_photo">
    <img style="width: 100%;" src="<?echo 'photos/'.$row_img['file_name'];?>">
  </div>
</div>
</div>


<?

}
}
?>