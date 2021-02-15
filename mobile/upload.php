<?
include ("/opt/lampp/htdocs/sessions.php");
include ("/opt/lampp/htdocs/globalconfig.php");
include("/opt/lampp/htdocs/sql.php");
//include("/opt/lampp/htdocs/function_stringprotect.php");


if(!isset($_SESSION["u_u"])){
exit;
}


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
    $newFilePath = "".$_FILES['upload']['name'][$i];
	//$newFilePath = "uploads/" . $glp_comms."-".$title."-".$reg_date_num.$_FILES['upload']['type'][$i];
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here
		//print("Success! ");
		
		
      	//print("name: ". $_FILES['upload']['name'][$i] . " ");
      	//echo"<br>";
      	$filename = $_FILES['upload']['name'][$i];
      	$date=$reg_date_num;
      	include("/opt/lampp/htdocs/file_upload_dev_log.php");
      	$infos.="Uploaded > $filename <br>";
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>

<style>
    @font-face {
    font-family: ArtTrajanReg;
    src: url('./fonts/Trajan Pro Regular.ttf');
}

   @font-face {
    font-family: ArtMerriweather;
    src: url('./fonts/PT_Serif-Web-Regular.ttf');
}

html{
	font-family: ArtTrajanReg;
    color:  #400740;
   
}
input{
font-family: ArtMerriweather;
padding: 5px;
margin:1px;
color: #400740;
width: 100%;
}


.submit {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid white;
  font-family: ArtTrajanReg;
  color: #ffffff;
  font-size: 16px;
  background: #400740;
  padding: 10px 10px 10px 10px;
  text-decoration: none;
}
#no-more-tables{
width: 100%; background-color: rgba(255,255,255, 0.7);box-shadow: 0 0 5px #fff; display: inline-block;
}
.select {
    position: relative;
    display: inline-block;
    margin-bottom: 15px;
    margin-right; 2px;
    width: 100%;
}    .select select {
        font-family: 'Arial';
        display: inline-block;
        width: 100%;
        cursor: pointer;
        padding: 10px 21px;
        outline: 0;
        border: 0px solid #000000;
        border-radius: 0px;
        background: #ececec;
        color: #7B7B7B;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        font-size: 12px;
    }
        .select select::-ms-expand {
            display: none;
        }
        .select select:hover,
        .select select:focus {
            color: #000000;
            background: #CCCCCC;
        }
        .select select:disabled {
            opacity: 0.5;
            pointer-events: none;
        }
.select_arrow {
    position: absolute;
    top: 16px;
    right: 15px;
    width: 0;
    height: 0;
    pointer-events: none;
    border-style: solid;
    border-width: 8px 5px 0px 5px;
    border-color: #7B7B7B transparent transparent transparent;
}
.select select:hover ~ .select_arrow,
.select select:focus ~ .select_arrow {
    border-top-color: #000000;
}
.select select:disabled ~ .select_arrow {
    border-top-color: #CCCCCC;
}

.button {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  border: 1px solid white;
  font-family: ArtTrajanReg;
  color: #ffffff;
  font-size: 16px;
  background: #400740;
  padding: 10px 10px 10px 10px;
  text-decoration: none;
}

.button:hover {
  background: #291657;
  text-decoration: none;
}

.upload{
font-family: ArtTrajanReg;
padding: 5px;
}
</style>
</head>
<body>
<div style="width: 100%; background-color: rgba(255,255,255, 0.7);box-shadow: 0 0 5px #fff; padding: 20px;">
<h3>Upload</h3>


<div id="info"><? echo $infos; ?></div>

<form action="upload.php" method="post" enctype="multipart/form-data">

<table style="width: 60%">
<tr><td></td></tr>
    
<tr><td>Select Files:</td><td><input type="file" name="upload[]" class="upload" size="60" id="file" name="filename" accept="*/*" multiple></td></tr>
<tr><td><input type="submit" value="Upload" name="submit" class="button" onclick="showInfo()"></td><td></td></tr>
</table>

	
    
</div>

</form>
</div>
<script>
function showInfo(){
	document.getElementByID("info").innerHTML= "Please Wait Uploading";
}

</script>

</body>
</html>





