<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="estiloLogin.css">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <title>inicio de sesión | Redireccionar usuario</title>
</head>
<body>
<div id="divPrincipal">
    <form action="../Controlador/loginProceso.php" method="POST">
        <h1>Inicio de sesión</h1>
       <div class="campos" id="campoMail">
            <div class="input-wrapper">
                <i class="bx bx-at"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="campos" id="campoPass">
            <div class="input-wrapper">
                <i class="bx bx-lock"></i>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
            </div>
        </div>
        <button type="submit">Login</button>
         <div id="campoA">
                <a href='/proyectoLogin/Vista/registro.php'>No tengo una cuenta</a>
        </div>        
    </form>
</div>
</body>
</html>