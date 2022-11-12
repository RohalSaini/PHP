<?php
  class User {
    // DB stuff
    private $conn;
    private $table = 'users';

    // User Properties
    public $email;
    public $password;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
  

      // $check = $this ->table_exists();
      // if($check ===  TRUE) { } 
      // else if(get_class($check) === "PDOException") {
      //  return $check;
      // }else {
      //   return $check;
      // }
    }

    public function table_exists() {
      try {
        $result = $this->conn->query("SHOW TABLES LIKE '{$this->table}'"); 
        if( $result->num_rows == NULL) {
          $sql = "CREATE TABLE IF NOT EXISTS " .$this->table ."(ID int(11) AUTO_INCREMENT,
          EMAIL varchar(255) UNIQUE,
          PASSWORD varchar(255) NOT NULL,
          PERMISSION_LEVEL int,
          PRIMARY KEY  (ID))";
          $result = $this->conn->query($sql);  
          return TRUE;
        }
      }
      catch(Exception $e) {
        return $e;
      } 
       
    }

    public function create($data) {
        // preparing insertion with binding method
        $query = 'INSERT INTO ' . $this->table . ' SET email = :email, password = :password';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $data['Email']);
        $stmt->bindParam(':password',$data['Password']);
        if($stmt->execute()) {
          return array( "success" => 1, "message" => "User created successfully!", "data" => $data );
        }
        printf("Error: %s.\n", $stmt->error);
        return array( 'message' => $stmt->error, 'success' => 0 );
        die(); 
      }

    public function authenticate($data) { 
      $status =  $this->userExists($data);
      return $status;
    }
    public function update($data) {
      $status =  $this->userExists($data);
      if($status['success'] == 0) {
        return $status;
      } else {
        $query = 'UPDATE ' . $this->table . '
        SET password = :newpassword WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newpassword', $data['newpassword']);
        $stmt->bindParam(':email', $data['Email']);
        if($stmt ->execute()) {
          return array( "success" => 1, "message" => "Updated created successfully!", "data" => $data );
          die();
        } else {
        printf("Error: %s.\n", $stmt->error);
        return array( 'message' => $stmt->error, 'success' => 0 );
      }
      }
    }

    public function userExists($data) {
      // Create query
      $query = 'SELECT email,password,id FROM ' . $this->table . ' WHERE email = ? LIMIT 0,1';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1, $data['Email']);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($row == false) {
        return array( 'message' => "user does not exist!!", 'success' => 0 );
      }
      if($row['password'] == $data['Password']) {
        return array( "success" => 1, "message" => "User exist!", "data" => $status );
      } else {
        return array( 'message' => 'email /password error', 'success' => 0);
      }
    }

    public  function delete($data){
      $status =  $this->userExists($data);
      if($status['success'] == 0) {
        return $status;
      } else {
        $query = 'DELETE FROM ' . $this->table . ' WHERE email = :email';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $data['Email']);
        if($stmt->execute()) {
          return array( "success" => 1, "message" => "User deleted successfully !", "data" => $data );
          die();
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return array( 'message' => $stmt->error, 'success' => 0 );
        die();
      }
    }
    public  function allUsers(){
      $sql = 'SELECT * FROM ' .$this->table ;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0) {
        $users_arr = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
          $user = $row;
          //print_r(array_values($user));
          // Push to "data"
          array_push($users_arr, $user);
        }
        return array( "success" => 1, "message" => "user gets !", "data" => $users_arr );

        } else {
            return array( "success" => 1, "message" => "user gets !", "data" => [] );
      }
    }
  }
?>
  