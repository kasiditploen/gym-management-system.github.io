<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Trainers</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Trainers</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <?php
      $id     = $_GET['id'];;
      $query  = "select * from trainers WHERE trainerid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $image = $row['image'];
            $name = $row['username'];
            $fname = $row['fname'];
            $lname = $row['lname'];
              $memid=$row['trainerid'];
              $gender=$row['gender'];
              $mobile=$row['mobile'];
              $email=$row['email'];
              $joinon=$row['joining_date'];
              $skills=$row['skills'];
              $yoe=$row['yoe'];
              
          }
      }
      ?>
            <div class="container-fluid print-container">
            
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card ">
                            <div class="card-body">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                            <h1 class="color-black mb-3 h1"><b><?php echo "$fname "," $lname" ?>'s Information </b></h1>
                              

              <button class="btn btn-danger col-sm-2 sm-0" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                            <h3>
                              Details of : - <?php
      $id     = $_GET['id'];;
      $query  = "select * from trainers WHERE trainerid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $image = $row['image'];
            $name = $row['username'];
              $memid=$row['trainerid'];
              $gender=$row['gender'];
              $mobile=$row['mobile'];
              $email=$row['email'];
              $joinon=$row['joining_date'];
              $skills=$row['skills'];
              $yoe=$row['yoe'];
              echo $name;
          }
      }
      ?></h3>
                                <div class="table-responsive m-t-40">
                                    <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
        <th>Trainer Photo</th>
         <th>Trainer ID</th>
          <th>Name</th>
          <th>Gender</th>
            <th>Mobile</th>
            <th>Email</th>
          <th>Join On</th>
          <th>Skills</th>
          <th>Year Of Experience</th>
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
                     <td><?php echo $skills; ?> </td>
                     <td><?php echo $yoe; ?> Years </td>
                 </tr>
                  
             

        </tbody>
                                      
                                    </table>

                                    
                                    <br>
                                    <a href="new_salary.php?id=<?php echo $id?>"><button class="btn btn-lg btn-light waves-effect waves-light"><b> + Add Salary</b></button></a></div>
                                    <h3>Payroll History of : - <?php echo $name;?></h3>
                                    
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
         <th>Date</th>
          <th>Trainer Name</th>
          <th>Earning</th>
          <th>Deduction</th>
          <th>Total</th>
          
        </tr>
      </thead>    
        <tbody>
          <?php
          $id     = $_GET['id'];;
      $query0  = "select * from trainers WHERE trainerid='$id'";
      $sno    = 1;
      $result0 = mysqli_query($con, $query0);
      if($result0){
        $row0=mysqli_fetch_array($result0,MYSQLI_ASSOC);
        $trainername=$row0['username'];
            $query1  = "select * from salary";
            $result = mysqli_query($con, $query1);
           
            
            if(isset($query1)){
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $salaryid = $row['salaryid'];
                  $query2="select * from salary where trainerid='$id' ORDER BY date_from desc";
                  $result2=mysqli_query($con,$query2);
                  while($row1=mysqli_fetch_array($result2)){
                    
                    $pvclassid = $row1['privateclassid'];
                    $trainerid = $row1['trainerid'];
                    $trainern = $row1['username'];
                    $userid = $row1['userid'];
                    $query3="select * from users where userid='$userid'";
                    
                  $result3=mysqli_query($con,$query3);
                  
                  if($result3){
                    $row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                    $extotal=$row1['earning']- $row1['deduction'];
                    $con->query("UPDATE salary SET total='".$extotal."' WHERE salaryid='".$salaryid."'");
                    ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                    <td><?php echo $row1['date_from']; ?> </td>
                    <td><?php echo $trainername ?></td>
                     <td><?php echo $row1['earning']; ?>฿</td>
                     <td><?php echo $row1['deduction']; ?>฿ </td>
                     <td><?php echo $row1['total']; ?>฿ </td>
                     
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
                                    
               
                <!-- /# row -->

                <!-- End PAge Content -->

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
           

<?php include('../constant/layout/footer.php');?>
  

