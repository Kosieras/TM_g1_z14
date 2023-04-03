<?php 
//Spradzanie sesji
declare(strict_types=1);
session_start();
if (!isset($_SESSION['loggedin'])) //Jezeli nie ma sesji
{
  	header('Location: login.php'); //Powrot do panelu logowania
	exit(); 
}
  ?>
<!DOCTYPE html>
<html lang="pl">
<head>
 
  <title>Wizualizacja</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
	<meta name="description" content="Twój Opis">
	<meta name="author" content="Twoje dane">
	<meta name="keywords" content="Twoje słowa kluczowe">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
	<style type="text/css" class="init"></style>
	<link rel="stylesheet" type="text/css" href="twoj_css.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="twoj_js.js"></script> 
   <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="//code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <style>
    #map {
      position: relative;
    }
    #icons {
      position: absolute;
      top: 0;
      left: 0;
      display: inline-block; 
    }
    .img {
      width: 60px; 
       position: absolute;
      top: 0;
      left: 0;
      display: inline-block; 
    }
      .mapa {
      height:75%;
      }

    .avatarDivP {
  border: 0;
  float: left;
  position: relative;
} 
.onImgP {
  max-width:20px;
  max-height:20px;
  border: 0;
  position: absolute;
  top: 3px;
  left: 3px;
 } 

  </style>
</head>

<body onload="myLoadHeader()">
	<div id='myHeader'> </div>	
	<main> 
		<section class="sekcja1">	
          <br>
          <button class='w-50 btn btn-success' id='save-positions'>Zapisz pozycje</button>
		  <div id="map">
    <img class="mapa" src="media/icons/mapa.png" alt="Mapa">
   <div id="icons"></div>
  </div> 
 
  
  <div id="positions"></div>
            <script>
$(document).ready(function() {
  // funkcja pobierająca ikony z bazy danych
  function getIcons() {
  $.ajax({
    url: "get_pracownicy.php",
    type: "GET",
    success: function(response) {
      var icons = JSON.parse(response);
      // usunięcie istniejących już elementów z klasy .icon
      $("#icons").empty();
      var xa = 100;
      for (var i = 0; i < icons.length; i++) {
       
        var id = icons[i].id;
        var x = icons[i].x;
        var y = icons[i].y;
        var avatar = icons[i].avatar;
        var changed = icons[i].changed;
        var stan = icons[i].stan;
        if(avatar == 0) {
          if(stan == 0) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><img class="img" src="av.png"/></div>');
          if(stan == 1) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #7FFF00;"/></div></div>');
          if(stan == 2) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #7FFF00;"/><img class="onImgP" id="onImgP" src="nakladki/a1.png"/></div></div>');
          if(stan == 3) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #7FFF00;"/><img class="onImgP" id="onImgP" src="nakladki/a2.png"/></div></div>');
          if(stan == 4) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #7FFF00;"/><img class="onImgP" id="onImgP" src="nakladki/a3.png"/></div></div>');
          if(stan == 5) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #A9A9A9;"/><img class="onImgP" id="onImgP" src="nakladki/a4.png"/></div></div>');
          if(stan == 6) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #FFD700;"/><img class="onImgP" id="onImgP" src="nakladki/a5.png"/></div></div>');
          if(stan == 7) $("#icons").append('<div class="icon" id="' + id + '" data-type="0"><div id="avatarDivP" class="avatarDivP"><img class="img" src="av.png" style="border: 3px solid #B22222;"/><img class="onImgP" id="onImgP" src="nakladki/a6.png"/></div></div>');
        }
        else{
          
          if(stan == 0) $("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><img class="img" src="'+avatar+'"/></div>');
        if(stan == 1)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid #7FFF00;"/></div></div>');
           if(stan == 2)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid #7FFF00;"/><img class="onImgP" id="onImgP" src="nakladki/a1.png"/></div></div>');
          if(stan == 3)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid #7FFF00;"/><img class="onImgP" id="onImgP" src="nakladki/a2.png"/></div></div>');
          if(stan == 4)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid #7FFF00;"/><img class="onImgP" id="onImgP" src="nakladki/a3.png"/></div></div>');
          if(stan == 5)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid  #A9A9A9;"/><img class="onImgP" id="onImgP" src="nakladki/a4.png"/></div></div>');
          if(stan == 6)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid#FFD700;"/><img class="onImgP" id="onImgP" src="nakladki/a5.png"/></div></div>');
          if(stan == 7)$("#icons").append('<div class="icon" id="' + id + '" data-type="' + avatar + '"><div id="avatarDivP" class="avatarDivP" ><img class="img" src="'+avatar+'"style="border: 3px solid #B22222;"/><img class="onImgP" id="onImgP" src="nakladki/a6.png"/></div></div>');
        }
        if(changed == 1){
        $("#" + id).css({
          top: y + "px",
          left: x + "px",
        });
        }
        else{
         $("#" + id).css({
          top: y + "px",
          left: xa + "px",
         
        });
           xa+=100;
        }
        
      }
      // funkcja umożliwiająca przeciąganie ikon
      $(".icon").draggable({
        containment: "#map"
      });
    }
  });
}

  
  // funkcja wyświetlająca pozycje ikon
  function showPositions() {
    $("#positions").empty();
    $(".icon").each(function() {
      var position = $(this).position();
      var id = $(this).attr("id");
      var type = $(this).data("type");
      $("#positions").append("<p>" + id + " - typ: " + type + ", x: " + position.left + ", y: " + position.top + "</p>");
    });
  }
  
  // funkcja wysyłająca pozycje ikon na serwer
  function savePositions() {
    var positions = [];
    $(".icon").each(function() {
      var position = $(this).position();
      var id = $(this).attr("id");
      positions.push({id: id, x: position.left, y: position.top});
    });
    $.ajax({
      type: "POST",
      url: "update_pracownicy_positions.php",
      data: {positions: JSON.stringify(positions)},
      success: function(response) {
        alert(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert("Błąd zapisu pozycji: " + textStatus);
      }
    });
  }
  
  // wywołanie funkcji pobierającej ikony z bazy danych
  getIcons();
  
  // obsługa przycisku "Pokaż pozycje"
  $("#show-positions").click(function() {
    showPositions();
  });
  
  // obsługa przycisku "Zapisz pozycje"
  $("#save-positions").click(function() {
    savePositions();
  });
});

  </script>
		</section>
	</main>	
	
</body>
</html>