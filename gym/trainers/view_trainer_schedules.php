<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 <?php
      
      $query  = "select * from classes";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $classid = $row['classid'];
           
          }
      }
      ?>

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Trainer Schedules</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Trainer Schedules</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            
            <div class="container-fluid print-container">
            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black3.jpg');
    height: 300px; width: auto;
  ">
  <h1 class="color-white mb-3 h2"><b>Trainer Schedules</b></h1> 

                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                
                                    
                                </div>
                            </div>
                        </div>
                <!-- /# row -->
             
                 <div class="card">
                 <?php
      $id     = $_GET['id'];;
      $query  = "select * from trainers WHERE trainerid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $image = $row['image'];
            $trainername = $row['username'];
              $memid=$row['userid'];
              $gender=$row['gender'];
              $mobile=$row['mobile'];
              $email=$row['email'];
              $joinon=$row['joining_date'];
              echo $name;
          }
      }
      ?>
                 <h1 class="color-black mb-3 h2"><b><?php echo $trainername ?> (Group Classes)</b></h1>


                            <div class="card-body">
                 <button class="btn btn-danger col-sm-2 sm-0" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                            
                            
                            <div class="col-md-16">
                            
                    </div>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
//Terminology
$weekNo = date('W');
$nextSunday = strtotime('next sunday');
$nextMonday = strtotime('next monday');
$nextTuesday = strtotime('next tuesday');
$nextWednesday = strtotime('next wednesday');
$nextThursday = strtotime('next thursday');
$nextFriday = strtotime('next friday');
$nextSaturday = strtotime('next saturday');
$weekNoNextSunday = date('W', $nextSunday);
$weekNoNextMonday = date('W', $nextMonday);
$weekNoNextTuesday = date('W', $nextTuesday);
$weekNoNextWednesday = date('W', $nextWednesday);
$weekNoNextThursday = date('W', $nextThursday);
$weekNoNextFriday = date('W', $nextFriday);
$weekNoNextSaturday = date('W', $nextSaturday);


date_default_timezone_set("Asia/Bangkok"); 
$cdate=date("Y-m-d");
              
if($mondate||$tuesdate||$wednesdate||$thursdate||$fridate||$saturdate|$sundate > $cdate){
                $weekNo = date('W');
                $nextSunday = strtotime('next sunday');
                $nextMonday = strtotime('next monday');
                $nextTuesday = strtotime('next tuesday');
                $nextWednesday = strtotime('next wednesday');
                $nextThursday = strtotime('next thursday');
                $nextFriday = strtotime('next friday');
                $nextSaturday = strtotime('next saturday');
                $weekNoNextSunday = date('W', $nextSunday);
                $weekNoNextMonday = date('W', $nextMonday);
                $weekNoNextTuesday = date('W', $nextTuesday);
                $weekNoNextWednesday = date('W', $nextWednesday);
                $weekNoNextThursday = date('W', $nextThursday);
                $weekNoNextFriday = date('W', $nextFriday);
                $weekNoNextSaturday = date('W', $nextSaturday);
        
                if (strpos($i,'Sunday') !== false && $weekNoNextSunday != $weekNo) {
                  $thisSunday = strtotime('this sunday');
                  $sundayna = date("Y-m-d", $thisSunday);
                  $query3="update trainertt set sun_date='".$sundayna."'where trainerid='".$uid."'";
                  $result3=mysqli_query($con,$query3);
                  
                } else if
                 (strpos($i,'Sunday') !== false && $weekNoNextSunday == $weekNo){
                  
                  $nextsundayna = date("Y-m-d", $nextSunday);
                  $query4="update trainertt set sun_date='".$nextsundayna."'where trainerid='".$uid."'";
                  $result4=mysqli_query($con,$query4);
                  
        
                }
        
                if (strpos($i,'Monday') !== false && $weekNoNextMonday != $weekNo) {
                  $thisMonday = strtotime('this monday');
                  $mondayna = date("Y-m-d", $thisMonday);
                  $query5="update trainertt set mon_date='".$mondayna."'where trainerid='".$uid."'";
                  $result5=mysqli_query($con,$query5);
                  
                } else if (strpos($i,'Monday') !== false && $weekNoNextMonday == $weekNo){
                  $nextmondayna = date("Y-m-d", $nextMonday);
                  $query6="update trainertt set mon_date='".$nextmondayna."'where trainerid='".$uid."'";
                  $result6=mysqli_query($con,$query6);
                  
                
                } if (strpos($i,'Tuesday') !== false && $weekNoNextTuesday != $weekNo) {
                  $thisTuesday = strtotime('this tuesday');
                  $tuesdayna = date("Y-m-d", $thisTuesday);
                  $query7="update trainertt set tues_date='".$tuesdayna."'where trainerid='".$uid."'";
                  $result7=mysqli_query($con,$query7);
                 
                } else if (strpos($i,'Tuesday') !== false && $weekNoNextTuesday == $weekNo){
                  $nexttuesdayna = date("Y-m-d", $nextTuesday);
                  $query8="update trainertt set tues_date='".$nexttuesdayna."'where trainerid='".$uid."'";
                  $result8=mysqli_query($con,$query8);
                  
                
                }if (strpos($i,'Wednesday') !== false && $weekNoNextWednesday != $weekNo) {
                  $thisWednesday = strtotime('this wednesday');
                  $wednesdayna = date("Y-m-d", $thisWednesday);
                  $query9="update trainertt set wednes_date='".$wednesdayna."'where trainerid='".$uid."'";
                  $result9=mysqli_query($con,$query9);
                  
                } else if (strpos($i,'Wednesday') !== false && $weekNoNextWednesday == $weekNo) { 
                  $nextwednesdayna = date("Y-m-d", $nextWednesday);
                  $query10="update trainertt set wednes_date='".$nextwednesdayna."'where trainerid='".$uid."'";
                  $result10=mysqli_query($con,$query10);
                  
                
                } if (strpos($i,'Thursday') !== false && $weekNoNextThursday != $weekNo) {
                  $thisThursday = strtotime('this thursday');
                  $thursdayna = date("Y-m-d", $thisThursday);
                  $query11="update trainertt set thurs_date='".$thursdayna."'where trainerid='".$uid."'";
                  $result11=mysqli_query($con,$query11);
                  
                } else if (strpos($i,'Thursday') !== false && $weekNoNextThursday == $weekNo) {
                  $nextthursdayna = date("Y-m-d", $nextThursday);
                  $query12="update trainertt set thurs_date='".$nextthursdayna."'where trainerid='".$uid."'";
                  $result12=mysqli_query($con,$query12);
                  
                
                }  if (strpos($i,'Friday') !== false && $weekNoNextFriday != $weekNo) {
                  $thisFriday = strtotime('this friday');
                  $fridayna = date("Y-m-d", $thisFriday);
                  $query13="update trainertt set fri_date='".$fridayna."'where trainerid='".$uid."'";
                  $result13=mysqli_query($con,$query13);
                  
                } else if (strpos($i,'Friday') !== false && $weekNoNextFriday == $weekNo) {
                  $nextfridayna = date("Y-m-d", $nextFriday);
                  $query14="update trainertt set fri_date='".$nextfridayna."'where trainerid='".$uid."'";
                  $result14=mysqli_query($con,$query14);
                  
                
                } if (strpos($i,'Saturday') !== false && $weekNoNextSaturday != $weekNo) {
                  $thisSaturday = strtotime('this saturday');
                  $saturdayna = date("Y-m-d", $thisSaturday);
                  $query13="update trainertt set satur_date='".$saturdayna."'where trainerid='".$uid."'";
                  $result13=mysqli_query($con,$query13);
                  
                } else if (strpos($i,'Saturday') !== false && $weekNoNextSaturday == $weekNo) {
                  $nextsaturdaydayna = date("Y-m-d", $nextSaturday);
                  $query14="update trainertt set satur_date='".$nextsaturdaydayna."'where trainerid='".$uid."'";
                  $result14=mysqli_query($con,$query14);
                  
                }
                
                
             
                
        
        
            }
                      else{
                          "nothing";
                      }

                      
                  
                

//dayna
$sundayna = date("Y-m-d", $thisSunday);
$nextsundayna = date("Y-m-d", $nextSunday);
$mondayna = date("Y-m-d", $thisMonday);
$nextmondayna = date("Y-m-d", $nextMonday);
$tuesdayna = date("Y-m-d", $thisTuesday);
$nexttuesdayna = date("Y-m-d", $nextTuesday);



        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date("Y-m-d");
        $ldate=date("Y-m-d",$dayonly);

        $unixTimestamp = strtotime($cdate);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l d M", $unixTimestamp);
$dayonly = date("l", $unixTimestamp);
?>


                                
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
        <th>Sl.No</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Monday </th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
          <th>Sunday </th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          
          
        </tr>
      </thead>    
        <tbody>
        <?php
          $id     = $_GET['id'];;
              $query  = "select * from trainertt where trainerid='$id'ORDER BY time_from ASC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      
                      $cid   = $row['classid'];
                      $mondate= $row['mon_date'];
                      $tuesdate= $row['tues_date'];
                      $wednesdate= $row['wednes_date'];
                      $thursdate= $row['thurs_date'];
                      $fridate= $row['fri_date'];
                      $saturdate= $row['satur_date'];
                      $sundate= $row['sun_date'];
                      
                      $query1  = "select distinct * from trainers WHERE trainerid='$id'";
                      $result1 = mysqli_query($con, $query1);
                      $traineryou = $row['trainerid'];
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            $trainername=$row1['username'];
                            $query2  = "select * from classes WHERE trainerid='$traineryou'";
                      $result2 = mysqli_query($con, $query2);
                            
                            if($result2){
                              while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                $i=$row2['dow'];
                  
                ?>  
          
          <?php
          $id     = $_GET['id'];;
              $query  = "select distinct * from trainertt where trainerid='$id' or classid='$classid' ORDER BY time_from ASC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      
                      $cid   = $row['classid'];
                      $mondate= $row['mon_date'];
                      $tuesdate= $row['tues_date'];
                      $wednesdate= $row['wednes_date'];
                      $thursdate= $row['thurs_date'];
                      $fridate= $row['fri_date'];
                      $saturdate= $row['satur_date'];
                      $sundate= $row['sun_date'];
                      
                      $query1  = "select distinct * from trainers WHERE trainerid='$id'";
                      $result1 = mysqli_query($con, $query1);
                      $traineryou = $row['trainerid'];
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            $trainername=$row1['username'];
                            $query2  = "select distinct * from classes WHERE classid='$cid' and trainerid='$traineryou'";
                      $result2 = mysqli_query($con, $query2);
                            
                            if($result2){
                              while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                $i=$row2['dow'];
                  
                ?>  

                
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" name="trainer_delete_id[]" value="<?= $row['trainerid']; ?>">
                                                        <td><?php echo $sno; ?></td>
                    
                     
                     <td><h4><?php echo $row1['fname']; ?></h4></td>
                     <td><h4><?php echo $row1['lname']; ?></h4></td>
                     
                     
                       <td><h3><?php
                       if(empty($row['mon_date'])){
                        "nothing";
                       }else {
                        echo $row2['className']; ?>  <br><?php echo $row['mon_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to'];
                       } ?></h3> </td>
                       <td><h3><?php
                       if(empty($row['tues_date'])){
                        "nothing";
                       }else{
                         echo $row2['className']; ?>  <br><?php echo $row['tues_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to']; 
                       } ?></h3> </td>
                       <td><h3><?php
                       if(empty($row['wednes_date'])){
                        "nothing";
                       }else{
                         echo $row2['className']; ?>  <br><?php echo $row['wednes_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to']; 
                       } ?></h3> </td>
                       <td><h3><?php
                       if(empty($row['thurs_date'])){
                        "nothing";
                       }else{
                         echo $row2['className']; ?>  <br><?php echo $row['thurs_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to']; 
                       } ?></h3> </td>
                       <td><h3><?php
                       if(empty($row['fri_date'])){
                        "nothing";
                       }else{
                         echo $row2['className']; ?>  <br><?php echo $row['fri_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to']; 
                       } ?></h3> </td>
                       <td><h3><?php
                       if(empty($row['satur_date'])){
                        "nothing";
                       }else{
                         echo $row2['className']; ?>  <br><?php echo $row['satur_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to']; 
                       } ?></h3> </td>
                       <td><h3><?php
                       if(empty($row['sun_date'])){
                        "nothing";
                       }else{
                         echo $row2['className']; ?>  <br><?php echo $row['sun_date']; ?></br>  <?php echo $row2['time_from']; ?> to <?php echo $row2['time_to']; 
                       } ?></h3> </td>  
                       <td><?php echo $row2['time_from']; ?></td>
                       <td><?php echo $row2['time_to']; ?></td>
                       
                  
                  
                 
                  
              <?php 
              $sno++; 
              $msgid = 0;
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

<?php
date_default_timezone_set("Asia/Bangkok"); 
$cdate=date("Y-m-d");
              
if($mondate||$tuesdate||$wednesdate||$thursdate||$fridate||$saturdate|$sundate > $cdate){
                $weekNo = date('W');
                $nextSunday = strtotime('next sunday');
                $nextMonday = strtotime('next monday');
                $nextTuesday = strtotime('next tuesday');
                $nextWednesday = strtotime('next wednesday');
                $nextThursday = strtotime('next thursday');
                $nextFriday = strtotime('next friday');
                $nextSaturday = strtotime('next saturday');
                $weekNoNextSunday = date('W', $nextSunday);
                $weekNoNextMonday = date('W', $nextMonday);
                $weekNoNextTuesday = date('W', $nextTuesday);
                $weekNoNextWednesday = date('W', $nextWednesday);
                $weekNoNextThursday = date('W', $nextThursday);
                $weekNoNextFriday = date('W', $nextFriday);
                $weekNoNextSaturday = date('W', $nextSaturday);
        
                if (strpos($i,'Sunday') !== false && $weekNoNextSunday != $weekNo) {
                  $thisSunday = strtotime('this sunday');
                  $sundayna = date("Y-m-d", $thisSunday);
                  $query3="update trainertt set sun_date='".$sundayna."'where trainerid='".$uid."'";
                  $result3=mysqli_query($con,$query3);
                  
                } else if
                 (strpos($i,'Sunday') !== false && $weekNoNextSunday == $weekNo){
                  
                  $nextsundayna = date("Y-m-d", $nextSunday);
                  $query4="update trainertt set sun_date='".$nextsundayna."'where trainerid='".$uid."'";
                  $result4=mysqli_query($con,$query4);
                  
        
                }
        
                if (strpos($i,'Monday') !== false && $weekNoNextMonday != $weekNo) {
                  $thisMonday = strtotime('this monday');
                  $mondayna = date("Y-m-d", $thisMonday);
                  $query5="update trainertt set mon_date='".$mondayna."'where trainerid='".$uid."'";
                  $result5=mysqli_query($con,$query5);
                  
                } else if (strpos($i,'Monday') !== false && $weekNoNextMonday == $weekNo){
                  $nextmondayna = date("Y-m-d", $nextMonday);
                  $query6="update trainertt set mon_date='".$nextmondayna."'where trainerid='".$uid."'";
                  $result6=mysqli_query($con,$query6);
                  
                
                } if (strpos($i,'Tuesday') !== false && $weekNoNextTuesday != $weekNo) {
                  $thisTuesday = strtotime('this tuesday');
                  $tuesdayna = date("Y-m-d", $thisTuesday);
                  $query7="update trainertt set tues_date='".$tuesdayna."'where trainerid='".$uid."'";
                  $result7=mysqli_query($con,$query7);
                 
                } else if (strpos($i,'Tuesday') !== false && $weekNoNextTuesday == $weekNo){
                  $nexttuesdayna = date("Y-m-d", $nextTuesday);
                  $query8="update trainertt set tues_date='".$nexttuesdayna."'where trainerid='".$uid."'";
                  $result8=mysqli_query($con,$query8);
                  
                
                }if (strpos($i,'Wednesday') !== false && $weekNoNextWednesday != $weekNo) {
                  $thisWednesday = strtotime('this wednesday');
                  $wednesdayna = date("Y-m-d", $thisWednesday);
                  $query9="update trainertt set wednes_date='".$wednesdayna."'where trainerid='".$uid."'";
                  $result9=mysqli_query($con,$query9);
                  
                } else if (strpos($i,'Wednesday') !== false && $weekNoNextWednesday == $weekNo) { 
                  $nextwednesdayna = date("Y-m-d", $nextWednesday);
                  $query10="update trainertt set wednes_date='".$nextwednesdayna."'where trainerid='".$uid."'";
                  $result10=mysqli_query($con,$query10);
                  
                
                } if (strpos($i,'Thursday') !== false && $weekNoNextThursday != $weekNo) {
                  $thisThursday = strtotime('this thursday');
                  $thursdayna = date("Y-m-d", $thisThursday);
                  $query11="update trainertt set thurs_date='".$thursdayna."'where trainerid='".$uid."'";
                  $result11=mysqli_query($con,$query11);
                  
                } else if (strpos($i,'Thursday') !== false && $weekNoNextThursday == $weekNo) {
                  $nextthursdayna = date("Y-m-d", $nextThursday);
                  $query12="update trainertt set thurs_date='".$nextthursdayna."'where trainerid='".$uid."'";
                  $result12=mysqli_query($con,$query12);
                  
                
                }  if (strpos($i,'Friday') !== false && $weekNoNextFriday != $weekNo) {
                  $thisFriday = strtotime('this friday');
                  $fridayna = date("Y-m-d", $thisFriday);
                  $query13="update trainertt set fri_date='".$fridayna."'where trainerid='".$uid."'";
                  $result13=mysqli_query($con,$query13);
                  
                } else if (strpos($i,'Friday') !== false && $weekNoNextFriday == $weekNo) {
                  $nextfridayna = date("Y-m-d", $nextFriday);
                  $query14="update trainertt set fri_date='".$nextfridayna."'where trainerid='".$uid."'";
                  $result14=mysqli_query($con,$query14);
                  
                
                } if (strpos($i,'Saturday') !== false && $weekNoNextSaturday != $weekNo) {
                  $thisSaturday = strtotime('this saturday');
                  $saturdayna = date("Y-m-d", $thisSaturday);
                  $query13="update trainertt set satur_date='".$saturdayna."'where trainerid='".$uid."'";
                  $result13=mysqli_query($con,$query13);
                  
                } else if (strpos($i,'Saturday') !== false && $weekNoNextSaturday == $weekNo) {
                  $nextsaturdaydayna = date("Y-m-d", $nextSaturday);
                  $query14="update trainertt set satur_date='".$nextsaturdaydayna."'where trainerid='".$uid."'";
                  $result14=mysqli_query($con,$query14);
                  
                }
                
                
             
                
        
        
            }
                      else{
                          "nothing";
                      }

                      
                  
                ?>  

        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>

                        

                       

                        

                        <script>
$('#submit').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit').attr('disabled',true);}
 }
});
</script>

<script>
$('#submit2').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit2').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit2').attr('disabled',true);}
 }
});
</script>

<script>
$('#submit3').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit3').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit3').attr('disabled',true);}
 }
});
</script>
                <!-- /# row -->

                <!-- End PAge Content -->

                <script>
$(document).ready(function(){
    $("#form1 #select-all").click(function(){
        $("#form1 input[type='checkbox']").prop('checked',this.checked);
    });
});
    
</script>

<script>
$(document).ready(function(){
    $("#form2 #select-all2").click(function(){
        $("#form2 input[type='checkbox']").prop('checked',this.checked);
    });
});
    
</script>

<script>
$(document).ready(function(){
    $("#form3 #select-all3").click(function(){
        $("#form3 input[type='checkbox']").prop('checked',this.checked);
    });
});
    
</script>

<script>
    
    $(document).ready(function () {
  $('#dt-all-checkbox').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox select-checkbox-all',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>

<script>
    
    $(document).ready(function () {
  $('#dt-bordered').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>
     
<div class="tab-content ">
        <div class="tab-pane fade in show active" id="docsTabsOverview" role="tabpanel">
          <div class="row">
            
            <div class=" col-lg-10  col-md-12">
              <section class="documentation">
                
<style>
  .trigger {
    padding: 1px 10px;
    font-size: 12px;
    font-weight: 400;
    border-radius: 10px;
    background-color: #eee;
    color: #212121;
    display: inline-block;
    margin: 2px 5px;
  }

  .hoverable,
  .trigger {
    transition: box-shadow 0.55s;
    box-shadow: 0;
  }

  .hoverable:hover,
  .trigger:hover {
    transition: box-shadow 0.45s;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .chip.chip-md {
    height: 42px;
    line-height: 42px;
    border-radius: 21px;
  }

  .chip.chip-md img {
    height: 42px;
    width: 42px;
  }

  .chip.chip-md .close {
    height: 42px;
    line-height: 42px;
    border-radius: 21px;
  }

  .chip.chip-lg {
    height: 52px;
    line-height: 52px;
    border-radius: 26px;
  }

  .chip.chip-lg .close {
    height: 52px;
    line-height: 52px;
    border-radius: 26px;
  }

  .chip.chip-lg img {
    height: 52px;
    width: 52px;
  }

  .table a {
    margin-right: auto !important;
  }

  .chips-autocomplete .chips {
    padding-bottom: unset
  }

  .chips-autocomplete .chip-span {
    position: relative;
    left: -15px;
  }

  .chips-autocomplete .chip-ul {
    position: absolute;
    z-index: 100;
    right: 0;
    width: 140px;
    background: #fff;
    list-style-type: none;
    overflow-y: auto;
    max-height: 210px;
    padding-left: 0;
  }

  .chips-autocomplete .chip-ul li {
    padding: 12px 15px;
    cursor: pointer;
    font-size: .875rem;
  }

  .chips-autocomplete .chip-ul li:hover {
    background: #eee;
  }
</style>
<script>
$('.toast').toast('show');
</script>

<style>


@media print {
  body * {
    visibility: hidden;
  }

  .print-container, .print-container * {
    visibility: visible;
  }

  .print-container {
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
  }
  
}
</style>
<?php include('../constant/layout/footer.php');?>


