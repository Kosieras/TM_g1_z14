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
<html>
<head>
  <meta charset="ISO-8859-1">
  <title>Wizualizacja</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
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
      width: 50px; 
       position: absolute;
      top: 0;
      left: 0;
      display: inline-block; 
    }
  </style>
</head>
<body>
  <div id="map">
    <img src="media/icons/mapa.png" alt="Mapa">
   
  </div> <div id="icons"></div>
  <button id="show-positions">Pokaż pozycje</button>
  <button id="save-positions">Zapisz pozycje</button>
  <div id="positions"></div>

  <script>
$(document).ready(function() {
  // funkcja pobierająca ikony z bazy danych
  function getIcons() {
  $.ajax({
    url: "get_icons.php",
    type: "GET",
    success: function(response) {
      var icons = JSON.parse(response);
      // usunięcie istniejących już elementów z klasy .icon
      $("#icons").empty();
      for (var i = 0; i < icons.length; i++) {
        var id = icons[i].id;
        var x = icons[i].x;
        var y = icons[i].y;
        var type = icons[i].type;
        var name = icons[i].name;
        $("#icons").append('<div class="icon" id="' + id + '" data-type="' + type + '"><img class="img" src="media/icons/'+type+'.png"/></div>');
        $("#" + id).css({
          top: y + "px",
          left: x + "px",
        });
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
      url: "update_icon_positions.php",
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


</body>
</html>