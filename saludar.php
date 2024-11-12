<?php

function saludar(){

    if (!isset( $_SESSION['NombreUsuario'])) {
        echo "No estas autenticado";
    }else{
        session_start();

    echo "Hola, ". $_SESSION["NombreUsuario"];
    }
    
}
