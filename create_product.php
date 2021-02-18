<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];


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





?>


<div style="height: 2rem;" >
         
 </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-4 centered">
          <div class="deo_card_container deo_card_create  deo_card_shadow">
            <div class="col-xl-12">
           <div class="input-group input-group-sm mb-3">
  <div class="uk-card" data-toggle="modal" data-target="#exampleModal" style="width: 100%;">
          <div class="uk-placeholder uk-text-center">
           <span uk-icon="icon: cloud-upload" class="uk-icon"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="cloud-upload"><path fill="none" stroke="#000" stroke-width="1.1" d="M6.5,14.61 L3.75,14.61 C1.96,14.61 0.5,13.17 0.5,11.39 C0.5,9.76 1.72,8.41 3.31,8.2 C3.38,5.31 5.75,3 8.68,3 C11.19,3 13.31,4.71 13.89,7.02 C14.39,6.8 14.93,6.68 15.5,6.68 C17.71,6.68 19.5,8.45 19.5,10.64 C19.5,12.83 17.71,14.6 15.5,14.6 L12.5,14.6"></path><polyline fill="none" stroke="#000" points="7.25 11.75 9.5 9.5 11.75 11.75"></polyline><path fill="none" stroke="#000" d="M9.5,18 L9.5,9.5"></path></svg></span>
               <span class="uk-text-middle"></span>
                     <a style="padding: 0; color: red;"  uk-toggle="">Upload Photos</a>
                                   </div>
                                      </div>
</div> </div>

<div class="row">
  
<div id="p_im" class="container row col-lg-12 "></div>
 
</div>


</div>
 

        </div>
   <div class="col-lg-8">
                        <div class="cart_items">
                            <h3></h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
                                      <div class="row">
                                      <div class="col-12 col-lg-12 p-0">
                                         <div class="container mt-3 mb-4">


 <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12 px-0 pr-lg-2 mb-2 mb-lg-0">
          <div class="card border-light bg-white card proviewcard shadow-sm">
 <div class="card-header">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">


 <div class="col-xl-12">
              <span  class="deo_span" >Choose a category</span>
    <div class="input-group input-group-sm mb-3">
      <select class="form-control" onchange="next('sub','sub_menu.php?c_id='+this.value,true)" title="Select Category" id="category" >

        <?
        include("sql.php");

             $sql="SELECT * FROM product_categories WHERE `cat_type` = '$merchant_type'"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
?>
<option value="" disabled selected>Please Select Categories</option>
<?

        while($row = $result->fetch_assoc())  
        {



?>
               <option value="<?echo $row["cat_id"]."=".$row["cat_name"];?>"><?echo $row["cat_name"];?></option>
<?

        }

      }



        $sql="SELECT * FROM product_categories WHERE `cat_type` = 'Others'"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {

?>
               <option value="<?echo $row["cat_id"]."=".$row["cat_name"]."=Others";?>"><?echo $row["cat_name"];?></option>
<?

        }

      }
      ?>






  </select>


</div>
</div>

<div id="sub">
  
            <div id="field"></div>
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

</div>


</div>
          
    
                                    
                                    </tbody>
                                </table>
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
        <h5 class="modal-title" id="exampleModalLabel">Upload product images</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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



  <style type="text/css">
              .select-box {
position: relative;
display: block;
font-family: 'Rubik', sans-serif;
color: #232323;
font-size: 18px;
font-weight: 600;
}
@media (min-width: 768px) {
  .select-box {
    width: 70%;
  }
}
@media (min-width: 992px) {
  .select-box {
    width: 50%;
  }
}
@media (min-width: 1200px) {
  .select-box {
    width: 30%;
  }
}
.select-box__current {
  position: relative;
  box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(0,0,0,.125);
  cursor: pointer;
  outline: none;
}
.select-box__current:focus + .select-box__list {
  opacity: 1;
  -webkit-animation-name: none;
          animation-name: none;
}
.select-box__current:focus + .select-box__list .select-box__option {
  cursor: pointer;
}
.select-box__current:focus .select-box__icon {
  -webkit-transform: translateY(-50%) rotate(180deg);
          transform: translateY(-50%) rotate(180deg);
}
.select-box__icon {
  position: absolute;
  top: 50%;
  right: 15px;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  width: 20px;
  opacity: 0.3;
  transition: 0.2s ease;
}
.select-box__value {
  display: flex;
}
.select-box__input {
  display: none;
}
.select-box__input:checked + .select-box__input-text {
  display: block;
}
.select-box__input-text {
  display: none;
  width: 100%;
  margin: 0;
  padding: 15px;
  background-color: #fff;
}
.select-box__list {
 z-index: 9999;
  position: absolute;
  width: 100%;
  padding: 0;
  list-style: none;
  opacity: 0;
  -webkit-animation-name: HideList;
          animation-name: HideList;
  -webkit-animation-duration: 0.5s;
          animation-duration: 0.5s;
  -webkit-animation-delay: 0.5s;
          animation-delay: 0.5s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: step-start;
          animation-timing-function: step-start;
  box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
}
.select-box__option {
  display: block;
  padding: 15px;
  background-color: #fff;
}
.select-box__option:hover, .select-box__option:focus {
  color: #546c84;
  background-color: #fbfbfb;
}

@-webkit-keyframes HideList {
  from {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
  to {
    -webkit-transform: scaleY(0);
            transform: scaleY(0);
  }
}

@keyframes HideList {
  from {
    -webkit-transform: scaleY(1);
            transform: scaleY(1);
  }
  to {
    -webkit-transform: scaleY(0);
            transform: scaleY(0);
  }
}

            </style>



       


