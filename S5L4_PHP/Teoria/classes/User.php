<?php

namespace User {

    // Una Classe astratta non può essere istanziata
    // In una classe astratta posso definire metodi astratti e metodi normali con implementazione
    // i metodi astratti sono metodi che hanno sono la dichiarazione come le interfacce 
    // e devono essere implementati nelle sottoclassi
    abstract class User {

        private static $count = 0; // STATIC proprietà di classe
        protected $username; // prorietà di istanza
        protected $email; // prorietà di istanza
        private $password; // prorietà di istanza

        // Costruttore della superclasse
        function __construct($username, $email) {
            echo 'Sono il costruttore della superclasse user';
            $this->username = $username;
            $this->email = $email;
            $this->password = 'fhjnasfjas';
            //$this->count++; // -> Mi riferisco all'ogg che sto creando
            self::$count++; // -> Mi riferisco alla classe User
        }

        // Metodo public ereditato da tutte le sottoclassi
        public function info() {    
            return " Username: " . $this->username . " Email: " . $this->email;
        }

        public static function getCountUser() { // STATIC metodo di classe
            // return $this->count; // leggo una proprietà di istanza
            return self::$count; // leggo una proprietà di classe static
        }

        abstract function recuperaPassword();
    }

    // per capire l'utizzo dell'ereditarietà devo rispondere alla domanda E' un 
    class Guest extends User {
        protected $name; // prorietà di istanza

        // Metodo magico PHP Costruttore
        function __construct($name, $username, $email) {
            parent::__construct($username, $email); // Richiamo il costruttore della superclasse
            /* $this->username = $username;
            $this->email = $email; */
            $this->name = $name;
        }

        // Override dei metodi -> sovrascrivo la logica del metodo definita nella superclasse
        public function info() {
            //return "Name: " . $this->name . " Username: " . $this->username . " Email: " . $this->email;
            return "Name: " . $this->name . parent::info(); // -> con parent accedo a i metodi definiti nella supercalsse
        }
        function recuperaPassword() {

        }
    }

    class RegisterdUser extends User implements IRegisteredFunc {
        
        /* private $username; // prorietà di istanza
        private $email; // prorietà di istanza */
        protected $name; // prorietà di istanza
        protected $lastname; // prorietà di istanza
        protected $city; // prorietà di istanza

        // Metodo magico PHP Costruttore
        function __construct($name, $lastname, $city, $username, $email) {
            parent::__construct($username, $email);
            /* $this->username = $username;
            $this->email = $email; */
            $this->name = $name;
            $this->lastname = $lastname;
            $this->city = $city;
        }

        // Override dei metodi -> sovrascrivo la logica del metodo definita nella superclasse
        public function info() {
            //return "Name: " . $this->name . " Lastname: " . $this->lastname . " City: " . $this->city . " Username: " . $this->username . " Email: " . $this->email;
            return "Name: " . $this->name . " Lastname: " . $this->lastname . " City: " . $this->city . parent::info(); // -> con parent accedo a i metodi definiti nella supercalsse
        }

        public function login() {

        }

        public function logout() {
            
        }

        function recuperaPassword() {

        }
        
    }


    class Admin extends RegisterdUser {
/*         private $username; // prorietà di istanza
        private $email; // prorietà di istanza
        public $name; // prorietà di istanza
        public $lastname; // prorietà di istanza
        public $city; // prorietà di istanza */
        
        protected $fiscalcode; // prorietà di istanza

        // Metodo magico PHP Costruttore
        function __construct($name, $lastname, $city, $username, $email, $fiscalcode) {
            parent::__construct( $name, $lastname, $city, $username, $email);
            /* $this->username = $username;
            $this->email = $email; */
            /* $this->name = $name;
            $this->lastname = $lastname;
            $this->city = $city; */
            $this->fiscalcode = $fiscalcode;
        }

        // Override dei metodi -> sovrascrivo la logica del metodo definita nella superclasse
        public function info() {
            //return "FiscalCode: " . $this->fiscalcode . " Name: " . $this->name . " Lastname: " . $this->lastname . " City: " . $this->city . " Username: " . $this->username . " Email: " . $this->email;
            return "FiscalCode: " . $this->fiscalcode . parent::info(); // -> con parent accedo ai metodi definiti nella supercalsse
        }

    }


    // Interfaccia definisce i metodi che una classe deve implementare
    // In un interfaccia devo definere solo la dichiarazione dei metodi
    // Nella classe vado a definire l'implementazione dei metodi definiti nella interfaccia
    // Tutti i metodi devono essere public
    // per capire l'utizzo dell'interfaccia devo rispondere alla domanda HA un 
    interface IRegisteredFunc {
        public function login();
        public function logout();
    }

    
    abstract class Veicolo {
        
        abstract function speedUp();
    }

    class Automobile extends Veicolo {
        function speedUp() {
            return 'Automobile ++';
        }
    }

    class Moto extends Veicolo {
        function speedUp() {
            return 'Moto ++';
        }
    }

    class Camper extends Veicolo {
        function speedUp() {
            return 'Camper ++';
        }
    }

    class Barca extends Veicolo {
        function speedUp() {
            return 'Barca ++';
        }
    }

    //$v = new Veicolo();

}
