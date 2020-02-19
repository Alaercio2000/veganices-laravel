function showPassword(){
    $('.input-password').removeClass('d-none');
    $('.input-password input').removeAttr('type');
    $('.input-password input').attr('type','password');
    $('#buttonShowPassword').addClass('d-none');
    rodapeFixed();
}

function rodapeFixed(){
    if ($('body').height() < $(window).height()) {
        $('#rodape').addClass('fixed-bottom');
    }else{
        $('#rodape').removeClass('fixed-bottom');
    }
}

var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {
    onKeyPress: function (val, e, field, options) {
        field.mask(behavior.apply({}, arguments), options);
    }
};

$('#phone').mask(behavior , options);
$('#cpf').mask('000.000.000-00');
