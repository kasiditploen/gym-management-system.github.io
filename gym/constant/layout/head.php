<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    
    

    

    

     <?php
     //include('../constant/check.php');
             include('../constant/connect.php');
             $sql_head_title = "select * from manage_website"; 
             $result_head_title = $con->query($sql_head_title);
             $row_head_title = mysqli_fetch_array($result_head_title);
             ?>
   <title><?php echo $row_head_title['title'];?></title>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>


    <link href="../assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="../assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/helper.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="../assets/css/lib/html5-editor/bootstrap-wysihtml5.css" />
 <link href="../assets/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="../assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
     <link href="../assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
</head>

<?php
             $sql_header_logo = "select * from manage_website"; 
             $result_header_logo = $con->query($sql_header_logo);
             $row_header_logo = mysqli_fetch_array($result_header_logo);
             ?>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
    
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="1" /> </svg>
    </div>

    

  