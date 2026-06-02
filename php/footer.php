<footer class="footer-dark">
    <div class="container footer-content">
        <div class="footer-info">
            <img src="../image/032469dd-5117-43d7-a40d-eeb32f25cab3.png" alt="Weagles Logo" class="footer-logo">
            <address class="footer-address">
                <p><i class="fa-solid fa-location-dot"></i> Centro Empresarial Monte Alto - R. Dr. Raul da Rocha Medeiros, 1624</p>
                <p>Centro, Monte Alto - SP, 13º andar | CEP: 15910-000</p>
            </address>
            <div class="footer-contacts">
                <a href="mailto:consultoriaweagles@gmail.com"><i class="fa-solid fa-envelope"></i> consultoriaweagles@gmail.com</a>
                <a href="https://wa.me/5516997833173" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i> +55 16 99783-3173</a>
                <a href="https://instagram.com/weagles_" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i> @weagles_</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Weagles Consultoria e Tecnologia. Todos os direitos reservados.</p>
    </div>
</footer>

<!-- Widget independente do fluxo do footer -->
<section id="weglinho-chat" class="weglinho-chat" aria-label="Chat com Weglinho" aria-hidden="true">
    <div class="bot-header">
        <div class="bot-avatar">
            <i class="fa-solid fa-robot"></i>
        </div>
        <div class="bot-status">
            <strong>Weglinho</strong>
            <span>Assistente Virtual (Online)</span>
        </div>
        <button id="close-chat-btn" class="close-chat-btn" type="button" aria-label="Fechar chat">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div id="chat-messages" class="chat-viewport" aria-live="polite">
        <div class="msg-bot">Olá! Como posso ajudar você hoje?</div>
    </div>
    <form id="chat-form" class="chat-input-area">
        <input type="text" id="chat-input" placeholder="Digite sua dúvida..." autocomplete="off" aria-label="Mensagem para Weglinho">
        <button type="submit" id="send-btn" aria-label="Enviar mensagem">
            <i class="fa-solid fa-paper-plane"></i>
        </button>
    </form>
</section>

<button id="weglinho-fab" class="weglinho-fab" type="button" aria-label="Abrir chat com Weglinho" aria-controls="weglinho-chat" aria-expanded="false">
    <i class="fa-solid fa-robot"></i>
</button>

<style>
.footer-dark {
    padding: 4rem 0 1.5rem;
    border-top: 1px solid #1a1c1e;
    background-color: #0a0a0c;
    color: #a0a0a0;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 3rem;
    flex-wrap: wrap;
}

.footer-info {
    flex: 1;
    min-width: 0;
}

.footer-logo {
    width: 150px;
    margin-bottom: 1.5rem;
    filter: brightness(0) invert(1);
}

.footer-address {
    margin-bottom: 2rem;
    font-size: 0.95rem;
    font-style: normal;
    line-height: 1.8;
}

.footer-address i,
.footer-contacts i {
    color: var(--cor-conversao);
}

.footer-address i {
    margin-right: 8px;
}

.footer-contacts {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.footer-contacts a {
    display: flex;
    align-items: center;
    color: #a0a0a0;
    font-size: 0.95rem;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-contacts i {
    width: 20px;
    margin-right: 10px;
}

.footer-contacts a:hover {
    color: #fff;
}

.footer-bottom {
    margin-top: 3rem;
    padding-top: 1.5rem;
    border-top: 1px solid #1a1c1e;
    font-size: 0.8rem;
    text-align: center;
}

.weglinho-chat {
    position: fixed;
    right: 20px;
    bottom: 92px;
    display: flex;
    flex-direction: column;
    width: min(380px, calc(100vw - 40px));
    max-height: min(520px, calc(100vh - 130px));
    overflow: hidden;
    border: 1px solid #2b2e30;
    border-radius: 14px;
    background-color: #121416;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.38);
    opacity: 0;
    pointer-events: none;
    transform: scale(0);
    transform-origin: bottom right;
    visibility: hidden;
    transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s linear 0.3s;
    z-index: 999;
}

.weglinho-chat.is-open {
    opacity: 1;
    pointer-events: auto;
    transform: scale(1);
    visibility: visible;
    transition-delay: 0s;
}

.weglinho-fab {
    position: fixed;
    right: 20px;
    bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 58px;
    height: 58px;
    border: none;
    border-radius: 50%;
    background-color: var(--cor-conversao, #1d9b4b);
    color: #fff;
    cursor: pointer;
    font-size: 23px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
    transition: background-color 0.3s ease, transform 0.3s ease;
    z-index: 999;
}

.weglinho-fab:hover {
    background-color: var(--cor-conversao-hover, #167a3a);
    transform: translateY(-3px);
}

.bot-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 18px;
    border-bottom: 1px solid #2b2e30;
    background-color: #1a1c1e;
}

.bot-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background-color: var(--cor-conversao, #1d9b4b);
    color: #fff;
}

.bot-status {
    display: flex;
    flex: 1;
    flex-direction: column;
}

.bot-status strong {
    color: #fff;
    font-size: 0.9rem;
}

.bot-status span {
    color: #00c853;
    font-size: 0.75rem;
}

.close-chat-btn {
    border: none;
    background: transparent;
    color: #a0a0a0;
    cursor: pointer;
    font-size: 18px;
}

.close-chat-btn:hover {
    color: #fff;
}

.chat-viewport {
    display: flex;
    flex-direction: column;
    gap: 10px;
    height: 260px;
    padding: 15px;
    overflow-y: auto;
}

.msg-bot,
.msg-user {
    max-width: 85%;
    padding: 10px 15px;
    color: #eee;
    font-size: 0.9rem;
}

.msg-bot {
    align-self: flex-start;
    border-radius: 15px 15px 15px 2px;
    background-color: #25282b;
}

.msg-user {
    align-self: flex-end;
    border-radius: 15px 15px 2px 15px;
    background-color: var(--cor-conversao, #1d9b4b);
}

.chat-input-area {
    display: flex;
    gap: 8px;
    padding: 10px;
    background-color: #1a1c1e;
}

.chat-input-area input {
    min-width: 0;
    flex: 1;
    padding: 10px 15px;
    border: 1px solid #333;
    border-radius: 20px;
    background-color: #0a0a0c;
    color: #fff;
    font-size: 0.85rem;
}

.chat-input-area input:focus {
    border-color: var(--cor-conversao, #1d9b4b);
    outline: none;
}

#send-btn {
    width: 38px;
    height: 38px;
    border: none;
    border-radius: 50%;
    background-color: var(--cor-conversao, #1d9b4b);
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

#send-btn:hover {
    background-color: var(--cor-conversao-hover, #167a3a);
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer-address {
        text-align: center;
    }

    .footer-contacts a {
        justify-content: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const header = document.getElementById('main-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const menuLinks = document.querySelector('.menu-links');
    const chat = document.getElementById('weglinho-chat');
    const fab = document.getElementById('weglinho-fab');
    const closeChatBtn = document.getElementById('close-chat-btn');
    const chatForm = document.getElementById('chat-form');
    const loginModal = document.getElementById('login-modal');
    const cadastroModal = document.getElementById('cadastro-modal');
    const modalEsqueci = document.getElementById('modal-esqueci-senha');
    let lastScrollTop = 0;

    function updateHeader() {
        if (header) {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

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
        }
    }

    function toggleChat(forceOpen) {
        const isOpen = typeof forceOpen === 'boolean'
            ? forceOpen
            : !chat.classList.contains('is-open');
        chat.classList.toggle('is-open', isOpen);
        chat.setAttribute('aria-hidden', String(!isOpen));
        fab.setAttribute('aria-expanded', String(isOpen));
        fab.setAttribute('aria-label', isOpen ? 'Fechar chat com Weglinho' : 'Abrir chat com Weglinho');
        if (isOpen) {
            document.getElementById('chat-input').focus();
        }
    }

    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    if (menuToggle && menuLinks) {
        menuToggle.addEventListener('click', function () {
            const isOpen = menuLinks.classList.toggle('active');
            menuToggle.setAttribute('aria-expanded', String(isOpen));
            menuToggle.setAttribute('aria-label', isOpen ? 'Fechar menu' : 'Abrir menu');
        });
    }

    document.querySelectorAll('#login-btn, .trigger-login-modal').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            if (loginModal) loginModal.style.display = 'flex';
        });
    });

    document.querySelectorAll('.fechar, .fechar-cadastro').forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = button.closest('.modal');
            if (modal) modal.style.display = 'none';
        });
    });

    const abrirCadastro = document.getElementById('abrir-cadastro');
    if (abrirCadastro && cadastroModal && loginModal) {
        abrirCadastro.addEventListener('click', function (event) {
            event.preventDefault();
            loginModal.style.display = 'none';
            cadastroModal.style.display = 'flex';
        });
    }

    const linkEsqueci = document.getElementById('link-esqueci-senha');
    if (linkEsqueci && modalEsqueci && loginModal) {
        linkEsqueci.addEventListener('click', function (event) {
            event.preventDefault();
            loginModal.style.display = 'none';
            modalEsqueci.style.display = 'flex';
        });
    }

    window.addEventListener('click', function (event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });

    if (!document.getElementById('modal-consultoria-wizard')) {
        document.querySelectorAll('.abrir-modal-consultoria').forEach(function (button) {
            button.addEventListener('click', function () {
                window.location.href = 'consultoria.php';
            });
        });
    }

    fab.addEventListener('click', function () {
        toggleChat();
    });

    closeChatBtn.addEventListener('click', function () {
        toggleChat(false);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && chat.classList.contains('is-open')) {
            toggleChat(false);
            fab.focus();
        }
    });

    chatForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        const input = document.getElementById('chat-input');
        const viewport = document.getElementById('chat-messages');
        const msg = input.value.trim();

        if (!msg) return;

        const userDiv = document.createElement('div');
        userDiv.className = 'msg-user';
        userDiv.textContent = msg;
        viewport.appendChild(userDiv);
        input.value = '';
        viewport.scrollTop = viewport.scrollHeight;

        try {
            const response = await fetch('http://localhost:5000/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ msg: msg })
            });

            if (!response.ok) throw new Error('Falha ao consultar o assistente.');
            const data = await response.json();
            appendBotMessage(data.resposta || 'Não consegui processar sua solicitação.');
        } catch (error) {
            console.error('Erro ao conectar com chatbot:', error);
            appendBotMessage('Não foi possível conectar ao assistente agora.');
        }

        function appendBotMessage(message) {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg-bot';
            botDiv.textContent = message;
            viewport.appendChild(botDiv);
            viewport.scrollTop = viewport.scrollHeight;
        }
    });

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) entry.target.classList.add('is-visible');
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.animate-on-scroll').forEach(function (element) {
        observer.observe(element);
    });
});

function togglePasswordVisibility(inputId, toggleElement) {
    const input = document.getElementById(inputId);
    if (!input) return;
    input.type = input.type === 'password' ? 'text' : 'password';
    toggleElement.setAttribute('aria-label', input.type === 'password' ? 'Mostrar senha' : 'Ocultar senha');
}
</script>
