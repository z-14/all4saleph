  
  <?
  include("sessions.php");
include("globalconfig.php");
include("sql.php");
  $u_id = $_SESSION["u_id"];
  include("sql.php");
            $sql="SELECT * FROM merchant_docs WHERE u_id ='$u_id'"; 
              $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                    while($row = $result->fetch_assoc())
                     { 
                     $id=$row["m_id"];
                    
                              ?>


      <div class="uk-alert uk-alert-danger alert-dismissible fade show" role="alert">
		  <button type="button" onclick="merchant_docu(<?echo $id;?>)" class="close" data-dismiss="alert" aria-label="Close">
		    <span   aria-hidden="true">×</span>
		  </button>
		  <?  echo $row['url']; ?>		
		</div>
                              <?    

                             
                          }
                              }