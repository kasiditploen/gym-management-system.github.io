<?php
include('../constant/connect.php');
//page_protect();
    
    
   $id=$_POST['categoryid'];
   $cname=$_POST['categoryname'];
   $cdesc=$_POST['desc'];
   
   
    
    $query1="update categories set categoryName='".$cname."',description='".$cdesc."' where categoryid='".$id."'";

   if(mysqli_query($con,$query1)){
     
            echo "<html><head><script>alert('Category Updated Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=view_category.php'>";  
   }
   else{
    echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
    echo "error".mysqli_error($con);
   }
    

?>