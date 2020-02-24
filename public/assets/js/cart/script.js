$('#zipCodeSource').mask('00000-000');

function calcShipping() {
    var zip_code = $('#zipCodeSource');
    zip_code = zip_code.val().replace(/\D/g, '');

    if (zip_code != '') {
        var validateZipCode = /^[0-9]{8}$/;

        if (validateZipCode.test(zip_code)) {
            $.getJSON("127.0.0.1/api/calculate-shipping/" + zip_code, function (data) {
                if (!("erro" in data)) {
                    console.log(data);
                }else{
                    console.log('deu erro');
                }
            });
        } else {
            alert('Cep inválido');
        }
    }
}
