<?
include ("sessions.php");
include ("globalconfig.php");
include("sql.php");

?>


<?


function markedAsPop($n_id){
include("sql.php");
$sql2="UPDATE `notif` SET n_pop='yes' WHERE `n_id` = '$n_id'";
if ($conn->query($sql2) === TRUE) {

    //echo "successfully updated";
} else {
    echo $sql."Error updating record: " . $conn->error;
}

}




$sql="SELECT * FROM notif WHERE n_to ='$u_id' AND n_pop='' ORDER BY n_id DESC;"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$n_from=$row["n_from"];
$n_to=$row["n_to"];
$n_details=$row["n_details"];
$n_page=$row["n_page"];
$notifid = $row["n_id"] . "_notif";
markedAsPop($row["n_id"]);
?>
<div class="popNotifsArt" id="<? echo $notifid; ?>"onclick="javascript:ajaxpagefetcher.load('window', '<? echo $n_page; ?>', true), hideThisItem('<? echo $notifid; ?>')">
<?
echo $n_details;
?>


</div>
<?

}
} else{
?>
<?
}
?>


