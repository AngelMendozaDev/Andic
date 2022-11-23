function vistas(flag) {
    $('#register').removeClass('active');
    $('#tableU').removeClass('active');
    if (flag == 'N') {
        $('#TableUser').hide(10);
        $('#newUser').show("slow");
        $('#register').addClass('active');
    }
    else if (flag == 'T') {
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
    if ((now.getFullYear() - fecha[0]) < 18) {
        $('#nac').addClass("error");
    }
    
    if($('#phone').val().length < 10)
        $('#phone').addClass("error");
    else {
    }

    return false;
}

$(function () {
    $('#TableUser').hide(10);
    $('#register').addClass('active');

    $.ajax({
        url: '../controllers/users.php',
        type: 'POST',
        data: { Action: "getFolio"},
        success: function (response) {
            $('#folio').val(response.padStart(5,0))
        }
    });

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