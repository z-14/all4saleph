<?session_start();
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


$u_id=$_SESSION["u_id"];


?>






<?
         
if (empty($_GET["find"])) {
  

?>

<div class="login-form" style="height: 100%;">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
 <div class="btn-group">
  <button class="btn ddd  btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Add Related categories
  </button>
  <div class="dropdown-menu">
</div>


                    </div>
                    <div class="card-body">
    <div class="sc">
 
        <div class="cotainer-fluid">
           <div style="margin-left:0; margin-right: 0;" class="row">      

    
 <div class="form-group col-lg-12" id="tv1"  >
            <label for="storage">Type<span></span></label>
    <select id="ram"class="form-control input-lg"onchange="javascript:ajaxpagefetcher.load('deo', 'adding_sub.php?&find='+this.value,true)">"     
      <option value="<?echo $_GET["find"]?>"></option>
      <option value="Retail">Retail</option>
      <option value="Wholesale">Wholesale</option>
      <option value="Others">Others</option>
       </select>
    </div>
    <?}?>

<div id ="deo" class="container-fluid"></div>
<?
if (isset($_GET["find"])) {

$merchant_type=$_GET["find"];

?>
  <div class="col-lg-12" id="tv1"  >
            <label for="storage">Categories<span></span></label>
    <select id="ram"class="form-control input-lg" onchange="addtoPost('&cat_id='+this.value)" >
  <option disabled selected="" value="">Please select</option>

    <?
      include("sql.php");
             $sql="SELECT * FROM product_categories WHERE `cat_type` = '$merchant_type'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
{
    $cat_id = $row["cat_id"];
   ?>

 
      <option value="<?echo $row["cat_id"];?>"><?echo $row["cat_name"];?></option>
        
  <?
}
}
       ?>  
       </select>
    </div>

    </div>
       <div class="form-group col-lg-12" >
            <label for="com_parts">Add Sub<span>*</span></label>
    <input type="text"   value="<?php echo $storage; ?>" onchange="addtoPost('&sub_name='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="brand" name="" />
    </div>
    <button class="add_cart_btn  btn-block" onClick="postIt('sub_reg.php?sub_type=<?echo  $merchant_type;?>')">Ok</button>
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

</div>

