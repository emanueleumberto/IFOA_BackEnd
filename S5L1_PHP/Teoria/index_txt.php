<?php
    // mkdir() — Crea una directory -> mkdir(string $pathname, int $mode = 0777): bool 
    // rmdir() - Rimuove una directory
    // scandir() — Lista di file e directory contenute in un path
    
    // is_dir() - Dice se la stringa corrisponde ad una directory
    // is_file() - Dice se la stringa corrisponde ad un file
    // file_exists() - Controlla se un file o una directory esiste
    // copy() — Copia un file esistente
    // rename() — Rinomina un file o una directory
    // unlink() — Cancella un file

    // fopen() — Apre un file o un URL
    // fread() - Legge un file salvaguardando la corrispondenza binaria
    // fwrite() — Scrive un file salvaguardando la corrispondenza binaria
    // filesize() — Restituisce la dimensione del file
    // fclose() — Chiude un puntatore a file aperto

    $dir = 'file/';
    $file = 'text.txt';

    echo '<h1>Gestione file .txt</h1>';

    // Creazione di una directory se non esiste
    if(!file_exists($dir)) {
        mkdir($dir, 0777);
    } else {
        //die('Failed to create folders...');
    }

    // Lettura del contenuto di una directory
    $files = scandir($dir);
    var_dump($files);
    foreach($files as $item) {
        if($item === '.' || $item === '..') { continue; }
        if(is_dir($dir.$item)) { echo "<h3>$item è una directory</h3>";}
        if(is_file($dir.$item)) { echo "<h3>$item è un file</h3>";}
    }

    // Scrittura di un file file/text.txt
    // Ciao a tutti!!!
    $resource = fopen($dir.$file, 'w');
    if($resource) {
        fwrite($resource, 'Nuovo contenuto del file - ');
        fclose($resource);
    }

    // Appendo nuovo contenuto in un file file/text.txt
    $resource = fopen($dir.$file, 'a');
    if($resource) {
        fwrite($resource, 'Ciao a tutti!!!');
        fclose($resource);
    }

    // Lettura di un file file/text.txt
    $resource = fopen($dir.$file, 'r');
    if($resource) {
        $txt = fread($resource, filesize($dir.$file));
        echo "<h2>$txt</h2>";
        fclose($resource);
    }

    // Copia di un file file/text.txt
    if(!copy($dir.$file, $dir.'new-file.txt')){
        echo "Impossibile copiare il file $file";
    }

    // rinomino un file file/text.txt
    if(!rename($dir.'new-file.txt', $dir.'new-copy-file.txt')) {
        echo "Impossibile rinominare il file richiesto";
    }

    // elimino un file file/text.txt
    if(!unlink($dir.'new-copy-file.txt')) {
        echo "Impossibile eliminare il file richiesto";
    }

    // Svuoto tutto il contenuto della directory
    /* foreach($files as $item) {
        if($item === '.' || $item === '..') { continue; }
        unlink($dir.$item);
    } */

    // Cancello una directory vuota
    /* if(file_exists($dir)) {
        rmdir($dir);
    } */


    echo '<h1>Hello world!</h1>';