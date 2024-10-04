<?php
require_once "./app/db.php";

function mostrarProductos(){
    require_once "templates/header.php";
    $productos = ObtenerProductos();

    ?>

<ul class="list-group">
   <?php foreach($productos as $producto){ ?> 
        <li class="list-group-item">
        <b><?php echo $producto->id_productos. "  |".$producto->id_marca. "(IDMARCA)|".$producto->tipo_producto. "|" .$producto->modelo. "|" .$producto->color ?> </li></b>;
     <?php } ?>
</ul>

<?php

}




// function mostrarProducto($id_productos){
//    require_once "templates/header.php";
   
//    $producto = ObtenerProductosId($id_productos);
   
// }

?>