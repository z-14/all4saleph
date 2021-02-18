<?
include("sessions.php");
include("globalconfig.php");
include("sql.php");
include("merchant_product_list");
$sortBy = $_GET["sortBy"];

  switch ($sortBy) {
    case 'All':
    $sql="SELECT * FROM `product` where product_name != ''   ";
    $result = $conn->query($sql);
    break;

    case 'Approved':
    $sql="SELECT * FROM `product`  where product_name != '' And post='approved'  ";
    $result = $conn->query($sql);
    break;

    case 'Pending':
    $sql="SELECT * FROM `product`  where product_name != '' ANd post=''   ";
    $result = $conn->query($sql);
    break;

    case 'Declined':
    $sql="SELECT * FROM `product`  where  product_name != '' And post='declined'  ";
    $result = $conn->query($sql);
    break;

    default:
    $sql="SELECT * FROM `product`  where AND product_name != ''   ";
    $result = $conn->query($sql);
    break;
  }
?>

<?
          $product_id = $_GET["product_id"];
          
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

              ?>
              <tr role="row">
               <td  role="cell"><?  echo $row["product_name"]; ?></td>
               <td  role="cell"><?  echo $row["product_price"]; ?></td> 
               <td  role="cell"><?  echo $row["product_cat"]; ?></td>
               <td  role="cell"><?  echo $row["product_subcat"]; ?></td>
               <td  role="cell"><?  echo $row["product_qty"]; ?></td>
               <td  role="cell"><?  echo $row["percentage_sale"]; ?></td>
               <td  role="cell"><?  echo $row["post"]; ?></td>
               <td> 
                <button type="button" class="btn btn-success btn-circle btn-lg" onclick="postItGoTo('merchant_product_action.php?product_id=<?echo $row["product_id"];?>&approved=yes','merchant_list_view_product.php?sortBy=<?echo $sortBy;?>')" data-toggle="tooltip" title="Approve Item!">
                  <i  class="fa fa-check"></i></button>
                  <button type="button" class="btn btn-danger btn-circle btn-lg" onclick="postItGoTo('merchant_product_action.php?product_id=<?echo  $row["product_id"];?>&approved=no','merchant_list_view_product.php?sortBy=<?echo $sortBy;?>')" data-toggle="tooltip" title="Decline Item!">
                    <i  class="fa fa-times"></i></button>
                  </td>
                </tr>
                <?      
              }
            }
            ?>
          </tbody>
        <tfoot>
        </tfoot>

          <style >.btn-label {position: relative;left: -12px;display: inline-block;padding: 3px 6px;background: rgba(0,0,0,0.15);border-radius: 3px 0 0 3px;}
.btn-labeled {padding-top: 0;padding-bottom: 0;}
.btn { margin-bottom:10px; }
}</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>

#product th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #565656;
  color: white;
}
#product tr:nth-child(even){background-color: #f2f2f2;}

#product tr:hover {background-color: #ddd;}

    /*
    Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
    */
    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {
      /* Force table to not be like tables anymore */
      table,
      thead,
      tbody,
      th,
      td,
      tr {
        display: block;
      }

      /* Hide table headers (but not display: none;, for accessibility) */
      thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      tr {
       /*   margin: 0 0 1rem 0;*/
     }

     tr:nth-child(odd) {
      background: #ccc;
    }

    td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50% !important;

    }

    td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 0;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
      margin-top: 13px;
    }

  /*
        Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
    td:nth-of-type(1):before {
      content: "PRODUCT NAME";
    }
    td:nth-of-type(2):before {
      content: "PRODUCT PRICE";
    }
    td:nth-of-type(3):before {
      content: "PRODUCT CATEGORY";
    }
    td:nth-of-type(4):before {
      content: "PRODUCT QUANTITY";
    }
    td:nth-of-type(5):before {
      content: "PRODUCT SALE";
    }
    td:nth-of-type(6):before {
      content: "POST";
    }
    td:nth-of-type(7):before {
      content: "ACTION";
    }

  }

  .btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
  }

  .btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
  }

</style>    
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>