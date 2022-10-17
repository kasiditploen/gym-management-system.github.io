<?php
include('../constant/connect.php');
//page_protect();
    
    
   $id=$_POST['studioid'];
   $cname=$_POST['studioname'];
   $cdesc=$_POST['desc'];
   
   
    
    $query1="update studio set studioName='".$cname."',description='".$cdesc."' where studioid='".$id."'";

   if(mysqli_query($con,$query1)){
     
            echo "<html><head><script>alert('Studio Updated Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=view_room.php'>";  
   }
   else{
    echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
    echo "error".mysqli_error($con);
   }
    

?>