<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "mydb";
        private $username = "root";
        private $password = "";
        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                //echo "connected";
            }catch(PDOException $exception){
                echo "La Base de Datos MYDB no pudo ser conectada: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>