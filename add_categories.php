<?session_start();
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


$u_id=$_SESSION["u_id"];

$url =  "add_categories.php";

?>



<div class="login-form" style="height: 100%;">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
 <div class="btn-group">
  <button class="btn ddd  btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Add Add Categories
  </button>

</div>


   </div>
                    <div class="card-body">
    <div class="sc">
 
        <div class="cotainer-fluid">
           <div style="margin-left:0; margin-right: 0;" class="row">      
 <div class="form-group col-lg-12"  >
            <label for="Type">Type<span></span></label>
    <select class="form-control input-lg" onchange="addtoPost('&cat_type='+this.value)">
      <option disabled selected="" value="">Please select</option>
      <option value="Retail">Retail</option>
      <option value="Wholesale">Wholesale</option>
      <option value="Others">Others</option>
       </select>
    </div>

    </div>
       <div class="form-group col-lg-12" >
            <label for="com_parts">Categories<span>*</span></label>
    <input type="text"   value="<?php echo $storage; ?>" onchange="addtoPost('&cat_name='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Categories name" name="" />
    </div>

    <button style=" margin-top: 10px;" class="add_cart_btn  btn-block" onClick="postIt('sub_reg.php?add_cat=yes')">Ok</button>
        </div>

      
    </div>
                    </div>
                     
                </div>
          

            </div>
        </div>
 </div>

</div>

