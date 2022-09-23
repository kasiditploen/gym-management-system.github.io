<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>



  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Group Classes (Membership)</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Group Classes (Membership)</li>
                    </ol>
                </div>
            </div>
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
            <div class="container-fluid">

            <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Class Date: <?php echo ("[".$dayOfWeek."]");?></h2></a>
                            <button type="button" class="btn btn-dark btn-rounded" value="Sunday">Sunday</button>
                            <button type="button" class="btn btn-warning btn-rounded" value="Monday">Monday</button>
                            <button type="button" class="btn btn-danger btn-rounded" value="Tuesday">Tuesday</button>
                            <button type="button" class="btn btn-success btn-rounded" value="Wednesday">Wednesday</button>
                            <button type="button" class="btn btn-light btn-rounded" value="Thursday">Thursday</button>
                            <button type="button" class="btn btn-info btn-rounded" value="Friday">Friday</button>
                            <button type="button" class="btn btn-secondary btn-rounded" value="Saturday">Saturday</button>
                            

                            
                      
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable2" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Attendance</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              <!-- WHERE dow LIKE '%Monday%' "use to spcify Monday" -->
               <!-- and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
        
        

              $query  = "select * from classes where dow ='".$dayOfWeek."'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="select COUNT(*) from attendance where present LIKE '%present%' ";
                            $result4=mysqli_query($con,$query4);
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      $row4['COUNT(*)'];
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row4['COUNT(*)'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                 <a href="check_attendance.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-success" ><i class="fa fa-external-link-square" aria-hidden="true"></i></button></a>
                 
                  </td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
                      }
                    }
                  }
                }
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Cardio</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            <button type="submit" id="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              <!--  and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Cardio' and session='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
                      }
                    }
                  }
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">HIIT</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            <button type="submit" id="submit1" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='HIIT' and session='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
                      }
                    }
                  }
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Dance</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            <button type="submit" id="submit2" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-all-checkbox1" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Dance' and session='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
                      }
                    }
                  }
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Mind and Body</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            <button type="submit" id="submit3" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-bordered2" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Mind and Body' and session='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
                      }
                    }
                  }
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Cycling</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            <button type="submit" id="submit4" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-bordered3" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Cycling' and session='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
                      }
                    }
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
$('#submit1').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit1').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit1').attr('disabled',true);}
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

<script>
$('#submit4').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit4').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit4').attr('disabled',true);}
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

<script>
    
    $(document).ready(function () {
  $('#dt-all-checkbox1').dataTable({

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
  $('#myTable2').dataTable({

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
  $('#dt-bordered2').dataTable({

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

<script>
    
    $(document).ready(function () {
  $('#dt-bordered3').dataTable({

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




    
           

<?php include('../constant/layout/footer.php');?>


