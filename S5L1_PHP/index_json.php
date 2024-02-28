<?php

$dir = 'file/';
$file = 'users.json';

echo '<h1>Gestione file .json</h1>';

$content = file_get_contents($dir.$file);
$users = json_decode($content); // Trasformo un JSON in un array di oggetti
//var_dump($users);
$user = new stdClass(); // Creo un ogg predefinito di php
$user->name = 'Mario';
$user->lastname = 'Rossi';
$user->city = 'Roma';

$users[] = $user; // Aggiungo un elemento in coda all'array
//array_push($users, $user); // Aggiungo un elemento in coda all'array

//var_dump($users);
$json = json_encode($users); // Trasformo un array di oggetti in un JSON
$bytes = file_put_contents($dir.$file, $json);
echo 'Numero di byte inseriti ' . $bytes;