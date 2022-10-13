
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">

 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
                     $classid=$_GET['id'];
                    
                    $query6  = "SELECT * FROM classes c
                               INNER JOIN trainers t ON t.trainerid=c.trainerid
                               
                               WHERE classid=".$_GET['id'];
                    //echo $query;
                    $result6 = mysqli_query($con, $query6);
                    $sno    = 1;
                    
                    $name="";
                    $gender="";

                    if (mysqli_affected_rows($con) == 1) {
                        while ($row = mysqli_fetch_array($result6, MYSQLI_ASSOC)) {
                    
                            
                            $classname    = $row['className'];
                            $session = $row['session'];
                            $classtype     = $row['classtype'];         
                            $classcap   = $row['classcap'];
                            $desc=$row['description'];
                            $studio=$row['studio'];
                            $dow=$row['dow'];  
                            $date_from=$row['date_from'];
                            $date_to=$row['date_to'];
                            $time_from=$row['time_from'];
                            $time_to=$row['time_to'];
                            $trainer=$row['username'];
                            

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
                    <h3 class="text-primary">Edit Class Details </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Class Details</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="edit_class_submit.php" id="form1" name="form1">

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Class ID</label>
                                                <div class="col-sm-9">
                                                
                                                  <input type="text" name="classid" id="classID" readonly value='<?php echo $classid?>' class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="classname" id="className" type="text" value='<?php echo $classname?>' placeholder="Enter class name"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Class Type</b></h4></label>
                    <div class="col-sm-9">
                                <select name="classtype" id="Classtype" required class="form-control">
                                    <option value="">--Select Trainer Type--</option>
                                    <option value="Cardio">Cardio</option>
                                    <option value="HIIT">HIIT</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Mind and Body">Mind and Body</option>
                                    <option value="Cycling">Cycling</option>
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
                                                <label class="col-sm-3 control-label">MAX CLIENTS</label>
                                                <div class="col-sm-9">
                                                 <input name="classcap" id="classcap" type="number" min="1" max="30" value='<?php echo $classcap?>' placeholder="Enter maximum clients"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS DESCRIPTION</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter machine description" value='<?php echo $desc?>' class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">STUDIO</label>
                                                <div class="col-sm-9">
                                               <select name="studios" id="Studios" required  class="form-control">
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
                                            
                        
						<label for="" class="control-label">Month From</label>
						<input type="month" name="date_from" id="date_from" class="form-control" value='<?php echo $date_from?>'>
					</div>

					<div class="form-group">
						<label for="" class="control-label">Month To</label>
						<input type="month" name="date_to" id="date_to" class="form-control" value='<?php echo $date_to?>'>
					</div>

					<div class="form-group">
						<label for="" class="control-label">Time From</label>
						<input type="time" name="time_from" id="time_from" class="form-control" value='<?php echo $time_from?>'>
					</div>
                    
					<div class="form-group">
						<label for="" class="control-label">Time To</label>
						<input type="time" name="time_to" id="time_to" class="form-control" value='<?php echo $time_to?>'>
					</div>

                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">TRAINER</label>
                                                <div class="col-sm-9">
                                               <select name="trainerid" id="trainerid" required  class="form-control">
                    <option value="">--Please Select Trainer--</option>
                    <?php
                        $query="select trainerid, username FROM trainers where trainertype LIKE'%Fitness Instructor%'";
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
    <script>
  $("#Classtype").select2({
});
    </script>

    <script>
  $("#session").select2({
});
    </script>
    

<?php include('../constant/layout/footer.php');?>


 