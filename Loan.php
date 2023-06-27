

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

require('Classloan.php');

@$Title = $_POST['Title'];
@$CardNumber = $_POST['CardNumber'];

if(isset($Title))
{
$Bookk = new Book($Title);
$Reader = new Reader('','',$CardNumber);


$Loan = new Loan($Bookk,$Reader);
$Loan->addLoan();
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
<form method="post" action = ''>

<label for="Title">Tytul:</label>
<input type="text" id="Title" name="Title" required >

<label for="CardNumber">Numer karty:</label>
<input type="text" id="CardNumber" name="CardNumber" required >






<button type="submit" >Zatwierdź</button>
</form>
</body>
</body>
</html>