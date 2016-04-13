<?php

class mysqlConnection
{
    private static $conn;

    private static function initiateConnection()
    {
        self::$conn = new mysqli('localhost', 'root', 'salam', 'newest');
//        self::$conn = new mysqli('localhost', 'newest', 'OZqXiGU&]D', 'newest');

        if (self::$conn->connect_errno > 0) {
            die('Unable to connect to database [' . self::$conn->connect_error . ']');
            return false;
        }
        return true;
    }

    public function __construct()
    {
        self::initiateConnection();
    }


//$conn = @mysql_connect('localhost', 'root', 'salam');
//if (!$conn) {
//    die('Could not connect: ' . mysql_error());
//}
//mysql_select_db('newest', $conn);
    public static function getConnection()
    {
        if (self::$conn == null)
            self::initiateConnection();
        return self::$conn;
    }
}

?>