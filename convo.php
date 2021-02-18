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
              <h3 class="deo_banner-header"><i class="fa fa-envelope" aria-hidden="true"></i> Conversation
 </h3>         
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>


     <div id="convo_area"  class="container col-12 col-lg-9  deo_card_container deo_card_create  deo_card_shadow">       
<style type="text/css">
  #chat-wrap                      { border: 1px solid #eee; margin: 0 0 15px 0; }
  #chat-area                      { height:  270px; overflow: auto; background: white; }
</style>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                      <div class="contact-form-area mb-70">
                            <div class="row">
                              <div class="col-lg-12">
                                    <div id="page-wrap" style="margin-top: 10px;">
                                      <div class="row">
                                     <?
merchant_profile($merchant_id);

 getProductImage($product_id);
                                     ?>
                                        </div>
                                          <p id="name-area"></p>
                                          
                                          <div id="chat-wrap">
           <div id="chat-area">

  <?messages($sender_id,$merchant_id,$product_id,$seller_id);?>


  
                                              </div>
                                            </div>
                                          </div>
                                       </div>
    <div class="col-lg-12">
                    <div id="send-message-area">
                        <div style="justify-content: flex-end;display: flex;height: 60px">
                          <div class="col-lg-10">
                              <textarea class="form-control bg-white"  onchange="addtoPost('&messages='+this.value)"  name="message" id="sendie" style="resize: none;height: 60px;"></textarea>
                              </div>
                                <div class="col-lg-2">
                              <button  onClick="postItGoTo('merchant_messages.php?merchant_id=<?echo $merchant_id;?>&product_id=<?echo $product_id;?>&seller_id=<?echo $seller_id;?>','convo.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $seller_id;?>&sender_id=<?echo $sender_id;?>'),hidePT()" class="button ml-15 border-0" id="send" style="padding:14px;">send</button>
                            </div>
                     </div>     
                </div>
         </div>

                                  </div>

    

                        </div>
                    </div>
                </div>
            </div>

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->

<!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>



</div>
<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
 
        </div>

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->

<!-- UIkit JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>

    <script type="text/javascript" src="chat.js"></script>



</div><a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a></body></html>
 
        </div>


<?
function merchant_profile($merchant_id)
{
   include("sql.php");

                  $sql ="SELECT * ,( SELECT url FROM user_image where u_id = '$merchant_id') AS image FROM user_profile WHERE u_id = '$merchant_id' ";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                              $img=$row['image'];
                                 $merchant_name= $row["u_u"];
                            }
                        }

            if (empty($img) ) 
                                {
                                    $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
                                }else{
                                    $img =  "photos/".$img;
                                }

                        ?>

 

                                   <div class="col-lg-8">
                                          <h4><?echo $merchant_name;?></h4>
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
   ?>
 <div class="col-lg-4">
                                          <img style="float: right;" class="bd-placeholder-img mr-2 rounded" src="<?echo $img;?>" width="42" height="32">

                                        </div>

   <?
  }
?>

<?
function messages($sender_id,$merchant_id,$product_id,$seller_id)
{

$u_id = $_SESSION["u_id"];
include("sql.php");
 
 
           

$sql="SELECT * FROM merchant_messages where product_id = '$product_id' Order by date ASC"; 

         
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                          {

                            $sender = $row["sender_id"];
                            $reciever = $row["reciever_id"];
                            $messages = $row["messages"];
                            $date = $row["date"];
                            $product=$row["product_id"];

           if(($sender_id==$u_id ||  $reciever == $sender_id )||( $sender_id==$sender_id|| $reciever==$u_id) && $product==$product_id )
                            {
 if($sender !=$u_id)
                            {

?>


      <div uk-alert="" class="uk-alert" style="margin-top: 0; margin-bottom: 5px;"><div class="toast-body"><?echo $messages;?></div><small style="font-size: 10px;" class="">  <span class="time_date">
    <?
            date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $date);
            ?>
              
           </span> </small>
         </div>

<?

                            }
                            else
                            {

?>


      <div uk-alert="" class="uk-alert-primary" style="margin-top: 0; margin-bottom: 5px;"><div class="toast-body"><?echo $messages;?></div><small style=" font-size: 10px;" class=""> <span class="time_date">
    <?
            date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $date);?>
              
            </span></small></div>


<?

                            }
                            }
                           
                          }
                      }

}
?>