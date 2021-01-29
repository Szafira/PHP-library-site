<?php

  $nazwaserwera = 'localhost';
  $nazwauzytkownika = 'normalUser';
  $haslobazy = 'user';
  $nazwabazy = 'bookDatabase';
  
  $polaczenie = new mysqli($nazwaserwera, $nazwauzytkownika, $haslobazy, $nazwabazy);
  if ($polaczenie->connect_error) {
    die("Nastąpił błąd połączenia z bazą: " . $polaczenie->connect_error);
  }
$autorksiazka= null;
$tytulksiazka=null;
$stan =null;
$blad = null;
if(isset($_POST['wyslij']))
{
    $autorksiazka = $_POST['autorksiazka'];  
    $tytulksiazka = $_POST['tytulksiazka'];
    $stan = $_POST['stan'];
}   //$tick = $_POST['Przeczytano'];

if(empty($autorksiazka) || empty($tytulksiazka) || empty($stan))
{ $blad= "wymagane wszystkie pola";}
else 
{ $blad= 0; }


if ($blad = 0)
{
  $zapytanie = "INSERT INTO bookcollection (title, author, stats) VALUES ( '$tytulksiazka' , '$autorksiazka' , '$stan' )";
  $odczytBazy ="SELECT * FROM bookcollection";

  if(isset($_POST['wyslij'])) //Inaczej z automatu wyśle puste dane
{
  if ($polaczenie->query($zapytanie) === TRUE) {
    echo "Pomyślnie dodano do bazy";
  } else {
  echo "Nie udało się dodać do bazy, błąd: " . $zapytanie . "<br>" . $polaczenie->connect_error;
  }
}
}
else
    echo $blad;
?>