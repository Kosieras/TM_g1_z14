<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
$_SESSION['login'] = "GOSC";
}
else $_SESSION['login'] = "";
  ?>
<header>
    <style>
    .avatarDiv {
  border: 0;
  float: left;
  position: relative;
} 
.onImg {
  max-width:20px;
  max-height:20px;
  border: 0;
  position: absolute;
  bottom: 0;
  left: 0;
 } 
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top mt-0 mb-0 ms-0 me-0 pt-0 pb-0 ps-0 pe-0">
	<div class="container-fluid">
	
		<div class="collapse navbar-collapse" id="main_nav">
			<ul class="navbar-nav ">
              <li class="nav-item dropdown ">
					<a class="nav-link dropdown-menu-end" href="#" data-bs-toggle="dropdown">
                <?php
                      if(  $_SESSION['login'] == "GOSC"   )  print "<img src='av.png' style='max-width:40px; max-height:40px; '/>";
                      
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
       if($row[6] == 0)   print "<div id='avatarDiv' class='avatarDiv'>";
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
            print "<img src='$row[3]' style='max-width:50px; max-height:50px; '/>";
        } else {
            print "<img src='av.png' style='max-width:50px; max-height:50px; '/>";
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
                </a>
					<ul class="dropdown-menu">
						<li>
                          
       <?php 
             if(  $_SESSION['login'] == "GOSC"   )  print "<a class='dropdown-item' href='login.php'><i class='fa fa-sign-out fa-1x'>ZALOGUJ SIĘ</i></a> ";     
                          else print "<a class='dropdown-item' href='logout.php'><i class='fa fa-sign-out fa-1x'>WYLOGUJ</i></a> "; 
                          ?> 
   		
                 </li>
						
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Filmy</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="inside.php"> <img src="media/menu_icons/info.svg" height="18"> Nagranie z wewnątrz </a></li>
						<li><a class="dropdown-item" href="outside.php"> <img src="media/menu_icons/help.svg" height="18"> Nagranie z zewnątrz </a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Środki trwałe</a>
					<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="visualization.php"> Wizualizacja </a>
						<li><a class="dropdown-item" href="table.php"> Tabela </a></li>
                     <?php if(  $_SESSION['login'] != "GOSC"   ) print" <li><a class='dropdown-item' href='form.php'> Formularz </a></li>" ?>
						
					</ul>
				</li>
			 <?php if(  $_SESSION['login'] != "GOSC"   ) print "
              <li class='nav-item dropdown '>
					<a class='nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown'>Pracownicy</a>
					<ul class='dropdown-menu'>
                       <li><a class='dropdown-item' href='form_pracownicy.php'> Zmień status</a></li>
                      <li><a class='dropdown-item' href='visualization_pracownicy.php'> Wizualizacja </a>
                     
					</ul>
				</li>";
?>
            
			</ul> 
		</div> 
		
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
	</div> 
</nav>		
		
</div>
</header>