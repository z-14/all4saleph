<?

include("sql.php");
include("sessions.php");

$u_u = $_SESSION["u_u"];


function sub_cat($cat_id,$cat,$cat_name,$type)
{
  $deo_cat = $cat;

   

    include("sql.php");
    $sql="SELECT * FROM product_subCat where cat_id = '$cat_id' Order by s_id asc"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
      ?>



  <div  class="dropdown">

         <a  class="text-white dropdown-item  display-4 deo_collapse deo_show_coll " aria-expanded="false"  data-toggle="dropdown-submenu"><i class="fa fa-caret-left" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<span class=""  onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')"><?echo $cat;?></span></a>

         <a  class="text-white dropdown-item  display-4  deo_hide_coll dropdown-toggle" style="display: none;" aria-expanded="false"  data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span class="" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" onclick="next('window','shop.php?type=<?echo $type; ?>&cat=<?echo $cat_name;?>')"><?echo  $deo_cat;?></span></a>

       

    <div class="dropdown-menu dropdown-submenu p-2">


         <?
      while($row = $result->fetch_assoc())
       { 
        ?>

 
             <a class="text-white dropdown-item display-4 dd deo_collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"onclick="next('window','shop.php?type=<?echo $type;?>&cat=<?echo $cat_name;?>&sub=<?echo  $row["sub_name"];?>');" ><span class="dd"><?echo $row["sub_name"];?></span></a>

      
        <?
       }


      ?>
       </div>
 </div>

      <?
   }else
   {
?>
  <div  class="dropdown">
         <a  class="text-white dropdown-item  display-4 deo_show_coll " aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','shop.php?type=<?echo $type;?>&cat=<?echo $cat_name;?>');"><?echo $cat;?></span></a>

          <a  class="text-white dropdown-item  display-4 deo_hide_coll"style="display: none;"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span onclick="next('window','shop.php?type=<?echo $type;?>&cat=<?echo $cat_name;?>');"><?echo $deo_cat;?></span></a>
       </div>

<?



   }
 }

        

  ?>


  <?

?>  

  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">
   
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
       
           <div class="menu-logo mobile_view">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="logo1.png"  style="height: 4.5rem; margin-top: 5px;">
                    </a>
                </span>
                
            </div>
        </div>                 
     

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

   
          <div class="col-lg-6 p-0">

             <div class="header-search">
                                <div class="col-lg-12" style="width: 100%;">
                                    <select class="input-select" id="deo_cat_id">
                                      <option value="" disabled selected>Categories</option>
                                        <option value="Wholesale">Wholesale</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <input class="input" onchange="deo_head_search(this.value,'deo_cat_id')" id="d_seach_head" placeholder="Search here">
                                    <button class="search-btn">Search</button>
                                </div>
                    </div>
                  </div>

           <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">


       <li class="nav-item dropdown" >
                <a style="font-weight: 650;"  class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbr-iconfont mbr-iconfont-btn"></span>
                     Wholesale
                    </a>
                    <div class="dropdown-menu">
<div style="background-color: #50312f; padding-top: 5px; padding-bottom:5px; border-radius: 5px;">
                  
             

 
<!---start-->
<?
    include("sql.php");
    $sql="SELECT * FROM product_categories where cat_type = 'Wholesale' Order by cat_id asc"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 

          $cat_id=$row["cat_id"];
          $cat_name=$row["cat_name"];
          $cat=$row["cat_name"];
          $name="Wholesale";
 sub_cat($cat_id,$cat,$cat_name,$name);

       }
     }
?>
    
<!--end -->
              

            </div>

          </div>
<!---end --->
                </li>

                <li class="nav-item dropdown" >
                <a style="font-weight: 650;"  class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbr-iconfont mbr-iconfont-btn"></span>
                       Retail
                    </a>
                    <div class="dropdown-menu">
<div style="background-color: #50312f; padding-top: 5px; padding-bottom:5px; border-radius: 5px;">
                 

<!---start-->
              <?




    include("sql.php");
    $sql="SELECT * FROM product_categories where cat_type = 'Retail' Order by cat_id asc"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 

          $cat_id=$row["cat_id"];
          $cat_name=$row["cat_name"];
          $cat=$row["cat_name"];
          $name="Retail";
 sub_cat($cat_id,$cat,$cat_name,$name);


       }
     }


              ?>


                           

                           
                        

                   




            </div>
          </div>
<!---end-->


                </li>

                 <li class="nav-item dropdown" >
                <a style="font-weight: 650;"  class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbr-iconfont mbr-iconfont-btn"></span>
                       Others
                    </a>
                    <div class="dropdown-menu">
<div style="background-color: #50312f; padding-top: 5px; padding-bottom:5px; border-radius: 5px;">

                      
<!---start-->
              <?




    include("sql.php");
    $sql="SELECT * FROM product_categories where cat_type = 'Others' Order by cat_id asc"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
       { 

          $cat_id=$row["cat_id"];
          $cat_name=$row["cat_name"];
          $cat=$row["cat_name"];
          $name="Others";

        

 sub_cat($cat_id,$cat,$cat_name,$name);

       }
     }


              ?>
                      

       
             



            </div>
            </div>
<!---end --->
                </li>

 <?
                   if(!empty($u_id)){
                       ?>
                <li class="nav-item dropdown" >


                <a  style="font-weight: 650; border-radius: 5px;" class="nav-link link text-white dropdown-toggle  display-4 " data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbr-iconfont mbr-iconfont-btn"></span>
                       Menu
                    </a>

        


                    <div class="dropdown-menu">
<div style="background-color: #50312f; padding-top: 5px; padding-bottom:5px; border-radius: 5px;">

     <div class="dropdown">

                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','profile.php');">My Profile</span></a>

               <a onclick="next('window','profile.php');"  class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >My Profile</span></a>


                </div>
<?
   
              if($_SESSION['merchant'] <=0){
              ?>

                 <div class="dropdown">
                        <a  class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="doc_mer(), next('window','merchant_apply.php');">Be a Merchant</span></a>

 <a  onclick="next('window','merchant_apply.php');" class="text-white dropdown-item  display-4 deo_hide_coll"style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >Be a Merchant</span></a>







                </div>


<?
}?>
                 <div class="dropdown">
                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','wishlist.php');">My Wishlist</span></a>



                 <a onclick="next('window','wishlist.php');" class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >My Wishlist</span></a>



                       

                </div>

                 <div class="dropdown">
        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','cart.php');">My Cart</span></a>


          <a onclick="next('window','cart.php');"  class="text-white dropdown-item  display-4 deo_hide_coll"  style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >My Cart</span></a>

                </div>

                   <div class="dropdown">

                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','inbox.php');">Inbox</span></a>

                        <a  onclick="next('window','inbox.php');"  class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >Inbox</span></a>


                </div>

                 <div class="dropdown">
                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onClick="Logout()">Logout</span></a>


                         <a  onClick="Logout()" class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >Logout</span></a>

                </div>

         
            </div>

                </li>

                <?

              }?>

              <?
              if($_SESSION['merchant'] > 0){
              ?>
              

                 <li class="nav-item dropdown" >
                <a class="nav-link link text-white  dropdown-toggle  display-4" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbr-iconfont mbr-iconfont-btn"></span>
                       Merchant
                    </a>
                    <div class="dropdown-menu">
<div style="background-color: #50312f; padding-top: 5px; padding-bottom:5px; border-radius: 5px;">

                <div class="dropdown">


                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','create_product.php');">Sell an Items</span></a>

                        <a  onclick="next('window','create_product.php');" class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >Sell an Items</span></a>

                </div>

                   <div class="dropdown">
                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','inventory.php');">Inventory</span></a>


                         <a onclick="next('window','inventory.php');"  class="text-white dropdown-item  display-4 deo_hide_coll"style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >Inventory</span></a>

                </div>


            <div class="dropdown">

                        <a   class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','inbox.php');">Inbox</span></a>

                          <a  onclick="next('window','inbox.php');" class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span >Inbox</span></a>

                </div>

        
           

            </div>
</div>
                </li>

                <?

              }?>
<?if(empty($u_u))
{?>
                <li class="nav-item">
                    <a  style="font-weight: 650;"  onclick="next('window','login.php')" class="nav-link link text-white display-4 deo_show_coll">
                        Login
                    </a>

                       <a onclick="next('window','login.php')" style="font-weight: 650; display: none; float: left;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"  aria-expanded="false" data-toggle="dropdown-submenu"  class="nav-link link text-white display-4 deo_hide_coll">
                        Login
                    </a>
                </li>

                <?}?>

                <?
                 if($_SESSION['admin'] == "yes")
                 {

?>
   <li class="nav-item dropdown" >
                <a class="nav-link link text-white  dropdown-toggle  display-4" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mbr-iconfont mbr-iconfont-btn"></span>
                       Admin
                    </a>
                    <div class="dropdown-menu">
<div style="background-color: #50312f; padding-top: 5px; padding-bottom:5px; border-radius: 5px;">

                 <div class="dropdown">

                        <a    class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span  onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new.php', true)" >New merchant applications  </span></a>

                          <a    class="text-white dropdown-item  display-4 deo_show_coll" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span  onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchants_list.php', true)" >Merchant List</span></a>


                          <a  onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new.php', true)"   class="text-white dropdown-item  display-4 deo_hide_coll" style="display: none; "data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">&nbsp;&nbsp;&nbsp;<span  >New merchant applications  </span></a>

                </div>


            <div class="dropdown">

                        <a   class="text-white dropdown-item  display-4" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','home_page_setting.php ')">Homepage setting</span></a>



                </div>
                   <div  class="dropdown">
                        <a  class="text-white dropdown-item  display-4" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','add_categories.php')">Add Categories</span></a>

                </div>

                 <div  class="dropdown">
                        <a  class="text-white dropdown-item  display-4" aria-expanded="false" data-toggle="dropdown-submenu">&nbsp;&nbsp;&nbsp;<span onclick="next('window','add_subcat.php')">Add SubCategories</span></a>

                </div>


        
           

            </div>
</div>
                </li>
<?


}
                ?>

            </ul>
         
        </div>
    </nav>
</section>
<style type="text/css">
    .deo_nav_l
{

}

.dd
{
padding-top: 10px;
padding-bottom: 10px;
align-items: center;
justify-content: left;
}

@media only screen and (max-width: 480px)
 {
.deo_nav_l
{
  margin-left: 0px;
}


}

@media only screen and (max-width: 991px)
 {
  .mobile_view
{
  display: block;
}

.main_view
{
  display: none;
}
.deo_show_coll
{
  display: none !important;
}
.deo_hide_coll
{
  display: block !important;
  font-size: 16px!important;

}

.navbar-toggleable-sm .nav-dropdown .dropdown-submenu
{
   left: 0px !important;
}
}
.deo_show_coll
{
  display: block;
}
.deo_hide_coll
{
  display: none;
}



nav-item, a:hover
{
  color:inherit;
}
.cid-qTkzRZLJNu .dropdown .dropdown-menu {
    text-align: left !important;
}
.navbar-toggleable-sm .nav-dropdown .dropdown-submenu {

    left: -102%;
    margin-left: 0.125rem;
   margin-top: -5px;
    top: 0;
    background-color: #50312f;
}

.navbar-dropdown.bg-color.transparent {
    background: #50312f;
}

.header-search div .input-select
{
  font-weight: 500;
}

.nav-dropdown .dropdown-item
{
  font-size: 14px;
}

.deo_left
{
  float: left;
}

</style>