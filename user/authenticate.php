<?php
// Headers
include_once( '../config/constaints.php' );
include_once( '../config/Database.php' );
include_once( '../modal/User.php' );

ini_set( 'display_startup_errors', 1 );
ini_set( 'display_errors', 1 );
error_reporting( -1 );

class UserAuthenticate {
    // insertion Row Starts point

    function userAuthenticate( $data ) {
        // Instantiate DB & connect
        $database = new Database();
        $db = $database->connect();

        // Instantiate blog user object
        $userAuth = new User( $db );
        try {
            // $obj = json_decode( $data );
            $_result = $userAuth->authenticate( $data );
            return $_result;
        } catch( PDOException $e ) {
            return $e;
        }
    }
}

$user = new UserAuthenticate();
$user_obj = $user->userAuthenticate(array( 'Email'=> $_POST[ 'email' ], 'Password'=>$_POST[ 'psw' ] )  );

if ( $user_obj[ 'success' ] ) {
    $data = $user_obj[ 'data' ];
    echo $data[ 'password' ];
    echo $user_obj[ 'message' ];
} else {
    echo ' user does not exist';
}
?>