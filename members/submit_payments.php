<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $plan=$_POST['plan'];
 $domp=$_POST['domp'];

//updating renewal from yes to no from enrolls_to table
$query="delete from enrolls_to where uid='$memID'";
    if(mysqli_query($con,$query)==1){
      //inserting new payment data into enrolls_to table
      $query1="select * from plan where pid='$plan'";
      $result=mysqli_query($con,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months");
          $cdate=date("d-m-Y"); //current date
          $expiredate=date("d-m-Y",$d);
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$domp','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){

               echo "<head><script>alert('Payment Successfully update ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
            }
             
            else{
               echo "<head><script>alert('Payment update Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
            }
            
          }
          else{
            echo "<head><script>alert('Payment update Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
          }

         
        }
        else
        {
          echo "<head><script>alert('Payment update Failed');</script></head></html>";
          echo "error: ".mysqli_error($con);
        }

?>
