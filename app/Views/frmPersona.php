<form id="frm-perona">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingrese su apellido">
    </div>
    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" id="estado" class="form-control">
            <option value="activo">activo</option>
            <option value="inactivo">inactivo</option>
            <option value="suspendido">suspendido</option>
        </select>
    </div>
    <div class="form-actions">
        <button type="submit" id="btn-guardar" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary">Cancelar</button>
    </div>
</form>
<!-- <script>
    $(document).ready(function() {
        $('form').submit(function(event){
            //evitar el envio del formulario
            event.preventDefault();
            //Realizar validaciones
            
        })
    });
</script> -->