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
                            $query8="select * from checkint where trainerid='$trainerid' and  created_date LIKE '$cdate%'";
                              $result8=mysqli_query($con,$query8);
                              if($result8){
                                $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                $create_date=$row8 ['created_date'];
                                $create_time=$row8 ['created_time'];
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
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black4.jpg');
    height: 125px; width: auto;
  ">
  
  <h1 class="color-white mb-3 h1"><b>Control Panel</b></h1>
</div>
                <div class="card">
                  
                <div class="col-md-3 align-self-left">
                
                 </div>
                 
                 <a href="new_daypass.php"><button class="btn btn-lg btn-light waves-effect waves-light"><b> + Add Walk-ins</b></button></a>
                 
                    <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_mem.php" method="POST">
                                <h2 class="text-center">Memberships Search</h2>
 
  <input class="form-control" id="myInput" type="text" placeholder="Search Member..">
  <table id="myTable" class="table">
                                    
                                    
                                        <thead>
        <tr>
        
        <th style="width:2%;">Sl.No</th>
        <th style="width:2%;">Package</th>
          <th style="width:5%;">Image</th>
          <th style="width:3%;">Member ID</th>
          <th style="width:10%;">Full Name</th>
          <th style="width:5%;">Username</th>
          <th style="width:5%;">Today's Status</th>
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
        $tomorrow = date("d-m-Y", strtotime('tomorrow'));
              $query  = "select * from users  ORDER BY joining_date";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              
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
                            $query5="select * from csessions where userid='$uid'";
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
                              $query7="select * from checkin where userid='$uid' and  created_date LIKE '$cdate%'";
                              $result7=mysqli_query($con,$query7);
                              if($result7){
                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                $create_date=$row7 ['created_date'];
                                $create_time=$row7 ['created_time'];
                                $query8="select * from privateclasses where userid='$uid' and approved='yes' and  date_from LIKE '$cdate%'";
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
                                  $query11="select * from booking where userid='$uid'  and date_from LIKE '$tomorrow%'";
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
                        }  ?></p> 
                        <ul class="list-group list-group-flush">
          <li class="list-group-item">
                        <h2>
                          <span class="badge badge-light">Checkin: <?php echo $row7['created_date']; ?>
                        <br><?php echo$row7['created_time']; ?></span></h2>
                      </li>
                        </ul>
                      </td>
                     <td><h4><?php echo $row['userid']; ?></h4></td>
                     <td><h4><?php echo $row['fname']; ?><br><?php echo $row['lname']; ?></br></h4></td>
                     <td ><h4><?php echo$row['username']; ?></h4></td>
                     <td>
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
                       <br><?php echo $classcount; ?></br>
                       <h3><br><?php echo $tfrom2; ?>-<?php echo $tto2; ?>
                      </br>
                    </span>
                  </h3>
                      </h3>
          </li>
                     </ul>

                     <ul class="list-group list-group-flush">
          <li class="list-group-item">
                     <h3><span class="badge badge-light">Booked Class Sessions: <p><?php echo $bookedclassname; ?></h2></span></p><h2><span class="badge badge-dark"><p><?php echo $tfrom1; ?>-<?php echo $tto1; ?></p></span></h2>


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
<button class="btn btn-light dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
  
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

<a href="submit_new_checkin.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-sm btn-danger" >Check In</button></a>

<a href="new_privateclass_quick.php?id=<?php echo $row['userid'];?>&&ss=<?php echo $sessions;?>&&pi=<?php echo $pidss;?>&&am=<?php echo $amount;?>"><button type="button" class="btn btn-xs btn-success" >Apply Personal Training</button></a>

<a href="view_class_quick.php?id=<?php echo $row['userid'];?>&&cs=<?php echo $csessions;?>&&pi=<?php echo $pid2;?>&&am=<?php echo $amount1;?>"><button type="button" class="btn btn-xs btn-success" >Apply Classes</button></a>

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
                <div class="col-md-3 align-self-left">
                
                 </div>
                 
                 
                    <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_mem.php" method="POST">
                                <h2>Trainer Search</h2>
 
  <input class="form-control" id="myInput2" type="text" placeholder="Search Trainer..">
  <table id="dt-all-checkbox2" class="table">
                                    
                                    
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
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $trainerid   = $row['trainerid'];
                      $dow = $row['availableday'];
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
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                ?>  
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" name="trainer_delete_id[]" value="<?= $row['trainerid']; ?>">
                                                        <td><?php echo $sno; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><?php echo $row['trainerid']; ?></td>
                     <td><?php 
                     if(strpos($dow,$dayOfWeek) !== false){
        echo '<h3><span class="badge badge-success">AVAILABLE</span></h3>';
        }else{
        echo '<h3><span class="badge badge-danger">NOT AVAILABLE</span></h3>';
      
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
              $sno++; 
              $msgid = 0;
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
                
                        
                <!--<div class="card">
                            <div class="card-body">
                            <h2 class="color-black">PERSONAL TRAINERS STATUS</h2></a>
                        <div class="table-responsive m-t-40">
                                <form id="form2" action="del_all_trainer.php" method="POST">
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
              $sno    = 1;

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
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" name="trainer_delete_id[]" value="<?= $row['trainerid']; ?>">
                                                        <td><?php echo $sno; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><?php echo $row['trainerid']; ?></td>
                     <td><?php 
                     if(strpos($dow,$dayOfWeek) !== false){
        echo '<h3><span class="badge badge-success">AVAILABLE</span></h3>';
        }else{
        echo '<h3><span class="badge badge-danger">NOT AVAILABLE</span></h3>';
      
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
                        </div> -->
            
                      
                       
                     
            <!-- End Container fluid  -->

            <!-- Container fluid  -->
            
                <!-- Start Page Content -->
                
                <div class="card">
                <div class="col-md-3 align-self-left">
                    <h1 class="text-primary">Environments</h1> </div>

                      <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                  <?php
                            date_default_timezone_set("Asia/Bangkok"); 
                            $date  = date('Y-m');
                            $query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";
                          
                            //echo $query;
                            $result  = mysqli_query($con, $query);
                            $revenue = 0;
                            $revenue1 = 0;
                            $revenue2 = 0;
                            $revenue3 = 0;
                            $revenue4 = 0;
                            $revenue5 = 0;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $pid=$row['pid'];
                                    $query1="select * from plan where pid='$pid'";
                                    $result1=mysqli_query($con,$query1);
                                    $query2="select * from sessions WHERE  paid_date LIKE '$date%'";
                                    $result2=mysqli_query($con,$query2);
                                    $query3="select * from plan where pid='$pid1'";
                                    $result3=mysqli_query($con,$query3);
                                    $query4="select * from csessions WHERE  paid_date LIKE '$date%'";
                                    $result4=mysqli_query($con,$query4);
                                    $query5="select * from plan where pid='$pid2'";
                                    $result5=mysqli_query($con,$query5);
                                    $query6="select * from sessions2 WHERE  paid_date LIKE '$date%'";
                                    $result6=mysqli_query($con,$query6);
                                    $query7="select * from plan where pid='$pid3'";
                                    $result7=mysqli_query($con,$query7);
                                    $query8="select * from csessions2 WHERE  paid_date LIKE '$date%'";
                                    $result8=mysqli_query($con,$query8);
                                    $query9="select * from plan where pid='$pid4'";
                                    $result9=mysqli_query($con,$query9);
                                    $query10="select * from enrolls_to_day WHERE  paid_date LIKE '$date%'";
                                    $result10=mysqli_query($con,$query10);
                                    $query11="select * from plan where pid='$pid5'";
                                    $result11=mysqli_query($con,$query11);



                                    if($result1){
                                      
                                        $value=mysqli_fetch_row($result1);
                                    $revenue = $value[4] + $revenue;
                                    
                                    
                                    if($result2){
                                      
                                      $pid1=$row2['pid'];
                                      
                                    if($result3){
                                      
                                        $value1=mysqli_fetch_row($result3);
                                    $revenue1 = $value1[4] + $revenue1;
                                    
                                    }
                                    if($result4){
                                      
                                      $pid2=$row4['pid'];
                                      
                                      if($result5){
                                        
                                        $value2=mysqli_fetch_row($result5);
                                    $revenue2 = $value2[4] + $revenue2;
                                    
                                    }
                                    if($result6){
                                      
                                      $pid3=$row6['pid'];
                                      
                                      if($result7){
                                        
                                        $value3=mysqli_fetch_row($result7);
                                    $revenue3 = $value3[4] + $revenue3;
                                    
                                    
                                    if($result8){
                                      
                                      $pid4=$row16['pid'];
                                      
                                  if($result9){
                                    
                                      $value4=mysqli_fetch_row($result9);
                                  $revenue4 = $value4[4] + $revenue4;
                                  
                                  if($result10){
                                      
                                    $pid5=$row14['pid'];

                                    
                                    if($result11){
                                    
                                      $value5=mysqli_fetch_row($result11);
                                  $revenue5 = $value5[4] + $revenue5;
                                  
                                  $total=($revenue+$revenue1+$revenue2+$revenue3+$revenue4+$revenue5);
                                  

                               
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
                            
                            <?php echo $pid4?>
                                    <h2 class="color-white"><?php echo $total."฿"; ?></h2>
                                    <a href="revenue_month.php"> <h2 class="color-white">Current Revenue</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
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
                                    <a href="view_mem.php"><h2 class="color-white">Members Joined This Month</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-3">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                 
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from booking";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a href="view_booking.php"><h2 class="color-white">Reservations Today</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    
                                </div>
                                <div class="media-body media-text-right">
                                 
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from users where joining_date='$cdate'";

                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a href="view_mem.php"><h2 class="color-white">New Memberships Today</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                    
                        </div>
                        </div>

                        <div class="card">
  <h1 class="text-center">Line Chart Reports</h1>
                <div class="card-body row d-flex justify-content-center">
      
                
                <div class="card-body">
                    
      
        <div id="line2"  class='chart'></div>
      </div>
      </div>
        
      </div>
      
    </div>
  </div>
  </div>
  

  
  
  </div>
                        

                        

                     
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
