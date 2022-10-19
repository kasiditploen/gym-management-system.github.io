<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $plan=$_POST['plan'];


//updating renewal from yes to no from enrolls_to table

  
  
  
    



    
$query="update enrolls_to set renewal='no' where uid='$memID'";
      
      
      
        
        if(mysqli_query($con,$query)==1){
          
        
     
      
      $query1="select * from plan where pid='$plan'";
      $result2=mysqli_query($con,$query1);

      
        if($result2){
          $value=mysqli_fetch_row($result2);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months - 1 day");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          
          } 
          
            
            
              
            }
            if(mysqli_query($con,$query2)==1){
               echo "<head><script>alert('Payment Successfully update');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          } 
         
             
         else{
               echo "<head><script>alert('Payment update Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
         }
        
      

   

         
        
       

?>
