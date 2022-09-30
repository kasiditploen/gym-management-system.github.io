
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper ">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Members</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Members</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->

            <?php
      $id     = $_GET['id'];;
      $query  = "select * from users WHERE userid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $image = $row['image'];
            $name = $row['username'];
            $firstname = $row['fname'];
            $lastname = $row['lname'];
              $memid=$row['userid'];
              $gender=$row['gender'];
              $mobile=$row['mobile'];
              $email=$row['email'];
              $joinon=$row['joining_date'];
              
              $query4="select COUNT(*) from checkin where userid='$id'";
                  $result4=mysqli_query($con,$query4);
                  if($result4){
                    $row3=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                    $countCheckin = $row3['COUNT(*)'];
          }
      }
    }
      ?>
            
            <div class="container-fluid print-container">
            <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: '<?php echo 'data:image/jpeg;base64,' . $row['image'];?>';
    height: 200px; width: 1600px;
  ">
  <h1 class="color-black mb-3 h1"><b><?php echo "$firstname "," $lastname" ?></b></h1>
</div>
                <!-- Start Page Content -->
                
                
                <!-- /# row -->
                 <div class="card ">
                            <div class="card-body">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                              <h2>Member Information</h2>
                              <h1 class="color-blue"><b>AU FITNESS CENTER</b></h1>
                              <div class="widget-content">
            <div class="row-fluid ">
              <div class="span4 ">
                <table class="">
                  <tbody>
                    <tr>
                      <td><h4>AU FITNESS CENTER</h4></td>
                    </tr>
                    <tr>
                      <td>88 Moo 8<br> Bang Na-Trad Km. 26,<br> Bangsaothong Samuthprakarn</br> 10570 Thailand</td>
                    </tr>
                    
                    <tr>
                      <td>Tel:  +66 2 723 2323</td>
                    </tr>
                    <tr>
                      <td >Email: abac@au.edu</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                              <button class="btn btn-danger col-sm-2 sm-0" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                              
                              
                    

                    
                    
                            <h3>
                              Details of : - <?php
      $id     = $_GET['id'];;
      $query  = "select * from users WHERE userid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $image = $row['image'];
            $name = $row['username'];
            $fname = $row['fname'];
            $lname = $row['lname'];
              $memid=$row['userid'];
              $gender=$row['gender'];
              $mobile=$row['mobile'];
              $email=$row['email'];
              $joinon=$row['joining_date'];
              
              $query4="select COUNT(*) from checkin where userid='$id'";
                  $result4=mysqli_query($con,$query4);
                  if($result4){
                    $row3=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                    $countCheckin = $row3['COUNT(*)'];
          }
      }
    }
  
      ?><h1><?php echo $fname. " " . $lname; ?></h1>
      <h4>(<?php echo $name; ?>)</h4>
      
      </h3>
                                <div class="table-responsive m-t-40">
                                    <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
        <th>Member Photo</th>
         <th>Membership ID</th>
          <th>Name</th>
          <th>Gender</th>
            <th>Mobile</th>
            <th>Email</th>
          <th>Join On</th>
        </tr>
      </thead>    
        <tbody>
         
                  <tr>
                  <td><?php  echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width: 200px; height: 200px;" >'; ?></td>
                    <td><?php  echo $memid; ?></td>
                     <td><?php echo $name; ?></td>
                     <td><?php echo $gender; ?></td>
                     <td><?php echo $mobile; ?></td>
                     <td><?php echo $email; ?></td>
                     <td><?php echo $joinon; ?> </td>
                 </tr>
                  
             

        </tbody>
                                      
                                    </table>
                                    <br>
                                    <br>
                                    <h3>Payment history of : - <?php echo $name;?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
          <th>Plan Name</th>
          <th>Plan Desc</th>
          <th>Validity</th>
          <th>Amount</th>
          <th>Payment Date</th>
          <th>Expire Date</th>
        </tr>
      </thead>    
        <tbody>
          <?php
            
            $query1  = "select * from enrolls_to WHERE uid='$memid'";
            //echo $query;
            $result = mysqli_query($con, $query1);
            $sno    = 1;

            if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $pid=$row['pid'];
                  $query2="select * from plan where pid='$pid'";
                  $result2=mysqli_query($con,$query2);
                  if($result2){
                    $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                     <td><?php echo$row1['planName']; ?></td>
                    
                     <td width='380'><?php echo $row1['description']; ?></td>
                     <td><?php echo $row1['validity']; ?></td>
                     <td><?php echo $row1['amount']; ?> </td>
                     <td><?php echo $row['paid_date']; ?> </td>
                     <td><?php echo $row['expire']; ?> </td>
                 </tr>
                 <?php 
                 $sno++;
                }  
              $memid = 0;
                }
                
            }

          ?>      

        </tbody>
                                      
                                    </table>
                                    
                                    <h3>Health Status history of : - <?php echo $name;?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
          <th>Nickname</th>
          <th>Calories</th>
          <th>Height</th>
          <th>Weight</th>
          <th>Fat</th>
          <th>Remarks</th>
        </tr>
      </thead>    
        <tbody>
                                    <?php
          $id     = $_GET['id'];;
      $query0  = "select * from users WHERE userid='$id'";
      $sno    = 1;
      $result0 = mysqli_query($con, $query0);
      if($result0){
        $row0=mysqli_fetch_array($result0,MYSQLI_ASSOC);
            $query1  = "select * from health_status WHERE uid='$id'";
            $result = mysqli_query($con, $query1);
           

            if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $classid = $row['classid'];
                  $query2="select * from classes where classid='$classid'";
                  $result2=mysqli_query($con,$query2);
                  if($result2){
                    $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                    $trainerid = $row1['trainerid'];
                    $query3="select * from trainers where trainerid='$trainerid'";
                  $result3=mysqli_query($con,$query3);
                    
                  if($result3){
                    $row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                    
                    
                    ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                   
                     <td><?php echo $row0['username']; ?></td>
                     <td><?php echo $row['calorie']; ?></td>
                     <td><?php echo $row['height']; ?> </td>
                     <td><?php echo $row['weight']; ?> </td>
                     <td><?php echo $row['fat']; ?> </td>
                     <td width='380'><?php echo $row['remarks']; ?></td>
                 </tr>
                 <?php 
                 $sno++;
                }  
              $memid = 0;
                }
                
            }
          }
        }

          ?>      

        </tbody>
                                      
                                    </table>
                           
               
                <!-- /# row -->

                <br>
                                    <br>
                                    <h3>Group Class (Sessions) Enrollment history of : - <?php echo $name;?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
         <th>Class ID</th>
          <th>Class Name</th>
          <th>Nickname</th>
          <th>Description</th>
          <th>Trainer</th>
          <th>Training Date</th>
          <th>Time From</th>
          <th>Time To</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $id     = $_GET['id'];;
      $query0  = "select * from users WHERE userid='$id'";
      $sno    = 1;
      $result0 = mysqli_query($con, $query0);
      while($row0=mysqli_fetch_array($result0)){
        
            $query1  = "select * from classholder WHERE userid='$id'";
            $result = mysqli_query($con, $query1);
           

            if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $classid = $row['classid'];
                  $query2="select * from classes where classid='$classid'";
                  $result2=mysqli_query($con,$query2);
                  if($result2){
                    $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                    $trainerid = $row1['trainerid'];
                    $query3="select * from trainers where trainerid='$trainerid'";
                  $result3=mysqli_query($con,$query3);
                    
                  if($result3){
                    $row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                    
                    
                    ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                    <td><?php echo$row1['classid']; ?></td>
                     <td><?php echo$row1['className']; ?></td>
                     <td><?php echo $row0['username']; ?></td>
                     <td width='380'><?php echo $row1['description']; ?></td>
                     <td><?php echo $row2['username']; ?></td>
                     <td><?php echo $row['created_date']; ?> </td>
                     <td><?php echo $row['time_from']; ?> </td>
                     <td><?php echo $row['time_to']; ?> </td>
                 </tr>
                 <?php 
                 $sno++;
                }  
              $memid = 0;
                }
                
            }
          }
        }

          ?>      

        </tbody>
                                      
                                    </table>

                                    <h3>Personal Training Enrollment history of : - <?php echo $name;?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
         <th>Class ID</th>
          <th>Class Name</th>
          <th>Nickname</th>
          <th>Description</th>
          <th>Trainer</th>
          <th>Training Date</th>
          <th>Time From</th>
          <th>Time To</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $id     = $_GET['id'];;
      $query0  = "select * from users WHERE userid='$id'";
      $sno    = 1;
      
      $result0 = mysqli_query($con, $query0);
                                      while($row0=mysqli_fetch_array($result0)){
            $query1  = "select * from privateclasses where userid = '$id'";
            $result = mysqli_query($con, $query1);
           
            if(isset($query1)){
            if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $pclassid = $row['privateclassid'];
                  $query2="select * from privateclasses where privateclassid='$pclassid'";
                  $result2=mysqli_query($con,$query2);
                  while($row1=mysqli_fetch_array($result2)){
                    $trainerid = $row1['trainerid'];
                    $query3="select * from trainers where trainerid='$trainerid'";
                  $result3=mysqli_query($con,$query3);
                    
                  if($result3){
                    $row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                    
                    
                    ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                    <td><?php echo$row1['privateclassid']; ?></td>
                     <td><?php echo$row1['className']; ?></td>
                     <td><?php echo $row0['username']; ?></td>
                     <td width='380'><?php echo $row1['description']; ?></td>
                     <td><?php echo $row2['username']; ?></td>
                     <td><?php echo $row1['date_from']; ?> </td>
                     <td><?php echo $row1['time_from']; ?> </td>
                     <td><?php echo $row1['time_to']; ?> </td>
                 </tr>
                 <?php 
                 $sno++;
                }  
              $memid = 0;
                }
                
            }
          }
        }
      }

          ?>      

        </tbody>
                                      
                                    </table>

                                    <br>
                                    <br>
                                    <h3>Checkin history of : - <?php echo $name;?><br>  Total Checkin <?php echo $countCheckin ?></br></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
          <th>Nickname</th>
          <th>Created Date</th>
          <th>Checkin Count</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $id     = $_GET['id'];;
      $query0  = "select * from users WHERE userid='$id'";
      $sno    = 1;
      $result0 = mysqli_query($con, $query0);
      if($result0){
        $row0=mysqli_fetch_array($result0,MYSQLI_ASSOC);
            $query1  = "select * from checkin WHERE userid='$id'";
            $result = mysqli_query($con, $query1);
           

            if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $classid = $row['classid'];
                  $query2="select * from classes where classid='$classid'";
                  $result2=mysqli_query($con,$query2);
                  if($result2){
                    $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                    $trainerid = $row1['trainerid'];
                    $query3="select * from trainers where trainerid='$trainerid'";
                  $result3=mysqli_query($con,$query3);
                    
                  if($result3){
                    $row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                    $query4="select COUNT(*) from checkin where userid='$id'";
                  $result4=mysqli_query($con,$query4);
                  if($result4){
                    $row3=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                    
                    ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                    
                     <td><?php echo $row0['username']; ?></td>
                     <td><?php echo $row['created_date']; ?><br><?php echo $row['created_time']; ?></br></td>
                     <td><?php echo $row3['COUNT(*)']; ?></td>
                 </tr>
                 <?php 
                 $sno++;
                }  
              $memid = 0;
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

                        <style>


@media print {
  body * {
    visibility: hidden;
  }

  .print-container, .print-container * {
    visibility: visible;
  }

  .print-container {
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
  }
  
}
</style>
                        

                <!-- End PAge Content -->

                
           

<?php include('../constant/layout/footer.php');?>
  

