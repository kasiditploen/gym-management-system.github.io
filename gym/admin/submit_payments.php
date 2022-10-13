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
      $querypt="update sessions set renewal='no' where userid='$memID'";
      
      
      if(mysqli_query($con,$querypt)==1){
        
        $amountct="$rowct[3]";
        $queryct="update csessions set renewal='no' where userid='$memID'";
        
        if(mysqli_query($con,$queryct)==1){
          
          $amountpt="$rowpt[3]";
      $query1="select * from plan where pid='$plan'";
      
      $query1ct="select * from plan where pid='$ct'";
      
      $query1pt="select * from plan where pid='$pt'";
      
      
      $result=mysqli_query($con,$query1);
      $result1=mysqli_query($con,$query1ct);
      $result2=mysqli_query($con,$query1pt);

      if($result1){
        $row=mysqli_fetch_row($result1);
        $amount1="$row[7]";
        if($result2){
          $row1=mysqli_fetch_row($result2);
          $amount2="$row1[7]";
        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months - 1 day");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          
        
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){
            $queryme="select * from plan where pid='$pt'";
            $resultme=mysqli_query($con,$queryme);
            $queryme2="select * from plan where pid='$ct'";
              $resultme2=mysqli_query($con,$queryme2);
          } 
          

            
          
          if($resultme && (!empty($ct))){
            $value1=mysqli_fetch_row($resultme);
                date_default_timezone_set("Asia/Bangkok"); 
                $d1=strtotime("+".$value1[3]." Months - 1 day");
                $cdate1=date("Y-m-d"); //current date
                $expiredate1=date("Y-m-d",$d1);
                $addsession="$value1[7]";
                $noyessession=(int)$amountpt+(int)$addsession;
                
            $query2pt="insert into sessions(pid,userid,paid_date,expire,renewal,amount) values('$pt','$memID','$cdate','$expiredate','yes','$noyessession')";
            $result3=mysqli_query($con,$query2pt);
            
          } 
          if ($resultme && !empty($pt)) {
            $value2=mysqli_fetch_row($resultme2);
                date_default_timezone_set("Asia/Bangkok"); 
                $d1=strtotime("+".$value1[3]." Months - 1 day");
                $cdate1=date("Y-m-d"); //current date
                $expiredate1=date("Y-m-d",$d1);
                $addsession1="$value2[7]";
                $noyessession1=(int)$amountct+(int)$addsession1;
            $query2ct="insert into csessions(pid,userid,paid_date,expire,renewal,amount) values('$ct','$memID','$cdate','$expiredate','yes','$noyessession1')";
            $result2=mysqli_query($con,$query2ct);
          } else if ($resultme2 &&empty($pt)) {
            echo "<head><script>alert('Payment Successfully update MARK1 ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          } else if ($resultme && empty($ct)) {
            echo "<head><script>alert('Payment Successfully update MARK2 ');</script></head></html>";
              echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          } else if ($result3 && !empty($pt)) {
            echo "<head><script>alert('Payment Successfully update MARK3 ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          }

            if($result2){
              
          
            } 
            if(!$result2 && !empty($pt)){
              $query2pt="insert into sessions(pid,userid,paid_date,expire,renewal,amount) values('$pt','$memID','$cdate','$expiredate','yes','$noyessession')";
          $result3=mysqli_query($con,$query2pt);
            }
          if($result3){
               echo "<head><script>alert('Payment Successfully update X2 ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
          } else if (!$result3){
            echo "<head><script>alert('Payment Successfully update X3 ');</script></head></html>";
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

   

         
        
       

?>
