var flag = false;

$(function () {
    $('#btn-sub').hover(function () {
        if (flag == false) {
            $('#sub-main').addClass('activo');
            $('#sub-main').removeClass('oculto');
            flag = true;
        }
        else {
            $('#sub-main').addClass('oculto');
            $('#sub-main').removeClass('activo');
            flag = false;
        }

    });

    $('#sub-main').hover(function () {
        if (flag == false) {
            $('#sub-main').addClass('activo');
            $('#sub-main').removeClass('oculto');
            flag = true;
        }
        else {
            $('#sub-main').addClass('oculto');
            $('#sub-main').removeClass('activo');
            flag = false;
        }

    });


    $('#status-side').change(function(){
        if ($('#status-side').is(':checked')) {
            $('.menu-lateral').addClass('muestra');
            $('#open-side').hide();
        } else {
            $('.menu-lateral').removeClass('muestra');
            $('#open-side').show();
        }
        
    })

});