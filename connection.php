


<?php
// Dane do połączenia z bazą danych
$servername = "localhost"; // Nazwa serwera
$username = "root"; // Nazwa użytkownika bazy danych
$password = ""; // Hasło użytkownika bazy danych
$dbname = "Library"; // Nazwa bazy danych

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie czy połączenie zostało nawiązane poprawnie
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}


?>