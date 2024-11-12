<?php
class MarcaView{

    function vistamarcas($marcas){
        require_once "templates/header.php";
?>
        <main>
    <form action="agregar" method="POST" class="my-4" id="formulario">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Nombre</label>
                    <input required name="nombre" type="text" class="form-control" id="nombre">
                </div>
            </div>
            
            <div class="col-9">
                <div class="form-group">
                    <label>Importador</label>
                    <input required name="importador" type="text" class="form-control" id="importador">
                </div>
            </div>
            
            <div class="col-9">
                <div class="form-group">
                    <label>Pais de origen</label>
                    <input required name="pais_origen" type="text" class="form-control" id="pais_origen">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2" id="boton-guardar">Guardar</button>
    </form>
</main>

<script src="js/mayMarcas.js"></script>

    
    <ul class="list-group">
        <?php foreach ($marcas as $marca) { ?> 
            <li class="list-group-item marcas">
                <div>
                    <b><?php echo $marca->nombre_marca . "|" . $marca->importador . "|" . $marca->pais_origen; ?></b>
                </div>
                <div class="actions">
                    <a href="productos-marca/<?php echo urlencode($marca->nombre_marca); ?>" type="button" class="btn btn-primary ml-auto">Ver Productos</a>
                    <a href="formModificar-marca/<?php echo $marca->id; ?>" type="button" class="btn btn-success ml-auto">Modificar</a> 
                    <a href="eliminar/<?php echo $marca->nombre_marca; ?>" type="button" class="btn btn-danger ml-auto">Borrar</a>
                </div>
            </li>
        <?php } ?>
    </ul>

    <?php
        require_once "templates/footer.php";
    }

    function ProductosPorMarca($nombre_marca){
        require_once "templates/header.php";

        echo "<h2>Productos de la marca: $nombre_marca</h2>";

        
        
    }


    function recorridoPPM($productos){
        echo "<ul class='list-group'>";
        foreach ($productos as $producto) {
            echo "
                <li class='list-group-item'>
                    <b>{$producto->marca_producto}</b> | {$producto->tipo_producto} | {$producto->modelo} | {$producto->color}
                </li>";
        }
        echo "<div><a href='/PARTE2/marcas' class='btn btn-success ml-2'>Regresar</a></div>";
        echo "</ul>";

        require_once "templates/footer.php";
    }


    function mostrarError(){
        echo "<div class='alert alert-info'>No hay productos disponibles para esta marca.
        <a href='/PARTE2/marcas' class='btn btn-success ml-2'>Regresar</a>
       </div>";
    }


    //AÑADIR
    function errorInsertarMarca(){
        echo "
        <div class='alert alert-danger'>
            Error: No se pudo insertar la nueva marca correctamente.
            <a href='/TP_Web2/form_agregar' class='btn btn-primary ml-2'>Regresar</a>
        </div>
    ";
    }

    function errorMarcaDuplicada($nombre){
        echo "
        <div class='alert alert-danger'>
            Error: La marca '$nombre' ya existe. No se puede agregar una marca duplicada.
            <a href='marcas' class='btn btn-success ml-2'>Regresar</a>
        </div>
    ";
    }

    function redireccionar(){
        header('Location: /PARTE2/marcas');
    }
    //FIN DE AÑADIR

    
    function mostrarModificarMarca($idmarca){  
        require_once "templates/header.php";
        ?>
        <main>
    <?php echo "<h2> Marca: $idmarca->nombre_marca </h2>"; ?>
    <form action="/PARTE2/modificar-marca" method="POST" class="my-4" id="formulario">

        <input type="hidden" name="idmarca" value="<?= $idmarca->id ?>">
        <div class="row">  
            <div class="col-9">
                <div class="form-group">
                    <label>Importador</label>
                    <input required name="importador-nuevo" type="text" class="form-control" id="importador" value="<?= $idmarca->importador ?>">
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label>País de origen</label>
                    <input required name="pais_origen-nuevo" type="text" class="form-control" id="pais_origen" value="<?= $idmarca->pais_origen ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-2">Modificar</button>
        </div>
    </form>
</main>
<?php
  require_once "templates/footer.php";

    }
}
?>