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
  

  $duplicate=mysqli_query($con,"select * from checkin where userid='$userid' and created_date ='$cdatenohs'");
  $query2="insert into checkin(checkinid,userid,created_date,created_time,expire,active) values('$checkinid','$userid','$cdatenohs','$time','$tomorrow','yes')";
  $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
if (mysqli_num_rows($duplicate)>0){

  echo "<head><script>alert('This user has already checked in today. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}else {
//Inserting data into plan table
mysqli_real_escape_string($con, $checkinid);
mysqli_real_escape_string($con, $userid);
$result2=mysqli_query($con,$query2);
  $result3=mysqli_query($con,$query3);
echo "<head><script>alert('Checkin Checked ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";


}
?>
