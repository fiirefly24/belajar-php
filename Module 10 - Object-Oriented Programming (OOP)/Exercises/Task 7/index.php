<?php 

class Database {
    private static ?Database $instance = null;

    private function __construct(){}

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect(){
        echo "Connected!";
    }

    private function __clone(){}

    public function __wakeup()
    {
        throw new \Exception("Can't unserialize a singleton");
    }
}

$daBase = Database::getInstance();
$daBase2 = Database::getInstance();

var_dump($daBase === $daBase2);

$daBase->connect();
?>