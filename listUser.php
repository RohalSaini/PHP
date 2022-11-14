<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All Users </title>
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
   <?php include_once("./user/allUsers.php"); ?>
   <?php
        $user = new Users();
        $user_obj = $user->getAllUsers();
        if ( is_array( $user_obj ) ) {
            if ( $user_obj[ 'success' ] ) {
                $list= $user_obj[ 'data' ];
                ?>
                <h1>List User</h1>
                <table>
                    <tr> <th>Serial Number</th> <th>Email</th> <th>Password</th> <th>Permission</th> </tr>
                <?php
                foreach ($list as $value) {
                    echo "<tr>";
                    echo "<td>".$value['ID']."</td>";
                    echo "<td>".$value['EMAIL']."</td>";
                    echo "<td>".$value['PASSWORD']."</td>";
                    if(empty($value['PERMISSION'])) {
                        echo "<td> NULL </td>";
                    }
                    else {
                        echo "<td>".$value['PERMISSION']."</td>";
                    }
                    echo "</tr>";
                }
            } else if ( $user_obj[ 'success' ] == 0 ) {
                echo $user_obj[ 'data' ];
            }
        } else if ( get_class( $user_obj ) === 'PDOException' ) {
            $error = $user_obj->getCode();
            if ( $error == 23000 ) {
                echo ' Dublication keys';
            } else {
                echo "$error";
            }
        } else {
            echo 'Something went wrong';
        }
   ?> 

</body>
</html>