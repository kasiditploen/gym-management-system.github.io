
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
            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                <!-- Start Page Content -->
                
                
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                        <div class="table-responsive m-t-40">
                          
                        <table id="myTable" class="table table-bordered table-striped">
                        <button class="btn btn-danger col-sm-2 sm-0" onclick="window.print()"><i class="fas fa-print"></i> Print</button>

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
  

