<?php

    $db = 'teoria_session_cookie';
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

    // Creo la tabella users
    $sql = 'CREATE TABLE IF NOT EXISTS users ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(255) NOT NULL, 
        lastname VARCHAR(255) NOT NULL, 
        city VARCHAR(255) NOT NULL, 
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL 
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    // Leggo dati da una tabella
    $sql = 'SELECT * FROM users;';
    $res = $mysqli->query($sql); // return un mysqli result
    if($res->num_rows === 0) { 
        $password = password_hash('Pa$$w0rd!' , PASSWORD_DEFAULT);
        // Inserisco dati in una tabella
        $sql = 'INSERT INTO users (firstname, lastname, city, email, password) 
            VALUES ("Mario", "Rossi", "Roma", "m.rossi@example.com", "'.$password.'");';
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiunto con successo!!!';}
    }

    // Creo la tabella content IT
    $sql = 'CREATE TABLE IF NOT EXISTS content_it ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL, 
        content TEXT NOT NULL, 
        img VARCHAR(255) NOT NULL, 
        author VARCHAR(100) NOT NULL 
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    $title = "COLOSSEO";
    $content = "<p>L\'Anfiteatro Flavio, più comunemente noto con il nome di Colosseo, si innalza nel cuore archeologico della città di Roma e accoglie quotidianamente un gran numero di visitatori attratti dal fascino della sua storia e della sua complessa architettura.</p>
                <p>L\'edificio, detto Colosseo per via di una colossale statua che sorgeva nelle vicinanze, venne edificato nel I secolo d.C. per volere degli imperatori della dinastia flavia, ed ha accolto, fino alla fine dell\'età antica, spettacoli di grande richiamo popolare, quali le cacce e i giochi gladiatori. L\'edificio era, e rimane ancora oggi, uno spettacolo in se stesso. Si tratta infatti del più grande anfiteatro del mondo, in grado di offrire sorprendenti apparati scenografici, nonché servizi per gli spettatori.</p>
                <p>Simbolo dei fasti dell\'impero, l\'Anfiteatro ha cambiato nei secoli il proprio volto e la propria funzione, offrendosi come spazio strutturato ma aperto alla comunità romana.</p>";
    $img = "https://colosseo.it/sito/wp-content/uploads/2023/05/Colosseo_restauro_30-maggio_veduta-dallalto-1500x1000.jpg";
    $author = "Flavio Rossi";

    // Leggo dati da una tabella
    $sql = 'SELECT * FROM content_it';
    $res = $mysqli->query($sql); // return un mysqli result
    if($res->num_rows === 0) { 
        // Inserisco dati in una tabella
        $sql = "INSERT INTO content_it (title, content, img, author) 
            VALUES ('$title', '$content', '$img', '$author');";
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiunto con successo!!!';}
    }

    // Creo la tabella content US
    $sql = 'CREATE TABLE IF NOT EXISTS content_us ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL, 
        content TEXT NOT NULL, 
        img VARCHAR(255) NOT NULL, 
        author VARCHAR(100) NOT NULL 
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    $title = "THE COLOSSEUM";
    $content = "<p>The Flavian Amphitheatre, more commonly known as the Colosseum, stands in the archaeological heart of Rome and welcomes large numbers of visitors daily, attracted by the fascination of its history and its complex architecture.</p>
                <p>The building became known as the Colosseum because of a colossal statue that stood nearby. It was built in the 1st century CE at the behest of the emperors of the Flavian dynasty. Until the end of the ancient period, it was used to present spectacles of great popular appeal, such as animal hunts and gladiatorial games. The building was, and still remains today, a spectacle in itself. It is the largest amphitheatre in the world, capable of presenting surprisingly complex stage machinery, as well as services for spectators.</p>
                <p>A symbol of the splendour of the empire, the Amphitheatre has changed its appearance and its function over the centuries, presenting itself as a structured space but open to the Roman community.</p>";
    $img = "https://colosseo.it/sito/wp-content/uploads/2023/05/Colosseo_restauro_30-maggio_veduta-dallalto-1500x1000.jpg";
    $author = "Flavio Rossi";

    // Leggo dati da una tabella
    $sql = 'SELECT * FROM content_us';
    $res = $mysqli->query($sql); // return un mysqli result
    if($res->num_rows === 0) { 
        // Inserisco dati in una tabella
        $sql = "INSERT INTO content_us (title, content, img, author) 
            VALUES ('$title', '$content', '$img', '$author');";
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiunto con successo!!!';}
    }