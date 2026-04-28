<?php
session_start(); 
$imagen = $_SESSION['imagen'];

if(!isset($_SESSION['usr_name'])){
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="estilosPerfil.css">
     <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <title>Perfil del Usuario</title>
</head>
<body>
    <div id="divPrincipal">
        <div id="campoImg"> 
            <?php
            if($imagen != null){
                echo '<img src="../Vista/imagenes/' . $imagen . '">';  
            } else {
                $imagen = "bx bx-user-circle";
                echo '<i id="fotoGenerica" class="' . $imagen . '"></i>';
            }
            ?> 
        </div>
        <div id=campoUsr>
            <p><?php echo $_SESSION['usr_name']?></p>
        </div> 
        <div id="campoA">
            <a href="../Controlador/logoutProceso.php"> Cerrar sesión </a>
        </div>
    </div>
</body>
</html>