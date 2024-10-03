<?php
require_once "app/db.php";

function mostrarProductos(){
    require_once "templates/header.php";
    echo "Productos";
}

function mostrarProducto($id_productos){
   require_once "templates/header.php";
   
   $producto = ObtenerProductosId($id_productos);
   
}

?>