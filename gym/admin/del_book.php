<?php
include('../constant/connect.php');

$msgid = $_GET['id'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM booking WHERE bookingid='$msgid'");
    echo "<html><head><script>alert('Booking Declined');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_booking.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>