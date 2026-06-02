<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weagles - Escale sua Empresa com Inteligência Artificial</title>
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/home.css"> 
    <link rel="stylesheet" href="../style/header_fixed.css">
    <link rel="stylesheet" href="../style/formulario_consultoria_modal.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include '../php/header.php'; ?>

    <!-- HERO SECTION: Foco na Dor -->
    <section id="inicio" class="hero">
        <div class="hero-content">
            <h1>Sua operação está engolindo sua margem de lucro?</h1>
            <p class="hero-subtitle">Automatize processos complexos e liberte sua equipe com Agentes de IA customizados.</p>
            <button class="btn-conversao-extrema abrir-modal-consultoria">Agendar Diagnóstico Gratuito</button>
        </div>
    </section>

    <!-- SOCIAL PROOF (Logos) -->
    <section class="social-proof">
        <div class="container">
            <p>Empresas que confiam em nossa tecnologia:</p>
            <div class="logos-clientes">
                <!-- Substituir pelos logos reais -->
                <i class="fa-brands fa-aws fa-3x"></i>
                <i class="fa-brands fa-google fa-3x"></i>
                <i class="fa-brands fa-microsoft fa-3x"></i>
                <i class="fa-brands fa-meta fa-3x"></i>
            </div>
        </div>
    </section>

    <main>
        <!-- SINTOMAS: Identificando o problema -->
        <section id="sintomas" class="container padding-section">
            <h2 class="section-title">Reconhece estes sintomas na sua empresa?</h2>
            <div class="blocos-grid">
                <article class="bloco animate-on-scroll">
                    <h3><i class="fa-solid fa-clock-rotate-left icone-destaque"></i> Processos Lentos</h3>
                    <p>Sua equipe passa horas em tarefas repetitivas e manuais que poderiam ser automatizadas instantaneamente.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <h3><i class="fa-solid fa-money-bill-trend-up icone-destaque"></i> Custos Crescentes</h3>
                    <p>A única forma de crescer atualmente é contratando mais pessoas, diminuindo drasticamente sua margem de lucro.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <h3><i class="fa-solid fa-chart-pie icone-destaque"></i> Falta de Dados</h3>
                    <p>Decisões são tomadas baseadas em intuição, pois compilar e analisar dados cruciais demora muito tempo.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <h3><i class="fa-solid fa-headset icone-destaque"></i> Atendimento Defasado</h3>
                    <p>Clientes insatisfeitos com o tempo de resposta do suporte, resultando em perda de oportunidades de vendas.</p>
                </article>
            </div>
        </section>

        <!-- MECANISMO ÚNICO: A Solução -->
        <section id="solucao" class="container padding-section bg-alternativo">
            <h2 class="section-title">O Mecanismo Único Weagles</h2>
            <div class="solucao-content">
                <p class="texto-central">Não vendemos software de prateleira. Desenvolvemos <strong>Agentes de IA Específicos</strong> para o gargalo da sua operação.</p>
                <div class="blocos-grid">
                    <article class="bloco animate-on-scroll destaque-solucao">
                        <h3>Mapeamento Estratégico</h3>
                        <p>Identificamos onde o esforço humano está sendo desperdiçado no seu funil operacional.</p>
                    </article>
                    <article class="bloco animate-on-scroll destaque-solucao">
                        <h3>Implementação Cirúrgica</h3>
                        <p>Integramos nossa IA aos seus sistemas atuais (CRM, ERP) sem interromper sua operação.</p>
                    </article>
                    <article class="bloco animate-on-scroll destaque-solucao">
                        <h3>Otimização Contínua</h3>
                        <p>A IA aprende e se adapta aos seus processos dia após dia, aumentando a eficiência exponencialmente.</p>
                    </article>
                </div>
            </div>
            <div class="center-cta">
                <button class="btn-conversao-extrema abrir-modal-consultoria">Quero Automatizar Minha Empresa</button>
            </div>
        </section>

        <!-- SOBRE NÓS (Resumido e Focado em Autoridade) -->
        <section id="sobre" class="container padding-section">
            <div class="sobre-grid">
                <div class="sobre-texto">
                    <h2 class="section-title text-left">Quem Somos</h2>
                    <p>A Weagles Consultoria e Tecnologia é pioneira na implementação de soluções práticas de Inteligência Artificial para o mercado B2B brasileiro.</p>
                    <p>Nossa equipe une expertise técnica profunda com visão de negócios, garantindo que cada linha de código gerada se traduza em ROI positivo para sua empresa.</p>
                </div>
                <div class="sobre-imagem animate-on-scroll">
                    <!-- Placeholder para imagem da equipe/escritório -->
                    <div class="img-placeholder">
                        <i class="fa-solid fa-building fa-4x"></i>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section id="faq" class="container padding-section bg-alternativo">
            <h2 class="section-title">Perguntas Frequentes</h2>
            <div class="faq-container">
                <details class="faq-item animate-on-scroll">
                    <summary>A IA vai substituir meus funcionários?</summary>
                    <p>Não. A IA atua como um 'copiloto', assumindo tarefas mecânicas e liberando sua equipe para atividades estratégicas, criativas e de relacionamento com o cliente.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>É preciso mudar meus sistemas atuais?</summary>
                    <p>Na maioria dos casos, não. Nossas soluções são desenvolvidas para se integrar via API aos principais CRMs e ERPs do mercado, funcionando como uma camada de inteligência extra.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>Quanto tempo leva para implementar?</summary>
                    <p>Depende da complexidade, mas projetos de rápida adoção podem ser entregues e começar a gerar valor entre 4 a 8 semanas.</p>
                </details>
            </div>
        </section>
    </main>

    <?php include '../php/footer.php'; ?>
    
    <!-- Modal Wizard de Consultoria -->
    <?php include '../pages/formulario_consultoria_modal.php'; ?>

    <script src="../javascript/formulario_consultoria_wizard.js"></script>
    <script src="../javascript/exit_intent.js"></script>
</body>
</html>