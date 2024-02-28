<?php

$dir = 'file/';
$file = 'users.csv';

$users = [
    ['Mario', 'Rossi', 'Roma'],
    ['Giuseppe', 'Verdi', 'Milano'],
    ['Francesca', 'Neri', 'Napoli']
];

$admin = [];

echo '<h1>Gestione file .csv</h1>';

// Creazione di una directory se non esiste
if(!file_exists($dir)) {
    mkdir($dir, 0777);
} 

// Scrittura di un file CSV file/users.csv
$resource = fopen($dir.$file, 'w');
if($resource) {
    foreach($users as $user) {
        fputcsv($resource, $user, ';');
    }
    fclose($resource);
}

// Lettura di un file CSV file/users.csv
$resource = fopen($dir.$file, 'r');
while($data = fgetcsv($resource)) {
    //print_r($data);
    $admin[] = implode('', $data);
}
fclose($resource);

print_r($admin);
