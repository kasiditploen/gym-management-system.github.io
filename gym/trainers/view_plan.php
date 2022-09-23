<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Package</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Package</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="card">
                <div class="card-body">
                            <a href="new_plan.php"><button class="btn btn-primary">Add Package</button></a></div>
                            <form action="del_all_plan.php" method="POST">
                         
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                <!-- /# row -->
                 

                    
        <tr>
        <th style="width:1%;"><button type="submit" id="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete</button></th>
          <th>S.No</th>
          <th>Package ID</th>
          <th>Package name</th>
          <th>Package Details</th>
          <th>Months</th>
          <th>Rate</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $query  = "select * from plan where active='yes' ORDER BY amount DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $msgid = $row['pid'];
                ?>  
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="p_delete_id[]" value="<?= $row['pid']; ?>">
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
  
