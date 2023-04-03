<?php
// Sprawdzanie, czy dane zostały przesłane metodą POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(400);
  echo 'Bad request';

  exit();
}

// Sprawdzanie, czy przesłano dane w oczekiwanym formacie
if (!isset($_POST['positions']) || !is_array($_POST['positions'])) {
  http_response_code(400);
  echo 'Bad request';
  exit();
}

// Połączenie z bazą danych
$host = 'localhost';
$username = 'kosierap_z14';
$password = 'Laboratorium123';
$dbname = 'kosierap_z14';

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit();
}

// Aktualizacja pozycji ikon w bazie danych
$stmt = $conn->prepare('UPDATE icons SET x = :x, y = :y WHERE id = :id');
foreach ($_POST['positions'] as $position) {
  echo $_POST['positions'];
  $stmt->bindParam(':x', $position['x'], PDO::PARAM_INT);
  $stmt->bindParam(':y', $position['y'], PDO::PARAM_INT);
  $stmt->bindParam(':id', $position['id'], PDO::PARAM_INT);
  $stmt->execute();
}

echo 'OK';
