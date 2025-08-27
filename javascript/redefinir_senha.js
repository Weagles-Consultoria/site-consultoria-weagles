document.addEventListener('DOMContentLoaded', function() {
    const linkEsqueciSenha = document.getElementById('link-esqueci-senha');
    const modalEsqueci = document.getElementById('modal-esqueci-senha');
    const formVerificarEmail = document.getElementById('form-verificar-email');
    const inputEmailRecuperacao = document.getElementById('email-recuperacao');
    const erroEmail = document.getElementById('erro-email');
    const modalNovaSenha = document.getElementById('modal-nova-senha');
    const formResetarSenha = document.getElementById('form-resetar-senha');
    const inputEmailConfirmado = document.getElementById('email-confirmado');
    const inputNovaSenha = document.getElementById('nova-senha');
    const inputConfirmarNovaSenha = document.getElementById('confirmar-nova-senha');
    const erroNovaSenha = document.getElementById('erro-nova-senha');
    const closeButtons = document.querySelectorAll('.modal-close-btn');

    function showModal(modal) {
        modal.style.display = 'flex';
    }

    function hideModals() {
        modalEsqueci.style.display = 'none';
        modalNovaSenha.style.display = 'none';
    }

    linkEsqueciSenha.addEventListener('click', (e) => {
        e.preventDefault();
        showModal(modalEsqueci);
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', hideModals);
    });

    formVerificarEmail.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = inputEmailRecuperacao.value;

        fetch('php/verificar_email.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `email=${encodeURIComponent(email)}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                hideModals();
                inputEmailConfirmado.value = email;
                showModal(modalNovaSenha);
                erroEmail.style.display = 'none';
            } else {
                erroEmail.textContent = 'E-mail não encontrado em nosso sistema.';
                erroEmail.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            erroEmail.textContent = 'Ocorreu um erro. Tente novamente.';
            erroEmail.style.display = 'block';
        });
    });

    formResetarSenha.addEventListener('submit', function(e) {
        e.preventDefault();

        if (inputNovaSenha.value !== inputConfirmarNovaSenha.value) {
            erroNovaSenha.textContent = 'As senhas não coincidem.';
            erroNovaSenha.style.display = 'block';
            return;
        }

        const formData = new FormData(formResetarSenha);

        fetch('../php/resetar_senha.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                hideModals();
                alert('Senha alterada com sucesso! Você já pode fazer o login.');
            } else {
                erroNovaSenha.textContent = data.message || 'Não foi possível alterar a senha.';
                erroNovaSenha.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            erroNovaSenha.textContent = 'Ocorreu um erro. Tente novamente.';
            erroNovaSenha.style.display = 'block';
        });
    });
});
