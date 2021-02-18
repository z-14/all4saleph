<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("access.php");
$u_u = $_SESSION["u_u"];
$u_id = $_SESSION["u_id"];


?>
 <div  class="deo_banner">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="deo_banner-header"><i class="fa fa-gear" aria-hidden="true"></i> Home page setting</h3>
                        
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 centered">
          <div class="deo_card_container deo_card_create  deo_card_shadow">
            <div class="col-xl-12">
              </div>

<div class="row">
  
                            
<?
include("sql.php");
  $sql2="SELECT * FROM mission  ORDER by m_id desc LIMIT 0, 1"; 
    $result = $conn->query($sql2);
        //$result = $conn->query($sql);
            if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                        {  
                            $mission=$row["mission"];
                            $big_blog=$row["big_blog"];
                            $left_blog=$row["left_blog"];
                            $right_blog=$row["right_blog"];
                             $left_image='photos/'.$row['left_image']; 
                           $right_image='photos/'.$row['right_image']; 
                           $paralax='photos/'.$row['paralax']; 

                      ?>
                     
           <?
             }

                      }
                      ?>
   <div class="form-group col-lg-12">
      <img  style="text-align: center;" src="<?echo $paralax;?>" height="200" width="200">

    </div> 
      <div  class="form-group col-lg-4">
<p style="text-align: center;" data-toggle="modal"  data-target="#exampleModal" onclick="gogo('paralax')" style="margin-top: 10px"><a> Edit image</a></p>
</div>

 <div class="form-group col-lg-12">

            <label for="product_desc"><span class="deo_span">MISION</span></label>
           <textarea type="text" id="product_desc"  placeholder="MISION" onchange="addtoPost('&mission='+this.value)" class="form-control" ><?echo $mission; ?></textarea>
                        </div> 

                         <div class="form-group col-lg-12">

            <label for="product_desc"><span class="deo_span">Blog Big</span></label>
           <textarea type="text" id="product_desc"  placeholder="Blog1.." onchange="addtoPost('&big_blog='+this.value)" class="form-control" ><?echo $big_blog; ?></textarea>
                        </div> 
                 


                         <div class="form-group col-lg-8">

            <label for="product_desc"><span class="deo_span">Blog Left</span></label>
           <textarea type="text" id="product_desc"  placeholder="Blog2.." onchange="addtoPost('&left_blog='+this.value)" class="form-control" ><?echo $left_blog ; ?></textarea>
                        </div> 
                         <div class="form-group col-lg-4">
<div style="text-align: center;">
  <img src="<?echo $left_image;?>" width="100" height="100">
</div>

<p style="text-align: center;" data-toggle="modal"  data-target="#exampleModal" onclick="gogo('left_blog')" style="margin-top: 10px"><a> Edit image</a></p>
</div>
                         <div class="form-group col-lg-8">

            <label for="product_desc"><span class="deo_span">Blog Right</span></label>
           <textarea type="text" id="product_desc"  placeholder="Blog2.." onchange="addtoPost('&right_blog='+this.value)" class="form-control" ><?echo $right_blog ; ?></textarea>
                        </div> 
                         <div class="form-group col-lg-4">
<div style="text-align: center;">
  <img src="<?echo $right_image;?>" width="100" height="100">
</div>

<p style="text-align: center;" data-toggle="modal"  data-target="#exampleModal" onclick="gogo('right_blog')" style="margin-top: 10px"><a> Edit image</a></p>
</div>
                        <div class="form-group col-lg-12" >
                          <div class="container">
                            <div class="row">
<div class="col-md-12 col-lg-12">
 <button style="margin-top: 10px;" class="button full-width button-sliding-icon ripple-effect  btn-block" onClick="postIt('mission_reg.php'),hideMe('windowPoP')">Save</button>

                              </div><!-- /col -->
                               <!-- /col -->

                            </div><!-- /row --> 
</div>

                        </div>

                        <hr>
 <div class="form-group col-lg-12" >
<span class="deo_span" style="font-size:  30px;">Retail</span>
</div>

                        <?

 $sql="SELECT * FROM product_categories where cat_type = 'Retail'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{

if(empty($row['image']))
{
  $image="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
}
else
{
  $image='photos/'.$row['image'];
}

?>
<div class="form-group col-lg-6" >
<span class="deo_span"><?echo $productName = $row["cat_name"];?></span>
<?
  if ($row['big_box']=="yes") 
  {

    $yy=$row["big_box"];
     ?>

        <div class="custom-control custom-switch">
  <input checked onclick="get_cat((this.id),'<?echo$yy;?>')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b.<?echo $row["cat_id"]?>">Big Box</label>
</div>

  <?
  }
  else
  {
     ?>

        <div class="custom-control custom-switch">
  <input onclick="get_cat((this.id),'no')" type="checkbox" name="big_cat" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b.<?echo $row["cat_id"]?>">Big Box</label>
</div>



  <?
  }

if($row['small_box1']=="yes")
{
?>
  <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box1')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t1.<?echo $row["cat_id"]?>">Small Box top 1</label>
</div>

<?
}
else
{
  ?>
  <div class="custom-control custom-switch">
  <input  onclick="get_small_box((this.id),'yes','small_box1')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t1.<?echo $row["cat_id"]?>">Small Box top 1</label>
</div>

<?
}
if($row['small_box2']=="yes")
{
?>
 <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box2')"  type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t2.<?echo $row["cat_id"]?>">Small Box top 2</label>
</div>
<?
}
else
{
  ?>
 <div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box2')"  type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t2.<?echo $row["cat_id"]?>">Small Box top 2</label>
</div>
<?
}

if($row['small_box3']=="yes")

{
  ?>

  <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box3')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b1.<?echo $row["cat_id"]?>">Small Box Bottom 1</label>
</div>


  <?
}
else
{
    ?>

<div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box3')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b1.<?echo $row["cat_id"]?>">Small Box Bottom 1</label>
</div>
  <?
}

if($row['small_box4']=="yes")

{
  ?>

  <div class="custom-control custom-switch">
  <input  checked onclick="get_small_box((this.id),'no','small_box4')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b2.<?echo $row["cat_id"]?>">Small Box Bottom 2</label>
</div>

  <?
}
else
{
   ?>

  <div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box4')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b2.<?echo $row["cat_id"]?>">Small Box Bottom 2</label>
</div>

  <?
}


?>

<div id="<?echo $row["cat_id"]?>">
  <img src="<?php echo $image;?>" width="50" height="50">
</div>

<p data-toggle="modal"  data-target="#exampleModal" onclick="gogo(<?echo $row["cat_id"]?>),cat_image(<?echo $row["cat_id"]?>);" style="margin-top: 10px"><a> Edit image</a></p>
</div>
 <?
  
     
}
}

?>

                        <hr>
 <div class="form-group col-lg-12" >
<span class="deo_span" style="font-size:  30px;">Wholesale</span>
</div>

                        <?

 $sql="SELECT * FROM product_categories where cat_type = 'Wholesale'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{

if(empty($row['image']))
{
  $image="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
}
else
{
  $image='photos/'.$row['image'];
}

?>
<div class="form-group col-lg-6" >
<span class="deo_span"><?echo $productName = $row["cat_name"];?></span>
<?
  if ($row['big_box']=="yes") 
  {

    $yy=$row["big_box"];
     ?>

        <div class="custom-control custom-switch">
  <input checked onclick="get_cat((this.id),'<?echo$yy;?>')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b.<?echo $row["cat_id"]?>">Big Box</label>
</div>

  <?
  }
  else
  {
     ?>

        <div class="custom-control custom-switch">
  <input onclick="get_cat((this.id),'no')" type="checkbox" name="big_cat" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b.<?echo $row["cat_id"]?>">Big Box</label>
</div>



  <?
  }

if($row['small_box1']=="yes")
{
?>
  <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box1')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t1.<?echo $row["cat_id"]?>">Small Box top 1</label>
</div>

<?
}
else
{
  ?>
  <div class="custom-control custom-switch">
  <input  onclick="get_small_box((this.id),'yes','small_box1')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t1.<?echo $row["cat_id"]?>">Small Box top 1</label>
</div>

<?
}
if($row['small_box2']=="yes")
{
?>
 <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box2')"  type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t2.<?echo $row["cat_id"]?>">Small Box top 2</label>
</div>
<?
}
else
{
  ?>
 <div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box2')"  type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t2.<?echo $row["cat_id"]?>">Small Box top 2</label>
</div>
<?
}

if($row['small_box3']=="yes")

{
  ?>

  <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box3')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b1.<?echo $row["cat_id"]?>">Small Box Bottom 1</label>
</div>


  <?
}
else
{
    ?>

<div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box3')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b1.<?echo $row["cat_id"]?>">Small Box Bottom 1</label>
</div>
  <?
}

if($row['small_box4']=="yes")

{
  ?>

  <div class="custom-control custom-switch">
  <input  checked onclick="get_small_box((this.id),'no','small_box4')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b2.<?echo $row["cat_id"]?>">Small Box Bottom 2</label>
</div>

  <?
}
else
{
   ?>

  <div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box4')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b2.<?echo $row["cat_id"]?>">Small Box Bottom 2</label>
</div>

  <?
}


?>

<div id="<?echo $row["cat_id"]?>">
  <img src="<?php echo $image;?>" width="50" height="50">
</div>

<p data-toggle="modal"  data-target="#exampleModal" onclick="gogo(<?echo $row["cat_id"]?>),cat_image(<?echo $row["cat_id"]?>);" style="margin-top: 10px"><a> Edit image</a></p>
</div>
 <?
  
     
}
}

?>
  <hr>
 <div class="form-group col-lg-12" >
<span class="deo_span" style="font-size:  30px;">Others</span>
</div>

                        <?

 $sql="SELECT * FROM product_categories where cat_type = 'Others'";
     $result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 
while($row = $result->fetch_assoc()) 
{

if(empty($row['image']))
{
  $image="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg";
}
else
{
  $image='photos/'.$row['image'];
}

?>
<div class="form-group col-lg-6" >
<span class="deo_span"><?echo $productName = $row["cat_name"];?></span>
<?
  if ($row['big_box']=="yes") 
  {

    $yy=$row["big_box"];
     ?>

        <div class="custom-control custom-switch">
  <input checked onclick="get_cat((this.id),'<?echo$yy;?>')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b.<?echo $row["cat_id"]?>">Big Box</label>
</div>

  <?
  }
  else
  {
     ?>

        <div class="custom-control custom-switch">
  <input onclick="get_cat((this.id),'no')" type="checkbox" name="big_cat" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b.<?echo $row["cat_id"]?>">Big Box</label>
</div>



  <?
  }

if($row['small_box1']=="yes")
{
?>
  <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box1')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t1.<?echo $row["cat_id"]?>">Small Box top 1</label>
</div>

<?
}
else
{
  ?>
  <div class="custom-control custom-switch">
  <input  onclick="get_small_box((this.id),'yes','small_box1')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t1.<?echo $row["cat_id"]?>">Small Box top 1</label>
</div>

<?
}
if($row['small_box2']=="yes")
{
?>
 <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box2')"  type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t2.<?echo $row["cat_id"]?>">Small Box top 2</label>
</div>
<?
}
else
{
  ?>
 <div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box2')"  type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="t2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="t2.<?echo $row["cat_id"]?>">Small Box top 2</label>
</div>
<?
}

if($row['small_box3']=="yes")

{
  ?>

  <div class="custom-control custom-switch">
  <input checked  onclick="get_small_box((this.id),'no','small_box3')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b1.<?echo $row["cat_id"]?>">Small Box Bottom 1</label>
</div>


  <?
}
else
{
    ?>

<div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box3')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b1.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b1.<?echo $row["cat_id"]?>">Small Box Bottom 1</label>
</div>
  <?
}

if($row['small_box4']=="yes")

{
  ?>

  <div class="custom-control custom-switch">
  <input  checked onclick="get_small_box((this.id),'no','small_box4')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b2.<?echo $row["cat_id"]?>">Small Box Bottom 2</label>
</div>

  <?
}
else
{
   ?>

  <div class="custom-control custom-switch">
  <input   onclick="get_small_box((this.id),'yes','small_box4')" type="checkbox" name="<?echo $row["cat_id"]?>" value="<?echo $row["cat_id"]?>" class="custom-control-input" id="b2.<?echo $row["cat_id"]?>">
  <label class="custom-control-label" for="b2.<?echo $row["cat_id"]?>">Small Box Bottom 2</label>
</div>

  <?
}


?>

<div id="<?echo $row["cat_id"]?>">
  <img src="<?php echo $image;?>" width="50" height="50">
</div>

<p data-toggle="modal"  data-target="#exampleModal" onclick="gogo(<?echo $row["cat_id"]?>),cat_image(<?echo $row["cat_id"]?>);" style="margin-top: 10px"><a> Edit image</a></p>
</div>
 <?
  
     
}
}

?>

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
   include("cat_upload.php")
   ?>
      </div>
   
    </div>
  </div>
</div>
<!-- Modal -->





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



       


