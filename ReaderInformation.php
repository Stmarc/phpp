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
<input type="text" id="CardNumber" name="CardNumber">






<button type="submit" >Zatwierdź</button>
<?php
if(isset($_POST['CardNumber']))
{
    require('connection.php');
    $CardNumber = $_POST['CardNumber'];
    $SqlInformationReader = 'SELECT imie,Nazwisko,books.Tytul, wypozyczenia.Data_wypozyczenia FROM `reader` Inner JOIN wypozyczenia ON reader.id = wypozyczenia.id_czytelnika INNER JOIN books ON books.id = wypozyczenia.id_ksiazki where reader.Numer_Karty='."'".$CardNumber."' and Data_zwrotu is Null";
    $ResultInformationReader = $conn->query($SqlInformationReader);
    if($ResultInformationReader->num_rows>0)
    {
        while($row = $ResultInformationReader->fetch_assoc())
        {
            echo '<br>Tytul '. $row['Tytul'].'<br>';
            echo 'Data_wypozyczenia '. $row['Data_wypozyczenia'].'<br>';


        }

    }

    else{echo  'Czytelnik aktualnie nic nie wypożycza';}

}


?>
</body>
</html>