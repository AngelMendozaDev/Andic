var statusU = false;
$(function(){
    $('.text-error').hide();

    $('#Pass2').keyup(function(){
        pas1 = $('#Pass1').val();
        pas2 = $('#Pass2').val();
        if(pas1 == pas2){
            statusU = true;
            $('#Pass1').removeClass('error');
            $('#Pass2').removeClass('error');
            $('.text-error').hide();
        }
        else{
            $('#Pass1').addClass('error');
            $('#Pass2').addClass('error');
            $('.text-error').show();
            console.log("error")
        }
    })
});