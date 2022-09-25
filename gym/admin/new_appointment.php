
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');

?>
<?php
if(isset($_GET['classid'])){
$qry = $conn->query("SELECT * FROM classes where classid= ".$_GET['classid']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
$dow_arr = !empty($dow) ? explode(',',$dow) : '';
}
?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Appointment Class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Appointment Class</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_approved.php" id="submitProductForm" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Appointment ID</label>
                                                <div class="col-sm-9">
                                                  
                                                  <input type="text" name="appointmentid" id="appointmentid" readonly value="<?php echo getRandomWord(); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                                  <?php
              function getRandomWord($len = 10)
              {
                  $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                             

                                
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Session Class</label>
                                                <div class="col-sm-9">
                                                <select class="form-control readonly required" id="session" name="session" value="yes">
                                                <option value="Yes">Yes</option>
                                                
                                               
                                               
    </select>
					</div>
                    

                    </div>
                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> Member</label>
                                                <div class="col-sm-9">
                                               <select name="userid" id="userid" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Member--</option>
                    <?php
                        $query="select userid, username FROM users";
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
                                                <div">
                                            </div>
                                        </div>
                                    </div>

                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> PERSONAL TRAINER</label>
                                                <div class="col-sm-9">
                                               <select name="trainerid" id="trainerid" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Trainer--</option>
                    <?php
                        $query="select trainerid, username FROM trainers where trainertype='Personal Trainer'";
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
                                                <div">
                                            </div>
                                        </div>
                                    </div>
                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="classname" id="className" type="text" placeholder="Enter class name"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Class Type</b></h4></label>
                    <div class="col-sm-9">
                                <select name="classtype" id="Classtype" required class="form-control">
                                    <option value="">--Select Trainer Type--</option>
                                    <option value="Strength Training">Strength Training</option>
                                    <option value="Combat Sports">Combat Sports</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Mind and Body">Mind and Body</option>
                                    
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
                                                <label class="col-sm-3 control-label">CLASS DESCRIPTION</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter machine description" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">STUDIO</label>
                                                <div class="col-sm-9">
                                               <select name="studios" id="Studios" required onchange="mycategorydetail(this.value)" class="form-control">
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
                                                <label class="col-sm-3 control-label">Days Of Week</label>
                                                <div class="col-sm-9">
                                                <select class="form-control" id="dow" name="dow[]" multiple="multiple">
                                                <option value="Sunday">Sunday</option>
                                                <option value="Monday">Monday</option>
                                               <option value="Tuesday">Tuesday</option>
                                               <option value="Wednesday">Wednesday</option>
                                               <option value="Thursday">Thursday</option>
                                               <option value="Friday">Friday</option>
                                               <option value="Saturday">Saturday</option>
                                               
    </select>
					</div>
                    

                    </div>
                                            </div> <div class="form-group">
                                            
                        
						<label for="" class="control-label">Date Start</label>
						<input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo isset($date_from) ? date('M-y',strtotime($date_from)):'' ?>">
					</div>

					

					<div class="form-group">
						<label for="" class="control-label">Time From</label>
						<input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
					</div>
                    
					<div class="form-group">
						<label for="" class="control-label">Time To</label>
						<input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
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
        
        
    <script>
  $("#Studios").select2({
});
    </script>
    <script>
  $("#dow").select2({
});
    </script>
    <script>
  $("#userid").select2({
});
    </script>
    <script>
  $("#trainerid").select2({
});
    </script>
    <script>
  $("#Classtype").select2({
});
    </script>

    <script>
  $("#session").select2({
});
    </script>
    
    
                <script src="admin/custom/js/product.js"></script>

<?php include('../constant/layout/footer.php');?>
  

