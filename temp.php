<?php 

    include("functions/connection.php");
    
    $query = "create table users(id INT NOT NULL auto_increment, firstname varchar(50) NOT NULL, lastname varchar(50) NOT NULL, email varchar(50) NOT NULL, password varchar(50) NOT NULL, password_plain varchar(50) NOT NULL, PRIMARY KEY (id));";
    
    mysqli_query($link, $query);
        
    mysqli_commit($link);
    
    $query = "create table profiles(id INT NOT NULL auto_increment, user_id INT NOT NULL, occupation varchar(50) NOT NULL, focus varchar(50) NOT NULL, PRIMARY KEY (id));";
    
    mysqli_query($link, $query);
        
    mysqli_commit($link);
    
    $query = "create table teams(id INT NOT NULL auto_increment, lead_id INT NOT NULL, member_id INT NOT NULL, PRIMARY KEY (id));";
    
    mysqli_query($link, $query);
        
    mysqli_commit($link);

?>