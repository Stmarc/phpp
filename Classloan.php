



<?php
require('ClassBook.php');
require('ClassReader.php');
Class Loan
{
    private $Book;
    private $Reader;
 

    public function __construct($Book, $Reader) {
        $this->Book = $Book;
        $this->Reader = $Reader;
  
    }
 
  
   
    public function addLoan()
    {
        $BookTitle=($this->Book->getTitle());
        $BookID=$this->Book->getId($BookTitle);
        $CardNumber=$this->Reader->getCardNumber();
        $ReaderId=$this->Reader->getId($CardNumber);

        require('connection.php');
        $sql_count_book = "SELECT Ilosc FROM books WHERE Tytul = '$BookTitle'";

        $result_count_Book= $conn->query($sql_count_book);
        // Sprawdzam ilosć ksiązki
        if($result_count_Book->num_rows>0)
        {
            while($row=$result_count_Book->fetch_assoc())
            {
                $Count_Book = $row['Ilosc'];
            }
        }
        if(@!isset($Count_Book))
        {
    
            exit();
        }
        // Jesli ilosc ksiazki jest wieksza od 1
        if($Count_Book>0)
        {
                      // Zapytanie INSERT
        $sql = "INSERT INTO `wypozyczenia`( `id_ksiazki`, `id_czytelnika`) VALUES ($BookID,$ReaderId)";
        // Wykonanie zapytania
        if ($conn->query($sql) === TRUE) {
        echo "Rekord został dodany pomyślnie.";
        } else {
        echo "Błąd podczas dodawania rekordu: " . $conn->error;
        }
        
        $sql = "UPDATE books Set Ilosc = Ilosc -1 where Tytul = '$BookTitle'";
        
        if($conn->query($sql)== TRUE)
        {
            echo "Dodano pumsylanie";
        }
        else{
            echo "Nie dodano";
        }




        // Zamykanie połączenia
        $conn->close();
        }
        // Jeśli ilość książek jest równa miejsza od 1
        else{
            echo "Nie wystarczająca liczba książek";
        }
  


    }


    public function returnBook(){

        $BookTitle=($this->Book->getTitle());
        $BookID=$this->Book->getId($BookTitle);
        $CardNumber=$this->Reader->getCardNumber();
        $ReaderId=$this->Reader->getId($CardNumber);

        require('connection.php');
        $sql_return_book = "UPDATE wypozyczenia SET Data_zwrotu= "."'".date('Y-m-d')."'"." WHERE id_ksiazki = '$BookID' ";
        echo ($sql_return_book);
        if($conn->query($sql_return_book)==TRUE)
        {
            
        }
        else{
            echo "Błąd";
        }

        $sql_return_book = "UPDATE Books SET Ilosc= Ilosc+1 WHERE Tytul = '$BookTitle' ";    
        if($conn->query($sql_return_book)==TRUE)
        {
            
        }
        else{
            echo "Błąd2";
        }

        $conn->close();


    }


}
?>