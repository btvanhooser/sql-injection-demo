<?php 

    include("connection.php");
    
    $query = "SELECT * FROM users";
    
    $result = mysqli_query($link, $query);
    
    $userList = array();
     
    while ($row = mysqli_fetch_assoc($result)){
        $userList[$row['id']] = array('firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'email' => $row['email']);
    }

?>