<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?>   

<?php
              $query  = "select * from trainers";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $trainerid   = $row['trainerid'];
                      $dow = $row['availableday'];
                      $query7  = "select * from enrolls2_to WHERE uid='$trainerid' AND renewal='yes'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                            $query8="select * from checkint where trainerid='$trainerid' and  created_date LIKE '$cdate%' ORDER BY created_time DESC";
                              $result8=mysqli_query($con,$query8);
                              if($result8){
                                $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                $created_date8=$row8 ['created_date'];
                                $created_time8=$row8 ['created_time'];
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                              }
                            }
                          }
                        }
                      }
                ?>  

                
<?php
              $query  = "select * from users";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $userid  = $row['userid'];
                      $query7  = "select * from users WHERE userid='$userid'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                            $useridx  = $row1['userid'];
                            
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                              }
                            }
                          }
                        }
                      
                ?> 

<?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date('Y-m-d');
        $cdatex=date('Y-m-d H:i');
        $y1date=date('Y-m-d',strtotime('- 1 days'));
        $y2date=date('Y-m-d',strtotime('- 2 days'));
        $y3date=date('Y-m-d',strtotime('- 3 days'));
        $y4date=date('Y-m-d',strtotime('- 4 days'));
        $y5date=date('Y-m-d',strtotime('- 5 days'));
        $y6date=date('Y-m-d',strtotime('- 6 days'));
        $y7date=date('Y-m-d',strtotime('- 7 days'));


        $unixTimestamp = strtotime($cdate);

//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type="text/javascript">
      google.charts.load('current', {packages: ['corechart','line']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Terms', 'Members',],
          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y7date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y7date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 
          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y6date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y6date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 
          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y5date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y5date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 
          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y4date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y4date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 
          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y3date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y3date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 

          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y2date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y2date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 
          
          <?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
          where u.joining_date = '$y1date'
          ;";
            $rezz2=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz2)){
              $services1=$y1date;
              $numberone1=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services1;?>',<?php echo $numberone1;?>,],   
           <?php   
            }
           ?> 

<?php
          $query1 = "SELECT *, COUNT(u.userid) as numberone FROM users u
            where u.joining_date = '$cdate'
            ;";

            $rezz3=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz3)){
              $services2=$cdate;
              $numberone2=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services2;?>',<?php echo $numberone2;?>,],   
           <?php   
            }
           ?>  

      

          
        ]);

        var options = {'title' : 'New Memberships Each Day',
      hAxis: {
         title: 'Date'
      },
      vAxis: {
         title: 'Memberships'
      },   
      'width':750,
      'height':400,
      pointsVisible: true,
      colors: ['#ff0000']
   };

        var chart =  new google.visualization.LineChart(document.getElementById('line2'));
        chart.draw(data, options);
      };


      
    </script>

 
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                    
                
                
            </div>
            <!-- End Bread crumb -->
            

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black10.jpg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><span class="badge badge-pill badge-dark"><b>Service</b></span></h1>
</div>
                <div class="card">
                
                <div class="col-md-3 align-self-left">
                
                 </div>

                 <!-- <div class="row"> -->
                  
                 <div class="col-md-16">
                  
                 <a href="new_daypass.php"><button class="btn btn-lg btn-light waves-effect waves-light"><h4 class="color-black"><b> + Add Walk-ins</b></button></a>
                 <a href="new_entry.php"><button class="btn btn-lg btn-light waves-effect waves-light"><h4 class="color-black"><b> + Add Member</b></button></a></div>
                 

<!-- Modal -->

                 
                    <div class="table-responsive m-t-40">
                    
                                
                                <h2 class="text-center mb-3 h1"><b>Memberships Search</b> <span class="badge badge-pill badge-dark"><h2 class="color-white mb-1 h3"><b><?php
                            $query = "select COUNT(*) from users";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?> Members </b></h2></span></h2>
 
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search for a member">
                                        <button type="submit" class="btn btn-light color-black mb-20 h3"><b><i class="fa fa-search"></i><i></i></b></button>
                                        <a href="dashboard.php"><button type="button" class="btn btn-xs btn-danger color-black mb-20 h5"><b><i class="fa fa-refresh"></i><i></i></b></button></a>
                                    </div>

                                    
                                        
                                        
                                    
                                    
                                </form>
  <table id="myTable" class="table">
                                    
                                    
                                        <thead>
        <tr>
        
        <th style="width:1%;"class="color-black mb-3 h6">Sl.No</th>
        <th style="width:10%;" class="color-black mb-3 h6">Package</th>
          <th style="width:10%;"class="color-black mb-3 h6">Image</th>
          <th style="width:10%;"class="color-black mb-3 h6">Full Name</th>
          <th style="width:10%;"class="color-black mb-3 h6">Nationality</th>
          <th style="width:10%;"class="color-black mb-3 h6">Contact</th>
          <th style="width:10%;"class="color-black mb-3 h6">E-Mail</th>
          <th style="width:10%;"class="color-black mb-3 h6">Gender</th>
          <th style="width:10%;"class="color-black mb-3 h6">Goal</th>
          <th style="width:10%;"class="color-black mb-3 h6">Health Conditions</th>
          <th style="width:10%;"class="color-black mb-3 h6">Joining Date</th>
          <th style="width:2%;"class="color-black mb-3 h6">Action</th>
        </tr>
      </thead>    
      
      <tbody>
        <?php
        $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
        $tomorrow = date("d-m-Y", strtotime('tomorrow'));
        $query  = "select * from users WHERE CONCAT(fname,' ',lname) = '$filtervalues'  or userid = '$filtervalues' or email = '$filtervalues' or username = '$filtervalues'   ORDER BY joining_date";
        mysqli_real_escape_string($con, $filtervalues);
        $result = mysqli_query($con, $query);
              $snoo    = 1;
              
              
              
              $uname;
                      $udob;
                      $ujoing;
                      $ugender;
                      if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    extract($row);
                    $image = $row['image'];
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
                            $csessions=$row5['csessionid'];
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
                                  $query12="select *,COUNT(ch.userid),ch.time_to as timing from classholder ch
                                  inner join  users u ON u.userid=ch.userid
                                  inner join  classes c ON c.classid=ch.classid
                                   where ch.userid='$uid' and ch.classid=c.classid and created_date LIKE '%$cdate%'";
                                $result12=mysqli_query($con,$query12);
                                if($result12){
                                  $row12=mysqli_fetch_array($result12,MYSQLI_ASSOC);
                                  $classcount=$row12['COUNT(ch.userid)'];
                                  $userid12=$row12['userid'];
                                  $classid1=$row12['classid'];
                                  $classname1=$row12['className'];
                                  $create_date1=$row12['created_date'];
                                  $tfrom2=$row12['time_from'];
                                  $tto2=$row12['time_to'];
                                  $timing=$row12['timing'];
                                  $active=$row12['active'];
                                  $classholderid=$row12['classholderid'];
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
                                        $query18="select u.userid,COUNT(*) as countme from users u WHERE u.userid='$uid'";
                                $result18=mysqli_query($con,$query18);
                                if($result18){
                                  $row18=mysqli_fetch_array($result18,MYSQLI_ASSOC);
                                  $countuser=$row18['countme'];
                                  $query19="select * from attendance  WHERE userid='$uid'";
                                $result19=mysqli_query($con,$query19);
                                if($result19){
                                  $row19=mysqli_fetch_array($result19,MYSQLI_ASSOC);
                                  $attendanceid=$row19['attendanceid'];
                                  $expire19=$row19['expire'];
                                  
                                  $query20="select * from appointment where userid='$uid' and trainerid='$trainerid' and approved='yes' and  time_from LIKE '%$cdate%' ";
                              $result20=mysqli_query($con,$query20);
                              if($result20){
                                $row20=mysqli_fetch_array($result20,MYSQLI_ASSOC);
                                $classnamea=$row20['className'];
                                $time_froma=$row20['time_from'];
                                $time_toa=$row20['time_to'];


                                        mysqli_real_escape_string($con, $uid);

                                        
                                        date_default_timezone_set("Asia/Bangkok"); 
                                        $day=date("Y-m-d");
                                        $cxdate=date('H:i');
                                        $y1date=date('Y-m-d',strtotime('- 1 days'));
                                        $y2date=date('Y-m-d',strtotime('- 2 days'));
                                        $y3date=date('Y-m-d',strtotime('- 3 days'));
                                        $y4date=date('Y-m-d',strtotime('- 4 days'));
                                        $y5date=date('Y-m-d',strtotime('- 5 days'));
                                        $y6date=date('Y-m-d',strtotime('- 6 days'));
                                        $y7date=date('Y-m-d',strtotime('- 7 days'));
                                
                                
                                        $unixTimestamp = strtotime($cxdate);
                                        $expirec19 = strtotime($expire19);
                                
                                
                                //Get the day of the week using PHP's date function.
                                $hourman = date("H:i", $unixTimestamp);
                                $dayman = date("Y-m-d", $expirec19);
                              
                                if($create_date1 >= $day and $hourman >= $timing ){
                                  $query2="select * from classholder where classholderid='$classholderid'";
                                  $query2=$con->query("UPDATE classholder SET active='no' WHERE classholderid='".$classholderid."'");
                                } 

                                if($dayman <= $day){
                                  $query3="select * from attendance where attendanceid='$attendanceid'";
                                  $query3=$con->query("UPDATE attendance SET active='no' WHERE attendanceid='".$attendanceid."'");
                                } 
                                
                                        

                               ?>
                               

                               <?php
                  if(isset($_GET['search']))
                  {
                      $filtervalues = $_GET['search'];
                      
                      

                  
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

                    <td><?php echo  $snoo; ?></td>
                    <td><?php 
                     if(strtotime($diff2)<=45 && strtotime($today)< strtotime($expire)){
        echo '<ul class="list-group list-group-flush">
        <li class="list-group-item"><h1 class="color-black"><b>Membership:</b><h4 class="color-black"><b>'.$planname.'<b></h5><span class="badge badge-color blue"> '.$diff2.'  Days Left</span></h4></li>
        </ul>';
        }else if(strtotime($diff)<=15 && strtotime($today) < strtotime($expire)){
          echo '<ul class="list-group list-group-flush">
        <li class="list-group-item"><h1 class="color-black"><b>Membership:</b><span class="badge badge-color blue"><h6 class="color-white">'.$planname.'</h6> '.$diff2.'  Days Left</span></h4></li>
        </ul>';
      }else if(strtotime($diff2)<=7 && strtotime($today) < strtotime($expire)){
        echo '<ul class="list-group list-group-flush">
        <li class="list-group-item"><h1 class="color-black"><b>Membership:</b><span class="badge badge-color blue"><h6 class="color-white">'.$planname.'</h6> '.$diff2.'  Days Left</span></h4></li>
        </ul>';
        }else {if(empty($expire)){
          echo '<ul class="list-group list-group-flush">
        <li class="list-group-item"><h1 class="color-black"><b>Membership:</b><span class="badge badge-danger"><h6 class="color-white">EXPIRED</span></h4>
        <form id="form3" action="make_payments_m.php" method="post"><input type="hidden" name="userID" value='.$uid.'>
                          <input type="hidden" name="planID" value='.$planid.'/>
                          
                          <a href="make_payments_m.php?id='.$row['userid'].'"><input type="submit" class="btn btn-xs btn-light" value="RENEW MEMBERSHIP" /><b></b></form></a></br></li>
        
        </ul>';
        
        }else if(strtotime($diff2)<=0 && strtotime($today) >= strtotime($expire)){{
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item"><h1 class="color-black"><b>Membership:</b><span class="badge badge-danger"><h6 class="color-white">EXPIRED</span></h4></li>
          <form id="form3" action="make_payments_m.php" method="post"><input type="hidden" name="userID" value='.$uid.'>
                          <input type="hidden" name="planID" value='.$planid.'/>
                          
                          <a href="make_payments_m.php?id='.$row['userid'].'"><input type="submit" class="btn btn-xs btn-light" value="RENEW MEMBERSHIP" /><b></b></form></a></br></li>
          
          
          </ul>';
        }
      
        }
      }


        if(strtotime($diff4)<=45 && strtotime($today)< strtotime($expire1)){
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h1 class="color-black"><b>PT Sessions:</h3><span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname1.'</h4><span class="badge badge-color blue">'.$diff4.'  Days Left </b></h3></br></li>
          
          
          </ul>';
          }else if(strtotime($diff3)<=15 && strtotime($today) < strtotime($expire1)){
            echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h1 class="color-black"><b>PT Sessions:</h3><span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname1.'</h4><span class="badge badge-color blue">'.$diff4.'  Days Left </b></h3></br></li>
          
          
          </ul>';
        }else if(strtotime($diff4)<=7 && strtotime($today) < strtotime($expire1)){
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h1 class="color-black"><b>PT Sessions:</h3><span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname1.'</h4><span class="badge badge-color blue">'.$diff4.'  Days Left </b></h3></br></li>
          
          
          </ul>';
          }else {if(empty($expire1)|| $sessioncount <= 0){
            echo '<ul class="list-group list-group-flush">
            <li class="list-group-item">
            <h1 class="color-black"><b>PT Sessions:</h3><span class="badge badge-danger"><h4 class="color-white">'.$sessioncount.'&nbsp;'.'NO Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname1.'</h4></h3>
            <form id="form2" action="make_payments_pt.php" method="post"><input type="hidden" name="userID" value='.$uid.'>
                          <input type="hidden" name="planID" value='.$planid.'/>
                          <input type="hidden" name="pt" value='.$sessioncount.'/>
                          <a href="make_payments_pt.php?id='.$row['userid'].'"><input type="submit" class="btn btn-xs btn-light " value="Buy PT Session Only" /><b></b></form></a></br></li>
            
            </ul>';
          
          }else if(strtotime($diff4)<=0 && strtotime($today) >= strtotime($expire1)){{
            echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h1 class="color-black"><b>PT Sessions:</h3><span class="badge badge-color red"><h4 class="color-white">'.$sessioncount.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname1.'</h4><span class="badge badge-color red">EXPIRED</b></h3></br></li>
          <form id="form3" action="make_payments_pt.php" method="post"><input type="hidden" name="userID" value='.$uid.'>
                          <input type="hidden" name="planID" value='.$planid.'/>
                          <input type="hidden" name="pt" value='.$sessioncount.'/>
                          <a href="make_payments_pt.php?id='.$row['userid'].'"><input type="submit" class="btn btn-xs btn-light" value="Buy PT Session Only" /><b></b></form></a></br></li>
          
          </ul>';
          }
        
          }
        }

        if(strtotime($diff6)<=45 && strtotime($today)< strtotime($expire2)){
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h2 class="color-black"><b>Group Classes:</b></h3><span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount1.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname2.'</h4><span class="badge badge-color blue">'.$diff6.'  Days Left </b></h3></br></li>
          
          
          </ul>';
          }else if(strtotime($diff5)<=15 && strtotime($today) < strtotime($expire2)){
            echo '<ul class="list-group list-group-flush">
            <li class="list-group-item">
            <h2 class="color-black"><b>Group Classes:</b></h3><span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount1.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname2.'</h4><span class="badge badge-color blue">'.$diff6.'  Days Left </b></h3></br></li>
            
            
            </ul>';
        }else if(strtotime($diff6)<=7 && strtotime($today) < strtotime($expire2)){
          echo '<ul class="list-group list-group-flush">
          <li class="list-group-item">
          <h2 class="color-black"><b>Group Classes:</b></h3><span class="badge badge-color grey"><h4 class="color-white">'.$sessioncount1.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname2.'</h4><span class="badge badge-color blue">'.$diff6.'  Days Left </b></h3></br></li>
          
          
          </ul>';
          }else {if(empty($expire2)){
            echo '<ul class="list-group list-group-flush">
            <li class="list-group-item">
            <h2 class="color-black"><b>Group Classes:</b></h3><span class="badge badge-danger"><h4 class="color-white">'.$sessioncount1.'&nbsp;'.'No Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname2.'</h4></h3>
            <form id="form2" action="make_payments_ct.php" method="post"><input type="hidden" name="userID" value='.$uid.'>
                          <input type="hidden" name="planID" value='.$planid.'/>
                          <input type="hidden" name="pt" value='.$sessioncount.'/>
                          <a href="make_payments_ct.php?id='.$row['userid'].'"><input type="submit" class="btn btn-xs btn-light" value="Buy Group Class Session Only" /><b></b></form></a></br></li>
            
            </ul>';
          
          }else if(strtotime($diff6)<=0 && strtotime($today) >= strtotime($expire2)|| $sessioncount1 <= 0){{
            echo '<ul class="list-group list-group-flush">
            <li class="list-group-item">
            <h2 class="color-black"><b>Group Classes:</b></h3><span class="badge badge-color red"><h4 class="color-white">'.$sessioncount1.'&nbsp;'.'Sessions</h4> </span></br><h3 class="color-black"><b>  '.$planname2.'</h4><span class="badge badge-color red">EXPIRED </b></h3></br></li>
            <form id="form2" action="make_payments_ct.php" method="post"><input type="hidden" name="userID" value='.$uid.'>
                          <input type="hidden" name="planID" value='.$planid.'/>
                          <input type="hidden" name="pt" value='.$sessioncount.'/>
                          <a href="make_payments_ct.php?id='.$row['userid'].'"><input type="submit" class="btn btn-xs btn-light" value="Buy Group Class Session Only" /><b></b></form></a></br></li>
                          
            
            </ul>';
            
            $query=$con->query("UPDATE csessions SET amount= '0' WHERE csessionid='".$csessions."'");
            ;
          }
        
          }
        }
        
        ?></td>
                     
                     <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?><h2><span class="badge badge-color black badge-pill">ID: <?= $row['userid']; ?></span></h2><p><?php
                        if($row['status']=='1'){
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=0" class="btn btn-success">Enabled</a></p>';
                        } else{
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=1" class="btn btn-dark">Disabled</a></p>';
                        }  ?></p> 
                        <a href="submit_new_checkin.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-secondary" >Check In</button></a>
                        <ul class="list-group list-group-flush">
          <li class="list-group-item">
                        <h4>
                          <span class="badge badge-light">Today's Latest Checkin: <?php echo $row7['created_date']; ?>
                        <br><?php echo$row7['created_time']; ?></span></h4>
                        
                        <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3>
                      <span class="badge badge-light">PT Sessions <br> <i class="far fa-clock"></i> Today:</br>
                       <br><?php echo $privateclassname; ?></br>
                       <h3><br><?php echo $time_from; ?>-<?php echo $time_to; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
                     </ul>

                     <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3>
                      <span class="badge badge-light">Class Sessions <br> <i class="far fa-clock"></i> Today:</br>
                       <br><?php echo $classname1; ?></br>
                       <h3><br><?php echo $tfrom2; ?>-<?php echo $tto2; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
                     </ul>

                     <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3><span class="badge badge-light">Booked Class Sessions:<br> <i class="far fa-clock"></i> Today:</br>
                       <br><?php echo $bookedclassname; ?></br>
                       <h3><br><?php echo $tfrom1; ?>-<?php echo $tto1; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
          <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3>
                      <span class="badge badge-light">Appointed PT Sessions <br> <i class="far fa-clock"></i> Today:</br>
                       <br><?php echo $classnamea; ?></br>
                       <h3><br><?php echo $time_froma; ?>
                       <br> <?php echo $time_toa; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
                     </ul>
                     </ul>
                      </td>
                     
                     <td><h4><?php echo $row['title']; ?> <?php echo $row['fname']; ?><br><?php echo $row['lname']; ?></br></h4></td>
                     <td><?php echo $row['nationality']; ?></td>
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
                    

<a href="read_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-light" ><h4 class="color-black"><b>More Info.</b></button></a>
    <a href="edit_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-light" ><h4 class="color-black"><b>Edit Member</b></button></a>

<form id="form2" action='make_payments.php' method='post'><input type='hidden' name='userID' value='<?php echo $uid; ?>'/>
                          <input type='hidden' name='planID' value='<?php echo $planid; ?>'/>
                          <a href="make_payments.php?id=<?php echo $row['userid'];?>"><input type='submit' class="btn btn-xs btn-light" value='Buy Packages' /><b></b></form></a>

<form id="form3" action='health_status_entry.php' method='post'>
                            <input type='hidden' name='uid' value='<?php echo $uid;?>'/>
                  <input type='hidden' name='uname' value='<?php echo $uname;?>'/>
                              <input type='hidden'  name='udob' value='<?php echo $udob;?>'/>
                      
                              <input type='hidden' name='ujoin' value='<?php echo $ujoing;?>'/>
                              <input type='hidden' name='ugender' value='<?php echo $ugender ?>'/>
                 
                  <input type='submit'   value='Health Status' class="btn btn-xs btn-light"/></form>
                  

                  

<a href="new_privateclass_quick.php?id=<?php echo $row['userid'];?>&&ss=<?php echo $sessions;?>&&pi=<?php echo $pidss;?>&&am=<?php echo $amount;?>"><button type="button" class="btn btn-xs btn-light" ><h4 class="color-black"><b>Take Personal Training</b></button></a>

<a href="view_class_quick.php?id=<?php echo $row['userid'];?>&&cs=<?php echo $csessions;?>&&pi=<?php echo $pid2;?>&&am=<?php echo $amount1;?>"><button type="button" class="btn btn-xs btn-light" ><h4 class="color-black"><b>Take Group Classes</b></button></a>



<a href="view_class_session_fast.php?id=<?php echo $row['userid'];?>&&cs=<?php echo $csessions;?>&&pi=<?php echo $pid2;?>&&am=<?php echo $amount1;?>"><button class="btn btn-light"><h4 class="color-black"><b>Advance Booking Group Classes</b></button></a>
<!--<a href="read_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-folder-open"></i></button></a>-->
                  <!--<a href="edit_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>-->
                  <a href="del_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-lg btn-light"onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>         
                 
                 

                          
                 

                  
                  </td>
                </tr>
                  







                 
                                    
                  


                  
              <?php 
              $snoo++; 
              
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
          }
        }
      }
    }
      
    
    
    

          
                
          ?>  
          

          

        </tbody>
        
                                      
                                    </table>
</div>
                </div>
                
                


                <div class="card">
                <div class="card-body">
                <div class="col-md-3 align-self-left">
                
                 </div>
                 
                 
                    <div class="table-responsive m-t-40">
                                
                    <h2 class="text-center mb-3 h1"><b>Trainer Search</b> <span class="badge badge-pill badge-dark"><h2 class="color-white mb-1 h3"><b><?php
                            $query = "select COUNT(*) from trainers";

                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $i = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?> Trainers</b></h2></span></h2>
 
  <input class="form-control" id="myInput2" type="text" placeholder="Search Trainer..">
  <table id="dt-all-checkbox2" class="table">
                                    
                                    
  <thead>
        <tr>
        
        <th>Sl.No</th>
         <th style="width:10%;">Image</th>
          <th>Trainer ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Role</th>
          <th>Contact</th>
          <th>E-Mail</th>
          <th>Gender</th>
          <th>Joining Date</th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          <th>Special Skill</th>
          <th>Year Of Experience</th>
          <th>Action</th>
          
        </tr>
      </thead>    
        <tbody>
        <?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date("Y-m-d");
        $unixTimestamp = strtotime($cdate);
//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);

?>
          <?php
              $query  = "select * from trainers";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $trainerid   = $row['trainerid'];
                      $dow = $row['availableday'];
                      $timefrom= $row['time_from'];
                      $timeto = $row['time_to'];
                      $query7  = "select * from enrolls2_to WHERE uid='$trainerid' AND renewal='yes'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                            $query8="select * from checkint where trainerid='$trainerid' and  created_date LIKE '$cdate%'";
                              $result8=mysqli_query($con,$query8);
                              if($result8){
                                $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                $create_date=$row8 ['created_date'];
                                $create_time=$row8 ['created_time'];
                                $query9="select * from privateclasses where trainerid='$trainerid' and approved='yes' and date_from LIKE '$cdate%' ORDER BY time_from DESC";
                              $result9=mysqli_query($con,$query9);
                              if($result9){
                                $row9=mysqli_fetch_array($result9,MYSQLI_ASSOC);
                                $privateclassname=$row9['className'];
                                $time_from=$row9['time_from'];
                                $time_to=$row9['time_to'];
                                
                                  $query10="select * from classes order by time_from desc";
                                $result10=mysqli_query($con,$query10);
                                if($result10){
                                  $row10=mysqli_fetch_array($result10,MYSQLI_ASSOC);
                                  $classid=$row10['classid'];
                                  $classname=$row10['className'];
                                  $tfrom=$row10['time_from'];
                                  $tto=$row10['time_to'];
                                  
                                  $query12="select * from appointment where trainerid='$trainerid' and approved='yes' and time_from LIKE '%$cdate%' ORDER BY time_from DESC";
                              $result12=mysqli_query($con,$query12);
                              if($result12){
                                $row12=mysqli_fetch_array($result12,MYSQLI_ASSOC);
                                $appointmentclassname=$row12['className'];
                                $time_from1=$row12['time_from'];
                                $time_to1=$row12['time_to'];
                                  
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                ?>  
                  
                  <tr>
                 
                                                        <td><?php echo $sno; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?><?php 
                     if(strpos($dow,$dayOfWeek) !== false && $timefrom >= $cdate && $cdate <= $timeto){
                      echo '<h2 class="color-white mb-3 h2"><span class="badge badge-success"><b>AVAILABLE</b></span></h2>';
                    }else{
                    echo '<h2 class="color-white mb-3 h2"><span class="badge badge-danger"><b>UNAVAILABLE</b></span></h2>';
      
        }
        
        
        
        ?>
        </p> 
                        <a href="submit_new_checkint.php?id=<?php echo $row['trainerid'];?>"><button type="button" class="btn btn-xs btn-secondary" >Check In</button></a>
                        <ul class="list-group list-group-flush">
          <li class="list-group-item">
                        <h4>
                          <span class="badge badge-light">Today's Latest Checkin: <?php echo $row7['created_date']; ?>
                        <br><h3><?php echo $created_date8; ?></h3>
                        <br><h3><?php echo $created_time8; ?></span></h3>
                        <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3>
                      <span class="badge badge-light">LATEST PT Sessions <br> <i class="far fa-clock"></i> Today:</br>
                       <br><?php echo $privateclassname; ?></br>
                       <h3><br><?php echo $time_from; ?>-<?php echo $time_to; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
                     </ul>

                     <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3>
                      <span class="badge badge-light">LATEST  APPOINTMENT <br> <i class="far fa-clock"></i> Today:</br>
                       <br><?php echo $appointmentclassname; ?></br>
                       <h3><br><?php echo $time_from1; ?>
                       <br><?php echo $time_to1; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
                     </ul>
                      </td>
                     <td><?php echo $row['trainerid']; ?></td>
                     

                     <td><h4><?php echo $row['fname']; ?></h4></td>
                     <td><h4><?php echo $row['lname']; ?></h4></td>
                     
                     <td><h4><?php echo$row['trainertype']; ?><h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       <td><?php echo $row['time_from']; ?></td>
                       <td><?php echo $row['time_to']; ?></td>
                       <td><?php echo $row['skills']; ?></td>
                       <td><?php echo $row['yoe'] .' Years'; ?></td>
                       
                       
                       <td>
                       
                       <?php  if(strpos($dow,$dayOfWeek) !== false && $uid >='1'){
                      echo '<a href="new_appointment_quick.php?id='.$uid.'&&ss='.$sessions.'&&pi='.$pidss.'&&am='.$amount.'&&tr='.$trainerid.'" class="btn btn-lg btn-light">Add Appointment</a></p>';
                       }else{
                        echo '<a class="btn btn-lg btn-danger">UNAVAILABLE!!!</a></p>';
                       }
                      
                       ?>
                       </td>
                  
                </tr>
                  
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
      
      
          ?>  

          

        </tbody>
        
                                      
                                    </table>
</div>
                </div>
                </div>
                
                
                
                        
                <!--<div class="card">
                            <div class="card-body">
                            <h2 class="color-black">PERSONAL TRAINERS STATUS</h2></a>
                        <div class="table-responsive m-t-40">
                                
                                    <table id="dt-bordered1" class="table table-bordered table-striped">
                                    
                                    
                                        <thead>
        <tr>
        <th style="width:1%;"><input type="checkbox" id="select-all2" /></th>
        <th>Sl.No</th>
         <th style="width:10%;">Image</th>
          <th>Trainer ID</th>
          <th>STATUS</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th>Role</th>
          <th>Contact</th>
          <th>E-Mail</th>
          <th>Gender</th>
          <th>Joining Date</th>
          <th style="width:10%;">Available Day</th>
          <th>Available Time From</th>
          <th>Available Time To</th>
          <th>Special Skill</th>
          <th >Year Of Experience</th>
          <th>Action</th>
        </tr>
      </thead>    
        <tbody>
        <?php
        date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date("Y-m-d");
        $unixTimestamp = strtotime($cdate);
//Get the day of the week using PHP's date function.
$dayOfWeek = date("l", $unixTimestamp);

?>
          <?php
              $query  = "select * from trainers";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno1    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $trainerid   = $row['trainerid'];
                      $dow = $row['availableday'];
                      $query7  = "select * from enrolls2_to WHERE uid='$trainerid' AND renewal='yes'";
                      $result7 = mysqli_query($con, $query7);
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result7, MYSQLI_ASSOC)) {
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                ?>  
                  
                  <tr>
                  
                                                        <td><?php echo $sno1; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><?php echo $row['trainerid']; ?></td>
                     <td><?php 
                     if(strpos($dow,$dayOfWeek) !== false ){
        echo '<h2 class="color-white mb-3 h1"><span class="badge badge-success">AVAILABLE</span></h2>';
        }else{
        echo '<h2 class="color-white mb-3 h1"><span class="badge badge-danger">NOT AVAILABLE</span></h2>';
      
        }
        
        
        
        ?>


        
    
    
    
    </td>
                     <td><h4><?php echo $row['fname']; ?></h4></td>
                     <td><h4><?php echo $row['lname']; ?></h4></td>
                     <td><h4><?php echo$row['username']; ?><h4></td>
                     <td><h4><?php echo$row['trainertype']; ?><h4></td>
                     <td><?php echo $row['mobile']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                       <td><?php echo $row['joining_date']; ?> </td>
                       <td><?php echo $row['availableday']; ?></td>
                       <td><?php echo $row['time_from']; ?></td>
                       <td><?php echo $row['time_to']; ?></td>
                       <td><?php echo $row['skills']; ?></td>
                       <td><?php echo $row['yoe'] .' Years'; ?></td>
                       
                  
                 <td>


                  </td></tr>
                  
              <?php 
              $sno1++; 
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
                        </div> -->
                        
                      
                       
                     
            <!-- End Container fluid  -->

            

            

            <!-- Container fluid  -->
            
                <!-- Start Page Content -->
                
               
                        

                        

                     
            <!-- End Container fluid  -->
            <script>
              $(document).ready(function(){
              $('#myTable').dataTable( {
drawCallback: function(settings){
            if($('#myInput').val().length > 0)
            {
                $('#myTable tr').show();
            } else  {
                $('#myTable tr').hide();
            }
        }
      });
    });
      </script>

<script>
              $(document).ready(function(){
              $('#dt-all-checkbox2').dataTable( {
drawCallback: function(settings){
            if($('#myInput2').val().length > 0)
            {
                $('#dt-all-checkbox2 tr').show();
            } else {
                $('#dt-all-checkbox2 tr').hide();
            }
        }
      });
    });
      </script>

            
            

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

<script>
    
    $(document).ready(function () {
  $('#myTable2').dataTable({

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
  $('#dt-bordered1').dataTable({

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
  $("#myInput2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dt-all-checkbox2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
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
.gradient-custom {
  /* fallback for old browsers */
  background: #ea6666;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(234, 102, 102, 0.45), rgba(255, 0, 0, 0.45));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(234, 102, 102, 0.45), rgba(255, 0, 0, 0.45))
}
  </style>

  
            
            
            <?php include('../constant/layout/footer.php');?>
