



<?php

Class Reader
{
    private $FristName;
    private $LastName;
    private $CardNumber;
 

    public function __construct($FristName='', $LastName='',$CardNumber='') {
        $this->FristName = $FristName;
        $this->LastName = $LastName;
        $this->CardNumber = $CardNumber;
    }
    public function getFirstName() {
        return $this->FristName;
    }
    public function getLastName() {
        return $this->LastName;
    }
    public function getCardNumber() {
        return $this->CardNumber;
    }
    public function setCardNumber($CardNumber) {
        $this->FristName = $CardNumber;
    }
    public function addReader()
    {



        require('connection.php');
//sprawdzamy jaki jest max numer karty

$sql = "SELECT MAX(Numer_Karty) as 'Numer_Karty' FROM `reader`; ";


// Wykonanie zapytania i pobranie wyników
$result = $conn->query($sql);

if ($result->num_rows >0 ) {

   
    while($row = $result->fetch_assoc() ) {
     
        $card_number=$row['Numer_Karty'];
       
        
    }

   
}
$card_number +=1;

    // Zapytanie INSERT
    $sql = "INSERT INTO `reader`(`Imie`, `Nazwisko`,`Numer_Karty`) VALUES ('$this->FristName','$this->LastName','$card_number')";

    // Wykonanie zapytania
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Błąd podczas dodawania rekordu: " . $conn->error;
}


// Zamykanie połączenia
$conn->close();
return ($card_number);
}



public function getId($CardNumber)
{
    require('connection.php');
    
    
    // Zapytanie SELECT
    
    $sql = "SELECT * FROM reader WHERE Numer_karty = '$CardNumber'";

// Wykonanie zapytania i pobranie wyników
$result = $conn->query($sql);
// Sprawdzenie czy zapytanie zwróciło wyniki
if ($result->num_rows >0 ) {


while($row = $result->fetch_assoc()) {
    $ReaderId=$row['id'];
   
}

} else {

echo "Nie ma takiej książki";

}
return $ReaderId;
}

public function GetInformation()
{
    require('connection.php');
    
if($this->LastName != "" and $this->FristName != "")
{
    $sql = 'SELECT reader.Imie,reader.Nazwisko,books.Tytul,wypozyczenia.Data_wypozyczenia FROM `reader` INNER JOIN wypozyczenia ON reader.id = wypozyczenia.id_czytelnika INNER JOIN books ON books.id = wypozyczenia.id_ksiazki where  reader.Imie ='."'".$this->FristName."'" .' and reader.Nazwisko ='."'".$this->LastName."'";


    $InformationAboutReader = $conn->query($sql);
    
    if($InformationAboutReader->num_rows>0)
    {
        while($row = $InformationAboutReader->fetch_assoc())
        {
            echo "<br>";
            echo("Imie ". $row["Imie"] ."<br>");
            echo("Nazwisko ".$row["Nazwisko"]."<br>");
            echo("Tytuł ".$row["Tytul"]."<br>");
            echo("Data_wypozyczenia ".$row["Data_wypozyczenia"]."<br>");
        }
    }
    
    else{
        $sql = 'SELECT reader.Imie,reader.Nazwisko FROM `reader` WHERE  reader.Imie ='."'".$this->FristName."'" .' and reader.Nazwisko ='."'".$this->LastName."'";
       
        $InformationAboutReader = $conn->query($sql);
        
        if($InformationAboutReader->num_rows>0)
        {
            while($row = $InformationAboutReader->fetch_assoc())
            {
                echo "<br>";
                echo("Imie ". $row["Imie"] ."<br>");
                echo("Nazwisko ".$row["Nazwisko"]."<br>");
                echo("Brak wypożyczonyc książek");
            
            }
        
    }
}
}
else{

    $sql = 'SELECT reader.Imie,reader.Nazwisko,books.Tytul,wypozyczenia.Data_wypozyczenia FROM `reader` INNER JOIN wypozyczenia ON reader.id = wypozyczenia.id_czytelnika INNER JOIN books ON books.id = wypozyczenia.id_ksiazki where reader.Numer_Karty ='."'".$this->CardNumber."'" ;
   

    $InformationAboutReader = $conn->query($sql);
    
    if($InformationAboutReader->num_rows>0)
    {
        while($row = $InformationAboutReader->fetch_assoc())
        {
            echo "<br>";
            echo("Imie ". $row["Imie"] ."<br>");
            echo("Nazwisko ".$row["Nazwisko"]."<br>");
            echo("Tytuł ".$row["Tytul"]."<br>");
            echo("Data_wypozyczenia ".$row["Data_wypozyczenia"]."<br>");
        }
    }
    
    else{
        $sql = 'SELECT reader.Imie,reader.Nazwisko FROM `reader` WHERE reader.Numer_Karty ='."'".$this->CardNumber."'" ;
        $InformationAboutReader = $conn->query($sql);

        if($InformationAboutReader->num_rows>0)
        {
            while($row = $InformationAboutReader->fetch_assoc())
            {
                echo "<br>";
                echo("Imie ". $row["Imie"] ."<br>");
                echo("Nazwisko ".$row["Nazwisko"]."<br>");
                echo("Brak wypożyczonyc książek");
            
            }
        
    }
}



}





}
}



?>