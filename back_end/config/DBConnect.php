<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/9/16
 * Time: 12:50 PM
 */
class DBConnect
{
    private $conn;

    // constructor
    function __construct()
    {
        $this->conn = $this->connect();
    }

    // destructor

    /**
     * Function to connect with database
     */
    private function connect()
    {
        // import database connection variables
        require_once dirname(__FILE__) . '/DBConfig.php';
        // Connecting to mysql database
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function __destruct()
    {
        if ($this->conn != null) {
            $this->getConn()->close();
        }
    }

    public function getConn()
    {
        return $this->conn;
    }
}
