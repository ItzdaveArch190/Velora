<?php
    class User {

        private PDO $connection;

        public function __construct(PDO $connection)
        {

            $this->connection = $connection;

        }

        public function createUser(string $firstname, string $lastname, string $email, string $password): bool|string
        {

            try {

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $this->connection->prepare("INSERT INTO users (firstname, lastname, email, password_hash) VALUES (?,?,?,?)");
                return $stmt->execute([$firstname, $lastname, $email, $passwordHash]);

            } catch(PDOException $e) {
                error_log($e->getMessage());
                return false;
            }

        }

        public function emailExits(string $email): bool 
        {

            $stmt = $this->connection->prepare("SELECT user_id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch() !== false;
            
        }
    }

    
?>