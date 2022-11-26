
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
                    //console.log(response);
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
            $('#lienzo').append("<div class='input-group mb-3'>" +
                "<span class='input-group-text'>Calle:</span>" +
                "<input type='text' class='form-control' name='calle' id='calle' maxlength='10' oninput='if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);' required>" +
                "</div>");
            $('#nombre').val(data.nombre);
            $('#app').val(data.app);
            $('#apm').val(data.apm);
            $('#nac').val(data.fecha_nac);
            $('#sexo').val(data.sexo);
            $('#mail').val(data.correo);
            $('#phone').val(data.tel);

        }
    });
}

$(function () {
    $('#table-Us').DataTable();
    vistas(viewFlag)

    $('#codePos').keyup(function () {
        value = $('#codePos').val();
        $.ajax({
            url: '../controllers/users.php',
            type: 'POST',
            data: { Action: "getCol", cp: value },
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
                }
            }
        });
    });

});