<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?>   


 
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Dashboard</h3> </div>
                <div class="col-md-12 align-self-center">
                    <marquee direction="left" behavior="alternate" scrollamount=1 >
   <h3 style="color:red"><b></b></h3>
</marquee></div>
                
            </div>
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <div class="card">
                <div class="col-md-3 align-self-left">
                    <h1 class="text-primary"><b>Quick Manage Members</b></h1> </div>
                    
                    <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_mem.php" method="POST">
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <button type="submit" id="submit" name="stud_delete_multiple_btn" class="btn btn-danger">Delete All Rows</button>
                                    </form>
                                        <thead>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
        <th style="width:2%;">Sl.No</th>
        <th style="width:2%;">Package</th>
          <th style="width:2%;">Membership Expiry</th>
          <th style="width:5%;">Image</th>
          <th style="width:3%;">Member ID</th>
          <th style="width:5%;">Name</th>
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
              $query  = "select * from users ORDER BY joining_date";
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
                          <input type='hidden' name='planID' value='<?php echo $planid; ?>'/><input type='submit'  value='Payment ' class="btn btn-primary btn-s m-b-30 m-t-30"/>
                          </form>

                          <form id="form3" action='health_status_entry.php' method='post'><input type='hidden' name='uid' value='<?php echo $uid;?>'/>
                  <input type='hidden' name='uname' value='<?php echo $uname;?>'/>
                              <input type='hidden' name='udob' value='<?php echo $udob;?>'/>
                      
                              <input type='hidden' name='ujoin' value='<?php echo $ujoing;?>'/>
                              <input type='hidden' name='ugender' value='<?php echo $ugender ?>'/>
                 <!--  <a href="health_status_entry.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ></button></a> -->
                  <input type='submit' id='button1' value='Health Status' class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>
                 

                  
                  <a href="del_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-danger"onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  <div class="modal-dialog modal-frame modal-bottom" role="document">







                 
                                    
                  


                  
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
                      <div class="row">
                        

                        </div>
                       
                     
            <!-- End Container fluid  -->

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <div class="card">
                <div class="col-md-3 align-self-left">
                    <h1 class="text-primary">Widgets</h1> </div>

                      <div class="row">
                    <div class="col-md-3">
                        <div class="card view view-cascade gradient-card-header peach-gradient p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                  <?php
                            date_default_timezone_set("Asia/Bangkok"); 
                            $date  = date('m-Y');
                            $query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $revenue = 0;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $query1="select * from plan where pid='".$row['pid']."'";
                                    $result1=mysqli_query($con,$query1);
                                    if($result1){
                                        $value=mysqli_fetch_row($result1);
                                    $revenue = $value[4] + $revenue;
                                    }
                                }
                            }
                           
                            ?>
                            
                                    <h2 class="color-white"><?php echo $revenue."฿"; ?></h2>
                                    <a href="revenue_month.php"> <h2 class="color-white">Current Income</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card ripe-malinka-gradient color-block mb-3 mx-auto p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-id-badge f-s-40"></i></span>
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
                                     <a href="table_view.php"><h2 class="color-white">Total Members</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card morpheus-den-gradient color-block mb-3 mx-auto p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-user f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    

                            <h2 class="color-white"><?php
                            date_default_timezone_set("Asia/Bangkok"); 
                            $date  = date('Y-m');
                            $query = "select COUNT(*) from users WHERE joining_date LIKE '$date%'";

                            //echo $query;
                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                    <a href="over_members_month.php"><h2 class="color-white">Members Joined This Month</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card dusty-grass-gradient color-block mb-3 mx-auto p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-star f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                 
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from trainers";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a href="trainer.php"><h2 class="color-white">Total Trainers</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-dark p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cogs f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                 
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from newmachine";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a href="newmachine.php"><h2 class="color-white">Total Gym Equipment</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-notepad f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                  
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from plan where active='yes'";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                    <a href="view_plan.php"><h2 class="color-white">Total Packages</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                        </div>

                     
            <!-- End Container fluid  -->

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

            
            
            <?php include('../constant/layout/footer.php');?>
