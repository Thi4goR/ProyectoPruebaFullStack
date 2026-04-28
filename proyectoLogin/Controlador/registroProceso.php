<?php
session_start();

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$contraseña1 = $_POST["contraseña"];
$contraseña2 = $_POST["contraseña2"];


if (strlen($contraseña1) > 8 && $contraseña1 == $contraseña2){
 header("Location: ../Vista/login.php");
} else if (strlen($contraseña1) <  8){
    header("Location: ../Vista/registro.php");
} else if ($contraseña1 != $contraseña2){
    header("Location: ../Vista/registro.php");
}

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

$message = '';
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // check if file has one of the following extensions
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = '../Vista/imagenes/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $message = 'File is successfully uploaded.';
            } else {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        } else {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }

}
$_SESSION['message'] = $message;

// Prepara y ejecuta la consulta
$stmt = $conn->prepare("INSERT INTO usuario(usr_name, usr_email, usr_pass, imagen) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $usuario, $email, $contraseña1, $newFileName);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: ../Vista/login.php");
exit();

?>