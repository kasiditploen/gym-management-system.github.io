
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
        $id=$_GET['id'];
        //echo $id;exit;
        $sql="Select * from categories  Where categoryid='".$_GET['id']."'";
        $res=mysqli_query($con, $sql);
        //echo $sql;exit;
                     if($res){
                                $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
                                //print_r($row);exit;
                
                              }
                        
        ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Category Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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

                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="updatecategory.php" id="form1" name="form1">

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Category ID</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="categoryid" id="categoryID" readonly value='<?php echo $row['categoryid'] ?>' class="form-control">

                                                </div>
                                            </div>
                                        </div>

                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PLAN NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="categoryname" id="categoryName" type="text" value='<?php echo $row['categoryName'] ?>' class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PLAN DESCRIPTION</label>
                                                <div class="col-sm-9">
                                                <input type="text" name="desc" id="Desc"  value='<?php echo $row['description'] ?>' class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                       
                                        </div>
                                        <button type="submit" name="submit" id="submit" value="UPDATE PLAN" class="btn btn-light btn-flat m-b-30 m-t-30">UPDATE CATEGORY</button>
                                         <button type="reset" name="reset" id="reset" value="Reset" class="btn btn-light btn-flat m-b-30 m-t-30">Reset</button>

                
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
               
                <!-- /# row -->

                <!-- End PAge Content -->
    

<?php include('../constant/layout/footer.php');?>
  

