<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("user_photo.php");



$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 1"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$user_profile_id = $row["user_profile_id"];	
$u_id  = $row["u_id"];	
$u_u = $row["u_u"];	
$firstname = $row["firstname"];	
$middlename = $row["middlename"];	
$surname = $row["surname"];	
$name_extension = $row["name_extension"];	
$birthday = $row["birthday"];	
$address = $row["address"];	
$mobile_number = $row["mobile_number"];	
$email = $row["email"];	
$website = $row["website"];	
$telephone_number = $row["telephone_number"];	
$merchant  = $row["merchant"];
$salutation  = $row["salutation"];
$merchant_type = $row["merchant_type"];

		
}
}


if($salutation==""){
$salutation_info = "Select";
}else{
$salutation_info = $salutation;
}


?>


<!--================Form Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="login_title">
                                <h2>Apply as Merchant</h2>
                                <p>Earn great by being a merchant!</p>
                            </div>
							
                            <div class="login_form row">
                            	
                            	
                            
                            <?
if($_GET['action'] != "update") 
{
                            ?>
                            
                                <div class="col-lg-6 form-group">
<select class="form-control" id="type" onchange="addtoPost('&merchant='+this.value)" onclick="anchorIt(this.id)">
    <?
    if($merchant == "0")
    {
       ?>
           <option disabled selected value="">Select to Apply</option>

<option value="1">Apply</option>                                                            
       <?
    }
    else
    {
        ?>
<option value="1">Application submitted</option>
<option value="0">Cancel request</option>
<?
    }

?>

                                	</select>                                                                
                                </div>

                                  <div class="col-lg-6 form-group">
                                     <select class="form-control" onchange="addtoPost('&merchant_type='+this.value)" onclick="anchorIt(this.id)">
<?if(empty($merchant_type))
{?>

     <option disabled selected value="">Please select..</option>

<?}else
{
    ?>
     <option disabled selected value="<?echo $merchant_type;?>"><?echo $merchant_type;?></option>

    <?
}?>
     
                                            <option value="Supplier">Supplier</option>
                                            <option value="Retailer">Retailer</option>
                                    </select>                                                                   
                                </div>
                                
                               <div class="col-lg-6 form-group">
                                	<select class="form-control"  id="salutation" onchange="addtoPost('&salutation='+this.value)" onclick="anchorIt(this.id)">
                                    		<option value=""><? echo $salutation_info; ?></option>
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											<option value="Ms.">Ms.</option>
                                	</select>                                                                
                                </div>
                                
                                
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $firstname;?>" placeholder="Firstname" id="firstname" onchange="addtoPost('&firstname='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $middlename;?>" placeholder="Middlename " id="middlename" onchange="addtoPost('&middlename='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $surname;?>" placeholder="Surname " id="surname" onchange="addtoPost('&surname='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $name_extension;?>" placeholder="Name Extension " id="nameextension" onchange="addtoPost('&name_extension='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text"  value = "<? echo date("l j M Y", $birthday);?>" placeholder="Birthday " id="birthday" onchange="addtoPost('&birthday='+this.value)" oninput="getDate(this.id);"  onclick="getDate(this.id); anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address;?>" placeholder="Address " id="address" onchange="addtoPost('&address='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address_bldg;?>" placeholder="Bldg No. " id="bldg" onchange="addtoPost('&address_bldg='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address_street;?>" placeholder="Street " id="st" onchange="addtoPost('&address_street='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address_brgy;?>" placeholder="Brgy " id="brgy" onchange="addtoPost('&address_brgy='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address_city;?>" placeholder="City " id="city" onchange="addtoPost('&address_city='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address_bldg;?>" placeholder="Bldg No. " id="bldg" onchange="addtoPost('&address_bldg='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $address_zipcode;?>" placeholder="Zipcode " id="zip" onchange="addtoPost('&address_zipcode='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="number" value = "<? echo $mobile_number;?>" placeholder="Mobile Number" id="mobilenumber" onchange="addtoPost('&mobile number='+this.value)" onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" value = "<? echo $email;?>" placeholder=" Email" id="email" onchange="addtoPost('&email='+this.value)"  onclick="anchorIt(this.id)" >
                                </div>
                                
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="number" value = "<? echo $telephone_number;?>" placeholder=" Telephone Number" id="telephonenumber" onchange="addtoPost('&telephone number='+this.value)" onclick="anchorIt(this.id)" >
                                </div>

                               

                                  <div id="deo_docu">
                                  </div>
                                
                                
                                 <?
                            }
                                ?>
                                
                                
                                
                                <div style="margin-top: 10px;" class="col-lg-6 form-group">
    <button style="width: 100%;" class="add_cart_btn" onClick="postItGoTo('merchant_apply_reg.php','merchant_apply_succ.php'),hidePT(),ClearPost()">Submit</button>


                                </div>
                    <div class="col-lg-6 form-group">
                            
                            <button data-toggle="modal" data-target=".bd-example-modal-lg" style="width: 100%; margin-top: 10px;" class="add_cart_btn" >Upload required docs</button>
                                </div>
                                
                                
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        <!--================End Form Area =================-->
	
					
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Upload Document</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <?
include("merchant_apply_docs.php");
   ?>
      </div>

    </div>
  </div>
</div>
	
	