
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
  
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
                    <h3 class="text-primary">Add Class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Class</li>
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
                            <button class="btn btn-primary" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i><b></button></b>
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_class.php" id="submitProductForm" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class ID</label>
                                                <div class="col-sm-9">
                                                  <?php
              function getRandomWord($len = 10)
              {
                  $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="classid" id="classID" readonly value="<?php echo getRandomWord(); ?>" class="form-control">
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
                                               <select name="dow" id="dow" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Days Of Week--</option>
                    <?php 
							$dow = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
							for($i = 0; $i < 7;$i++):
							?>
							<option value="<?php echo $i ?>" <?php echo !empty($dow_arr) && in_array($i,$dow_arr) ? 'selected' : '' ?>><?php echo $dow[$i] ?></option>
						<?php endfor; ?>
						</select>
					</div>
                    

                    </div>
                                            </div> <div class="form-group">
                        
						<label for="" class="control-label">Month From</label>
						<input type="month" name="date_from" id="date_from" class="form-control" value="<?php echo isset($date_from) ? date('M-y',strtotime($date_from)):'' ?>">
					</div>

					<div class="form-group">
						<label for="" class="control-label">Month To</label>
						<input type="month" name="date_to" id="date_to" class="form-control" value="<?php echo isset($date_to) ? date('M-y',strtotime($date_to)) :'' ?>">
					</div>

					<div class="form-group">
						<label for="" class="control-label">Time From</label>
						<input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
					</div>
                    
					<div class="form-group">
						<label for="" class="control-label">Time To</label>
						<input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
					</div>

                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">TRAINER</label>
                                                <div class="col-sm-9">
                                               <select name="trainerid" id="trainerid" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Trainer--</option>
                    <?php
                        $query="select trainerid, username FROM trainers";
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
  $("#trainerid").select2({
});
    </script>
    
                <script src="admin/custom/js/product.js"></script>

<?php include('../constant/layout/footer.php');?>
  

