<?php

    class UserDTO {
        private PDO $conn;

        public function __construct(PDO $conn) {
            $this->conn = $conn;
        }

        public function getAll() {
            $sql = 'SELECT * FROM pdo_test.users';
            $res = $this->conn->query($sql, PDO::FETCH_ASSOC);
    
            if($res) { // Controllo se ci sono dei dati nella variabile $res
                return $res;
            }

            return null;
        }
        public function getUserByID(int $id) {
            $sql = 'SELECT * FROM pdo_test.users WHERE id = :id';
            $stm = $this->conn->prepare($sql);
            $res = $stm->execute(['id' => $id]);
    
            if($res) { // Controllo se ci sono dei dati nella variabile $res
                return $res;
            }

            return null;
        }
        public function saveUser(array $user) {
            $sql = "INSERT INTO pdo_test.users (name, lastname, city) VALUES (:nome, :cognome, :citta)";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['nome' => $user['name'], 'cognome' => $user['lastname'], 'citta' => $user['city']]);
            return $stm->rowCount();
        }
        public function updateUser(array $user) {
            $sql = "UPDATE pdo_test.users SET name = :nome, lastname = :cognome, city = :citta WHERE id = :id";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['nome' => $user['name'], 'cognome' => $user['lastname'], 'citta' => $user['city'], 'id' => $user['id']]);
            return $stm->rowCount();
        }
        public function deleteUser(int $id) {
            $sql = "DELETE pdo_test.users WHERE id = :id";
            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);
           return $stm->rowCount();
        }
    }