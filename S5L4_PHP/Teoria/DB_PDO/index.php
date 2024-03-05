<?php

    // PDO -> Php Data Object
    require_once('database.php');
    require_once('userDTO.php');
    $config = require_once('config.php');

    use db\DB_PDO as DB;

    //$db = new DB($config);
    //print_r($db->conn);

    //var_dump(DB::getInstance($config));

    // Il metodo getInstance della classe Singleton ritorna una istanza
    // se è già presente altrimenti la crea e la ritorna
    $PDOConn = DB::getInstance($config); 
    $conn = $PDOConn->getConnection();


    $id = 0;
    $name = 'Francesca';
    $lastname = 'Neri';
    $city = 'Napoli';

    $userDTO = new UserDTO($conn);
    $res = $userDTO->getAll();
    //$res = $userDTO->getUserByID(2);

    if($res) { // Controllo se ci sono dei dati nella variabile $res
        foreach($res as $row) {
            print_r($row);
        }
    }
    