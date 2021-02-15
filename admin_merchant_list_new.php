<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

$u_id = $_SESSION["u_id"];
$u_u = $_SESSION["u_u"];

?>

  <div class="container mt-3 mb-4">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div class="card border-light bg-white card proviewcard shadow-sm">
            <div class="card-header">
           <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8">
            <span>New Merchant application </span>
            </div>
            <div class="col-lg-4">

<input id="art_search_input" type="text" value="<?echo $_GET["search"];?>" placeholder="Search here" name="" onchange="javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new.php?search='+this.value, true)" style="color: gray; border: 1px solid red;">    

</div>
            
             </div>
             </div>
          </div>
            <div class="card-body">
          
<?

$sql="SELECT * FROM user_profile where merchant ='1' ";

 if (isset($_GET["search"])) 
 {
       $find = "%".$_GET["search"]."%";  
        $sql.="AND (firstname LIKE '$find' || surname LIKE '$find')  ";   
 }

 $sql.="Order by user_profile_id ";
$result = $conn->query($sql);
$total=mysqli_num_rows($result);
$page = $_GET["page"];

if (isset($limit)){
  }else{$limit = 10;}
$pages = $total / $limit;
$page_in = $page * $limit;
$sql.="LIMIT $page_in ,$limit ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
               
                       $u_id = $row["u_id"];
                   $u_u = $row["u_u"];
                    $firstName = $row["firstname"];
                     $surname = $row["surname"];
                     $merchant_type = $row["merchant_type"];
                     $email = $row["email"];
                     $telephone = $row["telephone"];
                     $address = $row["address"];
                                      
                  $imageURL = getProductImage($u_id);
                  $fulldetails=$row["full_details"];

                  wistlist($u_id,$u_u,$imageURL, $firstName,$surname,$merchant_type,$email,$telephone,$address);
                }
              }

?>


            </div>
            <div class="card-footer border-light cart-panel-foo-fix">
              <a class="btn btn-add-con">Approve All</a>
               <div style="float: right;">
              <?
              if($total >$limit )
              {
include("deo_pagination.php");
}
?>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>





<?
function  wistlist($u_id,$u_u,$imageURL, $firstName,$surname,$merchant_type,$email,$telephone,$address)
{
  ?>

 <div class="col-lg-12 p-3 cardlist">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="row">
                        <div class="col-4 col-lg-3 col-xl-2">
                          <div class="row">
                            
                            <a  class="w-100">
                              <img on style="width: 100px; "  src="<?echo $imageURL;?>" class="mx-auto d-block mb-1 addcartimg">
                              
                            </a>
                          </div>
                        </div>
                        <div class="col-8 col-lg-9 col-xl-10">
                          <div class="d-block text-truncate mb-1">
                            <a  class="cartproname_product_name">
                              <?echo $surname." ".$firstName; ?>
                                
                              </a>
                          </div>
                          <div class="seller d-block">
                            <span>Username: </span>
                            <span><?echo $u_u;?></span>
                          </div>
                           <div class="seller d-block">
                            <span>Email: </span>
                            <span><?echo $email;?></span>
                          </div>
                          <div class="seller d-block">
                            <span>Telephone: </span>
                            <span><?echo $telephone;?></span>
                          </div>
                          <div class="seller d-block">
                            <span>Address: </span>
                            <span><?echo $address;?></span>
                          </div>
                          <div class="cartviewprice d-block">
                            <span class="amt_color_price"><?echo $merchant_type;?></span>
                            <span class="oldamt"></span>
                            <span class="disamt"></span>
                          </div>
                           <div class="cartviewprice d-block">
                            <span class="oldamt">Documents : </span>

                          <?
                         docs($u_id);
                          ?>

                          </div>
                 
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4 col-lg-3 col-xl-2 p-0 qty">
                          <div class="input-group">

                                 

                          </div>
                        </div>
                       
                      </div>
                    </div>
                    <div class="col-lg-3 ml-lg-auto align-self-start mt-2 mt-lg-0">
                      <div class="row-fluid">
                        <div class="prostatus">
                           <div class="product_buttons f-l">

 <button  onClick="approveIt('window','admin_merchant_application_action.php?approve=yes-<? echo $u_id;?>','admin_merchant_list_new.php')"  class="product_heart">
  <i class="fa fa-check" aria-hidden="true"></i></button>

     <button  onClick="cancelIt('window','admin_merchant_application_action.php?approve=no-<? echo $u_id;?>','admin_merchant_list_new.php')"   class="product_heart">
  <i class="fa fa-close" aria-hidden="true"></i></button>

  




 </div>
                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>

  <?
}


?>










<?
  function getProductImage($u_id) {
    include("sql.php");
    $sql="SELECT * FROM user_image where u_id = '$u_id'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        if (empty($row['file_name'])) {
            $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
          } else {
            $img =  "photos/".$row['url'];
          }
      }
    }
    else
    {
       $img = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
    }
   
    return $img;
  }
?>
<?
function docs($u_id)
{
  include("sql.php");
            $sql="SELECT * FROM merchant_docs WHERE u_id ='$u_id'"; 
              $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                    while($row = $result->fetch_assoc())
                     { 
                      $id=$row["u_id"];
                    
                              ?>
      <span class="disamt"><a  target="_blank" href="https://<? echo $domain; ?>/merchant_docs/<?  echo $row['url']; ?>"><i class="fa fa-file" aria-hidden="true"></i></a></span>
                              <?    

                             
                          }
                              }
              
}

?>




<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
.product_sale
{
  position: absolute;
z-index: 99;
right: -28px;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
transform: rotate(45deg);
}
  .product_sale p {
    margin: 0;
    color: #fff;
    background: #ff0000;
    padding: 3px 25px;
    box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.4);
  }
  .on_sale
{
background: #fff;
padding: 5px;
position: relative;
overflow: hidden;
overflow: hidden;
}
  .card{
    border-radius: 0;
}
.card .card-header{
    background-color: #fff;
    font-size: 18px;
    padding: 10px 16px;
}
.proviewcard .card-body{
    padding: 0;
}
.cardlist{
    border-bottom: 1px solid #f0f0f0;
}
.cardlist:last-child{
    border: 0;
}
.addcartimg{
    height: 100px;
}
.cartproname{
    font-size: 15px;
    color: #212529;
    line-height: 1;
    display: inline;
}
.cartproname:hover{
    color: #c16302;
    text-decoration: none;
}
.seller{
    font-size: 12px;
    color: #666;
    margin-bottom: 5px;
    line-height: 1;
}
.cartviewprice{
    margin-bottom: 8px;
    line-height: 1;
}
.cartviewprice span{
    display: inline-block;
    padding-right: 10px;
    margin-bottom: 5px;
}
.cartviewprice .amt{
    font-size: 18px;
    font-weight: 600;
}
.cartviewprice .oldamt{
    color: #757575;
    font-weight: 600;
}
.cartviewprice .disamt{
    font-weight: 600;
    color: #c16302;
}
.qty .input-group{
    width: 100%;
    height: 25px;
}
.btn-qty{
    height: 25px;
    color: #fff !important;
    background-color: #555 !important; 
    border-color: #555 !important;
    padding: 0px 3px !important;
}
.qty input{
    height: 25px;
}
.addcardrmv{
    font-size: 14px;
    line-height: 1.8;
    text-transform: uppercase;
    color: #212529;
}
.addcardrmv:hover{
    color: #c16302;
    text-decoration: none;
    font-weight: 600;
}
.prostatus .del-time {
    font-size: 12px;
    color: #757575;
    margin-right: 10px;
}
.prostatus .del-time > span {
    font-weight: 600;
    color: #555;
}
.proviewcard .card-footer{
    text-align: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px -2px 10px 0px;
    padding: 8px 15px;
}
.btn-add-con{
    background-color: #fff;
    color: #212121;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 2px 0px;
    font-size: 16px;
    font-weight: 500;
    padding: 8px 20px;
    border-radius: 2px;
    border-width: 1px;
    border-style: solid;
    border-color: #E0E0E0;
    border-image: initial;
    min-width: 185px;
}
.card .card-footer{
    background-color: #fff;
}

/*Card Footer Fixed*/
@supports (box-shadow: 2px 2px 2px black){
  .cart-panel-foo-fix{
    position: sticky;
    bottom: 0;
    z-index: 9;
  }
}

.btn-cust {
    background-color: #e96125 !important;
    color: #fff !important;
    font-size: 16px;
    padding: 8px 8px;
    min-width: 128px;
}
.btn-cust:hover {
    background-color: #c74b14 !important;
    color: #fff !important;
}
.f-l
{
   float: right;
}
 .swal2-cancel
  {
    margin-right: 10px;
  }

  
</style>