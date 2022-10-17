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



$duplicate=mysqli_query($con,"select * from appointment where time_from LIKE '%$time_from%' AND time_to LIKE '%$time_to%'");





if ($time_from >= $time_to || $time_from == $time_to ){
		echo "<head><script>alert('Choose the correct time.');</script></head></html>";
echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
	} else {

	}

if (mysqli_num_rows($duplicate)>0){
    echo "<head><script>alert('Appointment Conflict.');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
  }else {

  }


  if ($amount <= 0){
    echo "<head><script>alert('No more session left. Please renew your class package. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
  
  }else {
	$query="INSERT INTO appointment (appointmentid,className,description,userid,studios,time_from,time_to,trainerid,classtype,approved,active) values('$classid','$name','$desc','$user','$studio','$time_from','$time_to','$trainer','$classtype','no','yes')";
	$query1="update sessions set amount='".$output."'where userid='".$user."'";
  }
//inserting into private table

//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
    if(mysqli_query($con,$query)==1){
		$one= 1;
		$output = $amount-$one;
      
  $result1=mysqli_query($con,$query1);

        if($result1){
			
					echo "<head><script>alert('Persional Training Appointment Added ');</script></head></html>";
					echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>"; 
              }
			} 
              
			  
				
	

             
            else{
               echo "<head><script>alert('Persional Training Class Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM privateclasses WHERE privateclassid='$classid'";
                mysqli_query($con,$query3);
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
