<?php 

    include("teamLoad.php");
    
    $name = $_POST['name'];
    
    $query = "SELECT firstname, lastname, id FROM users WHERE firstname LIKE '%$name%' OR lastname LIKE '%$name%'";
    
    $result = mysqli_query($link, $query);
    
    while($row = mysqli_fetch_assoc($result)){
        if ($_SESSION['id'] == $row['id'] || in_array($row['id'],$memberIdList)) continue;
        echo "<tr>";
        echo "<td>$row[firstname]</td>";
        echo "<td>$row[lastname]</td>";
        echo "<td><a class='btn btn-outline-primary mr-2' href='profile.php?page=$row[id]'>View</a><a class='btn btn-outline-success' href='functions/addToTeam.php?user=$row[id]'>Add</a></td>";
        echo "</tr>";
        
    }

?>