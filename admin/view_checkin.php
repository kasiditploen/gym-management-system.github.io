<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Checkin/CheckOut</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Checkin/CheckOut</li>
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
$dayOfWeek = date("l d M", $unixTimestamp);

?>
            <div class="container-fluid">

            <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Today's Checkin/Checkout</h2></a>
                            <h1><span class="badge badge-info"><?php echo ("$dayOfWeek");?></span></h1></a>
                            
                            <hr class="hr hr-blurry" />
                         
                                <div class="table-responsive m-t-40">
                                <h2 >Quick Member Search</h2>
  <p>Type something in the input field to search for members:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search Member..">
  <table id="myTable" class="table">
                                    
                                        <thead>
                                        <?php
          $query  = "select * from users";
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
         <th style="width:5%;">Image</th>
          <th>User ID</th>
          <th>Username</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Checkin</th>
          <th>Checkout</th>
          <th>Action</th>
        </tr>

        
              <!-- WHERE dow LIKE '%Monday%' "use to spcify Monday" -->
               <!-- and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
        //$query  = "select * from classes where dow ='".$dayOfWeek."'";
        $cdate=date("Y M");

              $query  = "select * from users";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              
              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['userid'];

                  $query2="select * from checkin where userid='$uid' and  created_date LIKE '$cdate%'";
                            $result2=mysqli_query($con,$query2);
                            $query3="select * from checkout where userid='$uid' and  created_date LIKE '$cdate%'";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $create_date=$row2 ['created_date'];
                                $create_time=$row2 ['created_time'];
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                      <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;">';?></td>
                       <td><?php echo$row ['userid']; ?></td>
                       <td><?php echo $row['username'] ?></td>
                       <td><?php echo $row['fname'] ?></td>
                       <td><?php echo$row ['lname']; ?></td>
                       <td><h3><span class="badge badge-success"><?php echo $create_date;?> @ <?php echo  $create_time; ?></span></h3></td>
                       <td><h3><span class="badge badge-dark"><?php echo$row3 ['created_date'];?> @<?php echo$row3 ['created_time']; ?></span></h3></td>
                       
                       
                       
                  
                  
                  
                 <td>
                  
                  <a href="submit_new_checkin.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" >Check In</button></a>
                  <a href="submit_new_checkout.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-danger" >Check Out</button></a>
                 
                  </td></tr>
                  
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
                <!-- Start Page Content -->
                
                <!-- /# row -->

                <?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $d=strtotime('- 1 day');
        $cdate=date("Y-m-d");
        $cdate2=date("l d M",$d);

        $unixTimestamp = strtotime($cdate);
        $unixTimestamp2 = strtotime($cdate2);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l d M", $unixTimestamp);
$dayOfPast = date("l d M", $unixTimestamp2);

?>
            <div class="container-fluid">

            <div class="card">
                            <div class="card-body">
                            <h2 class="color-black">Yesterday's Checkin/Checkout</h2></a>
                            <h1><span class="badge badge-info"><?php echo ("$dayOfPast");?></span></h1></a>
                            
                            <hr class="hr hr-blurry" />
                         
                                <div class="table-responsive m-t-40">
                                <h2 >Quick Member Search</h2>
  <p>Type something in the input field to search for members:</p>  
  <input class="form-control" id="myInput2" type="text" placeholder="Search Member..">
  <table id="dt-all-checkbox5" class="table">
                                    
                                        <thead>
                                        <?php
          $query  = "select * from users";
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
         <th style="width:5%;">Image</th>
          <th>User ID</th>
          <th>Username</th>
          <th>First name</th>
          <th>Last name</th>
          <th>Checkin</th>
          <th>Checkout</th>
          <th>Action</th>
        </tr>

        
              <!-- WHERE dow LIKE '%Monday%' "use to spcify Monday" -->
               <!-- and dow LIKE '%Monday%' "use to spcify Monday" -->
              
      </thead>    

      
        <tbody>
        <?php
        //$query  = "select * from classes where dow ='".$dayOfWeek."'";
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $d2) ) ));
        $cdate=date("Y-m-d");
        $cdate2=date("l d M",$d2);

        $unixTimestamp = strtotime($cdate);
        $unixTimestamp2 = strtotime($cdate2);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l d M", $unixTimestamp);
$dayOfPast = date("l d M", $unixTimestamp2);

              $query  = "select * from users";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              
              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['userid'];

                  $query2="select * from checkin where userid='$uid' and  created_date LIKE '$dayOfPast%'";
                            $result2=mysqli_query($con,$query2);
                            $query3="select * from checkout where userid='$uid'and  created_date LIKE '$dayOfPast%'";
                            $result3=mysqli_query($con,$query3);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $create_date=$row2 ['created_date'];
                                $create_time=$row2 ['created_time'];
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                      <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;">';?></td>
                       <td><?php echo$row ['userid']; ?></td>
                       <td><?php echo $row['username'] ?></td>
                       <td><?php echo $row['fname'] ?></td>
                       <td><?php echo$row ['lname']; ?></td>
                       <td><h3><span class="badge badge-success"><?php echo $create_date;?> @ <?php echo  $create_time; ?></span></h3></td>
                       <td><h3><span class="badge badge-dark"><?php echo$row3 ['created_date'];?> @<?php echo$row3 ['created_time']; ?></span></h3></td>
                       
                       
                       
                  
                  
                  
                 <td>
                  
                  <a href="submit_new_checkin.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" >Check In</button></a>
                  <a href="submit_new_checkout.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-danger" >Check Out</button></a>
                 
                  </td></tr>
                  
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
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
    
    $(document).ready(function () {
  $('#dt-all-checkbox5').dataTable({

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
  $('#dt-bordered1').dataTable({

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
  width: 90%;
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


