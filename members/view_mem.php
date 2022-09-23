<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.min.css" />
  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Members</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Members</li>
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
                            
                            <a href="new_entry.php"><button class="btn btn-primary">Add Member</button></a>
                            <div class="col-md-16">
                        <div class="card bg-primary p-10">
                            <div class="media widget-ten">
                                <div class="media-left meida media-right">
                                </div>
                                <div class="media-body media-text-right">
                                
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from users";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a><h2 class="color-white">Total Members</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                         
                                <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_mem.php" method="POST">
                                
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    <button type="submit" id="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                                    
                                        <thead>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
        <th style="width:2%;">Sl.No</th>
        <th style="width:2%;">Package</th>
          <th style="width:2%;">Membership Expiry</th>
          <th style="width:5%;">Image</th>
          <th style="width:3%;">Member ID</th>
          <th style="width:5%;">First Name</th>
          <th style="width:5%;">Last Name</th>
          <th style="width:5%;">Username</th>
          <th style="width:3%;">Contact</th>
          <th style="width:5%;">E-Mail</th>
          <th style="width:1%;">Gender</th>
          <th style="width:2%;">Joining Date</th>
          <th style="width:2%;">Status</th>
          <th style="width:2%;">Action</th>
        </tr>
      </thead>    
      
        <tbody>
          <?php
              $query  = "select * from users where userid = '".$_SESSION["userid"]."'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              $uid   = $row['userid'];
              $uname;
                      $udob;
                      $ujoing;
                      $ugender;
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $uid  = $row['userid'];
                      $query1  = "select * from enrolls_to WHERE uid='$uid'";
                      $result1 = mysqli_query($con, $query1);
                      
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            $pid=$row1['pid'];
                            $query2="select * from plan where pid='$pid'";
                            $result2=mysqli_query($con,$query2);
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);?>


                          
                            
                                
                            
                            
                    
                <?php
                  $uname=$row['username'];
                          $udob=$row['dob'];
                          $ujoing=$row['joining_date'];
                          $ugender=$row['gender'];
                          $planid=$row2['pid'];
                          
                   ?>
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="mem_delete_id[]" value="<?= $row['userid']; ?>">
                    <td><?php echo $sno; ?></td>
                    <td><?php echo $row2['planName']; ?></td>
                     <td><?php echo $row1['expire']; ?></td>
                     <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><h4><?php echo $row['userid']; ?></h4></td>
                     <td><h4><?php echo $row['fname']; ?></h4></td>
                     <td><h4><?php echo $row['lname']; ?></h4></td>
                     <td><h4><?php echo$row['username']; ?></h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       <td><?php
                        if($row['status']=='1'){
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=0" class="btn blue-gradient waves-effect waves-light">Enabled</a></p>';
                        } else{
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=1" class="btn purple-gradient waves-effect waves-light">Disabled</a></p>';
                        }  ?> </td>

                       <!--<td><button type="button" class="btn btn-s btn-success">Active</button> </td> -->

                       
                       
                    
                  
                                    </form>
                 <td>
                    <!-- Split button -->
                    <div class="dropdown dropdown-animating">

<!--Trigger-->
<button class="btn btn-danger dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
  
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="read_member.php?id=<?php echo $row['userid'];?>">Info</a>
    <a class="dropdown-item" href="edit_member.php?id=<?php echo $row['userid'];?>">Edit Member</a>
    
    
  </div>
</div>

<!--<a href="read_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-folder-open"></i></button></a>-->
                  <!--<a href="edit_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>-->
                  
                 
                  <form id="form2" action='make_payments.php' method='post'><input type='hidden' name='userID' value='<?php echo $uid; ?>'/>
                          <input type='hidden' name='planID' value='<?php echo $planid; ?>'/><input type='submit'  value='Payment ' class="btn btn-primary btn-s m-b-30 m-t-30"/></form>

                          <form id="form3" action='health_status_entry.php' method='post'><input type='hidden' name='uid' value='<?php echo $uid;?>'/>
                  <input type='hidden' name='uname' value='<?php echo $uname;?>'/>
                              <input type='hidden' name='udob' value='<?php echo $udob;?>'/>
                      
                              <input type='hidden' name='ujoin' value='<?php echo $ujoing;?>'/>
                              <input type='hidden' name='ugender' value='<?php echo $ugender ?>'/>
                 <!--  <a href="health_status_entry.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ></button></a> -->
                  <input type='submit' id='button1' value='Health Status' class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>
                 

                  
                  <a href="del_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-danger"onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  







                 
                                    
                  


                  
              <?php 
              $sno++; 
              $msgid = 0;
              $memid = 0;
                       
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.js"></script>
                        
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('../constant/layout/footer.php');?>

