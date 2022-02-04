
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
})()

// Adicionando Javascript
function limpa_formulário_cep() {
  //Limpa valores do formulário de cep.
  document.getElementById("stLogradouroPessoa").value = "";
  document.getElementById("stBairroPessoa").value = "";
  document.getElementById("stCidadePessoa").value = "";
  document.getElementById("stEstadoPessoa").value = "";
  // document.getElementById("ibge").value = "";
}

function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById("stLogradouroPessoa").value = (conteudo.logradouro);
    document.getElementById("stBairroPessoa").value = (conteudo.bairro);
    document.getElementById("stCidadePessoa").value = (conteudo.localidade);
    document.getElementById("stEstadoPessoa").value = (conteudo.uf);
    //document.getElementById("ibge").value =
    //conteudo.ibge;
  } //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
  }
}



function pesquisacep(valor) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, "");

  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById("stLogradouroPessoa").value = "...";
      document.getElementById("stBairroPessoa").value = "...";
      document.getElementById("stCidadePessoa").value = "...";
      document.getElementById("stEstadoPessoa").value = "...";
      //document.getElementById("ibge").value = "...";

      //Cria um elemento javascript.
      var script = document.createElement("script");

      //Sincroniza com o callback.
      script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);
      document.getElementById("nnCasaPessoa").focus();
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");
      document.getElementById("stLogradouroPessoa").focus();
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
}

function selectTipoProjeto() {
  var select = document.getElementById("tipoProjeto");
  var option = select.options[select.selectedIndex];
  // alert(option.value);

  switch (option.value) {
    case "solar":
      document.getElementById("solar").style.display = "block";
      document.getElementById("solar").style.visibility = "visible";
      document.getElementById("iPublica").style.display = "none";
      break;


    default:
      document.getElementById("solar").style.display = "none";
      document.getElementById("iPublica").style.display = "none";

      break;

  }

  // if (option.value == "solar") {
  //   document.getElementById("solar").style.display = "block";
  //   document.getElementById("solar").style.visibility = "visible";
  // }

}
