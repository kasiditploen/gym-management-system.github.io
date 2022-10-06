<?php
include('../constant/connect.php');
$revenue = 0;
$machineid =$_POST['machineid'];
$type = $_POST['type'];
$name = $_POST['machinename'];
$desc = $_POST['desc'];
$studio = $_POST['studio'];
$qty = $_POST['quantity'];
$pdate = $_POST['pdate'];
$status = $_POST['status'];
$mainday = $_POST['mainday'];
$repair = $_POST['repair'];
$mneed = $_POST['mneed'];


//inserting into users table
$query="INSERT INTO newmachine (machineid,toe,description,studio,quantity,status,mainday,repair,mneed) values('$machineid','$type','$desc','$studio','$qty','$status','$mainday','$repair','$mneed')";
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";
if(mysqli_query($con,$query)==1){
  $query1="select * from toe where toeid='$type'";
  $result1=mysqli_query($con,$query1);
  
  if(mysqli_query($con,$query1)==1){
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                    $revenue = ($row1['amount'] * $qty)+$revenue;
                                    $warranty = $row1['warranty'];
    $query2="update newmachine set type='".$type."',subtotal='".$revenue."' where machineid='".$machineid."'";
    $result2=mysqli_query($con,$query2);
  }
  if(mysqli_query($con,$query2)==1){
      $query3="select * from newmachine where mainday='$mainday'";
      $result3=mysqli_query($con,$query3);
      
      if(mysqli_query($con,$query3)==1){
				$value=mysqli_fetch_row($result3);
        $expire=$value['expire'];
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[6]." days");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          
          $query4="insert into enrolls_to_maintenance(machineid,wid,paid_date,expire,renewal) values('$machineid','$mainday','$cdate','$expiredate','yes')";
      }
      if(mysqli_query($con,$query4)==1){
        $query1="select * from toe where warranty = '$warranty'";
      $result=mysqli_query($con,$query1);
        if($result){
          $value=mysqli_fetch_row($result);
            date_default_timezone_set("Asia/Bangkok"); 
            $d=strtotime("+".$value[13]." Years");
            $cdate=date("Y-m-d"); //current date
            
            $toeid=$value['toeid'];
            $query5="insert into enrolls_to_warranty(wid,toeid,paid_date,expire,active,machineid) values('$warranty','$type','$cdate','$expire','yes',$machineid)";
        }
      
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
