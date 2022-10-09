<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>

<?php include('../constant/layout/sidebar_trainer.php');?> 
<link rel="stylesheet" href="popup_style.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  
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
                    <h3 class="text-primary">New Trainer Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Trainer User</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="new_submit2.php" id="form2" name="form2">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Trainer ID</label>
                                                <div class="col-sm-9">
                                                  
                                                 <input type="text" id="boxx" name="mt_id" value="<?php echo time(); ?>" readonly required class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">

        <!--Card-->
        <div class="card red text-center z-depth-2 light-version py-3 px-4">

          <form class="md-form" action="#">
          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PHOTO</label>
                                                <div class="col-sm-9">
                <span>Choose file<i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i></span>
                <input type="file" name="image" id="image" required multiple accept="image/*">
                
                <img id="blah" src="#"   alt="image"   style="width: 80px; height: 80px;" />
              </div>
              <script>
image.onchange = evt => {
  const [file] = image.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
   document.querySelectorAll('img').forEach(function(img){
  	img.onerror = function(){onerror="this.src='fallback-img.jpg'";};
   })
});
</script>
              


        </div>
        <!--/.Card-->

      </div>
      </div>
      </div>

            <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">First Name</label>
                                                <div class="col-sm-9">
                                                 <input name="fname" id="boxx"  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Last Name</label>
                                                <div class="col-sm-9">
                                                 <input name="lname" id="boxx"  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="ut_name" id="boxx"  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">EMAIL ID</label>
                                                <div class="col-sm-9">
                                                <input type="email" name="email2" id="boxx" class="form-control" required  />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PASSWORD</label>
                                                <div class="col-sm-9">
                                                 <input type="password" name="password" id="boxx"  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">STREET NAME</label>
                                                <div class="col-sm-9">
                                                <input  name="street_name2" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CITY:</label>
               
                                                <div class="col-sm-9">
                                                 <input type="text" name="city2" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                      <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">ZIPCODE:</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="zipcode2" id="boxx" maxlength="6" class="form-control" required pattern="^[0-9]+$" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PROVINCE</label>
                                                <div class="col-sm-9">
                                                <input type="text"  name="state2" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div><div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">GENDER</label>
                                                <div class="col-sm-9">
                                               <select name="gender2" id="boxx" required class="form-control">

                    <option value="">--Please Select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">DATE OF BIRTH</label>
                                                <div class="col-sm-9">
                                                <input type="date"  name="dob2" id="boxx"  class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PHONE NO</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="mobile2" id="boxx" maxlength="10" class="form-control" required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">JOINING DATE</label>
                                                <div class="col-sm-9">
                                                <input type="date" name="jdate2" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        
</div>
<div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Days Of Week</label>
                                                <div class="col-sm-9">
                                                <select class="form-control" id="availableday" name="availableday[]" multiple="multiple" tags="tags">
                                               <option value="Monday">Monday</option>
                                               <option value="Tuesday">Tuesday</option>
                                               <option value="Wednesday">Wednesday</option>
                                               <option value="Thursday">Thursday</option>
                                               <option value="Friday">Friday</option>
                                               <option value="Saturday">Saturday</option>
                                               <option value="Sunday">Sunday</option>
    </select>
					</div>
                    

                    </div>

                                        <div class="form-group">
						<label for="" class="control-label">Time From</label>
						<input type="time" name="time_from" id="time_from" class="form-control" value="<?php echo isset($time_from) ? $time_from : '' ?>">
					</div>
                    
					<div class="form-group">
						<label for="" class="control-label">Time To</label>
						<input type="time" name="time_to" id="time_to" class="form-control" value="<?php echo isset($time_to) ? $time_to : '' ?>">
					</div>

                    <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Trainer Type</b></h4></label>
                    <div class="col-sm-9">
                                <select name="trainertype[]" id="Trainertype" required class="form-control" multiple="multiple" tags="tags">
                                    <option value="">--Select Trainer Type--</option>
                                    <option value="Fitness Instructor">Fitness Instructor</option>
                                    <option value="Personal Trainer">Personal Trainer</option>
                                    <option value="Coach">Coach</option>
                                </select>
                            </div>
                            </div>
                            </div>
</div>

                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><b>Skills</b></label>
                                                <div class="col-sm-9">
                                                <input type="text"  name="skills" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><b>YEAR OF EXPERIENCE</b></label>
                                                <div class="col-sm-9">
                                                <input type="number"  name="yoe" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>

                                        
                    <?php
                        $query="select * from plan2 where active='yes'";
                        $result=mysqli_query($con,$query);
                        if(mysqli_affected_rows($con)!=0){
                            while($row=mysqli_fetch_row($result)){
                                echo "<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }

                    ?>
                    
                </select>
                
                                                </div>
                                                <input type="hidden" name="utype" id="utype" value="user">
                                                <button type="submit" name="submit" id="submit" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div id="plandetls">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                    </div>
                    </div>
                                         
                                        

                
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $("#Trainertype").select2({
});
    </script>

<script>
  $("#availableday").select2({
});
    </script>
<script>
        $(document).ready(function() {
    $("#availableday").select2();
    multiple:true
    tags: true
});
    </script>


<?php include('../constant/layout/footer.php');?>


 