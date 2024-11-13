<?php
require_once "./APPP/views/view.inicio.php";



class InicioController{

    private $view;


       public function __construct($res){
        $this-> view = new InicioView($res->usuario);
    }

function mostrarInicio(){
    $this->view->inicio();
}

  
}
?>