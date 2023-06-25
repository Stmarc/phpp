// zmiana strony logowanie i resjtracja
function ChangePage(loginOrRegistry)
{
    switch(loginOrRegistry)
    {
        case 'Registry':
          
        document.location.href = 'registry.html'
        case 'LoginIn':
            document.location.href = 'Login.html'

        default:
            console.log('Sorry, we are out of ');
    }


}


// Czy hasła są takie same przy próbie Rejstracji

function checkPassword() {
    var password = document.getElementById("Password").value;
    var confirmPassword = document.getElementById("RepetPassword").value;

    if (password != confirmPassword) {
      alert("Hasła nie są takie same!");
      return false;
    }
  }

//Dodawanie 
function AddUser(){
    document.location.href = 'AddUser.html'

}

function AddBook(){
    document.location.href = 'AddBook.php'
}

function FindBook(){
    document.location.href = 'FindBook.php'

}
function Loan(){
    document.location.href = 'Loan.php'

}
function AddReader(){
    document.location.href = 'AddReader.php'

}
function ReaderInformation(){
    document.location.href = 'ReaderInformation.php'

}

function Return(){
    document.location.href = 'Return.php'

}

function Destroy(){
    
    document.location.href = 'Destroy.php'

}