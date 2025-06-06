
    <h1>Crear</h1>
    <h5>Formulario para crear productos</h5>
    <hr>
    <form action="#" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="col">
            <label>Precio</label>
            <input type="text" name="precio" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Marca</label>
            <select name="marca" class="form-select">
                <option value="">--Seleccionar marca--</option>
            </select>
        </div>
    </div>
    <hr>
    <div class="row text-center">
        <div class="col">
            <button type="submit" class="btn btn-lg btn-success">
                Guardar
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal">
                Cancelar
            </button>
        </div>
    </div>
</form>

