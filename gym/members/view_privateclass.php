<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_member.php');?>
<?php include('../constant/layout/sidebar_member.php');
?>



  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Private Classes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Private Classes</li>
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
                              
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
        <tr>
        
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Member Name</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          
        </tr>
      </thead>    
        <tbody>
          <?php
              $query  = "select * from privateclasses ORDER BY className DESC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $msgid = $row['privateclassid'];
                    $uid   = $row['privateclassid'];
                  $query1  = "select * from users";
                      $result1 = mysqli_query($con, $query1);
                      $pid=$row['privateclassid'];
                          $query3="select studioid,studioName from studio";
                          $result3=mysqli_query($con,$query3);
                          $query4="select * from trainers";
                          $result4=mysqli_query($con,$query4);
                      if($result1){
                        $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                          
                          
                              
                          
                              if($result3){
                                  $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                  
                         
                                  if($result4){
                                
                                    $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      
                              ?>
                    
                  
                    
                    <tr>
                   
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['privateclassid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo$row1 ['username']; ?></td>
                       <td><?php echo $row3['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row4['username'] ?></td>
                     
                       
                  
                  
                  
                
                  
              <?php 
              $sno++; 
              $msgid = 0;
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


