<?php

/*
Obtiene y duvuelve de la base de datos todas las tareas
*/
// function ObtenerDatos($idsecundaria){
//     $db = new PDO('mysql:host=localhost;dbname=tp°1_web_2;charset=utf8','root','');

//     $queryProductos = $db->prepare("SELECT * FROM marca");
//     $queryProductos->execute([$idsecundaria]);

//     $datos = $query->fetchAll(PDO::FETCH_OBJ);// devuelve un objeto anonimo

//     return $datos;

// }

function ObtenerConexion(){
return new PDO('mysql:host=localhost;dbname=tp__1_web_2;charset=utf8','root','');
}

function ObtenerMarcas(){
    $db = ObtenerConexion();
    
         $query= $db->prepare('SELECT * FROM marca');
         $query-> execute();
    
         $marcas = $query->fetchAll(PDO::FETCH_OBJ);
    return $marcas;
}

function ObtenerProductos(){
    $db = ObtenerConexion();
    
         $query= $db->prepare('SELECT * FROM productos');
         $query-> execute();
    
         $productos = $query->fetchAll(PDO::FETCH_OBJ);
    return $productos;
}

// Inserta la tarea en la base de datos
function insertoMarcas($nombre, $importador, $paisorigen){
    $db = ObtenerConexion();

    $query = $db->prepare('INSERT INTO marca(nombre_marca, importador, pais_origen)VALUES (?,?,?)');
    $query-> execute([$nombre, $importador, $paisorigen]);

    return $db -> lastInsertId();
}

function actualizarMarca($nombre, $importador, $paisorigen, $id) {
    $db = ObtenerConexion();  

    
    $query = $db->prepare('UPDATE marca SET nombre_marca = ?, importador= ?, pais_origen= ? WHERE id = ?');
    $query->execute([$nombre, $importador, $paisorigen, $id]);

 
}

function eliminarMarca($id){

    $db = ObtenerConexion();

    $queryProductos = $db->prepare("DELETE FROM productos WHERE id_marca = ?");
    $queryProductos->execute([$id]);// evitar la inyeccion SQL

  
    //2- Envio la consulta
    $query= $db->prepare("DELETE FROM marca WHERE id = ?");
    $query->execute([$id]);

    //VER SI RETORNAR ESTO

}



// function ObtenerProductoId($id_productos){
//     $productos = ObtenerDatos();
//     $producto = $productos[$id_productos]
//     return $producto;
// }
?>