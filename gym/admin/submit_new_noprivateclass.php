<?php
include('../constant/connect.php');



$classid=mysqli_real_escape_string($con,$_POST['appointmentid']);
$name=mysqli_real_escape_string($con,$_POST['privateclassname']);
$desc=mysqli_real_escape_string($con,$_POST['desc']);
$user=mysqli_real_escape_string($con,$_POST['userid']);
$studio=mysqli_real_escape_string($con,$_POST['privatestudios']);
$dow=mysqli_real_escape_string($con,$_POST['dow']);
$date_from=mysqli_real_escape_string($con,$_POST['date_from']);
$date_to=mysqli_real_escape_string($con,$_POST['date_to']);
$time_from=mysqli_real_escape_string($con,$_POST['time_from']);
$time_to=mysqli_real_escape_string($con,$_POST['time_to']);
$ttime_from=mysqli_real_escape_string($con,$_POST['ttime_from']);
$ttime_to=mysqli_real_escape_string($con,$_POST['ttime_to']);
$classtype=mysqli_real_escape_string($con,$_POST['privateclasstype']);
$trainer=mysqli_real_escape_string($con,$_POST['trainerid']);
$session=mysqli_real_escape_string($con,$_POST['session']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
$pid=mysqli_real_escape_string($con,$_POST['pid']);
$one= 1;
$output = $amount-$one;
date_default_timezone_set("Asia/Bangkok"); 
$cdate=date("d M Y H:i");
$tomorrow = date("d-m-Y", strtotime('tomorrow'));
$compare_date=date("d M Y");
$d1=strtotime("+ 1 hour");
$unixTimestamp = strtotime($time_from);
$atimefromnew = date("H:i", $unixTimestamp);
$unixTimestamp2 = strtotime($time_to);
$atimetonew = date("H:i", $unixTimestamp2);

$$cdate=date("Y-m-d H:i");
$cdatex=date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$compare_date=date("Y-m-d H:i");
$now = new DateTime();








  

                                        


	  




  if ($amount <= 0){
    echo "<head><script>alert('No more session left. Please renew your class package. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_dashboard.php'>";
  
  }else {
	$query="INSERT INTO appointment (appointmentid,className,description,userid,studios,time_from,time_to,trainerid,classtype,approved,active) values('$classid','$name','$desc','$user','$studio','$time_from','$time_to','$trainer','$classtype','no','yes')";
	
	
  }
//inserting into private table

//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
if(mysqli_query($con,$query)==1){
	
		$query2="select * from appointment where appointmentid='$classid'";
		$result2=mysqli_query($con,$query2);
		
		if ($result2) {
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			$time_from2=$row2['time_from'];
			$time_to2=$row2['time_to'];
			$time_from3 = date('Y-m-d', strtotime($time_from2));
			$time_to3 = date('H:i', strtotime($time_to2));
			$time_from4 = date('H:i', strtotime($time_from2));
			$time_to4 = date('H:i', strtotime($time_to2));

			$time_froms = date('H:i', strtotime($time_from2)-strtotime("- 1 seconds"));
			$time_tos = date('H:i', strtotime($time_to2)-strtotime("- 1 seconds"));
			
			
		}
	}

	$query3="select * from trainers where trainerid='$trainer'";
		$result3=mysqli_query($con,$query3);
		
		if ($result3) {
			$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
			$time_fromy=$row3['time_from'];
			$time_toy=$row3['time_to'];
			
			$duplicate1=mysqli_query($con,"select * from privateclasses where trainerid='$trainer' and time_from='$time_from2' and time_to='$time_to2' and date_from LIKE '$cdatex%'");
			$one= 1;
			$output = $amount-$one;
			$query1="update sessions set amount='".$output."'where userid='".$user."'";
	  $result1=mysqli_query($con,$query1);
		}
	
			
			
		

	

if ($time_from4 <= $time_fromy  || $time_to4 >= $time_toy ){
	$query3 = "DELETE FROM appointment where appointmentid='$classid'";
                mysqli_query($con,$query3);
    echo "<head><script>alert('Your trainer is unavailable at this selected time.');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";


				echo mysqli_error($db);
  }





$duplicatesd=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and sun_date LIKE '%$time_from2%'");

 $duplicatem=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and  mon_date LIKE '%$time_from2%'");
$duplicatet=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and  tues_date LIKE '%$time_from2%'");
$duplicatew=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and  wednes_date LIKE '%$time_from2%'");
$duplicateth=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and  thurs_date LIKE '%$time_from2%'");
$duplicatef=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and  fri_date LIKE '%$time_from2%'");
$duplicatest=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from3' and time_to='$time_to3' and  satur_date LIKE '%$time_from2%'");
 





if (mysqli_num_rows($duplicatesd)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}

if (mysqli_num_rows($duplicatem)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}

if (mysqli_num_rows($duplicatet)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}

if (mysqli_num_rows($duplicatew)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}

if (mysqli_num_rows($duplicateth)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}

if (mysqli_num_rows($duplicatef)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}

if (mysqli_num_rows($duplicatest)>0)
{$query3 = "DELETE FROM appointment where appointmentid='$classid'";
	mysqli_query($con,$query3);
  echo "<head><script>alert('Schedule Conflict!!! Your trainer is busy at the selected time. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  
				  echo mysqli_error($db);
}







if ($time_from4 > $time_to4){
	$query3 = "DELETE FROM appointment where appointmentid='$classid'";
                mysqli_query($con,$query3);
		echo "<head><script>alert('Choose the correct time.');</script></head></html>";
echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";

				echo mysqli_error($db);
	} else if ($time_from == $time_to ){
		$query3 = "DELETE FROM appointment where appointmentid='$classid'";
                mysqli_query($con,$query3);
		echo "<head><script>alert('You cannot appoint a trainer with the selected time.');</script></head></html>";
echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";

				echo mysqli_error($db);
	} 


	
		
		

        if($result1){
			
				echo "<head><script>alert('Appointed Persional Training Appointment Added ');</script></head></html>";
					echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>"; 

			  }
			
					
              
			  
			
              
			  
				
	

             
            else{
               echo "<head><script>alert('Appointed Persional Training Class Failed');</script></head></html>";
              
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM appointment where appointmentid='$classid'";
                mysqli_query($con,$query3);
				echo mysqli_error($db);
            }
		
          

         
        
       

    
   
	
?>
<?php
if(isset($_GET['privateclassid'])){
$qry = $conn->query("SELECT * FROM classes where privateclassid= ".$_GET['privateclassid']);
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
