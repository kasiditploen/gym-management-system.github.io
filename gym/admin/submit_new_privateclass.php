<?php
include('../constant/connect.php');



$classid =mysqli_real_escape_string($con,$_POST['privateclassid']);
$name=mysqli_real_escape_string($con,$_POST['privateclassname']);
$desc=mysqli_real_escape_string($con,$_POST['desc']);
$user =mysqli_real_escape_string($con,$_POST['userid']);
$studio =mysqli_real_escape_string($con,$_POST['privatestudios']);
$dow =mysqli_real_escape_string($con,$_POST['dow']);
$date_from =mysqli_real_escape_string($con,$_POST['date_from']);
$date_to  =mysqli_real_escape_string($con,$_POST['date_to']);
$time_from =mysqli_real_escape_string($con,$_POST['time_from']);
$time_to =mysqli_real_escape_string($con,$_POST['time_to']);
$classtype=mysqli_real_escape_string($con,$_POST['privateclasstype']);
$trainer=mysqli_real_escape_string($con,$_POST['trainerid']);
$session=mysqli_real_escape_string($con,$_POST['session']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
$pid=mysqli_real_escape_string($con,$_POST['pid']);
$one= 1;
$output = $amount-$one;
date_default_timezone_set("Asia/Bangkok"); 
$cdate=date("Y-m-d H:i");
$cdatex=date("Y-m-d");
$tomorrow = date("Y-m-d", strtotime('tomorrow'));
$compare_date=date("Y-m-d H:i");

  if ($amount <= 0){
    echo "<head><script>alert('No more session left. Please renew your class package. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
  
  }

  if ($time_from == $time_to){
    echo "<head><script>alert('You cannot select this time period!!! ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
	echo mysqli_error($db);
  }

  

$duplicate1=mysqli_query($con,"select * from privateclasses where trainerid='$trainer' and time_from='$time_from' and time_to='$time_to' and date_from LIKE '$cdatex%'");


if (mysqli_num_rows($duplicate1)>0)
{
  echo "<head><script>alert('Schedule Conflict!!! ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
//inserting into private table
$query="INSERT INTO privateclasses (privateclassid,className,description,userid,studios,dow,date_from,time_from,time_to,trainerid,classtype,active,approved) values('$classid','$name','$desc','$user','$studio','$dow','$date_from','$time_from','$time_to','$trainer','$classtype','yes','yes')";
$query1="update sessions set amount='".$output."'where userid='".$user."'";
//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
    if(mysqli_query($con,$query)==1){
		$one= 1;
		$output = $amount-$one;
      
  $result1=mysqli_query($con,$query1);

        if($result1){
			$query2="insert into attendance(attendanceid,present,userid,created_date,compare_date,expire,active,type) values('$aid','yes','$user','$cdate','$compare_date','$tomorrow','yes','pt')";
			$result2=mysqli_query($con,$query2);
			
				if($result2){
					echo "<head><script>alert('Persional Training Class Added ');</script></head></html>";
				echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
              }
              else{
                  echo "<head><script>alert('Persional Training Class Failed');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of users if inserting to enrolls_to table failed to execute
                 $query3 = "DELETE FROM privateclasses WHERE privateclassid='$classid'";
                 mysqli_query($con,$query3);
              }
			  
				
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
