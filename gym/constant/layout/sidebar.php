 <?php 
 include('../constant/connect.php');
  

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

 <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <!--<li class="nav-label">WELCOME TO AU FITNESS MANAGEMENT SYSTEM</li>-->
                        <p></p>
                        <br>
                        <br>
                        
                        <li><a href="dashboard.php" aria-expanded="false"><i class="fas fa-arrows-alt fa-lg"></i><i></i><span class="hide-menu"><b>Service</b></span></a></li>
                        <li><a href="view_admin.php" aria-expanded="false"><i class="fa fa-key fa-lg" aria-hidden="true"></i><i></i><span class="hide-menu"><b>Administrators</b></span></a></li>
                        
                        
                        

                        
                        


<li><a href="trainer.php" aria-expanded="false"><i class="fas fa-users-cog fa-lg"></i><i></i><span class="hide-menu"><b>Trainers</b> <span class="badge badge-pill badge-light"><h6 class="color-black mb-0 h6"><?php
                            $query = "select COUNT(*) from trainers";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h6></span></a></span></a></span></a></li>

<!--<li><a href="#" aria-expanded="false"><i class="fas fa-users"></i><i></i><span class="hide-menu">Private Groups</span></a></li>-->







<!--<li><a href="view_checkin.php" aria-expanded="false"><i class="fas fa-at"></i><i></i><span class="hide-menu">Check-In/Out</span></a></li>-->




            
            
             
           
                          
            
            <!--<li><a href="view_trainer_schedules.php" aria-expanded="false"><i class="far fa-calendar-check"></i><i></i><span class="hide-menu">Trainer Schedules</span></a></li>-->
            
            
                <!-- Start Page Content -->
                
                
                    
                      
                
            <li><a href="view_booking.php" aria-expanded="false"><i class="fas fa-plus-circle fa-lg"></i><i></i><span class="hide-menu"><b>Booking List  </b><span class="badge badge-pill badge-danger"><h6 class="color-white mb-0 h6"><?php
                            $query = "select COUNT(*) from booking where approved = 'no'";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h6></span></a></span></a></span></a></li>
            
            
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-chalkboard fa-lg"></i><i></i><span class="hide-menu"><b>Classes</b></span></a>
                        <ul aria-expanded="false" class="collapse">
                        
                        

           <!-- <li>
                <a href="view_privateclass.php">Semi-Private Personal Training</a>
            </li> 
        

            <li>
                <a href="view_privateclass.php">Private Group Training</a>
            </li> -->

            

                        <li>
                <a href="view_class_session.php"><b>Group Class Training</b></a>
            </li> 
            
            <li>
                <a href="view_privateclass.php"><b>Personal Training</b> </a>
            </li> 

      

            </li>   
            </ul>

                        

                        

                        
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-dumbbell fa-lg"></i><i></i><span class="hide-menu"><b>Equipment</b> <span class="badge badge-pill badge-light"><?php
                            $query = "select COUNT(*) from newmachine where mneed='1'";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></span></h6></span></a>
                        <ul aria-expanded="false" class="collapse">

                        <li class="nav-label"><b>Equipment Management</b></li>

                        
                        <li>
                <a href="newmachine.php"><b>Gym Equipment</b></a>
            </li> 

            <li>
                <a href="view_maintenance.php"><b>Maintenance</b> <h6 class="color-white mb-0 h6"><span class="badge badge-pill badge-light"><?php
                            $query = "select COUNT(*) from newmachine where mneed='1'";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></span></h6></a>
                
            </li> 
           
                        
            <li class="nav-label"><b>Types Of Equipment</b></li>

            <li><a href="view_wt.php" aria-expanded="false"><b>Weight Training</b></a></li>
            <li><a href="view_ym.php" aria-expanded="false"><b>Yoga Mats/Exercise Mats</b></a></li>
            <li><a href="view_se.php" aria-expanded="false"><b>Strength Equipment</b></a></li>
            <li><a href="view_rs.php" aria-expanded="false"><b>Rig Systems</a></b></li>
            <li><a href="view_mb.php" aria-expanded="false"><b>MMA & Boxing</a></b></li>
            <li><a href="view_cf.php" aria-expanded="false"><b>Commercial Flooring</b></a></li>
            <li><a href="view_te.php" aria-expanded="false"><b>Treadmill & Elliptical</b></a></li>

            <li class="nav-label"><b>Setup</b></li>
                        
                        
                        
                    
                        
                        
                            
                            
                        </li>
                        
            <li>
                <a href="view_category.php"><b>Categories</b></a>
            </li>   
   

       
                        </li>
                        <li>
                <a href="view_room.php"><b>Studio</b></a>
            </li>   

            
            </ul>
                         
                
            

<li><a href="view_plan.php" aria-expanded="false"><i class="fas fa-cubes fa-lg"></i><i></i><span class="hide-menu"><b>Packages</b></span></a></li>

<!--<li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-wheelchair"></i><span class="hide-menu">Exercise Routine</span></a>
    <ul aria-expanded="false" class="collapse">
       <li>
<a href="addroutine.php">Add Routine</a>
</li>

<li>
<a href="editroutine.php">Edit Routine</a>
</li>

<li>
<a href="viewroutine.php">View Routine</a>
</li>
    </ul>
</li> -->
                        
            <!--<li><a href="#" aria-expanded="false"><i class="fa fa-cutlery"></i><i></i><span class="hide-menu">Juice Bar</span></a></li>-->
            
                        
                       
            
            <!--<li><a href="#" aria-expanded="false"><i class="fa fa-sun"></i><i></i><span class="hide-menu">Daypasses</span></a></li> -->
           <!-- <li><a href="#" aria-expanded="false"><i class="fa fa-fire" aria-hidden="true"></i><i></i><span class="hide-menu">Bootcamp</span></a></li> -->
                        
            
                        
            <li><a href="view_feedback.php" aria-expanded="false"><i class="fas fa-comment fa-lg"></i><i></i><span class="hide-menu"><b>Feedback</b></span></a></li>
              
                    
                            
                            
                        
            <li class="nav-label">Reports</li>
<!--<li><a href="#" aria-expanded="false"><i class="fas fa-scroll"></i><i></i><span class="hide-menu">Debtors/Bad Debts</span></a></li>-->
<!--<li><a href="#" aria-expanded="false"><i class="fa fa-percent"></i><i></i><span class="hide-menu">Trainer Payroll</span></a></li>-->
<li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-chart-pie fa-lg"></i><i></i><span class="hide-menu"><b>Overview</b></span></a>
                            <ul aria-expanded="false" class="collapse">
                            
                            <li>
                <a href="charts.php"><b>Chart Representation</b></a>
            </li>

                            <li>
                            <a href="view_checkin.php" aria-expanded="false"><i></i><b>Check-in</b></a>

            </li>
            <li>
                            <a href="view_attendance_appointment.php" aria-expanded="false"><i></i><b>Appointed PT Attendance</b></a>
            </li>
                            <li>
                            <a href="view_attendance.php" aria-expanded="false"><i></i><b>PT Attendance</b></a>
            </li>

            <li>
                            <a href="view_attendance_group.php" aria-expanded="false"><i></i><b>Group Class Attendance</b></a>
            </li>

            <li>
                <a href="over_members_month.php"><b>Member Joined Log</b></a>
            </li>

            



            <li>
                <a href="revenue_month.php"><b>Monthly Income</b></a>
            </li>

            

            </ul>
                        </li>

                         
                        
                        <li class="nav-label"><b>Administrator</b></li>
                         <li><a href="profile.php" aria-expanded="false"><i class="fas fa-cogs fa-lg"></i><i></i><span class="hide-menu"><b>Admin Profile</b></span></a></li>
                         

                         
                 
                   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->