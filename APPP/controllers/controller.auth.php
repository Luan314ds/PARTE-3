<?php
require_once "./APPP/models/model.usuarios.php";
require_once "./APPP/views/view.auth.php";

class AutenticacionController{
    private $model;
    private $view;


    function __construct(){
        $this->model = new UsuariosModel;
        $this->view = new AutenticacionView;
    }

    function mostrarLogin(){

        $this->view->MostrarLogin();
    }

    public function login(){
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->MostrarLogin('Falta completar el usuario');
        }
        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            return $this->view->MostrarLogin('Falta completar la contraseña');
        }

        $nombre =$_POST['nombre'];
        $contraseña= $_POST['contraseña'];

        $usuarioBD =  $this->model->ObtenerUsuario($nombre);


        if ($usuarioBD && password_verify($contraseña,$usuarioBD->contraseña)) {

            session_start();
            $_SESSION['ID_USER'] = $usuarioBD->id_login;
            $_SESSION['NOMBRE_USER'] = $usuarioBD->nombre;
            $_SESSION['LAST_ACTIVITY'] = time();

            header('Location:' . BASE_URL . 'productos');
        }

        //CAMBIO CHAT GPTttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt
        else {
            return $this->view->MostrarLogin('Credenciales incorrectas');
            // exit(); // Detenemos el flujo para evitar que se siga ejecutando
        }
        
    }

    public function desloguearse(){
        session_start();
        session_destroy();

        //AL QUERER IR A MARCAS, Y NO ENCONTRAR EL USUARIO YA QUE LO DESTRUI
        //ME REDIRIJE A MOSTRARLOGIN
        header('Location:' . BASE_URL . 'marcas');
    }
}

?>
