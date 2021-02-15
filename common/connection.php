<?php

class Connection {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "db_sulamanemas";
    public $conn;
    public $status;

    function __construct() {
        // Create connection
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if (!$this->conn) {
            $this->status = "Failure";
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $this->status = "Success";
        }
    }
}

?>