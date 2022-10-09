<?php
include('../constant/connect.php');
//include('../constant/layout/head.php');
$pid=$_GET['qe'];
$query="select * from plan where pid='".$pid."'";
$res=mysqli_query($con,$query);
if($res){
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	// echo "<tr><td>".$row['amount']."</td></tr>";
	echo "
	      <div class='form-group'>
           <div class='row'>
       <label class='col-sm-6 control-label'>AMOUNT</label>
        <div class='col-sm-4' style='width:330px;'>
          <input type='text' name='u_amount' id='boxx' value='".$row['amount']."฿' maxlength='30' readonly class='form-control' style='width:550px;'>
          </div>
          </div>
          </div>
		 <div class='form-group'>
           <div class='row'>
       <label class='col-sm-6 control-label'>VALIDITY</label>
        <div class='col-sm-4' style='width:330px;'>
          <input type='text' name='u_validate1' id='boxx' value='".$row['validity']." Month' maxlength='30' readonly class='form-control' style='width:550px;'>
          </div>
          </div>
          </div>
          <div class='form-group'>
           <div class='row'>
       <label class='col-sm-6 control-label'>SESSION</label>
        <div class='col-sm-4' style='width:330px;'>
          <input type='text' name='u_session1' id='boxx' value='".$row['session']." Session(s)' maxlength='30' readonly class='form-control' style='width:550px;'>
          </div>
          </div>
          </div>
		
	";
	       

}

?>