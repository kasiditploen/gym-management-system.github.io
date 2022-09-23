<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $uname=mysqli_real_escape_string($con,$_POST['u_name']);
 $stname=mysqli_real_escape_string($con,$_POST['street_name']);
 $city=mysqli_real_escape_string($con,$_POST['city']);
 $zipcode=$_POST['zipcode'];
 $state=mysqli_real_escape_string($con,$_POST['state']);
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $phn=$_POST['mobile'];
 $email=$_POST['email'];
 $jdate=$_POST['jdate'];
 //$plan=mysqli_real_escape_string($con,$_POST['plan']);


 $emailselect = "SELECT email from users where email='$email'";
 $emaildupe =mysqli_query($con,$emailselect);

 $duplicate=mysqli_query($con,"select * from users where userid='$memID' or email ='$email'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('This Email has already been used! Please fill a new email. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
//inserting into users table
$query="CALL insertData('$uname','$gender','$phn','$email','$dob','$jdate','$memID', '$image')";
mysqli_real_escape_string($con, $uname);
mysqli_real_escape_string($con, $stname);
mysqli_real_escape_string($con, $city);
mysqli_real_escape_string($con, $state);
mysqli_real_escape_string($con, $plan);
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";

    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from plan where pid='$plan'";
      $result=mysqli_query($con,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){

            $query4="insert into health_status(uid) values('$memID')";
            if(mysqli_query($con,$query4)==1){

              $query5="insert into address(id,streetName,state,city,zipcode) values('$memID','$stname','$state','$city','$zipcode')";
              if(mysqli_query($con,$query5)==1){
               echo "<head><script>alert('Member Added ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
              }
              
            
              else{
                  echo "<head><script>alert('Member Added Failed');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of users if inserting to enrolls_to table failed to execute
                 $query3 = "DELETE FROM users WHERE userid='$memID'";
                 mysqli_query($con,$query3);
              }
            }
             
            else{
               echo "<head><script>alert('Member Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM users WHERE userid='$memID'";
                mysqli_query($con,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Member Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of users if inserting to enrolls_to table failed to execute
             $query3 = "DELETE FROM users WHERE userid='$memID'";
             mysqli_query($con,$query3);
          }

         
        }
        else
        {
          echo "<head><script>alert('Member Added Failed');</script></head></html>";
          echo "error: ".mysqli_error($con);
           //Deleting record of users if retrieving inf of plan failed
          $query3 = "DELETE FROM users WHERE userid='$memID'";
          mysqli_query($con,$query3);
        }

    }
    else{
        echo "<head><script>alert('Member Added Failed');</script></head></html>";
        echo "error: ".mysqli_error($con);
      }
?>
