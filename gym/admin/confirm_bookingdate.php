
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">
  
 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
        $userid=0;
        $username=0;
        $name=0;
        $desc=0;
        $studioid=0;
        $type=0;
        $dow=0;
        $df=0;
        $dt=0;
        $tf=0;
        $tt=0;
        $trainerid=0;
        $trainername=0;
        $studioname=0;
        $session=0;



    $userid=$_POST['userid'];
    $username=$_POST['username'];
    $bookingid =$_POST['bookingid'];
    $bookingreadid =$_POST['bookingreadid'];
    $classid =$_POST['classid'];
    $classname =$_POST['className'];
$type = $_POST['classtype'];
$desc = $_POST['description'];
$studio = $_POST['studios'];
$dow = $_POST['dow'];
$date_from = $_POST['date_from'];
$date_to  = $_POST['date_to'];
$time_from = $_POST['time_from'];
$time_to = $_POST['time_to'];
$trainerid= $_POST['trainerid'];
$sessionid= $_POST['session'];
$sdate= $_POST['sdate'];

date_default_timezone_set("Asia/Bangkok"); 
        $day=date("Y-m-d");
        $cdate=date('Y-m-d');
        $y1date=date('Y-m-d',strtotime('- 1 days'));
        $y2date=date('Y-m-d',strtotime('- 2 days'));
        $y3date=date('Y-m-d',strtotime('- 3 days'));
        $y4date=date('Y-m-d',strtotime('- 4 days'));
        $y5date=date('Y-m-d',strtotime('- 5 days'));
        $y6date=date('Y-m-d',strtotime('- 6 days'));
        $y7date=date('Y-m-d',strtotime('- 7 days'));

        $query5  = "select * from classes WHERE classid = '$classid'";
        $result5=mysqli_query($con,$query5);
        $query6="SELECT userid, count(*)  FROM classholder where classid='$classid' and userid='$userid' and created_date LIKE '%$sdate%'";
        $result6=mysqli_query($con,$query6);
                            $query7="SELECT userid, count(*)  FROM booking  WHERE  classid = '$classid' and userid ='$userid' and date_from LIKE '%$sdate%'";
                            $result7=mysqli_query($con,$query7);
                            $query8="SELECT bookingid,count(*)  FROM booking 
                            WHERE approved='no'";
                            $result8=mysqli_query($con,$query8);
                            $query9="SELECT *  FROM booking  WHERE  classid = '$classid' and userid ='$userid'";
                            $result9=mysqli_query($con,$query9);
                      
                            
                            if($result5){
                                $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
                                $classcap = $row5['classcap'];
                                $datefrom = $row5['date_from'];
                                $dateto = $row5['date_to'];
                                $timefrom = $row5['time_from'];
                                $timeto = $row5['time_to'];
                                            if($result6){
                                              $row6=mysqli_fetch_array($result6,MYSQLI_ASSOC);
                                              (int)$count1   = $row6['count(*)'];
                                              if($result7){
                                                $row7=mysqli_fetch_array($result7,MYSQLI_ASSOC);
                                                
                                                $count2   = $row7['count(*)'];
                                                $count = (int)$count1 + (int)$count2;
                                                
                                                if($result8){
                                                  $row8=mysqli_fetch_array($result8,MYSQLI_ASSOC);
                                                  $count3   = $row8['count(*)'];
                                                  if($result9){
                                                    $row9=mysqli_fetch_array($result9,MYSQLI_ASSOC);
                                                    $datebooked = $row9['date_from'];

                                                  $duplicate=mysqli_query($con,"select * from booking where userid ='$userid' and classid ='$classid' and date_from LIKE '%$sdate%'");
if (mysqli_num_rows($duplicate)>0)
{
  echo "<head><script>alert('You cannot book the same class within the same day.');</script></head></html>";
  echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
echo mysqli_error($db);
}

                                                  if((int)$count >= $classcap) {
                                                    echo "<head><script>alert('There is no class space left for you! ');</script></head></html>";
                                                    echo "error".mysqli_error($con);
                                                    echo "<meta http-equiv='refresh' content='0; url=".$_SERVER['HTTP_REFERER']."'>";
                                                  } else {
     
$query="INSERT INTO booking (bookingid,classid,className,username,trainerid,userid,description,classtype,studios,dow,date_from,date_to,time_from,time_to,session,created_date,approved) values('$bookingid','$classid','$classname','$username','$trainerid','$userid','$desc','$type','$studio','$dow','$sdate','$date_to','$time_from','$time_to','1','$cdate','no')";
      //echo  $query;exit;
    if(mysqli_query($con,$query)){

        date_default_timezone_set("Asia/Bangkok"); 
  $tomorrow = date("d-m-Y", strtotime('tomorrow'));
  $cdate=date("d M Y H:i"); //current date

        $query2="insert into bookingread(bookingreadid,classid,userid,trainerid,created_date,expire,active) values('$bookingreadid','$classid','$userid','$trainerid','$cdate','$tomorrow','yes')";
    mysqli_real_escape_string($con, $bookingreadid);
    mysqli_real_escape_string($con, $userid);
    mysqli_real_escape_string($con, $trainerid);
}  
        if(mysqli_query($con,$query2)==1){
        
            echo "<head><script>alert('Booked ');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
        
        }

    
    else{
     echo "<head><script>alert('NOT SUCCESSFUL, Check Again');</script></head></html>";
     echo "error".mysqli_error($con);
     echo "<meta http-equiv='refresh' content='0; url=dashboard.php'>";
        
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
                    <h3 class="text-primary">Edit Member Details </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Member Details</li>
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
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="" id="form1" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS ID</label>
                                                <div class="col-sm-9">
                                                  
                                               <input type="text" id="boxx" readonly value='<?php echo $classid ?>' name="usrid" required class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS NAME</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="boxxe" readonly="" value='<?php echo $name?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Trainer ID</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="trainer" readonly="" value='<?php echo $trainerid?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Description</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="desc" readonly="" value='<?php echo $desc?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CLASS TYPE</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="desc" readonly="" value='<?php echo $type?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">STUDIO</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="desc" readonly="" value='<?php echo $studio?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">User ID</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="boxxe" readonly="" value='<?php echo $userid?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">User Name</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="boxxe" readonly="" value='<?php echo $username?>'  required  class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">DAY OF WEEK</label>
                                                <div class="col-sm-9">
                                                <input type="text" id="boxxe" readonly="" value='<?php echo  $dow ?>'  class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                       
                                         
                                       <button type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset</button>

                
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('../constant/layout/footer.php');?>
  

 