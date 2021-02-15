<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");



$u_id=$_SESSION["u_id"];

$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 1"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
   $merchant_type=$row["merchant_type"];
}
}


if($merchant_type == "Retailer")
{
  $merchant_type="Retail";
}
else
{
    $merchant_type="Wholesale";

}


?>

<?

function pang_other($low)
{
  echo"<h5 style =\"margin-top:10px;margin-bottom:10px; margin-right:50%;\">Other</h5><br>";

include("sql.php");
$sql="SELECT * FROM product_categories WHERE `cat_type` = 'Others'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{

   ?>

 <div onClick="javascript:ajaxpagefetcher.load('window','sub_categories.php?categories=<?echo $row["cat_name"];?>&cat_id=<?echo $row["cat_id"];?>&other=Others', true),HideMenu()" class="col-6 cate_text"><?echo $row["cat_name"]; ?></div>
             
  <?
}
}
}

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
            <span><?echo $merchant_type;?>  Categories</span>
            </div>
    
             </div>
             </div>
          </div>
            <div class="card-body">
    <div style="margin-left:0; margin-right: 0;" class="row">
           <?
           include("sql.php");

     $sql="SELECT * FROM product_categories WHERE `cat_type` = '$merchant_type'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
   ?>

 <div onClick="javascript:ajaxpagefetcher.load('window','sub_categories.php?categories=<?echo $row["cat_name"];?>&cat_id=<?echo $row["cat_id"];?>&other=no', true),HideMenu()" class="col-6 cate_text"><?echo $row["cat_name"]; ?></div>
             
  <?
}
}

           ?>
           <?
$low = "Others";
 pang_other($low);
           ?>
        </div>
            </div>


          </div>
        </div>
      </div>
    </div>

  </div>



<?
include("deo_design.php");
?>

