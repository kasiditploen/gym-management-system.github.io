<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Classes</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid print-container">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="card ">
                            <div class="card-body">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                            <h1 class="color-blue"><b>AU FITNESS CENTER</b></h1>
                              <div class="widget-content">
            <div class="row-fluid ">
              <div class="span4 ">
                <table class="">
                  <tbody>
                    <tr>
                      <td><h4>AU FITNESS CENTER</h4></td>
                    </tr>
                    <tr>
                      <td>88 Moo 8<br> Bang Na-Trad Km. 26,<br> Bangsaothong Samuthprakarn</br> 10570 Thailand</td>
                    </tr>
                    
                    <tr>
                      <td>Tel:  +66 2 723 2323</td>
                    </tr>
                    <tr>
                      <td >Email: abac@au.edu</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                              <button class="btn btn-danger col-sm-2 sm-0" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                              <h1>Class Information</h1>
                            <h3>
                              Details of : - <?php
      $id     = $_GET['id'];;
      $query  = "select * from classes WHERE classid='$id'";
      //echo $query;
      $result = mysqli_query($con, $query);

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              
            $classid=$row['classid'];
            $name = $row['className'];
              $desc=$row['description'];
              $classtype=$row['classtype'];
              $dow=$row['dow'];
              $timefrom=$row['time_from'];
              $timeto=$row['time_to'];
              echo $name;
              $query4="select COUNT(*) from checkin where userid='$id'";
                  $result4=mysqli_query($con,$query4);
                  if($result4){
                    $row3=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                    $countCheckin = $row3['COUNT(*)'];
          }
      }
    }
      ?></h3>
                                <div class="table-responsive m-t-40">
                                    <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
        
         <th>Class ID</th>
          <th>Name</th>
          <th>Description</th>
            <th>Class Type</th>
            <th>Training Day(s)</th>
          <th>Time From</th>
          <th>Time To</th>
        </tr>
      </thead>    
        <tbody>
         
                  <tr>
                  
                    <td><?php  echo $classid; ?></td>
                     <td><?php echo $name; ?></td>
                     <td><?php echo $desc; ?></td>
                     <td><?php echo $classtype; ?></td>
                     <td><?php echo $dow; ?></td>
                     <td><?php echo $timefrom; ?> </td>
                     <td><?php echo $timeto; ?> </td>
                 </tr>
                  
             

        </tbody>
                                      
                                    </table>
                                    <br>
                                    <br>
                                    <h3>Class Participation history of : - <?php echo $name;?></h3>
                                               <table class="table table-bordered table-striped">
                                        <thead>
        <tr>
         <th>Sl.No</th>
          <th>Member ID</th>
          <th>Image</th>
          <th>Member Name</th>
          <th>Enrollment Date</th>
          <th>Time From</th>
          <th>Time To</th>
          
        </tr>
      </thead>    
        <tbody>
          <?php
            
            $query1  = "select * from classholder WHERE classid='$classid'";
            //echo $query;
            $result = mysqli_query($con, $query1);
            $sno    = 1;

            if (mysqli_affected_rows($con) != 0) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  $userid=$row['userid'];
                  $query2="select * from users where userid='$userid'";
                  $result2=mysqli_query($con,$query2);
                  if($result2){
                    $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);?>
         
                  <tr>
                    <td><?php  echo  $sno; ?></td>
                     <td><?php echo$row1['userid']; ?></td>
                     <td><?php echo '<img src="data:image;base64,'.base64_encode($row1['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td width='380'><?php echo $row1['username']; ?></td>
                     <td><?php echo $row['created_date']; ?></td>
                     <td><?php echo $row['time_from']; ?> </td>
                     <td><?php echo $row['time_to']; ?> </td>
                    
                 </tr>
                 <?php 
                 $sno++;
                }  
              $memid = 0;
                }
                
            }

          ?>      

        </tbody>
                                      
                                    </table>

                                    <style>


@media print {
  body * {
    visibility: hidden;
  }

  .print-container, .print-container * {
    visibility: visible;
  }

  .print-container {
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
  }
  
}
</style>
                                    
                                    
                           
               
                <!-- /# row -->

               
                                    

                                    

                                    

                <!-- End PAge Content -->
           

<?php include('../constant/layout/footer.php');?>
  

