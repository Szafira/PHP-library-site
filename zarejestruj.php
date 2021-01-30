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
   
  </body>
</html>

<?php 
include 'src/polaczenie.php';
include 'src/rejestracja.php';
?> 