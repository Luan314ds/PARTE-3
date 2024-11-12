<?php

class ProductoModel{

    private $db;

    function __construct(){
        $this->db = $this-> ObtenerConexion();
    }
    
    private function ObtenerConexion() {
        $db = new PDO('mysql:host=localhost;dbname=tp2;charset=utf8', 'root', '');
        return $db;
    }
    

    function ObtenerProductos() {

        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();
        

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function obtenerProductoPorId($id) {
        $query = $this->db->prepare("SELECT * FROM productos WHERE id_productos = ?");
        $query->execute([$id]);
    
        return $query->fetch(PDO::FETCH_OBJ); 
    }

    function insertoProductos($marcaproducto, $tipoproducto, $modelo, $color, $descripcion) {


        $query = $this->db->prepare('INSERT INTO productos(marca_producto, tipo_producto, modelo, color, descripcion_producto) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$marcaproducto, $tipoproducto, $modelo, $color, $descripcion]);
    
        return $this->db->lastInsertId();
    }

    
function eliminarProducto($id) {

    $query = $this->db->prepare("DELETE FROM productos WHERE id_productos = ?");
    $query->execute([$id]);
}


function obtenerIDproducto($id){

    $query = $this->db->prepare("SELECT * FROM productos WHERE id_productos = ?");
    $query->execute([$id]);
    $idproducto = $query->fetch(PDO::FETCH_OBJ);
    return  $idproducto;
}

function cambioValoresProducto($id,  $tipoproducto, $modelo, $color, $descripcion ){

    $query = $this->db->prepare('UPDATE productos SET tipo_producto = ?, modelo = ?, color = ?, descripcion_producto = ? WHERE id_productos = ?');
    $query->execute([$tipoproducto, $modelo, $color, $descripcion, $id]);
}


    
    
}

?>