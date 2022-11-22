
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

$(function () {
    $('#TableUser').hide(10);
    $('#register').addClass('active');

});