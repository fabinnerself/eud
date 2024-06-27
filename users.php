<?php
    class Usuario{
        // Connection
        private $conn;
        // Table
        private $db_table = "users";
        // Columns
        public $id;
        public $firstname;
        public $lastname;
        public $phone;
        public $email;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getUsers($offset,$rows){
            $sqlQuery = "SELECT id,firstname,lastname, phone,email  FROM " . $this->db_table . " limit $offset,$rows ";

            //echo "cons: $sqlQuery"; 

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

       // GET number of records 
       public function getCountUsers(){
        $sqlQuery = "SELECT count(*) count  FROM " . $this->db_table . "";

        //echo "cons: $sqlQuery"; 

        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['count'];      

    }        
       
        // CREATE
        public function createUser(){
            $sqlQuery = "INSERT INTO ". $this->db_table ."
                    SET firstname = :firstname, 
                        lastname = :lastname, 
                        phone = :phone,
                        email = :email ";

            //echo "$sqlQuery";
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->firstname=htmlspecialchars(strip_tags($this->firstname));
            $this->lastname=htmlspecialchars(strip_tags($this->lastname));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            $this->email=htmlspecialchars(strip_tags($this->email));
        
            // bind data
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":email", $this->email);
                    
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        
        // UPDATE
        public function updateUser(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        firstname = :firstname, 
                        lastname = :lastname, 
                        phone = :phone,
                        email = :email
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->firstname=htmlspecialchars(strip_tags($this->firstname));
            $this->lastname=htmlspecialchars(strip_tags($this->lastname));
            $this->phone=htmlspecialchars(strip_tags($this->phone));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":firstname", $this->firstname);
            $stmt->bindParam(":lastname", $this->lastname);
            $stmt->bindParam(":phone", $this->phone);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteUser(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>