<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Trainer Contract</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Contract</li>
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
                              
                            <a href="new_contract.php"><button class="btn btn-primary">Add Trainer Contract</button></a>
                         
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
        <tr>
          <th>S.No</th>
          <th>Contract ID</th>
          <th>Contract name</th>
          <th>Contract Details</th>
          <th>Months</th>
          <th>Rate</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $query2  = "select * from plan2 where active='yes' ORDER BY amount DESC";
          //echo $query;
          $result2 = mysqli_query($con, $query2);
          $sno    = 1;

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                  $msgid = $row['pid'];
                ?>  
                  
                  <tr>
                    <td><?php echo $sno ?></td>
                     <td><?php echo$row ['pid']; ?></td>
                     <td><?php echo $row['planName'] ?></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     <td><?php echo$row['validity'] ?></td>
                     <td> <?php echo $row['amount']?>฿ </td>
                  
                  
                  
                 <td>
                  <a href="edit_plan.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_plan.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
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
  

