 <?php 
 include('../constant/connect.php');
  

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
                        
                        <li><a href="dashboard.php" aria-expanded="false"><i class="fas fa-home"></i><i></i><span class="hide-menu">Home</span></a></li>
                        
                        
                        
                        <li class="nav-label">Users</li>

                        
                        
<li><a href="view_mem.php" aria-expanded="false"><i class="fas fa-id-card-alt"></i><i></i><span class="hide-menu">Memberships <span class="badge badge-pill badge-dark"><h6 class="color-white"><?php
                            $query = "select COUNT(*) from users";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h6></span></a></span></a></li>

<li><a href="trainer.php" aria-expanded="false"><i class="fa fa-star"></i><i></i><span class="hide-menu">Trainers <span class="badge badge-pill badge-dark"><h6 class="color-white"><?php
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
<!--<li><a href="#" aria-expanded="false"><i class="fa fa-key" aria-hidden="true"></i><i></i><span class="hide-menu">Administrator</span></a></li>-->
<!--<li><a href="#" aria-expanded="false"><i class="fas fa-users"></i><i></i><span class="hide-menu">Private Groups</span></a></li>-->






<li class="nav-label color-black">Arrangements</li>
<!--<li><a href="view_checkin.php" aria-expanded="false"><i class="fas fa-at"></i><i></i><span class="hide-menu">Check-In/Out</span></a></li>-->




            
            
             
           
                          
            
            <!--<li><a href="view_trainer_schedules.php" aria-expanded="false"><i class="far fa-calendar-check"></i><i></i><span class="hide-menu">Trainer Schedules</span></a></li>-->
            
            
                <!-- Start Page Content -->
                
                
                    
                      
                
            <li><a href="view_booking.php" aria-expanded="false"><i class="fa fa-plus"></i><i></i><span class="hide-menu">Booking List</span></a></li> 
            
            <li class="nav-label">Courses</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-user-clock"></i><i></i><span class="hide-menu">Classes</span></a>
                        <ul aria-expanded="false" class="collapse">
                        
                        

           <!-- <li>
                <a href="view_privateclass.php">Semi-Private Personal Training</a>
            </li> 
        

            <li>
                <a href="view_privateclass.php">Private Group Training</a>
            </li> -->

            

                        <li>
                <a href="view_class_session.php">Group Class Training</a>
            </li> 
            
            <li>
                <a href="view_privateclass.php">Personal Training </a>
            </li> 

      

            </li>   
            </ul>

                        

                        <li class="nav-label">Facilities</li>

                        
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-dumbbell"></i><i></i><span class="hide-menu">Equipment <span class="badge badge-pill badge-dark"><?php
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
                <a href="newmachine.php">Gym Equipment</a>
            </li> 

            <li>
                <a href="view_maintenance.php">Maintenance <h6 class="color-white"><span class="badge badge-pill badge-dark"><?php
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

            <li><a href="view_wt.php" aria-expanded="false">Weight Training</a></li>
            <li><a href="view_ym.php" aria-expanded="false">Yoga Mats/Exercise Mats</a></li>
            <li><a href="view_se.php" aria-expanded="false">Strength Equipment</a></li>
            <li><a href="view_rs.php" aria-expanded="false">Rig Systems</a></li>
            <li><a href="view_mb.php" aria-expanded="false">MMA & Boxing</a></li>
            <li><a href="view_cf.php" aria-expanded="false">Commercial Flooring</a></li>
            <li><a href="view_te.php" aria-expanded="false">Treadmill & Elliptical</a></li>

            <li class="nav-label"><b>Setup</b></li>
                        
                        
                        
                    
                        
                        
                            
                            
                        </li>
                        
            <li>
                <a href="view_category.php">Categories</a>
            </li>   
            <li>
                <a href="view_vendor.php">Vendors</a>
            </li>   

       
                        </li>
                        <li>
                <a href="view_room.php">Studio</a>
            </li>   

            
            </ul>
                         
                
            <li class="nav-label">PLANS</li>

<li><a href="view_plan.php" aria-expanded="false"><i class="fas fa-wallet"></i><i></i><span class="hide-menu">Packages</span></a></li>

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
                        
            <li class="nav-label"><b>Customer Services</b></li>   
                        
            <li><a href="view_feedback.php" aria-expanded="false"><i class="fa fa-window-restore"></i><i></i><span class="hide-menu">Feedback</span></a></li>
              
                    
                            
                            
                        
            <li class="nav-label">Office Management</li>
<!--<li><a href="#" aria-expanded="false"><i class="fas fa-scroll"></i><i></i><span class="hide-menu">Debtors/Bad Debts</span></a></li>-->
<!--<li><a href="#" aria-expanded="false"><i class="fa fa-percent"></i><i></i><span class="hide-menu">Trainer Payroll</span></a></li>-->
<li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fas fa-scroll"></i><i></i><span class="hide-menu">Overview</span></a>
                            <ul aria-expanded="false" class="collapse">
                            
                            <li>
                <a href="charts.php">Chart Representation</a>
            </li>

                            <li>
                            <a href="view_checkin.php" aria-expanded="false"><i></i><span class="hide-menu">Check-in</span></a>
            </li>
                            <li>
                            <a href="view_attendance.php" aria-expanded="false"><i></i><span class="hide-menu">Personal Training Attendance</span></a>
            </li>

            <li>
                            <a href="view_attendance_group.php" aria-expanded="false"><i></i><span class="hide-menu">Group Class Attendance</span></a>
            </li>

            <li>
                <a href="over_members_month.php">Member Joined Log</a>
            </li>

            



            <li>
                <a href="revenue_month.php">Monthly Income</a>
            </li>

            

            </ul>
                        </li>

                         
                        
                        <li class="nav-label">Administrator</li>
                         <li><a href="profile.php" aria-expanded="false"><i class="fas fa-cogs"></i><i></i><span class="hide-menu">Admin Profile</span></a></li>
                         


                         

                   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->