<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header_trainer.php');?>

<?php include('../constant/layout/sidebar_trainer.php');?> 
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
                <h1 class="color-black mb-3 h2 text-center"><b>New User Management</b></h1> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="new_submit.php" id="form1" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">MEMBER ID</label>
                                                <div class="col-sm-9">
                                                  
                                                 <input type="text" id="boxx" name="m_id" value="<?php echo time(); ?>" readonly required class="form-control">
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
                                                
                                                <div class="col-sm-9">
                                                 
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
                                                <label class="col-sm-3 control-label">USERNAME</label>
                                                <div class="col-sm-9">
                                                 <input name="u_name" id="boxx"  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">EMAIL ID</label>
                                                <div class="col-sm-9">
                                                <input type="email" name="email" id="boxx" class="form-control" required  />
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
                                                <label class="col-sm-3 control-label">Identity No.</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="nationalid" id="boxx" maxlength="13" class="form-control" required pattern="^[0-9]+$" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">STREET NAME</label>
                                                <div class="col-sm-9">
                                                <input  name="street_name" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                       <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CITY:</label>
               
                                                <div class="col-sm-9">
                                                 <input type="text" name="city" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                      <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">ZIPCODE:</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="zipcode" id="boxx" maxlength="6" class="form-control" required pattern="^[0-9]+$" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PROVINCE</label>
                                                <div class="col-sm-9">
                                                <input type="text"  name="state" id="boxx" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div><div class="form-group">
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
                                                <label class="col-sm-3 control-label">DATE OF BIRTH</label>
                                                <div class="col-sm-9">
                                                <input type="date"  name="dob" id="boxx"  class="form-control" required/>
                                                </div>
                                            </div>
                                        </div><div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PHONE NO</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="mobile" id="boxx" maxlength="10" class="form-control" required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">JOINING DATE</label>
                                                <div class="col-sm-9">
                                                <input type="date" name="jdate" id="boxx" class="form-control" required/>
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
                                    

                                    <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>Health Conditions</b></h4></label>
                    <div class="col-sm-9">
                                <select name="conditions[]" id="conditions" required class="form-control" multiple="multiple">
                                    <option value="None">None</option>
                                    <option value="Back Pain">Back Pain</option>
                                    <option value="Wheelchair Users">Wheelchair/Handicapped Users</option>
                                    <option value="Osteoarthritis">Osteoarthritis</option>
                                    <option value="Type 2 Diabetes">Type 2 Diabetes</option>
                                    <option value="High Blood Pressure">High Blood Pressure</option>
                                    <option value="Vision Loss">Vision Loss</option>
                                    <option value="Hearing Loss">Hearing Loss</option>
                                    <option value="Asthma">Asthma</option>
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
                                                <label class="col-sm-3 control-label">MEMBERSHIP PACKAGE FEE (Courses & Full Gym Access)</label>
                                                <div class="col-sm-9">
                                               <select name="plan" id="plan" required onchange="myplandetail(this.value)" class="form-control">
                    <option value="">===PLEASE SELECT MEMBERSHIP PACKAGE ===</option>
                    <?php
                        $query="select * from plan where active='yes' and plantype!='Hours' and plantype!='Sessions' and plantype!='Classes'";
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
                        $query="select * from plan where plantype='Classes'";
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
                        $query="select * from plan where plantype='Sessions'";
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
                                        <input type="hidden" name="utype" id="utype" value="user">
                                         
                                        <button type="submit" name="submit" id="submit" value="CREATE PLAN" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>

                
                                    </form>
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
  $("#conditions").select2({
});
    </script>

<?php include('../constant/layout/footer.php');?>
  

 