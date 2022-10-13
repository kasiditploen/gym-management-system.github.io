<?php
include('../constant/connect.php');
//page_protect();

	$trainerid =mysqli_real_escape_string($con,$_POST['trainerid']);
    $earning = mysqli_real_escape_string($con,$_POST['earning']);
    $deduction = mysqli_real_escape_string($con,$_POST['deduction']);
    $date = mysqli_real_escape_string($con,$_POST['date_from']);


    
    
   //Inserting data into plan table
    $query="insert into salary(trainerid,earning,deduction,date_from,active) values('$trainerid','$earning','$deduction','$date','yes')";
    
   

	 if(mysqli_query($con,$query)==1){
        
    echo "<head><script>alert('Salary Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
       
       
      }

     

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
