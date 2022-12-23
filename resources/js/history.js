function vistas(viewFlag) {
    $('#register').removeClass('active');
    $('#tableU').removeClass('active');
    if (viewFlag == 'N') {
        //getFolio();
        $('#Action').val("newHistory");
        $('#form-history')[0].reset();
        $('#TableHistory').hide(10);
        $('#newHistory').show("slow");
        $('#register').addClass('active');
        $('#tableH').removeClass('active');
        $('#btn-form').removeClass('btn-primary');
        $('#btn-form').addClass('btn-success');
        $("#btn-form").html("<i class='fa fa-save' aria-hidden='true'></i>" +
            "Guardar Datos");
    }
    else if (viewFlag == 'T') {
        $('#newHistory').hide(10);
        $('#TableHistory').show("slow");
        $('#tableH').addClass('active');
    }
}

function setYears() {
    var d = new Date();
    var n = d.getFullYear();
    var select = document.getElementById("año");
    for (var i = n; i >= 2012; i--) {
        var opc = document.createElement("option");
        opc.text = i;
        opc.value = i;
        select.add(opc)
    }
}

function deleteNot(folio, image){
    $.ajax({
        url: "../controllers/histGeneral.php",
        type:'POST',
        data:{folio, image},
        success: function(request){
            if(request.trim() == 1){
                swal("Eliminación exítosa!","ANDIC A.C. [2022]", "success").then((value=>{
                    location.href = "history.php?view=T";
                }))
            }
        }
    });
}

$(function () {
    $('#table-His').DataTable();
    vistas(viewFlag)
    setYears();
});