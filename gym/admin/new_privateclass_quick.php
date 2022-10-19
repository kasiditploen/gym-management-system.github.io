
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<link rel="stylesheet" href="./assets/css/dselect.css" />
<link rel="stylesheet" href="popup_style.css">
<script src="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/js/bootstrap-datetimepicker.js"></script>
<link href="https://rawgit.com/AuspeXeu/bootstrap-datetimepicker/master/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
  
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');

?>
<?php
      $id     = $_GET['id'];;
      $ss    = $_GET['ss'];;
      $am    = $_GET['am'];;
      $pidss    = $_GET['pidss'];;
      $query  = "select * from users WHERE userid='$id'";
      $result = mysqli_query($con, $query);

      if($am > 0){

      

      if (mysqli_affected_rows($con) != 0) {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $image = $row['image'];
            $name = $row['username'];
              $memid=$row['userid'];
              $gender=$row['gender'];
              $mobile=$row['mobile'];
              $email=$row['email'];
              $joinon=$row['joining_date'];
              echo $name;
          }
      }
    } else {
        echo "<head><script>alert('Not Enough Session Point to take a personal training class. ');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
    }
      ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Private Class</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Private Class</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_privateclass.php" id="submitProductForm" name="form1">
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
                                                  <input type="text" name="privateclassid" id="privateclassID" readonly value="<?php echo getRandomWord(); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Member ID</label>
                                                <div class="col-sm-9">
                                                  
                                                  <input type="text" name="userid" id="userID" readonly value="<?php echo $id; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Member NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="username" id="userName" type="text" readonly value="<?php echo $name; ?>" placeholder=""class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">TRAINER</label>
                                                <div class="col-sm-9">
                                               <select name="trainerid" id="trainerid" required onchange="mycategorydetail(this.value)" class="form-control">
                    <option value="">--Please Select Trainer--</option>
                    <?php
                    date_default_timezone_set("Asia/Bangkok"); 
                    $day=date("Y-m-d");
                    $cdate=date("Y-m-d");
                    
            
                    $unixTimestamp = strtotime($cdate);
            
            //Get the day of the week using PHP's date function.
            $dayOfWeek = date("l", $unixTimestamp);
            
                        $query="select trainerid, username,availableday FROM trainers where availableday LIKE '%$dayOfWeek%'";
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
                                                <label class="col-sm-3 control-label">CLASS NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="privateclassname" id="privateclassName" type="text" placeholder="Enter class name"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Class Type</b></h4></label>
                    <div class="col-sm-9">
                                <select name="privateclasstype" id="privateclasstype" required class="form-control">
                                    
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
                                                <div id="categorydetls">
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
                                               <select name="privatestudios" id="privatestudios" required onchange="mycategorydetail(this.value)" class="form-control">
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
                                    

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Day</label>
                                                <div class="col-sm-9">
                                                 <input name="dow" id="dow" type="text" readonly value="<?php echo $dayOfWeek; ?>" placeholder=""class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group">
                        
						<label for="" class="control-label">DATE</label>
						<input type="date" name="date_from" id="date_from" class="form-control" readonly value="<?php echo date('Y-m-d') ?>">
					</div>

					

					<div class="form-group">
						<label for="" class="control-label">Time From</label>
						<input  name="time_from" id="timefrom" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
					</div>
                    
					<div class="form-group">
						<label for="" class="control-label">Time To</label>
						<input  name="time_to" id="timeto" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
					</div>

                    <div class="form-group">
						<label for="" class="control-label">Current Session</label>
						<input type="number" name="amount" id="amount" readonly class="form-control" value="<?php echo $am;?>">
					</div>

                    <input type="hidden" name="session" id="session" value='<?php echo $ss;?>'>
                    <input type="hidden" name="pid" id="pid" value='<?php echo $pidss;?>'>
                    

                                    
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
  $("#userid").select2({
});
    </script>
    
  

    <script>
  $("#privatestudios").select2({
});
    </script>
    <script>
  $("#trainerid").select2({
});
    </script>
    <script>
  $("#privateclasstype").select2({
});
    </script>

<script>
var js_array = <?php echo json_encode($timefrom1); ?>;

         let nine9 = js_array.includes(" 9");
let monday = js_array.includes("Monday");
let tuesday = js_array.includes("Tuesday");
let wednesday = js_array.includes("Wednesday");
let thursday = js_array.includes("Thursday");
let friday = js_array.includes("Friday");
let saturday = js_array.includes("Saturday");
         


    


         if (nine9 === true) {
  var nine9D ;
  
  
}else if (nine9=== false){
  nine9D = 9;
}
     
     if (monday === true) {
  var mon ;
  
}else if (monday === false){
  mon = [1];
}
     
     if (tuesday === true) {
  var tues ;
  
}else if (tuesday === false){
  tues = [2];
}
     
     if (wednesday === true) {
  var wed ;
  
}else if (wednesday === false){
  wed = [3];
}
     
     if (thursday === true) {
  var thu ;
  
}else if (thursday === false){
  thu = [4];
}
     
     if (friday === true) {
  var fri ;
  
}else if (friday === false){
  fri = [5];
}
     
     if (saturday === true) {
  var sat ;
  
}else if (saturday === false){
  sat = [6];
}

const arrayna =  ['0', '1', '2', '3', '4', '5', '6'];
const arrayuse =  [nine9D];




</script>

<script>
    

  $("#timefrom").datetimepicker({
    format: 'h:ii',
    numberOfMonths: 3,
        showButtonPanel: true,
        startDate: new Date(),
        todayHighlight: 1,
        endDate: "+1d",
});
    </script>

<script>
    

    $("#timeto").datetimepicker({
        format: "h:ii",
      numberOfMonths: 3,
        showButtonPanel: true,
        startDate: new Date(),
        todayHighlight: 1,
        endDate: "+1d",
      
  });
      </script>
    
                <script src="../admin/custom/js/product.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php include('../constant/layout/footer.php');?>
  

