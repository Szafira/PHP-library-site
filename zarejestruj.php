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
            <form action = "" method="POST"> 
            <tr> 
                <td> Imie i nazwisko </td>
                <td> <input type="text" name="imie"> </td>
            </tr>
              <tr>
                <td> Ustaw hasło <br> <small> (Wymagane 8 znaków, mała oraz duża litera, cyfra) </td>
                <td> <input type="password" name="pwd1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </td>
               </tr> 
               <tr>
                <td> Powtórz hasło <br> <small> </td>
                <td> <input type="password" name="pwd2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"> </td>
               </tr> 
            <tr>
                <td> Adres e-mail </td>
                <td> <input type="email" name="email"> </td>
             </tr>
            <tr>
                <td> </td>
                <td><input type="submit" name="wyslij" value="Wyślij formularz"></td>
</tr>     
        </div> </table>  </form>
   
   
   <!-- <div class="tresclewa"> lewo </div>
    <div class="trescprawa"> prawo </div> */ -->

  </body>
</html>

<?php 

if(isset($_POST['wyslij'])) {
   // inicjalizacja tablicy z bledami
   $bledy = array();
   $blad = array();
   $bledy['imie'] = 0;
  // w przypadku, gdy dane sa poprawne, wyswietl komunikat
  //if(array_sum($bledy) == 0) 
  //  echo "<p style='color: green;'>Dane poprawne.</p>";
  //  }
  $nazwaserwera = 'localhost';
    $nazwauzytkownika = 'normalUser';
    $haslobazy = 'user';
    $nazwabazy = 'bookdatabase'; //nazwe bazy sprawdz 
  
  $polaczenie = new mysqli($nazwaserwera, $nazwauzytkownika, $haslobazy, $nazwabazy);
    if ($polaczenie->connect_error) {
      die("Nastąpił błąd połączenia z bazą: " . $polaczenie->connect_error);
    }
  
  

  if(isset($_POST['wyslij']))
  {


  $imie = $_POST['imie'];  
  $haslo1 = $_POST['pwd1'];
  $haslo2 = $_POST['pwd2'];
  $email = $_POST['email'];

  if(empty($imie))
    { $blad[0]= "wymagane imie";}
  else 
    { $blad[0] = null; }
    
  if(empty($email))
    { $blad[1] = "wymagany email";}
  else 
    { $blad[1] = null; }

  if(empty($haslo1) or empty($haslo2))
    { $blad[2] = "wymagane hasło";}
  else 
    { $blad[2] = null; }

  if ($haslo1!=$haslo2)
    { $blad[3] = "hasła nie są takie same";}
  else 
    { $blad[3] = null; }


  if ($blad[0] == null && $blad[1] == null && $blad[2] == null && $blad[3] == null)
  {
  echo "dane są poprawne"."<br>";
  $haslo =md5($haslo1); //encryption

  $zapytanie = "INSERT INTO users (username, email, psswd) VALUES ( '$imie' , '$email','$haslo' )";
  
  if ($polaczenie->query($zapytanie) === TRUE) {
    echo "Pomyślnie dodano do bazy";
  } else {
  echo "Nie udało się dodać do bazy, błąd: " . $zapytanie . "<br>" . $polaczenie->connect_error;
  }
    
  }
  else 
  //Komunikaty gdzie jest błąd w uzupełnianiu formularzu 
  for ($i=0; $i<4; $i++)
    {
      if ($blad[$i]!=null)
      { echo $blad[$i]."<br>";}
      
    }  
  }
}
?> 