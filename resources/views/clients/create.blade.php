
    <h1>Crear</h1>
    <h5>Formulario para crear Clientes</h5>
    <hr>
    <form action="#" method="POST" id="frmSaveData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="col">
            <label>Edad</label>
            <input type="text" name="edad" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Categoria</label>
            <select name="categoria" class="form-select">
                <option value="">--Seleccionar categoria--</option>
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

