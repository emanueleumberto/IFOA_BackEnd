<?php 
    /* session_start();
    var_dump($_REQUEST);
    $contacts = isset($_SESSION['contacts'])  ?  $_SESSION['contacts'] : [] ; */

    require_once 'config.php';
    //var_dump($mysqli);

    include_once('function.php');

    $contacts = [];
    $target_dir = "uploads/";
    $image = $target_dir.'avatar.png';

    if(!empty($_FILES['image'])) {
        if($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpg') {
            if($_FILES['image']["size"] < 4000000) {
                if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                    if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'])) {
                        $image = $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'];
                        echo 'Caricamento avvenuto con successo';
                    } else {
                        echo 'Errore!!!';
                    }
                }
            } else {
                echo 'FileSize troppo grande';
            }
        } else {
            echo 'FileType non supportato';
        }
    }

    // fare i controlli di validazione dei campi
    $regexphone = '/(?:([+]\d{1,4})[-.\s]?)?(?:[(](\d{1,3})[)][-.\s]?)?(\d{1,4})[-.\s]?(\d{1,4})[-.\s]?(\d{1,9})/';
    preg_match_all($regexphone, htmlspecialchars($_REQUEST['phone']), $matches, PREG_SET_ORDER, 0);
    $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
    preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
    preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);

    $firstname = strlen(trim(htmlspecialchars($_REQUEST['firstname']))) > 2 ? trim(htmlspecialchars($_REQUEST['firstname'])) : exit();
    $lastname = strlen(trim(htmlspecialchars($_REQUEST['lastname']))) > 2 ? trim(htmlspecialchars($_REQUEST['lastname'])) : exit();
    $city = strlen(trim(htmlspecialchars($_REQUEST['city']))) > 2 ? trim(htmlspecialchars($_REQUEST['city'])) : exit();
    $phone = $matches ? htmlspecialchars($_REQUEST['phone']) : exit();
    $email = $matchesEmail ? htmlspecialchars($_REQUEST['email']) : exit();
    $pass = $matchesPass ? htmlspecialchars($_REQUEST['password']) : exit();
    $password = password_hash($pass , PASSWORD_DEFAULT);

    if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'delete') {
        removeUser($mysqli, $_REQUEST['id']);
        exit(header('Location: http://localhost/S1L4_SQL/Esercizio/'));

    } else if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'update'){
        updateUser($mysqli, $_REQUEST['id'], $firstname, $lastname, $city, $phone, $email, $password, $image);
        exit(header('Location: http://localhost/S1L4_SQL/Esercizio/'));
    }

    
   /*  $contact = [
        'Firstname' => $firstname, 
        'Lastname' => $lastname, 
        'City' => $city, 
        'Phone' => $phone,  
        'Email' => $email,
        'Password' => $password,
        'Image' => $image
    ]; 

    $_SESSION['contacts'] = [...$contacts, $contact];
    session_write_close(); */

    // Gestione del DB

    // Inserisco dati in una tabella
    

    createUser($mysqli, $firstname, $lastname, $city, $phone, $email, $password, $image);
    
    include_once('mail.php'); 

    exit(header('Location: http://localhost/S1L4_SQL/Esercizio/'));
    
?>