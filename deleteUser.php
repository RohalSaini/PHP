<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User </title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<?php 
    ini_set( 'display_startup_errors', 1 );
    ini_set( 'display_errors', 1 );
    error_reporting( -1 );

    include_once './config/constaints.php';
    include_once './config/Database.php';
    include_once './modal/User.php';
    
  ?>
  <?php include 'nav.php';?>
  <?php include 'deleteForm.php';?>
</body>
</html>