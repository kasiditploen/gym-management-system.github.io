<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>
<?php include('../constant/layout/sidebar_trainer.php');
?>
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                
                
            
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="bg-image .hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black9.jpg');
    height: 150px; width: auto;
  ">
  <h1 class="color-white mb-3 h1"><span class="badge badge-pill badge-dark"><b>Gym Equipment</b></span></h1>
</div>
                <!-- /# row -->
                 <div class="card">
                            <div class="card-body">
                            <div class="col-md-5 align-self-center">
                                
                   

                    
                            <a href="new_add_machine.php"><button class="btn btn-light" id="addProductModalBtn">Add Gym Equipment</button></a></div>
                            
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table ">
                                        <thead>
        <tr>
        
          <th style="width:10%;">S.No</th>
          <th style="width:10%;">Machine Condition</th>
          <th style="width:10%;">Types Of Equipment</th>
          <th style="width:10%;">Image & S/N.</th>
          <th style="width:10%;">Model</th>
          <th style="width:10%;">Brand</th>
          <th style="width:10%;">Category</th>
          <th style="width:10%;">Vendor</th>
          <th style="width:10%;">Studio</th>
          <th style="width:10%;">Quantity</th>
          <th style="width:10%;">Maintenance Freq. Days</th>
        </tr>
        
        
      </thead>  
      

        <tbody>
        <?php
          
          $query  = "select * from newmachine";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          $revenue = 0;

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
                            
                            $uid1   = $row['machineid'];
                            $mneed   = $row['mneed'];
                            $category   = $row1['categories'];
                            $vendor   = $row1['vendors'];
                            $studio   = $row['studio'];
                            $status   = $row['status'];
                            
                            $query2="select * from newmachine where machineid='$uid1'";
                            $con->query("UPDATE newmachine SET subtotal='".$extotal."' WHERE machineid='".$uids."'");
                      $result2=mysqli_query($con,$query2);
                      
                      
                      
                      
                      if($result2){
                        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                        $subtotal=$row2['subtotal'];
                        $toee   = $row2['toe'];
                        $uid   = $row2['machineid'];
                        $query3="select * from newmachine n  INNER JOIN toe t on n.toe=t.toeid where t.toeid='$toe'";
                      $result3=mysqli_query($con,$query3);
                        if($result3){
                            $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                            $extotal=$row3['amount']* $row2['quantity'];
                            
                            $query4="select * from newmachine where toe='$toeid'";

                      $result4=mysqli_query($con,$query2);
                      
                            
                                    $revenue = $subtotal+$revenue;
                            
                            if($result4){
                                $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                $uids   = $row4['machineid'];
                                $value=mysqli_fetch_row($result2);
                            $value1=mysqli_fetch_row($result3);
                            $query5="select * from categories where categoryid='$category'";  
                            $result5=mysqli_query($con,$query5);

                            if($result5){
                                $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                            

                            
                                $query7="select * from studio where studioid='$studio'";  
                                $result7=mysqli_query($con,$query7);
                                if($result7){
                                    $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                    $query8="select * from enrolls_to_maintenance where machineid='$uid' and renewal='yes'";  
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
                  
                                        
                                        
                  $total=($revenue);  
                  $query9="select * from enrolls_to_warranty where machineid='$uid' ";  
                            $result9=mysqli_query($con,$query9);
                                    if($result9){
                                        $row9=mysqli_fetch_array($result9,MYSQLI_ASSOC);
                                        $active = $row9['active'];
                                        $expire9 = $row9['expire'];
                                ?>
                      
                      
                  
                  
                  <tr>
                  
                    <td><?php echo $sno ?></td>
                    <td class="text-center">
                    
                    <?php
                   $zoo = 0;
                 
           if (strtotime(date("d-m-Y")) < strtotime($row8['expire'])){
            $query = $con->query("UPDATE newmachine SET mneed='0' WHERE machineid='".$uids."'");
            $zoo = 0;
            if($query){
                $zoo = 0;
            
            } else if (strtotime(date("d-m-Y")) > strtotime($row8['expire'] )) {
                $query1 = $con->query("UPDATE newmachine SET mneed='1' WHERE machineid='".$uids."'");
                
                $zoo = 1;
            
               
              } else if ($expire9 <= $cdate) {
                $query1 = $con->query("UPDATE newmachine SET mneed='1' WHERE machineid='".$uids."'");
                        $query2 = $con->query("UPDATE enrolls_to_warranty SET active='no' WHERE machineid='".$uids."'");
                        $zoo = 1;
            } 
            }
        }
              
            }
        }

        if ($zoo == 0){
            echo '<h4><span class="badge badge-light "><h2><b>'.$diff2.' Days</b></h2>   Left Until Maintenance</span></h4>';
        } else if ($zoo == 1){
            echo '<h4><span class="badge badge-danger ">WARRANTY VOID!!!</span></h4>';
        }
        
        if($row['mneed']=='1'){
            echo '<p><h3><span class="badge  badge-red"><b>Maintenance<br> Enabled</b></span></h3></p>';
        } else{
            echo '<p><h3><span class="badge  badge-light"><b>Maintenance<br> Disabled</b></span></h3></p>';
        }  

        if($diff2 <= 15){
            $query1 = $con->query("UPDATE newmachine SET mneed='1' WHERE machineid='".$uids."'");
            echo '<h4><span class="badge badge-warning ">Maintenance Needed</span></h4>';
            
            } else if($diff2 > 15){
                echo '<br><h3><span class="badge badge-success"> Good Condition </span></h3>';
            
            
               
              } else{
                
                echo '<br><h3><span class="badge badge-danger">Maintenance Immediately!!!</span></h3>';
                $query1 = $con->query("UPDATE newmachine SET mneed='1' and status='0' WHERE machineid='".$uids."'");
            } 

            
                        
               
    
                    
                
                
            ?>
										
									</td>
                                    
                    <td><?php echo$row3 ['type']; ?></td>
                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row1['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?>
                <br>
                <h2><span class="badge badge-pill badge-dark">S/N: <?php echo$row2 ['machineid']; ?></span></h2>
            </td>
                     
                     <td><?php echo $row3['toeName'] ?></td>
                     <!--<td width='100'><?php echo $row['description'] ?></td> -->
                     <td><?php echo$row3['brands'] ?></td>
                     <td><?php echo$row5['categoryName'] ?></td>
                     <td><?php echo$row3['vendors'] ?></td>
                     <td><?php echo$row7['studioName'] ?></td>
                     <td width='100'> <h3><b><?php echo $row2['quantity']?></h3></b></td>
                     <td width='100'><b><?php echo $row2['mainday'].' days'?></b></td>
                     
                     
                  
                     
                     
                  
                 
                 
                  
                  
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
         
              
           

        </tbody>

        <tbody>
        
      
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
  

