<?php

    // Una classe è un modello che definisce attributi e metodi
    // attributi sono le caretteristiche dell'oggetto che andrò a creare
    // metodi sono le azioni che può compiere un oggetto
    class User {
        const type = 'User'; // Costante prorietà di Classe
        public $name; // prorietà di istanza
        public $lastname; // prorietà di istanza
        public $city; // prorietà di istanza
        public $email; // prorietà di istanza
 
        // Metodo magico PHP Costruttore
        function __construct($name, $lastname, $city) {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->city = $city;
        }

        // Metodo che restituisce il valore di una costante
        function getType() {
            return self::type; // Accedo ad una costante -> self = Classe
        }

        // Metodo che restituisce il valore di attributi di istanza
        public function getUserInfo() {
            return $this->name . ' ' . $this->lastname . ' ' . $this->city; // Accedo a attributi dell'oggetto
        }
    }

    // con new ho la possibilità di instaziare un oggetto.
    //$obj = new User();
    $obj = new User('Mario', 'Rossi', 'Roma');
    $obj->email = 'm.rossi@example.com';

    $obj2 = new User('Giuseppe', 'Verdi', 'Milano');
    $obj2->email = 'g.verdi@example.com';

    $obj3 = new User('Giuseppe', 'Verdi', 'Milano');
    $obj3->email = 'g.verdi@example.com';
    
    // Una proprietà public è possibile scriverla in questo modo
    /*  
        $obj->name = 'Mario';
        $obj->lastname = 'Rossi';
        $obj->city = 'Roma'; 
    */

    // Una proprietà public è possibile leggerla in questo modo
    echo "<p>Name:  $obj->name </p>";
    echo "<p>Lastname:  $obj->lastname </p>";
    echo "<p>City:  $obj->city </p>";
    /* echo "<p>Type:" . User::type . "</p>"; */ // leggo un attributo della classe
    echo "<p>Type:" . $obj->getType() . "</p>"; // leggo un metodo di istanza che restituisce un attributo di classe
    echo "<p>----</p>";
    echo "<p>Name:  $obj2->name </p>";
    echo "<p>Lastname:  $obj2->lastname </p>";
    echo "<p>City:  $obj2->city </p>";
    /* echo "<p>Type:" . User::type . "</p>"; */ // leggo un attributo della classe
    echo "<p>Type:" . $obj2->getType() . "</p>"; // leggo un metodo di istanza che restituisce un attributo di classe
    echo "<p>----</p>";
    echo "<p>" . $obj->getUserInfo() . "</p>";
    echo "<p>" . $obj2->getUserInfo() . "</p>";
    var_dump($obj);