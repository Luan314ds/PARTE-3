<?php
    require_once "./app/db.php";


     function mostrarMarcas(){
        require_once "templates/header.php";

        require_once "templates/form_agregar.php";

        $marcas = ObtenerMarcas();

        ?>

    <ul class="list-group">
       <?php foreach($marcas as $marca){ ?> 
            <li class="list-group-item marcas">
               <div>
               <b><?php echo $marca->nombre_marca. "|" .$marca->importador. "|" .$marca->pais_origen ?></b>
            </div>
            <div class="actions">
            <a href="premodificar/<?php echo $marca->id?>" type="button" class="btn btn-success ml-auto">Modificar</a> 
            <a href="eliminar/<?php echo $marca->id?>" type="button" class="btn btn-danger ml-auto">Borrar</a>
           

            </div>
            </li>
         <?php } ?>
    </ul>

    <?php

require_once "templates/footer.php";

     }

     function añadirMarcas(){
      require_once "templates/header.php";

      
        // obtengo los datos del usuario
        $nombre= $_POST['nombre'];
        $importador= $_POST['importador'];
        $paisorigen= $_POST['pais_origen'];

        $id = insertoMarcas($nombre, $importador, $paisorigen);

        if($id){
         header('Location: /TP2_WEB2/marcas');
        }
        else{
         echo "No se inserto correctamente!";
        }



        require_once "templates/footer.php";
     }




     function premodificarMarca($id) {
      require_once "templates/header.php";

      pre($id);

      require_once "templates/form_modificar.php";
  
      require_once "templates/footer.php";

  }
  
function modificarmarca($id){

   echo "La función modificarmarca se está ejecutando.";

    $nombre= $_POST['nombre-nuevo'];
    $importador= $_POST['importador-nuevo'];
    $paisorigen= $_POST['pais_origen-nuevo'];

    actualizarMarca($nombre, $importador, $paisorigen,$id);

    header('Location: /TP2_WEB2/marcas');
}


     function removerMarca($id){
     eliminarMarca($id);
     header('Location: /TP2_WEB2/marcas');

     }


    