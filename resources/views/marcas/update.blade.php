<form action="/marcas/{{$marca->codigo}}" method="POST" id="frmUpdateData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{$marca->nombre}}" class="form-control">
            <span class="invalid-feedback d-block" key="nombre" role="alert">
                <strong class="mensaje"></strong>
            </span>
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
