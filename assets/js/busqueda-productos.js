function cargarProductos(){
    console.log("Cargar productos para la buscada");
    $.ajax({
        url: 'http://localhost/pitaya/busqueda/getProductos',
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
                <td>${response[i].nombre_proveedor}</td>
                <td>${response[i].ciudad}</td>
                <td>${response[i].estado}</td>
                <td>${response[i].tipo}</td>
                <td>
                    <button type="button" onclick="displayInfo('${response[i].con_nombre}', '${response[i].con_email}', '${response[i].con_telefono}', '${response[i].con_extension}')" class="btn btn-outline-success">
                        <i class="fas fa-info-circle"></i>
                         Contacto
                    </button>
                </td>
                </tr>
                `
            }

            $('#tablaProductosBusqueda').html(echtiemel);
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
    $('#modalInformacionExtraBusqueda').html(echtiemel);
    $('#infoContactoModal').modal();
}

function searchProducto(){
    var cond = $('#busquedaNombre').val();

    $.ajax({
        url: 'http://localhost/pitaya/busqueda/searchProducto',
        type: 'post',
        dataType: 'json',
        data: {cond},
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
                <td>${response[i].nombre_proveedor}</td>
                <td>${response[i].ciudad}</td>
                <td>${response[i].estado}</td>
                <td>${response[i].tipo}</td>
                <td>
                    <button type="button" onclick="displayInfo('${response[i].con_nombre}', '${response[i].con_email}', '${response[i].con_telefono}', '${response[i].con_extension}')" class="btn btn-outline-success">
                        <i class="fas fa-info-circle"></i>
                         Contacto
                    </button>
                </td>
                </tr>
                `
            }

            $('#tablaProductosBusqueda').html(echtiemel);

        },
        error: function(err){console.log(err);}
    })

}

cargarProductos();