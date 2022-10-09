<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>



  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Packages</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Packages</li>
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
                            <h2 class="color-black">By Months (Memberships)</h2></a>
                            <a href="new_plan.php"><button class="btn btn-primary">Add Packages</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select * from plan where active='yes' and plantype='Months' ORDER BY amount DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
        <th>S.No</th>
          <th>Package name</th>
          <th>Package Type</th>
          <th>Package Details</th>
          <th>Months</th>
          <th>Rate</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = $query  = "select * from plan where active='yes' and plantype='Months' ORDER BY amount DESC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      
                      <td><?php echo $sno ?></td>
                     <td><?php echo $row['planName'] ?></td>
                     <td><?php echo $row['plantype'] ?></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     <td><?php echo$row['validity'] ?></td>
                     <td> <?php echo $row['amount']?>฿ </td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
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

                        <!-- /# row -->
                 <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">By Hours (Daypasses)</h2></a>
                            <a href="new_plan.php"><button class="btn btn-primary">Add Packages</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select * from plan where active='yes' and plantype='Hours' ORDER BY amount DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
        <th>S.No</th>
          <th>Package name</th>
          <th>Package Type</th>
          <th>Package Details</th>
          <th>Used Within (Hours)</th>
          
          <th>Rate</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = $query  = "select * from plan where active='yes' and plantype='Hours' ORDER BY amount DESC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      
                      <td><?php echo $sno ?></td>
                     <td><?php echo $row['planName'] ?></td>
                     <td><?php echo $row['plantype'] ?></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     
                     <td><?php echo$row['validity'] ?></td>
                     <td> <?php echo $row['amount']?>฿ </td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
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

                        <!-- /# row -->
                 <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">PT Sessions</h2></a>
                            <a href="new_plan.php"><button class="btn btn-primary">Add Packages</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select * from plan where active='yes' and plantype='Sessions' ORDER BY amount DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
        <th>S.No</th>
          <th>Package name</th>
          <th>Package Type</th>
          <th>Package Details</th>
          <th>Month(s)</th>
          <th>Sessions</th>
          <th>Rate</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = $query  = "select * from plan where active='yes' and plantype='Sessions' ORDER BY amount DESC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      
                      <td><?php echo $sno ?></td>
                     <td><?php echo $row['planName'] ?></td>
                     <td><?php echo $row['plantype'] ?></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     <td><?php echo$row['validity'] ?></td>
                     <td> <?php echo $row['session']?> </td>
                     <td> <?php echo $row['amount']?>฿ </td>
                     
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
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

                         <!-- /# row -->
                 <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Class Sessions</h2></a>
                            <a href="new_plan.php"><button class="btn btn-primary">Add Packages</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select * from plan where active='yes' and plantype='Classes' ORDER BY amount DESC";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
        <th>S.No</th>
          <th>Package name</th>
          <th>Package Type</th>
          <th>Package Details</th>
          <th>Months</th>
          <th>Sessions</th>
          <th>Rate</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = $query  = "select * from plan where active='yes' and plantype='Classes' ORDER BY amount DESC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      
                      <td><?php echo $sno ?></td>
                     <td><?php echo $row['planName'] ?></td>
                     <td><?php echo $row['plantype'] ?></td>
                     <td width='380'><?php echo $row['description'] ?></td>
                     <td><?php echo$row['validity'] ?></td>
                     <td><?php echo$row['session'] ?></td>
                     <td> <?php echo $row['amount']?>฿ </td>
                       
                  
                  
                  
                 <td>
                  
                  <a href="edit_trainer.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['pid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
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

<script>
$('#submit1').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit1').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit1').attr('disabled',true);}
 }
});
</script>

<script>
$('#submit2').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit2').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit2').attr('disabled',true);}
 }
});
</script>

<script>
$('#submit3').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit3').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit3').attr('disabled',true);}
 }
});
</script>

<script>
$('#submit4').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit4').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit4').attr('disabled',true);}
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

<script>
    
    $(document).ready(function () {
  $('#dt-all-checkbox').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox select-checkbox-all',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>

<script>
    
    $(document).ready(function () {
  $('#dt-bordered').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>

<script>
    
    $(document).ready(function () {
  $('#dt-all-checkbox1').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox select-checkbox-all',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>

<script>
    
    $(document).ready(function () {
  $('#dt-bordered2').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>

<script>
    
    $(document).ready(function () {
  $('#dt-bordered3').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>




    
           

<?php include('../constant/layout/footer.php');?>


