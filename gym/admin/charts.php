
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<?php
          $query0  = "select * from users";
          //echo $query;
          $result0 = mysqli_query($con, $query0);
          $sno    = 1;
          
          

          if ($result0){
            $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
                $userid1=$row0['userid'];
                $query1  = "select * from users where userid = '$userid1'";
          //echo $query;
          $result1 = mysqli_query($con, $query1);
if ($result1){
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $userid=$row['userid'];
}
              }
            
                ?>

<?php
          $query0  = "select * from plan";
          //echo $query;
          $result0 = mysqli_query($con, $query0);
          $sno    = 1;
          
          

          if ($result0){
            $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
                $pid1=$row0['pid'];
                $query1  = "select * from plan where pid = '$pid1'";
          //echo $query;
          $result1 = mysqli_query($con, $query1);
if ($result1){
    $row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $pid=$row['pid'];
}
              }
            
                ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  $qry="SELECT gender, count(*) as number FROM users GROUP BY gender";
$result=mysqli_query($con,$qry);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["gender"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Male and Female AU Fitness Members',  
                      //is3D:true,  
                      pieHole: 0.0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>

<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  $qry="SELECT classtype, count(*) as number FROM classes GROUP BY classtype";
$result=mysqli_query($con,$qry);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["classtype"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Class Type in AU Fitness Members',  
                      //is3D:true,  
                      pieHole: 0.0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
           </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  $qry="SELECT *, count(t.trainerid) as number FROM privateclasses p
                          INNER JOIN trainers t on t.trainerid = p.trainerid
                           GROUP BY t.trainerid";
$result=mysqli_query($con,$qry);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["username"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Most Selected Personal Trainer in AU Fitness Members',  
                      //is3D:true,  
                      pieHole: 0.0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script>

<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  $qry="SELECT *, sum(t.amount) as number FROM toe t
                          INNER JOIN newmachine n on t.toeid = n.toe



                           GROUP BY t.type";
$result=mysqli_query($con,$qry);
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["toeName"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Most Expensive Gym Equipment in AU Fitness Members',  
                      //is3D:true,  
                      pieHole: 0.0 
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }  
           </script>

           <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Terms', 'Total Amount',],
          
          <?php
          $query1 = "SELECT *, SUM(p.amount) as numberone FROM plan p
           INNER JOIN users u
            INNER JOIN enrolls_to e ON u.userid = e.uid
            INNER JOIN sessions s ON u.userid = s.userid
            INNER JOIN csessions c ON u.userid = c.userid
            where u.userid='$userid' and s.pid = p.pid or e.pid = p.pid or c.pid = p.pid
            GROUP BY  u.userid;";

            $rezz=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz)){
              $services='Earnings';
              $numberone=$data['numberone'];
              // $numbertwo=$data['numbertwo'];
           ?>
           ['<?php echo $services;?>',<?php echo $numberone;?>,],   
           <?php   
            }
           ?> 

      <?php
          $query10 = "SELECT *, SUM(t.amount) as numbert FROM toe t
          INNER JOIN newmachine n on t.toeid = n.toe
          GROUP BY t.type";
            $res1000=mysqli_query($con,$query10);
            while($data=mysqli_fetch_array($res1000)){
              $expenses='Expenses';
              $numbert=$data['numbert'];
              
           ?>
           ['<?php echo $expenses;?>',<?php echo $numbert;?>,],   
           <?php   
            }
           ?> 

          
        ]);

        var options = {
         
          width: "1350",
          legend: { position: 'none' },
          
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Total'} // Top x-axis.
            }
          },
          bar: { groupWidth: "100%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_y_div'));
        chart.draw(data, options);
      };


      
    </script>
<body>
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');

?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Charts</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Charts</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="card">
                <h1 class="text-center">Earnings & Expenses</h1>
                <div class="card-body">
      
        <div id="top_y_div" style="width: 700px; height: 300px;"></div>
      </div>
    </div>
  

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
                                $query8="select * from privateclasses where userid='$uid' and  date_from LIKE '$cdate%'";
                              $result8=mysqli_query($con,$query8);
                              if($result8){
                                $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                $privateclassname=$row8['className'];
                                $time_from=$row8['time_from'];
                                $time_to=$row8['time_to'];
                                $query9="select * from trainers";
                                $result9=mysqli_query($con,$query9);
                                if($result9){
                                  $row9=mysqli_fetch_array($result9,MYSQLI_ASSOC);
                                  $trainerid=$row9['trainerid'];
                                  $query10="select * from classes where trainerid='$trainerid'";
                                $result10=mysqli_query($con,$query10);
                                if($result10){
                                  $row10=mysqli_fetch_array($result10,MYSQLI_ASSOC);
                                  $classid=$row10['classid'];
                                  $classname=$row10['className'];
                                  $tfrom=$row10['time_from'];
                                  $tto=$row10['time_to'];
                                  $query11="select * from booking where userid='$uid' and trainerid='$trainerid'";
                                $result11=mysqli_query($con,$query11);
                                if($result11){
                                  $row11=mysqli_fetch_array($result11,MYSQLI_ASSOC);
                                  $bookedclassname=$row11['className'];
                                  $tfrom1=$row11['time_from'];
                                  $tto1=$row11['time_to'];
                                  $query12="select * from classholder where userid='$uid' and trainerid='$trainerid' and classid='$classid'";
                                $result12=mysqli_query($con,$query12);
                                if($result12){
                                  $row12=mysqli_fetch_array($result12,MYSQLI_ASSOC);
                                  $classid1=$row12['classid'];
                                  $classname1=$row12['className'];
                                  $create_date1=$row12['created_date'];
                                  $query13="select * from classholder where userid='$uid' and trainerid='$trainerid' and classid='$classid' and created_date LIKE '$cdate%'";
                                $result13=mysqli_query($con,$query13);
                                if($result13){
                                  $row13=mysqli_fetch_array($result13,MYSQLI_ASSOC);
                                  $tfrom2=$row13['time_from'];
                                  $tto2=$row13['time_to'];


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
                                    
                                    }
                                    if($result8){
                                      
                                      $pid4=$row8['pid'];
                                      
                                  if($result9){
                                    
                                      $value4=mysqli_fetch_row($result9);
                                  $revenue4 = $value4[4] + $revenue4;
                                  }
                                  $total=($revenue+$revenue1+$revenue2+$revenue3+$revenue4);
                                  
                                  
                                  
                                  }

                                    }
                                }
                            }
                          }
                        }
                      }
                           
                            ?>
                            
                            
                                    <h2 class="color-white"><?php echo $total."฿"; ?></h2>
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
                        <div class="card bg-success color-block mb-3 mx-auto p-20">
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

  
  <div class="card">
  <h1 class="text-center">Pie Chart Reports</h1>
                <div class="card-body row d-flex justify-content-center">
      
        <div id="piechart" class="text-center" style="width: 700px; height: 300px;"></div>
        <div id="piechart1" class="text-center" style="width: 700px; height: 300px;"></div>
        <div id="piechart2" class="text-center" style="width: 700px; height: 300px;"></div>
        <div id="piechart3" class="text-center" style="width: 700px; height: 300px;"></div>
        
      </div>
      
    </div>
  </div>
 
  

  
  
  </div>



  

                
               
                <!-- /# row -->

                <!-- End PAge Content -->
   

<?php include('../constant/layout/footer.php');?>
  

 