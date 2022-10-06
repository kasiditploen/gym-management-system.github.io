<?php
include('../constant/connect.php');
//page_protect();



	$checkinid =mysqli_real_escape_string($con,$_POST['checkinid']);
  $userid=$_GET['id'];
  date_default_timezone_set("Asia/Bangkok"); 
  $tomorrow = date("Y-m-d", strtotime('tomorrow'));
  $cdate=date("Y-M-d H:i"); //current date
  $cdatenohs=date("Y-m-d");
  $time=date("H:i");
  $ok='1';
  mysqli_real_escape_string($con, $checkinid);
  mysqli_real_escape_string($con, $userid);
  
  
  
  if($ok='1'){
    $query2="insert into checkin(checkinid,userid,created_date,created_time,expire,active) values('$checkinid','$userid','$cdatenohs','$time','$tomorrow','yes')";
  $result2=mysqli_query($con,$query2);
    $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
  $result3=mysqli_query($con,$query3);
echo "<head><script>alert('Checkin Checked ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";

  
}else {
  echo "<head><script>alert('ERROR!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";



}
?>
