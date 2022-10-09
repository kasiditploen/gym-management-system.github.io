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
                        
                        
                        
                        
                        
                        

                        
                        



<!--<li><a href="#" aria-expanded="false"><i class="fa fa-key" aria-hidden="true"></i><i></i><span class="hide-menu">Administrator</span></a></li>-->
<!--<li><a href="#" aria-expanded="false"><i class="fas fa-users"></i><i></i><span class="hide-menu">Private Groups</span></a></li>-->







<!--<li><a href="view_checkin.php" aria-expanded="false"><i class="fas fa-at"></i><i></i><span class="hide-menu">Check-In/Out</span></a></li>-->




            
            
             
           
                          
            
            <!--<li><a href="view_trainer_schedules.php" aria-expanded="false"><i class="far fa-calendar-check"></i><i></i><span class="hide-menu">Trainer Schedules</span></a></li>-->
            
            
                <!-- Start Page Content -->
                
                
                    
                      
                
            <li><a href="view_booking.php" aria-expanded="false"><i class="fa fa-plus"></i><i></i><span class="hide-menu">Booking List</span></a></li> 
            
            
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
            
            <li><a href="trainer.php" aria-expanded="false"><i></i>Personal Training <span class="badge badge-pill badge-light"><h6 class="color-black"><?php
                            $query = "select COUNT(*) from privateclasses where userid = '".$_SESSION["userid"]."' and approved = 'yes'";

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

      

            </li>   
            </ul>

                        

                        

                        
                        
                         
                
            



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
                        
            
                        
            <li><a href="view_feedback.php" aria-expanded="false"><i class="fa fa-window-restore"></i><i></i><span class="hide-menu">Feedback</span></a></li>
              
                    
                            
                            
                        
            

                         
                        
                        <li class="nav-label">User</li>
                        <li><a href="dashboard.php" aria-expanded="false"><i class="fas fa-home"></i><i></i><span class="hide-menu">My Profile</span></a></li>
                         


                         

                   
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->