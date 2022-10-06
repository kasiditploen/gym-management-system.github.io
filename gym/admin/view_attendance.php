<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Check Attendance</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Check Attendance</li>
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
<?php 
                                 $query  = "select * from users ORDER BY joining_date";
                                 $result = mysqli_query($con, $query);
                                 if($result){
                                   $row1=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                   $uid=$row1['userid'];
                                   
                                 }
                                   ?>
            <div class="container-fluid print-container">

            <div class="card">
                            <div class="card-body">
                            <form action="" method="GET">
                            <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nickname</label>
                                        <input type="text" name="name" value="<?php if(isset($_GET['name']))?>" class="form-control">
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Private Class Name</label>
                                                <div class="col-sm-9">
                                               <select name="classname" id="classname"   class="form-control">
                    <option value="">ALL</option>
                    <?php
                        $query="select privateclassid,className from privateclasses";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                                
                            }
                        }

                    ?>
                    <?php if(isset($_GET['classname'])){ echo $_GET['classname']; } ?>
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div>
                                            </div>
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
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                        <div class="table-responsive m-t-40">
                          
                        <table id="myTable" class="table table-bordered table-striped">
                        <button class="btn btn-danger col-sm-2 sm-0" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                            <thead>
                                <tr>
                                
                                    <th>Class Name</th>
                                    <th>Member ID</th>
                                    <th>Image</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Attendance Date</th>
                                    <th>Presence</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                              

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
                                   $attendanceid=$rowme['attendanceid'];
                                   $uid3=$rowme['userid'];
                                   //$usernamein=$rowme['username'];
                                 }
                                   ?>

<?php 
                                 $query3  = "select * from privateclasses where userid = '$uid3'";
                                 $result3 = mysqli_query($con, $query3);
                                 while($row3=mysqli_fetch_array($result3)){
                                   $privateclassid=$row3['privateclassid'];
                                   //$usernamein=$rowme['username'];
                                 }
                                   ?>
                            
                            

                                

                                   <?php
                                   
                                   $clauses=array();

                                   

                                   if( isset( $_GET['name'] ) && !empty( $_GET['name'] ) ){
                                    $clauses[] = "`username` = '{$_GET['name']}'";   
                                }

                                if(isset($_GET['from_date'],$_GET['to_date']) && !empty( $_GET['from_date'] )  && !empty( $_GET['to_date'] ) )
                                {
                                  $clauses[]=" `created_date` >= '{$_GET['from_date']}'";
                                  $clauses[]=" `created_date` <= '{$_GET['to_date']}'";
      }

      if( isset( $_GET['classname'] ) && !empty( $_GET['classname'] ) ){
        $clauses[] = "`privateclassid` = '{$_GET['classname']}'";   
    }

      
      
      
                                   // $from_date = $_GET['from_date'];
                                    //$to_date = $_GET['to_date'];
                                    $sno    = 1;
                                    $where = !empty( $clauses ) ? ' and '.implode(' and ',$clauses ) : '';
                                    $query = "SELECT * FROM users u 
                                    LEFT OUTER JOIN attendance a ON u.userid=a.userid
                                    LEFT OUTER JOIN  privateclasses p ON u.userid=p.userid where  a.type='pt' " . $where;
                                    //$query_run = mysqli_query($con, $query);
                                    
                                    if(isset($query)){

                                      $result = mysqli_query($con, $query);
                                      while($row=mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                            
                                            <td><?= $row['className']; ?></td>
                                            <td><?= $row['userid']; ?></td>
                                            <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?><p>
                                            <td><?= $row['fname']; ?></td>
                                            <td><?= $row['lname']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                                <td><?= $row['created_date']; ?></td>
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
    </div>
                <!-- Start Page Content -->
                
                <!-- /# row -->
             

                        

                        

                        

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
<script>
  $("#classname").select2({
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

<script>
  $("#Classname").select2({
});
    </script>

<style>


@media print {
  body * {
    visibility: hidden;
  }

  .print-container, .print-container * {
    visibility: visible;
  }

  .print-container {
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
  }
  
}
</style>
<?php include('../constant/layout/footer.php');?>


