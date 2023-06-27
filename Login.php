

<?php
session_start();
if(isset($_SESSION['login']))
{
    $error = "Nie jesteś zalogowany. Brak dostępu.";
    header("Location: home.php");
    exit();
   
}

?>



<?php
require('connection.php');

// Sprawdzanie czy połączenie zostało nawiązane poprawnie
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
@$login = $_POST['Login'];
@$password = $_POST['Password'];
// Zapytanie SELECT

$sql = "SELECT * FROM user WHERE loginn ='$login' and haslo = '$password' ";


// Wykonanie zapytania i pobranie wyników
$result = $conn->query($sql);

// Sprawdzenie czy zapytanie zwróciło wyniki
if ($result->num_rows >0) {

   
    session_start();
    while($row = $result->fetch_assoc()) {
        $_SESSION['function']= $row["funkcja"];
    }
    // Zapisanie loginu do zmiennej sesyjnej
    $_SESSION['login'] = $login;
    
    // Przekierowanie do innej strony po pomyślnym zalogowaniu
    header("Location: home.php");
    exit();
} else {
    


}

// Zamykanie połączenia
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<header class="header_login"></header>
    <div class="main_login">
    <form method="post" action = 'Login.php' >

        <label for="Login">Login:</label>
        <input type="text" id="Login" name="Login" required >
    
        <label for="Password">Hasło:</label>
        <input type="password" id="Password" name="Password" required >
    
    
    
    <button type="submit" >Zatwierdź</button>
    
    
       </form>
    </div>
</header>
</body>
</html>