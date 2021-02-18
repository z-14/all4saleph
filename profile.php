<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
userAccess($u_id);
if($_SESSION["u_u"] == "zylei14")
{
    ?>

    <?
}
$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];
$sql="SELECT * FROM user_profile WHERE u_id ='$u_id' LIMIT 0, 10 "; 
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
$photo = $row["photo"]; 
$fb_msgr = $row["fb_name"];
$salutation_info=$row["salutation"];
$term_condition = $row["term_condition"];
    
}
}




if(isset($_GET['delete_photo']))
{
  $image_id = $_GET['image_id'];
  $sql_del = "DELETE FROM `user_image` WHERE image_id = '$image_id'";
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



?>
    <div  class="deo_banner">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="deo_banner-header"><i class="fa fa-gear" aria-hidden="true"></i> Settings</h3>
                        
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
            <span><i class="fa fa-user" aria-hidden="true"></i> My Profile</span>
            </div>

<div class="col-lg-4" >
            <span style="float: right;"><a onclick="editProfile();">Edit Profile</a></span>
            </div>
               </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <center>
               <div class="profile_pic">
                    <?
                                      $sql="SELECT * FROM user_image WHERE u_id ='$u_id'"; 
                                 $result = $conn->query($sql);
                                     if ($result->num_rows > 0) {
                                       $row = $result->fetch_assoc();
                                             
                                                $image = $row["url"];
                                                ?>
                                 <img class="img-fluid" src="photos/<?echo $image;?>" alt="">

                                              <?
                                        }
                                        ?>
                                   
               </div>





               <div style="margin-left: 75px;" class="uploadButton" data-toggle="modal" data-target="#exampleModal">
                 <label class="uploadButton-button ripple-effect" for="uploadbtn">Upload Profile</label>
                </div>
                 </center>
               </div>

              <div class="col-xl-3">
                        <span  class="deo_span" >Firstname</span>
    <div class="input-group input-group-sm mb-3">
  <input class="form-control" type="text" value = "<? echo $firstname;?>" placeholder="Firstname" id="firstname" onchange="addtoPost('&firstname='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
      <div class="col-xl-3">
        <span  class="deo_span" >Middlename</span>
    <div class="input-group input-group-sm mb-3">
  <input class="form-control" type="text" value = "<? echo $middlename;?>" placeholder="Middlename " id="middlename" onchange="addtoPost('&middlename='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
      <div class="col-xl-3">
                <span  class="deo_span" >Surname</span>
    <div class="input-group input-group-sm mb-3">

<input class="form-control" type="text" value = "<? echo $surname;?>" placeholder="Surname " id="surname" onchange="addtoPost('&surname='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>

              </div>

              <div class="edit" id="edit" style="display: none;">

              <div style="margin-top: 20px;" class="row">
                   <div class="col-xl-3">
             <span  class="deo_span" >Salutation</span>
    <div class="input-group input-group-sm mb-3">

  <select class="form-control"  id="salutation" onchange="addtoPost('&salutation='+this.value)" onclick="anchorIt(this.id)">

                                    <?
                                      if($salutation_info == "Mr.")
                                      {
                                        ?>
                                        <option value=""><? echo $salutation_info; ?></option>
                      <option value="Mrs.">Mrs.</option>
                      <option value="Ms.">Ms.</option>
                      <?

                                      }
                                      else if($salutation_info == "Mrs.")
                                      {
                                          ?>
                                        <option value=""><? echo $salutation_info; ?></option>
                      <option value="Mr.">Mr.</option>
                      <option value="Ms.">Ms.</option>
                      <?
                                      }
                                      else if($salutation_info == "Ms.")
                                      {
                                          ?>
                                        <option value=""><? echo $salutation_info; ?></option>
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                      <?
                                      }
                                      else
                                      {
                                        ?>
                                        <option value="Ms.">Ms.</option>
                      <option value="Mr.">Mr.</option>
                      <option value="Mrs.">Mrs.</option>
                      <?
                                      }

                                    ?>
                                      
                                  </select>     <div class="input-group-prepend">
  </div>
</div>
</div>
  <div class="col-xl-3">
             <span  class="deo_span" >Name Extension</span>
    <div class="input-group input-group-sm mb-3">

 <input class="form-control" type="text" value = "<? echo $name_extension;?>" placeholder="Name Extension " id="nameextension" onchange="addtoPost('&name_extension='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
  <div class="col-xl-3">
             <span  class="deo_span" >Birthday</span>
    <div class="input-group input-group-sm mb-3">

 <input class="form-control" type="text"  value = "<? echo date("l j M Y", $birthday);?>" placeholder="Birthday " id="birthday" onchange="addtoPost('&birthday='+this.value)" oninput="getDate(this.id);"  onclick="getDate(this.id); anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>

  <div class="col-xl-3">
             <span  class="deo_span" >Address</span>
    <div class="input-group input-group-sm mb-3">

   <input class="form-control" type="text" value = "<? echo $address;?>" placeholder="Address " id="address" onchange="addtoPost('&address='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
  <div class="col-xl-2">
             <span  class="deo_span" >Bldg no.</span>
    <div class="input-group input-group-sm mb-3">

 <input class="form-control" type="text" value = "<? echo $address_bldg;?>" placeholder="Bldg No. " id="bldg" onchange="addtoPost('&address_bldg='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
  <div class="col-xl-2">
             <span  class="deo_span" >Zipcode</span>
    <div class="input-group input-group-sm mb-3">

    <input class="form-control" placeholder="" name="">
    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-2">
             <span  class="deo_span" >Street</span>
    <div class="input-group input-group-sm mb-3">

   <input class="form-control" type="text" value = "<? echo $address_street;?>" placeholder="Street " id="st" onchange="addtoPost('&address_street='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-3">
             <span  class="deo_span" >Brgy</span>
    <div class="input-group input-group-sm mb-3">

  <input class="form-control" type="text" value = "<? echo $address_brgy;?>" placeholder="Brgy " id="brgy" onchange="addtoPost('&address_brgy='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>
<div class="col-xl-3">
             <span  class="deo_span" >City</span>
    <div class="input-group input-group-sm mb-3">

 <input class="form-control" type="text" value = "<? echo $address_city;?>" placeholder="City " id="city" onchange="addtoPost('&address_city='+this.value)" onclick="anchorIt(this.id)" >    <div class="input-group-prepend">
  </div>
</div>
</div>

<div class="col-xl-12">
             <span  class="deo_span" >Term and condition</span>
    <div class="input-group input-group-sm mb-3">
  <textarea class="form-control" rows="5" cols="50" id="term" onchange="addtoPost('&term_condition='+this.value)" placeholder="Term and condition"></textarea>
 <div class="input-group-prepend">
  </div>
</div>
</div>

<div class="col-xl-3 pull-right">
           <div class="input-group input-group-sm mb-3">
  <button class="button full-width button-sliding-icon ripple-effect" onClick="postIt('user_profile_reg.php'),hidePT()" form="login-form">Save<i class="icon-material-outline-arrow-right-alt"></i></button>

        </div>
</div>



              </div>

            </div>
    </div>
    </div>
</div>
</div>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <?
include("user_photo_upload.php");
?>
      </div>
   
    </div>
  </div>
</div>



<style type="text/css">
  .deo_profile
  {
    padding: 0px;
    padding-top: 20px;
  }
</style>



























