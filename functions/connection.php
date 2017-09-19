<?php

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    
    if (empty($url["user"]))
        $link= mysqli_connect("localhost", "adminuser", "password", "sqlinjectionsite");
    else {
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);
        
        $link = mysqli_connect($server, $username, $password, $db);
    }

?>