<?

include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");



$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];

   if (isset($_GET['action'])) 
                             {
                                 
?>   <div id="product" class="col-12 col-lg-12">
  						<div class="row" style="margin-top: 20px;">
          
                                       <?php
                                    if (isset($_GET['action'])) 
                                    {
                                     include 'product_images.php';
                                    }
                                  ?>
          </div>
                <?
 
                ?>


    <button onClick="javascript:ajaxpagefetcher.load('window','select_categories.php?<?echo $_SESSION["product_id"];?>', true),HideMenu()" class="add_cart_btn" style="margin-top: 50px; float: right; float: right;">Next: Choose a category</button>

  </div>

<?                                    }



?>

  <style>
    
 @media only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px) {
.btn update_btn form-control{
  max-width: 100%;
}

    [dd="col-4"] {
    width: 100%;
    float: left;
  
}


}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #f7a992;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(253, 69, 8, 0.25);
}
  </style>
 