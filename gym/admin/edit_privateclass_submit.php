<?php
include('../constant/connect.php');
    
    

$classid = mysqli_real_escape_string($con,$_POST['classid']);
$name= mysqli_real_escape_string($con,$_POST['classname']);
$desc= mysqli_real_escape_string($con,$_POST['desc']);
$studio = mysqli_real_escape_string($con,$_POST['studios']);
$dow = $_POST['dow'];
$i = implode(',', $dow);
$date_from = mysqli_real_escape_string($con,$_POST['date_from']);
$date_to  = mysqli_real_escape_string($con,$_POST['date_to']);
$time_from = mysqli_real_escape_string($con,$_POST['time_from']);
$time_to = mysqli_real_escape_string($con,$_POST['time_to']);
$trainer= mysqli_real_escape_string($con,$_POST['trainerid']);
$classtype= mysqli_real_escape_string($con,$_POST['classtype']);
$session= mysqli_real_escape_string($con,$_POST['session']);
$classcap = mysqli_real_escape_string($con,$_POST['classcap']);

$duplicate=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from' and time_to='$time_to'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('Schedule Conflict!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
date_default_timezone_set("Asia/Bangkok"); 
$date_to_now = (date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')));
$cdate = date("Y-m-d H:i");
    $query1="update privateclasses set className='".$name."',description='".$desc."',studios='".$studio."',dow='".mysqli_real_escape_string($con,$i)."',date_from='".$date_from."',date_to='".$date_to."',time_from='".$time_from."',time_to='".$time_to."',trainerid='".$trainer."',classtype='".$classtype."' where privateclassid='".$classid."'";
    //echo $query1;exit;

   
     if(mysqli_query($con,$query1)){
      echo "<html><head><script>alert(' Personal Training Class Update Successfully');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=view_privateclass.php'>";
        
            
        }else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }

    
    

?>
