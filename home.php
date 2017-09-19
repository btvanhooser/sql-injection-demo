<?php include("functions/ensureLogin.php"); ?>
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
    <?php 
        if ($error) {
    		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
        }
        if ($message) {
            echo '<div class="alert alert-success">'.addslashes($message).'</div>';
        }
    ?>
    <div class="jumbotron">
      <h1 class="display-3">Welcome!</h1>
      <p class="lead">We hope you are looking forward to meeting and building teams for your awesome projects</p>
      <hr class="my-4">
      <p>Putting together teams has never been this easy or secure</p>
      <p class="lead">
        <a class="btn btn-secondary btn-lg" href="#" role="button">Learn more</a>
        <a class="btn btn-primary btn-lg" href="search.php" role="button">Search for Team Members</a>
      </p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>