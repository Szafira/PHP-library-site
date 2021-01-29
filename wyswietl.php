
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title> Świat książki</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <h1> Świat książki </h1>
  </head>
  <body>
    
       <div class="naprzyciski">
          <a class="przyciski" href="wyswietl.php"> Wyszukaj książki </a>
          <a class="przyciski" href="dodaj.php"> Dodaj książki </a>
          <a class="przyciski" href="zarejestruj.php"> zarejestruj się </a> 
          <a class="przyciski" href="zaloguj.php"> Zaloguj się </a>  
        </div>

        <div class="zawartosc"> 
          
          <form action="" method="post">
          <tr>
            <td>Autor/książka</td>
            <td><input type="text" name="szukanyTyp"></td>
          </tr>

          <tr>
            <td>Szukane hasło:</td>
            <td><input type="text" name="haslo"></td>
          </tr>

          <tr>
            <td> </td>
            <td><input type="submit" name="szukane" value="Wyślij formularz"></td>
          </tr>
          </form>
                  
         
        </tresc>
        
    <?php
   
  
     $nazwaserwera = 'localhost';
     $nazwauzytkownika = 'normalUser';
     $haslobazy = 'user';
     $nazwabazy = 'bookDatabase';
     
     $polaczenie = new mysqli($nazwaserwera, $nazwauzytkownika, $haslobazy, $nazwabazy);
     if ($polaczenie->connect_error) {
       die("Nastąpił błąd połączenia z bazą: " . $polaczenie->connect_error);
     } 
   
    include 'src\curlSetup.php' ?>
    
  <!-- <div class="tresclewa"> lewo </div>
    <div class="trescprawa"> prawo </div> */ -->
    
    
  </body>
</html>