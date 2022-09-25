<?php
include('../constant/connect.php');



$classid =$_GET['ci'];
$user = $_GET['id'];
$name = $_POST['privateclassname'];
$desc = $_POST['desc'];
$studio = $_POST['privatestudios'];
$dow = $_POST['dow'];
$date_from = $_POST['date_from'];
$date_to  = $_POST['date_to'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$classtype= $_POST['privateclasstype'];
$trainer= $_GET['tid'];
$classholderid= $_POST['classholderid'];
$amount= $_GET['am'];
$csession= $_GET['cs'];
$pid= $_GET['pid'];
$tomorrow = date("d-m-Y", strtotime('tomorrow'));
  $compare_date=date("d M Y");
  $cdate=date("d M Y H:i"); //current date
$one= 1;
$output = $amount-$one;

if ($amount <= 0){
    echo "<head><script>alert('No more session left. Please renew your class package. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
  
  }

//inserting into private table
$cdate=date('Y-m-d');
$query="INSERT INTO classholder (classholderid,classid,userid,trainerid,usercount,maxusers,active,created_date,time_from,time_to) values('$classholderid','$classid','$user','$trainer','1','20','yes','$cdate','$time_from','$time_to')";
$query1="update csessions set amount='".$output."'where userid='".$user."'";
//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
if(mysqli_query($con,$query)==1){
	$one= 1;
	$output = $amount-$one;
  
$result1=mysqli_query($con,$query1);

	if($result1){
		$query2="insert into attendance(attendanceid,present,userid,created_date,compare_date,expire,active) values('$aid','yes','$user','$cdate','$compare_date','$tomorrow','yes')";
		$result2=mysqli_query($con,$query2);
		
			if($result2){
				echo "<head><script>alert('Enrollment Added ');</script></head></html>";
			echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
		  }
		  else{
			  echo "<head><script>alert('Enrollment Failed');</script></head></html>";
			 echo "error: ".mysqli_error($con);
			 //Deleting record of users if inserting to enrolls_to table failed to execute
			 $query3 = "DELETE FROM privateclasses WHERE privateclassid='$classid'";
			 mysqli_query($con,$query3);
		  }
		  
		}
			
}
		 
		else{
		   echo "<head><script>alert('Enrollment Failed');</script></head></html>";
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
