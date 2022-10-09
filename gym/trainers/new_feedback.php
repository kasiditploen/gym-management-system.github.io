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
                    <h3 class="text-primary">New Feedback Form</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add New Feedback Form</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_feedback.php" id="form1" name="form1">
                                    

<div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">MEMBER</label>
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
                                            <div>
                                                <div>
                                            </div>
                                        </div>
                                    </div>
                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Rating</label>
                                                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="service" id="service" value="5" />
  <label class="form-check-label" for="inlineRadio1">Excellent</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="service" id="service" value="4" />
  <label class="form-check-label" for="inlineRadio1">Very Good</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="service" id="service" value="3" />
  <label class="form-check-label" for="inlineRadio1">Good</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="service" id="service" value="2" />
  <label class="form-check-label" for="inlineRadio1">Fair</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="service" id="service" value="1" />
  <label class="form-check-label" for="inlineRadio1">Poor</label>
</div>

</div>
</div>


                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">SPECIFIC FEEDBACK</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="planDesc" placeholder="Enter package description" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                       
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
  $("#type").select2({
});
    </script>

<script>
  $("#userid").select2({
});
    </script>
    

<?php include('../constant/layout/footer.php');?>
  

