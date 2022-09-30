<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>

<?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date("Y-m-d");

        $unixTimestamp = strtotime($cdate);
        $unixTimestamptom = strtotime('Tomorrow');

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);
$tomorrow = date("l", $unixTimestamptom);



?>

  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Check Group Classes (Sessions)</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Check Group Classes (Sessions)</li>
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
                            <h2 class="color-black">Tomorrow (<?php echo $tomorrow ?>)</h2></a>
                            
                         
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

        
              <!--  and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
      <tbody>

      


      <?php
      $id     = $_GET['id'];;
              $query  = "select * from classes WHERE classid = '$id' and dow LIKE '%$tomorrow%'";
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
                  $uid   = $row['classid'];

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
                    
                  
                    
                    <tr>
                    
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
                       <td><?php echo $row3['username'] ?></td>
                       
                  
                  
                  
                 <td>
                
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

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">SPECIFIC DATE</h2></a>
                            
                            <?php ?>

                         
                                <div class="table-responsive m-t-40">
                                
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    <form action="" method="GET">
                            <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" value="<?php if(isset($_GET['date'])){
                                          $datebe = $_GET['date'];
                                          date_default_timezone_set("Asia/Bangkok"); 
                                          $day=date("Y-m-d");
                                          $cdate=date("Y-m-d");
                                  
                                          $unixTimestamp = strtotime($cdate);
                                          $unixTimestamptom = strtotime('Tomorrow');
                                          $datebeformed = strtotime($datebe);
                                  
                                  //Get the day of the week using PHP's date function.
                                  $dayOfWeek = date("l", $unixTimestamp);
                                  $tomorrow = date("l", $unixTimestamptom);
                                  $dateform = date("l", $datebeformed);
                                          
                                          echo $dateform; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label></label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                                </div>
            </form>
                                        

                                        <?php 
                                 $query  = "select * from users where userid='$uid'";
                                 $result = mysqli_query($con, $query);
                                 if($result){
                                   $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                   
                                   
                                 }
                                   ?>

<?php 
                                 $query2  = "select * from users where userid='$uid'";
                                 $result2 = mysqli_query($con, $query2);
                                 if($result2){
                                   $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                   $uid2=$row2['userid'];
                                 }
                                   ?>


                            <?php 
                                 $query0  = "select * from attendance where userid = '$uid2'";
                                 $result0 = mysqli_query($con, $query0);
                                 while($rowme=mysqli_fetch_array($result0)){
                                   $attendanceid=$rowme['attendancenid'];
                                   //$usernamein=$rowme['username'];
                                 }
                                   ?>

<?php 
                                 $query3  = "select * from privateclasses where userid = '$uid2'";
                                 $result3 = mysqli_query($con, $query3);
                                 while($row3=mysqli_fetch_array($result3)){
                                   $privateclassid=$row3['privateclassid'];
                                   //$usernamein=$rowme['username'];
                                 }
                                   ?>
                            
                            

                                 

                                   <?php
                                   
                                   $clauses=array();

                                   

                                   if( isset( $datebe ) && !empty( $datebe ) ){
                                    $clauses[] = "`dow` LIKE '{%$dateform%}'";   
                                }

                                

      
      
      
                                   // $from_date = $_GET['from_date'];
                                    //$to_date = $_GET['to_date'];
                                    $sno    = 1;
                                    $where = !empty( $clauses ) ? ' where '.implode(' and ',$clauses ) : '';
                                    $query = "SELECT * FROM classes" . $where;
                                    //$query_run = mysqli_query($con, $query);
                                    
                                    if(isset($query)){

                                      $result = mysqli_query($con, $query);
                                      while($row=mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                            <td><?php echo $sno; ?></td>
                                            <td><?= $row['className']; ?></td>
                                            <td><?= $row['classid']; ?></td>
                                            <td><?= $row['fname']; ?></td>
                                            <td><?= $row['lname']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                                <td><?= $row['created_date']; ?></td>
                                                <td><?= $row['created_time']; ?></td>
                                                <td><?= $row['present']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        
                                    }
                                  
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                              
                            ?>
                            <?php 
              $sno++; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

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


