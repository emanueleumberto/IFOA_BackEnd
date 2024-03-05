<?php

    // PDO -> Php Data Object

    /* try {
        // Connessione al DB tramite PDO
        $conn = new PDO('mysql:host=localhost; database=pdo_test;', 'root', '');
    
         $sql = 'SELECT * FROM users';
        $res = $conn->query($sql, PDO::FETCH_ASSOC);
        if($res) { // Controllo se ci sono dei dati nella variabile $res
            foreach($res as $row) {
                print_r($row);
            }
        } 
    
    
    } catch (PDOException $e) {
        // Nel caso in cui ho problemi a connettermi con il DB blocco tutto e visualizzo il messaggio di errore
        die('Failed to connect to PDO database: ' . $e->getMessage());
    } */

    
    //echo 'Connect to database';


    // Classe Singleton PDO
    namespace db {
        //use PDO;
        class DB_PDO {
            private $conn;

            private static $instace = null;

            private function __construct(array $config){
                //print_r($config);
                $this->conn = new \PDO($config['dsn'], $config['user'], $config['password']);
                /* $this->conn = new \PDO( $config['driver'].":host=".$config['host']."; 
                                        database=".$config['database'], 
                                        $config['user'], 
                                        $config['password']); */
            }

            public static function getInstance(array $config) {
                if(!static::$instace) {
                    static::$instace = new DB_PDO($config);
                }
                return static::$instace;
            }

            public function getConnection() {
                return $this->conn;
            }

        }

    }
