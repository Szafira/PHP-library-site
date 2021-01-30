<?php
  
     $nazwaserwera = 'localhost';
     $nazwauzytkownika = 'normalUser';
     $haslobazy = 'user';
     $nazwabazy = 'bookDatabase';
     
     $polaczenie = new mysqli($nazwaserwera, $nazwauzytkownika, $haslobazy, $nazwabazy);
     if ($polaczenie->connect_error) {
       die("Nastąpił błąd połączenia z bazą: " . $polaczenie->connect_error);
     } 

?>