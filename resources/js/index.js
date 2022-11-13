function login() {
    $.ajax({
        url: "controllers/login.php",
        type: 'POST',
        data: $('#login-form').serialize(),
        success: function (response) {
            console.log(response);
            response = response.trim();
            if(response == 1)
                location.href = 'templates/main.php';
            else
               swal("Usuario/Contraseña","Andic 2022", "error") 
        }
    });

    return false;
}