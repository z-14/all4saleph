<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
userAccess($u_id);
if($_SESSION["u_u"] == "zylei14")
{
    ?>

<!-- Material form register -->

<!-- Material form register -->
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

<!--================Form Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="login_title">
                                <h2>User Profile</h2>
                            </div>
							
                            <form class="login_form row">
  
                               
                                
                               <div class="col-lg-6 form-group">
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


                <div class="col-lg-6 form-group">
                                     <textarea class="form-control" rows="5" cols="50" id="term" onchange="addtoPost('&term_condition='+this.value)" placeholder="Term and condition"></textarea>
                                </div>

                             
                         <div class="col-lg-6 form-group">
                                <button style="margin-top: 10px;" class="add_cart_btn  btn-block" onClick="postIt('user_profile_reg.php'),hidePT()" href="#">Save</button>
                              </div><!-- /col -->

   
                                
                                
                            </form>
                        </div> 
                        <div class="col-lg-4">
                            <div class="order_box_price">
                                <div class="payment_list">
                                    <div class="price_single_cost">
                                         <div class="l_p_text" style="float: left;">
                                   
                                </div>
                              
                                <br/>
                                <br/>
                                <div class="row">
                             
                                           <div id="product1" class="col-12 col-lg-12">
                                               
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


                                            <div id="product" class="col-12 col-lg-12">
                                           </div>
                                         <?php
                                    if (isset($_GET['action'])) 
                                    {
                                    include'user_imge.php';
                                    }
                                  ?>
        
                                   



                              </div>
                                    </div>
                                
                                </div>

            <button class="add_cart_btn btn-block form-control"  type="submit" onClick="javascript:ajaxpagefetcher.load('product','user_photo_upload.php?id=<?echo $u_id;?>', true),HideMenu()" >Add Photos</button> 

                                                                   
                                 
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
        </section>

<style type="text/css"></style>