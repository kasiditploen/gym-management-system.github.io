<?php
include('../constant/connect.php');
//page_protect();

	$feedbackid =$_POST['feedbackid'];
    $userid = $_POST['userid'];
    $service = $_POST['service'];
    $description = $_POST['desc'];
    
   //Inserting data into plan table
    $query="insert into feedback(feedbackid,userid,service,description,active) values('$feedbackid','$userid','$service','$description','yes')";
   
   

	 if(mysqli_query($con,$query)==1){
        
        
        echo "<meta http-equiv='refresh' content='0; url=view_feedback.php'>";
       
      }

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
