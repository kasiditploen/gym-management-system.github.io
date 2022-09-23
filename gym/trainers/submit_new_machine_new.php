<?php
include('../constant/connect.php');

$machineid =$_POST['machineid'];
$type = $_POST['type'];
$name = $_POST['machinename'];
$desc = $_POST['desc'];
$studio = $_POST['studio'];
$qty = $_POST['quantity'];
$pdate = $_POST['pdate'];
$status = $_POST['status'];
$mainday = $_POST['mainday'];



//inserting into users table
$query="INSERT INTO newmachine (machineid,toe,description,studio,quantity,status,mainday) values('$machineid','$type','$desc','$studio','$qty','$status','$mainday')";
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";
if(mysqli_query($con,$query)==1){
  //Retrieve information of plan selected by user
  $query1="select * from toe where toeid='$type'";
  $result1=mysqli_query($con,$query1);
  
  if(mysqli_query($con,$query1)==1){
    $query2="update newmachine set type='".$type."' where machineid='".$id."'";
    $result2=mysqli_query($con,$query2);
  }
  if(mysqli_query($con,$query2)==1){
      $query3="select * from newmachine where mainday='$mainday'";
      $result3=mysqli_query($con,$query3);
      
      if(mysqli_query($con,$query3)==1){
				$value=mysqli_fetch_row($result3);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[6]." days");
          $cdate=date("d-m-Y"); //current date
          $expiredate=date("d-m-Y",$d);
          //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query4="insert into enrolls_to_maintenance(machineid,wid,paid_date,expire,renewal) values('$machineid','$mainday','$cdate','$expiredate','yes')";
      }
      if(mysqli_query($con,$query4)==1){
        $query5="select * from maintain where machineid='$machineid'";
      $result5=mysqli_query($con,$query5);
      
      if(mysqli_query($con,$query5)==1){
				echo "<head><script>alert('Asset Added ');</script></head></html>";
              echo "<meta http-equiv='refresh' content='0; url=newmachine.php'>";

      }
             
            else{
               echo "<head><script>alert('Asset Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM newmachine WHERE machineid='$machineid'";
                mysqli_query($con,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Asset Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of users if inserting to enrolls_to table failed to execute
             $query3 = "DELETE FROM newmachine WHERE machineid='$machineid'";
             mysqli_query($con,$query3);
          }
        

} 
        
}
        
      
    
   
	
?>
