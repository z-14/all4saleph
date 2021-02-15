


<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$merchant_id = $_GET["merchant_id"];  
 $product_id = $_GET["product_id"];
 $seller_id=$_GET["seller_id"];
 $sender_id=$_GET["sender_id"];
$u_id = $_SESSION["u_id"];
$u_u = $_SESSION["u_u"];
$dd= $_GET["dd"];


?>

    <div  class="deo_banner">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="deo_banner-header"><i class="fa fa-envelope" aria-hidden="true"></i>
 INBOX</h3>
                        
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    <div class="container">
      <div class="row">
<div class="col-12 col-lg-12 border flex overflow-auto deo_card_container deo_card_create  deo_card_shadow" style="height: 67vh; overflow: auto;">
  
<?

 $sql="SELECT * FROM merchant_conversation where (reciever_id='$u_id' OR sender_id='$u_id')  ORDER by date desc"; 

 
            $result = $conn->query($sql);
                            if ($result->num_rows > 0) 
                            {
                               while ( $row = $result->fetch_assoc()) 
                              {
                                $convo_id = $row["convo_id"];
                               convo($u_id,$convo_id);

}
}
?>
              
                  
            

                </div>
                </div>
    </div>



<?
function convo($u_id,$convo_id)
{
  include("sql.php");

$sql="SELECT * FROM merchant_messages where (reciever_id='$u_id' OR sender_id='$u_id') and convo_id = '$convo_id' Order by date desc limit 1"; 
            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                           

                            while($row = $result->fetch_assoc()) 
                          {

                            $msg=$row["messages"];
                            $sender_id = $row["sender_id"];
                              $product_date =$row["date"];
                          $product_id =$row["product_id"];
                          $seller_id =$row["seller_id"];
                          $reciever_id=$row['reciever_id'];

                              if ($sender_id==$u_id)
                             {
                               if($sender_id == $_SESSION["u_id"])
                            {
                              $msg="You : ".$row["messages"];
                              $active = "";
                            }
               sender_image($reciever_id,$msg,$date,$product_id,$seller_id,$product_date,$active);
                            }
                            else
                            {
                              $active = "chat_active";
                sender_image($sender_id,$msg,$date,$product_id,$seller_id,$product_date,$active);

                            }
  ?>

                  


                

  <?
}


}}


function sender_image($sender_id,$msg,$date,$product_id,$seller_id,$product_date,$active)
{
  $you = $_SESSION["u_id"];
  include("sql.php");

  $sql="SELECT *,(SELECT url FROM user_image where u_id = '$sender_id')as image  from user_profile where u_id = '$sender_id'";
   $result = $conn->query($sql);
                            if ($result->num_rows > 0) 
                            {
                            while($row = $result->fetch_assoc()) 
                          {
                            $dd=$row['image'];
                            $u_u=$row['u_u'];
                            $u_id=$row['u_id'];
                          }
                      }
                      if (empty($dd)) 
                                {
                                    $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                                }else{
                                    $img =  " /".$dd;
                                }

                      ?>
                      

     <div  onClick="javascript:ajaxpagefetcher.load('window', 'convo.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $u_id;?>&seller_id=<?echo $seller_id;?>&sender_id=<?echo $u_id;?>', true)"class="media text-muted pt-3  border-bottom border-gray message">
                      <!-- <svg class=""  xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg> -->
                      <img class="<?echo $img;?>" width="32" height="32">
                      <div class="media-body pb-3 mb-0 small lh-125">
                        <div class="d-flex justify-content-between align-items-center w-100">
                          <strong class="text-gray-dark"><?echo $msg;?></strong>
                        </div>
                        <span class="d-block"><?echo $u_u;?></span>
                              <span style="float: left; color: #989898; font-size: 12px;" class=""><? date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $product_date);?></span>

                      </div>
                       <img style="float: right;" class="bd-placeholder-img mr-2 rounded"src="<?echo getProductImage($product_id);?>"width="42" height="32">
                    </div>
  
        

            
                      <?
                    
}

?>





<?
  function getProductImage($product_id) {
    include("sql.php");
    $sql="SELECT * FROM product_images where product_id = '$product_id' group by product_id"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        if (empty($row['file_name'])) {
            $img = "https://all4sale.ph/blank.jpg";
          } else {
            $img =  "https://all4sale.ph/photos/".$row['file_name'];
          }
      }
    }
    return $img;
  }
?>

       


