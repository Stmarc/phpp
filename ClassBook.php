



<?php

Class Book
{
    private $Title;
    private $Author;
    private $Count;
    private $ISBN;

    public function __construct($Title, $Author=0,$Count=0,$ISBN=0) {
        $this->Title = $Title;
        $this->Author = $Author;
        $this->Count = $Count;
        $this->ISBN = $ISBN;
    }


   
    public function getTitle() {
        return $this->Title;
    }
    public function getAuthor() {
        return $this->Author;
    }
    public function getCount() {
        return $this->Count;
    }
    public function getISBN() {
        return $this->ISBN;
    }

    public function getId($title)
    {
        require_once('connection.php');
        
        
        // Zapytanie SELECT
        
        $sql = "SELECT * FROM books WHERE Tytul = '$title' LIMIT 1";

// Wykonanie zapytania i pobranie wyników
$result = $conn->query($sql);
// Sprawdzenie czy zapytanie zwróciło wyniki
if ($result->num_rows >0 ) {

   
    while($row = $result->fetch_assoc()) {
        $BookId=$row['id'];
       
    }

} else {
 
  echo "Nie ma takiej książki";

}
return @$BookId;
    }
   
   











    public function addBook()
    {
        require('connection.php');
    // Zapytanie INSERT
    $sql = "INSERT INTO `books`( `Tytul`, `Autor`, `Ilosc`, `ISBN`) VALUES ('$this->Title','$this->Author','$this->Count','$this->ISBN')";

    // Wykonanie zapytania
if ($conn->query($sql) === TRUE) {
    echo "Pomyślnie dodano książke.";
} else {
    echo "Błąd podczas dodawnia książki: " . $conn->error;
    header("Location: home.php");
}

// Zamykanie połączenia
$conn->close();
}



}



?>