function vistas(viewFlag) {
    $('#register').removeClass('active');
    $('#tableU').removeClass('active');
    if (viewFlag == 'N') {
        $('#Action').val("newInst");
        $('#form-institucion')[0].reset();
        $('#table-s').hide(10);
        $('#table-inst').hide(10);
        $('#newInst').show("slow");
        $('#register').addClass('active');
        $('#btn-form').removeClass('btn-primary');
            $('#btn-form').addClass('btn-success');
            $("#btn-form").html("<i class='fa fa-save' aria-hidden='true'></i>"+
            "Guardar Datos");
    }
    else if (viewFlag == 'T') {
        $('#newInst').hide(10);
        $('#table-s').hide(10);
        $('#table-inst').show("slow");
        $('#tableI').addClass('active');
    }
    else if(viewFlag == 'S'){
        $('#newInst').hide(10);
        $('#table-inst').hide(10);
        $('#table-s').show("slow");
    }
}

function sendInfo(){
    $.ajax({
        url:'../controllers/institud.php',
        type:'POST',
        data: $('#form-institucion').serialize(),
        success:function(response){
            console.log(response);
        }
    });
    return false;
}

$(function(){
    vistas(viewFlag);
});