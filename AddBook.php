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

require('ClassBook.php');


@$login = $_POST['Title'];
@$Author = $_POST['Author'];
@$ISBN = $_POST['ISBN'];
@$count = $_POST['count'];
if(isset($login))
{
$Book = new Book($login,$Author,$ISBN,$count);
$Book->addBook();
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
    <form method="post" action = 'AddBook.php' onsubmit="return checkPassword()">

        <label for="Title">Tytuł:</label>
        <input type="text" id="Title" name="Title">
        
        <label for="Author">Autor:</label>
        <input type="text" id="Author" name="Author">
        
        <label for="ISBN">ISBN:</label>
        <input type="number" id="ISBN" name="ISBN">

        <label for="count">Ilość:</label>
        <input type="number" id="count" name="count">


        
        
        <button type="submit" >Zatwierdź</button>
    </form>
</body>
</html>