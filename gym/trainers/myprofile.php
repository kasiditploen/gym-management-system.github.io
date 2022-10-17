<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>

<?php include('../constant/layout/sidebar_trainer.php');?> 

 <!-- Page wrapper  -->
 <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> My Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black10.jpg');
    height: 150px; width: auto;
  ">
  <h1 class="color-white mb-3 h1"><b>My Profile</b></h1>
</div>
                <!-- /# row -->
             
                 <div class="card">
                 


                            <div class="card-body">
                           
                            
                            
                            <div class="col-md-16">
                            
                        <div>
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                            
        <tr>
        
        <th>Sl.No</th>
         <th style="width:10%;">Image</th>
          <th>Trainer ID</th>
          <th>Full Name</th>
          <th>Role</th>
          <th>Contact</th>
          <th>Gender</th>
          <th style="width:10%;">Available Day</th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
              $query  = "select * from trainers WHERE trainerid='".$_SESSION["trainerid"]."'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $uid   = $row['trainerid'];
                      $query7  = "select * from enrolls2_to WHERE uid='$uid' AND renewal='yes'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                            $query8  = "select privateclassid, COUNT(*) from privateclasses WHERE trainerid='$uid' AND approved='no'";
                            $result8 = mysqli_query($con, $query8);
                            if ($result8){
                              $row2 = mysqli_fetch_array($result8, MYSQLI_ASSOC);
                              $countapp = $row2['COUNT(*)'];
                              $query9  = "select *,SUM(service),COUNT(*) from rating WHERE trainerid='$uid'";
                      $result9 = mysqli_query($con, $query9);
                      if ($result9){
                        
                        $row3 = mysqli_fetch_array($result9, MYSQLI_ASSOC);
                        $countt = $row3['COUNT(*)'];
                        if ($row3['SUM(service)']> 0) {
                          $countrate = $row3['SUM(service)']/$countt;
                      } else {
                        
                      }
                        
                      }
                            }

                ?>  
                  
                  <tr>
                  
                                                        <td><?php echo $sno; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?>
                    <br><h4><span class="badge badge-light">Skill(s):</h4><span class="badge badge-light"><h4><?php echo $row['skills']; ?></h4></span>
                    <br><?php echo $row['yoe'] .' Years'; ?>
                    <br><h4><span class="badge badge-light">Rating:</h4><span class="badge badge-light"><h3><?php echo number_format($countrate, 1); ?>/5</h3></span>
                  </td>
                     <td><?php echo $row['trainerid']; ?></td>
                     <td><h4><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h4></td>
                     <td><h4><?php echo$row['trainertype']; ?><h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['availableday']; ?></td>
                       <td><?php echo $row['time_from']; ?></td>
                       <td><?php echo $row['time_to']; ?></td>
                       
                       
                  
                  
                 <td>
                 <a href="view_trainer_schedules.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-white" ><i class="far fa-calendar-alt"></i></button></a>
                 
                  <a href="read_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-light" ><i class="fa fa-folder-open"></i></button></a>
                  
                  <a href="view_privateclass_quick.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-white btn-xs">Appointment <span class="badge badge-pill badge-danger"><?php echo $countapp;?></span><span class="sr-only">unread messages</span></button></a>
                 
                 </td></tr>
                  
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

                <!-- End PAge Content -->
           

<?php include('../constant/layout/footer.php');?>
  

<link rel="stylesheet" href="popup_style.css">
  
