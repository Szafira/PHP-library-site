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

        
         <table>
<div class="zawartosc">
<form action="" method="post">
<!--<tr>
  <td>Imię i Nazwisko:</td>
  <td><input type="text" name="name"></td>
</tr>
<tr>
  <td>E-mail:</td>
  <td><input type="text" name="email"></td>
</tr>
<tr>
  <td>Numer telefonu:</td>
  <td><input type="tel" name="numer" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
  </td>
</tr>
-->
<tr>
  <td>Tytuł książki:</td>
  <td><input type="text" name="tytulksiazka"></td>
</tr>

<tr>
  <td>Autor książki:</td>
  <td><input type="text" name="autorksiazka"></td>
</tr>

<tr>
  <td> Stan: </td>
  <td> <input list="stan1" name="stan">
    <datalist id="stan1">
      <option value="Posiadana">
      <option value="Chcę posiadać">
      <option value="Nie posiadam">
    </datalist> 
</tr>

<tr>
  <td>Czy przeczytano?</td>
  <td><input type="checkbox" value="Przeczytano" name="przeczytano"></td>
</tr>

<tr>
  <td> </td>
  <td><input type="submit" name="wyslij" value="Wyślij formularz"></td>
</tr>
</form>
</table>
         
        </div>
    
    
  <!-- <div class="tresclewa"> lewo </div>
    <div class="trescprawa"> prawo </div> */ -->

  </body>
</html>

<?php
  include 'src/dodajKsiazki.php'
?>