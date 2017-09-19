<?php 

  include("functions/login.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <?php include("functions/navbar.php"); ?>
    <div class="jumbotron">
      <h1 class="display-3 text-center">Sign up!</h1>
    </div>
    <form method="POST" class="container" id="needs-validation" novalidate>
      <?php 
        if ($error) {
   		 		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
   		 	}
      ?>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" autocomplete="off" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" autocomplete="off" required>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="example@service.com" autocomplete="off" required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="col-md-3 mb-3">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" autocomplete="off" required>
        </div>
      </div>
      <button class="btn btn-primary" type="submit" name="submit" value="signup">Sign up</button>
    </form>
    
    <script>
    (function() {
      "use strict";
      window.addEventListener("load", function() {
        var form = document.getElementById("needs-validation");
        form.addEventListener("submit", function(event) {
          if (form.checkValidity() == false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        }, false);
      }, false);
    }());
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>