<?php
include('../constant/connect.php');
    
    
   $uid=$_POST['uid'];
   $uname=$_POST['uname'];
   $gender=$_POST['gender'];
   $mobile=$_POST['phone'];
   $email=$_POST['email'];
   $dob=$_POST['dob'];
   $jdate=$_POST['jdate'];
   $stname=$_POST['stname'];
   $state=$_POST['state'];
   $city=$_POST['city'];
   $zipcode=$_POST['zipcode'];
   $calorie=$_POST['calorie'];
   $height=$_POST['height'];
   $weight=$_POST['weight'];
   $fat=$_POST['fat'];
   $remarks=$_POST['remarks'];
   $goal=mysqli_real_escape_string($con,$_POST['goal']);
   $conditions=$_POST['conditions'];
   $i = implode(',', $conditions);
$none = 'none';
   if(strpos($i,$none) !== false){
      $e = $i;
      }else{
      $e = $none;
    
      }
    
      $duplicate=mysqli_query($con,"select * from users where userid!='$uid' and email ='$email'");
      if (mysqli_num_rows($duplicate)>0)
      {
        echo "<head><script>alert('This Email has already been used! Please fill a new email. ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      echo mysqli_error($db);
      }
      
      $duplicate1=mysqli_query($con,"select * from trainers where email ='$email'");
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

    $query1="update users set username='".$uname."',gender='".$gender."',mobile='".$mobile."',email='".$email."',dob='".$dob."',joining_date='".$jdate."',goal='".$goal."',conditions='".mysqli_real_escape_string($con,$e)."' where userid='".$uid."'";
    //echo $query1;exit;

   if(mysqli_query($con,$query1)){
     $query2="update address set streetName='".$stname."',state='".$state."',city='".$city."',zipcode='".$zipcode."' where id='".$uid."'";
     if(mysqli_query($con,$query2)){
        $query3="update health_status set calorie='".$calorie."',height='".$height."',weight='".$weight."',fat='".$fat."',remarks='".$remarks."' where uid='".$uid."'";
        if(mysqli_query($con,$query3)){
            echo "<html><head><script>alert('Member Update Successfully');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
        }else{
             echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
             echo "error".mysqli_error($con);
        }
     }else{
        echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
         echo "error".mysqli_error($con);
     }
   }else{
    echo "<html><head><script>alert('ERROR! Update Opertaion Unsucessfull');</script></head></html>";
    echo "error".mysqli_error($con);
   }
    

?>
