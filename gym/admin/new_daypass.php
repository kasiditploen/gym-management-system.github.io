
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
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
                    <h3 class="text-primary">New Walk-in User Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Walk-in User</li>
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
                            <button class="btn btn-primary" onclick="history.go(-1);"><b><i class="fas fa-arrow-left"></i></button></b>
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="new_submit3.php" id="form1" name="form1">
                                    
                                                  
                                                 <input type="hidden" id="boxx" name="m_id" value="<?php echo time(); ?>" readonly required class="form-control">
                                                

                                        
 
 <div class="form-group">
                                            <div class="row">
                                                
                                                <div class="col-sm-9">
                                                 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Age Group</b></h4></label>
                    <div class="col-sm-9">
                                <select name="age" id="age" required class="form-control">
                                    <option value="">--Select Age Group--</option>
                                    <option value="Teenager">Teenager</option>
                                    <option value="Young Adult">Young Adult</option>
                                    <option value="Adult">Adult</option>
                                    <option value="Elderly">Elderly</option>
                                </select>
                            </div>
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
                                                <label class="col-sm-3 control-label">GENDER</label>
                                                <div class="col-sm-9">
                                               <select name="gender" id="boxx" required class="form-control">

                    <option value="">--Please Select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">REGISTRATION DATE</label>
                                                <div class="col-sm-9">
                                                <input type="date" name="jdate" id="boxx" value="<?php echo date('Y-m-d'); ?>" class="form-control" readonly required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Goal</b></h4></label>
                    <div class="col-sm-9">
                                <select name="goal" id="goal" required class="form-control">
                                    <option value="">--Select Goal--</option>
                                    <option value="Athletic">Athletic</option>
                                    <option value="Weight Loss">Weight Loss</option>
                                    <option value="Increase Strength">Increase Strength</option>
                                    <option value="Well Being">Well Being</option>
                                </select>
                            </div>
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
                                                <label class="col-sm-3 control-label">DAYPASSES PACKAGE FEE (Single-Day Gym Access Only)</label>
                                                <div class="col-sm-9">
                                               <select name="plan" id="plan" readonly required onchange="myplandetail(this.value)" class="form-control">
                    
                    <?php
                        $query="select * from plan where active='yes' and plantype='Hours'";
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
                                                <div id="plandetls">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class PACKAGE FEE (For class sessions)</label>
                                                <div class="col-sm-9">
                                               <select name="ct" id="ct"  onchange="myplandetail2(this.value)" class="form-control">
                    <option value="">===PLEASE SELECT Sessions PACKAGE===</option>
                    <?php
                        $query="select * from plan where plantype='Classes' and pid='019486'";
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
                                                <div id="plandetls2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Personal Training PACKAGE FEE</label>
                                                <div class="col-sm-9">
                                               <select name="pt" id="pt"  onchange="myplandetail3(this.value)" class="form-control">
                    <option value="">===PLEASE SELECT Sessions PACKAGE===</option>
                    <?php
                        $query="select * from plan where plantype='Sessions' and pid='895431'";
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
                                                <div id="plandetls3">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">DATE OF MAKING PAYMENT</label>
                                                <div class="col-sm-9">
                                                <input type="date"  name="domp" id="boxx"  class="form-control" value="<?php echo date('d-M-y');?>" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="status" id="status" value="1">
                                         
                                        <button type="submit" name="submit" id="submit" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
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
                    
                     xmlhttp.open("GET","plandetail4.php?da="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>

<script>
            function myplandetail2(str){
                 
                if(str==""){
                    document.getElementById("plandetls2").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("plandetls2").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","plandetail2.php?qe="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>

<script>
            function myplandetail3(str){
                 
                if(str==""){
                    document.getElementById("plandetls3").innerHTML = "";
                    return;
                }else{
                    if (window.XMLHttpRequest) {
                 // code for IE7+, Firefox, Chrome, Opera, Safari
                     xmlhttp = new XMLHttpRequest();
                     }
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     document.getElementById("plandetls3").innerHTML=this.responseText;
                
                        }
                    };
                    
                     xmlhttp.open("GET","plandetail3.php?ce="+str,true);
                     xmlhttp.send();    
                }
                
            }
        </script>

<script>
  $("#plan").select2({
});
    </script>

<script>
  $("#privilege").select2({
});
    </script>

<script>
  $("#goal").select2({
});
    </script>

<script>
  $("#ct").select2({
});
    </script>

<script>
  $("#pt").select2({
});
    </script>

<script>
  $("#age").select2({
});
    </script>


<?php include('../constant/layout/footer.php');?>
  

 