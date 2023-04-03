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
<head>	
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/signin.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <h4><?php print $_POST["status"]." - ".$_SESSION["user"]; ?></h4>
</head>
<?php
//Pobranie zmiennych
$connection = mysqli_connect(
    "localhost",
    "kosierap_z14",
    "Laboratorium123",
    "kosierap_z14",
);
if (!$connection) {
    echo " MySQL Connection error." . PHP_EOL;
    echo "Error: " . mysqli_connect_errno() . PHP_EOL;
    exit();
} else {
  		print $_SESSION["user"];
       if($result = mysqli_query($connection,"UPDATE user set stan=".$_POST["status"]." where id='".$_POST["username_id"]."';") or die("DB error 2:  $connection->error);"));

    
    print "<center><h1 style='padding-top:20%; color: red;'>Zmieniono status!</h1></center>";
    header("Refresh: 1; URL=index.php");
          }

?>
