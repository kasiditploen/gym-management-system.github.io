<?php 
//session_start();
//include('../constant/check.php');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>

<!-- Right now I'm using this boostrap  -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/css/mdb.min.css" rel="stylesheet" />
<link href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/compiled-4.20.0.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
<link rel="stylesheet" href="./admin/custom/css/custom.css">

<!-- Right now I'm using this boostrap (Major Changes) -->
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/cascade-framework/1.5.0/css/core.min.css" rel="stylesheet" />-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>  
    


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/js/mdb.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>









<?php 
include('../constant/check.php');
 include('../constant/connect.php');
   
 
    ?>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- Logo -->
                <div class="navbar-header">
                <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php 
                                $sql = "select * from admin where id = '".$_SESSION["id"]."'";
                                $query=$con->query($sql);
                                while($row=mysqli_fetch_array($query))
                                    {
                                      //print_r($row);
                                      extract($row);
                                      $fname = $row['fname'];
                                      $lname = $row['lname'];
                                      $email = $row['email'];
                                      $contact = $row['contact'];
                                      $dob1 = $row['dob'];
                                      $gender = $row['gender'];
                                      $image = $row['image'];
                                    }
                                                                    ?>
                                <img src="../assets/uploadImage/Profile/<?=$image?>" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-left animated zoomIn">
                                <ul class="dropdown-user">
                                <li><a href="profile.php"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="change_pwd.php"><i class="ti-key"></i> Change Password</a></li>
                                    <li><a href="../constant/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>

                    
                        
                    <a class="navbar-brand" target="_blank">
                        <!-- Logo icon -->
                         <?php
             $sql_header_logo = "select * from manage_website"; 
             $result_header_logo = $con->query($sql_header_logo);
             $row_header_logo = mysqli_fetch_array($result_header_logo);
             ?>
                        <!--<b><img src="../assets/uploadImage/Logo/<?php echo $row_header_logo['logo'];?>" alt="homepage" class="dark-logo" style="width:80%;height:auto;"/></b> -->
                        
                        
                        <!--End Logo icon -->
                        <!-- Logo text -->

                        <!-- <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span> -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse .justify-content-center">
                    
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!--<li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>-->
                       
                    </ul>

                    <div class="row header-row">
                    
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                    
                    

                      
                    <b><img src="../assets/uploadImage/Logo/<?php echo $row_header_logo['logo'];?>" alt="homepage" class="dark-logo" style="width:auto;height:auto;"/></b></div>
                        
                    </ul>
                </div>
                                </ul>
            </nav>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <!-- End header header -->
        