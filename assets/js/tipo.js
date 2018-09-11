function cargarTipos(){
    console.log("cargar tipos");

    $.ajax({
        url: 'http://localhost/pitaya/proveedorestipo/getData',
        type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response);

            var echtiemel = "";

            for(var i = 0; i <response.length; i++){
                echtiemel += `<tr>
                <th scope="now">${response[i].idtipo_proveedor}</th>
                <td>${response[i].nombre}</td>
                <td>${(response[i].active == 1)? "Activo": "Inactivo"}</td>

                <td>
                <button type="button" onclick="eliminarTipo(${response[i].idtipo_proveedor})" class="btn btn-outline-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>

                <button onclick="displayEditar('${response[i].idtipo_proveedor}', '${response[i].nombre}', '${response[i].active}')" type="button" class="btn btn-outline-success">
                    <i class="fas fa-pencil-alt"></i>
                </button>

                </td>
                
                </tr>`;
            }

            $('#tablaTiposProveedores').html(echtiemel);

        },
        error: function(err){
            console.log(err);
        }
    })


}

function displayEditar(id, nombre, activo){
    console.log("Midificar Usuario Modal");

    var echtiemel = "";
    console.log(id);

    echtiemel += `

    <div class="modal" id="modificarTipoModal" tabindex="-1" role="dialog" aria-labelledby="modificarTipoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modificarModalLabel">Modificar Tipo Proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="updateNombreTipo">Nombre</label>
                        <input value="${nombre}" type="text" id="updateNombreTipo" class="form-control" name="nombre">
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-check">
                        <input ${(activo == 1)? "checked": ""} type="checkbox" class="form-check-input" id="updatecheckActivoTipo">
                        <label class="form-check-label" for="updatecheckActivoTipo">Activo</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button onclick="editarTipo('${id}')" type="button" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar </button>
        </div>
        </div>
    </div>
    </div>



    `;

    //Se hace append
    $('#modalUpdateTipo').html(echtiemel);
    $('#modificarTipoModal').modal();


}

function eliminarTipo(id){
    console.log('Eliminar Usuario');
    $.ajax({
        url: 'http://localhost/pitaya/proveedorestipo/eliminarTipo',
        type: 'post',
        dataType: 'json',
        data: {
            id
        },
        success: function(response){
            console.log(response);

            if(response){
                cargarTipos();
            }

        },
        error: function(err){
            console.log(err);

        }
    })
}

function editarTipo(id){
    console.log("editar tipo con id: " + id);
    var _nombre = $('#updateNombreTipo').val();
    var _active = $('#updatecheckActivoTipo').prop('checked');

    $.ajax({
        url: 'http://localhost/pitaya/proveedorestipo/updateTipo',
        type: 'post',
        dataType: 'json',
        data: {
            id,
            nombre: _nombre,
            active: _active
        },
        success: function(response){
            console.log(response);

            $('#modificarTipoModal').modal('hide');
            cargarTipos();

        },
        error: function(err){
            console.log(err);
        }
    })

}

function clearInputs(){
    $('#nombreTipo').val('');
    $('#checkActivoTipo').prop('checked');
}

function agregarTipo(){
    var _nombre = $('#nombreTipo').val();
    var _active = $('#checkActivoTipo').prop('checked');
    console.log(_nombre);
    $.ajax({
        url: 'http://localhost/pitaya/proveedorestipo/agregarTipo',
        type: 'post',
        dataType: 'json',
        data: {
            nombre: _nombre,
            active: _active
        },
        success: function(response){
            console.log(response);
            clearInputs();
            $('#agregarTipoModal').modal('hide');
            cargarTipos();
        },
        error: function(err){
            console.log(err);
        }
    })
}

cargarTipos();