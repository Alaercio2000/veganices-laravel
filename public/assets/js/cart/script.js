$('#zipCodeSource').mask('00000-000');

function calcShipping() {
    var zip_code = $('#zipCodeSource');
    zip_code = zip_code.val().replace(/\D/g, '');

    if (zip_code != '') {
        var validateZipCode = /^[0-9]{8}$/;

        if (validateZipCode.test(zip_code)) {
            $.getJSON("https://viacep.com.br/ws/"+ zip_code +"/json/?callback=?", function(cepValid) {
                if (!("erro" in cepValid)) {

                    var req = new Request('/api/calculate-shipping/' + zip_code);

                    fetch(req).then(function(response) {
                        response.json().then(function(data){
                            localStorage.setItem('answerShipping','O valor do frete é ' + data.Valor + ' em até '+ data.PrazoEntrega + ' úteis');
                            localStorage.setItem('shipping', data.Valor);
                            localStorage.setItem('termShipping' , data.PrazoEntrega);

                            $('#valueAllProducts').html((parseFloat(localStorage.getItem('shipping').replace(',','.')) + parseFloat(valueAllProducts)).toFixed(2));
                            $('#answerShipping').html(localStorage.getItem('answerShipping'));
                            $('#valueShipping').html(localStorage.getItem('shipping'));
                            $('#zipCodeSource').removeClass('is-invalid');
                            $('#zipCodeSource').addClass('is-valid');
                        });
                    });
                }else{
                    $('#zipCodeSource').addClass('is-invalid');
                    $('#invalidZipCode').html('Cep não encontrado')
                }
            });
        } else {
            $('#zipCodeSource').addClass('is-invalid');
            $('#invalidZipCode').html('Digite um cep válido')
        }
    }else {
        $('#zipCodeSource').addClass('is-invalid');
        $('#invalidZipCode').html('Digite um cep');
    }
}

$('#answerShipping').html(localStorage.getItem('answerShipping'));
$('#valueShipping').html(localStorage.getItem('shipping'));

$('#valueAllProducts').html((parseFloat(localStorage.getItem('shipping').replace(',','.')) + parseFloat(valueAllProducts)).toFixed(2));
