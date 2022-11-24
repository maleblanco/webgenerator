<?php
    
     function verificarUsuario($email,$pass){
        
        $db = new mysqli("”localhost", 'adm_webgenerator', 'webgenerator2020', 'webgenerator');
       
        $resultado=$db->query("SELECT * FROM `usuario` WHERE `email` LIKE '" .$email . "' AND `password` LIKE '" . $pass . "' ");
        $datosUsuario = new \stdClass();
            var_dump($resultado);

        if ($resultado->num_rows == 1) {

          

            $fila = $resultado->fetch_array(MYSQLI_ASSOC);

        
            $datosUsuario->idUsuario = $fila["idUsuario"];
            $datosUsuario->email = $fila["email"];
            $datosUsuario->pass = $fila["password"];
            $datosUsuario->fechaRegistro = $fila["fechaRegistro"];
            
            $datosUsuario->error = "Usuario y contraseña validos.";
            $datosUsuario->errno = 200;
        } else { 

            $datosUsuario->error = "Usuario o contraseña invalidos.";
            $datosUsuario->errno = 404;
        }

        return $datosUsuario;
    }

function verificarEmail($email)
{
    $db = new mysqli("localhost", '11088', '11088', '11088');
 
    $resultado = $db->query("SELECT * FROM `usuario` WHERE `email` LIKE '" . $email ."' ");

    if ($resultado->num_rows == 1) {
        $datosUsuario = new \stdClass();


        $fila = $resultado->fetch_array(MYSQLI_ASSOC);


        $datosUsuario->error = "Email Existente";
        $datosUsuario->errno = 401;
    } else {
        $datosUsuario = new \stdClass();
        $datosUsuario->error = "Email no Existe";
        $datosUsuario->errno = 201;
    }

    return $datosUsuario;
}


function register($email,$pass)
{
    $db = new mysqli("localhost", '11088', '11088', '11088');

    $resultado = $db->query("INSERT INTO `usuario` (`idUsuario`, `email`, `password`, `fechaRegistro`) VALUES (NULL, '".$email."', '" . $pass . "', CURRENT_TIMESTAMP);");

   
}
function verificarWeb($nombreWeb){
    $db = new mysqli("localhost", '11088', '11088', '11088');

    $resultado = $db->query("SELECT * FROM `web` WHERE `dominio` LIKE '" . $nombreWeb . "' ");

    if ($resultado->num_rows == 1) {
        $datosUsuario = new \stdClass();


        $fila = $resultado->fetch_array(MYSQLI_ASSOC);


        $datosUsuario->error = "dominio Existente";
        $datosUsuario->errno = 402;
    } else {
        $datosUsuario = new \stdClass();
        $datosUsuario->error = "dominio no Existe";
        $datosUsuario->errno = 202;
    }

    return $datosUsuario;
}
function registerWeb($idUsuario, $nombreWeb)
{
    $db = new mysqli("localhost", '11088', '11088', '11088');

    $resultado = $db->query(" INSERT INTO `web` (`idWeb`, `idUsuario`, `dominio`, `fechaCreacion`) VALUES (NULL, '" . $idUsuario ."', '" . $nombreWeb . "', CURRENT_TIMESTAMP);");
  
}
function links($idUsuario){
    $db = new mysqli("localhost", '11088', '11088', '11088');
    $resultado = $db->query("SELECT * FROM `web` WHERE `idUsuario` LIKE   $idUsuario  ");
    $datosWeb = new \stdClass();
    $links=" ";
    if ($resultado->num_rows >= 1) {

        while ($fila = $resultado->fetch_assoc()) { 

          $links.= '  <form action="panel.php" method="POST">
          <a href="/alumno/11760/Actividades/actividad11/' . $fila["dominio"] . '">' . $fila["dominio"] . '</a>
            <a href="/alumno/11760/Actividades/actividad11/'.$fila["dominio"].'.zip" download>Descargar</a>
           <input type="submit" id="btnEliminar" name="btnEliminar" value="Eliminar">
           <input type="hidden" name="id" value="' . $fila["dominio"] . '"><p>
           </form>' ;
          
        }
  
    } else {

        $datosWeb->error = "Usuario o contraseña invalidos.";
        $datosWeb->errno = 404;
    }
 


    return $links;


}
function Eliminar($dom)
{
    $db = new mysqli("localhost", '11088', '11088', '11088');

    $resultado = $db->query("DELETE FROM web WHERE dominio LIKE '".$dom."'");
}


?>
<a href=""></a>