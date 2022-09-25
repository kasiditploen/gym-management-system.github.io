
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="popup_style.css">
  
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
                    <h3 class="text-primary">Add New Machine Model</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add New Machine Model</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_machine_new.php" id="submitProductForm" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MODEL NUMBER</b></h4></label>
                                                <div class="col-sm-9">
                                                  <?php
              function getRandomWord($len = 6)
              {
                  $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="machineid" id="machineID" readonly value="<?php echo time(); ?>" class="form-control">
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
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter machine description" class="form-control" required/>
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
                                               <select name="studio" id="Studio" required onchange="mycategorydetail(this.value)" class="form-control">
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
                                                <div id="categorydetls">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Quantity</b></h4></label>
                                                <div class="col-sm-9">
                                                <input type="number" name="quantity" id="Qty" placeholder="Enter Quantity amount"  min="1" minlength="1" maxlength="5"  class="form-control"  required/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="status" id="status" value="1">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Maintenance Frequency Days</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="number" name="mainday" id="Mainday" placeholder="Enter maintenance frequency in day(s)" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        </div>
                                        
                                        <button type="submit" name="submit" id="crateProductBtn" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php include('../constant/layout/footer.php');?>
  

