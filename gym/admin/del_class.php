<?php
include('../constant/connect.php');

$msgid = $_GET['id'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM classes WHERE classid='$msgid'");
    echo "<html><head><script>alert('Class Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_class.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>