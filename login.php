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
  function emptyLogin() {
    if (document.getElementById("floatingInput").value == "" || document.getElementById("floatingPassword").value == "") {
        document.getElementById("alertLogin").innerHTML = "Uzupełnij dane!";
        return false;
    };
}
  
   function emptyRegister() {
    if (document.getElementById("floatingInputR").value == "" || document.getElementById("floatingPasswordR").value == "") {
        document.getElementById("alertRegister").innerHTML = "Uzupełnij dane!";
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
                  <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item text-center">
                  <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
                </li>
               
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  
                  <div class="form px-4 pt-5">
<!-- LOGOWANIE -->
<form method="post" action="weryfikuj.php">
    <div class="form-floating">
      <div class="alertInfo" id="alertInfo"><?php echo $_POST["info"]; ?></div>
      <br><br>
            <label for="floatingInput">Email address</label>
      <input type="email" class="form-control" name="user" id="floatingInput" placeholder="name@example.com">
    </div>
    <div class="form-floating">
            <label for="floatingPassword">Password</label>
      <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">

    </div>

<!-- LOGOWANIE - submit -->
    <button class="w-100 btn btn-lg btn-primary" type="submit" onClick="return emptyLogin()">Sign in</button>
  <div id="alertLogin" style="color: red;"></div>
  </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                 

                  <div class="form px-4">
<!-- REJESTRACJA -->
                   <form method="post" action="add.php" enctype="multipart/form-data">
    <div class="form-floating">
            <label for="floatingInput">Email address</label>
      <input type="email" class="form-control" name="user" id="floatingInputR" placeholder="name@example.com">

    </div>
    <div class="form-floating">
            <label for="floatingPassword">Password</label>
      <input type="password" class="form-control" name="pass" id="floatingPasswordR" placeholder="Password">

    </div>
    <div class="form-floating">
            <label for="floatingPassword">Confirm password</label>
      <input type="password" class="form-control" name="pass2" id="floatingPasswordR" placeholder="Confirm password">

    </div>
                     <!-- REJESTRACJA - submit -->
                     <button type="button" onclick="add()">Add avatar</button>
        <div class="avatar" id="avatar" style="display:none">
     	<input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" ><br>
                     </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" onClick="return emptyRegister()">Register</button>
                      <div id="alertRegister" style="color: red;"></div>
  </form>
                  </div>
                </div>
               </div>
          </main>
        </div>
  </div></center>
</body>
</html>