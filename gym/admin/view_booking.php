<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>



  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black14.jpg');
    height: 150px; width: auto;
  ">
  <h1 class="color-white mb-3 h1"><b>Booking List</b></h1>
</div>
                <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">All Booking (Approval Request To Join Class)</h2></a>
                            
                            
                         
                                <div class="table-responsive m-t-40">
                               
                                    <table id="dt-all-checkboxfirst" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Appointer</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Appointment Date</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Action</th>
        </tr>

        
              <!--  and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from booking where approved='no'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $bookingid = $row['bookingid'];
                  $uid   = $row['classid'];
                  $classid   = $row['classid'];
                  $trainerid   = $row['trainerid'];
                  $userid   = $row['userid'];
                  $tf   = $row['time_from'];
                  $tt   = $row['time_to'];
                  $df   = $row['date_from'];
                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="select userid,username from users";
                            $result4=mysqli_query($con,$query4);
                            
                       
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                      <td><?php echo $row['classid'] ?></td>
                      <td><?php echo $row4['username'] ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo $row['created_date'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                  
                 <form id="form3" action='submit_accept_book.php?id=<?php echo $bookingid;?>' method='post'><input type='hidden' name='bookingid' value='<?php echo $bookingid;?>'/>
                 <input type='hidden' name='bookingid' value='<?php echo $bookingid;?>'/>
                 <input type='hidden' name='classid' value='<?php echo $classid;?>'/>
                              <input type='hidden' name='className' value='<?php echo $name;?>'/>
                              <input type='hidden' name='description' value='<?php echo $desc;?>'/>
                              <input type='hidden' name='studios' value='<?php echo $studioid ?>'/>
                              <input type='hidden' name='classtype' value='<?php echo $type;?>'/>
                              <input type='hidden' name='dow' value='<?php echo $dow;?>'/>
                              <input type='hidden' name='date_from' value='<?php echo $df;?>'/>
                              <input type='hidden' name='date_to' value='<?php echo $dt ?>'/>
                              <input type='hidden' name='time_from' value='<?php echo $tf;?>'/>
                              <input type='hidden' name='time_to' value='<?php echo $tt;?>'/>
                              <input type='hidden' name='trainerid' value='<?php echo $trainerid;?>'/>
                              <input type='hidden' name='trainerName' value='<?php echo $trainername ?>'/>
                              <input type='hidden' name='userid' value='<?php echo $userid?>'/>
                              <input type='hidden' name='username' value='<?php echo $username?>'/>
                              <input type='hidden' name='session' value='<?php echo $session?>'/>
                              <input type='submit' id='button1' value='Approve' class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>
                  <a href="del_book.php?id=<?php echo $row['bookingid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to deny this appointment?')"><i class="fas fa-times"></i></button></a></td></tr>
                  
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


                
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Cardio</h2></a>
                           
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select bookingid from booking";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
         <th>Sl.No</th>
         <th>Booking ID</th>
         <th>Booked By</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
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
              $query  = "select * from booking WHERE classtype='Cardio' and approved ='yes' ";
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
                            $query4="select userid,username from users";
                            $result4=mysqli_query($con,$query4);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                      <td><?php echo$row ['bookingid']; ?></td>
                      <td><?php echo$row4 ['username']; ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                </tr>
                  
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">HIIT</h2></a>
                            
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
         <th>Sl.No</th>
         <th>Booking ID</th>
         <th>Booked By</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
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
              $query  = "select * from booking WHERE classtype='HIIT' and approved ='yes'";
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
                           $query4="select userid,username from users";
                           $result4=mysqli_query($con,$query4);
                           
                     
                     
                           if($result2){
                               $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                               if($result3){
                                   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                   if($result4){
                                     $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                   
                               ?>
                   
                 
                   
                   <tr>
                   
                     <td><?php echo $sno ?></td>
                     <td><?php echo$row ['bookingid']; ?></td>
                     <td><?php echo$row4 ['username ']; ?></td>
                      <td><?php echo$row ['classid']; ?></td>
                      <td><?php echo $row['className'] ?></td>
                      <td width='380'><?php echo $row['description'] ?></td>
                      <td><?php echo $row2['studioName'] ?></td>
                      <td><?php echo$row ['dow']; ?></td>
                      <td><?php echo $row['date_from'] ?></td>
                      <td><?php echo $row['date_to'] ?></td>
                      <td><?php echo $row['time_from'] ?></td>
                      <td><?php echo $row['time_to'] ?></td>
                      <td><?php echo $row3['username'] ?></td>
                      
                 
                 
                 
                </tr>
                 
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Dance</h2></a>
                            
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-all-checkbox1" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
       
         <th>Sl.No</th>
         <th>Booking ID</th>
         <th>Booked By</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
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
              $query  = "select * from booking WHERE classtype='Dance' and approved ='yes'";
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
                           $query4="select userid,username from users";
                           $result4=mysqli_query($con,$query4);
                           
                     
                     
                           if($result2){
                               $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                               if($result3){
                                   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                   if($result4){
                                     $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                   
                               ?>
                   
                 
                   
                   <tr>
                   
                     <td><?php echo $sno ?></td>
                     <td><?php echo$row ['bookingid']; ?></td>
                     <td><?php echo$row4 ['username']; ?></td>
                      <td><?php echo$row ['classid']; ?></td>
                      <td><?php echo $row['className'] ?></td>
                      <td width='380'><?php echo $row['description'] ?></td>
                      <td><?php echo $row2['studioName'] ?></td>
                      <td><?php echo$row ['dow']; ?></td>
                      <td><?php echo $row['date_from'] ?></td>
                      <td><?php echo $row['date_to'] ?></td>
                      <td><?php echo $row['time_from'] ?></td>
                      <td><?php echo $row['time_to'] ?></td>
                      <td><?php echo $row3['username'] ?></td>
                      
                 
                 
                 
                </tr>
                 
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Mind and Body</h2></a>
                            
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-bordered2" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
         <th>Booking ID</th>
         <th>Booked By</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
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
              $query  = "select * from booking WHERE classtype='Mind and Body' and approved ='yes'";
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
                           $query4="select userid,username from users";
                           $result4=mysqli_query($con,$query4);
                           
                     
                     
                           if($result2){
                               $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                               if($result3){
                                   $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                   if($result4){
                                     $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                   
                               ?>
                   
                 
                   
                   <tr>
                   
                     <td><?php echo $sno ?></td>
                     <td><?php echo$row ['bookingid']; ?></td>
                     <td><?php echo$row4 ['username']; ?></td>
                      <td><?php echo$row ['classid']; ?></td>
                      <td><?php echo $row['className'] ?></td>
                      <td width='380'><?php echo $row['description'] ?></td>
                      <td><?php echo $row2['studioName'] ?></td>
                      <td><?php echo$row ['dow']; ?></td>
                      <td><?php echo $row['date_from'] ?></td>
                      <td><?php echo $row['date_to'] ?></td>
                      <td><?php echo $row['time_from'] ?></td>
                      <td><?php echo $row['time_to'] ?></td>
                      <td><?php echo $row3['username'] ?></td>
                      
                 
                 
                 
                </tr>
                 
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Cycling</h2></a>
                            
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-bordered3" class="table table-bordered table-striped">
                                    
                                        <thead>
                                        <?php
          $query  = "select machineid from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

              }
            }
                ?>
        <tr>
        
         <th>Sl.No</th>
         <th>Booking ID</th>
         <th>Booked By</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
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
              $query  = "select * from booking WHERE classtype='Cycling' and approved ='yes'";
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
                            $query4="select userid,username from users";
                            $result4=mysqli_query($con,$query4);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                   
                      <td><?php echo $sno ?></td>
                      <td><?php echo$row ['bookingid']; ?></td>
                      <td><?php echo$row4 ['username']; ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 </tr>
                  
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
  $('#dt-all-checkboxfirst').dataTable({

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


