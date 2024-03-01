<?php

// Modificatori di accesso di un linguaggio OOP
// Public -> Modificatore di Accesso che mi permette di rendere visibile un attributo/metodo 
//           sia nella classe in cui è stato definito che dall'esterno della classe 
// Private -> Modificatore di Accesso che mi permette di rendere visibile un attributo/metodo 
//            nella classe in cui è stato definito ma NON dall'esterno della classe ne nelle sottoclassi 
// Protected -> Modificatore di Accesso che mi permette di rendere visibile un attributo/metodo 
//            nella classe in cui è stato definito ma NON dall'esterno della classe. 
//            Posso accedere a attributi protected in tutte le sottoclassi
class Car {
    public $colore;
    protected $cambio;
    private $modello;
    private $marca;

    function __construct($colore, $modello, $marca, $cambio) {
        $this->colore = $colore;
        $this->modello = $modello;
        $this->marca = $marca;
        $this->cambio = $cambio;
    }

    public function getInfo() {
        echo $this->colore . " " . $this->modello . " " . $this->marca . " " .$this->cambio;
    }

    // GETTER
    public function getMarca() {
        // controllo
        return $this->marca;
    }

    public function getModello() {
        // controllo
        return $this->modello;
    }

    // SETTER
    public function setMarca($marca) {
        // controllo
        $this->marca = $marca;
    }
}

class Suv extends Car {
    
    function getInfo() {
        return $this->colore . " " . $this->cambio ;
    }
}

$s = new Suv('Nero', 'Audi', 'Q7', 'Automatico');


$obj = new Car('Rosso', 'Fiat', 'Panda', 'Manuale');

$obj->colore = 'Verde';
//$obj->marca = 'Renault'; // ERRORE -> private
$obj->setMarca('Renault');
//$obj->modello = 'Captur'; // ERRORE -> private
//$obj->cambio = 'Automatico'; // ERRORE -> protected

//echo $obj->marca; // ERRORE -> private
echo $obj->getMarca();
//echo $obj->modello; // ERRORE -> private
echo $obj->getModello();
echo $obj->colore;
//echo $obj->cambio; // ERRORE -> protected

var_dump($obj);





// Esempi sul concetto di Ereditarietà

class Automobile {
    public $marca;
    public $modello;
} 

/* class Smartphone {
    public $marca;
    public $modello;
} */

class Smartphone extends Automobile { } // Errore perchè uno Smartphone non è una Automobile

class Persona {
    public $name;
    public $age;
}

class Uomo extends Persona {
    public $forza;
}

class Donna extends Persona {
    public $bellezza;
}

$u = new Uomo();
$u->name = 'Mario';
$d = new Donna();
$d->name = "Maria";


namespace Smart {
    class Test {}
}
