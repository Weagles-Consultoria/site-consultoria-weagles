<?php
session_start();
$showSuccess = isset($_GET['success']) && $_GET['success'] == '1';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Marcar Consultoria - WEAGLES</title>
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/formulario_consultoria.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/chatbot.css">
    <script src="../javascript/redefinir_senha.js" defer></script>
    <script src="../javascript/chatbot.js" defer></script>
</head>
<body>
    <?php if ($showSuccess): ?>
    <script>
        alert('Dados enviados com sucesso!');
        if (window.history.replaceState) {
            const url = new URL(window.location);
            url.searchParams.delete('success');
            window.history.replaceState(null, null, url);
        }
    </script>
    <?php endif; ?>

    <header id="main-header">
        <div class="container-header">
            <div class="logo">
                <a href="home.php">
                    <img src="../image/032469dd-5117-43d7-a40d-eeb32f25cab3.png" alt="WEAGLES" />
                </a>
            </div>
            <nav class="menu">
                <a href="teste.php">Nossas IAs</a>
                <a href="sobre_nos.php">Sobre nós</a>
                <a href="consultoria.php">Consultoria</a>
                <a href="formulario_consultoria.php" class="active">Marcar consultoria</a>
            </nav>
             <div class="user-actions">
                <?php if (isset($_SESSION['usuario_id'])): ?>
                    <p class="welcome-message">Bem-vindo, <strong><?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></strong>!</p>
                    <form action="../php/logout.php" method="post" style="display:inline;">
                        <button type="submit" class="btn-destaque">Sair</button>
                    </form>
                <?php else: ?>
                    <button id="login-btn" class="btn-destaque" type="button">Entrar</button>
                <?php endif; ?>
            </div>
        </div>
    </header>

<?php if (!isset($_SESSION['usuario_id'])): ?>
    <div id="login-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="fechar" style="cursor:pointer;">×</span>
            <h3>Fazer Login</h3>
            <form id="login-form" action="../php/login.php" method="POST">
                <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                <div class="grupo-formulario">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>
                </div>
                <div class="grupo-formulario">
                    <label for="senha">Senha</label>
                    <div class="password-container">
                        <input type="password" id="senha" name="senha" placeholder="••••••••" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('senha', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </span>
                    </div>
                </div>
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" id="lembre-me" name="lembre-me"> Lembre-me
                    </label>
                    <a href="#" id="link-esqueci-senha" class="forgot-password">Esqueci minha senha</a>
                </div>
                <div class="error-message" id="error-message" style="display:none;">
                    <span class="error-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    </span>
                    E-mail ou senha inválidos.
                </div>
                <div class="formulario-login">
                    <button type="submit" class="button-entrar">Entrar</button>
                </div>
                <div class="form-footer">
                    <span>Novo usuário? <a href="#" id="abrir-cadastro">Cadastre-se</a></span>
                </div>
            </form>
        </div>
    </div>

    <div id="cadastro-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="fechar-cadastro" style="cursor:pointer;">×</span>
            <h3>Criar Nova Conta</h3>
            <form id="cadastro-form" action="../php/cadastro.php" method="POST">
                <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                <div class="grupo-formulario">
                    <label for="cadastro-nome">Nome</label>
                    <input type="text" id="cadastro-nome" name="nome-usuario" required>
                </div>
                <div class="grupo-formulario">
                    <label for="cadastro-email">Email</label>
                    <input type="email" id="cadastro-email" name="email-usuario" required>
                </div>
                
                <div class="grupo-formulario">
                    <label for="cadastro-senha">Senha</label>
                    <div class="password-container">
                        <input type="password"
                        id="cadastro-senha"
                        name="usuario-senha"
                        pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$"
                        title="A senha deve ter no mínimo 8 caracteres, incluindo: maiúscula, minúscula, número e símbolo"
                        required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('cadastro-senha', this)">
                           <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </span>
                    </div>
                    <ul id="password-requirements" class="password-requirements">
                        <li id="req-length">A senha deve conter no mínimo 8 caracteres</li>
                        <li id="req-case">Letras maísculas e mínusculas</li>
                        <li id="req-number">Pelo menos um número</li>
                        <li id="req-symbol">Pelo menos um símbolo</li>
                    </ul>
                </div>

                <div class="grupo-formulario">
                    <label for="confirmar-senha">Confirme sua senha</label>
                    <div class="password-container">
                         <input type="password" id="confirmar-senha" name="confirmar-senha" required>
                         <span class="password-toggle" onclick="togglePasswordVisibility('confirmar-senha', this)">
                           <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </span>
                    </div>
                    <div id="password-match-msg"></div>
                </div>

                <div class="formulario-cadastro">
                    <button type="submit" class="button">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal-esqueci-senha" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="fechar">×</span>
            <h3>Redefinir Senha</h3>
            <form id="form-verificar-email">
                <div class="grupo-formulario">
                    <label for="email-recuperacao">Seu E-mail</label>
                    <input type="email" id="email-recuperacao" name="email" placeholder="exemplo@email.com" required>
                </div>
                <div id="erro-email" class="error-message" style="display: none;"></div>
                <div style="margin-top: 40px;">
                    <button type="submit" class="button">Verificar E-mail</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-nova-senha" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="fechar">×</span>
            <h3>Crie sua Nova Senha</h3>
            <form id="form-resetar-senha">
                <input type="hidden" id="email-confirmado" name="email">
                <div class="grupo-formulario">
                    <label for="nova-senha">Nova Senha</label>
                    <input type="password" id="nova-senha" name="nova_senha" placeholder="••••••••" required>
                </div>
                <div class="grupo-formulario">
                    <label for="confirmar-nova-senha">Confirmar Nova Senha</label>
                    <input type="password" id="confirmar-nova-senha" name="confirmar_nova_senha" placeholder="••••••••" required>
                </div>
                <div id="erro-nova-senha" class="error-message" style="display: none;"></div>
                <div style="margin-top: 40px;">
                    <button type="submit" class="button">Salvar Nova Senha</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>


    <main>
        <div class="form-container">
            
            <div class="breadcrumb">
                <p><a href="../pages/home.php">Início</a> &gt; <a href="../pages/consultoria.php">Consultoria</a> &gt; Cadastro de Consultoria</p>
            </div>

            <form action="../php/criar_cliente.php" method="POST" class="formulario-consultoria">
                <div class="linha">
                    <div class="campo">
                        <label for="razao">Razão Social</label>
                        <input type="text" id="razao" name="razao" placeholder="Minha Empresa LTDA." required>
                    </div>
                    <div class="campo">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" required>
                        <span class="erro-cnpj">❌ Insira um CNPJ válido</span>
                    </div>
                </div>
                <div class="linha">
                    <div class="campo">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>
                    </div>
                    <div class="campo">
                        <label for="telefone">Telefone/Celular</label>
                        <input type="text" id="telefone" name="telefone" placeholder="+55 (XX) XXXXX-XXXX" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="campo">
                        <label for="area">Área da Empresa</label>
                        <input type="text" id="area" name="area" placeholder="Ex: Marketing" required>
                    </div>
                    <div class="campo">
                        <label for="dor">Dor da Empresa</label>
                        <input type="text" id="dor" name="dor" placeholder="Ex: Processos manuais lentos" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="campo" style="flex:1;">
                        <label for="descricao">Descrição do Problema</label>
                        <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o problema..." required></textarea>
                    </div>
                </div>
                <div class="botao-container">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <div class="footer-logo-address-wrapper">
                    <img src="../image/032469dd-5117-43d7-a40d-eeb32f25cab3.png" alt="Weagles Logo" class="footer-logo">
                    <p class="endereco">
                        Centro Empresarial Monte Alto - R. Dr. Raul da Rocha Medeiros, 1624<br>
                        - Centro, Monte Alto - SP, 13º andar<br>
                        CEP: 15910-000
                    </p>
                </div>
                <a href="#" class="map-link">Veja no Maps</a>
            </div>
            <div class="footer-middle">
                <div class="contact-item">
                    <img src="https://api.iconify.design/ph:question.svg?color=white" alt="FAQ Icon" class="contact-icon">
                    <a href="../pages/faq.php">Perguntas Frequentes (FAQ)</a>
                </div>
                <div class="contact-item">
                    <img src="https://api.iconify.design/ic:outline-email.svg?color=white" alt="Email Icon" class="contact-icon">
                    <a href="mailto:consultoriaweagles@gmail.com">consultoriaweagles@gmail.com</a>
                </div>
            </div>
            <div class="footer-right">
                <div class="contact-item">
                    <img src="https://api.iconify.design/mdi:instagram.svg?color=white" alt="Instagram Icon" class="contact-icon">
                    <a href="https://instagram.com/weagles_" target="blank">@weagles</a>
                </div>
                <div class="contact-item">
                    <img src="https://api.iconify.design/ic:baseline-whatsapp.svg?color=white" alt="WhatsApp Icon" class="contact-icon">
                    <a href="https://wa.me/5516997833173" target="_blank">+55 16 99783-3173 (Vitor Augusto Garbim)</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            const loginBtn = document.getElementById("login-btn");
            const openLoginConsultoriaBtn = document.getElementById("open-login-consultoria");
            const loginModal = document.getElementById("login-modal");
            const cadastroModal = document.getElementById("cadastro-modal");
            const modalEsqueci = document.getElementById('modal-esqueci-senha');
            const modalNovaSenha = document.getElementById('modal-nova-senha');

        
        const urlParams = new URLSearchParams(window.location.search);
        const errorMessageDiv = document.getElementById('error-message');

       
        if (urlParams.has('login_error')) {
            const message = 'E-mail ou senha inválidos. Tente novamente.';

            if (loginModal && errorMessageDiv) {
            
                errorMessageDiv.childNodes[2].nodeValue = ` ${message}`;
                errorMessageDiv.style.display = 'flex';
                
               
                loginModal.style.display = 'flex';
            }
        }

            function openLoginModal(e) {
                if (e) e.preventDefault();
                if (loginModal) loginModal.style.display = "flex";
            }

            if(loginBtn) loginBtn.addEventListener("click", openLoginModal);
            if(openLoginConsultoriaBtn) openLoginConsultoriaBtn.addEventListener("click", openLoginModal);
            
            document.querySelectorAll('.fechar, .fechar-cadastro').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.modal').style.display = 'none';
                });
            });

            const abrirCadastro = document.getElementById("abrir-cadastro");
            if(abrirCadastro && cadastroModal && loginModal){
                abrirCadastro.addEventListener("click", function(e){
                    e.preventDefault();
                    loginModal.style.display = "none";
                    cadastroModal.style.display = "flex";
                });
            }

            const linkEsqueciSenha = document.getElementById('link-esqueci-senha');
            if(linkEsqueciSenha && modalEsqueci && loginModal){
                linkEsqueciSenha.addEventListener('click', (e) => {
                    e.preventDefault();
                    loginModal.style.display = "none"; 
                    modalEsqueci.style.display = "flex"; 
                });
            }
            
            const formVerificarEmail = document.getElementById('form-verificar-email');
            if(formVerificarEmail) formVerificarEmail.addEventListener('submit', function(e) {
                e.preventDefault();
                const inputEmailRecuperacao = document.getElementById('email-recuperacao');
                const erroEmail = document.getElementById('erro-email');
                const inputEmailConfirmado = document.getElementById('email-confirmado');
                erroEmail.style.display = 'none';
                const email = inputEmailRecuperacao.value;

                fetch('../php/verificacao_email.php', { 
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: `email=${encodeURIComponent(email)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        modalEsqueci.style.display = 'none';
                        inputEmailConfirmado.value = email;
                        modalNovaSenha.style.display = 'flex';
                    } else {
                        erroEmail.innerHTML = 'E-mail não encontrado.';
                        erroEmail.style.display = 'flex';
                    }
                });
            });

            const formResetarSenha = document.getElementById('form-resetar-senha');
            if(formResetarSenha) formResetarSenha.addEventListener('submit', function(e) {
                e.preventDefault();
                const inputNovaSenha = document.getElementById('nova-senha');
                const inputConfirmarNovaSenha = document.getElementById('confirmar-nova-senha');
                const erroNovaSenha = document.getElementById('erro-nova-senha');
                erroNovaSenha.style.display = 'none';
                
                if (inputNovaSenha.value !== inputConfirmarNovaSenha.value) {
                    erroNovaSenha.innerHTML = 'As senhas não coincidem.';
                    erroNovaSenha.style.display = 'flex';
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
                        modalNovaSenha.style.display = 'none';
                        alert('Senha alterada com sucesso!');
                        loginModal.style.display = 'flex';
                    } else {
                        erroNovaSenha.innerHTML = data.message || 'Erro ao alterar a senha.';
                        erroNovaSenha.style.display = 'flex';
                    }
                });
            });

            window.onclick = function(event) {
                if (event.target == loginModal) loginModal.style.display = "none";
                if (event.target == cadastroModal) cadastroModal.style.display = "none";
                if (modalEsqueci && event.target == modalEsqueci) modalEsqueci.style.display = "none";
                if (modalNovaSenha && event.target == modalNovaSenha) modalNovaSenha.style.display = "none";
            }
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
            elementsToAnimate.forEach(el => observer.observe(el));

            const senhaCadastroInput = document.getElementById('cadastro-senha');
            const confirmarSenhaInput = document.getElementById('confirmar-senha');
            const requirementsList = document.getElementById('password-requirements');
            const msgMatch = document.getElementById('password-match-msg');
            const reqLength = document.getElementById('req-length');
            const reqCase = document.getElementById('req-case');
            const reqNumber = document.getElementById('req-number');
            const reqSymbol = document.getElementById('req-symbol');
            
            if (senhaCadastroInput && requirementsList) {
                senhaCadastroInput.addEventListener('focus', () => {
                    requirementsList.classList.add('visible');
                });

                senhaCadastroInput.addEventListener('blur', () => {
                    if (senhaCadastroInput.value === '') {
                        requirementsList.classList.remove('visible');
                    }
                });
            }

            function validatePassword() {
                const pass = senhaCadastroInput.value;
                pass.length >= 8 ? reqLength.classList.add('valid') : reqLength.classList.remove('valid');
                (/[A-Z]/.test(pass) && /[a-z]/.test(pass)) ? reqCase.classList.add('valid') : reqCase.classList.remove('valid');
                /\d/.test(pass) ? reqNumber.classList.add('valid') : reqNumber.classList.remove('valid');
                /[^A-Za-z0-9]/.test(pass) ? reqSymbol.classList.add('valid') : reqSymbol.classList.remove('valid');
                validatePasswordMatch();
            }

            function validatePasswordMatch() {
                const pass1 = senhaCadastroInput.value;
                const pass2 = confirmarSenhaInput.value;
                if (pass1.length === 0 || pass2.length === 0) {
                     msgMatch.textContent = '';
                     return;
                }
                if (pass1 === pass2) {
                    msgMatch.textContent = 'As senhas correspondem!';
                    msgMatch.className = 'match';
                } else {
                    msgMatch.textContent = 'As senhas não correspondem.';
                    msgMatch.className = 'no-match';
                }
            }

            if(senhaCadastroInput) senhaCadastroInput.addEventListener('input', validatePassword);
            if(confirmarSenhaInput) confirmarSenhaInput.addEventListener('input', validatePasswordMatch);
        }); 

        function togglePasswordVisibility(inputId, toggleElement) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleElement.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
            } else {
                passwordInput.type = 'password';
                toggleElement.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
            }
        }
    </script>
    
    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('main-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, {
            threshold: 0.1
        });

        const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
        elementsToAnimate.forEach(el => observer.observe(el));
    </script>
    
    <script>
   
    document.addEventListener('DOMContentLoaded', function() {
       
        const form = document.querySelector('.formulario-consultoria');
        const formContainer = document.querySelector('.form-container');

        if(form){
          
            form.addEventListener('submit', function(event) {
                
                event.preventDefault();

                
                const formData = new FormData(form);
                const submitButton = form.querySelector('button[type="submit"]');
                
                
                submitButton.disabled = true;
                submitButton.textContent = 'Enviando...';

               
                fetch('../php/criar_cliente.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json()) 
                .then(data => {
                    
                    if (data.success) {
                        
                        formContainer.innerHTML = `
                            <div style="text-align: center; padding: 80px 20px; min-height: 300px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <h1 style="font-family: 'Poppins', sans-serif; font-size: 2.5em; color:rgb(255, 255, 255); margin-bottom: 20px;">Dados Enviados com Sucesso!</h1>
                                <p style="font-family: 'Inter', sans-serif; font-size: 1.2em; color:rgb(255, 255, 255);">Sua solicitação foi recebida. Entraremos em contato em breve.</p>
                            </div>
                        `;
                    } else {
                        
                        alert('Erro: ' + data.message);
                       
                        submitButton.disabled = false;
                        submitButton.textContent = 'Enviar';
                    }
                })
                .catch(error => {
                   
                    console.error('Erro de rede:', error);
                    alert('Não foi possível conectar ao servidor. Tente novamente mais tarde.');
                    
                    submitButton.disabled = false;
                    submitButton.textContent = 'Enviar';
                });
            });
        }
    });
    </script>

    <?php include '../php/chatbot.php'; ?>
</body>
</html>