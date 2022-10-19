<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>

<?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date('Y-m-d');
        $chour=date('H:i');
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
              $query  = "select * from users";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $userid  = $row['userid'];
                      $query7  = "select * from users WHERE userid='$userid'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                            $useridx  = $row1['userid'];
                            
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                              }
                            }
                          }
                        }
                      
                ?> 
                <?php
              $query  = "select * from trainers";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $trainerid   = $row['trainerid'];
                      $dow = $row['availableday'];
                      $query7  = "select * from enrolls2_to WHERE uid='$trainerid' AND renewal='yes'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                            $query8="select * from checkint where trainerid='$trainerid' and  created_date LIKE '$cdate%' ORDER BY created_time DESC";
                              $result8=mysqli_query($con,$query8);
                              if($result8){
                                $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                $create_date=$row8 ['created_date'];
                                $create_time=$row8 ['created_time'];
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                              }
                            }
                          }
                        }
                      }
                ?>  

  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black14.jpg');
    height: 150px; width: auto;
  ">
  <h1 class="color-white mb-3 h1"><span class="badge badge-pill badge-dark"><b>Booking List</b></span></h1>
</div>
                <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">All Booking (Approval Request To Join Class)</h2></a>
                            
                            
                         
                                <div class="table-responsive m-t-40">
                               
                                    <table id="dt-all-checkboxfirst" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
              $query  = "select * from booking where approved='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $bookingid = $row['bookingid'];
                  
                  
                            }
                          }
                                    
                                ?>
        <tr>
        
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Appointer</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Appointment Date</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              <!--  and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking where approved='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $bookingid = $row['bookingid'];
                  $uid   = $row['classid'];
                  $classid   = $row['classid'];
                  $trainerid   = $row['trainerid'];
                  $userid   = $row['userid'];
                  $tf   = $row['time_from'];
                  $tt   = $row['time_to'];
                  $df   = $row['date_from'];
                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers WHERE trainerid='$trainerid'";
                            $result3=mysqli_query($con,$query3);
                            $query4="select userid,username from users WHERE userid='$userid'";
                            $result4=mysqli_query($con,$query4);
                            
                       
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                      <td><?php echo $row['classid'] ?></td>
                      <td><?php echo $row4['username'] ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                 <?php if($df >= $cdate and $tf <= $chour and $tt <= $chour) {
                  echo
                 '<form id="form3" action="submit_accept_book.php?id=<?php echo $bookingid;?>" method="post"><input type="hidden" name="bookingid" value='.$bookingid.'/>
                 <input type="hidden" name="bookingid" value='.$bookingid.'/>
                 <input type="hidden" name="classid" value='. $classid.'/>
                              <input type="hidden" name="className" value='.$name.'/>
                              <input type="hidden" name="description" value='.$desc.'/>
                              <input type="hidden" name="studios" value='.$studioid.'/>
                              <input type="hidden" name="classtype" value='.$type.'/>
                              <input type="hidden" name="dow" value='.$dow.'/>
                              <input type="hidden" name="date_from" value='.$df.'/>
                              <input type="hidden" name="date_to" value='.$dt.'/>
                              <input type="hidden" name="time_from" value='.$tf.'/>
                              <input type="hidden" name="time_to" value='.$tt.'/>
                              <input type="hidden" name="trainerid" value='.$trainerid.'/>
                              <input type="hidden" name="trainerName" value='.$trainername.'/>
                              <input type="hidden" name="userid" value='.$userid.'/>
                              <input type="hidden" name="username" value='.$username.'/>
                              <input type="hidden" name="session" value='.$session.'/>
                              <input type="submit" id="button1" value="Approve" class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>';
                 } else {

                 }
                              
                              ?>
                              
                  <a href="del_book.php?id=<?php echo $row['bookingid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to deny this appointment?')"><i class="fas fa-times"></i></button></a></td></tr>
                  
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


                
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Cardio</h2></a>
                           
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select bookingid from booking";
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
         <th>Booking ID</th>
         <th>Booked By</th>
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
          
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking WHERE classtype='Cardio' and approved ='yes' ";
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
                            $query4="select userid,username from users";
                            $result4=mysqli_query($con,$query4);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                      <td><?php echo$row ['bookingid']; ?></td>
                      <td><?php echo$row4 ['username']; ?></td>
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
                       
                  
                  
                  
                </tr>
                  
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">HIIT</h2></a>
                            
                            
                         
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
         <th>Booking ID</th>
         <th>Booked By</th>
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
          
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking WHERE classtype='HIIT' and approved ='yes'";
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
                           $query4="select userid,username from users";
                           $result4=mysqli_query($con,$query4);
                           
                     
                     
                           if($result2){
                               $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                               if($result3){
                                   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                   if($result4){
                                     $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                   
                               ?>
                   
                 
                   
                   <tr>
                   
                     <td><?php echo $sno ?></td>
                     <td><?php echo$row ['bookingid']; ?></td>
                     <td><?php echo$row4 ['username ']; ?></td>
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
                      
                 
                 
                 
                </tr>
                 
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Dance</h2></a>
                            
                            
                         
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
         <th>Booking ID</th>
         <th>Booked By</th>
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
          
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking WHERE classtype='Dance' and approved ='yes'";
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
                           $query4="select userid,username from users";
                           $result4=mysqli_query($con,$query4);
                           
                     
                     
                           if($result2){
                               $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                               if($result3){
                                   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                   if($result4){
                                     $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                   
                               ?>
                   
                 
                   
                   <tr>
                   
                     <td><?php echo $sno ?></td>
                     <td><?php echo$row ['bookingid']; ?></td>
                     <td><?php echo$row4 ['username']; ?></td>
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
                      
                 
                 
                 
                </tr>
                 
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Mind and Body</h2></a>
                            
                            
                         
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
         <th>Booking ID</th>
         <th>Booked By</th>
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
          
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking WHERE classtype='Mind and Body' and approved ='yes'";
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
                           $query4="select userid,username from users";
                           $result4=mysqli_query($con,$query4);
                           
                     
                     
                           if($result2){
                               $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                               if($result3){
                                   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                   if($result4){
                                     $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                   
                               ?>
                   
                 
                   
                   <tr>
                   
                     <td><?php echo $sno ?></td>
                     <td><?php echo$row ['bookingid']; ?></td>
                     <td><?php echo$row4 ['username']; ?></td>
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
                      
                 
                 
                 
                </tr>
                 
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Cycling</h2></a>
                            
                            
                         
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
         <th>Booking ID</th>
         <th>Booked By</th>
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
          
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking WHERE classtype='Cycling' and approved ='yes'";
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
                            $query4="select userid,username from users";
                            $result4=mysqli_query($con,$query4);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                   
                      <td><?php echo $sno ?></td>
                      <td><?php echo$row ['bookingid']; ?></td>
                      <td><?php echo$row4 ['username']; ?></td>
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
                       
                  
                  
                  
                 </tr>
                  
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
  $('#dt-all-checkboxfirst').dataTable({

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


