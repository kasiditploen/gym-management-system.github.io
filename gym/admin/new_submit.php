<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $uname=mysqli_real_escape_string($con,$_POST['u_name']);
 $password= hash('sha256', mysqli_real_escape_string($con, $_POST['password']));
 $nationalid=mysqli_real_escape_string($con,$_POST['nationalid']);
 $privilege=mysqli_real_escape_string($con,$_POST['privilege']);
 $goal=mysqli_real_escape_string($con,$_POST['goal']);
 $nationality=mysqli_real_escape_string($con,$_POST['nationality']);
 $conditions=$_POST['conditions'];
 $i = implode(',', $conditions);
 $fname=mysqli_real_escape_string($con,$_POST['fname']);
 $lname=mysqli_real_escape_string($con,$_POST['lname']);
 $stname=mysqli_real_escape_string($con,$_POST['street_name']);
 $city=mysqli_real_escape_string($con,$_POST['city']);
 $zipcode=$_POST['zipcode'];
 $state=mysqli_real_escape_string($con,$_POST['state']);
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $phn=$_POST['mobile'];
 $email=$_POST['email'];
 $jdate=$_POST['jdate'];
 $domp=$_POST['domp'];
 $status=$_POST['status'];
 $plan=mysqli_real_escape_string($con,$_POST['plan']);
 $pt=mysqli_real_escape_string($con,$_POST['pt']);
 $ct=mysqli_real_escape_string($con,$_POST['ct']);
 $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
 $title=mysqli_real_escape_string($con,$_POST['title']);

$user=$_POST['utype'];
$none = "none";

if(strpos($i,$none) !== false){
  $e = $i;
  }else{
  $e = $none;

  }

 function createSalt()
 {
     return '2123293dsj2hu2nikhiljdsd';
 }

 $salt = createSalt();
$pass = hash('sha256', $salt . $password);


 $emailselect = "SELECT email from users where email='$email'";
 $emaildupe =mysqli_query($con,$emailselect);

 $duplicate=mysqli_query($con,"select * from users where userid='$memID' or email ='$email'");
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

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
}

//inserting into users table
$query="CALL insertData('$uname','$gender','$phn','$email','$dob','$jdate','$memID', '$image','$status','$pass','$fname','$lname','$nationalid','$nationality', '$goal','".mysqli_real_escape_string($con,$e)."','$user','$title')";
mysqli_real_escape_string($con, $uname);
mysqli_real_escape_string($con, $password);
mysqli_real_escape_string($con, $stname);
mysqli_real_escape_string($con, $nationalid);
mysqli_real_escape_string($con, $privilege);
mysqli_real_escape_string($con, $city);
mysqli_real_escape_string($con, $state);
mysqli_real_escape_string($con, $plan);
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";

    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from plan where pid='$plan' and plantype='Months'";
      $result=mysqli_query($con,$query1);

      

        if($result){
          
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Months - 1 day");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query2="insert into enrolls_to(pid,uid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){

            $query4="insert into health_status(uid,active) values('$memID','yes')";
            if(mysqli_query($con,$query4)==1){

              $query5="insert into address(id,streetName,state,city,zipcode) values('$memID','$stname','$state','$city','$zipcode')";
              if(mysqli_query($con,$query5)==1){
                $query6="select * from plan where pid='$pt'";
                $result6=mysqli_query($con,$query6);
                
              } 
              if($pt!='' && $ct=='' && $result6){
                
                $value1=mysqli_fetch_row($result6);
                date_default_timezone_set("Asia/Bangkok"); 
                $d1=strtotime("+".$value1[3]." Months - 1 day");
                $cdate1=date("Y-m-d"); //current date
                $expiredate1=date("Y-m-d",$d1);
                $noyessession="$value1[7]";
                $query7="insert into sessions(pid,userid,amount,paid_date,expire,renewal) values('$pt','$memID','$noyessession','$cdate1','$expiredate1','yes')";
                if(mysqli_query($con,$query7)==1){
                  echo "<head><script>alert('Member Added Personal ');</script></head></html>";
                  echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
                
                }
              }

              if($pt=='' && $ct=='' && $result6){
                echo "<head><script>alert('Member Added Membership ');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
              }
          
              if($pt!='' && $ct!='' && $result6){
                
                $value1=mysqli_fetch_row($result6);
                date_default_timezone_set("Asia/Bangkok"); 
                $d1=strtotime("+".$value1[3]." Months - 1 day");
                $cdate1=date("Y-m-d"); //current date
                $expiredate1=date("Y-m-d",$d1);
                $noyessession="$value1[7]";
                $query7="insert into sessions(pid,userid,amount,paid_date,expire,renewal) values('$pt','$memID','$noyessession','$cdate1','$expiredate1','yes')";
                if(mysqli_query($con,$query7)==1){
                  $query8="select * from plan where pid='$ct'";
                  $result8=mysqli_query($con,$query8);

                  if(mysqli_query($con,$query8)==1){
                    $value2=mysqli_fetch_row($result8);
                    date_default_timezone_set("Asia/Bangkok"); 
                    $d2=strtotime("+".$value2[3]." Months - 1 day");
                    $cdate2=date("Y-m-d"); //current date
                    $expiredate2=date("Y-m-d",$d2);
                    $noyessession="$value2[7]";                    
                    $query9="insert into csessions(pid,userid,amount,paid_date,expire,renewal) values('$ct','$memID','$noyessession','$cdate2','$expiredate2','yes')";
                  
                    if(mysqli_query($con,$query9)==1){
                      echo "<head><script>alert('Member Added ALL ADD ');</script></head></html>";
                    echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
                  }
                }
              }

                  
                    if($pt=='' && $ct!='' && $result6){
                  
                      $value2=mysqli_fetch_row($result6);
                      date_default_timezone_set("Asia/Bangkok"); 
                      $d1=strtotime("+".$value2[3]." Months - 1 day");
                      $cdate1=date("Y-m-d"); //current date
                      $expiredate1=date("Y-m-d",$d1);
                      $noyessession="$value2[7]";
                      $query8="select * from plan where pid='$ct'";
                      $result8=mysqli_query($con,$query8);
                      if(mysqli_query($con,$query8)==1){
                        $value3=mysqli_fetch_row($result8);
                        date_default_timezone_set("Asia/Bangkok"); 
                        $d2=strtotime("+".$value3[3]." Months - 1 day");
                        $cdate2=date("Y-m-d"); //current date
                        $expiredate2=date("Y-m-d",$d2);
                        $noyessession2="$value3[7]";                    
                        $query9="insert into csessions(pid,userid,amount,paid_date,expire,renewal) values('$ct','$memID','$noyessession','$cdate2','$expiredate2','yes')";
                        
                        if(mysqli_query($con,$query9)==1){
                          echo "<head><script>alert('Member Added Class and Membership ');</script></head></html>";
                          echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
                        } 
                        
                        
                      }
                    }
                        
  
                      
                     
                      
                    
                }

                
                  
                  

              }else if($pt=='' or $ct=='' && $result6){
                echo "<head><script>alert('Member Added Membership ');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
              } else if($pt=='' or $ct==''){
                echo "<head><script>alert('Please try again!');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=new_entry.php'>";


             
                
              }
                
              
              }


            }
             
            
            
          }
          else if($pt=='' && $ct!='' && $result6){
                  
            $value2=mysqli_fetch_row($result6);
            date_default_timezone_set("Asia/Bangkok"); 
            $d1=strtotime("+".$value2[3]." Months -1 day");
            $cdate1=date("Y-m-d"); //current date
            $expiredate1=date("Y-m-d",$d1);
            $noyessession="$value2[7]";
            $query8="select * from plan where pid='$ct'";
            $result8=mysqli_query($con,$query8);
            if(mysqli_query($con,$query8)==1){
              $value3=mysqli_fetch_row($result8);
              date_default_timezone_set("Asia/Bangkok"); 
              $d2=strtotime("+".$value3[3]." Months -1 day");
              $cdate2=date("Y-m-d"); //current date
              $expiredate2=date("Y-m-d",$d2);
              $noyessession2="$value3[7]";                    
              $query9="insert into csessions(pid,userid,amount,paid_date,expire,renewal) values('$ct','$memID','$noyessession','$cdate2','$expiredate2','yes')";
              
              if(mysqli_query($con,$query9)==1){
                echo "<head><script>alert('Member Added ');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
              }
          }

         
        }
        
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      
  


    
?>
