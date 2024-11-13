<?php
class UsuariosModel{

    private $db;

    function __construct(){
        $this->db = $this-> ObtenerConexion();
    }

    private function ObtenerConexion() {
        $db = new PDO('mysql:host=localhost;dbname=tp2;charset=utf8', 'root', '');
        return $db;
    }
    

    function ObtenerUsuario($nombre){
        $query = $this->db->prepare("SELECT * FROM usuario WHERE nombre = ?");
        $query->execute([$nombre]);
    
        return $query->fetch(PDO::FETCH_OBJ); 
    }
}
?>