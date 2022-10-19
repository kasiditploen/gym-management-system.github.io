<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_member.php');?>
<?php include('../constant/layout/sidebar_member.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript"> </script>


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
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black5.jpg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>Class Reservation</b></h1>
</div>
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                            <h2 class="color-black mb-3 h1"><b>Tomorrow</b> <h3 class="color-black mb-3 h3"><b>(<?php  echo  $tomorrow ?>)</b></h3></h2></a>
                            
                         
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
          <th>Enrolled</th>
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
                  $classcap = $row['classcap'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4  = "select * from users";
              $result4 = mysqli_query($con, $query4);
              $query5  = "select * from classes";
              $result5 = mysqli_query($con, $query5);
              /////////////////////////////////////////////////////////////////////////////////////////////////
              $query6="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$classid' and userid ='$userid'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result8=mysqli_query($con,$query8);
              
                      
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
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              $count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                $bookingid = $row7['bookingid'];
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
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
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                  
                  
                  
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
                 
              
                  <?php
                  if($count >= $classcap) {
                    echo '<p><a class="btn btn-sm btn-danger">FULL</a></p>';
                    
                  } else {
                    echo '<form id="form3" action="confirm_booking.php" method=post><input type=hidden name=classid value='.$classid.'/>
                  
                    <input type="hidden" name="classid" value='.$classid.'/>
                    <input type="hidden" name="className" value=' .$name.'/>
                    <input type="hidden" name="description" value='.$desc.'/>
                    <input type="hidden" name="studios" value='.$studioid.'/>
                    <input type="hidden" name="classtype" value='.$type.'/>
                    <input type="hidden" name="dow" value='.$dow.'/>
                    <input type="hidden" name="date_from" value='.$df.'/>
                    <input type="hidden" name="date_to" value='.$dt.'/>
                    <input type="hidden" name="time_from" value='.$tf.'/>
                    <input type="hidden" name="time_to" value='.$tt.'/>
                    <input type="hidden" name="trainerid" value='.$trainerid.'/>
                    <input type="hidden" name="trainerName" value='.$trainername.'/>
                    <input type="hidden" name="userid" value='.$userid.'/>
                    <input type="hidden" name="username" value='.$username.'/>
                    <input type="hidden" name="session" value='.$session.'/>
                    <input type="hidden" name="classcap" value='.$classcap.'/>
                    
       
                    
        <input type="submit" id="button1" value="Book" class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>';
                  }
                 
                 ?>
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
                            <h2 class="color-black">Specific Date</h2></a>
                            <form id="form4" action='confirm_bookingdate.php' method='post'><input type='hidden' name='classid' value='<?php echo $classid;?>'/>
                            <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Apply Specific Date</label>
                                                <div class="col-sm-9">
                                                <input name="sdate" id="sdate" class="form-control" placeholder="DATE!!!!" required/>
                                                </div>
                                            </div>
                                        </div>
                            
                         
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
              $query  = "select * from classes WHERE classid = '$id' ";
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


                        <?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date("Y-m-d");

        $unixTimestamp = strtotime($cdate);
        $unixTimestamptom = strtotime('Tomorrow');

//Get the day of the week using PHP's date function.
$dayOfWeek2 = date("w", $unixTimestamp);

$doww = explode (",", $dow);

echo $dow;


?>
                 

                        

                        


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




<script>

    


     
       
         
         

         

var dateToday = new Date(); 
         var js_array = <?php echo json_encode($dow); ?>;
         
         let sunday = js_array.includes("Sunday");
let monday = js_array.includes("Monday");
let tuesday = js_array.includes("Tuesday");
let wednesday = js_array.includes("Wednesday");
let thursday = js_array.includes("Thursday");
let friday = js_array.includes("Friday");
let saturday = js_array.includes("Saturday");
         
         if (sunday === true) {
  var sun ;
  
  
}else if (sunday === false){
  sun = [0];
}
     
     if (monday === true) {
  var mon ;
  
}else if (monday === false){
  mon = [1];
}
     
     if (tuesday === true) {
  var tues ;
  
}else if (tuesday === false){
  tues = [2];
}
     
     if (wednesday === true) {
  var wed ;
  
}else if (wednesday === false){
  wed = [3];
}
     
     if (thursday === true) {
  var thu ;
  
}else if (thursday === false){
  thu = [4];
}
     
     if (friday === true) {
  var fri ;
  
}else if (friday === false){
  fri = [5];
}
     
     if (saturday === true) {
  var sat ;
  
}else if (saturday === false){
  sat = [6];
}

const arrayna =  ['0', '1', '2', '3', '4', '5', '6'];
const arrayuse =  [sun,mon, tues, wed, thu, fri, sat];
     
     


console.log(js_array);
     console.log(sunday);
     console.log(sun);
     console.log(monday);
     console.log(mon);
     console.log(tuesday);
     console.log(tues);
     console.log(wednesday);
     console.log(wed);
     console.log(thursday);
     console.log(thu);
     console.log(friday);
     console.log(fri);
     console.log(saturday); 
     console.log(sat); 
  
     
     
         $('#sdate').datepicker({
          defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
           format: "yyyy-mm-dd",
           daysOfWeekDisabled: arrayuse,
           daysOfWeekHighlighted: arrayuse,
           numberOfMonths: 3,
        showButtonPanel: true,
        startDate: new Date(),
           
         });

        
        
     
</script>





  
  
  

</script>




    
           

<?php include('../constant/layout/footer.php');?>


