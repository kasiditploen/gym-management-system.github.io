<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
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
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <button class="btn btn-primary" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                              <h1>Member History</h1>
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
        <th>Member Photo</th>
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
                  <td><?php  echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width: 80px; height: 80px;" >'; ?></td>
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
                                    <br>
                                    <h3>Training history of : - <?php echo $name;?></h3>
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

                                </div>
                            </div>
                        </div>
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('../constant/layout/footer.php');?>
  

