<?php

namespace Biblioteca {

     // Creare un'interfaccia chiamata Prestito che definisce i metodi presta() e restituisci().
     interface Prestito {
        public function presta();
        public function restituisci();
    }

    // Creare una classe astratta chiamata MaterialeBibliotecario che implementa l'interfaccia Prestito 
    // e contiene un attributo statico $contatoreMateriali per tenere traccia del numero totale 
    // di materiali nella biblioteca.

    abstract class MaterialeBibliotecario implements Prestito {
        private static $contatoreMateriali = 0;
        public $id;
        public $titolo;
        public $annoPubblicazione;

        public function __construct($id, $titolo, $annoPubblicazione) {
            $this->id = $id;
            $this->titolo = $titolo;
            $this->annoPubblicazione = $annoPubblicazione;
            self::$contatoreMateriali++;
        }

        protected static function decrementaMateriali() {
            self::$contatoreMateriali--;
        }

        protected static function incrementaMateriali() {
            self::$contatoreMateriali++;
        }

        public static function getContatoreMateriali() {
            return self::$contatoreMateriali;
        }
    }

    //Creare due sottoclassi di MaterialeBibliotecario: 
    // Libro: con attributi come titolo, autore, annoPubblicazione e un metodo statico contaLibri() 
    // per contare il numero totale di libri nella biblioteca. 
    
    class Libro extends MaterialeBibliotecario {
        // private $titolo;
        // private $annoPubblicazione;
        public $autore;
        
        private static $contatoreLibri = 0;

        public function __construct($id, $titolo, $annoPubblicazione, $autore) {
            parent::__construct($id, $titolo, $annoPubblicazione);
            $this->autore = $autore;
            self::$contatoreLibri++;
        }

        public static function contaLibri() {
            return self::$contatoreLibri . '/' . self::getContatoreMateriali();
        }
        public function presta() {
            parent::decrementaMateriali();
        }
        public function restituisci() {
            parent::incrementaMateriali();
        }

    }
    
    // DVD: con attributi come titolo, regista, annoPubblicazionee un metodo statico contaDVD() 
    // per contare il numero totale di DVD nella biblioteca.

    class DVD extends MaterialeBibliotecario {
        // private $titolo;
        // private $annoPubblicazione;
        private $regista;
        
        private static $contatoreDVD = 0;

        public function __construct($id, $titolo, $annoPubblicazione, $regista) {
            parent::__construct($id, $titolo, $annoPubblicazione);
            $this->regista = $regista;
            self::$contatoreDVD++;
        }

        public static function contaDVD() {
            return self::$contatoreDVD . '/' .self::getContatoreMateriali();
        }
        public function presta() {
            parent::decrementaMateriali();
        }
        public function restituisci() {
            parent::incrementaMateriali();
        }

    }
}