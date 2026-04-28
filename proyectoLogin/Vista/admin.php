<?php
// Database configuration
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'base_usuarios';
	// Establish database connection
	$conn = mysqli_connect($hostname, $username, $password, $database);
	// Check connection
	if(!$conn){
		die('Connection failed: ' . mysqli_connect_error());
	}

	// Make query
	$query = "SELECT * FROM usuario";
	$result = mysqli_query($conn, $query);
	$usuarios = [];
	while($row = mysqli_fetch_assoc($result)) {
		$usuarios[] = $row;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel= "stylesheet" href="estiloLogin.css">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <title>Usuario Admin</title>
</head>
<body>
    <div>
        <p>
            <?php
                for ($i = 0; $i < count($usuarios); $i++) {
                    echo  $usuarios[$i]['usr_name'] . " " . $usuarios[$i]['usr_email'] . " " . $usuarios[$i]['usr_pass'] . "<br>" ;
                }
            ?>
        </p>
    </div>    
</body>
</html>