<?php

$dir = 'file/';
$file = 'users.xml';

echo '<h1>Gestione file .xml</h1>';

// Creazione di una directory se non esiste
if(!file_exists($dir)) {
    mkdir($dir, 0777);
} 

// Lettura di un file XML file/users.xml
if (file_exists($dir.$file)) {
    $xml = simplexml_load_file($dir.$file); // Leggo un file XML
    
    //print_r($xml);
    foreach($xml as $item) {
        echo "<p>Name: $item->name Lastname: $item->lastname City: $item->city</p>";
    }
} else {
    exit('Failed to open test.xml.');
}

// Scrittura di un file XML file/users.xml

$user = [
    'name' => 'Antonio',
    'lastname' => 'Bianchi',
    'city' => 'Torino'
];

$xml = simplexml_load_file($dir.$file); // Leggo un file XML
$userXml = $xml->addChild('user'); // creo un nodo user XML <user> </user>
$userXml->addChild('name', 'Antonio'); // creo un nodo XML name con il suo valore  <name>Antonio</name>
$userXml->addChild('lastname', 'Bianchi'); // creo un nodo XML lastname con il suo valore  <lastname>Bianchi</lastname>
$userXml->addChild('city', 'Torino'); // creo un nodo XML city con il suo valore  <city>Torino</city>

$file = fopen($dir.$file, 'w');
fwrite($file, $xml->asXML()); // scrivo sul file un XML
fclose($file);