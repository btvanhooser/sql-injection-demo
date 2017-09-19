<?php 

    session_start();
    
    if ($_GET["logout"] == 1 AND isset($_SESSION['id'])) {
        unset($_SESSION['id']);
        unset($_SESSION['fullname']);
        session_destroy();
        $message="You have logged out successfully";
    }
    
    include("connection.php");
    
    if ($_POST['submit']=="signup"){
        if (strlen($_POST['password']) < 8)                  $error.="<br/>Password must be 8 characters long";
        if ($_POST['password'] != $_POST['confirmPassword']) $error.="<br/>Confirmed password must match entered password";
        
        if ($error)
            $error = "Error(s) found in sign up details:".$error;
            
        else{
            $email = strtolower(mysqli_real_escape_string($link, $_POST['email']));
            
            $query = "SELECT * FROM `users` WHERE email ='".mysqli_real_escape_string($link, $_POST['email'])."'";
            $result = mysqli_query($link, $query);	
			$results = mysqli_num_rows($result);
			
			if ($results) $error = "That email is already registered. Do you want to log in?";
			else {
			    
			    $firstName = mysqli_real_escape_string($link, $_POST['firstName']);
			    $lastName =  mysqli_real_escape_string($link, $_POST['lastName']);
			    $password =  mysqli_real_escape_string($link, $_POST['password']);
			
    			$query = "INSERT INTO `users` (firstname,lastname,email,password,password_plain) VALUES ('".$firstName."','".
    			                                                                                            $lastName."','".
    			                                                                                            $email."','".
    			                                                                                            md5(md5($email).$password)."','".
    			                                                                                            $password."');";
       
        		mysqli_query($link, $query);
        		
        		$_SESSION['id'] = mysqli_insert_id($link);
        		$_SESSION['fullname'] = "$firstName $lastName";
        		
        		mysqli_commit($link);
        		
        		header("Location:home.php");
			
			}
        }
    }
    
    if ($_POST['submit'] == "login") {	
	
	    $email = strtolower(mysqli_real_escape_string($link, $_POST['email']));
	    $password = mysqli_real_escape_string($link, $_POST["password"]);
	
		$query = "SELECT * FROM users WHERE email='".$email."'AND 
		password='".md5(md5($email).$password). "'LIMIT 1";

		$result = mysqli_query($link, $query);
		
		$row = mysqli_fetch_array($result);
		
		if($row){
			$_SESSION['id'] = $row['id'];
			$_SESSION['fullname'] = "$row[firstname] $row[lastname]";
			header("Location:home.php");
		} else
			$error = "We could not find a user with that email and password combination. Please try again.";
	
	}

?>