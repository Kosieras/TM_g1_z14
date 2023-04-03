<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
  	header('Location: index.php'); //Powrot do panelu logowania
	exit(); 
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
	<title>Twoje nazwisko</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<link rel="stylesheet" type="text/css" href="twoj_css.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="twoj_js.js"></script> 
  <style>
    .avatarDiv {
  border: 0;
  float: left;
  position: relative;
} 
.onImg {
  max-width:30px;
  max-height:30px;
  border: 0;
  position: absolute;
  bottom: 0;
  left: 0;
 } 
  </style>
</head>

<body onload="myLoadHeader()">
	<div id='myHeader'> </div>	
	<main> 
		<section class="sekcja1">	
			<?php
$connection = mysqli_connect(
    "localhost",
    "kosierap_z14",
    "Laboratorium123",
    "kosierap_z14",
);
if (!$connection) {
    echo " MySQL Connection error." . PHP_EOL;
    echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
    exit();
}
($result = mysqli_query($connection, "Select * from user;")) or
    die("DB error: $dbname");
while ($row = mysqli_fetch_array($result)) {
    if ($_SESSION["user"] == $row[1]) {
     if($row[6] == 1 || $row[6] == 2 || $row[6] == 3 || $row[6] == 4)   print "<div id='avatarDiv' class='avatarDiv' style='border: 5px solid #7FFF00;'>";
    if($row[6] == 5)   print "<div id='avatarDiv' class='avatarDiv' style='border: 5px solid #A9A9A9;'>";
       if($row[6] == 6)   print "<div id='avatarDiv' class='avatarDiv' style='border: 5px solid #FFD700;'>";
       if($row[6] == 7)   print "<div id='avatarDiv' class='avatarDiv' style='border: 5px solid #B22222;'>";
        if (
            end(explode(".", $row[3])) == "png" ||
            end(explode(".", $row[3])) == "jpg" ||
            end(explode(".", $row[3])) == "jpeg" ||
            end(explode(".", $row[3])) == "gif"
        ) {
            print "<img src='$row[3]' style='max-width:80px; max-height:80px; '/>";
        } else {
            print "<img src='av.png' style='max-width:80px; max-height:80px; '/>";
        }
      if($row[6] == 2) print "<img class='onImg' id='onImg' src='nakladki/a1.png'/>";
         if($row[6] == 3) print "<img class='onImg' id='onImg' src='nakladki/a2.png'/>";
       if($row[6] == 4) print "<img class='onImg' id='onImg' src='nakladki/a3.png'/>";
      if($row[6] == 5) print "<img class='onImg' id='onImg' src='nakladki/a4.png'/>";
      if($row[6] == 6) print "<img class='onImg' id='onImg' src='nakladki/a5.png'/>";
      if($row[6] == 7) print "<img class='onImg' id='onImg' src='nakladki/a6.png'/>";
      print "</div>";
    }
}
?>
		</section>
	</main>	
	
</body>
</html>