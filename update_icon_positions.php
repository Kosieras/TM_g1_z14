<?php

//łączenie się z bazą danych
$servername = "localhost";
$username = "kosierap_z14";
$password = "Laboratorium123";
$dbname = "kosierap_z14";

$conn = new mysqli($servername, $username, $password, $dbname);

//sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
//pobieranie danych z przesłanego formularza
$positions = $_POST['positions'];
  $data = json_decode($_POST['positions'], true);
//iteracja po danych i aktualizacja bazy danych
foreach ($data as $position) {
    if($position['x'] != 40 && $position['y'] != 800){
    $sql = "UPDATE icons SET x=". $position['x'] . ", y=". $position['y'] . ", changed=1 WHERE id=". $position['id'] . "";
    $conn->query($sql);
    }
}

//zamykanie połączenia
$conn->close();

echo "Pozycje zostały zaktualizowane.";
}
?>
