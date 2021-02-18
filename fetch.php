<?
include("sessions.php");
include("sql.php");
include("access.php");


      $query = "SELECT * FROM product_images";
          $statement = $conn->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{

               foreach($result as $row)
 {


              		$output.='
              		<tr>
              		<td>'.$row["file_name"].'</td>
              		</tr>';
       
              	}

              }else
              {
              	$output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';	
              }
              echo $output;

echo "LOL";


       ?>