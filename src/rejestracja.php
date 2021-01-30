<?php 

if(isset($_POST['wyslij'])) {
    // inicjalizacja tablicy z bledami
    $bledy = array();
    $blad = array();
    $bledy['imie'] = 0;
 
   $nazwaserwera = 'localhost';
     $nazwauzytkownika = 'normalUser';
     $haslobazy = 'user';
     $nazwabazy = 'bookdatabase'; 
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