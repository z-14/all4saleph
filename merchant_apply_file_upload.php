<?
include ("sessions.php");
include ("globalconfig.php");
include("sql.php");


$reg_date_num = mktime(date("H"),date("i"),date("s"), date("n") , date("j"), date("Y"));
//$files = array_filter($_FILES['upload']['name']); something like that to be used before processing files.
// Count # of uploaded files in array
$total = count($_FILES['upload']['name']);

// Loop through each file
for($i=0; $i<$total; $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "merchant_docs/" .$reg_date_num."-".$_FILES['upload']['name'][$i];
	//$newFilePath = "uploads/" . $glp_comms."-".$title."-".$reg_date_num.$_FILES['upload']['type'][$i];
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here
		//print("Success! ");
		
		
      	//print("name: ". $_FILES['upload']['name'][$i] . " ");
      	//echo"<br>";
      	$file_name = $reg_date_num."-".$_FILES['upload']['name'][$i];
      	$date=$reg_date_num;
      	include("merchant_file_upload_save_data.php");
      	//$infos.="Uploaded > $file_name <br>";
      	echo "success";
    }
  }
}
exit;
?>