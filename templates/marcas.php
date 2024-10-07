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
            <form action="modificar/<?php echo $marca->id?>" method="POST" class="my-4" id="formulario" >
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre</label>
                <input required name= "nombre-nuevo" type="text" class="form-control">
            </div>
        </div>
        
        <div class="col-9">
            <div class="form-group">
                <label>Importador</label>
                <input required name= "importador-nuevo" type="text" class="form-control">
            </div>
        </div>
        
        <div class="col-9">
            <div class="form-group">
                <label>Pais de origen</label>
                <input required name="pais_origen-nuevo" type="text" class="form-control">
            </div>
        </div>

        
        <button type="submit" class="btn btn-success mt-2 " >Modificar</button>
       

   </div>
</form>
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

  function modificarMarca($id) {
    require_once "templates/header.php";

    $nombre= $_POST['nombre-nuevo'];
    $importador= $_POST['importador-nuevo'];
    $paisorigen= $_POST['pais_origen-nuevo'];

    actualizarMarca($nombre, $importador, $paisorigen,$id);

    require_once "templates/footer.php";
    

}
     function removerMarca($id){
     eliminarMarca($id);
     header('Location: /TP2_WEB2/marcas');

     }


    