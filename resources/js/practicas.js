const url = '../controllers/practicas.php';
const myURL = "../controllers/registro.php";

function setService(clave, servicio) {
    $.ajax({
        url: myURL,
        type: "POST",
        data: { action: "getServices", clave },
        success: function (response) {
            console.log(response);
            if (response.length > 1) {
                data = JSON.parse(response);
                $("#escuela").empty();
                $("#escuela").append(
                    "<option value='' selected disabled>Selecciona una Carrera/Oficio </option>"
                );
                $.each(data, function (key, item) {
                    $("#escuela").append(
                        "<option value='" + item.id + "'>" + item.servicio + " </option>"
                    );
                });
            } else {
                $("#escuela").empty();
                $("#escuela").append(
                    "<option value='' selected disabled>Selecciona una Carrera/Oficio </option>"
                );
            }
            $('#escuela').val(servicio);
        }
    });
}

function getPractica(folio) {
    $.ajax({
        url: url,
        type: 'POST',
        data: { action: 'getPractica', folio },
        success: function (response) {
            console.log(response);
            data = JSON.parse(response);
            console.log(data);
            $('#name-user').val(data.nombre + " " + data.app + " " + data.apm);
            $('#user').val(data.persona);
            $('#name-escuela').val(data.nombre_ins);
            $('#tipo-p').val(data.tipo);
            $('#matricula').val(data.matricula);
            $('#semestre').val(data.semestre);
            $('#fecha_in').val(data.inicio);
            $('#fecha_fin').val(data.fin);
            aux = data.proy.split('*');
            $('#name-proy').val(aux[0]);
            $('#proyecto').val(aux[1]);
            setService(data.clave, data.institucion)
        }
    });
}

function getLetter(folio){
    
}

function changeStatus(folio, status){
    $.ajax({
        url: url,
        type:'POST',
        data:{action: 'changeStatus', folio, status},
        success:function(response){
            console.log (response);
            if(response.trim() == 1){
                $('#card-'+folio).hide(100);
                location.reload();
            }
            else{
                swal('Oops! error al rechazar', 'Intenta de nuevo mas tarde', 'info');
            }
        }
    });
}

$(function () {
    $('#table').DataTable();
});