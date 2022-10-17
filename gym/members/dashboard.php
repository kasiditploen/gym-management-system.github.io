<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_member.php');?>

<?php include('../constant/layout/sidebar_member.php');?>   


 
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
            
                <div class="col-md-12 align-self-center">
                    <marquee direction="left" behavior="alternate" scrollamount=1 >
   <h3 style="color:red"><b></b></h3>
</marquee></div>
                
            </div>
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black4.jpg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>My Profile</b></h1>
</div>
                
                <div class="card">
                
                    
                    <div class="table-responsive m-t-40">
                                
                                
                                    <table id="myTable" class="table table-bordered table-striped">
                                    
                                    </form>
                                        <thead>
        <tr>
        
        
        <th style="width:2%;">Package</th>
          <th style="width:5%;">Image</th>
          <th style="width:3%;">Member ID</th>
          <th style="width:5%;">Name</th>
          <th style="width:3%;">Contact</th>
          <th style="width:5%;">E-Mail</th>
          <th style="width:1%;">Gender</th>
          <th style="width:2%;">Joining Date</th>
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
                          mysqli_real_escape_string($con, $filtervalues);
                          $uid  = $row['userid'];
                            $query1  = "select * from enrolls_to WHERE uid='$uid' AND renewal='yes'";
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
                                    $query3="select * from sessions where userid='$uid' and renewal='yes'";
                                $result3=mysqli_query($con,$query3);
                                    if($result3){
                                      $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                      $pid1=$row3['pid'];
                                      $expire1=$row3['expire'];
                                      $sessions=$row3['sessionid'];
                                      $pidss=$row3['pid'];
                                      $amount=$row3['amount'];
                                      $sessioncount=$row3['amount'];
                                $pdate1=$row3['paid_date'];
                                $query4="select * from plan where pid='$pid1'";
                                $result4=mysqli_query($con,$query4);
                                if($result4){
                                  $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                  $planname1=$row4['planName'];
                                  $sessionid=$row3['sessionid'];
                                  $query5="select * from csessions where userid='$uid' and renewal='yes'";
                                $result5=mysqli_query($con,$query5);
                                if($result5){
                                  $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                  $pid2=$row5['pid'];
                                  $csessions=$row5['csessionsid'];
                                  $amount1=$row5['amount'];
                                  $expire2=$row5['expire'];
                                  $pdate2=$row5['paid_date'];
                                  $sessioncount1=$row5['amount'];
                                  $query6="select * from plan where pid='$pid2'";
                                  $result6=mysqli_query($con,$query6);
                                  if($result6){
                                    $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                    $planname2=$row6['planName'];
                                    $sessionid1=$row6['sessionid'];
                                    $query7="select * from checkin where userid='$uid' and  created_date LIKE '$cdate%' ORDER BY created_time DESC";
                                    $result7=mysqli_query($con,$query7);
                                    if($result7){
                                      $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                      $create_date=$row7 ['created_date'];
                                      $create_time=$row7 ['created_time'];
                                      $query8="select * from privateclasses where userid='$uid' and approved='yes' and  date_from LIKE '$cdate%' ";
                                    $result8=mysqli_query($con,$query8);
                                    if($result8){
                                      $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                      $privateclassname=$row8['className'];
                                      $time_from=$row8['time_from'];
                                      $time_to=$row8['time_to'];
                                      
                                        $query10="select * from classes order by time_from desc";
                                      $result10=mysqli_query($con,$query10);
                                      if($result10){
                                        $row10=mysqli_fetch_array($result10,MYSQLI_ASSOC);
                                        $classid=$row10['classid'];
                                        $classname=$row10['className'];
                                        $tfrom=$row10['time_from'];
                                        $tto=$row10['time_to'];
                                        $query11="select * from booking where userid='$uid' and classid='$classid' and date_from LIKE '%$cdate%'";
                                      $result11=mysqli_query($con,$query11);
                                      if($result11){
                                        $row11=mysqli_fetch_array($result11,MYSQLI_ASSOC);
                                        $bookedclassname=$row11['className'];
                                        $tfrom1=$row11['time_from'];
                                        $tto1=$row11['time_to'];
                                        $query12="select ch.userid,COUNT(*) from classholder ch
                                        inner join users u ON u.userid=ch.userid
                                        LEFT OUTER JOIN classes c ON c.trainerid=ch.trainerid
                                         where u.userid='$uid' and ch.classid='$classid' and created_date LIKE '%$cdate%'";
                                      $result12=mysqli_query($con,$query12);
                                      if($result12){
                                        $row12=mysqli_fetch_array($result12,MYSQLI_ASSOC);
                                        $classcount=$row12['COUNT(*)'];
                                        $userid12=$row12['userid'];
                                        $classid1=$row12['classid'];
                                        $classname1=$row12['className'];
                                        $create_date1=$row12['created_date'];
                                        $tfrom2=$row12['time_from'];
                                        $tto2=$row12['time_to'];
                                        $query13="select * from classholder where userid='$userid12'  and classid='$classid1' and created_date LIKE '$cdate%'";
                                      $result13=mysqli_query($con,$query13);
                                      if($result13){
                                        $row13=mysqli_fetch_array($result13,MYSQLI_ASSOC);
                                        $classid11=$row13['classid'];
                                        $classname11=$row13['className'];
                                        $query14="select * from enrolls_to_day";
                                        $result14=mysqli_query($con,$query14);
                                            if($result14){
                                              $row14=mysqli_fetch_array($result14,MYSQLI_ASSOC);
                                              $pid5=$row14['pid'];
                                              $expire1=$row3['expire'];
                                              $sessions=$row3['sessionid'];
                                              $pidss=$row3['pid'];
                                              $amount=$row3['amount'];
                                              $sessioncount=$row3['amount'];
                                              $query15="select * from plan where pid='$pid5'";
                                $result15=mysqli_query($con,$query15);
                                if($result15){
                                  $row15=mysqli_fetch_array($result15,MYSQLI_ASSOC);
                                  
                                  $query16="select * from csessions2";
                                      $result16=mysqli_query($con,$query16);
                                      if($result16){
                                        $row16=mysqli_fetch_array($result16,MYSQLI_ASSOC);
                                        $pid4=$row16['pid'];
                                        $query17="select * from plan where pid='$pid4'";
                                        $result17=mysqli_query($con,$query17);
                                            if($result17){
                                              $row17=mysqli_fetch_array($result17,MYSQLI_ASSOC);
                                              $pid4=$row14['pid'];
                                              $expire1=$row3['expire'];
                                              $sessions=$row3['sessionid'];
                                              $pidss=$row3['pid'];
                                              $amount=$row3['amount'];
                                              $sessioncount=$row3['amount'];
      
      
                                              mysqli_real_escape_string($con, $uid);
      
      
                                              
      
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
                        }  ?></p></td>
                     <td><h4><?php echo $row['userid']; ?></h4></td>
                     <td><h4><?php echo$row['username']; ?></h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       

                       <!--<td><button type="button" class="btn btn-s btn-success">Active</button> </td> -->

                       
                       
                    
                  
                       <td>
                    <!-- Split button -->
                    <a href="read_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-light" >More Info.</button></a></td></tr>
                  







                 
                                    
                  


                  
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
