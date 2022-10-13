
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">

 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
                     $machineid=$_GET['id'];
                    
                    $query6  = "SELECT * FROM newmachine m
                               INNER JOIN toe t ON t.toeid=m.toe
                               
                               WHERE machineid=".$_GET['id'];
                    //echo $query;
                    $result6 = mysqli_query($con, $query6);
                    $sno    = 1;
                    
                    $name="";
                    $gender="";

                    if (mysqli_affected_rows($con) == 1) {
                        while ($row = mysqli_fetch_array($result6, MYSQLI_ASSOC)) {
                    
                            $machineid    = $row['machineid'];
                            $toename    = $row['toeName'];
                            $type = $row['type'];
                            $desc=$row['description'];
                            $studio=$row['studio'];
                            $quantity=$row['quantity'];  
                            $mainday=$row['mainday'];
                            
                            

                        }
                    }
                    else{
                         echo "<html><head><script>alert('Cannot obtain previous information!');</script></head></html>";
                         echo mysqli_error($con);
                    }


                ?>
            

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Machine Details </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Machine Details</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="edit_machine_submit.php" id="form1" name="form1">

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Machine ID</label>
                                                <div class="col-sm-9">
                                                
                                                  <input type="text" name="machineid" id="machineID" readonly value='<?php echo $machineid ?>' class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>TYPES OF EQUIPMENT</b></h4></label>
                    <div class="col-sm-9">
                                <select name="type" id="Type" required class="form-control">
                                <option value="">--Please Select Types Of Equipment--</option>
                    <?php
                        $query="select toeid,toeName from toe";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }

                    ?>
                    
                </select>
                            </div>
                            </div>
                            <div class="form-group">
                                            <div class="row">
                                                
                                        </div>
                                    </div>
                            
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MODEL DESCRIPTION</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter machine description" value='<?php echo $desc?>' class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                    
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div id="branddetls">
                                            </div>
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
                                                <label class="col-sm-3 control-label"><h4><b>STUDIO</b></h4></label>
                                                <div class="col-sm-9">
                                               <select name="studio" id="Studio" required  value='<?php echo $studio?>' class="form-control">
                    <option value="">--Please Select Studio--</option>
                    <?php
                        $query="select * from studio where active='yes'";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }

                    ?>
                    
                </select>
                                                </div>
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
                                                <label class="col-sm-3 control-label"><h4><b>Quantity</b></h4></label>
                                                <div class="col-sm-9">
                                                <input type="number" name="quantity" id="Qty" placeholder="Enter Quantity amount" value='<?php echo $quantity?>'  min="1" minlength="1" maxlength="5"  class="form-control"  required/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="status" id="status" value="1">
                                        <input type="hidden" name="repair" id="repair" value="0">
                                        <input type="hidden" name="mneed" id="mneed" value="0">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Maintenance Frequency Days</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="number" name="mainday" id="Mainday" placeholder="Enter maintenance frequency in day(s)" readonly value='<?php echo $mainday?>' class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        </div>
                                         
                                        <button type="submit" name="submit" id="submit" value="UPDATE" class="btn btn-primary btn-flat m-b-30 m-t-30">UPDATE</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>

                
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    <script>
            function myplandetail(str){
                 
                if(str==""){
                    document.getElementById("plandetls").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("plandetls").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","plandetail.php?q="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>

<script>
  $("#Studio").select2({
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
    

<?php include('../constant/layout/footer.php');?>


 