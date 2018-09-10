function load(){

    $.ajax({
        url: 'http://localhost/pitaya/usuarios/getNav',
        type: 'get',
        dataType: 'json',        
        success: function(response){

            var echtiemel = "";

            console.log(response);
            // console.log(response[0].lista.length);

            for(var i = 0; i < response.length; i++){
                // console.log("Titulo: " + response[i].headName);
                echtiemel += `<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>${response[i].headName}</span><a class="d-flex align-items-center text-muted" href="#"><span data-feather="plus-circle"></span></a></h6>`;

                echtiemel += `<ul class="nav flex-colum">`;

                for(var e = 0; e < response[i].lista.length; e++){

                    echtiemel += `<li class="nav-item"><a href="${response[i].lista[e].to}" class="nav-link "><i class="fas fa-${response[i].lista[e].icon}"></i>${ response[i].lista[e].name }</a>`;
                    // console.log("Icon " + e + " : " + response[i].lista[e].icon);
                    // console.log("nombre " + e + " : " + response[i].lista[e].name);
                }

                echtiemel += `</ul>`;

            }

            //Se hace append
            $('#sideNavTemp').html(echtiemel);


            // response.forEach(element => {
            //     console.log(element);
            // });
            
            
            // if(response.ok){
            //     console.log("es Okey");
            //     console.log("Los datos se guardaron");
            //     $('#agregarModal').modal('hide');
            //     cargarUsuarios();
            // }else{
            //     console.log("No es okey");
            // }
        },
        error: function(err){
            console.log(err);
        }
    })

}

// function cerrarSesion(){
//     console.log("You clicked cerrar sesion");

//     $.ajax({
//         url: 'http://localhost/pitaya/login/cerrarSesion',
//         dataType: 'json',
//         type: 'post',
//         error: function(err){
//             console.log(err);
//         }

//     })
// }

load();