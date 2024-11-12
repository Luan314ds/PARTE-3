<?php
class ProductoView {

    function mostrarProductos($productos, $marcas){
        require_once "templates/header.php";
        //TRAER EL FORM
        ?>
        <main>
            <form action="agregar-prod" method="POST" class="my-4" id="formulario">
                <div class="row">
                    <!-- Marca del Producto -->
                    <div class="col-9">
                        <div class="form-group">
                            <label for="marca_producto">Marca del Producto</label>
                            <select required name="marca_producto" class="form-control" id="marca_producto">
                                <option value="">Seleccione una marca</option>
                                <?php
                                    // Aquí generamos las opciones con las marcas pasadas como argumento
                                    foreach ($marcas as $marca) {
                                        echo "<option value='{$marca->nombre_marca}'>{$marca->nombre_marca}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Tipo de Producto -->
                    <div class="col-9">
                        <div class="form-group">
                            <label for="tipo_producto">Tipo de Producto</label>
                            <input required name="tipo_producto" type="text" class="form-control" id="tipo_producto">
                        </div>
                    </div>

                    <!-- Modelo del Producto -->
                    <div class="col-9">
                        <div class="form-group">
                            <label for="modelo">Modelo del Producto</label>
                            <input required name="modelo" type="text" class="form-control" id="modelo">
                        </div>
                    </div>

                    <!-- Color del Producto -->
                    <div class="col-9">
                        <div class="form-group">
                            <label for="color">Color del Producto</label>
                            <input required name="color" type="text" class="form-control" id="color">
                        </div>
                    </div>

                    <!-- Descripción del Producto -->
                    <div class="col-9">
                        <div class="form-group">
                            <label for="descripcion">Descripción del Producto</label>
                            <input required name="descripcion" type="text" class="form-control" id="descripcion">
                        </div>
                    </div>
                </div>

                <!-- Botón de Guardar -->
                <button type="submit" class="btn btn-primary mt-2" id="boton-guardar">Guardar</button>
            </form>
        </main>
        <?php
        
        ?>
        <ul class="list-group">
            <?php foreach ($productos as $producto) { ?> 
                <li class="list-group-item marcas">
                    <div>
                        <b><?php echo $producto->marca_producto . "|" . $producto->tipo_producto . "|" . $producto->modelo . "|" . $producto->color; ?></b>
                    </div>
                    <div class="actions">
                        <a href="producto/<?php echo $producto->id_productos; ?>" type="button" class="btn btn-primary ml-auto">Ver Producto</a>
                        <a href="formModificar-producto/<?php echo $producto->id_productos; ?>" type="button" class="btn btn-success ml-auto">Modificar</a> 
                        <a href="eliminar-prod/<?php echo $producto->id_productos; ?>" type="button" class="btn btn-danger ml-auto">Borrar</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <?php
        require_once "templates/footer.php";
    }

    function mostrarProductoId($producto){

        require_once "templates/header.php";
        
        ?>
        <div class="product-details">
            <h2>Detalles del Producto</h2>
            <p><strong>Marca:</strong> <?php echo($producto->marca_producto); ?></p>
            <p><strong>Tipo:</strong> <?php echo($producto->tipo_producto); ?></p>
            <p><strong>Modelo:</strong> <?php echo($producto->modelo); ?></p>
            <p><strong>Color:</strong> <?php echo($producto->color); ?></p>
            <p><strong>Descripción:</strong> <?php echo($producto->descripcion_producto); ?></p>
        </div>
        <?php
        echo "<div><a href='/PARTE2/productos' class='btn btn-success ml-2'>Regresar</a></div>";
        require_once "templates/footer.php";
    }

    function modificarFormProducto($idproducto){
        require_once "templates/header.php";

?>
        <main>
    <?php echo "<h2> Marca: $idproducto->marca_producto </h2>"; ?>
    <form action="/PARTE2/modificar-producto" method="POST" class="my-4" id="formulario">

        <input type="hidden" name="idproducto" value="<?= $idproducto->id_productos ?>">
        <div class="row">  
            <div class="col-9">
                <div class="form-group">
                    <label>Tipo de Producto</label>
                    <input required name="tipo-productoNuevo" type="text" class="form-control" id="tipo-productoNuevo" value="<?= $idproducto->tipo_producto ?>">
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label>Modelo del Producto</label>
                    <input required name="modeloNuevo" type="text" class="form-control" id="modeloNuevo" value="<?= $idproducto->modelo ?>">
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label>Color del Producto</label>
                    <input required name="colorNuevo" type="text" class="form-control" id="colorNuevo" value="<?= $idproducto->color ?>">
                </div>
            </div>

            <div class="col-9">
                <div class="form-group">
                    <label>Descripción del Producto</label>
                    <input required name="descripcionNueva" type="text" class="form-control" id="descripcionNueva" value="<?= $idproducto->descripcion_producto ?>">
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-2">Modificar</button>
        </div>
    </form>
</main>

<?php

        require_once "templates/footer.php";
    }

    function mostrarerror(){
        echo "No se pudo insertar el producto correctamente.";
    }

    function redireccionar(){
        header('Location: /PARTE2/productos');
    }

 
}
?>
