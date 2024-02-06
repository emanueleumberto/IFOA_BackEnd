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

function login($mysqli, $email, $password) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = $mysqli->query($sql);
    //var_dump($res);
    if($res) { // Controllo se ci sono dei dati nella variabile $res 
        $result = $res->fetch_assoc(); // estraggo ogni singola riga che leggo dal DB e la inserisco in un array  
    }
    //var_dump($result['password']);
    if(password_verify($password, $result['password'])){
        echo 'Login effettuato!!';
        $_SESSION['userLogin'] = $result;
        session_write_close();
        exit(header('Location: http://localhost/S1L4_SQL/Esercizio/'));
    } else {
        echo 'Password errata!!';
    }
}

function addPost($mysqli, $title, $description) {
    $user = $_SESSION['userLogin']['id'];
    if($user) {
        $sql = "INSERT INTO posts (title, description, user_id) 
        VALUES ('$title', '$description', $user);";
        if (!$mysqli->query($sql)) {
            echo ($mysqli->connect_error);
        }
    }
}

function getPostsByUserID($mysqli, $userID) {
    $result = [];
    $sql = "SELECT * FROM users INNER JOIN posts ON users.id = posts.user_id WHERE posts.user_id  = $userID";
    $res = $mysqli->query($sql);
    if($res) { 
        while ($row = $res->fetch_assoc()) { 
            $result[] = $row; 
        }
    }
    return $result;
}