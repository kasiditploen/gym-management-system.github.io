<?php
include('../constant/connect.php');

$toeid =$_POST['toeid'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$type = $_POST['type'];
$name = $_POST['toename'];
$desc = $_POST['desc'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$vendor = $_POST['vendor'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$warranty = $_POST['warranty'];

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
//inserting into users table
$query="INSERT INTO toe (toeid,image,type,toeName,description,brands,categories,vendors,amount,warranty,contact,address,mobile,email) values('$toeid','$image','$type','$name','$desc','$brand','$category','$vendor','$amount','$warranty','$contact','$address','$mobile','$email')";
mysqli_real_escape_string($con, $toeid);
mysqli_real_escape_string($con, $name);
mysqli_real_escape_string($con, $desc);
mysqli_real_escape_string($con, $brand);
mysqli_real_escape_string($con, $amount);
mysqli_real_escape_string($con, $warranty);

//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";
    if(mysqli_query($con,$query)==1){
      $query1="select * from toe where warranty = '$warranty'";
      $result=mysqli_query($con,$query1);
      if($result){
        $value=mysqli_fetch_row($result);
          date_default_timezone_set("Asia/Bangkok"); 
          $d=strtotime("+".$value[13]." Years");
          $cdate=date("Y-m-d"); //current date
          $expiredate=date("Y-m-d",$d);
          
      }
     
          

            echo "<head><script>alert(' Equipment Added ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
              
				
               
              
              
            }
             
            else{
               echo "<head><script>alert('Equipment Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM toe WHERE toeid='$toeid'";
                mysqli_query($con,$query3);
            }
            
      }
        

         
        
       

    
   
	
?>
