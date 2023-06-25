



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
    
    
    // Zapytanie SELECT
    
    $sql = 'Select reader.Imie, reader.Nazwisko, wypozyczenia.Data_wypozyczenia,books.Tytul from reader INNER JOIN wypozyczenia ON wypozyczenia.id_czytelnika = reader.id INNER JOIN books on  wypozyczenia.id_ksiazki = books.id where wypozyczenia.Data_zwrotu is null and  Numer_karty ='.$this->CardNumber;

    // Wykonanie zapytania i pobranie wyników
$result = $conn->query($sql);
// Sprawdzenie czy zapytanie zwróciło wyniki
if ($result->num_rows >0 ) {

$InformationAboutReader=[];
while($row = $result->fetch_assoc()) {
   $InformationAboutReader[]='Imie: '.$row['Imie'];
   $InformationAboutReader[]='Nazwisko: '.$row['Nazwisko'];
   $InformationAboutReader[]='Data_wypozyczenia: '.$row['Data_wypozyczenia'];
   $InformationAboutReader[]='Tytul: '.$row['Tytul'];


}

} else {
    $sql = 'Select reader.Imie, reader.Nazwisko from reader where  Numer_karty ='.$this->CardNumber;
    $result = $conn->query($sql);
    if ($result->num_rows >0 )
     {

        $InformationAboutReader=[];
        while($row = $result->fetch_assoc())
         {
           $InformationAboutReader[]='Imie: '.$row['Imie'];
           $InformationAboutReader[]='Nazwisko: '.$row['Nazwisko'];
           $InformationAboutReader[]='Brak wypożycznoych książek';
        }

}
}
foreach($InformationAboutReader as $row)
{
    echo("<br>".$row . "<br>");

}
return @$InformationAboutReader[0];


}

}



?>