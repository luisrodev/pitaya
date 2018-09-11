function cargarProveedores(){
    console.log("Cargar proveedores para la busqueda");

    $.ajax({
        url: 'http://localhost/pitaya/busqueda/getProveedores',
        type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response);

            var echtiemel = "";


            for(var i = 0; i < response.length; i++){
                echtiemel += `<tr>
                <th scope="row">${response[i].idproveedor}</th>
                <td>${response[i].nombre}</td>
                <td>${response[i].ciudad}</td>
                <td>${response[i].estado}</td>
                <td>${response[i].telefono}</td>
                <td>${response[i].nombre_tipo}</td>
                <td>
                    <button type="button" onclick="solicitarBaja(${response[i].idproveedor})" class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                        Solicitar Baja
                    </button>
                <td>
                    <button type="button" onclick="displayInfo('${response[i].con_nombre}', '${response[i].con_email}', '${response[i].con_telefono}', '${response[i].con_extension}')" class="btn btn-outline-success">
                        <i class="fas fa-info-circle"></i>
                         Contacto
                    </button>
                </td>
                </tr>
                `
            }

            $('#tablaProveedoresBusqueda').html(echtiemel);
        },
        error: function(err){console.log(err);}
    })
}

function displayInfo(con_nombre, con_email, con_telefono, con_extension){
    var echtiemel = "";
    

    echtiemel += `

    <div class="modal" id="infoContactoModal" tabindex="-1" role="dialog" aria-labelledby="infoContactoModalLabel" aria-hidden="true">
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
    $('#modalInformacionExtraProveedorBusqueda').html(echtiemel);
    $('#infoContactoModal').modal();
}

function searchProveedor(){
    var cond = $('#busquedaNombreProveedor').val();

    $.ajax({
        url: 'http://localhost/pitaya/busqueda/searchProveedor',
        type: 'post',
        dataType: 'json',
        data: {cond},
        success: function(response){
            console.log(response);

            var echtiemel = "";


            for(var i = 0; i < response.length; i++){
                echtiemel += `<tr>
                <th scope="row">${response[i].idproveedor}</th>
                <td>${response[i].nombre}</td>
                <td>${response[i].ciudad}</td>
                <td>${response[i].estado}</td>
                <td>${response[i].telefono}</td>
                <td>${response[i].nombre_tipo}</td>
                <td>
                    <button type="button" onclick="displayInfo('${response[i].con_nombre}', '${response[i].con_email}', '${response[i].con_telefono}', '${response[i].con_extension}')" class="btn btn-outline-success">
                        <i class="fas fa-info-circle"></i>
                         Contacto
                    </button>
                </td>
                </tr>
                `
            }

            $('#tablaProveedoresBusqueda').html(echtiemel);

        },
        error: function(err){console.log(err);}
    })

}

function solicitarAlta(){
    var _nombre = $('#nombreAltaProveedor').val();
    var _ciudad = $('#ciudadAltaProveedor').val();
    var _estado = $('#estadoAltaProveedor').val();
    var _telefono = $('#telefonoAltaProveedor').val();
    var _nombre_con = $('#nombreAltaContactoProveedor').val();
    var _email_con = $('#emailAltaContactoProveedor').val();
    var _telefono_con = $('#telefonoAltaContactoProveedor').val();
    var _extension_con = $('#extensionAltaContactoProveedor').val();
    var _tipo = $('#tipoAltaProveedor').val();
    var _razon = $('#razonAltaProveedor').val();

    $.ajax({
        url: 'http://localhost/pitaya/solicitudes/agregarSolicitud',
        type: 'post',
        dataType: 'json',
        data: {
            nombre: _nombre,
            ciudad: _ciudad,
            estado: _estado,
            telefono: _telefono,
            con_nombre: _nombre_con,
            con_email: _email_con,
            con_telefono: _telefono_con,
            con_extension: _extension_con,
            razon: _razon,
            tipo_proveedor: _tipo,
        },
        success: function(response){
            console.log(response);

            if(response.ok){
                console.log("Si se agrego");
                $('#agregarSolicitudProveedorModal').modal('hide');
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

function solicitarBaja(id){
    console.log('Se quiere solicitar la  baja del id: ' + id);
    //TODO: Guardar los datos en la base de datos de una peticion de baja en solicitudes.
}

function clearInputs(){
    // $('#nombreProveedor').val('');
    // $('#username').val('');
    // $('#password').val('');
    // $('#email').val('');
    // $('#rol option[value="administrador"]').attr('selected', true);
    // $('#checkActivo').prop('checked');


    $('#nombreAltaProveedor').val('');
    $('#ciudadAltaProveedor').val('');
    $('#estadoAltaProveedor').val('');
    $('#telefonoAltaProveedor').val('');
    $('#nombreAltaContactoProveedor').val('');
    $('#emailAltaContactoProveedor').val('');
    $('#telefonoAltaContactoProveedor').val('');
    $('#extensionAltaContactoProveedor').val('');
    $('#razonAltaProveedor').val('');
    // $('#tipoAltaProveedor').val('');
    // $('#tipoProveedor option[value="Cableado"]').attr('selected', true);
}

cargarProveedores();