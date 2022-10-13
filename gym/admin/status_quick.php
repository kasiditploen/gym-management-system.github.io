<?php
include('../constant/connect.php');
//page_protect();

	$id =($_GET['userid']);
  $status =($_GET['status']);
    

    
    
   //Inserting data into plan table
    $query1="update users set status='".$status."' where userid='".$id."'";
   

	 if(mysqli_query($con,$query1)==1){
    
    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
   
    
   }
    else{
      echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
