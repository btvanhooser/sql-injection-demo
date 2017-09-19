<?php 
  include("functions/ensureLogin.php");
  include("functions/userLoad.php");
  if(!isset($_GET['page'])) header("Location:home.php");
  else $user = $userList[$_GET['page']];
  if(!isset($user)) header("Location:home.php");
  include("functions/profileCreate.php");
  include("functions/profileLoad.php");
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
    <?php if (empty($profileInUse) && $_GET['page'] == $_SESSION['id']) : ?>
      <div class="jumbotron">
        <h1 class="display-3"><?php echo "$user[firstname] $user[lastname]" ?></h1>
        <hr class="my-4">
        <p class="lead">It looks like your profile is empty! Click "Create Profile" to add some information.</p>
        <p class="lead">
          <button class="btn btn-success btn-lg" type="button" data-toggle="modal" data-target="#editProfile">Create Profile</button>
        </p>
      </div>
    <?php else : ?>
      <div class="jumbotron">
      <h1 class="display-3"><?php echo "$user[firstname] $user[lastname]" ?></h1>
      <p class="lead">Email: <?php echo "$user[email]"; ?></p>
      <hr class="my-4">
      <?php if (!empty($profileInUse['occupation'])) echo "<p class='lead'>Occupation: $profileInUse[occupation]</p>"; ?>
      <?php if (!empty($profileInUse['focus']))      echo "<p class='lead'>Focus: $profileInUse[focus]</p>";           ?>
      <?php if ($_GET['page'] == $_SESSION['id']): ?>
      <p class="lead">
        <button class="btn btn-secondary btn-lg" type="button" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
      </p>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Profile Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" class="container" id="needs-validation" novalidate>
              <div class='row'>
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" autocomplete="off" <?php if (!empty($profileInUse['occupation'])) echo "value='$profileInUse[occupation]'"; ?> required>
              </div>
              <div class='row'>
                <label for="focus">Focus</label>
                <input type="text" class="form-control" id="focus" name="focus" placeholder="Focus" autocomplete="off" <?php if (!empty($profileInUse['focus'])) echo "value='$profileInUse[focus]'"; ?> required>
              </div>
              <hr class="my-4">
              <button class="btn btn-primary" type="submit" name="submit" value="profileChange" action="profileCreate.php">Save Changes</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
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