<?php
    require_once "./app/db.php";


     function mostrarMarcas(){
        require_once "templates/header.php";

        require_once "templates/form_agregar.php";

        $marcas = ObtenerMarcas();

        ?>

    <ul class="list-group">
       <?php foreach($marcas as $marca){ ?> 
            <li class="list-group-item">
            <b><?php echo $marca->id. "|".$marca->nombre_marca. "|" .$marca->importador. "|" .$marca->pais_origen ?> </li></b>;
         <?php } ?>
    </ul>

    <?php

require_once "templates/footer.php";

     }
    
     function delete($idsecundaria){
          //1-Vinculamos la conexion 
          $db = new PDO('mysql:host=localhost;dbname=tp°1_web_2;charset=utf8','root','');
    
         // Paso 1: Eliminar primero los productos relacionados con la marca
         $queryProductos = $db->prepare("DELETE FROM productos WHERE id_marca = ?");
         $queryProductos->execute([$idsecundaria]);// evitar la inyeccion SQL
    
       
         //2- Envio la consulta
         $query= $db->prepare("DELETE FROM marca WHERE id = ?");
         $query->execute([$idsecundaria]);
     }

     function añadirMarcas(){

        // obtengo los datos del usuario
        $nombre= $_POST['nombre'];
        $importador= $_POST['importador'];
        $paisorigen= $_POST['pais_origen'];

        insertoMarcas($nombre, $importador, $paisorigen);

        echo "Se inserto con exito!";
     }