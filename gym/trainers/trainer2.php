<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Fitness Instructors</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Fitness Instructors</li>
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
                            
                            <a href="new_trainer.php"><button class="btn btn-primary">Add Fitness Instructor</button></a>
                            <div class="col-md-16">
                        <div class="card bg-primary p-10">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from trainers";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a><h2 class="color-white">Total Trainers</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
         <th style="width:10%;">Image</th>
          <th>Trainer ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>E-Mail</th>
          <th>Gender</th>
          <th>Joining Date</th>
          <th style="width:10%;">Available Day</th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          <th>Special Skill</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
              $query  = "select * from trainers WHERE trainertype='Fitness Instructor'";
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
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                ?>  
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" name="trainer_delete_id[]" value="<?= $row['trainerid']; ?>">
                    <td><?php echo $sno; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><?php echo $row['trainerid']; ?></td>
                     <td><h4><?php echo$row['username']; ?><h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       <td><?php echo $row['availableday']; ?></td>
                       <td><?php echo $row['time_from']; ?></td>
                       <td><?php echo $row['time_to']; ?></td>
                       <td><?php echo $row['skills']; ?></td>
                  
                  
                  
                 <td>
                  <a href="read_member.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-folder-open"></i></button></a>
                  <a href="edit_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_trainer.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
                <!-- /# row -->

                <!-- End PAge Content -->

                <script>
$(document).ready(function(){
    $("#form1 #select-all").click(function(){
        $("#form1 input[type='checkbox']").prop('checked',this.checked);
    });
});
    
</script>
           

<?php include('../constant/layout/footer.php');?>


