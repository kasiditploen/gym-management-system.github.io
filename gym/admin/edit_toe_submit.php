<?php
include('../constant/connect.php');
    
$revenue = 0;
$toeid =$_POST['toeid'];
$type = $_POST['type'];
$name = $_POST['toename'];
$desc = $_POST['desc'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$vendor = $_POST['vendor'];
$amount = $_POST['amount'];




date_default_timezone_set("Asia/Bangkok"); 
$date_to_now = (date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')));
$cdate = date("Y-m-d H:i");
    $query="update toe set type='".$type."',toeName='".$name."',description='".$desc."',brands='".$brand."',categories='".$category."',vendors='".$vendor."',amount='".$amount."' where toeid='".$toeid."'";
    //echo $query1;exit;

    if(mysqli_query($con,$query)==1){
      
        echo "<html><head><script>alert('Type Of Equipment Update Successfully');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=newmachine.php'>";
      }
      
        
            
        else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }

    

?>
