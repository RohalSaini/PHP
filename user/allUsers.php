<?php
// Headers
include_once("./config/constaints.php");
include_once("./config/Database.php");
include_once("./modal/User.php");

ini_set( 'display_startup_errors', 1 );
ini_set( 'display_errors', 1 );
error_reporting( -1 );

class Users {
    // insertion Row Starts point
    function getAllUsers() {
        $database = new Database();
        $db = $database->connect();
        $user = new User( $db );
        try {
            $_result = $user->allUsers();
            return $_result;
        } catch( PDOException $e ) {
            return $e;
        }
    }
}

$user = new Users();
$user_obj = $user->getAllUsers();
if ( is_array( $user_obj ) ) {
    if ( $user_obj[ 'success' ] ) {
        $list= $user_obj[ 'data' ];
        ?>
        <h1>List User</h1>
        <table>
            <tr> <th>Serial Number</th> <th>Email</th> <th>Password</th> </tr>
        <?php
        foreach ($list as $value) {
            echo "<tr>";
            foreach ($value as $_value) {
                 echo "<td>$_value</td>"; 
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

