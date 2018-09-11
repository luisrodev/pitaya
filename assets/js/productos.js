function agregarProducto(){
    var _nombre = $('#nombreProducto').val();
    var _descripcion = $('#descripcionProducto').val();
    var _tiempo_respuesta = $('#respuestaProducto').val();
    var _capacidad_produccion = $('#produccionProducto').val();
    var _lugar_entrega = $('#entregaProducto').val();
    var _activo = $('#checkActivoProducto').prop('checked');
    var _tipo = $('#proveedorProducto').val();

    $.ajax({
        url: 'http://localhost/pitaya/productos/agregarProducto',
        type: 'post',
        dataType: 'json',
        data: {
            nombre: _nombre,
            descripcion: _descripcion,
            tiempo_respuesta: _tiempo_respuesta,
            capacidad_produccion: _capacidad_produccion,
            lugar_entrega: _lugar_entrega,
            active: _activo,
            proveedor: _tipo
        },
        success: function(response){
            console.log(response);

            if(response.ok){
                $('#agregarProductoModal').modal('hide');
                clearInputs();
                cargarProductos();
            }
        },
        error: function(err){ console.log(err); }
    })
}

function eliminarProducto(id){
    console.log(id);

    $.ajax({
        url: 'http://localhost/pitaya/productos/eliminarProducto',
        type: 'post',
        dataType: 'json',
        data: { id },
        success: function(response){
            console.log(response);
            if(response){ cargarProductos(); }
        },
        error: function(err){ console.log(err); }
    })
}

function cargarProveedores(nombreProve){
    var res;
    $.ajax({
        url: 'http://localhost/pitaya/proveedores/getProveedores',
        type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response);
            var echtiemel = ``;

            for(var i = 0; i < response.length; i++){
                echtiemel += `<option ${(nombreProve == response[i].nombre)? 'selected="selected"':''} value="${response[i].idproveedor}">${response[i].nombre}</option>`;
            }
            $('#proveedorUpdateProducto').html(echtiemel);
        },
        error: function(err){
            console.log(err);
        }
    })

    return res;

}

function displayEditarProducto(idproducto, nombre, descripcion, tiempo_respuesta, capacidad_produccion, lugar_entrega, active, proveedor){
    var echtiemel = "";
    console.log(proveedor);

    echtiemel += `

    <div class="modal" id="modificarProductoModal" tabindex="-1" role="dialog" aria-labelledby="modificarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modificarProductoModalLabel">Modificar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombreUpdateProducto">Nombre</label>
                    <input value="${nombre}" type="text" id="nombreUpdateProducto" class="form-control" name="nombre">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcionUpdateProducto">Descripcion</label>
                    <textarea rows="3"type="text" id="descripcionUpdateProducto" class="form-control" name="username">${descripcion}</textarea>
                </div>
            </div>
        </div>


        <div class="row">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="entregaProductoUpdate">Lugar Entrega</label>
                    <select value="${lugar_entrega}" class="form-control" id="entregaProductoUpdate">
                        <option ${(lugar_entrega == "Fabrica")?'selected="selected': ''} value="Fabrica">Fabrica</option>
                        <option ${(lugar_entrega == "Embarque")?'selected="selected': ''} value="Embarque">Embarque</option>
                        <option ${(lugar_entrega == "Bodega")?'selected="selected': ''} value="Bodega">Bodega</option>
                    </select>
                </div>
            </div>

        </div>

        


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="respuestaUpdateProducto">Tiempo Respuesta</label>
                    <input value="${tiempo_respuesta}" type="text" id="respuestaUpdateProducto" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="produccionUpdateProducto">Capacidad Producción</label>
                    <input value="${capacidad_produccion}" type="number" id="produccionUpdateProducto" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="proveedorUpdateProducto">Proveedor</label>
                    
                    <select class="form-control" name="rol" id="proveedorUpdateProducto">

                    </select>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-check">
                    <input ${(active == 1)? "checked": ""} type="checkbox" class="form-check-input" id="checkActivoUpdateProducto">
                    <label class="form-check-label" for="checkActivoUpdateProducto">Activo</label>
                </div>
            </div>
        </div>

            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button onclick="editarProducto('${idproducto}')" type="button" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar</button>
        </div>
        </div>
    </div>
    </div>



    `;

    //Se hace append
    $('#modalUpdateProductos').html(echtiemel);
    cargarProveedores(proveedor);
    $('#modificarProductoModal').modal();

}

function cargarProductos(){
    $.ajax({
        url: 'http://localhost/pitaya/productos/getProductos',
        type: 'get',
        dataType: 'json',
        success: function(response){
            console.log(response);

            var echtiemel = "";


            for(var i = 0; i < response.length; i++){
                echtiemel += `<tr>
                <th scope="row">${response[i].idproducto}</th>
                <td>${response[i].nombre}</td>
                <td>${response[i].descripcion}</td>
                <td>${response[i].tiempo_respuesta}</td>
                <td>${response[i].capacidad_produccion}</td>
                <td>${response[i].lugar_entrega}</td>
                <td>${(response[i].active == 1)? "Activo": "Inactivo"}</td>
                <td>
                    <button type="button" onclick="eliminarProducto(${response[i].idproducto})" class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                    <button onclick="displayEditarProducto('${response[i].idproducto}', '${response[i].nombre}', '${response[i].descripcion}', '${response[i].tiempo_respuesta}', '${response[i].capacidad_produccion}', '${response[i].lugar_entrega}', '${response[i].active}', '${response[i].nombre_proveedor}')" type="button" class="btn btn-outline-success">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </td>

                <td>
                    <button type="button" onclick="displayInfo('${response[i].fecha_creacion}', '${response[i].nombre_usuario}', '${response[i].nombre_proveedor}', '${response[i].ciudad}', '${response[i].estado}', '${response[i].con_nombre}', '${response[i].con_email}', '${response[i].con_telefono}', '${response[i].con_extension}', '${response[i].tipo}')" class="btn btn-outline-success">
                        <i class="fas fa-info-circle"></i>
                         Detalles
                    </button>
                </td>
                </tr>
                `
            }

            $('#tablaProductos').html(echtiemel);
        },
        error: function(err) {console.log(err);}
    })
}

function displayInfo(fecha_creacion, nombre_usuario, nombre_proveedor, ciudad, estado, con_nombre, con_email, con_telefono, con_extension, tipo){
    var echtiemel = "";
    

    echtiemel += `

    <div class="modal" id="infoProductoModal" tabindex="-1" role="dialog" aria-labelledby="infoProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
        <div class="modal-body">
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
                <span class="h4">Datos Proveedor</span>
            </li>
            <li class="list-group-item">
            
                <p class="h6">Nombre: ${nombre_proveedor}</p>
                <p class="h6">Ciudad: ${ciudad}</p>
                <p class="h6">Estado: ${estado}</p>
                <span class="h6">Tipo: ${tipo}</span>
            </li>
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
                <span class="h4">Datos Alta</span>
            </li>
            <li class="list-group-item">
                <p class="h6">Usuario Alta: ${nombre_usuario}</p>
                <p class="h6">Fecha Creación: ${fecha_creacion}</p>
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
    $('#infoProductoModal').modal();
}

function editarProducto(id){
    var _nombre = $('#nombreUpdateProducto').val();
    var _descripcion = $('#descripcionUpdateProducto').val();
    var _tiempo_respuesta = $('#respuestaUpdateProducto').val();
    var _capacidad_produccion = $('#produccionUpdateProducto').val();
    var _lugar_entrega = $('#entregaProductoUpdate').val();
    var _activo = $('#checkActivoUpdateProducto').prop('checked');
    var _tipo = $('#proveedorUpdateProducto').val();

    $.ajax({
        url: 'http://localhost/pitaya/productos/editarProducto',
        type: 'post',
        dataType: 'json',
        data: {
            id,
            nombre: _nombre,
            descripcion: _descripcion,
            tiempo_respuesta: _tiempo_respuesta,
            capacidad_produccion: _capacidad_produccion,
            lugar_entrega: _lugar_entrega,
            active: _activo,
            proveedor: _tipo
        },
        success: function(response){
            console.log(response);

            if(response){
                $('#modificarProductoModal').modal('hide');
                cargarProductos();
            }
        },
        error: function(err){console.log(err);}
    })

}

function clearInputs(){
    $('#nombreProducto').val('');
    $('#descripcionProducto').val('');
    $('#respuestaProducto').val('');
    $('#produccionProducto').val('');
    $('#entregaProducto').val('');
    $('#checkActivoProducto').prop('checked');
    $('#proveedorProducto').val('');
}

cargarProductos();