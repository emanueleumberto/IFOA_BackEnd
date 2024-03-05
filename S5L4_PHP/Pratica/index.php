<?php

   require_once('Biblioteca.php');
   require_once('database.php');
   $config = require_once('config.php');
   require_once('materialeBibliotecarioDTO.php');
   

   use Biblioteca\MaterialeBibliotecario;
   use Biblioteca\Libro;
   use Biblioteca\DVD;
   use db\DB_Pdo;
   use MaterialeBibliotecarioDTO\LibroDTO;


   

   /* $l1 = new Libro('Harry Potter', 1997, 'J. K. Rowling');
   $l2 = new Libro('Il Grande Libro di Batman', 2020, 'AA.VV.');

   echo '<h3>Libri Totali n.' . Libro::contaLibri() . '</h3>';

   //$l2->presta();

   $d1 = new DVD('Harry Potter Collezione completa', 2000, 'Chris Columbus');

   echo '<h3>DVD Totali n.' . DVD::contaDVD() . '</h3>';

   echo '<h3>Materiali n.' . MaterialeBibliotecario::getContatoreMateriali() . '</h3>'; */


   // Test DB DB_PDO
   $PDOConn = DB_Pdo::getInstance($config);
   $conn = $PDOConn->getConnection();
   //var_dump($conn);

   $LibroDTO = new LibroDTO($conn);

   //$l1 = new Libro(0, 'Harry Potter', 1997, 'J. K. Rowling');
   //$l2 = new Libro(0, 'Il Grande Libro di Batman', 2020, 'AA.VV.');
   // Metodo della classe LibroDTO per scrivere un Libro sul DB
   //$LibroDTO->saveLibro($l2);

   // Metodo della classe LibroDTO per leggere tutti i Libri presenti nel DB
   //$res = $LibroDTO->getAll();

   // Metodo della classe LibroDTO per leggere un Libro con uno specifico ID
   //$res = $LibroDTO->getLibroByID(1);
   // Creo un oggetto di tipo Libro con i dati letti dal DB
   //$lib = new Libro($res[0]['id'], $res[0]['titolo'], $res[0]['annoPubblicazione'], $res[0]['autore']);
   //print_r($lib);

   // Metodo della classe LibroDTO per modificare un Libro con uno specifico ID letto con getLibroByID(2)
   //$lib->annoPubblicazione = 1900;
   //$LibroDTO->updateLibro($lib);

   // Metodo della classe LibroDTO per eliminare un Libro con uno specifico ID letto con getLibroByID(2)
   // $LibroDTO->deleteLibro($lib->id);
   

   


   


    