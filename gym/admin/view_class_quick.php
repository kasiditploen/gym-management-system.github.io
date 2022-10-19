<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>

<?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date('Y-m-d');
        $y1date=date('Y-m-d',strtotime('- 1 days'));
        $y2date=date('Y-m-d',strtotime('- 2 days'));
        $y3date=date('Y-m-d',strtotime('- 3 days'));
        $y4date=date('Y-m-d',strtotime('- 4 days'));
        $y5date=date('Y-m-d',strtotime('- 5 days'));
        $y6date=date('Y-m-d',strtotime('- 6 days'));
        $y7date=date('Y-m-d',strtotime('- 7 days'));


        $unixTimestamp = strtotime($cdate);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);
?>

<?php
      $id     = $_GET['id'];;
      $cs    = $_GET['cs'];;
      (int)$am    = $_GET['am'];;
      $pid2    = $_GET['pi'];;
      $query  = "select * from users WHERE userid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);
      if($am > 0){

      

        if (mysqli_affected_rows($con) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $image = $row['image'];
              $name = $row['username'];
                $memid=$row['userid'];
                $gender=$row['gender'];
                $mobile=$row['mobile'];
                $email=$row['email'];
                $joinon=$row['joining_date'];
                echo $name;
            }
        }
      } else {
          echo "<head><script>alert('Not Enough Session Point to take a group class. ');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
      }
      ?>

  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Current Group Classes (Sessions)</h3> </div>
                    
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Current Group Classes (Sessions)</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card">
                  
                            <div class="card-body">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button>
                            <br></br>
                            <h2 class="color-black">Cardio </h2></a>
                            <a href="new_class.php"><button class="btn btn-light">Add Class</button></a>
                            <div class="form-group">
                            <br><label for="" class="control-label">Current Class Sessions</label>
            
						<input type="number" name="amount" id="amount" readonly class="form-control" value='<?php echo $am;?>'>
					</div></br>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
                                        $id     = $_GET['id'];;
                                        $cs    = $_GET['cs'];;
                                        $am    = $_GET['am'];;
                                        $pid2    = $_GET['pi'];;
          $query  = "select * from trainers";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$thistrainer = $row['trainerid'];
              }
            }
                ?>
        <tr>
        
        <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              <!--  and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Cardio' and session='yes' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];
                  $classcap = $row['classcap'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              /////////////////////////////////////////////////////////////////////////////////////////////////
              $query6="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$uid' and userid ='$userid'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no' and classid = '$uid'";
                            $result8=mysqli_query($con,$query8);
              
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    $trainername;
                                    $studioname;
                                    if($result4){
                                        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                        $userid   = $row4['userid'];
                                        $username   = $row4['username'];
                                        if($result5){
                                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                            $session   = $row5['session'];
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              $count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                $bookingid = $row7['bookingid'];
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
                                        ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       

                    <input type="hidden" name="csession" id="csession" value='<?php echo $cs;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pid2;?>'>
                  
                    
                  
                 <td>
                 <?php 
                  if($count >= $classcap) {
                    echo '<p><a class="btn btn-sm btn-danger">FULL</a></p>';
                    
                  } else {
                    echo '<p><a href="submit_new_classholder.php?id='.$id.'&ci='.$row['classid'].'&tid='.$row['trainerid'].'&cs='.$cs.'&am='.$am.'&pid='.$pid2.'&tf='.$row['time_from'].'&tt='.$row['time_to'].'" class="btn btn-sm btn-success">Enroll</a></p>';
                  }
                  
                 ?>
                  </td></tr>
                  
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
                            <a href="new_class.php"><button class="btn btn-light">Add Class</button></a>
                            
                         
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
        <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='HIIT' and session='yes' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];
                  $classcap = $row['classcap'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              /////////////////////////////////////////////////////////////////////////////////////////////////
              $query6="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$uid' and userid ='$userid'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no' and classid = '$uid'";
                            $result8=mysqli_query($con,$query8);
              
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    $trainername;
                                    $studioname;
                                    if($result4){
                                        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                        $userid   = $row4['userid'];
                                        $username   = $row4['username'];
                                        if($result5){
                                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                            $session   = $row5['session'];
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              $count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                $bookingid = $row7['bookingid'];
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
                                        ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       

                    <input type="hidden" name="csession" id="csession" value='<?php echo $cs;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pid2;?>'>
                  
                    
                  
                 <td>
                 <?php 
                  if($count >= $classcap) {
                    echo '<p><a class="btn btn-sm btn-danger">FULL</a></p>';
                    
                  } else {
                    echo '<p><a href="submit_new_classholder.php?id='.$id.'&ci='.$row['classid'].'&tid='.$row['trainerid'].'&cs='.$cs.'&am='.$am.'&pid='.$pid2.'&tf='.$row['time_from'].'&tt='.$row['time_to'].'" class="btn btn-sm btn-success">Enroll</a></p>';
                  }
                  
                 ?>
                  </td></tr>
                  
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
                            <a href="new_class.php"><button class="btn btn-light">Add Class</button></a>
                            
                         
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
        <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Dance' and session='yes' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];
                  $classcap = $row['classcap'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              /////////////////////////////////////////////////////////////////////////////////////////////////
              $query6="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$uid' and userid ='$userid'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no' and classid = '$uid'";
                            $result8=mysqli_query($con,$query8);
              
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    $trainername;
                                    $studioname;
                                    if($result4){
                                        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                        $userid   = $row4['userid'];
                                        $username   = $row4['username'];
                                        if($result5){
                                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                            $session   = $row5['session'];
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              $count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                $bookingid = $row7['bookingid'];
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
                                        ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       

                    <input type="hidden" name="csession" id="csession" value='<?php echo $cs;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pid2;?>'>
                  
                    
                  
                 <td>
                 <?php 
                  if($count >= $classcap) {
                    echo '<p><a class="btn btn-sm btn-danger">FULL</a></p>';
                    
                  } else {
                    echo '<p><a href="submit_new_classholder.php?id='.$id.'&ci='.$row['classid'].'&tid='.$row['trainerid'].'&cs='.$cs.'&am='.$am.'&pid='.$pid2.'&tf='.$row['time_from'].'&tt='.$row['time_to'].'" class="btn btn-sm btn-success">Enroll</a></p>';
                  }
                  
                 ?>
                  </td></tr>
                  
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
                            <a href="new_class.php"><button class="btn btn-light">Add Class</button></a>
                            
                         
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
        <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Mind and Body' and session='yes' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];
                  $classcap = $row['classcap'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              /////////////////////////////////////////////////////////////////////////////////////////////////
              $query6="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$uid' and userid ='$userid'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no' and classid = '$uid'";
                            $result8=mysqli_query($con,$query8);
              
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    $trainername;
                                    $studioname;
                                    if($result4){
                                        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                        $userid   = $row4['userid'];
                                        $username   = $row4['username'];
                                        if($result5){
                                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                            $session   = $row5['session'];
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              $count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                $bookingid = $row7['bookingid'];
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
                                        ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       

                    <input type="hidden" name="csession" id="csession" value='<?php echo $cs;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pid2;?>'>
                  
                    
                  
                 <td>
                 <?php 
                  if($count >= $classcap) {
                    echo '<p><a class="btn btn-sm btn-danger">FULL</a></p>';
                    
                  } else {
                    echo '<p><a href="submit_new_classholder.php?id='.$id.'&ci='.$row['classid'].'&tid='.$row['trainerid'].'&cs='.$cs.'&am='.$am.'&pid='.$pid2.'&tf='.$row['time_from'].'&tt='.$row['time_to'].'" class="btn btn-sm btn-success">Enroll</a></p>';
                  }
                  
                 ?>
                  </td></tr>
                  
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
                            <a href="new_class.php"><button class="btn btn-light">Add Class</button></a>
                            
                         
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
        <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Cycling' and session='yes' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];
                  $classcap = $row['classcap'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              /////////////////////////////////////////////////////////////////////////////////////////////////
              $query6="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$uid' and userid ='$userid'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no' and classid = '$uid'";
                            $result8=mysqli_query($con,$query8);
              
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    $trainername;
                                    $studioname;
                                    if($result4){
                                        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                        $userid   = $row4['userid'];
                                        $username   = $row4['username'];
                                        if($result5){
                                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                            $session   = $row5['session'];
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              $count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                $bookingid = $row7['bookingid'];
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
                                        ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       

                    <input type="hidden" name="csession" id="csession" value='<?php echo $cs;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pid2;?>'>
                  
                    
                  
                 <td>
                 <?php 
                  if($count >= $classcap) {
                    echo '<p><a class="btn btn-sm btn-danger">FULL</a></p>';
                    
                  } else {
                    echo '<p><a href="submit_new_classholder.php?id='.$id.'&ci='.$row['classid'].'&tid='.$row['trainerid'].'&cs='.$cs.'&am='.$am.'&pid='.$pid2.'&tf='.$row['time_from'].'&tt='.$row['time_to'].'" class="btn btn-sm btn-success">Enroll</a></p>';
                  }
                  
                 ?>
                  </td></tr>
                  
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


