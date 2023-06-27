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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
<form method="post" action = '' >

<label for="Title">Tytuł:</label>
<input type="text" id="Title" name="Title" required >




<button type="submit" >Zatwierdź</button>





<?php
require_once('connection.php');
@$Title = $_POST['Title'];

// Zapytanie SELECT

$sql = "SELECT * FROM books WHERE Tytul = '$Title' LIMIT 1";


// Wykonanie zapytania i pobranie wyników
$result = $conn->query($sql);
// Sprawdzenie czy zapytanie zwróciło wyniki
if ($result->num_rows >0 ) {

   
    while($row = $result->fetch_assoc()) {
        echo "<br>";
        echo("Tytul ". $row["Tytul"] ."<br>");
        echo("Autor ".$row["Autor"]."<br>");
        echo("Ilosc ".$row["Ilosc"]."<br>");
        echo("ISBN ".$row["ISBN"]."<br>");
       
    }

} else {
 
  
}


?>
</center>
</form>
</body>
</html>