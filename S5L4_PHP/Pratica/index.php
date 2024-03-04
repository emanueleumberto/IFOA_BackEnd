<?php

   require_once('Biblioteca.php');

   use Biblioteca\MaterialeBibliotecario;
   use Biblioteca\Libro;
   use Biblioteca\DVD;

   $l1 = new Libro('Harry Potter', 1997, 'J. K. Rowling');
   $l2 = new Libro('Il Grande Libro di Batman', 2020, 'AA.VV.');

   echo '<h3>Libri Totali n.' . Libro::contaLibri() . '</h3>';

   //$l2->presta();

   $d1 = new DVD('Harry Potter Collezione completa', 2000, 'Chris Columbus');

   echo '<h3>DVD Totali n.' . DVD::contaDVD() . '</h3>';

   echo '<h3>Materiali n.' . MaterialeBibliotecario::getContatoreMateriali() . '</h3>';


    