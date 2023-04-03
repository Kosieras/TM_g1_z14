<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <head>	
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/signin.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
  </HEAD>
<BODY>
<?php
  //Komunikaty
function wrongUser()
{
    print "<center><h1 style='padding-top:20%; color: red;'>User not found!</h1><form action='index.php'>
    <input type='submit' value='Back' class='w-10 btn btn-lg btn-primary'/>
</form></center>";
}
function wrongPassword()
{
    print "<center><h1 style='padding-top:20%; color: red;'>Wrong password</h1><form action='index.php'>
    <input type='submit' value='Back' class='w-10 btn btn-lg btn-primary'/>
</form></center>";
}
function wrongTimes()
{
    print "<center><h1 style='padding-top:20%; color: red;'>Number of login attempts for your IP exceeded - blocked access for one minute!</h1><form action='index.php'>
    <input type='submit' value='Back' class='w-10 btn btn-lg btn-primary'/>
</form></center>";
}

$user = htmlentities($_POST["user"], ENT_QUOTES, "UTF-8");
$pass = htmlentities($_POST["pass"], ENT_QUOTES, "UTF-8");
$link = mysqli_connect(localhost, kosierap_z14, Laboratorium123, kosierap_z14);
if (!$link) {
    echo "Error: " . mysqli_connect_errno() . " " . mysqli_connect_error();
}
mysqli_query($link, "SET NAMES 'utf8'");
$result = mysqli_query($link, "SELECT * FROM user WHERE (username='$user')");
$rekord = mysqli_fetch_array($result);
if (!$rekord) {
    mysqli_close($link);
    wrongUser();
} else {
    $klucz_apcu = "{$_SERVER["SERVER_NAME"]}~login:{$_SERVER["REMOTE_ADDR"]}"; //Tworzenie klucza APCu
    $i = (int) apcu_fetch($klucz_apcu); //Licznik do klucza APCu
    if ($i >= 3) {
        //Jezeli bedzie wiecej niz 3 proby logowania
        wrongTimes();
        exit();
    }
    if ($rekord["password"] == $pass) {
        //Jezeli haslo jest prawidlowe
        session_start(); //Rozpoczecie sesji
        $_SESSION["loggedin"] = true;
        $_SESSION["user"] = $user;
        echo "Logowanie Ok. User: {$rekord["username"]}. Hasło: {$rekord["password"]}";
        apcu_delete($klucz_apcu); //Usuwa klucz APCu przez co bedzie mozliwe ponowne logowanie
        header("Location: index.php"); //Przejdz dalej
    } else {
        wrongPassword();
        apcu_inc($klucz_apcu, 1, $fail, 60); //Dodaj do licznika przez 60s
        mysqli_close($link);
    }
}
?> </BODY> </html>
