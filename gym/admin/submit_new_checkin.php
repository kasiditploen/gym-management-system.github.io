
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

$query  = "select * from trainers";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $trainerid   = $row['trainerid'];
                      $query10="select * from classes where trainerid='$trainerid'";
                                $result10=mysqli_query($con,$query10);
                                if($result10){
                                  $row10=mysqli_fetch_array($result10,MYSQLI_ASSOC);
                                  $classid=$row10['classid'];
                                  $query11="select * from appointment where userid = '$userid' and trainerid='$trainerid' and time_from LIKE '%$cdatenohs%' and approved ='yes' and active ='yes'";
                                  $result11=mysqli_query($con,$query11);
                                if($result11){
                                  $row11=mysqli_fetch_array($result11,MYSQLI_ASSOC);
                                  $appointmentid=$row11['appointmentid'];
                                  $query12="select * from attendance";
                                  $result12=mysqli_query($con,$query12);
                                if($result12){
                                  $row12=mysqli_fetch_array($result12,MYSQLI_ASSOC);
                                  $groupid=$row12['groupid'];
                                  $type=$row12['type'];
                      
                            }
                      
                      
                            }
                      
                      
                            }
                          }
                        }


	
  $querya=mysqli_query($con,"select * from appointment where userid = '$userid' and appointmentid='$appointmentid' and trainerid='$trainerid' and time_from LIKE '%$cdatenohs%' and approved ='yes' and active ='yes'");

 
  
  
  
  //echo "<head><script>alert('Check-IN Successfully 2 ');</script></head></html>";
  //echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";

      

        
  if(mysqli_num_rows($querya)>0 and $groupid != $appointmentid and $groupid == NULL ){
    
    $con->query("insert into attendance(attendanceid,present,userid,created_date,compare_date,expire,active,type,groupid) values('$aid','yes','$userid','$cdatenohs','$compare_date','$tomorrow','yes','apt','$appointmentid')");
    $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
  $result3=mysqli_query($con,$query3);
  if($type='apt'){
          
    
    $query2="insert into checkin(checkinid,userid,created_date,created_time,expire,active) values('$checkinid','$userid','$cdatenohs','$time','$tomorrow','yes')";
  $result2=mysqli_query($con,$query2);
    $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
  $result3=mysqli_query($con,$query3);
  echo "<head><script>alert('Check-IN Successfully ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      echo mysqli_error($db);
  
  }else if(mysqli_num_rows($result)<0 and $groupid == $appointmentid){
    $query2="insert into checkin(checkinid,userid,created_date,created_time,expire,active) values('$checkinid','$userid','$cdatenohs','$time','$tomorrow','yes')";
    $result2=mysqli_query($con,$query2);
      $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
    $result3=mysqli_query($con,$query3);
    echo "<head><script>alert('Check-IN Successfully ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      echo mysqli_error($db);
  }else{
    $query2="insert into checkin(checkinid,userid,created_date,created_time,expire,active) values('$checkinid','$userid','$cdatenohs','$time','$tomorrow','yes')";
    $result2=mysqli_query($con,$query2);
      $query3="update attendance set present='".$presentid."'where userid='".$uid."'";
    $result3=mysqli_query($con,$query3);
    echo "<head><script>alert('Check-IN Successfully ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      echo mysqli_error($db);
  }
    echo "<head><script>alert('Check-IN Successfully ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      echo mysqli_error($db);
  } 
  

  
  
  

  


?>
