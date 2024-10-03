<?php

/*
Obtiene y duelve de la base de datos todas las tareas
*/
function ObtenerDatos($idsecundaria){
    $db = new PDO('mysql:host=localhost;dbname=tp°1_web_2;charset=utf8','root','');

    $queryProductos = $db->prepare("SELECT * FROM marca");
    $queryProductos->execute([$idsecundaria]);

    $datos = $query->fetchAll(PDO::FETCH_OBJ);// devuelve un objeto anonimo

    return $datos;

}

// function ObtenerProductoId($id_productos){
//     $productos = ObtenerDatos();
//     $producto = $productos[$id_productos]
//     return $producto;
// }
?>