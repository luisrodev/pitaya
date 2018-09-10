// $(document).ready(function(){
//     console.log("READY");
//     function eliminar(_id){
//         console.log(_id);

//         $.ajax({
//             url: 'http://localhost/pitaya/index.php/usuarios/eliminar',
//             type: 'POST',
//             data: {id: _id},
//             beforeSend: function(){
//                 console.log("Se va a enviar");
//             },
//             success: function(){
//                 console.log('Se Elimino');
//             }
            
//         })
//     }

// });

function editarUsuario(id){
    console.log("Se quiere editar usuario");
    console.log(id);

    var _nombre = $('#updateNombre').val();
    var _username = $('#updateUsername').val();
    var _password = $('#updatePassword').val();
    var _email = $('#updateEmail').val();
    var _rol = $('#updateRol').val();
    var _active = $('#updatecheckActivo').prop('checked');

    console.log("Nuevo username: " + _username);


    $.ajax({
        url: 'http://localhost/pitaya/usuarios/update',
        type: 'post',
        dataType: 'json',
        data: {
            id: id,
            nombre: _nombre,
            username: _username,
            password: _password,
            email: _email,
            rol: _rol,
            active: _active
        },
        success: function(response){
            console.log(response);
            
            $('#modificarModal').modal('hide');
            cargarUsuarios();
        },
        error: function(err){
            console.log(err);
        }
    })
}

function displayEditar(id, nombre, username, email, rol, active, role){
    console.log("Midificar Usuario Modal");

    var echtiemel = "";
    console.log(id);

    echtiemel += `

    <div class="modal" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="modificarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modificarModalLabel">Modificar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="updateNombre">Nombre</label>
                        <input value="${nombre}" type="text" id="updateNombre" class="form-control" name="nombre">
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="updateUsername">Nombre Usuario</label>
                        <input value="${username}" type="text" id="updateUsername" class="form-control" name="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="updatePassword">Contraseña</label>
                        <input value="" type="password" id="updatePassword" class="form-control" name="password">
                    </div>
                </div>
            </div>


            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="updateEmail">Correo Electronico</label>
                        <input value="${email}" type="email" id="updateEmail" class="form-control" name="email">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="updateRol">Rol</label>
                        <select value="${rol}" name="rol" id="updateRol" class="form-control">

                            ${(role == 'gerente')? `<option ${(rol == "empleado")? 'selected="selected': ''} value="Empleado">Empleado</option>`: `<option ${(rol == "administrador")? 'selected="selected': ''} value="Administrador">Administrador</option>
                            <option ${(rol == "gerente")? 'selected="selected': ''} value="Gerente">Gerente</option>
                            <option ${(rol == "empleado")? 'selected="selected': ''} value="Empleado">Empleado</option>`}
                            
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-check">
                        <input ${(active == 1)? "checked": ""} type="checkbox" class="form-check-input" id="updatecheckActivo">
                        <label class="form-check-label" for="updatecheckActivo">Activo</label>
                    </div>
                </div>
            </div>

            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button onclick="editarUsuario('${id}')" type="button" class="btn btn-primary"> <i class="fas fa-save"></i> Guardar</button>
        </div>
        </div>
    </div>
    </div>



    `;

    //Se hace append
    $('#modalUpdate').html(echtiemel);
    $('#modificarModal').modal();


}

function eliminarUsuario(idUsuario){
    console.log('Eliminar Usuario');
    $.ajax({
        url: 'http://localhost/pitaya/usuarios/eliminar',
        type: 'post',
        dataType: 'json',
        data: {id: idUsuario},
        success: function(response){
            console.log(response);

            if(response){
                cargarUsuarios();
            }

        },
        error: function(err){
            console.log(err);

        }
    })
}

function cargarUsuarios(){
    console.log('cargar usuarios');

    $.ajax({
        url: 'http://localhost/pitaya/usuarios/getUsuarios',
        type: 'get',
        dataType: 'json',
        success: function(response){


            var echtiemel = "";
            console.log(response);

            var data = response['data'];

            for(var i = 0; i < data.length; i++){
                echtiemel += `<tr>
                <th scope="row">${data[i].idusuario}</th>
                <td>${data[i].nombre}</td>
                <td>${data[i].username}</td>
                <td>${data[i].email}</td>
                <td>${data[i].rol}</td>
                <td>${data[i].fecha_creacion}</td>
                <td>${(data[i].active == 1)? "Activo": "Inactivo"}</td>
                <td>
                    <button type="button" onclick="eliminarUsuario(${data[i].idusuario})" class="btn btn-outline-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                    <button onclick="displayEditar('${data[i].idusuario}', '${data[i].nombre}', '${data[i].username}', '${data[i].email}', '${data[i].rol}', '${data[i].active}', '${response.rol}')" type="button" class="btn btn-outline-success">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </td>
                </tr>
                `
            }

            //     echtiemel += `</ul>`;

            // }

            //Se hace append
            $('#tablaUsuarios').html(echtiemel);

            console.log(data);
        },
        error: function(err){
            console.log(err);
        }
    })
}

function agregarUsuario(){
    console.log("You clicked agregarUsuario");

    var _nombre = $('#nombre').val();
    var _username = $('#username').val();
    var _password = $('#password').val();
    var _email = $('#email').val();
    var _rol = $('#rol').val();
    var _active = $('#checkActivo').prop('checked');

    var _data = {
        nombre:  _nombre,
        username: _username,
        password: _password,
        email: _email,
        rol: _rol,
        active: _active
    }
    
    console.log(_active);
    $.ajax({
        url: 'http://localhost/pitaya/usuarios/agregarUsuario',
        type: 'post',
        dataType: 'json',
        data: {
            nombre: _nombre,
            username: _username,
            password: _password,
            email: _email,
            rol: _rol,
            active: _active
        },
        
        success: function(response){

            console.log(response);
            
            
            if(response.ok){
                console.log("es Okey");
                console.log("Los datos se guardaron");
                $('#agregarModal').modal('hide');
                clearInputs();
                cargarUsuarios();
            }else{
                console.log("No es okey");
            }
        },
        error: function(err){
            console.log(err);
        }
    })
}

function clearInputs(){
    $('#nombre').val('');
    $('#username').val('');
    $('#password').val('');
    $('#email').val('');
    $('#rol option[value="administrador"]').attr('selected', true);
    $('#checkActivo').prop('checked');
}


cargarUsuarios();
// window.onload = function() {
//     //f1();
//     // document.getElementById("Save").onclick = function fun() {
//     //     alert("hello");
//     //     f1();
//     //     //validation code to see State field is mandatory.  
//     // }
// }





