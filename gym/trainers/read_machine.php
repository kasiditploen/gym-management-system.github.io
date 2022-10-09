<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Machine</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Machine</li>
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
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                              <h1>Machine Information</h1>
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
                
              
                                        
                                        
                                        
                                            
                                                
                                            
                                ?>
      </h3>
                                <div class="table-responsive m-t-40">
                                    <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
        <th>Machine Photo</th>
        <th>Model</th>
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
                     <td><?php echo $name; ?></td>
                     <td><?php echo $desc; ?></td>
                     <td><?php echo $brand; ?></td>
                     <td><?php echo $category; ?></td>
                     <td><?php echo $warranty.' Years'; ?></td>
                     
                     <td><?php
                        if($row2['status']=='1'){
                            echo '<p><a href="status_machine.php?machineid='.$row2['machineid'].'&status=0" class="btn blue-gradient waves-effect waves-light">Active</a></p>';
                        } else{
                            echo '<p><a href="status_machine.php?machineid='.$row2['machineid'].'&status=1" class="btn purple-gradient waves-effect waves-light">Inactive</a></p>';
                        }  ?> </td>
                 </tr>
                  
             

        </tbody>
                                      
                                    </table>
                                    <br>
                                    <br>
                                    <h3>Payment history of : - <?php echo $name."(ALL)";?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
          
          
          <th>Payment Date</th>
          <th>Maintenance Frequency</th>
          <th>Maintenance Expire Date</th>
        </tr>
      </thead>    
        <tbody>
          <?php
          $query  = "select * from enrolls_to_maintenance";
          
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
           

           
                  ?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                     
                     
                     <td width='380'><?php echo $row['paid_date']; ?></td>
                     <td><?php echo$row['wid'].' Days'; ?></td>
                     <td><?php echo $row['expire']; ?></td>
                    
                     
                     
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
           

<?php include('../constant/layout/footer.php');?>
  

