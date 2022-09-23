<?php
include('../constant/connect.php');

$msgid = $_GET['id'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM studio WHERE studioid='$msgid'");
    echo "<html><head><script>alert('Studio Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_room.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>