<?php 

    include("functions/ensureLogin.php"); 
    include("functions/userLoad.php");
    include("functions/teamLoad.php");
    
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
      <h1 class="display-3">It's Time to Build Your Team</h1>
      <p class="lead">Using the table below, please select candidates to invite to your team. Use the filters to find people you know, and simply click the button in their row to see their profile and invite.</p>
      <hr class="my-4">
      <p>Putting together teams has never been this easy or secure</p>
      <div class='card bg-light border-secondary mb-2'>
        <div class="card-header">
          <div class="navbar">
            <h3>Your Team</h3>
          </div>
        </div>
        <div class="card-body text-center">
          
          <?php if (count($memberIdList) == 0) : ?>
          
            It looks like your team is empty. Add some members by searching below!
            
          <?php else : ?>
          
            <table class="table table-sm table-hover">
              <thead>
                <tr>
                  <th class="text-center">First Name</th>
                  <th class="text-center">Last Name</th>
                  <th class="text-center">Interact</th>
                </tr>
              </thead>
              <tbody id='resultsTable'>
                  <?php 
                  
                    foreach($memberIdList as $i => $id){
                        if ($id == $_SESSION['id']) continue;
                        $userToShow = $userList[$id];
                        $firstname = $userToShow['firstname'];
                        $lastname = $userToShow['lastname'];
                        
                        echo "<tr>";
                        echo "<td>$firstname</td>";
                        echo "<td>$lastname</td>";
                        echo "<td><a class='btn btn-outline-primary mr-2' href='profile.php?page=$id'>View</a><a class='btn btn-outline-danger' href='functions/removeFromTeam.php?user=$id'>Remove</a></td>";
                        echo "</tr>";
                    }
                  
                  ?>
              </tbody>
            </table>
            
          <?php endif ?>
          
        </div>
      </div>
      <div class="card bg-light border-secondary mt-4">
        <div class="card-header">
          <div class="navbar">
            <h3 class="inline-block align-middle">Available Users</h4>
            <form class="form-inline my-2 my-lg-0 float-right" id="searchForm" action="" method="post">
              <input class="form-control mr-sm-2" type="text" placeholder="Name" aria-label="Name" id="nameToSearch" autocomplete="off">
              <button class="btn btn-success my-2 my-sm-0" type="submit" id="searchButton">Search</button>
            </form>
          </div>
        </div>
        <div class="card-body text-center">
          <table class="table table-sm table-hover">
              <thead>
                <tr>
                  <th class="text-center">First Name</th>
                  <th class="text-center">Last Name</th>
                  <th class="text-center">Interact</th>
                </tr>
              </thead>
              <tbody id='resultsTable'>
                  <?php 
                  
                    foreach($userList as $id => $infoArray){
                        if ($id == $_SESSION['id'] || in_array($id,$memberIdList)) continue;
                        echo "<tr>";
                        echo "<td>$infoArray[firstname]</td>";
                        echo "<td>$infoArray[lastname]</td>";
                        echo "<td><a class='btn btn-outline-primary mr-2' href='profile.php?page=$id'>View</a><a class='btn btn-outline-success' href='functions/addToTeam.php?user=$id'>Add</a></td>";
                        echo "</tr>";
                    }
                  
                  ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
      $(function() {
        $("#searchForm").bind('submit',function() {
          var name = $('#nameToSearch').val();
           $.post('functions/searchUsers.php',{name:name}, function(data){
             $("#resultsTable").html(data);
           });
           return false;
        });
      });
    </script>
  </body>
</html>