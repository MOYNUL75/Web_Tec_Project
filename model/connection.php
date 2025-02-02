<?php
class Db
{
    public $DBHostName = "";
    public $DBUserName = "";
    public $DBPassword = "";
    public $DBName = "";

    function __construct()
    {
        $this->DBHostName = "localhost";
        $this->DBUserName = "root";
        $this->DBPassword = "";
        $this->DBName = "elder_care_monitoring_system";  // Database for nurse registration
    }

    // Function to create a connection object
    function createConObject()
    {
        return new mysqli($this->DBHostName, $this->DBUserName, $this->DBPassword, $this->DBName);
    }

    // Function to close the database connection
    public function closeCon($conn)
    {
        $conn->close();
    }
}