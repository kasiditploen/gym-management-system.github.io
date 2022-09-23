<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Maintenance</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Maintenance</li>
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
                            <button class="btn btn-primary" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                              <h1>Machine Maintenance</h1>
                            <h3>
                              Details of : - 
                              <?php
           $id     = $_GET['id'];;
           $query  = "select * from newmachine where machineid='$id'";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  //$msgid = $row['machineid'];
                  
                  $toe   = $row['toe'];
                  $query1  = "select * from toe where toeid='$toe'"; 
                      $result1 = mysqli_query($con, $query1);
                      
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            $uid   = $row['machineid'];
                            $toeid   = $row1['toeid'];
                            $toe   = $row['toe'];
                            $category   = $row1['categories'];
                            $vendor   = $row1['vendors'];
                            $studio   = $row['studio'];
                            
                            
                            
                            
                            $query2="select * from newmachine where toe='$toeid'";
                      $result2=mysqli_query($con,$query2);
                      $query3="select * from toe where toeid='$toe'";
                      $result3=mysqli_query($con,$query3);
                      $query4="select * from newmachine where toe='$toeid'";
                      $result4=mysqli_query($con,$query2);
                      
                      if($result2){
                        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                        $u2id   = $row2['machineid'];
                        $toe   = $row2['toe'];
                        $status   = $row2['status'];
                        $warranty   = $row1['warranty'];
                        
                        if($result3){
                            $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                            $image = $row3['image'];
                            $name = $row3['toeName'];
                            $toeid=$row3['toeid'];
                            $desc=$row3['description'];
                            $brand  = $row3['brands'];
                            echo $name;
                            if($result4){
                                $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);

                            $query5="select * from categories where categoryid='$category'";  
                            $result5=mysqli_query($con,$query5);

                            if($result5){
                                $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                $category   = $row5['categoryName'];
                            $query6="select * from vendors where vendorid='$vendor'";  
                            $result6=mysqli_query($con,$query6);

                            if($result6){
                                $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                $query7="select * from studio where studioid='$studio'";  
                                $result7=mysqli_query($con,$query7);
                                if($result7){
                                    $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                    $query8="select * from enrolls_to_maintenance where machineid='$uid'";  
                            $result8=mysqli_query($con,$query8);
                                    if($result8){
                                        $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                        $result9 = mysqli_query($con,"SELECT SUM(amount) AS value_sum FROM toe WHERE toeid='$toe'"); 
                                        $row9 = mysqli_fetch_assoc($result9); 
                                        $sum = $row9['value_sum'];
                                    
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
      </h3>
                                <div class="table-responsive m-t-40">
                                    <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
        <th>Machine Photo</th>
        <th>Model ID</th>
         <th>Serial No.</th>
         <th>Model Name</th>
          <th>Description</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Warranty</th>
          <th>Status</th>
        </tr>
      </thead>    
        <tbody>
         
                  <tr>
                  <td><?php  echo '<img src="data:image;base64,'.base64_encode($image).'" alt="Image" style="width: 80px; height: 80px;" >'; ?></td>
                    <td><?php  echo $toeid; ?></td>
                    <td><?php  echo $u2id; ?></td>
                     <td><?php echo $name; ?></td>
                     <td><?php echo $desc; ?></td>
                     <td><?php echo $brand; ?></td>
                     <td><?php echo $category; ?></td>
                     <td><?php echo $warranty.' Years'; ?></td>
                     
                     <td><?php
                        if($row2['status']=='1'){
                            echo '<p><a href="status_maintenance.php?machineid='.$row2['machineid'].'&status=0" class="btn blue-gradient waves-effect waves-light">Active</a></p>';
                        } else{
                            echo '<p><a href="status_maintenance.php?machineid='.$row2['machineid'].'&status=1" class="btn purple-gradient waves-effect waves-light">Inactive</a></p>';
                        }  ?> 

                         
                 </tr>

                 
                  
             

        </tbody>
                                      
                                    </table>
                                    <br>
                                    <br>
                                    <h3>Repair History of : - <?php echo $name;?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
          
         <th>Serial No.</th>
          <th>Payment Date</th>
          <th>Start Time</th>
          <th>Finish Time</th>
          <th>Maintenance Frequency (Time)</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $query  = "select * from enrolls_to_maintain";
          
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
           

           
                  ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                     
                    <td width='380'><?php echo $row['machineid']; ?></td>
                     <td width='380'><?php echo $row['main_date']; ?></td>
                     <td width='380'><?php echo $row['start_date']; ?></td>
                     <td width='380'><?php echo $row['duration']; ?></td>
                     <td><?php echo$row['wid'].' Days'; ?></td>
                     <!--<td><?php echo $row['expire']; ?></td>-->
                    
                     
                     
                 </tr>
                 <?php 
                 $sno++;
                }  
              $uid = 0;
                }
           
      

          ?>      

        </tbody>
                                      
                                    </table>

                                </div>
                            </div>
                        </div>
               
                <!-- /# row -->

                <!-- End PAge Content -->

                <div class="card">
                            <div class="card-body">
                            <div class="col-md-5 align-self-center">
                                
                   

                    
                             
<h1 class="color-red"><b></b>Maintenance Records</h1>

<div><a href="new_maintain.php?id=<?php echo $row['machineid'];?>"><button class="btn btn-secondary" id="addProductModalBtn">Maintain/Repair</button></a>
                            <a href="new_add_machine.php"><button class="btn btn-danger" id="addProductModalBtn">Replace</button></a></div></div></div>
                            <form action="del_all_machine.php" method="POST">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
        <tr>
          
        <th>Sl.No</th>
          <th style="width:10%;">Maintenance Progress</th>
          <th style="width:10%;">MAINTAIN ORDER</th>
          <th style="width:10%;">MAINTAIN ID</th>
          <th style="width:10%;">Maintain Name</th>
          <th style="width:10%;">SERIAL NO.</th>
          <th style="width:10%;">Maintenance Freq. Days</th>
          <th style="width:10%;">Duration Time</th>
          <th style="width:10%;">Action</th>
          
          
          
        </tr>
        
        
      </thead>  
      

        <tbody>
        <?php
              $query  = "select * from maintain ORDER BY maintainid";
              $result = mysqli_query($con, $query);
              $query1  = "select * from enrolls_to_maintain";
              $result1 = mysqli_query($con, $query1);
              $sno    = 1;
              
              
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                      $duration  = $row1['duration'];      
                      date_default_timezone_set("Asia/Bangkok"); 
                        

                                ?>



                  
                  <tr>
                  
                    <td style="width:10%;"><?php echo $sno; ?></td>
                    <td><?php if (date("h:i:s") <= $duration){
                                            echo '<h1><span class="badge badge-dark">In Progress</span></h1>';
                                        } else  if (date("h:i:s") >= $duration){
                                            echo '<h1><span class="badge badge-success">Complete</span></h1>';
                                        }else {
                                          echo '<h1><span class="badge badge-success"></span></h1>';
                                        }
                                    
                                       ?></td>
                                       <td><h4><?php echo $row1['etmt_id']; ?></h4></td>
                    <td><?php echo $row['maintainid']; ?></td>
                     <td><?php echo $row['maintainName']; ?></td>
                     <td><?php echo $row['machineid']; ?></td>
                     <td><h4><?php echo $row['mainday'],' days'; ?></h4></td>
                     <td><h4><?php echo $row['duration'],' minutes'; ?></h4></td>
                    
                       

                       <!--<td><button type="button" class="btn btn-s btn-success">Active</button> </td> -->

                       
                       
                    
                  
                                    </form>
                 <td>
                    <!-- Split button -->
                    

<!--<a href="read_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-folder-open"></i></button></a>-->
                  <!--<a href="edit_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>-->
                  <?php
                        if($row['status']=='1'){
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=0" class="btn blue-gradient waves-effect waves-light">Enabled</a></p>';
                        } else{
                            echo '<p><a href="status_quick.php?userid='.$row['userid'].'&status=1" class="btn purple-gradient waves-effect waves-light">Disabled</a></p>';
                        }  ?> 
                 
                  

                  
                  <a href="del_member.php?id=<?php echo $row['userid'];?>"><button type="button" class="btn btn-xs btn-danger"onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a></td></tr>
                  







                 
                                    
                  


                  
              <?php 
              $sno++; 
              $msgid = 0;
              $memid = 0;
                       
                    }
                }  
              }
            
          ?>  

          

        </tbody>
        
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
           

<?php include('../constant/layout/footer.php');?>
  
                   