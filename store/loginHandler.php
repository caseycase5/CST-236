<?php
    $servername = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "store";
    $username = $_POST["username"];
    $userPassword = $_POST["password"];
    
    $message = NULL;
    
    $conn = new mysqli($servername, $databaseUser, $password, $database);
    
    if($conn === false) {
        echo("Error connecting");
    }
    
    $sql = "SELECT ID FROM `users` WHERE `username` = '$username' and `password` = '$userPassword';";
    $result = mysqli_query($conn,$sql);
    
    // Determining the number of rows returned
    $count = mysqli_num_rows($result);
    
    // Returning an echo based on the number of rows returned
    if($count == 1) {
        $message = ("Your login was successful!!");
        session_start();
        $_SESSION["isLoggedIn"] = true;
    }
    else if($count == 0) {
        $message = ("Your Login Name or Password is invalid");
    }
    else if($count > 1) {
        $message = ("There are multiple users registered with that username/password");
    }
    else {
        $message = ("Error. Please contact site admin.");
    }
    mysqli_close($conn);
?>

<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Login Success</title>
	<style>
		  body {  
  			font-family: Calibri, Helvetica, sans-serif;  
 			background-color: #DCE1DE; 
		  }
    </style>
</head>

<body>
	<h1><?php echo $message ?></h1><br>
	
	<p>Session variable "isLoggedIn": <?php echo $_SESSION["isLoggedIn"];?> <br></p>
		
	<a href="index.html">Main Menu</a>
</body>
        