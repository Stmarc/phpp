<?php
session_start();
if(!isset($_SESSION['login']))
{
    $error = "Nie jesteś zalogowany. Brak dostępu.";
    header("Location: login.html");
    exit();
   
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="post" action = ''>



<label for="CardNumber">Numer karty:</label>
<input type="text" id="CardNumber" name="CardNumber" >

<label for="FirstName">First Name:</label>
<input type="text" id="FirstName" name="FirstName" placeholder="test">

<label for="LastName">Last Name:</label>
<input type="text" id="LastName" name="LastName" placeholder="test" >






<button type="submit" >Zatwierdź</button>
<?php
require ('ClassReader.php');




if(isset($_POST['CardNumber']))
{
    $Reader = new Reader($_POST['FirstName'],$_POST['LastName'],$_POST['CardNumber']);
    $Reader->GetInformation();
 

}
?>
</body>
</html>