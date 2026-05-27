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
            <a href="https://www.google.com/maps/place/R.+Dr.+Raul+da+Rocha+Medeiros,+1624+-+Centro,+Monte+Alto+-+SP,+15910-000" target="_blank" class="map-link">Veja no Maps</a>
        </div>
        <div class="footer-middle">
            <div class="contact-item">
                <img src="https://api.iconify.design/ph:question.svg?color=white" alt="FAQ Icon" class="contact-icon">
                <a href="faq.php">Perguntas Frequentes (FAQ)</a>
            </div>
            <div class="contact-item">
                <img src="https://api.iconify.design/ic:outline-email.svg?color=white" alt="Email Icon" class="contact-icon">
                <a href="mailto:consultoriaweagles@gmail.com">consultoriaweagles@gmail.com</a>
            </div>
        </div>
        <div class="footer-right">
            <div class="contact-item">
                <img src="https://api.iconify.design/mdi:instagram.svg?color=white" alt="Instagram Icon" class="contact-icon">
                <a href="https://instagram.com/weagles_" target="_blank">@weagles_</a>
            </div>
            <div class="contact-item">
                <img src="https://api.iconify.design/ic:baseline-whatsapp.svg?color=white" alt="WhatsApp Icon" class="contact-icon">
                <a href="https://wa.me/5516997833173" target="_blank">+55 16 99783-3173 (Vitor)</a>
            </div>
        </div>
    </div>
</footer>

<script>
    // Global Header & Footer JS
    document.addEventListener("DOMContentLoaded", function() {
        // Header Scroll
        window.addEventListener('scroll', function() {
            const header = document.getElementById('main-header');
            if (header) {
                if (window.scrollY > 50) header.classList.add('scrolled');
                else header.classList.remove('scrolled');
            }
        });

        // Mobile Menu
        const menuToggle = document.querySelector('.menu-toggle');
        const menuLinks = document.querySelector('.menu-links');
        if (menuToggle && menuLinks) {
            menuToggle.addEventListener('click', function() {
                menuLinks.classList.toggle('active');
                this.classList.toggle('active');
            });
        }

        // Modals Login/Cadastro
        const loginBtn = document.getElementById("login-btn");
        const loginModal = document.getElementById("login-modal");
        const cadastroModal = document.getElementById("cadastro-modal");
        const modalEsqueci = document.getElementById('modal-esqueci-senha');
        const modalNovaSenha = document.getElementById('modal-nova-senha');

        if (loginBtn && loginModal) {
            loginBtn.addEventListener("click", () => loginModal.style.display = "flex");
        }

        // Handle other login triggers
        document.querySelectorAll('.trigger-login-modal').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                if (loginModal) loginModal.style.display = "flex";
            });
        });

        document.querySelectorAll('.fechar, .fechar-cadastro').forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) modal.style.display = 'none';
            });
        });

        const abrirCadastro = document.getElementById("abrir-cadastro");
        if (abrirCadastro && cadastroModal && loginModal) {
            abrirCadastro.addEventListener("click", (e) => {
                e.preventDefault();
                loginModal.style.display = "none";
                cadastroModal.style.display = "flex";
            });
        }

        const linkEsqueci = document.getElementById('link-esqueci-senha');
        if (linkEsqueci && modalEsqueci && loginModal) {
            linkEsqueci.addEventListener('click', (e) => {
                e.preventDefault();
                loginModal.style.display = "none";
                modalEsqueci.style.display = "flex";
            });
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) event.target.style.display = "none";
        };

        // Scroll animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('is-visible');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
    });

    function togglePasswordVisibility(inputId, toggleElement) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') input.type = 'text';
        else input.type = 'password';
    }
</script>

<?php include '../php/chatbot.php'; ?>
