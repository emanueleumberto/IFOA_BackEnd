<?php

function getAllUser($mysqli)
{
    $result = [];
    $sql = "SELECT * FROM users;";
    $res = $mysqli->query($sql); // return un mysqli result
    if ($res) { // Controllo se ci sono dei dati nella variabile $res
        while ($row = $res->fetch_assoc()) { // Trasformo $res in un array associativo
            $result[] = $row; // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
            //array_push($contacts, $row); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array
        }
    }
    return $result;
}

function createUser($mysqli, $firstname, $lastname, $city, $phone, $email, $password, $image)
{
    $sql = "INSERT INTO users (firstname, lastname, city, phone, email, password, image) 
                VALUES ('$firstname', '$lastname', '$city', '$phone', '$email', '$password', '$image');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->connect_error);
    } else {
        echo 'Record aggiunto con successo!!!';
    }
}


function removeUser($mysqli, $id) {
    if(!$mysqli->query('DELETE FROM users WHERE id = ' . $id)) { echo($mysqli->connect_error); }
    else { echo 'Record eliminato con successo!!!';}
}

function updateUser($mysqli, $id, $firstname, $lastname, $city, $phone, $email, $password, $image) {
    $sql = "UPDATE users SET 
                        firstname = '" . $firstname . "', 
                        lastname = '" . $lastname. "', 
                        city = '" . $city. "', 
                        phone = '" . $phone. "', 
                        email = '" . $email. "', 
                        password = '" . $password. "',
                        image = '" . $image . "' 
                        WHERE id = " . $id;
        if(!$mysqli->query($sql)) { echo($mysqli->connect_error); }
        else { echo 'Record aggiornato con successo!!!';}
}