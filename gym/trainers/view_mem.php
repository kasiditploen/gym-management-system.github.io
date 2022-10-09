<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.min.css" />
  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Membership Members</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Membership Members</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <a><div class="bg-image hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black7.jpg');
    height: 300px; width: auto;
  "></a>
  <h1 class="color-white mb-3 h1 "><b>Memberships</b></h1>
</div>
                <!-- /# row -->
                 <div class="card">
                            
                 
                            <div class="col-md-16">
                            <a href="new_entry.php"><button class="btn btn-lg btn-dark waves-effect waves-light"><i class="fas fa-plus color-white"></i></button></a>
                        <div class="card view view-cascade gradient-card-header card bg-dark p-10 ">
                            <div class="media widget-ten">
                            
                            
                                                                    <div class="table-responsive m-t-40">
                                                                    <thead>
                                                                      <th></th>
                                  </thead>
                                                                    <tbody>
                                                                    <?php
              $query  = "select * from users ORDER BY joining_date";
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
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $query3  = "select * from users ORDER BY RAND()";
              $result3 = mysqli_query($con, $query3);
                $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                $query4  = "select * from users ORDER BY RAND()";
              $result4 = mysqli_query($con, $query4);
                $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                $query5  = "select * from users ORDER BY RAND()";
              $result5 = mysqli_query($con, $query5);
                $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);


                          
                            
                ?>
                            
                            
                    
                <?php
                  $uname=$row['username'];
                          $udob=$row['dob'];
                          $ujoing=$row['joining_date'];
                          $ugender=$row['gender'];
                          $planid=$row2['pid'];
                          
                   ?>
                   
                   
                                                                    <!--<tr>
                            
                              <a><div class="avatars">
                              <span class="avatar">
                              <td><?php echo '<img src="data:image;base64,'.base64_encode($row3['image']).'" class="rounded-circle img-responsive1">';?></td>
                                  </span></td>
                                  <span class="avatar">
                                 <td><?php echo '<img src="data:image;base64,'.base64_encode($row4['image']).'" class="rounded-circle img-responsive1">';?></td>
                                  </span></td>
                                  <span class="avatar">
                                 <td><?php echo '<img src="data:image;base64,'.base64_encode($row4['image']).'" class="rounded-circle img-responsive1">';?></td>
                                  </span></td>
                                  <span class="avatar">
                                 <td><?php echo '<img src="data:image;base64,'.base64_encode($row4['image']).'" class="rounded-circle img-responsive1">';?></td>
                                  </span></td>
                                  
                                  
                                  
                                    
                                  
    
                                </div>
                              </a>
                            </td>
                            <tr>-->

                            </tbody>
                          </div>
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
                                    
                                    
                                        <thead>
        <tr>
        
        <th style="width:2%;">Sl.No</th>
        <th style="width:2%;">Package</th>
          <th style="width:5%;">Image</th>
          <th style="width:3%;">Member ID</th>
          <th style="width:5%;">Full Name</th>
          <th style="width:5%;">Username</th>
          <th style="width:3%;">Contact</th>
          <th style="width:5%;">E-Mail</th>
          <th style="width:1%;">Gender</th>
          <th style="width:1%;">Goal</th>
          <th style="width:1%;">Health Conditions</th>
          <th style="width:2%;">Joining Date</th>
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
                            $expire=$row1['expire'];
                            $pdate=$row1['paid_date'];
                            $query2="select * from plan where pid='$pid'";
                            $result2=mysqli_query($con,$query2);
                            
                            
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                $planname=$row2['planName'];
                                $query3="select * from sessions where userid='$uid'";
                            $result3=mysqli_query($con,$query3);
                                if($result3){
                                  $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                  $pid1=$row3['pid'];
                                  $expire1=$row3['expire'];
                                  $sessioncount=$row3['amount'];
                            $pdate1=$row3['paid_date'];
                            $query4="select * from plan where pid='$pid1'";
                            $result4=mysqli_query($con,$query4);
                            if($result4){
                              $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                              $planname1=$row4['planName'];
                              $sessionid=$row3['sessionid'];
                              $query5="select * from csessions where userid='$uid'";
                            $result5=mysqli_query($con,$query5);
                            if($result5){
                              $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                              $pid2=$row5['pid'];
                              $expire2=$row5['expire'];
                              $pdate2=$row5['paid_date'];
                              $sessioncount1=$row5['amount'];
                              $query6="select * from plan where pid='$pid2'";
                              $result6=mysqli_query($con,$query6);
                              if($result6){
                                $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                $planname2=$row6['planName'];
                                $sessionid1=$row6['sessionid'];
                                

                               
                               
                               ?>


                          
                            
                                
                            
                            
                    
<?php
                  $uname=$row['username'];
                  $udob=$row['dob'];
                  $ujoing=$row['joining_date'];
                  $ugender=$row['gender'];
                  $planid=$row2['pid'];

                  $diff = abs(strtotime($expire) - strtotime($pdate));
                  $diff2 = date('z',$diff);
                  $diff3 = abs(strtotime($expire1) - strtotime($pdate1));
                  $diff4 = date('z',$diff3);
                  $diff5 = abs(strtotime($expire2) - strtotime($pdate2));
                  $diff6 = date('z',$diff5);
                  $today = date('Y-m-d');

                   ?>
                  
                  <tr>
                  
                    <td><?php echo $sno; ?></td>
                    <td><?php 
                     if(strtotime($diff2)<=45 && strtotime($today)< strtotime($expire)){
        echo '<ul class="list-group list-group-flush">
        <li class="list-group-item"><h4>Membership:<h5 class="color-black"><b>'.$planname.'<b></h5><span class="badge badge-color blue"> '.$diff2.'  Days Left</span></h4></li>
        </ul>';
        }else if(strtotime($diff)<=15 && strtotime($today) < strtotime($expire)){
          echo '<ul class="list-group list-group-flush">
        <li class="list-group-item"><h4>Membership:<span class="badge badge-color blue"><h6 class="color-white">'.$planname.'</h6> '.$diff2.'  Days Left</span></h4></li>
        </ul>';
      }else if(strtotime($diff2)<=7 && strtotime($today) < strtotime($expire)){
        echo '<h4>Membership:<span class="badge badge-warning"><h6 class="color-white">'.$planname.'</h6> '.$diff2.'  Days Left</span></h4>';
        }else {if(empty($expire)){
          echo '<h4><span class="badge badge-dark"><h6 class="color-white">No Membership</h6></span></h4>';
        
        }else if(strtotime($diff2)<=0 && strtotime($today) >= strtotime($expire)){{
          echo '<h4>Membership:<span class="badge badge-danger"><h6 class="color-white">'.$planname.'</h6>  Expired</span></h4>';
        }
      
        }
      }


        if(strtotime($diff4)<=45 && strtotime($today)< strtotime($expire1)){
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h4>Personal Training:<span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname1.'</h4><span class="badge badge-color blue">'.$diff4.'  Days Left </b></h3></br></li>
          
          
          </ul>';
          }else if(strtotime($diff3)<=15 && strtotime($today) < strtotime($expire1)){
            echo '<h4>Personal Training:</br><span class="badge badge-light"><h3 class="color-black"><b>  '.$sessioncount.'</b></h3> Session(s) Left</br></span><br><span class="badge badge-info"><h6 class="color-white">'.$planname1.'</h6> '.$diff4.'  Days Left </span></br></h4>';
        }else if(strtotime($diff4)<=7 && strtotime($today) < strtotime($expire1)){
           echo '<h5>Personal Training:</br><span class="badge badge-light"><h5 class="color-black"><b>  '.$sessioncount.'</b></h5> Session(s) Left</br></span><br><span class="badge badge-warning"><h5 class="color-white">'.$planname1.'</h5> '.$diff4.'  Days Left </span></br></h5>';
          }else {if(empty($expire1)){
            echo '<h4><span class="badge badge-dark"><h6 class="color-white">No Personal Training</h6></span></h4>';
          
          }else if(strtotime($diff4)<=0 && strtotime($today) >= strtotime($expire1)){{
            echo '<span class="badge badge-light"><h3 class="color-black"><b>  '.$sessioncount.'</b></h3> Session(s) Left</span><h4>Sessions:<span class="badge badge-danger"><h6 class="color-white">'.$planname1.'</h6>  Expired</span></h4>';
          }
        
          }
        }

        if(strtotime($diff6)<=45 && strtotime($today)< strtotime($expire2)){
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h4>Classes:<span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount1.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname2.'</h4><span class="badge badge-color blue">'.$diff6.'  Days Left </b></h3></br></li>
          
          
          </ul>';
          }else if(strtotime($diff5)<=15 && strtotime($today) < strtotime($expire2)){
            echo '<h4>Classes:</br><span class="badge badge-light"><h3 class="color-black"><b>  '.$sessioncount1.'</b></h3> Session(s) Left</br></span><br><span class="badge badge-info"><h6 class="color-white">'.$planname2.'</h6> '.$diff6.'  Days Left </span></br></h4>';
        }else if(strtotime($diff6)<=7 && strtotime($today) < strtotime($expire2)){
           echo '<h4>Classes:</br><span class="badge badge-light"><h3 class="color-black"><b>  '.$sessioncount1.'</b></h3> Session(s) Left</br></span><br><span class="badge badge-warning"><h6 class="color-white">'.$planname2.'</h6> '.$diff6.'  Days Left </span></br></h4>';
          }else {if(empty($expire2)){
            echo '<h4><span class="badge badge-dark"><h6 class="color-white">No Class Section</h6></span></h4>';
          
          }else if(strtotime($diff6)<=0 && strtotime($today) >= strtotime($expire2)){{
            echo '<span class="badge badge-light"><h3 class="color-black"><b>  '.$sessioncount1.'</b></h3> Session(s) Left</span><h4>Classes:<span class="badge badge-danger"><h6 class="color-white">'.$planname2.'</h6>  Expired</span></h4>';
          }
        
          }
        }
        
        ?></td>
                     
                     <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?><p><?php
                        if($row['status']=='1'){
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=0" class="btn btn-success">Enabled</a></p>';
                        } else{
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=1" class="btn btn-dark">Disabled</a></p>';
                        }  ?></p> </td>
                     <td><h4><?php echo $row['userid']; ?></h4></td>
                     <td><h4><?php echo $row['fname']; ?><br><?php echo $row['lname']; ?></br></h4></td>
                     <td ><h4><?php echo$row['username']; ?></h4></td>
                     

                  </td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                      <td><?php echo $row['goal']; ?> </td>
                      <td><?php echo $row['conditions']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       

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
    
    <form id="form2" action='make_payments.php' method='post'><input type='hidden' name='userID' value='<?php echo $uid; ?>'/>
                          <input type='hidden' name='planID' value='<?php echo $planid; ?>'/>
                          <a class="dropdown-item" href="edit_member.php?id=<?php echo $row['userid'];?>"><input type='submit' class="dropdown-item"  value='Payment' /></form></a>

                          <form id="form3" action='health_status_entry.php' method='post'>
                            <input type='hidden' name='uid' value='<?php echo $uid;?>'/>
                  <input type='hidden' name='uname' value='<?php echo $uname;?>'/>
                              <input type='hidden'  name='udob' value='<?php echo $udob;?>'/>
                      
                              <input type='hidden' name='ujoin' value='<?php echo $ujoing;?>'/>
                              <input type='hidden' name='ugender' value='<?php echo $ugender ?>'/>
                 <!--  <a href="health_status_entry.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ></button></a> -->
                  <input type='submit' class="dropdown-item"  value='Health Status' class="btn btn-primary btn-xs m-b-30 m-t-30"/></form>
                  <a href="del_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-danger"onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
  </div>
</div>

<!--<a href="read_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-folder-open"></i></button></a>-->
                  <!--<a href="edit_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>-->
                  
                 
                 

                          
                 

                  
                  </td></tr>
                  







                 
                                    
                  


                  
              <?php 
              $sno++; 
              $msgid = 0;
              $memid = 0;
                       
                    }
                }  
            }
        }
    }
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
  width: 80%;
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

  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.js"></script>
                        
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('../constant/layout/footer.php');?>

