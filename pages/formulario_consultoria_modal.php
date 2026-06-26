<div id="modal-consultoria-wizard" class="modal" style="display:none;">
    <div class="modal-content modal-wizard">
        <span class="fechar fechar-wizard" style="cursor:pointer;">&times;</span>

        <div class="wizard-header">
            <h3>Diagn&oacute;stico Comercial Gratuito</h3>
            <div class="wizard-progress">
                <div class="progress-bar" id="wizard-progress-bar" style="width: 20%;"></div>
            </div>
            <p class="wizard-step-info">Passo <span id="current-step">1</span> de 5</p>
        </div>

        <form id="form-consultoria-wizard" action="../php/criar_cliente.php" method="POST">
            <div class="wizard-body">
                <div class="wizard-step active" id="step-1">
                    <h4>Qual &eacute; o segmento da sua opera&ccedil;&atilde;o?</h4>
                    <div class="opcoes-grid">
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Saude" required>
                            <i class="fa-solid fa-notes-medical"></i> Sa&uacute;de
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Educacao">
                            <i class="fa-solid fa-graduation-cap"></i> Educa&ccedil;&atilde;o
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Servicos B2B">
                            <i class="fa-solid fa-briefcase"></i> Servi&ccedil;os B2B
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Agencia/Marketing">
                            <i class="fa-solid fa-bullhorn"></i> Ag&ecirc;ncia/Marketing
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Varejo de alto ticket">
                            <i class="fa-solid fa-store"></i> Varejo de alto ticket
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Industria">
                            <i class="fa-solid fa-industry"></i> Ind&uacute;stria
                        </label>
                        <label class="opcao-card opcao-card-full">
                            <input type="radio" name="segmento" value="Outro">
                            <i class="fa-solid fa-ellipsis"></i> Outro
                        </label>
                    </div>
                </div>

                <div class="wizard-step" id="step-2" style="display:none;">
                    <h4>Qual &eacute; o seu papel hoje?</h4>
                    <div class="opcoes-lista">
                        <label class="opcao-linha">
                            <input type="radio" name="cargo" value="Socio/Empresario" required> S&oacute;cio/Empres&aacute;rio
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="cargo" value="Gestor Comercial"> Gestor Comercial
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="cargo" value="Vendedor"> Vendedor
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="cargo" value="Outro"> Outro
                        </label>
                    </div>
                </div>

                <div class="wizard-step" id="step-3" style="display:none;">
                    <h4>Como esta o tamanho do time comercial?</h4>
                    <div class="opcoes-lista">
                        <label class="opcao-linha">
                            <input type="radio" name="time_comercial" value="So eu" required> So eu
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="time_comercial" value="1 a 3 vendedores"> 1 a 3 vendedores
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="time_comercial" value="4 a 10 vendedores"> 4 a 10 vendedores
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="time_comercial" value="Mais de 10 vendedores"> Mais de 10 vendedores
                        </label>
                    </div>
                </div>

                <div class="wizard-step" id="step-4" style="display:none;">
                    <h4>Qual &eacute; a m&eacute;dia de faturamento mensal da sua empresa?</h4>
                    <div class="opcoes-lista">
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="Ate R$ 20 mil" required> At&eacute; R$ 20 mil
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="De R$ 20 mil a R$ 50 mil"> De R$ 20 mil a R$ 50 mil
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="De R$ 50 mil a R$ 100 mil"> De R$ 50 mil a R$ 100 mil
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="Acima de R$ 100 mil"> Acima de R$ 100 mil
                        </label>
                    </div>
                </div>

                <div class="wizard-step" id="step-5" style="display:none;">
                    <h4>Para onde confirmamos sua vaga?</h4>
                    <div class="grupo-formulario">
                        <label for="nome-lead">Nome completo</label>
                        <input type="text" id="nome-lead" name="nome" placeholder="Seu nome completo" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="email-lead">E-mail</label>
                        <input type="email" id="email-lead" name="email" placeholder="seu@email.com" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="whatsapp-lead">WhatsApp</label>
                        <input type="tel" id="whatsapp-lead" name="telefone" placeholder="(16) 99999-9999" required>
                    </div>
                    <p class="wizard-disclaimer">Dados seguros &middot; Criptografia SSL &middot; Sem spam. Um especialista entra em contato via WhatsApp em at&eacute; 4h &uacute;teis para confirmar sua vaga.</p>
                </div>
            </div>

            <div class="wizard-footer">
                <button type="button" class="btn-secundario" id="btn-prev" style="display:none;">Voltar</button>
                <button type="button" class="btn-conversao-extrema-sm" id="btn-next">Pr&oacute;ximo</button>
                <button type="submit" class="btn-conversao-extrema" id="btn-submit" style="display:none;">Quero meu diagn&oacute;stico gratuito</button>
            </div>
        </form>
    </div>
</div>
