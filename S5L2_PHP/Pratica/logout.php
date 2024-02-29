<?php
    session_start(); // leggo una sessione esistente
    session_destroy(); // distruggo una sessione esistente
    setcookie("useremail", "", time()-3600); // distruggo un cookie esistente
    setcookie("userpassword", "", time()-3600); // distruggo un cookie esistente
    header('Location: http://localhost/S5L2_PHP/Pratica/');