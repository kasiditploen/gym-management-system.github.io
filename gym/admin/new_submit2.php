<?php
include('../constant/connect.php');

 $memtID=$_POST['mt_id'];
 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $uname=mysqli_real_escape_string($con,$_POST['ut_name']);
 $password= hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
 $fname=mysqli_real_escape_string($con,$_POST['fname']);
 $lname=mysqli_real_escape_string($con,$_POST['lname']);
 $stname=mysqli_real_escape_string($con,$_POST['street_name2']);
 $city=mysqli_real_escape_string($con,$_POST['city2']);
 $zipcode=$_POST['zipcode2'];
 $state=mysqli_real_escape_string($con,$_POST['state2']);
 $gender=$_POST['gender2'];
 $dob=$_POST['dob2'];
 $phn=$_POST['mobile2'];
 $email=$_POST['email2'];
 $jdate=$_POST['jdate2'];
 $availableday = $_POST['availableday'];
 $i = implode(',', $availableday);
 $timefrom=$_POST['time_from'];
 $timeto=$_POST['time_to'];
 $trainertype=$_POST['trainertype'];
 $e = implode(',', $trainertype);
 $skills=$_POST['skills'];
 $yoe=$_POST['yoe'];
 $user=$_POST['utype'];
 //$plan=$_POST['plan2'];

 function createSalt()
 {
     return '2123293dsj2hu2nikhiljdsd';
 }

 $salt = createSalt();
$pass = hash('sha256', $salt . $password);
 
 $duplicate=mysqli_query($con,"select * from trainers where trainerid='$memtID' or email ='$email'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('This Email has already been used! Please fill a new email. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}

$duplicate1=mysqli_query($con,"select * from users where email ='$email'");
if (mysqli_num_rows($duplicate1)>0)
{
  echo "<head><script>alert('This Email has already been used! Please fill a new email. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}

$duplicate2=mysqli_query($con,"select * from admin where email ='$email'");
if (mysqli_num_rows($duplicate2)>0)
{
  echo "<head><script>alert('This Email has already been used! Please fill a new email. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
//inserting into trainers table
$query="CALL insertTrainers('$uname','$gender','$phn','$email','$dob','$jdate','$memtID', '$image','".mysqli_real_escape_string($con,$i)."','$timefrom','$timeto','".mysqli_real_escape_string($con,$e)."','$skills','$yoe','$pass','$fname','$lname','$user')";
mysqli_real_escape_string($con, $uname);
mysqli_real_escape_string($con, $stname);
mysqli_real_escape_string($con, $city);
mysqli_real_escape_string($con, $state);
mysqli_real_escape_string($con, $skills);


//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memtID','$image')";
    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      //$query6="select * from plan2 where pid='$plan'";
      //$result=mysqli_query($con,$query6);

        
          //$value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query7="insert into enrolls2_to(uid,paid_date,expire,renewal) values('$memtID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query7)==1){

            $query8="insert into health2_status(uid) values('$memtID')";
            if(mysqli_query($con,$query8)==1){

              $query9="insert into address2(id,streetName,state,city,zipcode) values('$memtID','$stname','$state','$city','$zipcode')";
              if(mysqli_query($con,$query9)==1){
               echo "<head><script>alert('Trainer Added ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=trainer.php'>";
              }
              
              else{
                  echo "<head><script>alert('Trainer Added Failed');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of trainers  if inserting to enrolls_to table failed to execute
                 $query8 = "DELETE FROM trainers WHERE trainerid='$memtID'";
                 mysqli_query($con,$query8);
              }
            }
             
            else{
               echo "<head><script>alert('Trainer Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of trainers  if inserting to enrolls_to table failed to execute
                $query8 = "DELETE FROM trainers WHERE trainerid='$memtID'";
                mysqli_query($con,$query8);
            }
            
          }
          else{
            echo "<head><script>alert('Trainer Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of trainers  if inserting to enrolls_to table failed to execute
             $query8 = "DELETE FROM trainers WHERE trainerid='$memtID'";
             mysqli_query($con,$query8);
          }

         
        }
        else
        {
          echo "<head><script>alert('Trainer Added Failed');</script></head></html>";
          echo "error: ".mysqli_error($con);
           //Deleting record of trainers  if retrieving inf of plan failed
          $query8 = "DELETE FROM trainers WHERE trainerid='$memtID'";
          mysqli_query($con,$query8);
        }

    
    
?>
