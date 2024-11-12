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

    function login(){

        if (!isset($_POST['usuario']) || empty($_POST['usuario'])) {
            $this->view->mostrarerror('Falta completar el usuario');
        }
        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            $this->view->mostrarerror('Falta completar la contraseña');
        }

        $usuario =$_POST['usuario'];
        $contraseña= $_POST['contraseña'];

        $usuarioBD =  $this->model->ObtenerUsuario($usuario);


        if (password_verify($contraseña,$usuarioBD->contraseña)) {

            session_start();
            $_SESSION['ID_USER'] = $usuarioBD->id;
            $_SESSION['NOMBRE_USER'] = $usuarioBD->nombre;
            $_SESSION['LAST_ACTIVITY'] = time();

            header('Location: /PARTE2/marcas');
        }

        else{
            
            $this->view->mostrarerror('Credenciales incorrectas');
        }

        
        header('Location: /PARTE2/marcas');
    }
}
