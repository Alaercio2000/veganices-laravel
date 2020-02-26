zip_code = zip_code.replace(/\D/g, '');

var req = new Request('/api/calculate-shipping/' + zip_code);

fetch(req).then(function (response) {
    response.json().then(function (data) {
        $('#valueShipping').html(data.Valor);
        $('#answerShipping').html('O valor do frete é ' + data.Valor + ' em até ' + data.PrazoEntrega + ' úteis');
        $('#valueAllProducts').html(((parseFloat(data.Valor.replace(',', '.')) + parseFloat(valueAllProducts)).toFixed(2)).replace('.', ','));
        $('#valueBillet').html(((parseFloat(data.Valor.replace(',', '.')) + parseFloat(valueAllProducts)).toFixed(2)).replace('.', ','));

        localStorage.setItem('priceAll', ((parseFloat(data.Valor.replace(',', '.')) + parseFloat(valueAllProducts)).toFixed(2)).replace('.', ','));
    });
});

function showCard() {
    if ($('#formCard').hasClass('d-none')) {

        $('#formCard').removeClass('d-none');
        $('#formBillet').addClass('d-none');
        $('#iconCard').css('color', '#1b6de8');
        $('#iconBillet').css('color', '#ddd');

        $('#rodape').removeClass('fixed-bottom');
    }
}

function showBillet() {

    if ($('#formBillet').hasClass('d-none')) {

        $('#formBillet').removeClass('d-none');
        $('#formCard').addClass('d-none');
        $('#iconCard').css('color','#ddd');
        $('#iconBillet').css('color', '#1b6de8');

    }
}

$('#numberCard').mask('0000.0000.0000.0000');
$('#cvvCard').mask('000');
