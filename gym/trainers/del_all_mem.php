<?php
include('../constant/connect.php');

$mem_id = $_POST['mem_delete_id'];
    $extract_id = implode(',' , $mem_id);


    $query = "DELETE FROM users WHERE userid IN($extract_id) ";
    $query_run = mysqli_query($con, $query);

if(mysqli_query($con,$query)==1){
    mysqli_query($con, "DELETE FROM users WHERE userid='$extract_id'");
    echo "<html><head><script>alert('Member(s) Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>