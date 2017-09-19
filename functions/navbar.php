<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="<?php if (isset($_SESSION['id'])) echo "home.php"; else echo "index.php"; ?>">Team Builder</a>
  <?php 
    
    echo $_SESSION['fred'];
  
    if(isset($_SESSION['id'])){ 
      echo "<span class='navbar-text'>";
      echo "<a class='btn btn-outline-secondary my-2 my-sm-0 mr-2' href='profile.php?page=$_SESSION[id]'>$_SESSION[fullname]</a>";
      echo "<a class='btn btn-outline-danger my-2 my-sm-0' href='index.php?logout=1'>Log Out</a>";
      echo "</span>";
    }
  
    else {
      echo "<form method='POST' class='form-inline'>";
      echo "<input class='form-control mr-sm-2' type='text' name='email' placeholder='Email' aria-label='Login'>";
      echo "<input class='form-control mr-sm-2' type='password' name='password' placeholder='Password' aria-label='Password'>";
      echo "<button class='btn btn-outline-success my-2 my-sm-0' type='submit' name='submit' value='login'>Login</button>";
      echo "</form>";
    }
  
  ?>
</nav>