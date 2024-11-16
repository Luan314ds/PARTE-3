<?php

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


include_once "./APPP/controllers/controller.producto.php";
include_once "./APPP/controllers/controller.marca.php";
include_once "./APPP/controllers/controller.auth.php";
include_once "./APPP/controllers/controller.inicio.php";
include_once "./APPP/controllers/marca.api.controller.php";
include_once "./APPP/controllers/producto.api.controller.php";


include_once "./APPP/middlewares/leerSesion.php";
include_once "./APPP/middlewares/mandarteLogin.php";

require_once "libs/router.php";
require_once "libs/request.php";
require_once "libs/response.php";
// require_once "templates/error.php";


$router = new Router();
// VER ID
 //                 endpoint   verbo    controller           metodo

 //LISTADO DE COLECCION ENTERA POR GET
$router->addRoute('marcas', 'GET', 'MarcaApiController', 'mostrarTodo');

//Es parecido al traerse un id, pero no estoy cumpliendo la consigna
$router->addRoute('marca/:marca_producto', 'GET', 'MarcaApiController', 'mostrar');

//OBTENER POR GET UNA ENTIDAD POR ID
$router->addRoute('producto/:id_productos', 'GET', 'ProductoApiController', 'mostrar');

//PUT
$router->addRoute('producto/:id_productos', 'PUT', 'ProductoApiController', 'modificar');

//POST

$router->addRoute('producto', 'POST', 'ProductoApiController', 'añadir');



$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
?>
