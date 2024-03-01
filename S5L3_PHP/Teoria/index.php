<?php

    include('namespace');

    // Soluzione 1
    // Utilizzare l'intero percorso del namespace\classe
    $obj = new Zend\Test('Sono un namespace!!!');

    // Soluzione 2
    // definire il namespace\classe che si vuole utilizzare tramite USE
    use Zend\Test;
    $obj2 = new Test('Sono un namespace!!!');

    // Soluzione 3
    // definire il namespace\classe che si vuole utilizzare tramite USE e gli assegno un ALIAS
    use Zend\Test as T;
    $obj2 = new T('Sono un namespace!!!');

