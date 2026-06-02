document.addEventListener('DOMContentLoaded', function() {
    console.log('Site Weagle carregado com sucesso!');
    setupModals();
    setupHeaderScroll();
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('openLogin') === 'true') {
        const loginModal = document.getElementById('login-modal');
        if (loginModal) {
            loginModal.style.display = 'block';
        }
    }
});

function setupModals() {
    var loginModal = document.getElementById('login-modal');
    var loginBtn = document.getElementById('login-btn');
    var closeLoginSpan = loginModal ? loginModal.querySelector('.fechar') : null;
    var goToCadastroBtn = document.getElementById('criar-login-btn');
    var cadastroModal = document.getElementById('cadastro-modal');
    var closeCadastroSpan = cadastroModal ? cadastroModal.querySelector('.fechar-cadastro') : null;
    var goToLoginBtn = document.getElementById('voltar-login-btn');

    if (loginBtn) {
        loginBtn.onclick = function(e) {
            e.preventDefault();
            if (loginModal) loginModal.style.display = 'block';
            if (cadastroModal) cadastroModal.style.display = 'none';
        };
    }

    if (closeLoginSpan) {
        closeLoginSpan.onclick = function() {
            if (loginModal) loginModal.style.display = 'none';
        };
    }

    if (closeCadastroSpan) {
        closeCadastroSpan.onclick = function() {
            if (cadastroModal) cadastroModal.style.display = 'none';
        };
    }

    if (goToCadastroBtn) {
        goToCadastroBtn.onclick = function(e) {
            e.preventDefault();
            if (loginModal) loginModal.style.display = 'none';
            if (cadastroModal) cadastroModal.style.display = 'block';
        };
    }

    if (goToLoginBtn) {
        goToLoginBtn.onclick = function(e) {
            e.preventDefault();
            if (cadastroModal) cadastroModal.style.display = 'none';
            if (loginModal) loginModal.style.display = 'block';
        };
    }

    window.onclick = function(event) {
        if (event.target == loginModal) {
            loginModal.style.display = 'none';
        }
        if (event.target == cadastroModal) {
            cadastroModal.style.display = 'none';
        }
    };

    var loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.onsubmit = function(e) {
            e.preventDefault();
            this.submit();
        };
    }

    var cadastroform = document.getElementById('cadastro-form');
    if (cadastroform) {
        cadastroform.onsubmit = function(e) {
            e.preventDefault();
            var senha = document.getElementById('cadastro-senha').value;
            var confirmarSenha = document.getElementById('confirmar-senha').value;
            if (senha !== confirmarSenha) {
                alert('As senhas não são iguais!');
                return;
            }
            this.submit();
        };
    }
}

let lastScrollTop = 0;

function setupHeaderScroll() {
    var header = document.querySelector('header');
    if (header) {
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            header.classList.toggle('scrolled', scrollTop > 45);

            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.classList.add('header-hidden');
            } else if (scrollTop < lastScrollTop) {
                header.classList.remove('header-hidden');
            }

            if (scrollTop <= 100) {
                header.classList.remove('header-hidden');
            }

            lastScrollTop = Math.max(scrollTop, 0);
        }, { passive: true });
    }
}
