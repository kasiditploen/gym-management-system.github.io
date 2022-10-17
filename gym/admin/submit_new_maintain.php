<?php
include('../constant/connect.php');

$maintainid =$_POST['maintainid'];
$machineid =$_POST['machineid'];
$name = $_POST['maintainname'];
$desc = $_POST['desc'];
$cons = $_POST['conditionnow'];
$duration = $_POST['duration'];
$mainday = $_POST['mainday'];
(int)$cost = $_POST['cost'];
$active = $_POST['active'];



    




$queryx="select * from enrolls_to_maintenance";
$resultx=mysqli_query($con,$queryx);
if(mysqli_query($con,$queryx)==1){
  $x=mysqli_fetch_row($resultx);
  $etm_id=$x['etm_id'];
//inserting into users table
$query="INSERT INTO maintain(maintainid,machineid,maintainName,description,mainday,duration,active,cost) values('$maintainid','$machineid','$name','$desc','$mainday','$duration','yes','$cost')";
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";
if ($active == 'no' and $cost >= '0') {
    
  echo "<head><script>alert('WARRANTY VOID! You must enter the maintenance cost!');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
  echo mysqli_error($db);
}else {
  
}
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
          $cdate=date("Y-m-d"); //current date
          
				$query5="insert into enrolls_to_maintain(machineid,wid,start_date,duration,renewal,main_date) values('$machineid','$mainday','$startdate','$duration','yes','$cdate')";
        

      }

      


      if(mysqli_query($con,$query5)==1){
        

        $query6="select * from toe";
        $result6=mysqli_query($con,$query6);

        if(mysqli_query($con,$query6)==1){
          $row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC);
          $toeid=$row6['toeid'];
          $query55="select * from enrolls_to_maintenance where machineid='$machineid'";
        $result55=mysqli_query($con,$query55);
        if(mysqli_query($con,$query55)==1){
          $row55 = mysqli_fetch_array($result55, MYSQLI_ASSOC);
          $x=mysqli_fetch_row($result55);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$x[2]." days");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          $query7="INSERT INTO enrolls_to_maintenance(machineid,wid,paid_date,expire,renewal) values('$machineid','$mainday','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query7)==1){
            
				echo "<head><script>alert('Maintain Added ');</script></head></html>";
              echo "<meta http-equiv='refresh' content='0; url=new_maintain.php'>";

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
        }
      }
    }
  }
    
        




        
      
    
   
	
?>
