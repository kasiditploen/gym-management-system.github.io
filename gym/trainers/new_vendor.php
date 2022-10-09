
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
                    <h3 class="text-primary">Add Vendors</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Vendors</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="submit_new_vendor.php" id="submitProductForm" name="form1">
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">VENDOR ID</label>
                                                <div class="col-sm-9">
                                                  <?php
              function getRandomWord($len = 6)
              {
                $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="vendorid" id="vendorID" readonly value="<?php echo getRandomWord(); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                  

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">VENDOR NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="vendorname" id="vendorName" type="text" placeholder="Enter vendor name"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">CONTACT NAME</label>
                                                <div class="col-sm-9">
                                                 <input name="contactname" id="contactName" type="text" placeholder="Enter contact name"class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="address" id="Address" placeholder="Enter vendor address" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">PHONE NO</label>
                                                <div class="col-sm-9">
                                                <input type="number" name="mobile" id="boxx" maxlength="10" class="form-control" required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">VENDOR EMAIL</label>
                                                <div class="col-sm-9">
                                                <input type="email" name="email" id="boxx" class="form-control" required  />
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">VENDOR DESCRIPTION</label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter vendor description" class="form-control" required/>
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
    
                <script src="admin/custom/js/product.js"></script>

<?php include('../constant/layout/footer.php');?>
  

