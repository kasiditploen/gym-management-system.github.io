<?php
include('../constant/connect.php');
//page_protect();

	$categoryid =mysqli_real_escape_string($con,$_POST['categoryid']);
    $name =mysqli_real_escape_string($con, $_POST['categoryname']);
    $desc =mysqli_real_escape_string($con, $_POST['desc']);

    
    
   //Inserting data into plan table
    $query2="insert into categories(categoryid,categoryName,description,active) values('$categoryid','$name','$desc','yes')";
    mysqli_real_escape_string($con, $categoryid);
    mysqli_real_escape_string($con, $name);
    mysqli_real_escape_string($con, $desc);
   

	 if(mysqli_query($con,$query2)==1){
    echo "<head><script>alert('Category Added ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_category.php'>";
   
    
   }
    else{
        echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
