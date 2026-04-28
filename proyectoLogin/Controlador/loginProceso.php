<?php
$email = $_POST["email"];
$contraseña = $_POST["contraseña"];


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
	$query = "SELECT * FROM usuario WHERE usr_email = '$email' AND usr_pass = '$contraseña'";
	$result = mysqli_query($conn, $query);
	$usuarios = [];
	while($row = mysqli_fetch_assoc($result)) {
		$usuarios[] = $row;
	}	
	

	
	if(empty($usuarios)){ 
		echo "Login incorrecto";
	} else {
		echo "login exitoso";
		
	}

	session_start();

	$_SESSION['imagen'] = $usuarios[0]['imagen'];

	$_SESSION['usr_name'] = $usuarios[0]['usr_name'];
	
	if($usuarios[0]['rol'] == 1) {
		header("Location: ../Controlador/adminProceso.php");
		exit();
		header("Location:../Vista/admin.php");
		exit();
		}else{
			header("Location:../Vista/perfil.php");
			exit();
		}

?>