<form action="./user/create.php" method="post">
<?php include 'form.php';?>
</form> 

<?php
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
?>