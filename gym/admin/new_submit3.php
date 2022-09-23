<?php
include('../constant/connect.php');

 $memID=$_POST['m_id'];
 $age=$_POST['age'];
 $goal=mysqli_real_escape_string($con,$_POST['goal']);
 $gender=$_POST['gender'];
 $jdate=$_POST['jdate'];
 $domp=$_POST['domp'];
 $status=$_POST['status'];
 $plan=mysqli_real_escape_string($con,$_POST['plan']);
 $pt=mysqli_real_escape_string($con,$_POST['pt']);
 $ct=mysqli_real_escape_string($con,$_POST['ct']);






 $emailselect = "SELECT email from users where email='$email'";
 $emaildupe =mysqli_query($con,$emailselect);

 $duplicate=mysqli_query($con,"select * from dayusers where dayuserid='$memID'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('ERROR! SOMETHING WRONG WITH USERID. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}
//inserting into users table
$query="insert into dayusers (dayuserid,agegroup,gender,goal,joining_date) VALUES ('$memID','$age','$gender','$goal','$jdate')";

mysqli_real_escape_string($con, $plan);
//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";

    if(mysqli_query($con,$query)==1){
      //Retrieve information of plan selected by user
      $query1="select * from plan where pid='$plan' and plantype='Hours'";
      $result=mysqli_query($con,$query1);

      

        if($result){
          
          $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[3]." Hours");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query2="insert into enrolls_to_day(pid,dayuserid,paid_date,expire,renewal) values('$plan','$memID','$cdate','$expiredate','yes')";
          if(mysqli_query($con,$query2)==1){

            
                $query6="select * from plan where pid='$pt'";
                $result6=mysqli_query($con,$query6);
                
              } 
              if($pt!='' && $ct=='' && $result6){
                
                $value1=mysqli_fetch_row($result6);
                date_default_timezone_set("Asia/Bangkok"); 
                $d1=strtotime("+".$value1[3]." Hours");
                $cdate1=date("Y-m-d"); //current date
                $expiredate1=date("Y-m-d",$d1);
                $noyessession="$value1[7]";
                $query7="insert into sessions2(pid,dayuserid,amount,paid_date,expire,renewal) values('$pt','$memID','$noyessession','$cdate1','$expiredate1','yes')";
                if(mysqli_query($con,$query7)==1){
                  echo "<head><script>alert('Walk-in Checked ');</script></head></html>";
                  echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
                
                }
              }

              if($pt=='' && $ct=='' && $result6){
                echo "<head><script>alert('Walk-in Checked ');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
              }
          
              if($pt!='' && $ct!='' && $result6){
                
                $value1=mysqli_fetch_row($result6);
                date_default_timezone_set("Asia/Bangkok"); 
                $d1=strtotime("+".$value1[3]." Hours");
                $cdate1=date("Y-m-d"); //current date
                $expiredate1=date("Y-m-d",$d1);
                $noyessession="$value1[7]";
                $query7="insert into sessions2(pid,dayuserid,amount,paid_date,expire,renewal) values('$pt','$memID','$noyessession','$cdate1','$expiredate1','yes')";
                if(mysqli_query($con,$query7)==1){
                  $query8="select * from plan where pid='$ct'";
                  $result8=mysqli_query($con,$query8);

                  if(mysqli_query($con,$query8)==1){
                    $value2=mysqli_fetch_row($result8);
                    date_default_timezone_set("Asia/Bangkok"); 
                    $d2=strtotime("+".$value2[3]." Hours");
                    $cdate2=date("Y-m-d"); //current date
                    $expiredate2=date("Y-m-d",$d2);
                    $noyessession="$value2[7]";                    
                    $query9="insert into csessions2(pid,dayuserid,amount,paid_date,expire,renewal) values('$ct','$memID','$noyessession','$cdate2','$expiredate2','yes')";
                  
                    if(mysqli_query($con,$query9)==1){
                      echo "<head><script>alert('Walk-in Checked ');</script></head></html>";
                    echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
                  }
                }
              }

                  
                    if($pt=='' && $ct!='' && $result6){
                  
                      $value2=mysqli_fetch_row($result6);
                      date_default_timezone_set("Asia/Bangkok"); 
                      $d1=strtotime("+".$value2[3]." Hours");
                      $cdate1=date("Y-m-d"); //current date
                      $expiredate1=date("Y-m-d",$d1);
                      $noyessession="$value2[7]";
                      $query8="select * from plan where pid='$ct'";
                      $result8=mysqli_query($con,$query8);
                      if(mysqli_query($con,$query8)==1){
                        $value3=mysqli_fetch_row($result8);
                        date_default_timezone_set("Asia/Bangkok"); 
                        $d2=strtotime("+".$value3[3]." Hours");
                        $cdate2=date("Y-m-d"); //current date
                        $expiredate2=date("Y-m-d",$d2);
                        $noyessession2="$value3[7]";                    
                        $query9="insert into csessions2(pid,dayuserid,amount,paid_date,expire,renewal) values('$ct','$memID','$noyessession','$cdate2','$expiredate2','yes')";
                        
                        if(mysqli_query($con,$query9)==1){
                          echo "<head><script>alert('Walk-in Checked ');</script></head></html>";
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


         
          else if($pt=='' && $ct!='' && $result6){
                  
            $value2=mysqli_fetch_row($result6);
            date_default_timezone_set("Asia/Bangkok"); 
            $d1=strtotime("+".$value2[3]." Hours");
            $cdate1=date("Y-m-d"); //current date
            $expiredate1=date("Y-m-d",$d1);
            $noyessession="$value2[7]";
            $query8="select * from plan where pid='$ct'";
            $result8=mysqli_query($con,$query8);
            if(mysqli_query($con,$query8)==1){
              $value3=mysqli_fetch_row($result8);
              date_default_timezone_set("Asia/Bangkok"); 
              $d2=strtotime("+".$value3[3]." Hours");
              $cdate2=date("Y-m-d"); //current date
              $expiredate2=date("Y-m-d",$d2);
              $noyessession2="$value3[7]";                    
              $query9="insert into csessions2(pid,dayuserid,amount,paid_date,expire,renewal) values('$ct','$memID','$noyessession','$cdate2','$expiredate2','yes')";
              
              if(mysqli_query($con,$query9)==1){
                echo "<head><script>alert('Walk-in Checked ');</script></head></html>";
                echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
              }
          }

         
        }
        
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

      
  


    
?>
