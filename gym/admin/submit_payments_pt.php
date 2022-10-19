<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $pt=$_POST['pt'];


//updating renewal from yes to no from enrolls_to table

  
  
  
    



    
      $querypt="update sessions set renewal='no' where userid='$memID'";
      
      
      
        
        if(mysqli_query($con,$querypt)==1){
          
          $amountpt="$rowpt[3]";
     
      
      $query1pt="select * from plan where pid='$pt'";
      $result2=mysqli_query($con,$query1pt);

      
        if($result2){
          $row1=mysqli_fetch_row($result2);
          $amount2="$row1[7]";
          date_default_timezone_set("Asia/Bangkok"); 
          $d1=strtotime("+".$row1[3]." Months - 1 day");
          $cdate1=date("Y-m-d"); //current date
          $expiredate1=date("Y-m-d",$d1);
          $addsession="$row1[7]";
          $noyessession=(int)$amountpt+(int)$addsession;
          $query2pt="insert into sessions(pid,userid,paid_date,expire,renewal,amount) values('$pt','$memID','$cdate1','$expiredate1','yes','$noyessession')";
          $result3=mysqli_query($con,$query2pt);
          } 
          
            
            
              
            }
          if($result3){
               echo "<head><script>alert('Payment Successfully update');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          } 
         
             
         else{
               echo "<head><script>alert('Payment update Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
         }
        
      

   

         
        
       

?>
