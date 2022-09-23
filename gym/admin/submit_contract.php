<?php
include('../constant/connect.php');
//page_protect();

	$contractid =$_POST['contractid'];
    $name = $_POST['contractname'];
    $desc = $_POST['desc'];
    $contractval = $_POST['contractval'];
    $amount = $_POST['amount'];
    
   //Inserting data into plan table
    $query2="insert into plan2(pid,planName,description,validity,amount,active) values('$contractid','$name','$desc','$contractval','$amount','yes')";
   
   

	 if(mysqli_query($con,$query2)==1){
        
        echo "<head><script>alert('Contract Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=new_contract.php'>";
       
      }

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
