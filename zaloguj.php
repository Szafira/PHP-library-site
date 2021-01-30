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
   
   
   

  </body>
</html>

<?php 
  include 'src/polaczenie.php';
  include 'src/zalogowanie.php';
  
?>