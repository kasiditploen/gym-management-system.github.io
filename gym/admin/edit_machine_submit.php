<?php
include('../constant/connect.php');
    
    
$revenue = 0;
$machineid =$_POST['machineid'];
$type = $_POST['type'];
$name = $_POST['machinename'];
$desc = $_POST['desc'];
$studio = $_POST['studio'];
$qty = $_POST['quantity'];
$pdate = $_POST['pdate'];
$status = $_POST['status'];



date_default_timezone_set("Asia/Bangkok"); 
$date_to_now = (date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')));
$cdate = date("Y-m-d H:i");
    $query="update newmachine set machineid='".$machineid."',toe='".$type."',description='".$desc."',studio='".$studio."',quantity='".$qty."'";
    //echo $query1;exit;

    if(mysqli_query($con,$query)==1){
      $query1="select * from toe where toeid='$type'";
      $result1=mysqli_query($con,$query1);
      
      if(mysqli_query($con,$query1)==1){
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                        $revenue = ($row1['amount'] * $qty)+$revenue;
        $query2="update newmachine set type='".$type."',subtotal='".$revenue."' where machineid='".$machineid."'";
        $result2=mysqli_query($con,$query2);
        echo "<html><head><script>alert('Equipment Update Successfully');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=newmachine.php'>";
      }
      
        
            
        }else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }

    

?>
