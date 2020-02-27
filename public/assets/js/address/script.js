$('#zip_code').mask('00000-000')

let states = {
    'AC': 1,
    'AL': 2,
    'AP': 3,
    'AM': 4,
    'BA': 5,
    'CE': 6,
    'DF': 7,
    'ES': 8,
    'GO': 9,
    'MA': 10,
    'MT': 11,
    'MS': 12,
    'MG': 13,
    'PA': 14,
    'PB': 15,
    'PR': 16,
    'PE': 17,
    'PI': 18,
    'RJ': 19,
    'RN': 20,
    'RS': 21,
    'RO': 22,
    'RR': 23,
    'SC': 24,
    'SP': 25,
    'SE': 26,
    'TO': 27
};



function limpa_formulário_cep() {
    $("#street").val("");
    $("#neighborhood").val("");
    $("#county").val("");
    $("#state").val("");
}


function searchZipCode(value) {

    var cep = value.replace(/\D/g, '');

    if (cep != "") {

        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {

            $("#street").val("...");
            $("#neighborhood").val("...");
            $("#county").val("...");
            $("#state").val("...");


            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (data) {

                if (!("erro" in data)) {

                    $("#street").val(data.logradouro);
                    $("#neighborhood").val(data.bairro);
                    $("#county").val(data.localidade);
                    $("#state").val(states[data.uf]);

                    $('#zip_code').removeClass('is-invalid');
                    $('#zip_code').addClass('is-valid');
                    showFormComplete();
                    enviar();
                }
                else {

                    limpa_formulário_cep();
                    $('#zip_code').addClass('is-invalid');
                    $('#answerZipCode').html('Cep inválido');
                    hiddenForm();
                }
            });
        }
        else {

            limpa_formulário_cep();
            $('#zip_code').addClass('is-invalid');
            $('#answerZipCode').html('Cep inválido');
            hiddenForm();
        }
    }
    else {
        limpa_formulário_cep();
        hiddenForm();
    }
};

function showFormComplete() {
    $('#formHidden').removeClass('d-none');
    $('#rodape').removeClass('fixed-bottom');
}

function hiddenForm() {
    $('#formHidden').addClass('d-none');
    $('#rodape').addClass('fixed-bottom');
}
