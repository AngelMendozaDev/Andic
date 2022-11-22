var statusU = false;
var veces = 1;

function setPass() {
    if (statusU == true) {
        $.ajax({
            url: '../controllers/pass.php',
            type: 'POST',
            data: $('#form-pass').serialize(),
            success: function (response) {
                console.log(response);
                if(response.trim() == 1){
                    swal("Contraseña cambiada con exito!!","Andic A.C. [2022]", "success").then((value)=>{
                        location.href = "../controllers/close.php";
                    })
                }
                else if(response == 0){
                    $('#Actual').addClass("error")
                    $("#messageA").show();
                    veces++;
                    if(veces > 3)
                        location.href = "../controllers/close.php";
                }
            }
        });
    }
    return false;
}

$(function () {
    $('.text-errorA').hide();
    $('.text-error').hide();

    $('#Pass2').keyup(function () {
        pas1 = $('#Pass1').val();
        pas2 = $('#Pass2').val();
        if (pas1 == pas2) {
            statusU = true;
            $('#Pass1').removeClass('error');
            $('#Pass2').removeClass('error');
            $('.text-error').hide();
        }
        else {
            statusU = false;
            $('#Pass1').addClass('error');
            $('#Pass2').addClass('error');
            $('.text-error').show();
            console.log("error")
        }
    })
});