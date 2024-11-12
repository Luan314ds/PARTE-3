<form action="verificacion-inicio" method="POST" class="my-4" id="formulario">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre de Usuario</label>
                <input required name="nombre_usuario" type="text" class="form-control">
            </div>
        </div>
        
        <div class="col-9">
            <div class="form-group">
                <label>Contraseña</label>
                <input required name="contrasena" type="password" class="form-control">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-2" id="boton-guardar">Iniciar Sesión</button>
    </div>
</form>
