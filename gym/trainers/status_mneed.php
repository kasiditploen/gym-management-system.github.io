<?php
include('../constant/connect.php');
//page_protect();

	$id =($_GET['machineid']);
  $mneed =($_GET['mneed']);
    

    
    
   //Inserting data into plan table
    $query1="update newmachine set mneed='".$mneed."' where machineid='".$id."'";
   

	 if(mysqli_query($con,$query1)==1){
    
    echo "<meta http-equiv='refresh' content='0; url=newmachine.php'>";
   
    
   }
    else{
      echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
