<?php
include('../constant/connect.php');

 $memtID=mysqli_real_escape_string($con,$_POST['adminid']);
 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $uname=mysqli_real_escape_string($con,$_POST['adminname']);
 $password= hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
 $fname=mysqli_real_escape_string($con,$_POST['fname']);
 $lname=mysqli_real_escape_string($con,$_POST['lname']);
 $address=mysqli_real_escape_string($con,$_POST['address']);
 $gender=mysqli_real_escape_string($con,$_POST['gender']);
 $dob=mysqli_real_escape_string($con,$_POST['dob']);
 $phn=mysqli_real_escape_string($con,$_POST['mobile']);
 $email=mysqli_real_escape_string($con,$_POST['email']);
 $jdate=mysqli_real_escape_string($con,$_POST['jdate']);
 $user=mysqli_real_escape_string($con,$_POST['utype']);
 $groupid=mysqli_real_escape_string($con,$_POST['group_id']);
 //$plan=$_POST['plan2'];
 function isimage(){
  $type=$_FILES['image']['type'];     
  
  $extensions=array('image/jpg','image/jpe','image/jpeg','image/jfif','image/png','image/bmp','image/dib','image/gif');
      if(in_array($type, $extensions)){
          return true;
      }
      else
      {
        echo "<head><script>alert('Not an image file.');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
        echo mysqli_error($db);
      }
  }
  
      if(isimage()){
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
$query="INSERT INTO admin (id,username,email,password,fname,lname,gender,dob,contact,address,created_on,utype,image,group_id) values('$memtID','$uname','$email','$pass','$fname','$lname','$gender','$dob','$phn','$address','$jdate','$user','$image','$groupid')";
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
          
               echo "<head><script>alert('Admin Added ');</script></head></html>";
               echo "<meta http-equiv='refresh' content='0; url=view_admin.php'>";
              }
              
              else{
                  echo "<head><script>alert('Admin Added Failed');</script></head></html>";
                 echo "error: ".mysqli_error($con);
                 //Deleting record of trainers  if inserting to enrolls_to table failed to execute
                 $query8 = "DELETE FROM admin WHERE id='$memtID'";
                 mysqli_query($con,$query8);
              }
            }
             
            else{
               echo "<head><script>alert('Admin Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of trainers  if inserting to enrolls_to table failed to execute
                $query8 = "DELETE FROM admin WHERE id='$memtID'";
                mysqli_query($con,$query8);
            }
            
          
          
    
?>
