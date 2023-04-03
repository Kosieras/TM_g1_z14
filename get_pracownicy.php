<?php
// połączenie z bazą danych
$servername = "localhost";
$username = "kosierap_z14";
$password = "Laboratorium123";
$dbname = "kosierap_z14";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// zapytanie SQL pobierające dane ikon z bazy danych
$sql = "SELECT id, x, y,avatar, changed, stan FROM user";
$result = mysqli_query($conn, $sql);

// utworzenie tablicy z danymi ikon
$icons = array();
while ($row = mysqli_fetch_assoc($result)) {
  $icons[] = $row;
}

// zamiana tablicy na format JSON i zwrócenie do kodu JavaScript
echo json_encode($icons);

// zamknięcie połączenia z bazą danych
mysqli_close($conn);
?>
