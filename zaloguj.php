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

        <div id="zawartosc">
           <table> 
            <form action="" method="POST">
                <tr>
                  <td> Adres e-mail </td>   <td> <input type="text" name="login"> </td>
                 </tr>
                 <tr> 
                  <td> Hasło </td>          <td> <input type="password" name="haslo1"> </td>
                </tr> 
                <tr> 
                <td> </td>                  <td> <input type="submit" name="zaloguj" value="Zaloguj się"> </td> 
            </form>
           </table> 
        </div>
   
   
   <!-- <div class="tresclewa"> lewo </div>
    <div class="trescprawa"> prawo </div> */ -->

  </body>
</html>

<?php 
  $nazwaserwera = 'localhost';
  $nazwauzytkownika = 'normalUser';
  $haslobazy = 'user';
  $nazwabazy = 'bookdatabase';
  
  $polaczenie = new mysqli($nazwaserwera, $nazwauzytkownika, $haslobazy, $nazwabazy);
  if ($polaczenie->connect_error) {
    die("Nastąpił błąd połączenia z bazą: " . $polaczenie->connect_error);
  }

  if (isset($_POST['zaloguj'])) 
  {
    $email = $_POST['login'];
    $haslo1 = $_POST['haslo1'];
    $bledy=array();

    if (empty($email)) 
      { $bledy[0]=0;}
    else 
      { $bledy[0]=1;}
    if (empty($haslo1)) 
      { $bledy[1]=0;}
    else 
      { $bledy[1]=1;}
      

    if($bledy[0]= 1 && $bledy[1]=1)
    {
      echo "Test przed połączeniem<br>";
      $haslo1 = md5($haslo1);
      echo $haslo1."<br>";
      $zapytanie= "SELECT * FROM users WHERE email='$email' AND psswd='$haslo1'";
      $wynik = $polaczenie->query($zapytanie);
      if ($wynik->num_rows >0){

          $_SESSION['email'] = $email;
          $_SESSION['logowanie'] = "Jesteś zalogowany";}

        else
        { echo "Niepoprawne hasło lub email"; }
   }
  }
    
  ?>