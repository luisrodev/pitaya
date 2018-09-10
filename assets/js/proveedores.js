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

                    <button onclick="displayEditarProveedor('${data[i].idusuario}', '${data[i].nombre}', '${data[i].username}', '${data[i].email}', '${data[i].rol}', '${data[i].active}', '${response.rol}')" type="button" class="btn btn-outline-success">
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

function displayEditarProveedor(){

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
        },
        error: function(err){
            console.log(err);
        }
    })

    
}

function editarProveedor(){

}

function eliminarProveedor(){

}

function clearInputs(){

}

cargarProveedores();