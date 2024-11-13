<?php
include_once "./APPP/models/model.producto.php";
include_once "./APPP/models/model.marca.php";
include_once "./APPP/views/view.producto.php";

class ProductoController{
    private $model;
    private $modelMARCA;
    private $view;

    function __construct($res){
        $this-> view = new ProductoView($res->usuario);
        $this-> model= new ProductoModel();
        $this-> modelMARCA= new MarcaModel();
    }

    function MOSTRARPRODUCTOS() {

        $productos = $this->model->ObtenerProductos();
        $marca = $this->modelMARCA->ObtenerMarcas();

        $this->view->mostrarProductos($productos, $marca);


    }

    function mostrarProducto($id) {
        $producto = $this->model->obtenerProductoPorId($id);

        $this->view->mostrarProductoId($producto);


    }
    

  
    function añadirProductos() {
    
        $marcaproducto = $_POST['marca_producto'];
        $tipoproducto = $_POST['tipo_producto'];
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];
        $descripcion = $_POST['descripcion'];
    
        $id = $this->model->insertoProductos($marcaproducto, $tipoproducto, $modelo, $color, $descripcion);
        if ($id) {
            $this->view->redireccionar();
        // ¿HAY QUE PONER DIE()? MIRARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
        } else {
            $this->view->mostrarerror();
        }

    }

    function removerProducto($id) {
        $this->model->eliminarProducto($id);
        $this->view->redireccionar();
    }

    function mostrarFormModificarProducto($id) {
    
        $idproducto = $this->model->obtenerIDproducto($id);

        $this->view->modificarFormProducto($idproducto);

       
    }
    
    function modificarProducto() {
        $id = $_POST['idproducto'];
        $tipoproducto = $_POST['tipo-productoNuevo'];
        $modelo = $_POST['modeloNuevo'];
        $color = $_POST['colorNuevo'];
        $descripcion = $_POST['descripcionNueva'];
    
        $this->model->cambioValoresProducto($id, $tipoproducto, $modelo, $color, $descripcion);
        $this->view->redireccionar();
    }



    

    
}
?>