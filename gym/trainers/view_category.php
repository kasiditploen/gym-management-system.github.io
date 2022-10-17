<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Categories</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Categories</li>
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
                   

                    
                            <a href="new_category.php"><button class="btn btn-primary" id="addProductModalBtn">Add Category</button></a></div>
                            
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
        <tr>
        
          <th style="width:1%;">S.No</th>
          <th>Category</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $query  = "select * from categories where active='yes' ORDER BY categoryName DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  
                  
                ?>  
                  
                  <tr>
                  
                    <td><?php echo $sno ?></td>
                     <td><b><h3><?php echo $row['categoryName'] ?></h3></b></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     
                  
                     
                  
                 <td>
                  <a href="edit_plan.php?id=<?php echo $row['categoryid'];?>"><button type="button" class="btn btn-sm btn-danger"><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_category.php?id=<?php echo $row['categoryid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
  

