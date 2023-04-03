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
      width: 55px; 
       position: absolute;
      top: 0;
      left: 0;
      display: inline-block; 
    }
      .mapa {
      height:85%;
      }
  </style>
</head>

<body onload="myLoadHeader()">
	<div id='myHeader'> </div>	
	<main> 
		<section class="sekcja1">	<br>
           <?php if (isset($_SESSION['loggedin'])) print "<button class='w-50 btn btn-success' id='save-positions'>Zapisz pozycje</button>" ?>
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
    url: "get_icons.php",
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
        var type = icons[i].type;
        var name = icons[i].name;
        var changed = icons[i].changed;
        $("#icons").append('<div class="icon" id="' + id + '" data-type="' + type + '"><img class="img" src="media/icons/'+type+'.png"/></div>');
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
		var gosc = "<?php echo $_SESSION['login']; ?>";
        if(gosc != "GOSC"){
      $(".icon").draggable({
        containment: "#map"
      });
        }
      else {
      $(".icon").draggable({
        containment: "#map",
        disabled: true
      });
        } 
        
      
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