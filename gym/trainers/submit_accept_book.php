<?php
include('../constant/connect.php');


$trainerttid =mysqli_real_escape_string($con,$_POST['trainerttid']);
$bookingid =$_GET['bookingid'];
$classid = $_POST['classid'];
$classholderid = $_POST['classholderid'];
$name = $_POST['classname'];
$desc = $_POST['desc'];
$studio = $_POST['studios'];
$dow = $_POST['dow'];
$df = $_POST['date_from'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$trainer= $_POST['trainerid'];
$user= $_POST['userid'];
$classtype= $_POST['classtype'];
$session= $_POST['session'];
$approved= $_POST['approved'];


$duplicate=mysqli_query($con,"select * from trainertt where trainerid='$trainer' and time_from='$time_from' and time_to='$time_to'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('Schedule Conflict!!! ERROR111 ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}

$duplicate1=mysqli_query($con,"select * from booking where classid='$classid' and userid='$user' and trainerid='$trainer' and date_from='$df' and time_from='$time_from' and time_to='$time_to' and approved='yes'");
if (mysqli_num_rows($duplicate1)>0)
{
  echo "<head><script>alert('Schedule Conflict!!! ERROR222 ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
//inserting into users table
date_default_timezone_set("Asia/Bangkok"); 
$date_to_now = (date("Y-m-d",strtotime($date_to.'-1 +1 month -1 day')));
$cdate = date("Y-m-d H:i");
$query="UPDATE booking set approved='yes' where classid='".$classid."' and userid='".$user."'";

//$query="insert into classes (pid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
if(mysqli_query($con,$query)==1){
	//Retrieve information of plan selected by user
	$query1="INSERT INTO classholder (classholderid,classid,userid,trainerid,active,created_date,time_from,time_to) values('$classholderid','$classid','$user','$trainer','yes','$df','$time_from','$time_to')";
	

	  if(mysqli_query($con,$query1)==1){
		echo "<head><script>alert('Approved');</script></head></html>";
			 echo "<meta http-equiv='refresh' content='0; url=view_trainer_appointment.php'>";

			}
			else{
				echo "<head><script>alert('Approved');</script></head></html>";
			   echo "error: ".mysqli_error($con);
			   //Deleting record of users if inserting to enrolls_to table failed to execute
			   $query3 = "DELETE FROM appointment WHERE appointmentid='$bookingid'";
			   mysqli_query($con,$query3);
			}
		  }
		   
		  else{
			 echo "<head><script>alert('Approved Added');</script></head></html>";
			echo "error: ".mysqli_error($con);
			 //Deleting record of users if inserting to enrolls_to table failed to execute
			  $query3 = "DELETE FROM appointment WHERE appointmentid='$bookingid'";
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
