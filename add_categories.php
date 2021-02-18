<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");


$u_id=$_SESSION["u_id"];

$url =  "add_categories.php";

?>
<div style="height: 5rem;"  >
            <!-- container -->
            
        </div>
    <div  class="deo_banner">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="deo_banner-header"><i class="fa fa-gear" aria-hidden="true"></i> Add Categories</h3>
                        
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>


<div class="deo_profile" >
  <div  class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="d_card border-light bg-white d_card proviewcard shadow-sm">
             <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8">
            <span><i class="fa fa-user" aria-hidden="true"></i> Categories</span>
            </div>
        </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
          
               </div>

             <div class="form-group col-lg-12"  >
            <label for="Type">Type<span></span></label>
    <select class="form-control input-lg" onchange="addtoPost('&cat_type='+this.value)">
      <option disabled selected="" value="">Please select</option>
      <option value="Retail">Retail</option>
      <option value="Wholesale">Wholesale</option>
      <option value="Others">Others</option>
       </select>
    </div>

      <div class="form-group col-lg-12" >
            <label for="com_parts">Categories<span>*</span></label>
    <input type="text"   value="<?php echo $storage; ?>" onchange="addtoPost('&cat_name='+this.value)"  oninput="showPass('storage: '+ this.value);" onclick="showPass('Model: '+this.value),anchorIt(this.id),toggleClass(this.id);" class="form-control" placeholder="Categories name" name="" />
    </div>
<div class="form-group col-lg-12" >
    <button style=" margin-top: 10px;" class="button full-width button-sliding-icon ripple-effect"onClick="postIt('sub_reg.php?add_cat=yes')">Ok</button>
        </div>
      </div>


              </div>

            </div>
    </div>
</div>
</div>

</div>
</div>

































