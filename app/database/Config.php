<?php 
class Config {
    private static $user = 'root';
    private static $pass = 'root';
    private static $QueueServerAddress = ['host' => '127.0.0.1', 'port' => '11300'];

    public static function getUser() {
        return self::$user;
    }

    public static function getPass() {
        return self::$pass;
    }

    public static function getBase(String $database = null) {
        return "mysql:host=localhost;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname={$database}";
    }

    public static function getQueueServerAddress() {
        return self::$QueueServerAddress;
    }
    
}
