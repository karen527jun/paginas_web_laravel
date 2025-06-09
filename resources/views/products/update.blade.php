
    <form action="/products/{{$producto->codigo}}" method="POST" id="frmUpdateData">
    <div class="row">
        <div class="col">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{$producto->nombre}}" class="form-control">
            <span class="invalid-feedback d-block" key="nombre" role="alert">
                <strong class="mensaje"></strong>
            </span>
        </div>
        <div class="col">
            <label>Precio</label>
            <input type="text" name="precio" value="{{$producto->precio}}" class="form-control">
            <span class="invalid-feedback d-block" key="precio" role="alert">
                <strong class="mensaje"></strong>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Marca</label>
            <select name="marca" class="form-select" >
                <option value="">--Seleccionar marca--</option>
                @foreach ($marcas as $marca)
                <option value="{{$marca->codigo}}" {{ ($marca->codigo == $producto->marca) ? 'selected':''}}>{{$marca->nombre}}</option>
                @endforeach
            </select>
            <span class="invalid-feedback d-block" key="marca" role="alert">
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

