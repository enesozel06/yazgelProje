<?php
session_start();
ob_start();

error_reporting(~E_DEPRECATED & ~E_NOTICE);
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME,"Turkish");


class Db
{
    protected $dbHost = "localhost";

    protected $dbUsername = "root"; 

    protected $dbPassword = "";

    protected $dbName = "linkshorter";

    protected static $connection;

    public function connect()
    {
        if (!isset(self::$connection)) {
            self::$connection = @new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        }
        if (self::$connection->connect_errno || self::$connection === false) {
            return false;
        }

        self::$connection->select_db($this->dbName);
        self::$connection->set_charset("utf8");

        return self::$connection;
    }

    public function query($query)
    {
        $connection = $this->connect();

        $result = $connection->query($query);

        return $result;
    }

    public function select($query)
    {
        $rows = array();
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function error()
    {

        return '<br><strong>Hata Kodu:</strong> ' . self::$connection->connect_errno . ' <br><strong>Hata MesajÄ±:</strong> ' . self::$connection->connect_error;
    }

    public function quote($value)
    {
        $value = trim($value);
        $connection = $this->connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }
		
}

