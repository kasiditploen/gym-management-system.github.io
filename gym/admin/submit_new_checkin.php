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
  $querya = "select * from appointment where userid = '$userid' and time_from LIKE '%$cdatenohs%' and approved ='yes'";
  $result=mysqli_query($con,$querya);
 
  

      

        
  if(mysqli_num_rows($result)>0){
    $querya  = "select * from appointment where userid = '$userid' and time_from = '$cdate' and approved ='yes'";
    $con->query("insert into attendance(attendanceid,present,userid,created_date,compare_date,expire,active,type) values('$aid','yes','$userid','$cdate','$compare_date','$tomorrow','yes','apt')");
    $row=mysqli_fetch_row($result);
    $type=$row['type'];
    $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
  $result3=mysqli_query($con,$query3);
    echo "<head><script>alert('Check-IN Successfully 1 ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      echo mysqli_error($db);
  }
  

  
  if($type='apt'){
          
    
    $query2="insert into checkin(checkinid,userid,created_date,created_time,expire,active) values('$checkinid','$userid','$cdatenohs','$time','$tomorrow','yes')";
  $result2=mysqli_query($con,$query2);
    $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
  $result3=mysqli_query($con,$query3);
  

  
  
  echo "<head><script>alert('Check-IN Successfully 2 ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  

  
}else {
  echo "<head><script>alert('ERROR!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";


}

?>
