<?php
include('../constant/connect.php');
//page_protect();

	$ratingid =$_POST['ratingid'];
    $userid = $_POST['userid'];
    $trainerid = $_POST['trainerid'];
    $service = $_POST['service'];
    $description = $_POST['desc'];
    
   //Inserting data into plan table
    $query="insert into rating(ratingid,userid,trainerid,service,description,active) values('$ratingid','$userid','$trainerid','$service','$description','yes')";
   
   

	 if(mysqli_query($con,$query)==1){
        
        
        echo "<meta http-equiv='refresh' content='0; url=view_feedback.php'>";
       
      }

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
