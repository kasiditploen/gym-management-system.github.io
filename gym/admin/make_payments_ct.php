
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
  
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
if (isset($_POST['userID']) && isset($_POST['planID'])) {
    $uid  = $_POST['userID'];
    $planid=$_POST['planID'];
    $query1 = "select * from users WHERE userid='$uid'";
    
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name = $row1['username'];
            $query2="select * from plan where pid='$planid'";

            $result2=mysqli_query($con,$query2);
            if($result2){
               $planValue=mysqli_fetch_array($result2,MYSQLI_ASSOC);
               $planName=$planValue['planName'];

               $query3="select * from enrolls_to et inner join plan p on p.pid=et.pid 
               
               where uid='$uid' and renewal='yes'";

            $result3=mysqli_query($con,$query3);
            if($result3){
               $planValue1=mysqli_fetch_array($result3,MYSQLI_ASSOC);
               $planName1=$planValue1['planName'];
               

               $query4="select s.amount as amountpt, s.pid,s.userid,s.paid_date,s.expire,s.renewal,p.planName from sessions s inner join plan p on p.pid=s.pid 
               
               where userid='$uid' and renewal='yes'";

            $result4=mysqli_query($con,$query4);
            if($result4){
               $planValue2=mysqli_fetch_array($result4,MYSQLI_ASSOC);
               $planName2=$planValue2['planName'];
               $amountpt=$planValue2['amountpt'];
               $query5="select cs.amount as amountct, cs.pid,cs.userid,cs.paid_date,cs.expire,cs.renewal,p.planName from csessions cs inner join plan p on p.pid=cs.pid 
               
               where userid='$uid' and renewal='yes'";

            $result5=mysqli_query($con,$query5);
            if($result5){
               $planValue3=mysqli_fetch_array($result5,MYSQLI_ASSOC);
               $planName3=$planValue3['planName'];
               $amountct=$planValue3['amountct'];
            }
            
            }

            }
        }
    }
}
}


?>

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Payment Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Payment</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_payments_ct.php" id="form1" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">MEMBERSHIP ID</label>
                                                <div class="col-sm-9">
                   
                                                 <input type="text" name="m_id" id="boxx" value="<?php echo $uid; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>

                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">NAME</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="u_name" id="boxx" value="<?php echo $name; ?>" placeholder="Member Name" maxlength="30" readonly class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CURRENT MEMBERSHIP</label>
                                                <div class="col-sm-9">
                                                <input type="text" name="prevPlan" id="boxx" value="<?php echo $planName1; ?>" readonly class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">RECENT EXPIRED CT SESSION</label>
                                                <div class="col-sm-9">
                                                <input type="text" name="prevPlan" id="boxx" value="<?php echo $planName3; ?>" readonly class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        


                                    

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">SELECT NEW Class PACKAGE</label>
                                                <div class="col-sm-9">
                                                
                                               <select name="ct" id="ct"  onchange="myplandetail2(this.value)" class="form-control">
                                               
                                               <option value="">===PLEASE SELECT Class Sessions PACKAGE===</option>
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

                                    
                                        <button type="submit" name="submit" id="submit" value="ADD PAYMENT" class="btn btn-light btn-flat m-b-30 m-t-30">ADD PAYMENT</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-light btn-flat m-b-30 m-t-30">Reset</button>

                
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
  $("#ct").select2({
});
    </script>

<script>
  $("#pt").select2({
});
    </script>
<?php include('../constant/layout/footer.php');?>
  

