<?php

    namespace MaterialeBibliotecarioDTO {

    use Biblioteca\Libro;
    use PDO;
        class LibroDTO {
            private PDO $conn;

            public function __construct(PDO $conn) {
                $this->conn = $conn;
            }

            public function getAll() {
                $sql = 'SELECT * FROM biblioteca.materialebibliotecario WHERE tipo = "Libro"';
                $res = $this->conn->query($sql, PDO::FETCH_ASSOC);
                return $res ? $res : null;
            }
            public function getLibroByID(int $id) {
                $sql = 'SELECT * FROM biblioteca.materialebibliotecario WHERE id = :id';
                $stm = $this->conn->prepare($sql);
                $stm->execute(['id' => $id]);
                return $stm->fetchAll();
            }
            public function saveLibro(Libro $libro) {
                $sql = "INSERT INTO biblioteca.materialebibliotecario (titolo, annoPubblicazione, autore, tipo) VALUES (:titolo, :annoPubblicazione, :autore, 'Libro')";
                $stm = $this->conn->prepare($sql);
                $stm->execute(['titolo' => $libro->titolo, 'annoPubblicazione' => $libro->annoPubblicazione, 'autore' => $libro->autore]);
                return $stm->rowCount();
            }

            public function updateLibro(Libro $libro) {
                $sql = "UPDATE biblioteca.materialebibliotecario SET titolo = :titolo, annoPubblicazione = :annoPubblicazione, autore = :autore WHERE id = :id";
                $stm = $this->conn->prepare($sql);
                $stm->execute([
                                'titolo' => $libro->titolo, 
                                'annoPubblicazione' => $libro->annoPubblicazione, 
                                'autore' => $libro->autore, 
                                'id' => $libro->id]);
                return $stm->rowCount();
            }
            public function deleteLibro(int $id) {
                $sql = "DELETE FROM biblioteca.materialebibliotecario WHERE id = :id";
                $stm = $this->conn->prepare($sql);
                $stm->execute(['id' => $id]);
               return $stm->rowCount();
            }
        }

    }