<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="estilosRegistro.css">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <title>inicio de sesión | Redireccionar usuario</title>
</head>
<body>
<div id="divPrincipal">
    <form id="form" action="../Controlador/registroProceso.php" method="POST" enctype="multipart/form-data">
        <h1>Registro</h1>
        <div class="campos" id="campoUser">
            <div class="input-wrapper">
                <i class="bx bx-user"></i>
                <input id="inputNombre" name="usuario" type="user" placeholder="Usuario" required>
            </div>
        </div>
        <div class="campos" id="campoMail">
            <div class="input-wrapper">
                <i class="bx bx-at"></i>
                <input id="inputEmail" name="email" type="email" maxlength="100" pattern="[a-zA-Z0-9]+@[a-z0-9A-Z]+\.[a-zA-z]{2,}" placeholder="Email" required>
                <!--
                maxlength="100" porque es el máximo admitido por la BD: varchar(100)
                [a-zA-Z0-9._%+\-]+Usuario: letras y números permitidos
                @ El símbolo arroba literal
                [a-zA-Z0-9.\-]+ Nombre del dominio
                \. Un punto literal 
                [a-zA-Z]{2,} Extensión de al menos 2 letras (com, net, org...) 
                -->
            </div>
        </div>
        <div class="campos" id="campoPass">
            <div class="input-wrapper">
                <i class="bx bx-lock"></i>
                <input id="inputPass" type="password" name="contraseña" placeholder="Contraseña" required>
            </div>
        </div>
        <div class="campos" id="campoRepetirPass">
            <div class="input-wrapper">
                <i class="bx bx-lock"></i>
                <input id="inputPass2" type="password" name="contraseña2" placeholder="Repetir Contraseña" required>
            </div>
        </div>
        <div class="campos" id="campoUploadFile">
           <!-- <input type="file" name="uploadedFile">
                Se cambia por un label para poder darle estilos con CSS más facilmente
           -->
            <label for="archivo"> <!-- Al hacer clic, apunta al input con id="archivo" -->
                <i class="bx bx-folder-up-arrow"></i>
                Subir archivo
            </label>
        <input type="file" id="archivo" name="uploadedFile">
        </div>
            <div id="campoBtn">
                <button value="Upload" type="submit">Registrarme</button>
            </div>
            <div id="campoA">
                <a href='/proyectoLogin/Vista/login.php'>Ya tengo una cuenta</a>
            </div>        
    </form>
    <!-- <script>
        const form = document.getElementById("form");
        const nombre = document.getElementById("inputNombre");
        const email = document.getElementById("inputEmail");
        const pass = document.getElementById("inputPass");
        const pass2 = document.getElementById("inputPass2");

        form.addEventListener("submit", function(event){
            event.preventDefault(); //Evita que el formulario envie los datos antes de la validación
            if(nombre.value=="" || email.value=="" || pass.value=="" || pass2.value==""){
                alert("Completa todos los campos");
                return;
            } else if (pass.value.length < 8){
                alert("La contraseña debe ser mayor de 8 caracteres");
                return;
            } else if (pass.value != pass2.value){
                alert("Las contraseñas deben ser iguales");
                return;
            }
        });
    </script> -->
</div>
</body>
</html>