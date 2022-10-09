<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>

<?php include('../constant/layout/sidebar_trainer.php');?> 
?>

<?php
      $id     = $_GET['id'];;
      $query  = "select * from booking where classid='$id'";
      $result = mysqli_query($con, $query);
      
      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $classname = $row['className'];
              $uid=$row['userid'];
              $trainerid=$row['trainerid'];
              
              $query1  = "select * from users";
      $result1 = mysqli_query($con, $query1);
      if($result1){
        $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
        
        $query2  = "select * from bookingread WHERE classid='$id' and userid='$uid'";
        $result2 = mysqli_query($con, $query2);
  
          if($result2){
            $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
            
              
            }
          }
      }
    }
  
      ?>

 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> CHECK "<?php echo $classname ?>" CLASS ATTENDANCE</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Trainer</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date("Y-m-d");

        $unixTimestamp = strtotime($cdate);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);

?>
            <div class="container-fluid">

            <div class="card">
            
                            <div class="card-body">
                            <div><button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b></div>
                
                            
                            <h2 class="color-black"><?php echo $classname ."'s Class Attendance" ?></h2></a>
                            
                      
                         
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
         <th>Photo</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>User ID</th>
          <th>Username</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Presence</th>
          <th>Attendance</th>
          
        </tr>

        
              <!-- WHERE dow LIKE '%Monday%' "use to spcify Monday" -->
               <!-- and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
      $id     = $_GET['id'];;
      $query  = "select * from booking where classid='$id' ";
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $classname = $row['className'];
            $name = $row['username'];
              $trainerid=$row['trainerid'];
              
              $query1  = "select * from users ORDER BY userid  ";
      $result1 = mysqli_query($con, $query1);
      if($result1){
        $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
        $uid=$row['userid'];
        $username=$row['username'];
          $uid=$row['userid'];
          $image=$row1['image'];
          

        $query2  = "select * from bookingread";
        $result2 = mysqli_query($con, $query2);
  
          if($result2){
            $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
            $query3  = "select * from users where userid='$uid'";
        $result3 = mysqli_query($con, $query3);

        if($result3){
          $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
          
          $username=$row3['username'];
          $uid=$row3['userid'];
          $image=$row3['image'];
          $fname=$row3['fname'];
          $lnane=$row3['lnane'];
          $querysp  = "select * from plan";
          $resultsp = mysqli_query($con, $querysp);
          
            
            if($resultsp){
              $rowsp=mysqli_fetch_array($resultsp,MYSQLI_ASSOC);
              $pid=$row['pid'];
              $query4  = "select * from csessions WHERE userid='$uid'";
              $result4 = mysqli_query($con, $query4);
            if($result4){
              $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
              $amount=$row4['amount'];
              

              $query5  = "select * from classes WHERE classid='$id'";
            $result5 = mysqli_query($con, $query5);
            if($result5){
              $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
              $session=$row4['session'];
              $query6  = "select * from attendance WHERE userid='$uid'";
            $result6 = mysqli_query($con, $query6);
            if($result6){
              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
              $present=$row6['present'];
      ?>
                    
                  
                    
                    <tr>
                    
                      <td><?php echo $sno ?></td>
                      <td><?php  echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width: 80px; height: 80px;" >'; ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td><?php echo $row['userid'] ?></td>
                       <td><?php echo $row['username'] ?></td>
                       <td><?php echo $row3['fname'] ?></td>
                       <td><?php echo $row3['lname'] ?></td>
                       <td><?php
                       if($present="present"){
                        echo 'Present';
                       }else if($present="absent"){
                        echo 'Absent';
                      
                      }else if($present="unknown" || ""){
                        echo 'Not Checked';
                      }else{
                        echo 'Not Checked';
                      }
                        
                        ?></td>
                       
                       
                       
                  
                  
                  
                 <td>
                 <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_attendance.php?id=<?php echo $uid;?>" id="form4" name="form4">
                            <button type="submit" name="submit" id="submit" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit Attendance</button>
                 
                 <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Status</label>
                                                <div class="col-sm-9">
                                                <select class="form-control" id="present" name="present">
                                               <option value="present">Present</option>
                                               <option value="absent">Absent</option>
                                               <option value="unknown">Unknown</option>
                                              
    </select>
					</div>
          <input type="hidden" name="amount" id="amount" value='<?php echo $row4['amount'];?>'>
          <input type="hidden" name="session" id="session" value='<?php echo $row4['session'];?>'>

                    </div>
                    </form>

                 
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
                        <input type='hidden' name='classid' value='<?php echo $id;?>'/>
                        <input type='hidden' name='className' value='<?php echo $name;?>'/>
                        <input type='hidden' name='userid' value='<?php echo $uid?>'/>
                        <input type='hidden' name='username' value='<?php echo $username?>'/>

                <!-- Start Page Content -->
                
                <!-- /# row -->
                 
                 

                        

                        

                        

                        

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
$(document).ready(function(){
    $("#form2 #select-all2").click(function(){
        $("#form2 input[type='checkbox']").prop('checked',this.checked);
    });
});
    
</script>

<script>
$(document).ready(function(){
    $("#form3 #select-all3").click(function(){
        $("#form3 input[type='checkbox']").prop('checked',this.checked);
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
     
<div class="tab-content ">
        <div class="tab-pane fade in show active" id="docsTabsOverview" role="tabpanel">
          <div class="row">
            
            <div class=" col-lg-10  col-md-12">
              <section class="documentation">
                
<style>
  .trigger {
    padding: 1px 10px;
    font-size: 12px;
    font-weight: 400;
    border-radius: 10px;
    background-color: #eee;
    color: #212121;
    display: inline-block;
    margin: 2px 5px;
  }

  .hoverable,
  .trigger {
    transition: box-shadow 0.55s;
    box-shadow: 0;
  }

  .hoverable:hover,
  .trigger:hover {
    transition: box-shadow 0.45s;
    box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .chip.chip-md {
    height: 42px;
    line-height: 42px;
    border-radius: 21px;
  }

  .chip.chip-md img {
    height: 42px;
    width: 42px;
  }

  .chip.chip-md .close {
    height: 42px;
    line-height: 42px;
    border-radius: 21px;
  }

  .chip.chip-lg {
    height: 52px;
    line-height: 52px;
    border-radius: 26px;
  }

  .chip.chip-lg .close {
    height: 52px;
    line-height: 52px;
    border-radius: 26px;
  }

  .chip.chip-lg img {
    height: 52px;
    width: 52px;
  }

  .table a {
    margin-right: auto !important;
  }

  .chips-autocomplete .chips {
    padding-bottom: unset
  }

  .chips-autocomplete .chip-span {
    position: relative;
    left: -15px;
  }

  .chips-autocomplete .chip-ul {
    position: absolute;
    z-index: 100;
    right: 0;
    width: 140px;
    background: #fff;
    list-style-type: none;
    overflow-y: auto;
    max-height: 210px;
    padding-left: 0;
  }

  .chips-autocomplete .chip-ul li {
    padding: 12px 15px;
    cursor: pointer;
    font-size: .875rem;
  }

  .chips-autocomplete .chip-ul li:hover {
    background: #eee;
  }
</style>
<script>
$('.toast').toast('show');
</script>

<script>
        $(document).ready(function() {
    $("#attendance").select2();
    
});
    </script>

<style>
  
.img-responsive,
.carousel.vertical .carousel-inner > .item > img,
.carousel.vertical .carousel-inner > .item > a > img {
  width: 20%;
  height: auto;
  display: inline-block;
}.img-responsive1,
.carousel.vertical .carousel-inner > .item > img,
.carousel.vertical .carousel-inner > .item > a > img {
  width: 100%;
  height: auto;
  display: inline-block;
}.avatars {
  display: inline-flex;
  flex-direction: row-reverse;
}

.avatar {
  position: relative;
  border: 4px solid #fff;
  border-radius: 50%;
  overflow: hidden;
  width: 100px;
}

.avatar:not(:last-child) {
  margin-left: -60px;
}

.avatar img {
  width: 100%;
  display: block;
}
  </style>
<?php include('../constant/layout/footer.php');?>


