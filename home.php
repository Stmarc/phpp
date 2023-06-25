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
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="main_buttons">
   
<?php
if($_SESSION['function']=1);
{

echo "<Button onclick=AddBook() >Dodaj Książke</Button>";
echo "<Button onclick=FindBook() >Znajdź książke</Button>";
echo "<Button onclick=AddReader() >Dodaj Czyletnika</Button>";
echo "<Button onclick=Loan() >Wypożycz</Button>";
echo "<Button onclick=Return() >Zwrot</Button>";
echo "<Button onclick=ReaderInformation() >Informacje o Czytelniku</Button>";
echo "<Button onclick=Destroy() >Wyloguj </Button>";
}
?>

</div>
<script src="script.js"></script>
</body>
</html>

