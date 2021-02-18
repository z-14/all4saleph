<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");



$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];


if(isset($_GET['delete_photo']))
{
  $image_id = $_GET['image_id'];
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
}

if($_GET['id'] !== '' && $_GET['action'] == 'update')
  {

  }
else
{
   // $sql = "INSERT INTO `product` (`u_id`) VALUES ('$u_id');";

    $p_date = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
    $sql = "INSERT INTO `product` (`u_id`,date) VALUES ('$u_id','$p_date');";
  if ($conn->query($sql) === TRUE) 
  {
    $_SESSION["product_id"] = $conn->insert_id;
    $product_id = $conn->insert_id;
     
  }else
  {
    echo $sql."Not working: " . $conn->error;
  }

}





$url =  "product_create.php?action=update&id=".$product_id;

?>


<br>




  <div class="container mt-3 mb-4">

    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div class="card border-light bg-white card proviewcard shadow-sm">
             <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8">
            <span>Upload photos of your item to get started.</span>
            </div>
    
             </div>
             </div>
          </div>
            <div class="card-body">
          <div id="loadImage"></div>

            </div>
            <div data-toggle="modal" data-target=".bd-example-modal-lg" class="card-footer border-light cart-panel-foo-fix">
              <a class="btn btn-add-con">Add Photo</a>

            </div>

          </div>
        </div>
      </div>
    </div>

  </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Upload Product image</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
<?
include("photo_upload.php");
?>
      </div>

    </div>
  </div>
</div>




<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
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
    overflow: hidden;
hyphens: auto;
text-overflow: ellipsis;
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
</style>