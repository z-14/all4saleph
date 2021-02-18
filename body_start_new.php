<?
//if($_GET["m"]=="mobile" || $_SESSION["m"]=="mobile"){
?>
<div id="art_header" style="">

<div id="cute_icons">

<div id="art_search"><input type="text" placeholder="Search" onchange="javascript:ajaxpagefetcher.load('window', 'search.php?search='+this.value, true)"> </div>
<div id="art_favorites" onClick="javascript:ajaxpagefetcher.load('window', 'wishlist_list.php', true)"></div>
<div id="art_sale" onClick="javascript:ajaxpagefetcher.load('window', 'shop_item_list.php', true)"></div>
</div>
<div id="art_tabs">
	<div class="art_tabs_title" onClick="javascript:ajaxpagefetcher.load('windowPoP', 'menu_mobile_new.php', true),showThisItem('windowPoP')">Menu</div>
	<div class="art_tabs_title" onClick="javascript:ajaxpagefetcher.load('window', 'shop_item_list.php', true)" >Browse</div>
	<div class="art_tabs_title" onClick="javascript:ajaxpagefetcher.load('window','shop_item_list.php', true)" >Categories</div>
	<div class="art_tabs_title" onClick="javascript:ajaxpagefetcher.load('window', 'user_profile.php', true)">Me</div>
</div>
<div class="owl-carousel owl-theme" style="width:103%; height: 150px; padding: 0px; left: -5px;">
	<div class="item" style="width: 100%; height: 145px; overflow: hidden;">
	
	</div>

	
</div>
</div>
<div class="top_spacer"></div>
<?
//}else{
?>
<div class="backbutton" onclick="backButton()"></div>

<?
//}
?>



