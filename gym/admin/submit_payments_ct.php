<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $ct=$_POST['ct'];


//updating renewal from yes to no from enrolls_to table

  
  
  
    



    
      $queryct="update csessions set renewal='no' where userid='$memID'";
      
      
      
        
        if(mysqli_query($con,$queryct)==1){
          
          $amountct="$rowct[3]";
     
      
      $query1ct="select * from plan where pid='$ct'";
      $result2=mysqli_query($con,$query1ct);

      
        if($result2){
          $row1=mysqli_fetch_row($result2);
          $amount2="$row1[7]";
          date_default_timezone_set("Asia/Bangkok"); 
          $d1=strtotime("+".$row1[3]." Months - 1 day");
          $cdate1=date("Y-m-d"); //current date
          $expiredate1=date("Y-m-d",$d1);
          $addsession="$row1[7]";
          $noyessession=(int)$amountct+(int)$addsession;
          $query2ct="insert into csessions(pid,userid,paid_date,expire,renewal,amount) values('$ct','$memID','$cdate1','$expiredate1','yes','$noyessession')";
          $result3=mysqli_query($con,$query2ct);
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
