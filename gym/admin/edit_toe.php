
<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>

<?php include('../constant/layout/sidebar.php');?> 
<link rel="stylesheet" href="popup_style.css">

 <?php
//session_start();
//error_reporting(0);
include('../constant/connect.php');
                     $machineid=$_GET['id'];
                    
                    $query6  = "SELECT * FROM toe t
                    INNER JOIN categories c ON c.categoryid=t.categories
                    
                               
                               WHERE toeid=".$_GET['id'];
                    //echo $query;
                    $result6 = mysqli_query($con, $query6);
                    $sno    = 1;
                    
                    $name="";
                    $gender="";

                    if (mysqli_affected_rows($con) == 1) {
                        while ($row = mysqli_fetch_array($result6, MYSQLI_ASSOC)) {
                    
                            $toeid    = $row['toeid'];
                            $image    = $row['image'];
                            $toename    = $row['toeName'];
                            $type = $row['type'];
                            $desc=$row['description'];
                            $brand=$row['brands'];
                            $category=$row['categories'];
                            $vendor=$row['vendors'];
                            $contact=$row['contact'];
                            $address=$row['address'];
                            $mobile=$row['mobile'];
                            $email=$row['email'];
                            $amount=$row['amount'];
                            
                            
                            

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
                    <h3 class="text-primary">Edit Machine Details </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Machine Details</li>
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
                                    <form class="form-horizontal" method="POST"  name="userform" enctype="multipart/form-data" action="edit_toe_submit.php" id="form1" name="form1">

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MODEL NUMBER</b></h4></label>
                                                <div class="col-sm-9">
                                                  <?php
              function getRandomWord($len = 6)
              {
                  $word = array_merge(range('0', '9'));
                  shuffle($word);
                  return substr(implode($word), 0, $len);
              }

            ?>
                                                  <input type="text" name="toeid" id="toeID" readonly value="<?php echo $toeid; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="from-group">
                    <div class="row">
                    <label class="col-sm-3 control-label"><h4><b>TYPES OF EQUIPMENT</b></h4></label>
                    <div class="col-sm-9">
                                <select name="type" id="Type" required class="form-control" value="<?php echo $type; ?>">
                                    <option value="">--Select Types of Equipment--</option>
                                    <option value="Weight Training">Weight Training</option>
                                    <option value="Yoga Mats/Exercise Mats">Yoga Mats/Exercise Mats</option>
                                    <option value="Strength Equipment">Strength Equipment</option>
                                    <option value="Rig System">Rig System</option>
                                    <option value="MMA & Boxing">MMA & Boxing</option>
                                    <option value="Commercial Flooring">Commercial Flooring</option>
                                    <option value="Treadmill & Elliptical">Treadmill & Elliptical</option>
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
                                                <label class="col-sm-3 control-label"><h4><b>MODEL NAME</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input name="toename" id="toeName" type="text" placeholder="Enter EQUIPMENT name"class="form-control" value="<?php echo $toename; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>MODEL DESCRIPTION</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="desc" id="Desc" placeholder="Enter EQUIPMENT model" class="form-control" value="<?php echo $desc; ?>" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Brand</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="brand" id="Brand" placeholder="Enter EQUIPMENT brand" class="form-control" value="<?php echo $brand; ?>" required/>
                                                </div>
                                            </div>
                                        </div>

                                        
                    
                

                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>CATEGORY</b></h4></label>
                                                <div class="col-sm-9">
                                               <select name="category" id="Category" required  value="<?php echo $category; ?>" class="form-control">
                    <option value="">--Please Select Category--</option>
                    <?php
                        $query="select * from categories where active='yes'";
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
                                                <label class="col-sm-3 control-label"><h4><b>Vendor</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="vendor" id="vendor" placeholder="Enter EQUIPMENT brand" class="form-control" value="<?php echo $brand; ?>" required/>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Contact Name</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="contact" id="Contact" placeholder="Enter Contact name" value="<?php echo $contact; ?>" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Address</b></h4></label>
                                                <div class="col-sm-9">
                                                 <input type="text" name="address" id="Address" placeholder="Enter Contact name" value="<?php echo $address; ?>" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>Phone Number</b></h4></label>
                                                <div class="col-sm-9">
                                                <input type="number" name="mobile" id="boxx" placeholder="Enter Phone Number" maxlength="10" value="<?php echo $mobile; ?>" class="form-control" required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">EMAIL ID</label>
                                                <div class="col-sm-9">
                                                <input type="email" name="email" id="boxx" class="form-control" value="<?php echo $email; ?>" required  />
                                                </div>
                                            </div>
                                        </div>


                                    

                                      <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"><h4><b>EQUIPMENT PRICE</b></h4></label>
                                                <div class="col-sm-9">
                                                <input type="text" name="amount" id="Amnt" placeholder="Enter EQUIPMENT price in ฿" value="<?php echo $amount; ?>"  class="form-control"  required/>
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

    

<script>
  $("#Studio").select2({
});
    </script>
    <script>
  $("#Type").select2({
});
    </script>
    <script>
  $("#Category").select2({
});
    </script>
    <script>
  $("#Vendor").select2({
});
    </script>
    <script>
  $("#Warranty").select2({
});
    </script>

<script>
  $("#Type").select2({
});
    </script>
    <script>
  $("#Category").select2({
});
    </script>

    

<?php include('../constant/layout/footer.php');?>


 