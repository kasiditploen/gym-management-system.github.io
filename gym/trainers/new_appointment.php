<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>

<?php include('../constant/layout/sidebar_trainer.php');?> 
<link rel="stylesheet" href="popup_style.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');

?>
<?php
        $tomorrow = date("d-m-Y", strtotime('tomorrow'));
              $query  = "select * from users ORDER BY joining_date";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              $uid   = $row['userid'];
              $uname;
                      $udob;
                      $ujoing;
                      $ugender;
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $uid  = $row['userid'];
                      $query1  = "select * from enrolls_to WHERE uid='$uid'";
                      $result1 = mysqli_query($con, $query1);
                      
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            $pid=$row1['pid'];
                            $expire=$row1['expire'];
                            $pdate=$row1['paid_date'];
                            $query2="select * from plan where pid='$pid'";
                            $result2=mysqli_query($con,$query2);
                            
                            if($result2){
                              $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                              $planname=$row2['planName'];
                              $query3="select * from sessions where userid='$uid' and renewal='yes'";
                          $result3=mysqli_query($con,$query3);
                              if($result3){
                                $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                $pid1=$row3['pid'];
                                $expire1=$row3['expire'];
                                $sessions=$row3['sessionid'];
                                $pidss=$row3['pid'];
                                $amount=$row3['amount'];
                                $sessioncount=$row3['amount'];
                          $pdate1=$row3['paid_date'];
                          $query4="select * from plan where pid='$pid1'";
                          $result4=mysqli_query($con,$query4);
                          if($result4){
                            $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                            $planname1=$row4['planName'];
                            $sessionid=$row3['sessionid'];
                            $query5="select * from csessions where userid='$uid' and renewal='yes'";
                          $result5=mysqli_query($con,$query5);
                          if($result5){
                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                            $pid2=$row5['pid'];
                            $csessions=$row5['csessionsid'];
                            $amount1=$row5['amount'];
                            $expire2=$row5['expire'];
                            $pdate2=$row5['paid_date'];
                            $sessioncount1=$row5['amount'];
                            $query6="select * from plan where pid='$pid2'";
                            $result6=mysqli_query($con,$query6);
                            if($result6){
                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                              $planname2=$row6['planName'];
                              $sessionid1=$row6['sessionid'];
                              $query7="select * from checkin where userid='$uid' and  created_date LIKE '$cdate%'";
                              $result7=mysqli_query($con,$query7);
                              if($result7){
                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                $create_date=$row7 ['created_date'];
                                $create_time=$row7 ['created_time'];
                                $query8="select * from privateclasses where userid='$uid' and  date_from LIKE '$cdate%'";
                              $result8=mysqli_query($con,$query8);
                              if($result8){
                                $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                $privateclassname=$row8['className'];
                                $time_from=$row8['time_from'];
                                $time_to=$row8['time_to'];
                                $query9="select * from trainers";
                                $result9=mysqli_query($con,$query9);
                                if($result9){
                                  $row9=mysqli_fetch_array($result9,MYSQLI_ASSOC);
                                  $trainerid=$row9['trainerid'];
                                  $query10="select * from classes where trainerid='$trainerid'";
                                $result10=mysqli_query($con,$query10);
                                if($result10){
                                  $row10=mysqli_fetch_array($result10,MYSQLI_ASSOC);
                                  $classid=$row10['classid'];
                                  $classname=$row10['className'];
                                  $tfrom=$row10['time_from'];
                                  $tto=$row10['time_to'];
                                  $query11="select * from booking where userid='$uid' and trainerid='$trainerid' and date_from LIKE '$tomorrow%'";
                                $result11=mysqli_query($con,$query11);
                                if($result11){
                                  $row11=mysqli_fetch_array($result11,MYSQLI_ASSOC);
                                  $bookedclassname=$row11['className'];
                                  $tfrom1=$row11['time_from'];
                                  $tto1=$row11['time_to'];
                                  $query12="select * from classholder where userid='$uid' and trainerid='$trainerid' and classid='$classid' and created_date LIKE '%$cdate%'";
                                $result12=mysqli_query($con,$query12);
                                if($result12){
                                  $row12=mysqli_fetch_array($result12,MYSQLI_ASSOC);
                                  $classid1=$row12['classid'];
                                  $classname1=$row12['className'];
                                  $create_date1=$row12['created_date'];
                                  $query13="select * from classholder where userid='$uid' and trainerid='$trainerid' and classid='$classid' and created_date LIKE '$cdate%'";
                                $result13=mysqli_query($con,$query13);
                                if($result13){
                                  $row13=mysqli_fetch_array($result13,MYSQLI_ASSOC);
                                  $tfrom2=$row13['time_from'];
                                  $tto2=$row13['time_to'];
                                  $query14="select * from enrolls_to_day";
                                  $result14=mysqli_query($con,$query14);
                                      if($result14){
                                        $row14=mysqli_fetch_array($result14,MYSQLI_ASSOC);
                                        $pid5=$row14['pid'];
                                        $expire1=$row3['expire'];
                                        $sessions=$row3['sessionid'];
                                        $pidss=$row3['pid'];
                                        $amount=$row3['amount'];
                                        $sessioncount=$row3['amount'];
                                        $query15="select * from plan where pid='$pid5'";
                          $result15=mysqli_query($con,$query15);
                          if($result15){
                            $row15=mysqli_fetch_array($result15,MYSQLI_ASSOC);
                            
                            $query16="select * from csessions2";
                                $result16=mysqli_query($con,$query16);
                                if($result16){
                                  $row16=mysqli_fetch_array($result16,MYSQLI_ASSOC);
                                  $pid4=$row16['pid'];
                                  $query17="select * from plan where pid='$pid4'";
                                  $result17=mysqli_query($con,$query17);
                                      if($result17){
                                        $row17=mysqli_fetch_array($result17,MYSQLI_ASSOC);
                                        $pid4=$row14['pid'];
                                        $expire1=$row3['expire'];
                                        $sessions=$row3['sessionid'];
                                        $pidss=$row3['pid'];
                                        $amount=$row3['amount'];
                                        $sessioncount=$row3['amount'];
                                        

                               ?>
<?php
if(isset($_GET['classid'])){
$qry = $conn->query("SELECT * FROM classes where classid= ".$_GET['classid']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
$dow_arr = !empty($dow) ? explode(',',$dow) : '';
}
?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Appointment Class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Appointment Class</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_noprivateclass.php" id="submitProductForm" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class ID</label>
                                                <div class="col-sm-9">
                                                  <?php
              function getRandomWord($len = 10)
              {
                  $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="privateclassid" id="privateclassID" readonly value="<?php echo getRandomWord(); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">MEMBER</label>
                                                <div class="col-sm-9">
                                               <select name="userid" id="userid" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select MEMBER--</option>
                    <?php
                    date_default_timezone_set("Asia/Bangkok"); 
                    $day=date("Y-m-d");
                    $cdate=date("Y-m-d");
                    
            
                    $unixTimestamp = strtotime($cdate);
            
            //Get the day of the week using PHP's date function.
            $dayOfWeek = date("l", $unixTimestamp);
            
                        $query="select userid, username FROM users";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                                


                            }
                            
                        }
                    }
                }
            }
        }
    }
}
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
                            }
                        }
                    }
                }
            }
        

                    ?>
                    
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div>
                                            </div>
                                        </div>
                                    </div>
                                        

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">TRAINER</label>
                                                <div class="col-sm-9">
                                               <select name="trainerid" id="trainerid" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Trainer--</option>
                    <?php
                    date_default_timezone_set("Asia/Bangkok"); 
                    $day=date("Y-m-d");
                    $cdate=date("Y-m-d");
                    
            
                    $unixTimestamp = strtotime($cdate);
            
            //Get the day of the week using PHP's date function.
            $dayOfWeek = date("l", $unixTimestamp);
            
                        $query="select trainerid, username,availableday FROM trainers where availableday LIKE '%$dayOfWeek%'";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }

                    ?>
                    
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div>
                                            </div>
                                        </div>
                                    </div>

                                    

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="privateclassname" id="privateclassName" type="text" placeholder="Enter class name"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Class Type</b></h4></label>
                    <div class="col-sm-9">
                                <select name="privateclasstype" id="privateclasstype" required class="form-control">
                                    <option value="">--Select Trainer Type--</option>
                                    <option value="Strength Training">Strength Training</option>
                                    <option value="Combat Sports">Combat Sports</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Mind and Body">Mind and Body</option>
                                    
                                </select>
                            </div>
                            </div>
                            </div>
</div>
<div class="form-group">
                                            <div class="row">
                                                <div id="categorydetls">
                                            </div>
                                        </div>
                                    </div>

                                        
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS DESCRIPTION</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter machine description" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">STUDIO</label>
                                                <div class="col-sm-9">
                                               <select name="privatestudios" id="privatestudios" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Studio--</option>
                    <?php
                        $query="select * from studio where active='yes'";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }

                    ?>
                    
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div id="categorydetls">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Day</label>
                                                <div class="col-sm-9">
                                                 <input name="dow" id="dow" type="text" readonly value="<?php echo $dayOfWeek; ?>" placeholder=""class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group">
                        
						<label for="" class="control-label">DATE</label>
						<input type="date" name="date_from" id="date_from" class="form-control" readonly value="<?php echo date('Y-m-d') ?>">
					</div>

					

					<div class="form-group">
						<label for="" class="control-label">Time From</label>
						<input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
					</div>
                    
					<div class="form-group">
						<label for="" class="control-label">Time To</label>
						<input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
					</div>

                    
                    <input type="hidden" name="session" id="session" value='<?php echo $sessionid;?>'>
                    <input type="hidden" name="amount" id="amount" value='<?php echo $amount;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pidss;?>'>
                    

                                    
                                        <button type="submit" name="submit" id="crateProductBtn" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Add</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>

                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

                
                
               
                <!-- /# row -->

                <!-- End PAge Content -->

                
        <script>
            function mycategorydetail(str){
                 
                if(str==""){
                    document.getElementById("categorydetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("categorydetls").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","categorydetail.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>
        


        

<script>
  $("#userid").select2({
});
    </script>
    
  
    <script>
  $("#dow").select2({
});
    </script>
    <script>
  $("#privatestudios").select2({
});
    </script>
    <script>
  $("#trainerid").select2({
});
    </script>
    <script>
  $("#privateclasstype").select2({
});
    </script>
    
                <script src="../admin/custom/js/product.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php include('../constant/layout/footer.php');?>
  

