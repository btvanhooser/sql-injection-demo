<?php 

    include("connection.php");
    
    $query = "SELECT * FROM profiles WHERE user_id = $_GET[page]";
    
    $result = mysqli_query($link, $query);
    
    $data = mysqli_fetch_assoc($result);
    
    if ($data){
        $profileInUse = array("occupation"=>$data["occupation"], "focus"=>$data["focus"]);
        $_SESSION['profileID'] = $data['id'];
    }
    else
        $profileInUse = null;

?>