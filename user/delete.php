<?php
// Headers
include_once("../config/constaints.php");
include_once("../config/Database.php");
include_once("../modal/User.php");

class Delete {
    
    // insertion Row Starts point
    function deleteRow($data) {
        $database = new Database();
        $db = $database->connect();
        $user = new User($db);
        try {
            $_result = $user->delete($data);
            return $_result;
        } catch( PDOException $e ) {
            return $e;
        }
    }
}
     $del = new Delete();
     $del_obj = $del->deleteRow( array( 'Email'=> $_POST[ 'email' ], 'Password'=>$_POST[ 'psw' ] ));
     if(is_array($del_obj)) {
        if($del_obj['success']) {
          echo $del_obj["message"];
        }else if($del_obj["success"] == 0) {
          echo $del_obj["message"];
        }
     }
     else if(get_class($del_obj) === "PDOException") {
      $error = $del_obj->getCode();
        if($error == 23000) {
          echo " Dublication keys";
        }else {
          echo "$error";
        }
      }else {
        echo "Something went wrong";
      }
?>


  
  