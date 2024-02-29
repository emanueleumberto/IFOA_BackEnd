<?php

    require_once('db.php');

    // Setting a session
    session_start();

    print_r($_REQUEST);

    // Verifico il formato di una email
    $regexemail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
    preg_match_all($regexemail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    $email = $matchesEmail ? htmlspecialchars($_REQUEST['email']) : exit();
    
    // Verifico il formato di una password
    $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
    preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);
    $pass = $matchesPass ? htmlspecialchars($_REQUEST['password']) : exit();
    //$password = password_hash($pass , PASSWORD_DEFAULT);

    /* if(strlen($email) < 3 || strlen($password) < 3) {
        $_SESSION['error'] = 'Email e Password errati!!!';
        header('Location: http://localhost/S5L2_PHP/login.php');
    } */

    // Leggo dati da una tabella
    $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
    $res = $mysqli->query($sql); // return un mysqli result

    if($row = $res->fetch_assoc()) { 
        if(password_verify($pass, $row['password'])){
            $_SESSION['userLogin'] = $row;
            session_write_close();
            // Verifico se durante il login è stata messa la spunto sulla checkbox Remember me
            if(isset($_REQUEST['check'])) {
                // Setting a cookie
                setcookie("useremail", $row['email'], time()+20*24*60*60);
                setcookie("userpassword", $row['password'], time()+20*24*60*60);
            }
            header('Location: http://localhost/S5L2_PHP/');
            exit;
        } else {
            $_SESSION['error'] = 'Password errata!!!';
            header('Location: http://localhost/S5L2_PHP/login.php');
        }
    } else {
        $_SESSION['error'] = 'Email e Password errati!!!';
        header('Location: http://localhost/S5L2_PHP/login.php');
    }

    
