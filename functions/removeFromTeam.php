<?php 

    include("ensureLogin.php");
    include("connection.php");
    
    $userToRemove = mysqli_real_escape_string($link, $_GET['user']);
    
    $userQuery = "SELECT * FROM users WHERE id = $userToRemove";
    $userResult = mysqli_query($link, $userQuery);
    
    if (mysqli_num_rows($userResult) == 0){
        $error.="<br/>The user that you attempted to remove from your team does not exist.";
        header("Location:../home.php");
    }
    
    $checkExistQuery = "SELECT * FROM teams WHERE lead_id = $_SESSION[id] AND member_id = $userToRemove";
    $existResult = mysqli_query($link,$checkExistQuery);
    
    if (mysqli_num_rows($existResult) == 0)
        header("Location:../search.php");
        
    else {
    
        $row = mysqli_fetch_assoc($existResult);
        
        $idToRemove = $row['id'];
    
        $deleteQuery = "DELETE FROM teams WHERE id = $idToRemove";
        
        mysqli_query($link, $deleteQuery);
        
        mysqli_commit($link);
        
        header("Location:../search.php");
        
    }

?>