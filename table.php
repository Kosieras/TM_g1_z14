<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
$_SESSION['login'] = "GOSC";
}
  ?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
	<meta name="description" content="Twój Opis">
	<meta name="author" content="Twoje dane">
	<meta name="keywords" content="Twoje słowa kluczowe">
	<title>Tabela</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<link rel="stylesheet" type="text/css" href="twoj_css.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="twoj_js.js"></script> 
</head>

<body onload="myLoadHeader()">
	<div id='myHeader'> </div>	
	<main> 
		<section class="sekcja1">	
			<div class="container">
              <br>
		<h1>Dane z tabeli MySQL</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nazwa</th>
					<th>Typ</th>
					<th>Identyfikator</th>
					<th>Wartość</th>
                  <th>Data dodania</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Połączenie z bazą danych MySQL
					$servername = "localhost";
					$username = "kosierap_z14";
					$password = "Laboratorium123";
					$dbname = "kosierap_z14";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Sprawdzenie połączenia
					if (!$conn) {
					    die("Połączenie nieudane: " . mysqli_connect_error());
					}
					// Zapytanie SQL do pobrania danych z tabeli
					$sql = "SELECT name, type, id_product,value, date FROM icons";
					$result = mysqli_query($conn, $sql);
					// Wyświetlanie danych w tabeli
					if (mysqli_num_rows($result) > 0) {
					    while($row = mysqli_fetch_assoc($result)) {
					        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["type"]. "</td><td>" . $row["id_product"]. "</td><td>" . $row["value"]. "</td><td>" . $row["date"]. "</td></tr>";
					    }
					} else {
					    echo "0 wyników";
					}
					mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
		</section>
	</main>	
			
</body>
</html>