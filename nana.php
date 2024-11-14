<?php

// define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' .$_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


// include_once "./APPP/controllers/controller.producto.php";
// include_once "./APPP/controllers/controller.marca.php";
// include_once "./APPP/controllers/controller.auth.php";
// include_once "./APPP/controllers/controller.inicio.php";

// include_once "./APPP/middlewares/leerSesion.php";
// include_once "./APPP/middlewares/mandarteLogin.php";

// require_once "libs/request.php";
// require_once "libs/response.php";
// require_once "templates/error.php";




// $res = new Response();

// if (!empty($_GET["action"])) {
//     $action = $_GET["action"];
// } else {
//     $action = "inicio";
// }

// $params = explode("/", $action);

// switch ($params[0]) {
//     // Inicio
//     case "inicio":
//         if (isset($params[0])) {
//             middlewaresesion($res);
//             $controller = new InicioController($res);
//             $controller-> mostrarInicio($params[0]);
//         }
//         break;

//     // Categorías
//     case "marcas":
//         if (isset($params[0])) {
//             middlewaresesion($res);
//             $controller = new MarcaController($res);
//             $controller->mostrarMarcas($params[0]);
//         }
//         break;

//     // Listado de productos
//     case "productos":
//         if (isset($params[0])) {
//             middlewaresesion($res);
//             $controller = new ProductoController($res);
//             $controller->MOSTRARPRODUCTOS($params[0]);
//         }
//         break;

//     // Producto específico
//     case "producto":
//         if (isset($params[1])) {
//             middlewaresesion($res);
//             $controller = new ProductoController($res);
//             $controller-> mostrarProducto($params[1]);
//         }
//         break;

//     // Productos por marca
//     case "productos-marca":
//         if (isset($params[1])) {
//             middlewaresesion($res);
//             $controller = new MarcaController($res);
//             $controller-> productosPorMarca($params[1]);
          
//         }
//         break;

//     // Agregar marca
//     case "agregar":
//         if (isset($params[0])) {
//             middlewaresesion($res);
//             $controller = new MarcaController($res);
//             $controller->  añadirMarcas($params[0]);

           
//         }
//         break;

//     // Agregar producto
//     case "agregar-prod":
//         if (isset($params[0])) {
//             middlewaresesion($res);
//              $controller = new ProductoController($res);
//              $controller->añadirProductos();
//         }
//         break;

//     // Eliminar marca
//     case "eliminar":
//         if (isset($params[1])) {
//             middlewaresesion($res);
//             $controller = new MarcaController($res);
//             $controller->removerMarca($params[1]);
            
//         }
//         break;

//     // Eliminar producto
//     case "eliminar-prod":
//         if (isset($params[1])) {
//             middlewaresesion($res);
//             $controller = new ProductoController($res);
//             $controller->removerProducto($params[1]);
            
//         }
//         break;

//     // Muestra el form-marca
//     case "formModificar-marca":
//         if (isset($params[1])) {
//             middlewaresesion($res);
//             verificar($res);
//             $controller = new MarcaController($res);
//             $controller->mostrarFormModificarMarca($params[1]);
            
//         }
//         break;

//     // Modificar marca
//     case "modificar-marca":
   
//             middlewaresesion($res);
//             verificar($res);
//             $controller = new MarcaController($res);
//             $controller->  modificarMarca($params[1]);
        
      
      
//         break;

//     // Muestra el form-producto
//     case "formModificar-producto":
//         if (isset($params[1])) {
//             middlewaresesion($res);
//             verificar($res);
//             $controller = new ProductoController($res);
//             $controller->  mostrarFormModificarProducto($params[1]);
           
//         }
//         break;

//     // Modificar producto
//     case "modificar-producto":
//         middlewaresesion($res);
//         verificar($res);
//         $controller = new ProductoController($res);
//         $controller->  modificarProducto();
//         break;


//     case "mostrarlogin":
//         $controller = new AutenticacionController();
//         $controller-> mostrarLogin();
//         break;
//      case "login":
//         $controller = new AutenticacionController();
//         $controller-> login();
//         break;
//         case "logout":
//             $controller = new AutenticacionController();
//             $controller->desloguearse ();
//             break;

//             case "logout":
//                 $controller = new AutenticacionController();
//                 $controller->desloguearse ();
//                 break;
        
//     // Default: página de error
//     default:
//         mostrarError();
//         break;
// }
?>