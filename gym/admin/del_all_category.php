<?php
include('../constant/connect.php');

$classid = $_POST['category_delete_id'];
$extract_id = implode(',' , $classid);
    

$query = "DELETE FROM categories WHERE categoryid IN($extract_id) ";
$query_run = mysqli_query($con, $query);


if(mysqli_query($con,$query)==1){
    mysqli_query($con, "DELETE FROM categories WHERE categoryid='$extract_id'");
    echo "<html><head><script>alert('Category(ies) Deleted');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=view_category.php'>";
} else {
    echo "<html><head><script>alert('ERROR! Delete Opertaion Unsucessfull');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>