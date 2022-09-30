<?php
include('../constant/connect.php');

$classid = $_POST['class_delete_classid'];
    $extract_id = implode(',' , $classid);
    
    $query = "DELETE FROM classes WHERE classid IN($extract_id) ";
    $query_run = mysqli_query($con, $query);
    
    
   



if(mysqli_query($con,$query)==1){
    mysqli_query($con, "DELETE FROM classes WHERE classid='$extract_id'");
    echo "<html><head><script>alert('Class(es) Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_class_session.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>