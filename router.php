<?php
include_once "./APPP/controllers/controller.producto.php";
include_once "./APPP/controllers/controller.marca.php";
include_once "./APPP/controllers/controller.auth.php";

require_once "./APPP/middlewares/leerSesion.php";
require_once "libs/response.php";
require_once "cerrar_sesion.php";
require_once "autenticar.php";
require_once "saludar.php";
require_once "templates/inicio.php";
require_once "templates/error.php";
require_once "logueo/autenticacion.php";
require_once "logueo/cerrar_sesion.php";


$res = new Response();

if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "inicio";
}

$params = explode("/", $action);

switch ($params[0]) {
    // Inicio
    case "inicio":
        if (isset($params[0])) {
            mostrarInicio($params[0]);
        }
        break;

    // Categorías
    case "marcas":
        if (isset($params[0])) {
            $controller = new MarcaController($res);
            $controller->mostrarMarcas($params[0]);
        }
        break;

    // Listado de productos
    case "productos":
        if (isset($params[0])) {
            $controller = new ProductoController();
            $controller->MOSTRARPRODUCTOS($params[0]);
        }
        break;

    // Producto específico
    case "producto":
        if (isset($params[1])) {
            $controller = new ProductoController();
            $controller-> mostrarProducto($params[1]);
        }
        break;

    // Productos por marca
    case "productos-marca":
        if (isset($params[1])) {
            $controller = new MarcaController($res);
            $controller-> productosPorMarca($params[1]);
          
        }
        break;

    // Agregar marca
    case "agregar":
        if (isset($params[0])) {
            $controller = new MarcaController($res);
            $controller->  añadirMarcas($params[0]);

           
        }
        break;

    // Agregar producto
    case "agregar-prod":
        if (isset($params[0])) {
             $controller = new ProductoController();
             $controller->añadirProductos();
        }
        break;

    // Eliminar marca
    case "eliminar":
        if (isset($params[1])) {
            $controller = new MarcaController($res);
            $controller->removerMarca($params[1]);
            
        }
        break;

    // Eliminar producto
    case "eliminar-prod":
        if (isset($params[1])) {
            $controller = new ProductoController();
            $controller->removerProducto($params[1]);
            
        }
        break;

    // Muestra el form-marca
    case "formModificar-marca":
        if (isset($params[1])) {
            middlewaresesion($res);
            $controller = new MarcaController($res);
            $controller->mostrarFormModificarMarca($params[1]);
            
        }
        break;

    // Modificar marca
    case "modificar-marca":
        if(isset($params[1])){
            middlewaresesion($res);
            $controller = new MarcaController($res);
            $controller->  modificarMarca($params[1]);
        }
      
      
        break;

    // Muestra el form-producto
    case "formModificar-producto":
        if (isset($params[1])) {
            middlewaresesion($res);
            $controller = new ProductoController();
            $controller->  mostrarFormModificarProducto($params[1]);
           
        }
        break;

    // Modificar producto
    case "modificar-producto":
        middlewaresesion($res);
        $controller = new ProductoController();
        $controller->  modificarProducto();
        break;

    // Iniciar sesión
    case "auth":
        auth();
        break;

    // Verificación de inicio de sesión
    case "saludar":
        saludar();
        break;

    case "cerrar":
        cerrar();
        break;


    case "mostrarlogin":
        $controller = new AutenticacionController();
        $controller-> mostrarLogin();
        break;
     case "login":
        $controller = new AutenticacionController();
        $controller-> login();
        break;
        
    // Default: página de error
    default:
        mostrarError();
        break;
}
?>
