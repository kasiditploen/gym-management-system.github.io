<?php
include('../constant/connect.php');



$classid =$_POST['privateclassid'];
$name = $_POST['privateclassname'];
$desc = $_POST['desc'];
$user = $_POST['userid'];
$studio = $_POST['privatestudios'];
$dow = $_POST['dow'];
$date_from = $_POST['date_from'];
$date_to  = $_POST['date_to'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$trainer= $_POST['trainerid'];

//inserting into private table
$query="INSERT INTO privateclasses (privateclassid,className,description,userid,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$user','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
//$query="insert into privateclasses (privateclassid,className,description,studios,dow,date_from,date_to,time_from,time_to,trainerid) values('$classid','$name','$desc','$studio','$dow','$date_from','$date_to','$time_from','$time_to','$trainer')";
    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from trainers where trainerid='$trainer'";
      $result=mysqli_query($con,$query1);

        if($result){
          echo "<head><script>alert('Private Class Added ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=view_privateclass.php'>";

              }
              else{
                  echo "<head><script>alert('Asset Added Failed');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of users if inserting to enrolls_to table failed to execute
                 $query3 = "DELETE FROM privateclasses WHERE privateclassid='$classid'";
                 mysqli_query($con,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Asset Added Failed');</script></head></html>";
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
