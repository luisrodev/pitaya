function logIn(){
    console.log("Login Click");

    var _username = $('#inputUsername').val();
    var _password = $('#inputPassword').val();

    $.ajax({
        url: 'http://localhost/pitaya/login/logIn',
        type: 'post',
        dataType: 'json',
        data: {
            username: _username,
            password: _password
        },
        success: function(response){
            console.log("WORKS");
            console.log(response);
            // window.location.replace("http://localhost/pitaya/usuarios");
            
        },
        error: function(err){
            console.log(err);

        }
    })
}