<?php
require_once "app/datos.php";
require_once "templates/productos.php";
require_once "templates/marcas.php";
require_once "templates/inicio.php";


if (!empty($_GET["action"])) {
$action = $_GET["action"] ;
}
else {
$action = "inicio";
}

// datos/martin =[datos[0]/martin[1] ]
$params = explode("/",$action);

switch ($params[0]) {
case "inicio":
        if(isset($params[0])){
            mostrarInicio($params[0]);
        }
break;

case "producto":
    if(isset($params[1])){
        mostrarProducto($params[1]);
    }
break;

case "marcas":
    if(isset($params[0])){
        mostrarMarcas($params[0]);
    }
break;

case "productos":
    if(isset($params[0])){
        mostrarProductos($params[0]);
    }
break;
default:

    mostrarError();
break;
}

// case "productos":
//     if(isset($params[1])){
//         mostrarProductos($params[1]);
//     }
// break;

?>