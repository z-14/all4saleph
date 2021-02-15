<?
error_reporting(0);
include ("sessions.php");
include ("globalconfig.php");
include ('sql.php');
$u_u = $_SESSION["u_u"];
?>
<!-- Header Main -->
<style type="text/css">
  .container div
  {
    position: relative;
  }
</style>
      <div  class="container">
        <div class="row">

          <!-- Logo -->
        
          <!-- Search -->
          <div style="display: none;" class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
          
                    <div style="display: none;" class="deo_custom_dropdown">
                      <div class="deo_custom_dropdown_list">
                        <span style="display: none;" class="deo_custom_dropdown_placeholder clc">All Categories</span>
                        <ul class="deo_custom_list clc">
                        </ul>
                      </div>
                    </div>
                
                  </div>
          </div>
      </div>
    
    <!-- Main Navigation -->

    <nav class="deo_main_nav">
      <div class="container mg_left">
        <div class="row">
          <div class="col">
            
            <div class="deo_main_nav_content d-flex flex-row">

              <!-- Categories Menu -->

              <div class="deo_cat_menu_container">
                <div class="deo_cat_menu_title d-flex flex-row align-items-center justify-content-start">
                  <div class="deo_line"><span></span><span></span><span></span></div>
                  <div class="deo_cat_menu_text">categories</div>
                </div>

                <ul class="deo_cat_menu">
                
                
                  <li class="deo_sub">
                    <a href="#">Wholesale<i class="fas fa-chevron-right"></i></a>
                    <ul>
                      <!---
                      <li class="deo_sub">
                        <a href="#">Menu Item<i class="fas fa-chevron-right">
                        </i></a>
                        <ul>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                        </ul>
                      </li>
--->
  <?
                   include("sql.php");

                     $sql="SELECT * FROM product_categories WHERE `cat_type` = 'Wholesale' Limit 5"; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
           ?>
       <li class="deo_sub">
                        <a onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php?categories_id=<?echo $row["cat_name"];?>&cat_type=Wholesale&cat_id=<?echo $row["cat_id"];?>', true),HideMenu()" href="#"><?echo $row["cat_name"];?><i class="fas fa-chevron-right">
                        </i></a>
                        <ul>
                            <?
                          subcat($row["cat_id"],$row["cat_name"]);
                          ?>
                         
                        </ul>
                      </li>
                     
          <?
        }
        }
  
           ?>

                     <li class="last call"> 
                        <a onClick="javascript:ajaxpagefetcher.load('window','all_categories.php?cat_type=Wholesale', true),HideMenu()"href="#">All Wholesale Categories<i class="fas fa-chevron-right">
                        </i></a>
                      </li>

                        <li class="last call"> 
                        <a onClick="javascript:ajaxpagefetcher.load('window','supplier.php?cat_type=Wholesale', true),HideMenu()" href="#">View Supplier<i class="fas fa-chevron-right">
                        </i></a>
                      </li>
                     
                    </ul>
                  </li>




  

                     <li class="deo_sub">
                    <a href="#">Retail<i class="fas fa-chevron-right"></i></a>
                    <ul>
                      <!---
                      <li class="deo_sub">
                        <a href="#">Menu Item<i class="fas fa-chevron-right">
                        </i></a>
                        <ul>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                        </ul>
                      </li>
--->
  <?
                   include("sql.php");

                      $sql="SELECT * FROM product_categories WHERE `cat_type` = 'Retail' limit 5"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
           ?>
       <li class="deo_sub">
                        <a onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php?categories_id=<?echo $row["cat_name"];?>&cat_type=Retail&cat_id=<?echo $row["cat_id"];?>', true),HideMenu()"><?echo $row["cat_name"];?><i class="fas fa-chevron-right">
                        </i></a>
                        <ul>
                        <?
                          subcat($row["cat_id"],$row["cat_name"]);
                          ?>
                        </ul>
                      </li>
                     
          <?
        }
        }
  
           ?>

                     <li class="last call"> <a onClick="javascript:ajaxpagefetcher.load('window','all_categories.php?cat_type=Retail', true),HideMenu()" href="#">All Retail Categories<i class="fas fa-chevron-right">
                        </i></a>
                      </li>


                          <li class="last call">
                        <a onClick="javascript:ajaxpagefetcher.load('window','supplier.php?cat_type=Retail', true),HideMenu()" href="#">View Supplier<i class="fas fa-chevron-right">
                        </i></a>
                      </li>
                    
                     
                    </ul>
                  </li>


        <li class="deo_sub">
                    <a href="#">Others<i class="fas fa-chevron-right"></i></a>
                    <ul>
                      <!---
                      <li class="deo_sub">
                        <a href="#">Menu Item<i class="fas fa-chevron-right">
                        </i></a>
                        <ul>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                          <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                        </ul>
                      </li>
--->
  <?
                   include("sql.php");

                         include("sql.php");

                             $sql="SELECT * FROM product_categories WHERE `cat_type` = 'Others' limit 5"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {

           ?>
       <li class="deo_sub">
                        <a onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php?categories_id=<?echo $row["cat_name"];?>&cat_type=Retail&cat_id=<?echo $row["cat_id"];?>', true),HideMenu()"><?echo $row["cat_name"];?><i class="fas fa-chevron-right">
                        </i></a>
                        <ul>
                          <?
                        subcat($row["cat_id"],$row["cat_name"]);
                          ?>
                        </ul>
                      </li>
                     
          <?
        }
        }
  
           ?>

                      <li class="last call">
                        <a onClick="javascript:ajaxpagefetcher.load('window','all_categories.php?cat_type=Others', true),HideMenu()" href="#">All Others Categories<i class="fas fa-chevron-right">
                        </i></a>
                      </li>

                       <li class="last call">
                        <a onClick="javascript:ajaxpagefetcher.load('window','supplier.php?cat_type=Others', true),HideMenu()" href="#">View Supplier<i class="fas fa-chevron-right">
                        </i></a>
                      </li>
                     
                    </ul>
                  </li>



                </ul>
              </div>

              <!-- Main Nav Menu -->

              <div class="deo_main_nav_menu ml-20">
            <ul class="deo_standard_dropdown deo_main_nav_dropdown">
                  
                            
                            <?
                            if(!empty($_SESSION["u_id"])){
                            ?>
                  <li class="deo_sub">
                    <a href="#">Menu<i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'user_profile.php', true)">My Profile<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'wishlist_list.php', true)">My Wishlist<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="  javascript:ajaxpagefetcher.load('window', 'cart_list.php', true)">My Cart<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true)">Messages<i class="fas fa-chevron-down"></i></a></li> 
              <?
                        if($_SESSION['merchant'] > 0)
                                         {
                                         }
                                  
                                 else
                                 {
                                       ?>
      
                         <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_apply.php', true)">Be a merchant<i class="fas fa-chevron-down"></i></a></li> 
                                     <?
                                 }
                                 ?>

                                   <?
                          if($_SESSION["m"]=="mobile" || $_GET["m"]=="mobile"){
                                    ?>

    <li>
          <a href="#"onClick="Logout()">Logout<i class="fas fa-chevron-down"></i></a></li> 

                                    <?
                                    } else{
                                    ?>
  <li>
        <a href="#"onClick="Logout()">Logout<i class="fas fa-chevron-down"></i></a></li> 

                                    
                                    <?
                                    }
                                    ?>

                  
                    </ul>
                  </li>
<?
}
else
{
  ?>
      <li>     
 <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'login_mobile.php', true)">Login<i class="fas fa-chevron-down"></i></a></li>

                            
                            <?
}


?>

  <?
                             if($_SESSION['merchant'] > 0)
                                         {
                                 
                            ?>
                  <li class="deo_sub">
                    <a href="#">Merchant's <i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'product_image_first.php', true)">Sell an item<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_inventory_product.php', true)">Inventory<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true)">Messages<i class="fas fa-chevron-down"></i></a></li>

                    </ul>
                  </li>
<?
}?>

 <?
                            if($_SESSION['admin'] == "yes"){
                            ?>
           <li class="deo_sub">
                    <a href="#">Admin <i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li>

                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchant_list_new.php', true)">New merchant applications<i class="fas fa-chevron-down"></i></a></li>
             <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'admin_user_list.php', true)">User's list<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'admin_merchants_list.php', true)">Mechant's list<i class="fas fa-chevron-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'admin_item_management.php',true)">Item's management<i class="fas fa-chevron-down"></i></a>
                      </li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true)">Messages<i class="fas fa-chevron-down"></i></a>
                      </li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'add_categories.php', true)">Add Categories<i class="fas fa-chevron-down"></i></a>
                      </li>

                         <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'adding_sub.php', true)">Add related categories<i class="fas fa-chevron-down"></i></a>
                      </li>

                         <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'categories_management.php', true)">View all categories<i class="fas fa-chevron-down"></i></a>
                      </li>

                 </ul>
                  </li>
                  <?}?>

                </ul>
              </div>

              <!-- Menu Trigger -->

              <div class="deo_menu_trigger_container ml-auto">
                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                  <div class="deo_menu_burger">
                    <div class="deo_menu_trigger_text">menu</div>
                    <div class="deo_line deo_menu_burger_inner"><span></span><span></span><span></span></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- Menu -->

    <div class="deo_page_menu">
      <div class="container">
        <div class="row">
          <div class="col">
            
            <div class="deo_page_menu_content">
              
              <div class="deo_page_menu_search">
                <div action="#">
                  <input type="search" required="required" class="deo_page_menu_search_input" placeholder="Search for products...">
                </div>
              </div>
              <ul class="deo_page_menu_nav">
              <li class="deo_page_menu_item has-children">
                  <a href="#">Menu<i class="fa fa-angle-down"></i></a>
                  <ul class="deo_page_menu_selection">
                    <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'user_profile.php', true)">My Profile<i class="fas fa fa-angle-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'wishlist_list.php', true)">My Wishlist<i class="fas fa fa-angle-down"></i></a></li>

                        <li>
                        <a href="#"onClick="  javascript:ajaxpagefetcher.load('window', 'cart_list.php', true)">My Cart<i class="fas fa fa-angle-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true)">Messages<i class="fa fa-angle-down"></i></a></li> 
              <?
                        if($_SESSION['merchant'] > 0)
                                         {
                                         }
                                  
                                 else
                                 {
                                       ?>
      
                         <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_apply.php', true)">Be a merchant<i class="fa fa-angle-down"></i></a></li> 
                                     <?
                                 }
                                 ?>

                                   <?
                          if($_SESSION["m"]=="mobile" || $_GET["m"]=="mobile"){
                                    ?>

    <li>
          <a href="#"onClick="Logout()">Logout<i class="fa fa-angle-down"></i></a></li> 

                                    <?
                                    } else{
                                    ?>
  <li>
        <a href="#"onClick="Logout()">Logout<i class="fas fa-chevron-down"></i></a></li> 

                                    
                                    <?
                                    }
                                    ?>

                 
                  </ul>
                </li>

                <li class="deo_page_menu_item has-children">
                  <a href="#">Merchant<i class="fa fa-angle-down"></i></a>
                  <ul class="deo_page_menu_selection">
                    <?
                        if($_SESSION['merchant'] > 0)
                                         {
                                 
                            ?>
                  
                      <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'product_image_first.php', true)">Sell an item<i class="fa fa-angle-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_inventory_product.php', true)">Inventory<i class="fa fa-angle-down"></i></a></li>

                        <li>
                        <a href="#"onClick="javascript:ajaxpagefetcher.load('window', 'merchant_messages_list.php', true)">Messages<i class="fa fa-angle-down"></i></a></li>

              
<?
}?>
                  </ul>
                </li>
              
        
            
              </ul>
            
            </div>
          </div>
        </div>


</div>
</div>
<?
function subcat($cat_id,$categories_id)
{
include("sql.php");
$sql="SELECT * FROM product_subCat where cat_id ='$cat_id'";
    $result = $conn->query($sql);
           if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) 
                    {
                      ?>
 <li><a href="#" onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php?categories_id=<?echo $categories_id;?>&cat_type=<?echo $row["cat_type"];?>&sub_name=<?echo $row["sub_name"];?>&cat_id=<?echo $cat_id;?>', true),HideMenu()"><?echo $row["sub_name"];?><i class="fas fa-chevron-right"></i></a></li>
    <?

                    }
                  }
}

?>