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
?>

