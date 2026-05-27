<header id="main-header">
    <div class="container-header">
        <div class="logo">
            <a href="home.php">
                <img src="../image/032469dd-5117-43d7-a40d-eeb32f25cab3.png" alt="WEAGLES" />
            </a>
        </div>
        
        <nav class="menu">
            <button class="menu-toggle" aria-label="Abrir menu">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="menu-links">
                <a href="teste.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'teste.php' ? 'active' : ''; ?>">Nossas IAs</a>
                <a href="sobre_nos.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'sobre_nos.php' ? 'active' : ''; ?>">Sobre nós</a>
                <a href="consultoria.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'consultoria.php' ? 'active' : ''; ?>">Consultoria</a>
                <a href="formulario_consultoria.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'formulario_consultoria.php' ? 'active' : ''; ?>">Marcar consultoria</a>
            </div>
        </nav>

        <div class="user-actions">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <span class="welcome-message">Olá, <strong><?php echo explode(' ', htmlspecialchars($_SESSION['usuario_nome']))[0]; ?></strong></span>
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
    <!-- Modal de Login -->
    <div id="login-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="fechar" style="cursor:pointer;">&times;</span>
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
                <div class="error-message" id="error-message-login" style="display:none;">
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

    <!-- Modal de Cadastro -->
    <div id="cadastro-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="fechar-cadastro" style="cursor:pointer;">&times;</span>
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
                        <input type="password" id="cadastro-senha" name="usuario-senha" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('cadastro-senha', this)">
                           <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </span>
                    </div>
                </div>
                <div class="formulario-cadastro">
                    <button type="submit" class="button">Salvar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modais de Recuperação -->
    <div id="modal-esqueci-senha" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="fechar" style="cursor:pointer;">&times;</span>
            <h3>Redefinir Senha</h3>
            <form id="form-verificar-email">
                <div class="grupo-formulario">
                    <label for="email-recuperacao">Seu E-mail</label>
                    <input type="email" id="email-recuperacao" name="email" required>
                </div>
                <div id="erro-email" class="error-message" style="display: none;"></div>
                <button type="submit" class="button">Verificar E-mail</button>
            </form>
        </div>
    </div>

    <div id="modal-nova-senha" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="fechar" style="cursor:pointer;">&times;</span>
            <h3>Crie sua Nova Senha</h3>
            <form id="form-resetar-senha">
                <input type="hidden" id="email-confirmado" name="email">
                <div class="grupo-formulario"><input type="password" name="nova_senha" placeholder="Nova Senha" required></div>
                <div class="grupo-formulario"><input type="password" name="confirmar_nova_senha" placeholder="Confirmar" required></div>
                <div id="erro-nova-senha" class="error-message" style="display: none;"></div>
                <button type="submit" class="button">Salvar</button>
            </form>
        </div>
    </div>
<?php endif; ?>
