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
    

    public function ObtenerProductos($orderBy = false) {

        $sql = 'SELECT * FROM productos';

        if($orderBy){
            switch ($orderBy) {
                case 'precioASC':
                    $sql .= ' ORDER BY precio ASC';
                    break;
                case 'precioDESC':
                        $sql .= ' ORDER BY precio DESC';
                    break;
        
            }
          
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function ObtenerPrecio() {

        $query = $this->db->prepare('SELECT * FROM productos WHERE precio');
        $query->execute();
        

        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    function obtenerProductoPorId($id) {
        $query = $this->db->prepare("SELECT * FROM productos WHERE id_productos = ?");
        $query->execute([$id]);
    
        return $query->fetch(PDO::FETCH_OBJ); 
    }

    function insertoProductos($marcaproducto, $tipoproducto, $modelo, $color, $descripcion, $precio) {


        $query = $this->db->prepare('INSERT INTO productos(marca_producto, tipo_producto, modelo, color, descripcion_producto, precio) VALUES (?, ?, ?, ?, ?, ?)');
        $query->execute([$marcaproducto, $tipoproducto, $modelo, $color, $descripcion, $precio]);
    
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

function cambioValoresProducto($id,  $tipoproducto, $modelo, $color, $descripcion, $precio ){

    $query = $this->db->prepare('UPDATE productos SET tipo_producto = ?, modelo = ?, color = ?, descripcion_producto = ?, precio = ?  WHERE id_productos = ?');
    $query->execute([$tipoproducto, $modelo, $color, $descripcion, $precio, $id]);
}


    
    
}

?>