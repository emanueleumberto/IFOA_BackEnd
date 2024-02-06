<?php

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

    $sql = 'CREATE DATABASE IF NOT EXISTS rubrica;';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); } // Creo il mio DB
 
    $mysqli->query('USE rubrica;'); // Seleziono il DB

    // Creo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS users ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(255) NOT NULL, 
        lastname VARCHAR(255) NOT NULL, 
        city VARCHAR(255) NOT NULL, 
        phone VARCHAR(255) NOT NULL UNIQUE, 
        email VARCHAR(100) NOT NULL UNIQUE,
        image VARCHAR(100) NULL,
        password VARCHAR(100) NOT NULL
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    // Creo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS posts ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL, 
        description VARCHAR(255) NOT NULL, 
        date_post TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        user_id INT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }


?>