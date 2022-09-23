<?php
include('../constant/connect.php');


$appointmentid =$_POST['appointmentid'];
$name = $_POST['classname'];
$desc = $_POST['desc'];
$studio = $_POST['studios'];
$dow = $_POST['dow'];
$i = implode(',', $dow);
$start_date = $_POST['start_date'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$trainer= $_POST['trainerid'];
$user= $_POST['userid'];
$classtype= $_POST['classtype'];
$session= $_POST['session'];
$approved= $_POST['approved'];

//inserting into private table
$query="INSERT INTO appointment (appointmentid,className,description,userid,studios,dow,start_date,time_from,time_to,trainerid,classtype,session,approved) values('$appointmentid','$name','$desc','$user','$studio','".mysqli_real_escape_string($con,$i)."','$start_date','$time_from','$time_to','$trainer','$classtype','yes','no')";
//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from trainers where trainerid='$trainer'";
      $result=mysqli_query($con,$query1);

        if($result){
          echo "<head><script>alert('Approval Added ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=view_trainer_appointment.php'>"; 

              }
              else{
                  echo "<head><script>alert('Approval Added');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of users if inserting to enrolls_to table failed to execute
                 $query3 = "DELETE FROM appointment WHERE appointmentid='$appointmentid'";
                 mysqli_query($con,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Approved Added');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM appointment WHERE appointmentid='$appointmentid'";
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
