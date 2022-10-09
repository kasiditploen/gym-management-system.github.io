<?php
include('../constant/connect.php');
//page_protect();



$aid =mysqli_real_escape_string($con,$_POST['attendanceid']);
  $presentid=mysqli_real_escape_string($con,$_POST['present']);
  $amount=mysqli_real_escape_string($con,$_POST['amount']);
  $session=mysqli_real_escape_string($con,$_POST['session']);
  $uid=$_GET['id'];
  date_default_timezone_set("Asia/Bangkok"); 
  $tomorrow = date("d-m-Y", strtotime('tomorrow'));
  $compare_date=date("d M Y");
  $cdate=date("d M Y H:i"); //current date
  $one= 1;
  $output = $amount-$one;
  
    
  $duplicate=mysqli_query($con,"select * from attendance where userid='$uid' and compare_date ='$compare_date'");
  $query1="insert into attendance(attendanceid,present,userid,created_date,compared_date,expire,active) values('$aid','$presentid','$uid','$cdate','$compare_date','$tomorrow','yes')";
  $query2="update attendance set present='".$presentid."'where userid='".$uid."'";
  $result2=mysqli_query($con,$query2);
  $query3="update csessions set amount='".$output."'where userid='".$uid."'";
  $result3=mysqli_query($con,$query3);
  
  
    
  
  
  
  if ($amount <= 0){
    echo "<head><script>alert('No more session left. Please renew your class package. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
  
  }

  if ($session='Yes' && (mysqli_num_rows($duplicate)>0)
  ){
    
    $result3=mysqli_query($con,$query3);
      $query2="update attendance set present='".$presentid."'where userid='".$uid."'";
      $result2=mysqli_query($con,$query2);
      echo "<head><script>alert('Attendance Updated ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
    } else{
      $result=mysqli_query($con,$query1);
      echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
    }
    
  
  
  

  if ($query1 &&$session='Yes' &&!$duplicate){
    $query1="insert into attendance(attendanceid,present,userid,created_date,expire,active) values('$aid','$presentid','$uid','$cdate','$tomorrow','present')";
    $result=mysqli_query($con,$query1);
    $result3=mysqli_query($con,$query3);
    echo "<head><script>alert('3');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
  
  } 
  else if ($query1 && $session='No' && !$duplicate){
    
  $result=mysqli_query($con,$query1);
      echo "<head><script>alert('7 ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
      
  }
      
      
    
    
  
 
    
    
    
    

    
   
  




    

    
   
   

?>
