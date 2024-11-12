<?php

function middlewaresesion($res){
    session_start();
if(isset($_SESSION['ID_USER'])){
    $res->usuarios = new stdClass();
    $res->usuarios->id = $_SESSION['ID_USER'];
    $res->usuarios->nombre = $_SESSION['NOMBRE_USER'];    
    return;
} else{
    header('Location: /PARTE2/mostrarlogin');
}
}
?>