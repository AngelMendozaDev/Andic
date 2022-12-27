function getCP(cp) {
    $.ajax({
        url: '../controllers/users.php',
        type: 'POST',
        data: { Action: "getCol", cp },
        success: function (response) {
            console.log(response);
            $('#col').empty()
            $('#col').append("<option value='' selected='true' disabled>Selecciona una Colonia</option>");
            if (response.trim() == -1) {
                $('#codePos').addClass("error")
            }
            else {
                $('#codePos').removeClass("error");
                data = JSON.parse(response);
                $.each(data, function (key, item) {
                    $('#col').append("<option value='" + item.folio + "'>" + item.col + "</option>")
                });
                $('#mun').val(data[0].mun);
                $('#edo').val(data[0].edo);
            }
        }
    });
}

function setCol(cp, col) {
    $.ajax({
        url: '../controllers/users.php',
        type: 'POST',
        data: { Action: "getCol", cp },
        success: function (response) {
            $('#col').empty()
            $('#col').append("<option value='' selected='true' disabled>Selecciona una Colonia</option>");
            if (response.trim() == -1) {
                $('#codePos').addClass("error")
            }
            else {
                $('#codePos').removeClass("error")
                data = JSON.parse(response);
                $.each(data, function (key, item) {
                    $('#col').append("<option value='" + item.folio + "'>" + item.col + "</option>")
                });
                $('#mun').val(data[0].mun);
                $('#edo').val(data[0].edo);
                $('#col').val(col);
            }
        }
    });
}

function getFolio() {
    $.ajax({
        url: '../controllers/users.php',
        type: 'POST',
        data: { Action: "getFolio" },
        success: function (response) {
            response = "" + (parseInt(response) + 1);
            $('#folio').val(response.padStart(5, 0));
        }
    });
}

function vistas(viewFlag) {
    $('#register').removeClass('active');
    $('#tableU').removeClass('active');
    if (viewFlag == 'N') {
        getFolio();
        $('#Action').val("newUser");
        $('#form-users')[0].reset();
        $('#TableUser').hide(10);
        $('#newUser').show("slow");
        $('#register').addClass('active');
        $('#btn-form').removeClass('btn-primary');
            $('#btn-form').addClass('btn-success');
            $("#btn-form").html("<i class='fa fa-save' aria-hidden='true'></i>"+
            "Guardar Datos");
    }
    else if (viewFlag == 'T') {
        $('#newUser').hide(10);
        $('#TableUser').show("slow");
        $('#tableU').addClass('active');
    }
}

function sendInfo() {
    now = new Date();
    fecha = $('#nac').val().split("-");
    $('#nac').removeClass("error");
    $('#phone').removeClass("error");
    if ((now.getFullYear() - fecha[0]) > 18) {
        if ($('#phone').val().length < 10)
            $('#phone').addClass("error");
        else {
            $.ajax({
                url: "../controllers/users.php",
                type: 'POST',
                data: $('#form-users').serialize(),
                success: function (response) {
                    console.log(response);
                    if (response.trim() == 1) {
                        swal("Registro exitoso!!", "ANDIC A.C. 2022", "success").then((value) => {
                            location.href = "users.php?view=T"
                        });
                    }
                    else if (response.trim() == '2') {
                        swal("El correo o telefono ya han sido registrados, verifica la información proporcionada", "ANDIC A.C. 2022", "info");
                    }
                    else {
                        swal("Ooops!  Ocurrio un error inesperado, intente de muevo", "ANDIC A.C. 2022", "error");
                    }
                }
            });
        }
    }
    else
        $('#nac').addClass("error");

    return false;
}

function viewUser(person) {
    $('#Action').val("updateUser");
    $('#form-users')[0].reset();
    $('#TableUser').hide(10);
    $('#newUser').show("slow");
    $.ajax({
        url: '../controllers/users.php',
        type: 'POST',
        data: { Action: 'getUser', person },
        success: function (response) {
            console.log(response);
            data = JSON.parse(response);
            $('#Action').val("updateUser");
            $('#nombre').val(data.nombre);
            $('#app').val(data.app);
            $('#apm').val(data.apm);
            $('#nac').val(data.fecha_nac);
            $('#sexo').val(data.sexo);
            $('#mail').val(data.correo);
            $('#phone').val(data.tel);
            $('#folio').val(data.id_p);
            $('#calle').val(data.calle);
            $('#codePos').val(data.cp);
            setCol(data.cp, data.folCP);
            $('#btn-form').removeClass('btn-success');
            $('#btn-form').addClass('btn-primary');
            $("#btn-form").html("<i class='fa fa-sync-alt' aria-hidden='true'></i>"+
            "Actualizar Datos");
        }
    });
}

function deleteUser(user){
    swal({
        title: "Esta segur@?",
        text: "Una Vez eliminado no podra recupear la información",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:'../controllers/users.php',
            type:'POST',
            data:{Action:'userOff', user},
            success:function(response){
                console.log(response);
                if(response.trim() == 1){
                    swal("Eliminación exitosa!!","Andic 2022", "success").then((value)=>{
                        location.href = "users.php?view=T";
                    });
                }
                else{
                    swal("Oops! Ocurrio un error Inesperado...", "Intenta de nuevo mas tarde","error");
                }
            }
          });
        }
      });
}

$(function () {
    $('#table-Us').DataTable();
    vistas(viewFlag)

    $('#codePos').keyup(function () {
        value = $('#codePos').val();
        getCP(value);
    });

});