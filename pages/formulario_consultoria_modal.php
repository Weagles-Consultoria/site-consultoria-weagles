<div id="modal-consultoria-wizard" class="modal" style="display:none;">
    <div class="modal-content modal-wizard">
        <span class="fechar fechar-wizard" style="cursor:pointer;">&times;</span>
        
        <div class="wizard-header">
            <h3>Diagnóstico de Automação</h3>
            <div class="wizard-progress">
                <div class="progress-bar" id="wizard-progress-bar" style="width: 25%;"></div>
            </div>
            <p class="wizard-step-info">Passo <span id="current-step">1</span> de 4</p>
        </div>

        <form id="form-consultoria-wizard" action="../php/criar_cliente.php" method="POST">
            <div class="wizard-body">
                <!-- Passo 1: Segmento -->
                <div class="wizard-step active" id="step-1">
                    <h4>Qual o segmento da sua empresa?</h4>
                    <div class="opcoes-grid">
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Saúde" required>
                            <i class="fa-solid fa-notes-medical"></i> Saúde/Clínicas
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Varejo/E-commerce">
                            <i class="fa-solid fa-store"></i> Varejo/E-commerce
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Indústria">
                            <i class="fa-solid fa-industry"></i> Indústria
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Serviços B2B">
                            <i class="fa-solid fa-briefcase"></i> Serviços B2B
                        </label>
                        <label class="opcao-card">
                            <input type="radio" name="segmento" value="Outros">
                            <i class="fa-solid fa-ellipsis"></i> Outros
                        </label>
                    </div>
                </div>

                <!-- Passo 2: Cargo -->
                <div class="wizard-step" id="step-2" style="display:none;">
                    <h4>Qual o seu cargo atual?</h4>
                    <div class="grupo-formulario">
                        <select name="cargo" id="cargo" required class="select-moderno">
                            <option value="" disabled selected>Selecione seu cargo...</option>
                            <option value="CEO/Fundador">CEO / Diretor / Fundador</option>
                            <option value="Gerente/Coordenador">Gerente / Coordenador</option>
                            <option value="Analista/Especialista">Analista / Especialista</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                </div>

                <!-- Passo 3: Faturamento -->
                <div class="wizard-step" id="step-3" style="display:none;">
                    <h4>Qual a faixa de faturamento mensal da empresa?</h4>
                    <p class="dica-wizard">Isso nos ajuda a dimensionar a solução correta.</p>
                    <div class="opcoes-lista">
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="Até 50k" required> Até R$ 50.000,00
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="50k a 200k"> R$ 50.000 a R$ 200.000
                        </label>
                        <label class="opcao-linha">
                            <input type="radio" name="faturamento" value="Acima de 200k"> Acima de R$ 200.000,00
                        </label>
                    </div>
                </div>

                <!-- Passo 4: Contato -->
                <div class="wizard-step" id="step-4" style="display:none;">
                    <h4>Para onde enviamos o diagnóstico?</h4>
                    <div class="grupo-formulario">
                        <label for="nome-lead">Nome Completo</label>
                        <input type="text" id="nome-lead" name="nome" placeholder="Seu nome" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="email-lead">E-mail Corporativo</label>
                        <input type="email" id="email-lead" name="email" placeholder="seu@email.com.br" required>
                    </div>
                    <div class="grupo-formulario">
                        <label for="whatsapp-lead">WhatsApp</label>
                        <input type="tel" id="whatsapp-lead" name="telefone" placeholder="(11) 99999-9999" required>
                    </div>
                    <!-- Campos ocultos para manter compatibilidade com rota antiga se necessário -->
                    <input type="hidden" name="mensagem" value="Lead via Landing Page (Wizard)">
                </div>
            </div>

            <div class="wizard-footer">
                <button type="button" class="btn-secundario" id="btn-prev" style="display:none;">Voltar</button>
                <button type="button" class="btn-conversao-extrema-sm" id="btn-next">Próximo</button>
                <button type="submit" class="btn-conversao-extrema" id="btn-submit" style="display:none;">Concluir e Enviar</button>
            </div>
        </form>
    </div>
</div>
