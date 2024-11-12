<?php
function auth(){
    session_start();
    $_SESSION['NombreUsuario'] = 'webadmin';
    $_SESSION['contraseña'] = 'admin';
    $_SESSION['Rol'] = 'ADMIN';
    
    echo "Autenticado";
}
