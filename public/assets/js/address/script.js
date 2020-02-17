$('#zip_code').mask('00000-000')

let states = {
        'Acre' : 1,
        'Alagoas' : 2,
        'Amapá' : 3,
        'Amazonas' : 4,
        'Bahia' : 5,
        'Ceará' : 6,
        'Distrito Federal' : 7,
        'Espírito Santo' : 8,
        'Goiás' : 9,
        'Maranhão' : 10,
        'Mato Grosso' : 11,
        'Mato Grosso do Sul' : 12,
        'Minas Gerais' : 13,
        'Pará' : 14,
        'Paraíba' : 15,
        'Paraná' : 16,
        'Pernambuco' : 17,
        'Piauí' : 18,
        'Rio de Janeiro' : 19,
        'Rio Grande do Norte' : 20,
        'Rio Grande do Sul' : 21,
        'Rondônia' : 22,
        'Roraima' : 23,
        'Santa Catarina' : 24,
        'São Paulo' : 25,
        'Sergipe' : 26,
        'Tocantins' : 27
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
                        $("#state").val(states[data.localidade]);
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
