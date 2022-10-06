<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $plan=$_POST['plan'];
 $domp=$_POST['domp'];
 $ct=$_POST['ct'];
 $pt=$_POST['pt'];


//updating renewal from yes to no from enrolls_to table

  $query="update enrolls_to set renewal='no' where uid='$memID'";
  
  
    



    if(mysqli_query($con,$query)==1){
      $queryct="update sessions set renewal='no' where userid='$memID'";
      if(mysqli_query($con,$queryct)==1){
        $querypt="update csessions set renewal='no' where userid='$memID'";
        if(mysqli_query($con,$querypt)==1){
      $query1="select * from plan where pid='$plan'";
      
      $query1ct="select * from plan where pid='$ct'";
      
      $query1pt="select * from plan where pid='$pt'";
      
      
      $result=mysqli_query($con,$query1);
      $result1=mysqli_query($con,$query1pt);
      $result2=mysqli_query($con,$query1ct);

      if($result1){
        $row=mysqli_fetch_row($result1);
        $amount1="$row[7]";
        if($result2){
          $row1=mysqli_fetch_row($result2);
          $amount2="$row1[7]";
        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          
        
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$domp','$expiredate','yes')";
          
          

            
          
          if(mysqli_query($con,$query2)==1){
            $query2ct="insert into sessions(pid,userid,paid_date,expire,renewal,amount) values('$ct','$memID','$domp','$expiredate','yes','$amount1')";
            if(mysqli_query($con,$query2ct)==1){
          $query2pt="insert into csessions(pid,userid,paid_date,expire,renewal,amount) values('$pt','$memID','$domp','$expiredate','yes','$amount2')";
          if(mysqli_query($con,$query2pt)==1){
               echo "<head><script>alert('Payment Successfully update ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          }
             
         }else{
               echo "<head><script>alert('Payment update Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
            }
            
          }
          else{
            echo "<head><script>alert('Payment update Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
          }
        }
      }
    }
  }
}
    }
   

         
        
       

?>
