<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Vendors</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Vendors</li>
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
                            <div class="col-md-5 align-self-center">
                   

                    
                            <a href="new_vendor.php"><button class="btn btn-primary" id="addProductModalBtn">Add Vendor</button></a></div>
                            <form action="del_all_vendor.php" method="POST">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
        <tr>
        <th style="width:1%;"><button type="submit" id="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete</button></th>
          <th style="width:1%;">S.No</th>
          <th style="width:10%;">Brand ID</th>
          <th>Firm Name</th>
          <th>Contact Name</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Email</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $query  = "select * from vendors where active='yes' ORDER BY vendorName DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  
                  
                ?>  
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="vendor_delete_id[]" value="<?= $row['vendorid']; ?>">
                    <td><?php echo $sno ?></td>
                     <td><?php echo$row ['vendorid']; ?></td>
                     <td><?php echo $row['vendorName'] ?></td>
                     <td><?php echo $row['contactName'] ?></td>
                     <td><?php echo $row['address'] ?></td>
                     <td><?php echo $row['mobile'] ?></td>
                     <td><?php echo $row['email'] ?></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     
                  
                     
                  
                 <td>
                  <a href="edit_plan.php?id=<?php echo $row['vendorid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_vendor.php?id=<?php echo $row['vendorid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
                    

                        
           
            <!-- Container fluid  -->
            

                        
               
                <!-- /# row -->

                <!-- End PAge Content -->


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
                
           

<?php include('../constant/layout/footer.php');?>
  

