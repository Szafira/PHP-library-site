<?php
if(isset($_POST['szukane']))
{    
  //Curl do API OpenLibrary (Search)
  $szukanyTyp = $_POST['szukanyTyp'];
  $szukaneHaslo = $_POST['haslo'];
  if ($szukaneHaslo == '')
  {
    echo("Wymagane pole");
  }
  else
  {
  $adresKsiazki = null;
  $hasloDoLinku = str_replace(" ", "+", $szukaneHaslo);
  $szukaneCalosc = "http://openlibrary.org/search.json?$szukanyTyp=$hasloDoLinku"; 
  $ch = curl_init($szukaneCalosc);

  $fp = fopen("searchResults.json", "w");

  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  if(curl_error($ch)) {
      fwrite($fp, curl_error($ch));
  }
  curl_close($ch);

  curl_exec($ch);

    // konwertowanie jsona żeby dało się to wyświetlić
$szukane_klucze_json = file_get_contents("searchResults.json"); 
$szukane_klucze_array = json_decode($szukane_klucze_json, true);
   
$sprawdzone = $szukane_klucze_array['docs'];
    echo '<table>';
  //Poniższa funkcja ma na celu wyrzucenie 5 wyników wyszukiwania
  for($i = 0; $i<5; $i++)
  {
    $tytulKsiazki = $sprawdzone[$i]['title'];

    echo '<tr>';
    echo '<td>'.$tytulKsiazki.'</td>';
    $adresKsiazki = $sprawdzone[$i]['key'];
    
    //Wyłapanie maksymalnej ilości okładek 
    if (!isset($sprawdzone[$i]['cover_edition_key']))
    { return $sprawdzone[$i] ?? null;}
    else
    { $podstawowe_okladki = $sprawdzone[$i]['cover_edition_key']; }
    
    //Curl do API OpenLibrary (Books) 
    $szukaneCaloscKsiazka = "http://openlibrary.org$adresKsiazki.json"; 
    $chBooks = curl_init($szukaneCaloscKsiazka);

    $fpBooks = fopen("bookKeys.json", "w");

    curl_setopt($chBooks, CURLOPT_FILE, $fpBooks);
    curl_setopt($chBooks, CURLOPT_HEADER, 0);

    if(curl_error($chBooks)) {
        fwrite($fpBooks, curl_error($chBooks));
    }
    curl_close($chBooks);

    curl_exec($chBooks);

    $szukane_ksiazki_json = file_get_contents("bookKeys.json");
    $szukane_ksiazki_array =json_decode($szukane_ksiazki_json, true);

//Szukanie adresu okładki w openlibrary
    $szukaneCaloscOkladka = "http://covers.openlibrary.org/b/olid/$podstawowe_okladki-M.jpg"; 
    $imageData = base64_encode(file_get_contents($szukaneCaloscOkladka));
    echo '<td>';
    echo '<img src="data:image/jpeg;base64,'.$imageData.'">' ;
    echo '</td>';
    echo '</tr>';
    
  }
  echo '<table>';
}
}
?>