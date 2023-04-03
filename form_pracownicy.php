<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
  	$_SESSION['login'] = "GOSC";
}
  ?>
<!doctype html>
<html>
<head>	
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link href="css/signin.css" rel="stylesheet">
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> <script type="text/javascript">

  
  </script>
<center>
<div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
<main class="form-signin">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                  <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Zalogowano jako: <?php print $_SESSION["user"] ?></a>
                </li>
                
               
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  
                  <div class="form px-4 pt-5">
                    <h2>Zmień status</h2>
<!-- LOGOWANIE -->
<form method="post" action="change.php">

    <div class="form-floating">
      <br>
       <label for="floatingInput">Użytkownik</label><br>
                     <select id="form-control" name="username_id">
         <?php
                       $connection = mysqli_connect('localhost', 'kosierap_z14', 'Laboratorium123', 'kosierap_z14');
  	if (!$connection){
		echo " MySQL Connection error." . PHP_EOL;
		echo "Errno: " . mysqli_connect_errno() . PHP_EOL; echo "Error: " . mysqli_connect_error() . PHP_EOL; exit;
	}
                       else{
    $odbiorca = mysqli_query($connection, "Select * from user") or die ("DB error: $dbname");
    while ($row = mysqli_fetch_array ($odbiorca)){
    print "<option value='$row[0]'>$row[1]</option>\n";   
    }
}?>
</select><br><br>
      
      
           <label for="floatingInput">Status</label><br>
                     <select id="form-control" name="status">
                  
  <option value="0">Brak</option>
  <option value="1">Praca lokalna</option>
  <option value="2">Praca zdalna online</option>
  <option value="3">Dyżur po telefonem</option>
       <option value="4">Praca lokalna u klienta</option>
                   <option value="5">Po pracy</option>
                   <option value="6">Urlop</option>
                   <option value="7">L4</option>
</select><br><br>
    </div>
<!-- LOGOWANIE - submit -->
    <button class="w-100 btn btn-lg btn-primary" type="submit" onClick="return emptyDodaj()">Zmień status</button>
  <div id="alertLogin" style="color: red;"></div>
  </form>
                  </div>
                </div>
                </div>
          </main>
        </div>
  </div></center>
</body>
</html>