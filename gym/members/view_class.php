<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_member.php');?>

<?php include('../constant/layout/sidebar.php');?>  
?>



  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Group Classes</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Group Classes</li>
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
                              
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
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
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes ORDER BY className DESC";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              $userid;
              $username;
              $classid;
              $name;
                      $desc;
                      $studioid;
                      $type;
                      $dow;
                      $df;
                      $dt;
                      $tf;
                      $tt;
                      $trainerid;
                      $session;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $classid   = $row['classid'];
                  

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users where userid = '".$_SESSION["userid"]."'";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    $trainername;
                                    $studioname;
                                    if($result4){
                                        $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                        $userid   = $row4['userid'];
                                        $username   = $row4['username'];
                                        if($result5){
                                            $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                            $session   = $row5['session'];
                                            
                                              
                                ?>

<?php
                  $classid=$row['classid'];
                  $userid=$row4['userid'];
                  $session=$row4['session'];
                  $username=$row4['username'];
                  $name=$row['className'];
                          $desc=$row['description'];
                          $studioid=$row2['studioid'];
                          $type=$row['classtype'];
                          $dow=$row['dow'];
                          $df=$row['date_from'];
                          $dt=$row['date_to'];
                          $tf=$row['time_from'];
                          $tt=$row['time_to'];
                          $trainerid=$row['trainerid'];
                          $studioname=$row2['studioName'];
                          $trainername=$row3['trainerName'];
                          
                   ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row4['username'] ?></td>
                       
                  
                  
                  
                 <td>

                 
              
                  
                 <form id="form3" action='confirm_booking.php' method='post'><input type='hidden' name='classid' value='<?php echo $classid;?>'/>
                  
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
                              
                 
                              <!--  <a href="health_status_entry.php?id=<?php echo $row4['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ></button></a> -->
                  <input type='submit' id='button1' value='Book' class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>
                 
                  </td></tr>
                  
              <?php 
              $sno++; 
              $msgid = 0;
                          }
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


