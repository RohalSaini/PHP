<?php
// Headers
include_once("../config/constaints.php");
include_once("../config/Database.php");
include_once("../modal/User.php");

ini_set( 'display_startup_errors', 1 );
ini_set( 'display_errors', 1 );
error_reporting( -1 );

class Create {
    // insertion Row Starts point
    function insertRow( $data ) {
        $database = new Database();
        $db = $database->connect();
        $user = new User( $db );
        try {
            $_result = $user->create( $data );
            return $_result;
        } catch( PDOException $e ) {
            return $e;
        }
    }
}

$user = new Create();
$user_obj = $user->insertRow( array( 'Email'=> $_POST[ 'email' ], 'Password'=>$_POST[ 'psw' ] ) );
if ( is_array( $user_obj ) ) {
    if ( $user_obj[ 'success' ] ) {
        echo $user_obj[ 'message' ];
        echo 'Insertion is suceesfully';
    } else if ( $user_obj[ 'success' ] == 0 ) {
        echo $user_obj[ 'message' ];
        echo 'Insertion error';
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

