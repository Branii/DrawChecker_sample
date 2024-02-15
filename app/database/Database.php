<?php 
class Database {
    private static $pdo;
    public static function openLink(String $databaseName) : PDO | STRING {
        try {
            self::$pdo = new PDO (
                Config::getBase($databaseName), 
                Config::getUser(), 
                Config::getPass()
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$pdo;
        } catch (PDOException $th) {
            Monolog :: logException($th);
             return $th->getMessage();
        }
    }

    public static function closeLink() {
        self::$pdo = null;
    }
}

//var_dump(Database::openLink('testdb')); // test the database connection