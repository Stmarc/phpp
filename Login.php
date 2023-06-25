<?php
require('connection.php');

// Sprawdzanie czy połączenie zostało nawiązane poprawnie
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
$login = $_POST['Login'];
$password = $_POST['Password'];
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
    header("Location: login.html");
    exit();
}

// Zamykanie połączenia
$conn->close();
?>
