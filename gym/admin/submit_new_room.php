<?php
include('../constant/connect.php');
//page_protect();

	$studioid =mysqli_real_escape_string($con,$_POST['studioid']);
    $name = mysqli_real_escape_string($con,$_POST['studioname']);
    $desc = mysqli_real_escape_string($con,$_POST['desc']);

    
    
   //Inserting data into plan table
    $query2="insert into studio(studioid,studioName,description,active) values('$studioid','$name','$desc','yes')";
    mysqli_real_escape_string($con, $studioid);
    mysqli_real_escape_string($con, $name);
    mysqli_real_escape_string($con, $desc);
   

	 if(mysqli_query($con,$query2)==1){
        
        echo "<head><script>alert('Studio Added ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=view_room.php'>";
       
      }
      

    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
