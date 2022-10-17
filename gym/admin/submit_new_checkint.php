<?php
include('../constant/connect.php');
//page_protect();



	$checkinid =mysqli_real_escape_string($con,$_POST['checkintid']);
  $trainerid=$_GET['id'];
  date_default_timezone_set("Asia/Bangkok"); 
  $tomorrow = date("Y-m-d", strtotime('tomorrow'));
  $cdate=date("Y-M-d H:i"); //current date
  $cdatenohs=date("Y-m-d");
  $time=date("H:i");
  $ok='1';
  mysqli_real_escape_string($con, $checkinid);
  mysqli_real_escape_string($con, $userid);
  
  $query2="insert into checkint(checkintid,trainerid,created_date,created_time,expire,active) values('$checkinid','$trainerid','$cdatenohs','$time','$tomorrow','yes')";
  if(mysqli_query($con,$query2)==1){
    

  
  echo "<head><script>alert('Check-IN Successfully ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  

  
  }else {
  echo "<head><script>alert('ERROR!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";


}

?>
