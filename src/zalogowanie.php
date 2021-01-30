<?php
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