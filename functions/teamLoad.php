<?php 

    session_start();

    include("connection.php");
    
    $query = "SELECT member_id FROM teams WHERE lead_id = $_SESSION[id]";
    
    $result = mysqli_query($link, $query);
    
    $memberIdList = array();
    
    while ($row = mysqli_fetch_assoc($result)){
        $memberIdList[] = $row['member_id'];
    }

?>