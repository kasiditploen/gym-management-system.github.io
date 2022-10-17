<?php include('../constant/layout/head.php');?>
<?php include('../constant/layout/header.php');?>
<?php include('../constant/layout/sidebar.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.min.css" />
  
  
 

  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <a><div class="bg-image hover-zoom d-flex justify-content-center align-items-center" style="
    background-image: url('https://raw.githubusercontent.com/kasiditploen/picturesaver/main/black11.jpg');
    height: 150px; width: auto;
  "></a>
  <h1 class="color-white mb-3 h1 "><b>Administrators</b></h1>
</div>
                <!-- /# row -->
                 <div class="card">
                            
                 
                            
                         
                                <div class="table-responsive m-t-40">
                                
                                
                                    <table id="dt-all-checkbox" class="table table-bordered table-striped">
                                    <a href="new_admin.php"><button class="btn btn-lg btn-light waves-effect waves-light"><h4 class="color-black"><b> + Add Admin</b></button></a></div>
                                    
                                        <thead>
        <tr>
        
        <th style="width:2%;">Sl.No</th>
          <th style="width:5%;">Image</th>
          <th style="width:3%;">Member ID</th>
          <th style="width:5%;">Full Name</th>
          <th style="width:5%;">Username</th>
          <th style="width:3%;">Contact</th>
          <th style="width:5%;">E-Mail</th>
          <th style="width:1%;">Gender</th>
          <th style="width:1%;">DOB</th>
          
          
        </tr>
      </thead>    
      
        <tbody>
        <?php
              $query  = "select * from admin";
              //echo $query;
              $result = mysqli_query($con, $query);
              $sno    = 1;
              $uid   = $row['userid'];
              $uname;
                      $udob;
                      $ujoing;
                      $ugender;
              if (mysqli_affected_rows($con) != 0) {
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $uid  = $row['userid'];
                      
                                

                               
                               
                               ?>


                          
                            
                                
                            
                            
                    
<?php
                  $uname=$row['username'];
                  $udob=$row['dob'];
                  $ujoing=$row['joining_date'];
                  $ugender=$row['gender'];
                  $planid=$row2['pid'];

                  $diff = abs(strtotime($expire) - strtotime($pdate));
                  $diff2 = date('z',$diff);
                  $diff3 = abs(strtotime($expire1) - strtotime($pdate1));
                  $diff4 = date('z',$diff3);
                  $diff5 = abs(strtotime($expire2) - strtotime($pdate2));
                  $diff6 = date('z',$diff5);
                  $today = date('Y-m-d');

                   ?>
                  
                  <tr>
                  
                    <td><?php echo $sno; ?></td>
                    
                     
                     <td><?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 80px; height: 80px;" >';?></td>
                     <td><h4><?php echo $row['id']; ?></h4></td>
                     <td><h4><?php echo $row['fname']; ?><br><?php echo $row['lname']; ?></br></h4></td>
                     <td ><h4><?php echo$row['username']; ?></h4></td>
                     

                  </td>
                     <td><?php echo $row['contact']; ?></td>
                     <td><?php echo $row['email']; ?> </td>
                      <td><?php echo $row['gender']; ?> </td>
                      <td><?php echo $row['dob']; ?> </td>
                      
                       

                       <!--<td><button type="button" class="btn btn-s btn-success">Active</button> </td> -->

                       
                       
                    
                  
                                    </form>
                                    </tr>
                  







                 
                                    
                  


                  
              <?php 
              $sno++; 
              $msgid = 0;
              $memid = 0;
                       
                    }
                }  
    
            
                
          ?>  

          

        </tbody>
        
                                      
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                        

                        <script>
$('#submit').prop("disabled", true);
$('input:checkbox').click(function() {
 if ($(this).is(':checked')) {
 $('#submit').prop("disabled", false);
 } else {
 if ($('.checks').filter(':checked').length < 1){
 $('#submit').attr('disabled',true);}
 }
});
</script>

<script>
$(document).ready(function(){
    $("#form1 #select-all").click(function(){
        $("#form1 input[type='checkbox']").prop('checked',this.checked);
    });
});
    
</script>

<script>
    
    $(document).ready(function () {
  $('#dt-all-checkbox').dataTable({

    columnDefs: [{
      orderable: false,
      className: 'select-checkbox select-checkbox-all',
      targets: 0
    }],
    select: {
      style: 'multi',
      selector: 'td:first-child'
    }
  });
});

</script>

<style>
  
.img-responsive,
.carousel.vertical .carousel-inner > .item > img,
.carousel.vertical .carousel-inner > .item > a > img {
  width: 20%;
  height: auto;
  display: inline-block;
}.img-responsive1,
.carousel.vertical .carousel-inner > .item > img,
.carousel.vertical .carousel-inner > .item > a > img {
  width: 80%;
  height: auto;
  display: inline-block;
}.avatars {
  display: inline-flex;
  flex-direction: row-reverse;
}

.avatar {
  position: relative;
  border: 4px solid #fff;
  border-radius: 50%;
  overflow: hidden;
  width: 100px;
}

.avatar:not(:last-child) {
  margin-left: -60px;
}

.avatar img {
  width: 100%;
  display: block;
}
  </style>

  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toggles/2.0.4/toggles.js"></script>
                        
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('../constant/layout/footer.php');?>

