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

if(!empty($_SESSION["u_u"]))
{



?>





<div class="container">
<h3 class=" text-center"></h3>
<div class="messaging">
   <div class="headind_srch">
            <div class="recent_heading">
              <?merchant_profile($merchant_id);?>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
<?product_image($product_id); ?>
            </div>
          </div>
      </div>
        <div class="mesgs">
          <div class="msg_history">
           
          <?messages($sender_id,$merchant_id,$product_id,$seller_id);?>       
            </div>
            

        
             
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" onchange="addtoPost('&messages='+this.value)" placeholder="Type a message" />
              <button class="msg_send_btn" onClick="postItGoTo('merchant_messages.php?merchant_id=<?echo $merchant_id;?>&product_id=<?echo $product_id;?>&seller_id=<?echo $seller_id;?>','conversation.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $merchant_id;?>&seller_id=<?echo $seller_id;?>&sender_id=<?echo $sender_id;?>'),hidePT()" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
     </div> 


     <?

}
else
{
  include("login_mobile.php");
}
     ?>

<?
function product_image($product_id)
{
  include("sql.php");
           $sql="SELECT *,(SELECT file_name FROM product_images where product_id = '$product_id') AS image from product where product_id = '$product_id' "; 

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0)
                             {
              $row = $result->fetch_assoc();

                            $image = "photos/".$row["image"];

                            }

                        

                        ?>

   
<div class="social-media">
           <img style="height: 60px; width: 60px;" class="produ zero_margin q-a" src="<?echo $image;?>" alt="" />
          </div>
  <div class="social-media hd">
          <div class="zero_margin"> <p class="deo_product_name produ zero_margin"><?echo $row["product_name"];?></p></div>
   <div class="zero_margin hd"><p class="deo_price zero_margin"><?echo "PHP ".$row["product_price"];?></p></div>
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
<div class="incoming_msg">
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?echo $messages;?></p>
  <span class="time_date">
    <?
            date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $date);
            ?>
              
           </span>             
            </div>
            </div>
        </div>

<?

                            }
                            else
                            {

?>
 <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?echo $messages;?></p>
                <span class="time_date">
    <?
            date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $date);?>
              
            </span>
            </div>
            </div>
  
<?

                            }
                            }
                           
                          }
                      }

}
?>

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

      <img style="height: 60px;width: 60px; border-radius: 50%;"class="prof" src="<?echo $img;?>" alt="" />
      <p><?echo $merchant_name;?></p>




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




<style type="text/css">
	.container{max-width:1170px; margin:auto;}

.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ 
	padding:10px 29px 10px 20px; overflow:hidden;
	 border:1px solid #c4c4c4;
}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
  	 border:1px solid #c4c4c4;

}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {
	border-top: 1px solid #c4c4c4;
	position: relative;
	float: bottom;
}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>