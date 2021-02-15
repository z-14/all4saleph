<?php 
echo "<a  onClick=\"javascript:ajaxpagefetcher.load('window', '".$_SERVER['PHP_SELF']."?".$variable."&page=0', true)\"> << </a>";


$prev = $page - 1;
if ($prev > -1){
echo " <a  onClick=\"javascript:ajaxpagefetcher.load('window', '".$_SERVER['PHP_SELF']."?".$variable."&page=$prev', true)\"> < </a> ";
//echo "<li><a href=\"graves.php?page=$prev\">previous</a></li>";
}


$pg_butts = 6;
for( $i = 0; $i < $pg_butts; $i++){   //$pg_butts
$i_num_fwd = $page + $i;
if ($i_num_fwd < $pages){
if ($i_num_fwd == 0){
}else{
echo " <a onClick=\"javascript:ajaxpagefetcher.load('window', '".$_SERVER['PHP_SELF']."?".$variable."&page=$i_num_fwd', true)\"> $i_num_fwd </a> ";
}
}
}

$next = $page + 1;
if ($next > $pages){}else{
echo " <a onClick=\"javascript:ajaxpagefetcher.load('window', '".$_SERVER['PHP_SELF']."?".$variable."&page=$next', true)\"> > </a> ";
}

$total_pages = round($pages);
echo " <a  onClick=\"javascript:ajaxpagefetcher.load('window', '".$_SERVER['PHP_SELF']."?".$variable."&page=$total_pages', true)\"> >> </a> ";


?>