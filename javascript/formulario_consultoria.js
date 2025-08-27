// consultoria

document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('#consultoria-form');
  const cnpjInput = document.querySelector('#cnpj');
  const nomeInput = document.querySelector('#nome');
  const emailInput = document.querySelector('#email');
  const celularInput = document.querySelector('#celular');
  const erroCnpj = document.querySelector('#erro-cnpj');

  // Validação de CNPJ
  function validarCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g, '');

    if (cnpj.length !== 14) return false;
    if (/^(\d)\1{13}$/.test(cnpj)) return false;

    let tamanho = cnpj.length - 2;
    let numeros = cnpj.substring(0, tamanho);
    let digitos = cnpj.substring(tamanho);
    let soma = 0;
    let pos = tamanho - 7;

    for (let i = tamanho; i >= 1; i--) {
      soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
      if (pos < 2) pos = 9;
    }

    let resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
    if (resultado != parseInt(digitos.charAt(0))) return false;

    tamanho++;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;

    for (let i = tamanho; i >= 1; i--) {
      soma += parseInt(numeros.charAt(tamanho - i)) * pos--;
      if (pos < 2) pos = 9;
    }

    resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
    if (resultado != parseInt(digitos.charAt(1))) return false;

    return true;
  }

  // Exibir erro
  function exibirErro(input, mensagem) {
    input.classList.add('input-erro');
    erroCnpj.textContent = mensagem;
    erroCnpj.style.display = 'block';
  }

  // Remover erro
  function limparErro(input) {
    input.classList.remove('input-erro');
    erroCnpj.style.display = 'none';
    erroCnpj.textContent = '';
  }

  // CNPJ em tempo real
  cnpjInput.addEventListener('input', () => {
    if (cnpjInput.value.length >= 14 && !validarCNPJ(cnpjInput.value)) {
      exibirErro(cnpjInput, 'CNPJ inválido');
    } else {
      limparErro(cnpjInput);
    }
  });

  // Validação geral ao enviar
  form.addEventListener('submit', (e) => {
    if (
      nomeInput.value.trim() === '' ||
      emailInput.value.trim() === '' ||
      celularInput.value.trim() === '' ||
      !validarCNPJ(cnpjInput.value)
    ) {
      e.preventDefault(); 
      if (!validarCNPJ(cnpjInput.value)) {
        exibirErro(cnpjInput, 'CNPJ inválido');
      }
      alert('Por favor, preencha todos os campos corretamente.');
    }
  });
});
