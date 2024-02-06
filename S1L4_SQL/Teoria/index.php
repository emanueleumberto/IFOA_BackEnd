    <?php
        # include -> include una porzione di codice di un altro file, se il file non c'è verrà generato un Warning ma la pagina verrà visualizzata comunque
        # include_once -> include una porzione di codice di un altro file, solo una volta per ogni pagina, se il file non c'è verrà generato un Warning
        # require -> include una porzione di codice di un altro file, se il file non c'è verrà generato un Fatal Error e la pagina non verrà visualizzata
        # require_once ->  include una porzione di codice di un altro file, solo una volta per ogni pagina, se il file non c'è verrà generato un Fatal Error 
    ?>


<?php

    require_once 'config.php';
    //var_dump($config);

    $mysqli = new mysqli(
                        $config['mysql_host'],
                        $config['mysql_user'],
                        $config['mysql_password']);

    if($mysqli->connect_error) { die($mysqli->connect_error); } 
    # else { var_dump($mysqli);}

    // Creo il mio DB
    $sql = 'CREATE DATABASE IF NOT EXISTS miodb;';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    // Seleziono il DB
    $sql = 'USE miodb;';
    $mysqli->query($sql);

    // Creo la tabella
    $sql = 'CREATE TABLE IF NOT EXISTS miatab ( 
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL, 
        age INT UNSIGNED NOT NULL, 
        email VARCHAR(100) NOT NULL UNIQUE 
    )';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    // Inserisco dati in una tabella
    /* $sql = "INSERT INTO miatab (name, age, email) VALUES ('Francesca', 20, 'f.neri@gmail.com');";
    if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
    else { echo 'Record aggiunto con successo!!!';} */

    // Elimino un dato dalla tabella
    /* $sql = 'DELETE FROM miatab WHERE id = 1;';
    if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
    else { echo 'Record eliminato con successo!!!';} */

     // Modifico un dato nella tabella
     /* $sql = "UPDATE miatab SET age = 26, email = 'test@gmail.com' WHERE id = 6;";
     if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
     else { echo 'Record aggiornato con successo!!!';} */

    // Leggo dati da una tabella
    $sql = 'SELECT * FROM miatab;';
    $result = [];
    $res = $mysqli->query($sql); // return un mysqli result
    if($res) { // Controllo se ci sono dei dati nella variabile $res
        //var_dump($res);
        $row = $res->fetch_assoc();
        while($row = $res->fetch_assoc() ) { // Trasformo $res in un array associativo
            // $result[] = $row; // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
            array_push($result, $row); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
        }
    }

    //var_dump($result);

    foreach ($result as $row) {
        # code...
        # var_dump($row);
        echo $row['name'] . ' - ' . $row['email'] . '<br>';
        
    }


    // Hash delle password
    $pass = 'Pa$$word!';
    echo 'Password: ' . $pass . "<br />";

    $hash = password_hash($pass, PASSWORD_DEFAULT);
    echo 'Password Hash: ' . $hash . "<br />";

    $verify = password_verify($pass, $hash);
    echo 'Verify Password: ' . $verify;

?>
   


    
    