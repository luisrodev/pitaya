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

function cargarUsuarios(){
    console.log('cargar usuarios');
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


function eliminar(_id) {
    console.log("ID: " + _id);
    $.ajax({
        url: 'http://localhost/pitaya/index.php/usuarios/eliminar',
        type: 'POST',
        data: {id: _id},
        beforeSend: function(){
            console.log("Se va a enviar");
        },
        success: function(){
            console.log('Se Elimino');
        }
        
    })
}
// window.onload = function() {
//     //f1();
//     // document.getElementById("Save").onclick = function fun() {
//     //     alert("hello");
//     //     f1();
//     //     //validation code to see State field is mandatory.  
//     // }
// }