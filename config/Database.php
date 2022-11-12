<?php
Class Database {
    private $conn;
    private $userTable = 'users';
    
    // DB Connect
    public function connect() {
        $this->conn = null;
        try {
            // connection to database
            $this->conn = new PDO( 'mysql:host=' .HOST . ';dbname=' .DATABASE, USERNAME, PASSWORD );
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        } catch( PDOException $e ) {
            if ( $e->getCode() == 1049 ) {
                $__result = $this->createDatabase();

                // connecting to database after creation of database
                $this->conn = new PDO( 'mysql:host=' .HOST . ';dbname=' .DATABASE, USERNAME, PASSWORD );
                $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

                if ( $__result ) {
                    // table creation process after database created
                    $check = $this ->userTableCreation();
                    if ( $check ===  TRUE ) {
                        // if table created successfully
                        return $this->conn;
                    } else if ( get_class( $check ) === 'PDOException' ) {
                        // if error occurred while creating table
                        return $check;
                    } else {
                        // unknown error if occured
                        return $check;
                    }
                } else {
                    return $__result;
                }
            } else {
                return $e;
            }
        }
        return $this->conn;
    }

     // DB Database creation 
    public function createDatabase() {
        // database creation first time
        try {
            $this->conn = new PDO( 'mysql:host='.HOST, USERNAME, PASSWORD );
            // database local variables
            $user = constant( 'USERNAME' );
            $pass = constant( 'PASSWORD' );
            $db = constant( 'DATABASE' );
            $host = constant( 'HOST' );

            $this->conn->exec( "CREATE DATABASE `$db`;
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'$host';
                FLUSH PRIVILEGES;" );
            $this->conn = new PDO( 'mysql:host=' .HOST . ';dbname=' .DATABASE, USERNAME, PASSWORD );
            return TRUE;
        } catch ( PDOException $e ) {
            return $e;
        }
    }

     // DB table creation
    public function userTableCreation() {
        // user table creation
        try {
            $result = $this->conn->query( "SHOW TABLES LIKE '{$this->userTable}'" );
            if ( $result->num_rows == NULL ) {
                $sql = 'CREATE TABLE IF NOT EXISTS ' .$this->userTable ."(ID int(11) AUTO_INCREMENT,
                    EMAIL varchar(255) UNIQUE,
                    PASSWORD varchar(255) NOT NULL,
                    PERMISSION_LEVEL int,
                    PRIMARY KEY  (ID))";
                $result = $this->conn->query( $sql );

                return TRUE;
            }
        } catch( PDOException $e ) {
            return $e;
        }

    }
}
?>