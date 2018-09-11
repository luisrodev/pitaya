function cargarProveedores(){
    console.log("Cargar proveedores");

    $.ajax({
        url: 'http://localhost/pitaya/proveedores/getProveedores',
        type: 'get',
        dataType: 'json',
        success: function(response){
            
            console.log(response);


            var echtiemel = "";

            var data = response;
            

            for(var i = 0; i < data.length; i++){
                echtiemel += `<tr>
                <th scope="row">${data[i].idproveedor}</th>
                <td>${data[i].nombre}</td>
                <td>${data[i].ciudad}</td>
                <td>${data[i].estado}</td>
                <td>${data[i].telefono}</td>
                <td>${(data[i].active == 1)? "Activo": "Inactivo"}</td>
                <td>${data[i].fecha_creacion}</td>
                <td>${data[i].nombre_tipo}</td>
                <td>
                    <button type="button" onclick="eliminarProveedor(${data[i].idproveedor})" class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                    <button onclick="displayEditarProveedor('${data[i].idproveedor}', '${data[i].nombre}', '${data[i].ciudad}', '${data[i].estado}', '${data[i].telefono}', '${data[i].active}', '${data[i].con_nombre}', '${data[i].con_email}', '${data[i].con_telefono}', '${data[i].con_extension}', '${data[i].nombre_tipo}')" type="button" class="btn btn-outline-success">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </td>
                <td>
                    <button type="button" onclick="displayInfo('${data[i].con_nombre}', '${data[i].con_email}', '${data[i].con_telefono}', '${data[i].con_extension}', '${data[i].nombre_usuario_peticion}', '${data[i].nombre_usuario_autorizo}')" class="btn btn-outline-success">
                        <i class="fas fa-info-circle"></i>
                         Detalles
                    </button>
                </td>
                </tr>
                `
            }

            //     echtiemel += `</ul>`;

            // }

            //Se hace append
            $('#tablaProveedores').html(echtiemel);






            console.log(response);
        },
        error: function(err){
            console.log(err);
        }
    })
}

function cargarTiposProveedores(tipo){
    var res;
    $.ajax({
        url: 'http://localhost/pitaya/proveedorestipo/getTiposActivos',
        type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response);
            res = response;
            var echtiemel = ``;

            for(var i = 0; i < response.length; i++){
                echtiemel += `<option ${(tipo == response[i].nombre)? 'selected="selected"':''} value="${response[i].idtipo_proveedor}">${response[i].nombre}</option>`;
            }
            $('#tipoUpdateProveedor').html(echtiemel);
        },
        error: function(err){
            console.log(err);
        }
    })

    return res;
}

function displayEditarProveedor(idproveedor, nombre, ciudad, estado, telefono, active, con_nombre, con_email, con_telefono, con_extension, tipo){
    //console.log(cargarTiposProveedores());
    var echtiemel = "";
    // console.log(id);

    echtiemel += `

    <div class="modal" id="modificarProveedorModal" tabindex="-1" role="dialog" aria-labelledby="modificarProveedorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modificarProveedorModalLabel">Modificar Proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombreUpdateProveedor">Nombre</label>
                    <input value="${nombre}" type="text" id="nombreUpdateProveedor" class="form-control" name="nombre">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ciudadUpdateProveedor">Ciudad</label>
                    <input value="${ciudad}" type="text" id="ciudadUpdateProveedor" class="form-control" name="username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estadoUpdateProveedor">Estado</label>
                    <input value="${estado}" type="text" id="estadoUpdateProveedor" class="form-control" >
                </div>
            </div>
        </div>


        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonoUpdateProveedor">Número Telefónico</label>
                    <input value="${telefono}" type="number" id="telefonoUpdateProveedor" class="form-control" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipoUpdateProveedor">Tipo Proveedor</label>
                    <select class="form-control" name="rol" id="tipoUpdateProveedor">
                        
                    

                    </select>
                    
                </div>
            </div>

            
        </div>

        


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombreContactoUpdateProveedor">Nombre Contacto</label>
                    <input value="${con_nombre}" type="text" id="nombreContactoUpdateProveedor" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailContactoUpdateProveedor">Email Contacto</label>
                    <input value="${con_email}" type="text" id="emailContactoUpdateProveedor" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonoContactoUpdateProveedor">Telefono Contacto</label>
                    <input value="${con_telefono}" type="text" id="telefonoContactoUpdateProveedor" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="extensionContactoUpdateProveedor">Extension Contacto</label>
                    <input value="${con_extension}" type="text" id="extensionContactoUpdateProveedor" class="form-control">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-check">
                    <input ${(active == 1)? "checked": ""} type="checkbox" class="form-check-input" id="checkActivoUpdateProveedor">
                    <label class="form-check-label" for="checkActivoUpdateProveedor">Activo</label>
                </div>
            </div>
        </div>

            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button onclick="editarProveedor('${idproveedor}')" type="button" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar</button>
        </div>
        </div>
    </div>
    </div>



    `;

    //Se hace append
    $('#modalUpdateProveedor').html(echtiemel);
    cargarTiposProveedores(tipo);
    $('#modificarProveedorModal').modal();
}

function displayInfo(con_nombre, con_email, con_telefono, con_extension, nombre_usuario_peticion, nombre_usuario_autorizo){

    var echtiemel = "";
    

    echtiemel += `

    <div class="modal" id="infoProveedorModal" tabindex="-1" role="dialog" aria-labelledby="modificarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
        <div class="modal-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span class="h4">Datos Contacto</span>
            </li>
            <li class="list-group-item">
            
                <p class="h6">Nombre: ${con_nombre}</p>
                <p class="h6">Email: ${con_email}</p>
                <p class="h6">Telefono: ${con_telefono}</p>
                <span class="h6">Extensión: ${con_extension}</span>
            </li>
            <li class="list-group-item">
                <span class="h4">Datos Petición</span>
            </li>
            <li class="list-group-item">
                <p class="h6">Usuario Petición: ${nombre_usuario_peticion}</p>
                <span class="h6">Usuario Autorizó: ${nombre_usuario_autorizo}</span>
            </li>
        </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>



    `;

    //Se hace append
    $('#modalInformacionExtra').html(echtiemel);
    $('#infoProveedorModal').modal();

}

function agregarProveedor(){
    //TODO: Estaba haciendo esta parte, ya tengo los input del nuevo proveedor solo falta verificarlos bien y agregar otros puntos que son los datos de contacto.

    var _nombre = $('#nombreProveedor').val();
    var _ciudad = $('#ciudadProveedor').val();
    var _estado = $('#estadoProveedor').val();
    var _telefono = $('#telefonoProveedor').val();
    var _activo = $('#checkActivoProveedor').prop('checked');
    var _nombre_con = $('#nombreContactoProveedor').val();
    var _email_con = $('#emailContactoProveedor').val();
    var _telefono_con = $('#telefonoContactoProveedor').val();
    var _extension_con = $('#extensionContactoProveedor').val();
    var _tipo = $('#tipoProveedor').val();

    $.ajax({
        url: 'http://localhost/pitaya/proveedores/agregarProveedor',
        type: 'post',
        dataType: 'json',
        data: {
            nombre: _nombre,
            ciudad: _ciudad,
            estado: _estado,
            telefono: _telefono,
            fk_tipo: _tipo,
            con_nombre: _nombre_con,
            con_email: _email_con,
            con_telefono: _telefono_con,
            con_extension: _extension_con,
            active: _activo
        },
        success: function(response){
            console.log(response);

            if(response.ok){
                console.log("Si se agrego");
                $('#agregarProveedorModal').modal('hide');
                clearInputs();
                cargarProveedores();
            }else{
                console.log("No se pudo agregar");
            }
        },
        error: function(err){
            console.log(err);
        }
    })

    
}

function editarProveedor(id){
    console.log("Quieres editar el proveedorcon ID: "+ id);
    var _nombre = $('#nombreUpdateProveedor').val();
    var _ciudad = $('#ciudadUpdateProveedor').val();
    var _estado = $('#estadoUpdateProveedor').val();
    var _telefono = $('#telefonoUpdateProveedor').val();
    var _tipo = $('#tipoUpdateProveedor').val();
    var _con_nombre = $('#nombreContactoUpdateProveedor').val();
    var _con_email = $('#emailContactoUpdateProveedor').val();
    var _con_telefono = $('#telefonoContactoUpdateProveedor').val();
    var _con_extension = $('#extensionContactoUpdateProveedor').val();
    var _active = $('#checkActivoUpdateProveedor').prop('checked');


    $.ajax({
        url: 'http://localhost/pitaya/proveedores/editarProveedor',
        type: 'post',
        dataType: 'json',
        data: {
            id,
            nombre: _nombre,
            ciudad: _ciudad,
            estado: _estado,
            telefono: _telefono,
            con_nombre: _con_nombre,
            con_email: _con_email,
            con_telefono: _con_telefono,
            con_extension: _con_extension,
            active: _active,
            tipo: _tipo
        },
        success: function(response){
            console.log(response);

            if(response){
                $('#modificarProveedorModal').modal('hide');
                cargarProveedores();
            }
        },
        error: function(err){
            console.log(err);
        }
    })

}

function eliminarProveedor(idProveedor){

    $.ajax({
        url: 'http://localhost/pitaya/proveedores/eliminarProveedor',
        type: 'post',
        dataType: 'json',
        data: {
            id: idProveedor
        },
        success: function(response){
            console.log(response);
            if(response)
                cargarProveedores();
        },
        error: function(err){
            console.log(err);
        }

    })

}

function clearInputs(){
    // $('#nombreProveedor').val('');
    // $('#username').val('');
    // $('#password').val('');
    // $('#email').val('');
    // $('#rol option[value="administrador"]').attr('selected', true);
    // $('#checkActivo').prop('checked');


    $('#nombreProveedor').val('');
    $('#ciudadProveedor').val('');
    $('#estadoProveedor').val('');
    $('#telefonoProveedor').val('');
    $('#checkActivoProveedor').prop('checked');
    $('#nombreContactoProveedor').val('');
    $('#emailContactoProveedor').val('');
    $('#telefonoContactoProveedor').val('');
    $('#extensionContactoProveedor').val('');
    // $('#tipoProveedor option[value="Cableado"]').attr('selected', true);
}

cargarProveedores();