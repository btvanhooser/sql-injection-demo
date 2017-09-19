<?php 

    include("connection.php");
    
    if ($_POST['submit'] == "profileChange"){
        $occupation = mysqli_real_escape_string($link,$_POST['occupation']);
        $focus = mysqli_real_escape_string($link,$_POST['focus']);
        
        if (isset($_SESSION['profileID'])){
            $query = "UPDATE profiles SET occupation = '$occupation', focus = '$focus' WHERE id = $_SESSION[profileID]";
            mysqli_query($link, $query);
        } else {
            $query = "INSERT INTO `profiles` (user_id,occupation,focus) VALUES ($_SESSION[id],'$occupation','$focus')";
            mysqli_query($link, $query);
            $_SESSION['profileID'] = mysqli_insert_id($link);
        }
        
        mysqli_commit($link);
        
        header("Location:../profile.php?page=$_SESSION[id]");
    }

?>