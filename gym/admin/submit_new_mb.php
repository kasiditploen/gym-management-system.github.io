<?php
include('../constant/connect.php');

$mbid =$_POST['mbid'];
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$name = $_POST['mbname'];
$desc = $_POST['desc'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$vendor = $_POST['vendor'];
$amount = $_POST['amount'];
$warranty = $_POST['warranty'];


//inserting into users table
$query="INSERT INTO mb (mbid,image,mbName,description,brands,categories,vendors,amount,warranty) values('$mbid','$image','$name','$desc','$brand','$category','$vendor','$amount','$warranty')";
mysqli_real_escape_string($con, $seid);
mysqli_real_escape_string($con, $name);
mysqli_real_escape_string($con, $desc);
mysqli_real_escape_string($con, $brand);
mysqli_real_escape_string($con, $amount);
mysqli_real_escape_string($con, $warranty);

//$query="insert into users(username,gender,mobile,email,dob,joining_date,userid) values('$uname','$gender','$phn','$email','$dob','$jdate','$memID','$image')";
    if(mysqli_query($con,$query)==1){
      $query1="select * from mb where warranty = '$warranty'";
      
     
          if(mysqli_query($con,$query1)==1){

            echo "<head><script>alert(' Boxing Equipment Added ');</script></head></html>";
      echo "<meta http-equiv='refresh' content='0; url=view_mb.php'>";
              
				
               
              
              
            }
             
            else{
               echo "<head><script>alert('Weight Training Added Failed');</script></head></html>";
              echo "error: ".mysqli_error($con);
               //Deleting record of users if inserting to enrolls_to table failed to execute
                $query3 = "DELETE FROM mb WHERE mbid='$mbid'";
                mysqli_query($con,$query3);
            }
            
          }
          else{
            echo "<head><script>alert('Weight Training Added Failed');</script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of users if inserting to enrolls_to table failed to execute
             $query3 = "DELETE FROM mb WHERE mbid='$mbid'";
             mysqli_query($con,$query3);
          }
        

         
        
       

    
   
	
?>
