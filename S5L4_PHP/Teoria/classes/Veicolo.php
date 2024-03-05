<?php

    namespace Veicolo {
        
        // abstract impedisce la possibilità di poter istanziare un ogg di tipo veicolo
        abstract class Veicolo {

            public function info() {
                echo 'Info Veicolo!! <br />';
            }
        }

        class Moto extends Veicolo {
            
        }

        abstract class Automobile extends Veicolo {}

        class Suv extends Automobile {
            // con final dichiaro che un metodo può essere ereditato ma non sovrascritto (override)
            final public function infoSuv() {
                echo 'Info Suv!! <br />';
            }
        }

        class Test extends Suv {
            /* public function infoSuv() {
                echo 'Info Test!! <br />';
            } */ //-> Errore infoSuv() è un metodo final
        }

        // class Monovolume extends Berlina {} // -> Errore!!! Classe Berlina final

        // con final dichiaro che una classe non può essere più estesa
        final class Berlina extends Automobile {
            // A partire dalla versione 7.X.X possiamo definire le dichiarazioni di tipo
            /* private int $id;
            private string $modello;
            private string $marca;
            private ?string $targa; // $targa può ricevere un valore idi tipo string | null
            private bool $elettrico;

            public function __construct(int $id, string $modello, string $marca, ?string $targa = null, bool $elettrico = false) {
                $this->id = $id;
                $this->modello = $modello;
                $this->marca = $marca;
                $this->targa = $targa;
                $this->elettrico = $elettrico;
            } 

            public function getTarga() {
                return $this->targa;
            }

            public function setTarga(?string $targa) {
                $this->targa = $targa;
            }*/

            // A partire dalla versione 8.X.X possiamo definire gli attributi di una classe
            // direttamente nei paramentri del costruttore
            public function __construct(
                                        private readonly int $id, // A partire dalla versione 8.X.X possiamo definire una proprietà readonly
                                        private string $modello, 
                                        private string $marca, 
                                        private ?string $targa = null, 
                                        private bool $elettrico = false) {} 

            // A partire dalla versione 8.X.X possiamo definire una proprietà readonly
            /* public function getId() {
                return $this->id;
            } */

            public function __get($name) {
                /* if($name === 'modello') {
                    echo 'Sono il metodo __get ' . $name;
                } */
                // dopo aver effettuato tutti i controlli del caso
                if (array_key_exists($name, $this->data)) {
                    return $this->data[$name];
                }
            }

            public function __set($name, $value) {
                // dopo aver effettuato tutti i controlli del caso
                if (array_key_exists($name, $this->data)) {
                    $this->data[$name] = $value;
                }  
            }

        
            public function getInfo() {
                return $this->id . ' ' . $this->modello . ' ' . $this->marca . ' ' . $this->targa . ' ' . $this->elettrico;
            }

            use Func; // Utilizzo tutti i metodi definiti nel Trait di nome Func

            /* public function controllaId() {
                echo 'faccio qualcosa';
            }

            public function test() {
                echo 'faccio qualcosa';
            } */
        }

        // Per risolvere parzialmente il problema dell'ereditarietà singola in PHP 
        // dalla versione 5.x.x sono stati introdotti i Traits
        // I Traits mi permettono di raggruppare più metodi condivisi tra classi diverse 

        trait Func {
            public function controllaId() {
                echo 'faccio qualcosa';
            }

            public function test() {
                echo 'faccio qualcosa';
            }
        }

        class TestTraits {

            use Func; // Utilizzo tutti i metodi definiti nel Trait di nome Func
            private int $id = 1;

            /* public function controllaId() {
                echo 'faccio qualcosa';
            }

            public function test() {
                echo 'faccio qualcosa';
            } */
        }

        $b = new Berlina(1, '500', 'Fiat', 'AB123CD', true);
        //echo $b->getInfo();
        //echo $b->getTarga();
        // Tramite il metodo magico __get posso leggere tutte le proprietà della classe
        echo $b->id;
        echo $b->marca;
        echo $b->modello;
        echo $b->targa;
        echo $b->elettrico;
        echo $b->pippo; // proprietà che non esiste nella classe Berlina
        // Tramite il metodo magico __set posso scrivere tutte le proprietà della classe
        $b->elettrico = true;
        $b->marca = 'true';
        $b->modello = 'true';
        $b->targa = 'true';
        //$b->id = 25; // Non posso scrivere perchè la proprietà id è di tipo readonly
        
    }

