<?php
class MarcaModel{

    private $db;

    function __construct(){
        $this->db = $this-> ObtenerConexion();
    }
    
    private function ObtenerConexion() {
        $db = new PDO('mysql:host=localhost;dbname=tp2;charset=utf8', 'root', '');
        return $db;
    }
    

    function ObtenerMarcas() {
        $query = $this->db->prepare('SELECT * FROM marca');
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function obtenerProductosPorMarca($nombre_marca) {
        $query = $this->db->prepare("SELECT * FROM productos WHERE marca_producto = :nombre_marca");
        $query->bindParam(':nombre_marca', $nombre_marca);
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    
    function obtenerIDmarca($id){
        $query = $this->db->prepare("SELECT * FROM marca WHERE id = ?");
        $query->execute([$id]);
        $idmarca = $query->fetch(PDO::FETCH_OBJ);
        return  $idmarca;
    }

    function insertoMarcas($nombre, $importador, $paisorigen) {
        $query = $this->db->prepare('INSERT INTO marca(nombre_marca, importador, pais_origen) VALUES (?, ?, ?)');
        $query->execute([$nombre, $importador, $paisorigen]);
    
        return $this->db->lastInsertId();
    }
    
    function existeMarca($nombre_marca) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM marca WHERE nombre_marca = :nombre_marca");
        $query->bindParam(':nombre_marca', $nombre_marca);
        $query->execute();
    
        return $query->fetchColumn() > 0;
    }

    function eliminarMarca($nombre_marca) {
        
        $queryProductos = $this->db->prepare("DELETE FROM productos WHERE marca_producto = ?");
        $queryProductos->execute([$nombre_marca]);
    
        $query =  $this->db->prepare("DELETE FROM marca WHERE nombre_marca = ?");
        $query->execute([$nombre_marca]);
    }
    
    function cambioValoresMarca($id, $importador, $paisOrigen){
        $query = $this->db->prepare('UPDATE marca SET importador = ?, pais_origen = ? WHERE id = ?');
        $query->execute([$importador, $paisOrigen, $id]);
    }


}
?>