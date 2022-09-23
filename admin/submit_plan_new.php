<?php
include('../constant/connect.php');
//page_protect();

	$planid =$_POST['planid'];
    $name = $_POST['planname'];
    $desc = $_POST['desc'];
    $planval = $_POST['planval'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    
   //Inserting data into plan table
    $query="insert into plan(pid,planName,description,validity,amount,active,plantype) values('$planid','$name','$desc','$planval','$amount','yes','$type')";
   
   

	 if(mysqli_query($con,$query)==1){
        
        
        echo "<meta http-equiv='refresh' content='0; url=view_plan.php'>";
       
      }

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
