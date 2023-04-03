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
    function add(){
     var avatar = document.getElementById('avatar');
      
    if (avatar.style.display === 'none') {
    avatar.style.display = 'block';
  } else {
    avatar.style.display = 'none';
  }
    }
  function emptyDodaj() {
    if (document.getElementById("floatingInput").value == "" ) {
        document.getElementById("alertLogin").innerHTML = "Uzupełnij dane!";
        return false;
    };
}
  

  
  </script>
<center>
<div class="d-flex justify-content-center align-items-center mt-5">
        <div class="card">
<main class="form-signin">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                  <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dodawanie środka trwałego</a>
                </li>
                
               
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  
                  <div class="form px-4 pt-5">
<!-- LOGOWANIE -->
<form method="post" action="dodaj.php">
    <div class="form-floating">
      
            <label for="floatingInput">Nazwa</label>
      <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Krzesło biurowe">
    </div>
    <div class="form-floating">
           <label for="floatingInput">Typ</label><br>
     <select id="form-control" name="type">
  <option value="chair">Krzesło</option>
  <option value="desk">Biurko</option>
  <option value="computer">Komputer</option>
  <option value="rack">Szafa rackowa</option>
       <option value="ups">UPS</option>
</select><br><br>
 <label for="floatingInput">Identyfikator</label>
      <input type="text" class="form-control" name="id_product" id="floatingInput" placeholder="ABC1234DE">
     <label for="floatingInput">Wartość</label>
      <input type="text" class="form-control" name="value" id="floatingInput" placeholder="150">

    </div>
<!-- LOGOWANIE - submit -->
    <button class="w-100 btn btn-lg btn-primary" type="submit" onClick="return emptyDodaj()">Dodaj</button>
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