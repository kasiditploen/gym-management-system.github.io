<?php
include('../constant/connect.php');
//page_protect();

	$vendorid =mysqli_real_escape_string($con,$_POST['vendorid']);
    $name = mysqli_real_escape_string($con,$_POST['vendorname']);
    $contactname = mysqli_real_escape_string($con,$_POST['contactname']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $desc = mysqli_real_escape_string($con,$_POST['desc']);

    
    
   //Inserting data into plan table
    $query="insert into vendors(vendorid,vendorName,contactName,address,mobile,email,description,active) values('$vendorid','$name','$contactname','$address','$mobile','$email','$desc','yes')";
    mysqli_real_escape_string($con, $vendorid);
    mysqli_real_escape_string($con, $name);
    mysqli_real_escape_string($con, $desc);
   

	 if(mysqli_query($con,$query)==1){
        
    echo "<head><script>alert('Vendor Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=view_vendor.php'>";
       
       
      }

     

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
