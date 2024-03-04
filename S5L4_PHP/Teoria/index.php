<?php
    require_once 'classes/User.php';

    echo '<p> UserCount: '. User\User::getCountUser() .'</p>';

    // Soluzione 1
    $a = new User\Admin('Mario', 'Rossi', 'Roma', 'mariorossi', 'm.rossi@example.com', 'AB123CD456RTYE');
    //echo '<p> UserCount: '.$a->getCountUser() .'</p>';
    echo '<p> UserCount: '. User\User::getCountUser() .'</p>';

    // Soluzione 2
    use  User\Guest;
    $g = new Guest('Giuseppe', 'giuseppeverdi', 'g.verdi@example.com');
    //$g->count = 25;
    //echo '<p> UserCount: '.$g->getCountUser() .'</p>';
    echo '<p> UserCount: '. User\User::getCountUser() .'</p>';

    // Soluzione 3
    use  User\RegisterdUser as RU;
    $r = new RU('Francesca', 'Neri', 'Milano', 'francescaneri', 'f.neri@example.com');
    //echo '<p> UserCount: '.$r->getCountUser() .'</p>';
    echo '<p> UserCount: '. User\User::getCountUser() .'</p>';

    //var_dump($a);
    //var_dump($g);
    //var_dump($r);

    echo "<h1>" . $a->info() . "</h1>";
    echo "<h1>" . $g->info() . "</h1>";
    echo "<h1>" . $r->info() . "</h1>";


    // Interfacce
    /* interface Navigatore {
        function avviaNavigatore();
        function spegniNavigatore();
        function impostaMappa();
        function aggiornaNavigatore();
    }


    class smartphone implements Navigatore { 
        function avviaNavigatore() {
            return 'Navigatore avviato!!';
        }
        function spegniNavigatore() {
            return 'Navigatore spento!!';
        }
        function impostaMappa(){
            return 'mappa impostata su Navigatore';
        }
        function aggiornaNavigatore(){
            return 'Navigatore aggiornato!!';
        }
    }
    class auto implements Navigatore {
        function avviaNavigatore() {
            return 'Navigatore avviato!!';
        }
        function spegniNavigatore() {
            return 'Navigatore spento!!';
        }
        function impostaMappa(){
            return 'mappa impostata su Navigatore';
        }
        function aggiornaNavigatore(){
            return 'Navigatore aggiornato!!';
        }
    }
    class tablet implements Navigatore {

        function avviaNavigatore() {
            return 'Navigatore avviato!!';
        }
        function spegniNavigatore() {
            return 'Navigatore spento!!';
        }
        function impostaMappa(){
            return 'mappa impostata su Navigatore';
        }
        function aggiornaNavigatore(){
            return 'Navigatore aggiornato!!';
        }
    }

    $sm = new smartphone();
    $car = new auto();
    $tb = new tablet();

    $sm->aggiornaNavigatore();
    $car->aggiornaNavigatore();
    $tb->aggiornaNavigatore(); */



?>
