$('#zip_code').mask('00000-000')

let states = {
    'AC' : 1,
    'AL' : 2,
    'AP' : 3,
    'AM' : 4,
    'BA' : 5,
    'CE' : 6,
    'DF' : 7,
    'ES' : 8,
    'GO' : 9,
    'MA' : 10,
    'MT' : 11,
    'MS' : 12,
    'MG' : 13,
    'PA' : 14,
    'PB' : 15,
    'PR' : 16,
    'PE' : 17,
    'PI' : 18,
    'RJ' : 19,
    'RN' : 20,
    'RS' : 21,
    'RO' : 22,
    'RR' : 23,
    'SC' : 24,
    'SP' : 25,
    'SE' : 26,
    'TO' : 27
};

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#street").val("");
        $("#neighborhood").val("");
        $("#county").val("");
        $("#state").val("");
    }

    //Quando o campo cep perde o foco.
    $("#zip_code").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#street").val("...");
                $("#neighborhood").val("...");
                $("#county").val("...");
                $("#state").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(data) {

                    if (!("erro" in data)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#street").val(data.logradouro);
                        $("#neighborhood").val(data.bairro);
                        $("#county").val(data.localidade);
                        $("#state").val(states[data.uf]);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});
