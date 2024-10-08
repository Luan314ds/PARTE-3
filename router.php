<?php
require_once "app/error.php";
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
//listado de items
case "inicio":
        if(isset($params[0])){
            mostrarInicio($params[0]);
        }
break;
//Detalle de item
case "producto":
    if(isset($params[1])){
        mostrarProducto($params[1]);
    }
break;
//Categorias
case "marcas":
    if(isset($params[0])){
        mostrarMarcas($params[0]);
    }
break;
//Listado de items por categoria
case "productos":
    if(isset($params[0])){
        mostrarProductos($params[0]);
    }
break;

case "agregar":
    if(isset($params[0])){
        añadirMarcas($params[0]);
    }
break;

case "eliminar":
    if(isset($params[1])){
        removerMarca($params[1]);
    }
break;
case "premodificar":
    if(isset($params[1])){
        premodificarMarca($params[1]);
    }
break;
case "modificar":
    if(isset($params[1])){
        modificarmarca($params[1]);
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