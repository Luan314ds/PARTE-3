<?php
require_once "./APPP/models/model.marca.php";
require_once "./APPP/views/view.json.php";



class MarcaApiController{

    private $model;
    private $view;


       public function __construct(){
        $this-> model = new MarcaModel;
        $this-> view = new JSONView();
    }

    public function mostrarTodo($req, $res) {
       
        $marcas = $this->model->ObtenerMarcas();

        return $this->view->response($marcas);
     
    }
 
    public function mostrar($req, $res) {


        //VER ID
        $id = $req->params->marca_producto;

    
        $productos = $this->model->obtenerProductosPorMarca($id);

        
        return $this->view->response($productos);
    
    }
  
}
?>