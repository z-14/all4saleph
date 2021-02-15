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


 $sql="SELECT * FROM merchant_conversation where (reciever_id='$u_id' OR sender_id='$u_id')  ORDER by date desc"; 

 
            $result = $conn->query($sql);
                            if ($result->num_rows > 0) 
                            {
                              ?>
<div class="container">
<h3 class=" text-center"></h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8">
            <span> Inbox</span>
            </div>
            <div class="col-lg-4">
   
</div>
            
             </div>
             </div>
          </div>

          <div class="inbox_chat">

                              <?

                              while ( $row = $result->fetch_assoc()) 
                              {
                                $convo_id = $row["convo_id"];
                               allData($u_id,$convo_id);
                              }
                              
?>
 </div>
        </div>
        </div>
<?
                              }
                              else
                              {
                                ?>
  <!--================login Area =================-->
        <section class="emty_cart_area p_100">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="fa fa-envelope"></i>
                    <h3>Inbox is Empty</h3>
                    <h4>back to <a onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php', true),HideMenu()" href="#">shopping</a></h4>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
                                <?
                              }

?>
         
         
       

<?
function allData($u_id,$convo_id)
{


  ?>

  

            <?
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
                          

                          }
                     
                      }
                      else
                      {
                        ?>

<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_items">
                            <h3></h3>
                            <div class="table-responsive-md">
                                <div class="row">
                                      <div class="col-12 col-lg-12 p-0">
                                         <div class="container mt-3 mb-4">

    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div class="card border-light bg-white card proviewcard shadow-sm">

            <div class="card-body">


        
        <!--================login Area =================-->
        <section class="emty_cart_area p_100 alert alert-light text-center">
            <div class="container ">
                <div class="emty_cart_inner">
                    <i class="fa fa-envelope" style="font-size:24px"></i>
                    <h3>Empty</h3>
                    <h4>back to <a onclick="javascript:ajaxpagefetcher.load('window','shop_item_list.php', true),HideMenu()" href="#">shopping</a></h4>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
                
                                    
                                    
                                    </div></div></div></div></div></div></div></div><table class="table">
                                    <tbody>
                                      </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

                        <?
                      }
                                




}
?>



<?

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
                                    $img =  "photos/".$dd;
                                }

                      ?>
                      


         <div class="chat_list active_chat<?echo " ".$active;?>" onClick="javascript:ajaxpagefetcher.load('window', 'conversation.php?product_id=<?echo $product_id;?>&merchant_id=<?echo $u_id;?>&seller_id=<?echo $seller_id;?>&sender_id=<?echo $u_id;?>', true)">
              <div class="chat_people">
                <div class="chat_img hd">
                 <img src="<?echo $img;?>" alt=""> 
               </div>
                <div class="chat_ib">
                    <img style="width:100px; height: 100px; float: right; top: 0;" src="<?echo getProductImage($product_id);?>" alt="">
                  <h5><?echo $u_u;?>
                   
                  </h5>
                  <p><?echo $msg;?></p>
                </div>
              <span style="float: left; color: #989898; font-size: 12px;" class=""><? date_default_timezone_set("Asia/Manila");
            echo date("g:i a j F Y", $product_date);?></span>

              </div>
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






















 <style type="text/css">
  .container{max-width:1170px; margin:auto;}
.chat_img img{
 width:75px;
 height: 75px; 
 border-radius: 50%;
}
.inbox_people {
  background: #fff none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 100%; border-right:1px solid #c4c4c4;
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
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}

.srch_bar .input-group-addon button {

  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ 
  font-size:15px; color:#464646; margin:0 0 8px 0;
}
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
.card-header{
    background-color: #fff;
    font-size: 18px;
    padding: 10px 16px;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}
.chat_active
{
  background:#ebebeb;
}
.active_chat:hover{ 
  background:#ebebeb;
}

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
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{
 overflow:hidden; margin:26px 0 26px;}

.sent_msg {
  float: right;
  width: 100%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
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

<?
include("deo_design.php");
?>
