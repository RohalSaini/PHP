<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
<?php 
    ini_set( 'display_startup_errors', 1 );
    ini_set( 'display_errors', 1 );
    error_reporting( -1 );


    // include './user/create.php';
    // include './user/authenticate.php';
    // include './user/delete.php';
    // include './user/update.php';

    include_once './config/constaints.php';
    include_once './config/Database.php';
    include_once './modal/User.php';

    /* authenticate */
    // $user = new UserAuthenticate();
    // $user_obj = $user->userAuthenticate(array("Email"=> "123@gmail.com","Password"=>"ullas"));     
    //  if($user_obj["success"]) {
    //     $data = $user_obj["data"];
    //     echo $data['password'];
    //     echo $user_obj["message"];
    //  }else {
    //   echo " user does not exist";
    //  }

    /* insertion */
    //  $user = new Create();
    //  $user_obj = $user->insertRow(array("Email"=> "1267967856ft@gmail.com", "Password"=>"ullas"));
    //  if(is_array($user_obj)) {
    //     if($user_obj['success']) {
    //       echo $user_obj["message"];
    //       echo "Insertion is suceesfully";
    //     }else if($user_obj["success"] == 0) {
    //       echo $user_obj["message"];
    //       echo "Insertion error";
    //     }
    //  }
    //  else if(get_class($user_obj) === "PDOException") {
    //   $error = $user_obj->getCode();
    //     if($error == 23000) {
    //       echo " Dublication keys";
    //     }else {
    //       echo "$error";
    //     }
    //   }else {
    //     echo "Something went wrong";
    //   }

    //  /* delete */
    //  $del = new Delete();
    //  $del_obj = $del->deleteRow(array("Email"=> "1267967856ft@gmail.com", "Password"=>"ullas"));
    //  if(is_array($del_obj)) {
    //     if($del_obj['success']) {
    //       echo $del_obj["message"];
    //     }else if($del_obj["success"] == 0) {
    //       echo $del_obj["message"];
    //     }
    //  }
    //  else if(get_class($del_obj) === "PDOException") {
    //   $error = $del_obj->getCode();
    //     if($error == 23000) {
    //       echo " Dublication keys";
    //     }else {
    //       echo "$error";
    //     }
    //   }else {
    //     echo "Something went wrong";
    //   }

    /* update */
    // $update = new Update();
    // $update_obj = $update->updateRow(array("Email"=> "1234@gmail.com", "Password"=>"ullas","newpassword"=> "12345"));
    // if(is_array($update_obj)) {
    //    if($update_obj['success']) {
    //      echo $update_obj["message"];
    //    }else if($update_obj["success"] == 0) {
    //      echo $update_obj["message"];
    //    }
    // }
    // else if(get_class($update_obj) === "PDOException") {
    //  $error = $update_obj->getCode();
    //    if($error == 23000) {
    //      echo " Dublication keys";
    //    }else {
    //      echo "$error";
    //    }
    //  }else {
    //    echo "Something went wrong";
    //  }
  ?>
  <?php include 'nav.php';?>
  <?php include 'insertForm.php';?>
</body>
</html>