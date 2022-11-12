<?php
// Headers
include_once("../config/constaints.php");
include_once("../config/Database.php");
include_once("../modal/User.php");


class Update {

    // insertion Row Starts point

    function updateRow( $data ) {
        $database = new Database();
        $db = $database->connect();
        $user = new User( $db );
        try {
            $_result = $user->update( $data );
            return $_result;
        } catch( PDOException $e ) {
            return $e;
        }
    }
}
$update = new Update();
$update_obj = $update->updateRow(array( 'Email'=> $_POST[ 'email' ], 'Password'=>$_POST[ 'oldpsw' ],'newpassword'=>$_POST[ 'newpsw' ] ));
if ( is_array( $update_obj ) ) {
    if ( $update_obj[ 'success' ] ) {
        echo $update_obj[ 'message' ];
    } else if ( $update_obj[ 'success' ] == 0 ) {
        echo $update_obj[ 'message' ];
    }
} else if ( get_class( $update_obj ) === 'PDOException' ) {
    $error = $update_obj->getCode();
    if ( $error == 23000 ) {
        echo ' Dublication keys';
    } else {
        echo "$error";
    }
} else {
    echo 'Something went wrong';
}
?>