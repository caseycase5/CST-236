

<?php
    $servername = "localhost";
    $databaseUser = "root";
    $password = "root";
    $database = "store";
    $username = $_POST["username"];
    $userPassword = $_POST["password"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $message = NULL;
    
    $conn = new mysqli($servername, $databaseUser, $password, $database);
    if($conn === false) {
        echo("Error connecting");
    }

    $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`) 
    VALUES (NULL, '$firstName', '$lastName', '$username', '$userPassword', '$email')";
    
    if(mysqli_query($conn, $sql)) {
        $message = 'Registration Complete!';
    }
    else {
        $message = 'Registration Not Complete! Please Contact Site Admins.';
    }
    
    mysqli_close($conn);
?>

<html>
	<head>
		<title>Registration Complete</title>
		<style>
		  body {  
  			font-family: Calibri, Helvetica, sans-serif;  
 			background-color: #DCE1DE; 
		  }
        </style>
	</head>

	<body>
		<h1><?php echo $message ?></h1><br>
		
		<a href="index.html">Main Menu</a>
	</body>
</html>