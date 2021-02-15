<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");

//w_id 	u_id 	u_u 	w_amount 	w_date 	w_transaction_id 
$u_id = $_SESSION["u_id"];

$sql="SELECT * FROM wallet WHERE u_id ='$u_id' ORDER by w_date ASC;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$w_id = $row["w_id"];
$w_amount += $row["w_amount"];
$w_date = $row["w_date"];
$_SESSION["w_id"] = $w_id;


}
}else{

}



$qry_appr = "SELECT COUNT(*) as  total FROM `tour_joiner` WHERE u_id = '$u_id' and payment = 'yes'";
$qry_data = mysqli_query($conn, $qry_appr);
$approve_count = mysqli_fetch_array($qry_data);
$toatalCount = array_shift($approve_count);

?>

<div class="top_spacer"></div>
<div class="april29_menu_header"><div class="april29_menu_header_back_button" onclick="backButton()"></div> Wallet </div>

<div class="april29_input_text">
Amount<br>

	<input type="text" class="april29_input_box" placeholder="<? echo $w_amount; ?>" id="price" onchange="addtoPost('&price='+this.value)"  oninput="showPass('price: '+ this.value);" onclick="showPass('price: '+this.value),anchorIt(this.id),toggleClass(this.id);"  readonly>
</div>

<div class="april29_input_text">
Transactions History<br>
<input type="text" class="april29_input_box" placeholder="<? echo $toatalCount; ?>" id="intro" onchange="addtoPost('&intro='+this.value)"  oninput="showPass('intro: '+ this.value);" onclick="showPass('intro: '+this.value),anchorIt(this.id),toggleClass(this.id); " readonly>
</div>


<div class="april29_input_text">
Date<br>
<input type="text" placeholder="<?echo date("j M Y", $w_date); ?>" id="details" onchange="addtoPost('&details='+this.value)"  oninput="showPass('details: '+ this.value);" onclick="showPass('details: '+this.value),anchorIt(this.id),toggleClass(this.id);" readonly>

</div>

	<button class="april29_button" onClick="javascript:ajaxpagefetcher.load('window', 'transaction_history_list.php?w_id=<? echo $w_id; ?>', true),HideMenu()">Transaction history</button>

	<button class="april29_button" onClick="javascript:ajaxpagefetcher.load('window', 'wallet_cash_out_info.php?w_id=<? echo $w_id; ?>', true),HideMenu()">Cash out</button>

	<button class="april29_button" onClick="javascript:ajaxpagefetcher.load('window', 'wallet_cash_in_list.php?w_id=<? echo $w_id; ?>', true),HideMenu()">Cash in</button>





	<?
	//<select id="rank" onchange="addtoPost('&rank='+this.value)"   onclick="showPass('rank: '+this.value),anchorIt(this.id),toggleClass(this.id);">
						
					//	<option>High to Low</option>
					//	<option>Low to High</option>
					
	?>