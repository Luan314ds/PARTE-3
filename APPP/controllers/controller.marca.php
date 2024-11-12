<?php
require_once "./APPP/models/model.marca.php";
require_once "./APPP/views/view.marca.php";



class MarcaController{

    private $model;
    private $view;


       public function __construct($res){
        $this-> model = new MarcaModel;
        $this-> view = new MarcaView($res->usuarios);
    }

    function mostrarMarcas() {
       
        $marcas = $this->model->ObtenerMarcas();

        $this->view->vistamarcas($marcas);
     
    }



    function productosPorMarca($nombre_marca) {

        $this->view->ProductosPorMarca($nombre_marca);
    
        $productos = $this->model->obtenerProductosPorMarca($nombre_marca);
    
        if (!empty($productos)) {
            $this->view->recorridoPPM($productos);
     
        } else {
            $this->view->mostrarError();
        }
    
    }

    
function añadirMarcas() {


    $nombre = $_POST['nombre'];
    $importador = $_POST['importador'];
    $paisorigen = $_POST['pais_origen'];

    if ($this->model->existeMarca($nombre)) {
        $this->view->errorMarcaDuplicada($nombre);
    } else {
        $id =$this->model-> insertoMarcas($nombre, $importador, $paisorigen);

        if ($id) {
            $this->view->redireccionar();
        } else {
            $this->view->errorInsertarMarca();
        }
    }

}

function removerMarca($nombre_marca) {
    $this->model->eliminarMarca($nombre_marca);
    $this->view->redireccionar();
}

function modificarMarca() {
    $id = $_POST['idmarca'];
    $importador = $_POST['importador-nuevo'];
    $paisOrigen = $_POST['pais_origen-nuevo'];

    $this->model->cambioValoresMarca($id, $importador, $paisOrigen);
    $this->view->redireccionar();
}

function mostrarFormModificarMarca($id) {
    $idmarca =$this->model-> obtenerIDmarca($id);

    $this->view-> mostrarModificarMarca($idmarca);
  
}


  
}
?>