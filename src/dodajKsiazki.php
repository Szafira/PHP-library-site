<?php

if(!isset($_SESSION['zalogowany'])){
    header('Location: login.php');
    exit;
} else {
 

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
    if(isset($_POST['Przeczytano'])) 
    { $tick = 1; }
    else 
    { $tick = 2;}
 
if(empty($autorksiazka) || empty($tytulksiazka) || empty($stan))
{ echo "wymagane wszystkie pola"; }
else 
{ $blad=0;}


if ($blad == 0)
{
  $zapytanie = "INSERT INTO bookcollection (title, author, stats, toRead) VALUES ( '$tytulksiazka' , '$autorksiazka' , '$stan' ,'$tick')";
  
{
  if ($polaczenie->query($zapytanie) === TRUE) {
    echo "Pomyślnie dodano do bazy";
  } else {
  echo "Nie udało się dodać do bazy, błąd: " . $zapytanie . "<br>" . $polaczenie->connect_error;
  }
}
}
}
$odczytBazy ="SELECT * FROM bookcollection";
$wyniki= mysqli_query($polaczenie,$odczytBazy); 

while($row = mysqli_fetch_assoc($wyniki)) {
  
  echo "Tytuł:" . $row['title'] ." Autor: " . $row['author']." Status: ".$row['stats']."  ". $row['toRead']."<br>";
  ?>
  
  <td><a href="src/buttons/delete.php?id=<?php echo $row['ID'] ?>">Delete</a></td>

<?php
}
}

?>