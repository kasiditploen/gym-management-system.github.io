<?php
include('../constant/connect.php');

$maintainid =$_POST['maintainid'];
$machineid =$_POST['machineid'];
$name = $_POST['maintainname'];
$desc = $_POST['desc'];
$condition = $_POST['condition'];
$duration = $_POST['duration'];
$mainday = $_POST['mainday'];



//inserting into users table
$query="INSERT INTO maintain (maintainid,machineid,maintainName,description,mainday,duration) values('$maintainid','$machineid','$name','$desc','$mainday','$duration')";
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";

  if(mysqli_query($con,$query)==1){
      $query1="update enrolls_to_maintenance set renewal='no' where machineid='$machineid'";
      $result1=mysqli_query($con,$query1);

      
      
      
      }
      if(mysqli_query($con,$query1)==1){
        $query4="select * from maintain where machineid='$machineid'";
        $result4=mysqli_query($con,$query4);
          
      
      
      if(mysqli_query($con,$query4)==1){
        $value=mysqli_fetch_row($result4);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[6]." minutes");
          $startdate=date("h:i:s"); //current date
          $duration=date("h:i:s",$d);
          $cdate=date("d-m-Y"); //current date
          
				$query5="insert into enrolls_to_maintain(machineid,wid,start_date,duration,renewal,main_date) values('$machineid','$mainday','$startdate','$duration','yes','$cdate')";
        

      }

      


      if(mysqli_query($con,$query5)==1){

				echo "<head><script>alert('Maintain Added ');</script></head></html>";
              echo "<meta http-equiv='refresh' content='0; url=new_maintain.php?id=<?php echo $row[machineid];?>'>";

      }
             
            else{
               echo "<head><script>alert('Maintain Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM maintain WHERE machineid='$machineid'";
                mysqli_query($con,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Asset Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of users if inserting to enrolls_to table failed to execute
             $query3 = "DELETE FROM maintain WHERE machineid='$machineid'";
             mysqli_query($con,$query3);
          }
        




        
      
    
   
	
?>
