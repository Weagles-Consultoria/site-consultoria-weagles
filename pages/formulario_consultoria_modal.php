<div id="modal-consultoria-wizard" class="modal" style="display:none;">
    <div class="modal-content modal-wizard">
        <span class="fechar fechar-wizard" style="cursor:pointer;">&times;</span>

        <div class="wizard-header">
            <h3>Diagnóstico Comercial Gratuito</h3>
            <div class="wizard-progress">
                <div class="progress-bar" id="wizard-progress-bar" style="width: 25%;"></div>
            </div>
            <p class="wizard-step-info">Passo <span id="current-step">1</span> de 4</p>
        </div>

        <form id="form-consultoria-wizard" action="../php/criar_cliente.php" method="POST">
            <div class="wizard-body">
                <div class="wizard-step active" id="step-1">
                    <h4>Qual é o segmento da sua operação?</h4>
                    <div class="opcoes-grid">
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Saúde" required>
                            <i class="fa-solid fa-notes-medical"></i> Saúde
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Educação">
                            <i class="fa-solid fa-graduation-cap"></i> Educação
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Serviços B2B">
                            <i class="fa-solid fa-briefcase"></i> Serviços B2B
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Agência/Marketing">
                            <i class="fa-solid fa-bullhorn"></i> Agência/Marketing
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Varejo de alto ticket">
                            <i class="fa-solid fa-store"></i> Varejo de alto ticket
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Indústria">
                            <i class="fa-solid fa-industry"></i> Indústria
                        </label>
                        <label class="opcao-card opcao-card-full">
                            <input type="radio" name="segmento" value="Outro">
                            <i class="fa-solid fa-ellipsis"></i> Outro
                        </label>
                    </div>
                </div>

                <div class="wizard-step" id="step-2" style="display:none;">
                    <h4>Qual é o seu papel hoje?</h4>
                    <div class="opcoes-lista">
                        <label class="opcao-linha">
                            <input type="radio" name="cargo" value="Sócio/Empresário" required> Sócio/Empresário
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
                    <h4>Como está o tamanho do time comercial?</h4>
                    <div class="opcoes-lista">
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="Só eu" required> Só eu
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="1 a 3 vendedores"> 1 a 3 vendedores
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="4 a 10 vendedores"> 4 a 10 vendedores
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="Mais de 10 vendedores"> Mais de 10 vendedores
                        </label>
                    </div>
                </div>

                <div class="wizard-step" id="step-4" style="display:none;">
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
                    <div class="grupo-formulario">
                        <label for="dor-lead">Qual é a maior dor da sua operação comercial hoje?</label>
                        <textarea id="dor-lead" name="dor" rows="3" placeholder="Ex.: meu time não faz follow-up, eu não sei onde estou perdendo venda, falta previsibilidade..." required></textarea>
                    </div>
                    <p class="wizard-disclaimer">Dados seguros · Criptografia SSL · Sem spam. Um especialista entra em contato via WhatsApp em até 4h úteis para confirmar sua vaga.</p>
                </div>
            </div>

            <div class="wizard-footer">
                <button type="button" class="btn-secundario" id="btn-prev" style="display:none;">Voltar</button>
                <button type="button" class="btn-conversao-extrema-sm" id="btn-next">Próximo</button>
                <button type="submit" class="btn-conversao-extrema" id="btn-submit" style="display:none;">Quero meu diagnóstico gratuito</button>
            </div>
        </form>
    </div>
</div>
