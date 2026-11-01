<?php

require_once dirname(__DIR__,2) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

    class Database {

        private $host;
        private $username;
        private $dbname;
        private $password;

        public function __construct() {
            $this->host = $_ENV['DB_HOST'];
            $this->username = $_ENV['DB_ROOT'];
            $this->dbname = $_ENV['DB_NAME'];
        }
        
        
        function opencon() :PDO{
            return new PDO(
                "mysql:host={$this->host}; 
                dbname={$this->dbname};
                charset=utf8mb4",
                $this->username,
                $this->password
            );
        }
    }

?>