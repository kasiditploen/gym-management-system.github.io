<?php
include('../constant/connect.php');

$msgid = $_GET['id'];
$amount=$_GET['amount'];
$userid=$_GET['userid'];
$one= 1;
$output = $amount+$one;
if (strlen($msgid) > 0) {
    mysqli_query($con, "DELETE FROM appointment WHERE appointmentid='$msgid'");
    mysqli_query($con,"update sessions set amount='".$output."'where userid='".$userid."'");
    echo "<html><head><script>alert('Appointment Declined');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>