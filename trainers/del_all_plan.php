<?php
include('../constant/connect.php');

$classid = $_POST['p_delete_id'];
$extract_id = implode(',' , $classid);
    

$query = "DELETE FROM plan WHERE pid IN($extract_id) ";
$query_run = mysqli_query($con, $query);


if(mysqli_query($con,$query)==1){
    mysqli_query($con, "DELETE FROM plan WHERE pid='$extract_id'");
    echo "<html><head><script>alert('Plan(s) Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_plan.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>