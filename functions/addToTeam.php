<?php 

    include("ensureLogin.php");
    include("connection.php");
    
    $userToAdd = mysqli_real_escape_string($link, $_GET['user']);
    
    $userQuery = "SELECT * FROM users WHERE id = $userToAdd";
    $userResult = mysqli_query($link, $userQuery);
    
    if (mysqli_num_rows($userResult) == 0){
        $error.="<br/>The user that you attempted to add to your team does not exist.";
        header("Location:../home.php");
    }
    
    $checkExistQuery = "SELECT * FROM teams WHERE lead_id = $_SESSION[id] AND member_id = $userToAdd";
    $existResult = mysqli_query($link,$checkExistQuery);
    
    if (mysqli_num_rows($existResult) > 0)
        header("Location:../search.php");
        
    else {
    
        $insertQuery = "INSERT INTO teams (lead_id,member_id) VALUES ($_SESSION[id],$userToAdd)";
        
        mysqli_query($link, $insertQuery);
        
        mysqli_commit($link);
        
        header("Location:../search.php");
        
    }

?>