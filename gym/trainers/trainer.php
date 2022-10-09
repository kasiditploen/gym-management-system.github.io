<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Personal Trainer</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Trainer</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black6.jpg');
    height: 150px; width: auto;
  ">
  <h1 class="color-white mb-3 h1"><b>Trainers</b></h1>
</div>
                <!-- /# row -->
             
                 <div class="card">
                 


                            <div class="card-body">
                            <h2 class="color-black d-flex justify-content-center mb-3 h2"><b>Personal Trainers</b></h2></a>
                            
                            
                            <div class="col-md-16">
                        <div>
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                
                                    <h1 class="color-black mb-3 h1"><b><?php
                            $query = "select COUNT(*) from trainers";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></b></h1>
                                     <a><h3 class="color-black mb-3 h4">Total Trainers</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                            
        <tr>
        
        <th>Sl.No</th>
         <th style="width:10%;">Image</th>
          <th>Trainer ID</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Role</th>
          <th>Contact</th>
          <th>E-Mail</th>
          <th>Gender</th>
          <th>Joining Date</th>
          <th style="width:10%;">Available Day</th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
              $query  = "select * from trainers WHERE trainertype LIKE '%Personal Trainer%' and trainerid !='".$_SESSION["trainerid"]."'";
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
                        $countrate = $row3['SUM(service)']/$countt;
                        
                        
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
                     <td><h4><?php echo$row['username']; ?><h4></td>
                     <td><h4><?php echo$row['trainertype']; ?><h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       <td><?php echo $row['availableday']; ?></td>
                       <td><?php echo $row['time_from']; ?></td>
                       <td><?php echo $row['time_to']; ?></td>
                       
                       
                  
                  
                 <td>
                 
                 <a href="view_trainer_schedules.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-white" ><i class="far fa-calendar-alt"></i></button></a>
                 <a href="view_trainer_schedules.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-light" ><i class="fa fa-dollar"></i></button></a>
                  <a href="read_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-light" ><i class="fa fa-folder-open"></i></button></a>
                  <a href="edit_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-white" ><i class="fa fa-pencil"></i></button></a>
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

                        <div class="card">
                 


                            <div class="card-body">
                            <h2 class="color-black d-flex justify-content-center">Fitness Instructor</h2></a>
                            
                            <div class="col-md-16">
                        <div>
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    
                                        <thead>
                                            
        <tr>
        
        <th>Sl.No</th>
         <th style="width:10%;">Image</th>
          <th>Trainer ID</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Role</th>
          <th>Contact</th>
          <th>E-Mail</th>
          <th>Gender</th>
          <th>Joining Date</th>
          <th style="width:10%;">Available Day</th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
              $query  = "select * from trainers WHERE trainertype LIKE '%Fitness Instructor%' and trainerid !='".$_SESSION["trainerid"]."'";
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
                        $countrate = $row3['SUM(service)']/$countt;
                        
                        
                      }
                            }
                ?>  
                  
                  <tr>
                  
                                                        <td><?php echo $sno; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?>
                    <br><h4><span class="badge badge-light">Skill(s):</h4><span class="badge badge-light"><h4><?php echo $row['skills']; ?></h4></span>
                    <br><?php echo $row['yoe'] .' Years'; ?>
                    <br><h4><span class="badge badge-light">Rating:</h4><span class="badge badge-light"><h3>/5</h3></span>
                  </td>
                     <td><?php echo $row['trainerid']; ?></td>
                     <td><h4><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h4></td>
                     <td><h4><?php echo$row['username']; ?><h4></td>
                     <td><h4><?php echo$row['trainertype']; ?><h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       <td><?php echo $row['availableday']; ?></td>
                       <td><?php echo $row['time_from']; ?></td>
                       <td><?php echo $row['time_to']; ?></td>
                       
                       
                  
                  
                 <td>
                 <a href="view_trainer_schedules.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-white" ><i class="far fa-calendar-alt"></i></button></a>
                 <a href="view_trainer_schedules.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-light" ><i class="fa fa-dollar"></i></button></a>
                  <a href="read_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-light" ><i class="fa fa-folder-open"></i></button></a>
                  <a href="edit_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-white" ><i class="fa fa-pencil"></i></button></a>
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
<?php include('../constant/layout/footer.php');?>


