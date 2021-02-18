<?
include ("sessions.php");
include ("globalconfig.php");
include("sql.php");

$user_photo = $_SESSION["user_photo"];
$product_id = $_SESSION["cat_image"];
$_SESSION["product_id"] = $product_id ;
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
    $newFilePath = "photos/" .$reg_date_num."-".$_FILES['upload']['name'][$i];
  //$newFilePath = "uploads/" . $glp_comms."-".$title."-".$reg_date_num.$_FILES['upload']['type'][$i];
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      //Handle other code here
    //print("Success! ");
        //print("name: ". $_FILES['upload']['name'][$i] . " ");
        //echo"<br>";
        $file_name = $reg_date_num."-".$_FILES['upload']['name'][$i];
        $date=$reg_date_num;
        if ($product_id == "left_blog" || $product_id =="right_blog")
         {
           include("save_blog.php");
        }
        else if($product_id =="paralax")
         {
           include("save_paralax.php");
        }
        else
        {
           include("save_image.php");
        }
       
        //$infos.="Uploaded > $file_name <br>";
        require ("file_upload_re_thumb.php");
    }else{
    echo "something went wrong";
    }
  }
}
//echo $infos;
?>



