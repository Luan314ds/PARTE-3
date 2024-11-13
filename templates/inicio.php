<?php
function mostrarInicio(){
    echo password_hash('admin', PASSWORD_DEFAULT);
    require_once "templates/header.php";
    
    echo '<img src="relacion.png" alt="Relacion 1 a N" style="max-width: 100%; height: auto;">';
    
    require_once "templates/footer.php";
}
?>
