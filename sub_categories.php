<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


$cat= $_GET["categories"];
$cat_id=$_GET["cat_id"];
$other=$_GET["other"];

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
            <span><?echo $cat;?></span>
            </div>
    
             </div>
             </div>
          </div>
            <div class="card-body">
    <div style="margin-left:0; margin-right: 0;" class="row">
         <?
           include("sql.php");

             $sql="SELECT * FROM product_subCat WHERE `cat_id` = '$cat_id'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
   ?>
 <div onClick="javascript:ajaxpagefetcher.load('window','product_create_field.php?sub_name=<?echo $row["sub_name"];?>&cat_name=<?echo $cat;?>&other=<?echo $other;?>', true),HideMenu()" class="col-6 cate_text"><?echo $row["sub_name"];?></div>
             
  <?
}

}
else
{
    ?>
 <button onClick="javascript:ajaxpagefetcher.load('window','product_create_field.php?&cat_name=<?echo $cat;?>&other=<?echo $other;?>', true),HideMenu()" class="add_cart_btn" style="margin-top: 50px; float: right; float: right;">Next</button>
    <?
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
include("deo_design.php");
?>

