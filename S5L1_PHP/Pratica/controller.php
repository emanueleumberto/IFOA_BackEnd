<?php

    $db = 'esercizio_php1';
    $config = [
        'mysql_host' => 'localhost',
        'mysql_user' => 'root',
        'mysql_password' => ''
    ];

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password']);

    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    // Creo il mio DB
    $sql = 'CREATE DATABASE IF NOT EXISTS ' . $db;
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    // Seleziono il DB
    $sql = 'USE ' . $db;
    $mysqli->query($sql);

    // Creo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS users ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(255) NOT NULL, 
        lastname VARCHAR(255) NOT NULL, 
        city VARCHAR(255) NOT NULL, 
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL 
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    //print_r($_REQUEST);

    if(!strlen(trim($_REQUEST['email'])) > 3 && !strlen(trim($_REQUEST['password'])) > 3) {
        die('Email e Password mancanti!!!');
    }

    // Inserisco dati in una tabella
    $sql = "INSERT INTO users (firstname, lastname, city, email, password) 
            VALUES ('$_REQUEST[firstname]', '$_REQUEST[lastname]', '$_REQUEST[city]', '$_REQUEST[email]', '$_REQUEST[password]');";
    if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
    else { echo 'Record aggiunto con successo!!!';} 


    // Leggo dati da una tabella
    $sql = 'SELECT * FROM users;';
    $result = [];
    $res = $mysqli->query($sql); // return un mysqli result
    if($res) { // Controllo se ci sono dei dati nella variabile $res
        //var_dump($res);
        while($row = $res->fetch_assoc()) { // Trasformo $res in un array associativo
            array_push($result, $row); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
        }
    }

    //var_dump($result);

    // Creo un CSV con i dati letti dal DB
    $dir = 'csv/';
    $file = 'users.csv';

    if(!file_exists($dir)) {
        mkdir($dir, 0777);
    } 

    $resource = fopen($dir.$file, 'w');
    if($resource) {
        foreach($result as $row) {
            fputcsv($resource, $row, ';');
        }
        fclose($resource);
    }

    // Lettura di un file CSV file/users.csv
    $users = [];
    $resource = fopen($dir.$file, 'r');
    while($data = fgetcsv($resource)) {      
        $user = implode('', $data);
        $userArr = explode(';', $user);
        $arrObj = [
            'id' => $userArr[0],
            'firstname' => $userArr[1],
            'lastname' => $userArr[2],
            'city' => $userArr[3],
            'email' => $userArr[4],
            'password' => $userArr[5],
        ];
        $users[] = $arrObj;
    }
    fclose($resource);

print_r($users);

