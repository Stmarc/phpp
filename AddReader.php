
<?php
session_start();
if(!isset($_SESSION['login']))
{
    $error = "Nie jesteś zalogowany. Brak dostępu.";
    header("Location: login.html");
    exit();
   
}

?>
<?php

require('ClassReader.php');

@$FirstName = $_POST['FirstName'];
@$LastName = $_POST['LastName'];

if(isset($FirstName))
{
$Reader = new Reader($FirstName,$LastName);
$Reader->addReader();
}






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action = '' >

<label for="FirstName">Imie:</label>
<input type="text" id="FirstName" name="FirstName">

<label for="LastName">Nazwisko:</label>
<input type="password" id="LastName" name="LastName">



<button type="submit" >Zatwierdź</button>


</form>
</body>
</html>