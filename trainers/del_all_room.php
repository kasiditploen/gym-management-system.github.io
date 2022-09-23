<?php
include('../constant/connect.php');

$classid = $_POST['room_delete_id'];
$extract_id = implode(',' , $classid);
    

$query = "DELETE FROM studio WHERE studioid IN($extract_id) ";
$query_run = mysqli_query($con, $query);

if(mysqli_query($con,$query)==1){
    mysqli_query($con, "DELETE FROM studio WHERE studioid='$extract_id'");
    echo "<html><head><script>alert('Studio(s) Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_room.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>