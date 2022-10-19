<?php
include('../constant/connect.php');

date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date('Y-m-d');
        $chour=date('H:i');
        $y1date=date('Y-m-d',strtotime('- 1 days'));
        $y2date=date('Y-m-d',strtotime('- 2 days'));
        $y3date=date('Y-m-d',strtotime('- 3 days'));
        $y4date=date('Y-m-d',strtotime('- 4 days'));
        $y5date=date('Y-m-d',strtotime('- 5 days'));
        $y6date=date('Y-m-d',strtotime('- 6 days'));
        $y7date=date('Y-m-d',strtotime('- 7 days'));


$classid =$_GET['ci'];
$user = $_GET['id'];
$name = $_POST['privateclassname'];
$desc = $_POST['desc'];
$studio = $_POST['privatestudios'];
$dow = $_POST['dow'];
$date_from = $_POST['date_from'];
$date_to  = $_POST['date_to'];
$time_from = $_GET['tf'];
$time_to = $_GET['tt'];
$classtype= $_POST['privateclasstype'];
$trainer= $_GET['tid'];
$classholderid= $_POST['classholderid'];
$amount= $_GET['am'];
$csession= $_GET['cs'];
$pid= $_GET['pid'];
date_default_timezone_set("Asia/Bangkok"); 
$tomorrow = date("Y-m-d", strtotime('tomorrow'));
  $compare_date=date("Y-m-d");
  $cdate=date("Y-m-d"); //current date
$one= 1;
$output = $amount-$one;
date_default_timezone_set("Asia/Bangkok"); 
$cdate=date('Y-m-d');

$queryx  = "select * from classholder WHERE userid='$id'";
            $result = mysqli_query($con, $queryx);
           

            if ($result) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $timexfrom = $row['time_from'];
				  $timexto = $row['time_to'];
			}

$duplicate=mysqli_query($con,"select * from classholder where userid ='$user' and classid ='$classid' and created_date LIKE '%$cdate%'");
$duplicate1=mysqli_query($con,"select * from classholder where userid ='$user' and classid ='$classid' and created_date LIKE '%$cdate%' and time_from='$timexfrom' and time_to='$timexto'");

if ($amount <= 0){
    echo "<head><script>alert('No more session left. Please renew your class package. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_attendance.php'>";
	echo "error: ".mysqli_error($con);
	
  } else if($chour >= $time_from and $chour >= $time_to) {
    echo "<head><script>alert('You cannot book the ongoing or ended class within the same day.');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
} else if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('You have already register this class already.');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
} else if (mysqli_num_rows($duplicate1)>0)
{
  echo "<head><script>alert('Schedule Conflict!!!');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
} else {
	$query="INSERT INTO classholder (classholderid,classid,userid,trainerid,active,created_date,time_from,time_to) values('$classholderid','$classid','$user','$trainer','yes','$cdate','$time_from','$time_to')";
	$query1="update csessions set amount='".$output."'where userid='".$user."'";
  

//inserting into private table


//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
if(mysqli_query($con,$query)==1){
	$one= 1;
	$output = $amount-$one;
  
$result1=mysqli_query($con,$query1);

	if($result1){
		$query2="insert into attendance(attendanceid,present,userid,created_date,compare_date,expire,active,type) values('$aid','yes','$user','$cdate','$compare_date','$tomorrow','yes','cs')";
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
