<?php
include('../constant/connect.php');
    
    
$trainerttid =mysqli_real_escape_string($con,$_POST['trainerttid']);
$classid =$_POST['classid'];
$name=mysqli_real_escape_string($con,$_POST['classname']);
$desc=mysqli_real_escape_string($con,$_POST['desc']);
$studio = $_POST['studios'];
$dow = $_POST['dow'];
$i = implode(',', $dow);
$date_from = $_POST['date_from'];
$date_to  = $_POST['date_to'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$trainer= $_POST['trainerid'];
$classtype= $_POST['classtype'];
$session= $_POST['session'];
$classcap= $_POST['classcap'];

$duplicate=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from' and time_to='$time_to' and classid!='$classid'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('Schedule Conflict!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
date_default_timezone_set("Asia/Bangkok"); 
$date_to_now = (date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')));
$cdate = date("Y-m-d H:i");
    $query1="update classes set classid='".$classid."',className='".$name."',description='".$desc."',studios='".$studio."',dow='".mysqli_real_escape_string($con,$i)."',date_from='".$date_from."',date_to='".$date_to."',time_from='".$time_from."',time_to='".$time_to."',trainerid='".$trainer."',classtype='".$classtype."',session='".$session."',classcap='".$classcap."' where classid='".$classid."'";
    //echo $query1;exit;

   if(mysqli_query($con,$query1)){
      $query2="update trainertt set classid='".$classid."',time_from='".$time_from."',time_to='".$time_to."',trainerid='".$trainer."' where classid='".$classid."'";
     if(mysqli_query($con,$query2)){
      echo "<html><head><script>alert('Class Update Successfully');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
        
            
        }else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }

     }else{
        echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
         echo "error".mysqli_error($con);
     }
    

?>
