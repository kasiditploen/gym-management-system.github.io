
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="popup_style.css">
  
<?php
              $query  = "select * from enrolls_to_warranty";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;

              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      $etw_id  = $row['etw_id'];
                      $machineid  = $row['machineid'];
                      $activeA = $row['active'];
                     
                  //$msgid = $row['pid'];
                  //foreach($result and $result1 as $row)
                              }
                            }
                            ?>
                      


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
                    <h3 class="text-primary">Add New Machine Maintain</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add New Machine Maintain</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <?php
          $id     = $_GET['id'];;
          $query  = "select * from newmachine where machineid = '$id'";
          //echo $query;
          $result = mysqli_query($con, $query);
          $sno    = 1;
          
          

          if (mysqli_affected_rows($con) != 0) {
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                  //$msgid = $row['machineid'];
                  $status = $row['status'];
                  $toe   = $row['toe'];
                  if($status ==1){
                    echo "<head><script>alert('Please deactive the equipment first!!! ');</script></head></html>";
                    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
                  echo mysqli_error($db);
                }
                  $query1  = "select * from toe"; 
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
                      $query4="select * from newmachine where machineid='$uid'";
                      $result4=mysqli_query($con,$query2);
                      
                      if($result2){
                        $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
                        $u2id   = $row2['machineid'];
                        $toe   = $row2['toe'];
                        
                        $warranty   = $row1['warranty'];
                        
                        if($result3){
                            $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
                            $image = $row3['image'];
                            $name = $row3['toeName'];
                            $toeid=$row3['toeid'];
                            $desc=$row3['description'];
                            $brand  = $row3['brands'];
                            
                            if($result4){
                                $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
                                
                                $machineid = $row4['machineid'];
                                $queryx="select * from enrolls_to_warranty where machineid='$machineid'";
                                $resultx=mysqli_query($con,$queryx);
                                
                           

                            if($resultx){
                                $rowx=mysqli_fetch_array($resultx,MYSQLI_ASSOC);
                                $active = $rowx['active'];
                                $query5="select * from categories where categoryid='$category'";  
                                $result5=mysqli_query($con,$query5);
                            if($result5){
                                $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                $category   = $row5['categoryName'];
                           
                                $query7="select * from studio where studioid='$studio'";  
                                $result7=mysqli_query($con,$query7);
                                if($result7){
                                    $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                    $query8="select * from enrolls_to_maintenance where machineid='$machineid ";  
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
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                            <button class="btn btn-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_maintain.php" id="submitProductForm" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MACHINE ID</b></h4></label>
                                                <div class="col-sm-9">
                                                  <?php
              function getRandomWord($len = 6)
              {
                  $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="machineid" id="machineID" readonly=""  value="<?php echo $id?>" readonly class="form-control">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                            <div class="row">
                                                <div id="categorydetls">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MAINTAIN ID</b></h4></label>
                                                <div class="col-sm-9">
                                                  
                                                  <input type="text" name="maintainid" id="maintainID" readonly=""  value="<?php echo getRandomWord()?>" readonly class="form-control">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                            <div class="row">
                                                <div id="categorydetls">
                                            </div>
                                        </div>
                                    </div>
                                                
                                  

                                        
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MAINTAIN Name</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="maintainname" id="maintainName" placeholder="Enter maintain name" class="form-control" required/>
                                                </div>
                                            </div>
                                            </div>
                                        
                                    
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MAINTAIN DESCRIPTION</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter maintain description" class="form-control" required/>
                                                </div>
                                            </div>
                                        
                                        

                                        
                    
                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Maintenance Cost</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="number" name="cost" id="cost" step="0.01" min=0 placeholder="Enter the maintenance cost" class="form-control" required/>
                                                </div>
                                            </div>
                            <div class="form-group">
                                            <div class="row">
                                                <div>
                                            </div>
                                        </div>
                                    </div>
                            
                            
                                   

                                        
                                        
                                        
                                        

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Next Maintenance Frequency Days</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="number" name="mainday" id="Mainday" placeholder="Enter maintenance frequency in day(s)" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Maintenance Duration (Minutes)</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="number" name="duration" id="Duration" placeholder="Enter maintenance duration in minute(s)" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="active" id="active" value="<?php echo $activeA?>"/>
                                        <button type="submit" name="submit" id="crateProductBtn" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>

                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                
                
               
                <!-- /# row -->

                <!-- End PAge Content -->

                <script>
            function mybranddetail(str){
                 
                if(str==""){
                    document.getElementById("branddetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("branddetls").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","branddetail.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>
        <script>
            function mycategorydetail(str){
                 
                if(str==""){
                    document.getElementById("categorydetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("categorydetls").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","categorydetail.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>
        
    
                <script src="admin/custom/js/product.js"></script>

                <script>
  $("#Condition").select2({
});
    </script>
    <script>
  $("#Type").select2({
});
    </script>
    <script>
  $("#Category").select2({
});
    </script>
    <script>
  $("#Vendor").select2({
});
    </script>
    <script>
  $("#Warranty").select2({
});
    </script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php include('../constant/layout/footer.php');?>
  

