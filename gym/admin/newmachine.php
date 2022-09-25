<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Manage Gym Equipment</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Gym Equipment</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black9.jpg');
    height: 200px; width: 1600px;
  ">
  <h1 class="color-white mb-3 h1"><b>Gym Equipment</b></h1>
</div>
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <div class="col-md-5 align-self-center">
                                
                   

                    
                            <a href="new_add_machine.php"><button class="btn btn-primary" id="addProductModalBtn">Add Gym Equipment</button></a></div>
                            <form action="del_all_machine.php" method="POST">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
        <tr>
        <th style="width:1%;"><button type="submit" id="submit" name="stud_delete_multiple_btn" class="btn btn-danger btn-sm">Delete</button></th>
          <th style="width:10%;">S.No</th>
          <th style="width:10%;">Machine Condition</th>
          <th style="width:10%;">Types Of Equipment</th>
          <th style="width:10%;">Image</th>
          <th style="width:10%;">Serial No.</th>
          <th style="width:10%;">Model</th>
          <th style="width:10%;">Brand</th>
          <th style="width:10%;">Category</th>
          <th style="width:10%;">Vendor</th>
          <th style="width:10%;">Studio</th>
          <th style="width:10%;">Warranty</th>
          <th style="width:10%;">Price</th>
          <th style="width:10%;">Quantity</th>
          <th style="width:10%;">Subtotal</th>
          <th style="width:10%;">Maintenance Freq. Days</th>
          <th style="width:10%;">Machine Status</th>
          <th style="width:10%;">Action</th>
        </tr>
        
        
      </thead>  
      

        <tbody>
        <?php
          
          $query  = "select * from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  //$msgid = $row['machineid'];
                  $uido   = $row['machineid'];
                  $toe   = $row['toe'];
                  $query1  = "select * from toe where toeid='$toe'"; 
                      $result1 = mysqli_query($con, $query1);
                      
                      if (mysqli_affected_rows($con) == 1) {
                          while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                            
                            $toeid   = $row1['toeid'];
                            $toe   = $row['toe'];
                            $uid1   = $row['machineid'];
                            $mneed   = $row['mneed'];
                            $category   = $row1['categories'];
                            $vendor   = $row1['vendors'];
                            $studio   = $row['studio'];
                            $status   = $row['status'];
                            
                            $query2="select * from newmachine where machineid='$uid1'";
                      $result2=mysqli_query($con,$query2);
                      $query3="select * from toe where toeid='$toe'";
                      $result3=mysqli_query($con,$query3);
                      $query4="select * from newmachine where toe='$toeid'";
                      $result4=mysqli_query($con,$query2);
                      
                      if($result2){
                        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                        $toe   = $row2['toe'];
                        $uid   = $row2['machineid'];
                        if($result3){
                            $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                            if($result4){
                                $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                $uids   = $row4['machineid'];
                            $query5="select * from categories where categoryid='$category'";  
                            $result5=mysqli_query($con,$query5);

                            if($result5){
                                $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
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
                                        $expire=$row8['expire'];
                                        $pdate=$row8['paid_date'];
                                        $result9 = mysqli_query($con,"SELECT SUM(amount) AS value_sum FROM toe WHERE toeid='$toe'"); 
                                        $row9 = mysqli_fetch_assoc($result9); 
                                        $query10="select * from newmachine where mneed='1'";
                                        $result10 = mysqli_query($con,$query10); 
                                        $row10 = mysqli_fetch_assoc($result10); 
                                        $uid2   = $row10['machineid'];
                                        $sum = $row9['value_sum'];
                                        $today=date('Y-m-d');
                    $diff = abs(strtotime($expire) - strtotime($pdate));
                  $diff2 = date('z',$diff);
                  
                                        
                                        
                                            
                                                
                                            
                                ?>
                  
                  
                  
                  
                  <tr>
                  <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" onclick="Enable(this, 'delete1')" name="room_delete_id[]" value="<?= $row['machineid']; ?>">
                    <td><?php echo $sno ?></td>
                    <td class="text-center">
                    
                    <?php
           
                 
           if (strtotime(date("d-m-Y")) < strtotime($row8['expire'])){
            $query = $con->query("UPDATE newmachine SET mneed='0' WHERE machineid='".$uids."'");
            
            if($query){
            echo '<h3><span class="badge badge-success">'.$diff2.'  Days Left Until Warranty Void</span></h3>';
            }
            } else if (strtotime(date("d-m-Y")) > strtotime($row8['expire'] )) {
                $query1 = $con->query("UPDATE newmachine SET mneed='1' WHERE machineid='".$uids."'");
                
                
                echo '<h3><span class="badge badge-danger">WARRANTY VOID!!!</span></h3>';
            
            
               
              } else{
                $query1 = $con->query("UPDATE newmachine SET mneed='1' WHERE machineid='".$uids."'");
                echo '<h3><span class="badge badge-danger">WARRANTY VOID!!!</span></h3>';
            } 
            }
              
            }
        }
               
    
                    
                
                
            ?>
										
									</td>
                                    
                    <td><?php echo$row3 ['type']; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row1['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><?php echo$row2 ['machineid']; ?></td>
                     <td><?php echo $row3['toeName'] ?></td>
                     <!--<td width='100'><?php echo $row['description'] ?></td> -->
                     <td><?php echo$row3['brands'] ?></td>
                     <td><?php echo$row5['categoryName'] ?></td>
                     <td><?php echo$row6['vendorName'] ?></td>
                     <td><?php echo$row7['studioName'] ?></td>
                     <td width='100'><h3><b> <?php echo $row3['warranty'].' Years'?></b></h3> </td>
                     <td> <h3><b> <?php echo $row3['amount'].'฿'?> </b></h3></td>
                     <td width='100'> <h3><b><?php echo $row2['quantity']?></h3></b></td>
                     <td width='100'><h3><b><?php echo $row3['amount']* $row2['quantity'].'฿'?></h3></b></td>
                     <td width='100'><b><?php echo $row2['mainday'].' days'?></b></td>
                     <td><?php
                        if($row['status']=='1'){
                            echo '<p><a href="status_machine.php?machineid='.$row['machineid'].'&status=0" class="btn blue-gradient waves-effect waves-light">Active</a></p>';
                        } else{
                            echo '<p><a href="status_machine.php?machineid='.$row['machineid'].'&status=1" class="btn purple-gradient waves-effect waves-light">Inactive</a></p>';
                        }  ?> </td>
                     
                  
                     
                     
                  
                 
                 <td>
                 <a href="read_machine.php?id=<?php echo $row['machineid'];?>"><button type="button" class="btn btn-sm btn-secondary"  ><i class="fa fa-folder"></i></button></a>
                 <a href="edit_plan.php?id=<?php echo $row['machineid'];?>"><button type="button" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i></button></a>
                  <a href="del_newmachine.php?id=<?php echo $row['machineid'];?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash"></i></button></a>
                  <a href="read_maintenance.php?id=<?php echo $row['machineid'];?>"><button type="button" class="btn btn-sm btn-warning"   ><i class="fa fa-wrench"></i></button></a></td>
                  
                  
              <?php 
              $sno++; 
              $msgid = 0;
              $id = 0;
              }
            }
        }
    }
}
}
              }
            }
          
      
 


          
        
                   

          

    


             
          

          ?>  
          <div class="row">
          <div class="col-md-6">
          <div class="card bg-primary p-10">
                            <div class="media widget-ten">
                                <div class="media-left meida media-right">
                                </div>
                                <div class="media-body media-text-right">
                                
                                    <h2 class="color-white"><?php
                            
                            $result = mysqli_query($con, 'SELECT SUM(amount) AS value_sum FROM toe where toeid="$toe"'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
                            ?></h2>
                             <h2 class="color-white"><?php echo $row['value_sum']."฿"; ?></h2>
                                     <a><h2 class="color-white">Total Gym Equipment Price</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
          <div class="card bg-success p-10">
                            <div class="media widget-ten">
                                <div class="media-left meida media-right">
                                </div>
                                <div class="media-body media-text-right">
                                
                                    <h2 class="color-white"><?php
                            $query = "select COUNT(*) from toe";
                            
                            $result = mysqli_query($con, $query);
                            $i      = 1;
                            if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo $row['COUNT(*)'];
                                }
                            }
                            $i = 1;
                            ?></h2>
                                     <a><h2 class="color-white">Total Gym Equipment</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
              
           

        </tbody>

        <tbody>
        
      <tr>
       <th colspan="14"><h3><b>Total Price</b></h3></th>
          
                     <td> <h3><b><?php echo $row9['value_sum'].'฿'?></b></h3> </td>
                     <td</td>
                     
       
      </tr>
</tbody>  
                                      
                                    </table>
                                    
                                </div>
                            </div>
                        </div>

                        

                        
           
            <!-- Container fluid  -->
            
            

                        
               
                <!-- /# row -->

                <!-- End PAge Content -->

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
function maintenance(status){
    var status=parseInt(status);
    if (status == 0){
         document.getElementById("maintenance").disabled = true;   
    }

}
</script>

                
           

<?php include('../constant/layout/footer.php');?>
  

