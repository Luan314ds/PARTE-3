<main>
<form action="agregar" method="POST" class="my-4" id="formulario">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre</label>
                <input required name="nombre" type="text" class="form-control">
            </div>
        </div>
        
        <div class="col-9">
            <div class="form-group">
                <label>Importador</label>
                <input required name="importador" type="text" class="form-control">
            </div>
        </div>
        
        <div class="col-9">
            <div class="form-group">
                <label>Pais de origen</label>
                <input required name="pais_origen" type="text" class="form-control">
            </div>
        </div>
    <button type="submit" class="btn btn-primary mt-2" id="boton-guardar">Guardar</button>
</form>
</main>