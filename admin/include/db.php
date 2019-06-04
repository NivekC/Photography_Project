<?php
    define('DB_SERVER','localhost');
    define('DB_NAME','photography');
    define('DB_USER','root');
    define('DB_PASS','');
    

    class DBConnector{
        public $conn;
        /*We connect to the databse inide our class constructor 
        so we can always cause a database connection wheneve an object is created */
        function __construct(){
            $this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die("Error:".mysqli_connect_error());
            mysqli_select_db( $this->conn,DB_NAME);
        }

        /*Once we are done with the databse reads, updates, deletes
        This public function does exactly that. */

        public function closeDatabase(){
            mysqli_close($this->conn);
        }

    }
?>