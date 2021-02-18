<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("user_photo.php");


$u_id =$_SESSION['u_id'];
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
$user_description = $row["user_description"];
$company_name=$row["company_name"];
        
}
}


if($salutation==""){
$salutation_info = "Select";
}else{
$salutation_info = $salutation;
}


?>
    <div  class="deo_banner">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="deo_banner-header"><i class="fa fa-gear" aria-hidden="true"></i>  Apply as Merchant</h3>
                        
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>


<div class="deo_profile" >
  <div  class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="d_card border-light bg-white d_card proviewcard shadow-sm">
             <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-8">
            <span><span class="iconify" data-inline="false"></span> <i class="fa fa-folder" aria-hidden="true"></i>
 Merchant application</span>
            </div>
        </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">


   
                            <?
if($_GET['action'] != "update") 
{
                            ?>
                            
                                 <div class="col-xl-4">
                        <span  class="deo_span" >Apply as </span>
    <div class="input-group input-group-sm mb-3">
      <select class="form-control" id="category" value="Select to Apply" onchange="addtoPost('&merchant='+this.value)" onclick="anchorIt(this.id)">
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

</div>






 <div class="col-xl-4">
                        <span  class="deo_span" >Salutation</span>
    <div class="input-group input-group-sm mb-3">
          <select class="form-control"  id="salutation" onchange="addtoPost('&salutation='+this.value)" onclick="anchorIt(this.id)">
                                            <option selected disabled value=""><? echo $salutation_info; ?></option>
                                            <option value="Mr.">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                    </select>


</div>
</div>


<div class="col-xl-4">
                        <span  class="deo_span" >Firstname</span>
    <div class="input-group input-group-sm mb-3">
    <input class="form-control" type="text" value = "<? echo $firstname;?>" placeholder="Firstname" id="firstname" onchange="addtoPost('&firstname='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
      <div class="col-xl-4">
        <span  class="deo_span" >Middlename</span>
    <div class="input-group input-group-sm mb-3">
     <input class="form-control" type="text" value = "<? echo $middlename;?>" placeholder="Middlename " id="middlename" onchange="addtoPost('&middlename='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
      <div class="col-xl-4">
                <span  class="deo_span" >Lastname</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="text" value = "<? echo $surname;?>" placeholder="Surname " id="surname" onchange="addtoPost('&surname='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
 <div class="col-xl-4">
             <span  class="deo_span" >Birthday</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="text"  value = "<? echo date("l j M Y", $birthday);?>" placeholder="Birthday " id="birthday" onchange="addtoPost('&birthday='+this.value)" oninput="getDate(this.id);"  onclick="getDate(this.id); anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>

              </div>

              <div style="margin-top: 20px;" class="row">
                   
  <div class="col-xl-3">
             <span  class="deo_span" >Name Extension</span>
    <div class="input-group input-group-sm mb-3">
  <input class="form-control" type="text" value = "<? echo $name_extension;?>" placeholder="Name Extension " id="nameextension" onchange="addtoPost('&name_extension='+this.value)" onclick="anchorIt(this.id)" > 
 
</div>
</div>
 

  <div class="col-xl-3">
             <span  class="deo_span" >Address</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="text" value = "<? echo $address;?>" placeholder="Address " id="address" onchange="addtoPost('&address='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
  <div class="col-xl-2">
             <span  class="deo_span" >Bldg no.</span>
    <div class="input-group input-group-sm mb-3">

      <input class="form-control" type="text" value = "<? echo $address_bldg;?>" placeholder="Bldg No. " id="bldg" onchange="addtoPost('&address_bldg='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
  <div class="col-xl-2">
             <span  class="deo_span" >Zipcode</span>
    <div class="input-group input-group-sm mb-3">

      <input class="form-control" type="text" value = "<? echo $address_zipcode;?>" placeholder="Zipcode " id="zip" onchange="addtoPost('&address_zipcode='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-2">
             <span  class="deo_span" >Street</span>
    <div class="input-group input-group-sm mb-3">

  <input class="form-control" type="text" value = "<? echo $address_street;?>" placeholder="Street " id="st" onchange="addtoPost('&address_street='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-3">
             <span  class="deo_span" >Brgy</span>
    <div class="input-group input-group-sm mb-3">

        <input class="form-control" type="text" value = "<? echo $address_brgy;?>" placeholder="Brgy " id="brgy" onchange="addtoPost('&address_brgy='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-3">
             <span  class="deo_span" >City</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="text" value = "<? echo $address_city;?>" placeholder="City " id="city" onchange="addtoPost('&address_city='+this.value)" onclick="anchorIt(this.id)" >
    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-3">
             <span  class="deo_span" >Mobile Number</span>
    <div class="input-group input-group-sm mb-3">

     <input class="form-control" type="number" value = "<? echo $mobile_number;?>" placeholder="Mobile Number" id="mobilenumber" onchange="addtoPost('&mobile number='+this.value)" onclick="anchorIt(this.id)" >
  </div>
</div>


<div class="col-xl-3">
             <span  class="deo_span" >Telephone Number</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="number" value = "<? echo $telephone_number;?>" placeholder=" Telephone Number" id="telephonenumber" onchange="addtoPost('&telephone number='+this.value)" onclick="anchorIt(this.id)" >
  </div>
</div>

<div class="col-xl-3">
             <span  class="deo_span" >Email</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="text" value = "<? echo $email;?>" placeholder=" Email" id="email" onchange="addtoPost('&email='+this.value)"  onclick="anchorIt(this.id)" >
  </div>
</div>
<div class="col-xl-3">
             <span  class="deo_span" >Company or Business Name</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" type="text" value = "<? echo $company_name;?>" placeholder="Company or Business Name" id="company_name" onchange="addtoPost('&company_name='+this.value)" onclick="anchorIt(this.id)" >
  </div>
</div>
                                  
                              

<div class="col-xl-12">
             <span  class="deo_span" >Description</span>
    <div class="input-group input-group-sm mb-3">
<textarea  cols="30" rows="5" class="form-control" onchange="addtoPost('&user_description='+this.value)"  placeholder=" Short Description"  ><?echo $user_description;?></textarea>  
 <div class="input-group-prepend">
  </div>
</div>
</div>


<div class="col-xl-12 pull-right">
           <div class="input-group input-group-sm mb-3" >
  <div class="uk-card" style="width: 100%;" >
          <div class="uk-placeholder uk-text-center">
           <span uk-icon="icon: cloud-upload" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="cloud-upload"><path fill="none" stroke="#000" stroke-width="1.1" d="M6.5,14.61 L3.75,14.61 C1.96,14.61 0.5,13.17 0.5,11.39 C0.5,9.76 1.72,8.41 3.31,8.2 C3.38,5.31 5.75,3 8.68,3 C11.19,3 13.31,4.71 13.89,7.02 C14.39,6.8 14.93,6.68 15.5,6.68 C17.71,6.68 19.5,8.45 19.5,10.64 C19.5,12.83 17.71,14.6 15.5,14.6 L12.5,14.6"></path><polyline fill="none" stroke="#000" points="7.25 11.75 9.5 9.5 11.75 11.75"></polyline><path fill="none" stroke="#000" d="M9.5,18 L9.5,9.5"></path></svg></span>
                              <span class="uk-text-middle"></span>
                                                <a style="padding: 0; color: red;" uk-toggle="target: #modal-center" >Upload Files.</a>
                                   </div>
                                      </div>
</div> </div>

<div class="col-xl-12 pull-right">


                                  <div id="deo_docu">
                                  </div>
</div>

<div class="col-xl-3 pull-right">
           <div class="input-group input-group-sm mb-3">
  <button class="button full-width button-sliding-icon ripple-effect" form="login-form" onClick="postItGoTo('merchant_apply_reg.php','merchant_apply_succ.php'),hidePT(),ClearPost()">Save<i class="icon-material-outline-arrow-right-alt"></i></button>

        </div>
</div>



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
                
<!-- This is a button toggling the modal -->

<!-- This is an anchor toggling the modal -->

<!-- This is the modal -->

<div id="modal-center" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

        <button class="uk-modal-close-default" type="button" uk-close></button>
 <div class="uk-modal-header">
            <h2 class="uk-modal-title">Upload Documents</h2>
        </div>
         <?
include("merchant_apply_docs.php");
   ?>

    </div>
</div>

