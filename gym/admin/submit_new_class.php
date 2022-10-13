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



$duplicate=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from' and time_to='$time_to'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('Schedule Conflict!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
//inserting into users table
date_default_timezone_set("Asia/Bangkok"); 
$date_to_now = (date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')));
$cdate = date("Y-m-d H:i");
$query="INSERT INTO classes (classid,className,description,classtype,studios,dow,date_from,date_to,time_from,time_to,trainerid,session,active,classcap) values('$classid','".mysqli_real_escape_string($con,$name)."','$desc','$classtype','$studio','".mysqli_real_escape_string($con,$i)."','$date_from','$date_to_now','$time_from','$time_to','$trainer','yes','yes','$classcap')";
//$query="insert into classes (pid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from trainers where trainerid='$trainer'";
      $result=mysqli_query($con,$query1);

        if($result){
			$query2="INSERT INTO trainertt (trainerttid,classid,time_from,time_to,trainerid,status) values('$trainerttid','$classid','$time_from','$time_to','$trainer','active')";
			$result1=mysqli_query($con,$query2);

              }
			  if($result1){
				$weekNo = date('W');
				$nextSunday = strtotime('next sunday');
				$nextMonday = strtotime('next monday');
				$nextTuesday = strtotime('next tuesday');
				$nextWednesday = strtotime('next wednesday');
				$nextThursday = strtotime('next thursday');
				$nextFriday = strtotime('next friday');
				$nextSaturday = strtotime('next saturday');
				$weekNoNextSunday = date('W', $nextSunday);
				$weekNoNextMonday = date('W', $nextMonday);
				$weekNoNextTuesday = date('W', $nextTuesday);
				$weekNoNextWednesday = date('W', $nextWednesday);
				$weekNoNextThursday = date('W', $nextThursday);
				$weekNoNextFriday = date('W', $nextFriday);
				$weekNoNextSaturday = date('W', $nextSaturday);

				if (strpos($i,'Sunday') !== false && $weekNoNextSunday != $weekNo) {
					$thisSunday = strtotime('this sunday');
					$sundayna = date("Y-m-d", $thisSunday);
					$query3="update trainertt set sun_date='".$sundayna."'where trainerid='".$trainer."'";
					$result3=mysqli_query($con,$query3);
					
				} else if
				 (strpos($i,'Sunday') !== false && $weekNoNextSunday == $weekNo){
					
					$nextsundayna = date("Y-m-d", $nextSunday);
					$query4="update trainertt set sun_date='".$nextsundayna."'where trainerid='".$trainer."'";
					$result4=mysqli_query($con,$query4);
					

				}

				if (strpos($i,'Monday') !== false && $weekNoNextMonday != $weekNo) {
					$thisMonday = strtotime('this monday');
					$mondayna = date("Y-m-d", $thisMonday);
					$query5="update trainertt set mon_date='".$mondayna."'where trainerid='".$trainer."'";
					$result5=mysqli_query($con,$query5);
					
				} else if (strpos($i,'Monday') !== false && $weekNoNextMonday == $weekNo){
					$nextmondayna = date("Y-m-d", $nextMonday);
					$query6="update trainertt set mon_date='".$nextmondayna."'where trainerid='".$trainer."'";
					$result6=mysqli_query($con,$query6);
					
				
				} if (strpos($i,'Tuesday') !== false && $weekNoNextTuesday != $weekNo) {
					$thisTuesday = strtotime('this tuesday');
					$tuesdayna = date("Y-m-d", $thisTuesday);
					$query7="update trainertt set tues_date='".$tuesdayna."'where trainerid='".$trainer."'";
					$result7=mysqli_query($con,$query7);
					
				} else if (strpos($i,'Tuesday') !== false && $weekNoNextTuesday == $weekNo){
					$nexttuesdayna = date("Y-m-d", $nextTuesday);
					$query8="update trainertt set tues_date='".$nexttuesdayna."'where trainerid='".$trainer."'";
					$result8=mysqli_query($con,$query8);
					
				
				}if (strpos($i,'Wednesday') !== false && $weekNoNextWednesday != $weekNo) {
					$thisWednesday = strtotime('this wednesday');
					$wednesdayna = date("Y-m-d", $thisWednesday);
					$query9="update trainertt set wednes_date='".$wednesdayna."'where trainerid='".$trainer."'";
					$result9=mysqli_query($con,$query9);
					
				} else if (strpos($i,'Wednesday') !== false && $weekNoNextWednesday == $weekNo) { 
					$nextwednesdayna = date("Y-m-d", $nextWednesday);
					$query10="update trainertt set wednes_date='".$nextwednesdayna."'where trainerid='".$trainer."'";
					$result10=mysqli_query($con,$query10);
					
				
				} if (strpos($i,'Thursday') !== false && $weekNoNextThursday != $weekNo) {
					$thisThursday = strtotime('this thursday');
					$thursdayna = date("Y-m-d", $thisThursday);
					$query11="update trainertt set thurs_date='".$thursdayna."'where trainerid='".$trainer."'";
					$result11=mysqli_query($con,$query11);
					
				} else if (strpos($i,'Thursday') !== false && $weekNoNextThursday == $weekNo) {
					$nextthursdayna = date("Y-m-d", $nextThursday);
					$query12="update trainertt set thurs_date='".$nextthursdayna."'where trainerid='".$trainer."'";
					$result12=mysqli_query($con,$query12);
					
				
				} if (strpos($i,'Friday') !== false && $weekNoNextFriday != $weekNo) {
					$thisFriday = strtotime('this friday');
					$fridayna = date("Y-m-d", $thisFriday);
					$query13="update trainertt set fri_date='".$fridayna."'where trainerid='".$trainer."'";
					$result13=mysqli_query($con,$query13);
					
				} else if (strpos($i,'Friday') !== false && $weekNoNextFriday == $weekNo) {
					$nextfridayna = date("Y-m-d", $nextFriday);
					$query14="update trainertt set fri_date='".$nextfridayna."'where trainerid='".$trainer."'";
					$result14=mysqli_query($con,$query14);
					
				
				}  if (strpos($i,'Saturday') !== false && $weekNoNextSaturday != $weekNo) {
					$thisSaturday = strtotime('this saturday');
					$saturdayna = date("Y-m-d", $thisSaturday);
					$query13="update trainertt set satur_date='".$saturdayna."'where trainerid='".$trainer."'";
					$result13=mysqli_query($con,$query13);
					
				} else if (strpos($i,'Saturday') !== false && $weekNoNextSaturday == $weekNo) {
					$nextsaturdaydayna = date("Y-m-d", $nextSaturday);
					$query14="update trainertt set satur_date='".$nextsaturdaydayna."'where trainerid='".$trainer."'";
					$result14=mysqli_query($con,$query14);
					
				
				} echo "<head><script>alert('Class Added ');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=view_class_session.php'>";
				

				


		}
              else{
                  echo "<head><script>alert('Class Added Failed');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of users if inserting to enrolls_to table failed to execute
                 $query3 = "DELETE FROM classes WHERE classid='$classid'";
                 mysqli_query($con,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Class Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM classes WHERE classid='$classid'";
                mysqli_query($con,$query3);
            }
            
          

         
        
       

    
   
	
?>
<?php
if(isset($_GET['pid'])){
$qry = $conn->query("SELECT * FROM classes where classid= ".$_GET['classid']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
$dow_arr = !empty($dow) ? explode(',',$dow) : '';
}
?>
<script>
	$('.select2').select2({
		placeholder:'Please Select Here',
		width:'100%'
	})
	$('#manage-schedule').submit(function(e){
		e.preventDefault()
		start_load()
		$('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_schedule',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				
			}
		})
	})
	
</script>
