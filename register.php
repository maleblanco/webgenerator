<?php
include 'bd.php';
session_start();



if (isset($_SESSION['usuario'])) {

    header('Location:panel.php');
}

$alerta = "";


if (isset($_POST['botonRegis'])) {



    $email = $_POST['txtEmail'];
    $contra = $_POST['txtContrasenia'];
    $contrarp = $_POST['contraseniaRp'];

if($contra==$contrarp){
    $usuario = verificarEmail($email);
    if($usuario->errno==201){
        register($email,$contra);
            header('Location:login.php');

    }else{
            $alerta = "El Email Ya existe";
    }
}else{
    $alerta="Contraseñas no coinciden";
}

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="hola.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webgenerator Malena Blanco</title>
</head>

<body>

    <center>

        <h2>Registrarte es simple</h2>

            <form action="login.php" method="post">
                <label class="label" for="txtEmail">Email:</label>
                <input class="text" type="text" name="txtEmail" id="txtEmail" required>
                    <br>
                <label class="label" for="txtContrasenia">Contraseña:</label>
                <input class="text" type="password" name="txtContrasenia" id="txtContrasenia" required>
                    <br>
                <label class="label" for="txtContrasenia">Repite contraseña:</label>
                <input class="text" type="password" name="txtContraseniarp" id="txtContraseniarp" required>
            

            <input type="submit" class="boton" id="Registrarse" name="Registrarse" value="Registrarse">
            </form>

    </center>
</body>
</html>