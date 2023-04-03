<head>	
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/signin.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<?php
//Pobranie zmiennych
$name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
$type = htmlentities($_POST["type"], ENT_QUOTES, "UTF-8");
$id_product = htmlentities($_POST["id_product"], ENT_QUOTES, "UTF-8");
$value = htmlentities($_POST["value"], ENT_QUOTES, "UTF-8");
$target_file =
    "users/" . $user . "/" . basename($_FILES["fileToUpload"]["name"]);
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
       if($result = mysqli_query($connection,"INSERT INTO icons (name, type, id_product, value) VALUES ('$name', '$type', '$id_product', '$value');") or die("DB error 2:  $connection->error);"));
        else {
            print "<center><h1 style='padding-top:20%; color: red;'>Error - spróbuj ponownie!</h1></center>";
            header("Refresh: 2; URL=index.php");
        }
    
    print "<center><h1 style='padding-top:20%; color: red;'>Dodano środek trwały!</h1></center>";
    header("Refresh: 1; URL=index.php");
          }

?>
