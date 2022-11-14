<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticate User </title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<?php 
    // ini_set( 'display_startup_errors', 1 );
    // ini_set( 'display_errors', 1 );
    // error_reporting( -1 );

    include(__DIR__ . '/config/constaints.php');
    include(__DIR__ . '/config/Database.php');
    include(__DIR__ . '/modal/User.php');    
    include(__DIR__ . '/user/authenticate.php');
  ?>
  <?php include 'nav.php';?>
  <?php include 'loginForm.php';?>
  <?php
    if(isset($_REQUEST['submit_btn'])) {
      authenticate();
    }
?>
</body>
</html>