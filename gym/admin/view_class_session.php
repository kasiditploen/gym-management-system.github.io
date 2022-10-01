<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>



  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Group Classes (Sessions)</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Group Classes (Sessions)</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black8.jpg');
    height: 300px; width: auto;
  ">
  <h1 class="color-white mb-3 h1 text-center"><b>Group Class Training</b></h1>
</div>
                <!-- /# row -->
                <div class="card">
                            <div class="card-body">
                            <h2 class="color-black mb-3 h1 text-center d-flex justify-content-center">CARDIO</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_class.php" method="POST">
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
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Cardio' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result4=mysqli_query($con,$query4);
                            $query5="SELECT b.userid, count(*)  FROM booking b
                            inner join classes cl
                            on b.classid = cl.classid
                            WHERE b.approved='yes' and b.classid = cl.classid or b.userid ='$userid'";
                            $result5=mysqli_query($con,$query5);
                            $query6="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result6=mysqli_query($con,$query6);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      $count1   = $row4['count(*)'];
                                      if($result5){
                                        $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                        $bookingid = $row5['bookingid'];
                                        $count2   = $row5['count(*)'];
                                        $count = $count1 + $count2;
                                        if($result6){
                                          $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                          $count3   = $row6['count(*)'];
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       
                       
                  
                  
                  
                 <td>

                 <a href="read_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-folder-open"></i></button></a>
                  
                  <a href="edit_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black mb-3 h1 text-center d-flex justify-content-center">HIIT</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_class.php" method="POST">
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    
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
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='HIIT' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result4=mysqli_query($con,$query4);
                            $query5="SELECT b.userid, count(*)  FROM booking b
                            inner join classes cl
                            on b.classid = cl.classid
                            WHERE b.approved='yes' and b.classid = cl.classid or b.userid ='$userid'";
                            $result5=mysqli_query($con,$query5);
                            $query6="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result6=mysqli_query($con,$query6);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      $count1   = $row4['count(*)'];
                                      if($result5){
                                        $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                        $bookingid = $row5['bookingid'];
                                        $count2   = $row5['count(*)'];
                                        $count = $count1 + $count2;
                                        if($result6){
                                          $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                          $count3   = $row6['count(*)'];
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       
                       
                  
                  
                  
                 <td>

                 <a href="read_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-folder-open"></i></button></a>
                  
                  <a href="edit_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black mb-3 h1 text-center d-flex justify-content-center">Dance</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_class.php" method="POST">
                                    <table id="dt-all-checkbox1" class="table table-bordered table-striped">
                                    
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
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Dance' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result4=mysqli_query($con,$query4);
                            $query5="SELECT b.userid, count(*)  FROM booking b
                            inner join classes cl
                            on b.classid = cl.classid
                            WHERE b.approved='yes' and b.classid = cl.classid or b.userid ='$userid'";
                            $result5=mysqli_query($con,$query5);
                            $query6="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result6=mysqli_query($con,$query6);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      $count1   = $row4['count(*)'];
                                      if($result5){
                                        $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                        $bookingid = $row5['bookingid'];
                                        $count2   = $row5['count(*)'];
                                        $count = $count1 + $count2;
                                        if($result6){
                                          $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                          $count3   = $row6['count(*)'];
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       
                       
                  
                  
                  
                 <td>

                 <a href="read_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-folder-open"></i></button></a>
                  
                  <a href="edit_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <h2 class="color-black mb-3 h1 text-center d-flex justify-content-center">Mind and Body</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary">Add Class</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_class.php" method="POST">
                                    <table id="dt-bordered2" class="table table-bordered table-striped">
                                    
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
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Mind and Body' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result4=mysqli_query($con,$query4);
                            $query5="SELECT b.userid, count(*)  FROM booking b
                            inner join classes cl
                            on b.classid = cl.classid
                            WHERE b.approved='yes' and b.classid = cl.classid or b.userid ='$userid'";
                            $result5=mysqli_query($con,$query5);
                            $query6="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result6=mysqli_query($con,$query6);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      $count1   = $row4['count(*)'];
                                      if($result5){
                                        $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                        $bookingid = $row5['bookingid'];
                                        $count2   = $row5['count(*)'];
                                        $count = $count1 + $count2;
                                        if($result6){
                                          $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                          $count3   = $row6['count(*)'];
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       
                       
                  
                  
                  
                 <td>

                 <a href="read_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-folder-open"></i></button></a>
                  
                  <a href="edit_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
                
              
            
            
        
          
        
            
          ?>  

        </tbody>
       
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- /# row -->
                 <div class="card">
                            <div class="card-body ">
                            <h2 class="color-black mb-3 h1 text-center d-flex justify-content-center">Cycling</h2></a>
                            <a href="new_class.php"><button class="btn btn-primary ">Add Class</button></a>
                            
                         
                                <div class="table-responsive m-t-40">
                                <form id="form1" action="del_all_class.php" method="POST">
                                    <table id="dt-bordered3" class="table table-bordered table-striped">
                                    
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
        <th style="width:1%;"><input type="checkbox" id="select-all" /></th>
         <th>Sl.No</th>
          <th>Class ID</th>
          <th>Class</th>
          <th>Description</th>
          <th>Studio</th>
          <th>Days Of Week</th>
          <th>Date From</th>
          <th>Date To</th>
          <th>Time From</th>
          <th>Time To</th>
          <th>By Trainer:</th>
          <th>Pending</th>
          <th>Enrolled</th>
          <th>Action</th>
        </tr>

        
              
              
      </thead>    

      
        <tbody>
        <?php
              $query  = "select * from classes WHERE classtype='Cycling' and active='yes'";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $uid   = $row['classid'];

                  $query2="select studioid,studioName from studio";
                            $result2=mysqli_query($con,$query2);
                            $query3="select trainerid,username from trainers";
                            $result3=mysqli_query($con,$query3);
                            $query4="SELECT userid, count(*)  FROM classholder where classid='$uid' and created_date='$cdate'";
                            $result4=mysqli_query($con,$query4);
                            $query5="SELECT b.userid, count(*)  FROM booking b
                            inner join classes cl
                            on b.classid = cl.classid
                            WHERE b.approved='yes' and b.classid = cl.classid or b.userid ='$userid'";
                            $result5=mysqli_query($con,$query5);
                            $query6="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result6=mysqli_query($con,$query6);
                            
                      
                      
                            if($result2){
                                $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                if($result3){
                                    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                                    if($result4){
                                      $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                      $count1   = $row4['count(*)'];
                                      if($result5){
                                        $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                        $bookingid = $row5['bookingid'];
                                        $count2   = $row5['count(*)'];
                                        $count = $count1 + $count2;
                                        if($result6){
                                          $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                          $count3   = $row6['count(*)'];
                                    
                                ?>
                    
                  
                    
                    <tr>
                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="class_delete_classid[]" value="<?= $row['classid']; ?>">
                      <td><?php echo $sno ?></td>
                       <td><?php echo$row ['classid']; ?></td>
                       <td><?php echo $row['className'] ?></td>
                       <td width='380'><?php echo $row['description'] ?></td>
                       <td><?php echo $row2['studioName'] ?></td>
                       <td><?php echo$row ['dow']; ?></td>
                       <td><?php echo $row['date_from'] ?></td>
                       <td><?php echo $row['date_to'] ?></td>
                       <td><?php echo $row['time_from'] ?></td>
                       <td><?php echo $row['time_to'] ?></td>
                       <td><?php echo $row3['username'] ?></td>
                       <td><?php echo $count3  ?></td>
                       <td><h2><span class="badge badge-danger"><?php echo $count ?>/<?php echo $row['classcap'] ?></span"></h2></td>
                       
                       
                  
                  
                  
                 <td>

                 <a href="read_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-folder-open"></i></button></a>
                  
                  <a href="edit_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-sm btn-danger" ><i class="fa fa-pencil"></i></button></a>
                 
                  <a href="del_class.php?id=<?php echo $row['classid'];?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  
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
$('#submit1').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit1').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit1').attr('disabled',true);}
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

<script>
$('#submit4').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit4').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit4').attr('disabled',true);}
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
    
    $(document).ready(function () {
  $('#dt-all-checkbox1').dataTable({

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
  $('#dt-bordered2').dataTable({

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
  $('#dt-bordered3').dataTable({

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




    
           

<?php include('../constant/layout/footer.php');?>


