<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Commercial Flooring</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Commercial Flooring</li>
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
                                
                   

                    
                            <a href="new_toe.php"><button class="btn btn-primary" id="addProductModalBtn">Add Commercial Flooring</button></a></div>
                            <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
        <tr>
        
          <th style="width:1%;">S.No</th>
          <th style="width:1%;">Image</th>
          <th style="width:1%;">Types Of Equipment</th>
          <th style="width:10%;">MODEL ID</th>
          <th>Model</th>
          <th>Details</th>
          <th style="width:1%;">Brand</th>
          <th style="width:1%;">Category</th>
          <th style="width:1%;">Vendor</th>
          <th>Price</th>
          <th>Warranty</th>
          <th>Action</th>
        </tr>
        
        
      </thead>  
      

        <tbody>
          <?php
          $query  = "select * from toe WHERE type='Commercial Flooring'";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  //$msgid = $row['toeid'];
                  $uid   = $row['toeid'];
                  $categoryid   = $row['categories'];
                  $vendorid   = $row['vendors'];
                  $query4="select * from categories WHERE categoryid = '$categoryid'";
                            $result4=mysqli_query($con,$query4);
                            
                      $result1 = mysqli_query($con, $query4);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
                            
                            
                            
                            
                                
                                    
                                        
                                            
                                ?>
                  
                  
                  
                  
                  <tr>
                  
                    <td><?php echo $sno ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                    <td><?php echo$row ['type']; ?></td>
                    <td><?php echo$row ['toeid']; ?></td>
                     <td><?php echo $row['toeName'] ?></td>
                     <td width='100'><?php echo $row['description'] ?></td>
                     <td><?php echo$row['brands'] ?></td>
                     <td><?php echo$row4['categoryName'] ?></td>
                     <td><?php echo$row['vendors'] ?></td>
                     <td style="float: right;"> <h3> <?php echo $row['amount'].'฿'?> </h3></td>
                     <td width='100'> <?php echo $row['warranty'].'Year(s)'?> </td>
                     
                     
                  
                     
                     
                  
                 
                 <td>
                  <a href="edit_toe.php?id=<?php echo $row['toeid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                  <a href="del_wt.php?id=<?php echo $row['toeid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
                  
              <?php 
              $sno++; 
              $msgid = 0;
              }
            }
        }
    }
        
    


             
          

          ?>  
          
              
           

        </tbody>

        <tbody>
        <?php
                            
                            $result = mysqli_query($con, 'SELECT SUM(amount) AS value_sum FROM toe WHERE type="Commercial Flooring"'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
                            ?>
      <tr>
       <th colspan="7"><h3>Total Price</h3></th>
       <td></td>
       <td></td>     
                     <td> <h3><?php echo $row['value_sum'].'฿'?></h3> </td>
                     <td</td>
                     
       
      </tr>
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
  

