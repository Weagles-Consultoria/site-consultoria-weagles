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
    <title>Perguntas Frequentes - Weagles</title>
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/faq.css"> 
    <link rel="stylesheet" href="../style/header_fixed.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <?php include '../php/header.php'; ?>

    <main class="container-faq">
        <div class="breadcrumb">
            <p><a href="home.php">Início</a> > Perguntas Frequentes (FAQ)</p>
        </div>

        <div class="faq-header">
            <h2>Perguntas Frequentes</h2>
        </div>

        <section class="faq-list">
            <details class="faq-item">
                <summary class="faq-question">O que a Weagles faz exatamente?</summary>
                <div class="faq-answer">
                    <p>A Weagles desenvolve agentes de inteligência artificial personalizados para otimizar processos, automatizar tarefas e gerar insights valiosos para empresas de diversos setores.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">Quais tipos de agentes de inteligência artificial a Weagles desenvolve?</summary>
                <div class="faq-answer">
                    <p>Criamos desde chatbots para atendimento ao cliente e assistentes virtuais até sistemas complexos de análise de dados e automação de processos, sempre focados nas necessidades do seu negócio.</p>
                </div>
            </details>
            
            <details class="faq-item">
                <summary class="faq-question">A Weagles atende empresas de quais segmentos?</summary>
                <div class="faq-answer">
                    <p>Nossas soluções são flexíveis e podem ser aplicadas a praticamente qualquer segmento, incluindo varejo, saúde, finanças, indústria e tecnologia, adaptando a IA aos desafios específicos de cada área.</p>
                </div>
            </details>
            
            <details class="faq-item">
                <summary class="faq-question">Como funciona o processo de consultoria em IA da Weagles?</summary>
                <div class="faq-answer">
                    <p>Nosso processo começa com um diagnóstico para entender seus desafios, seguido pelo desenho de uma solução sob medida. Depois, desenvolvemos, implementamos e acompanhamos os resultados para garantir o sucesso do projeto.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">Minha empresa é pequena. Posso contratar os serviços da Weagles?</summary>
                <div class="faq-answer">
                    <p>Com certeza. Oferecemos soluções escaláveis que atendem desde startups e pequenas empresas até grandes corporações, democratizando o acesso à inteligência artificial de ponta.</p>
                </div>
            </details>

            <details class="faq-item">
                <summary class="faq-question">Quanto tempo leva para implementar um agente de IA personalizado?</summary>
                <div class="faq-answer">
                    <p>O prazo varia com a complexidade do agente. Projetos mais simples podem ser implementados em poucas semanas, enquanto soluções mais robustas podem levar alguns meses. Fornecemos sempre um cronograma claro e detalhado.</p>
                </div>
            </details>
            
            <details class="faq-item" open>
                <summary class="faq-question">Os agentes de IA da Weagles substituem equipes humanas?</summary>
                <div class="faq-answer">
                    <p>Os agentes de inteligência artificial da Weagles não substituem equipes humanas, mas atuam como aliados estratégicos para potencializar resultados. Assim como outras soluções modernas de IA, esses agentes são desenvolvidos para apoiar e complementar o trabalho das pessoas, automatizando tarefas repetitivas, analisando grandes volumes de dados e fornecendo insights que facilitam a tomada de decisão.</p>
                    <p>O objetivo é liberar os profissionais para focarem em atividades de maior valor, como criatividade, liderança e relacionamento com clientes, enquanto a IA cuida de processos operacionais e análises detalhadas. Essa colaboração entre humanos e agentes de IA cria equipes híbridas, onde a tecnologia amplia a produtividade e eficiência, mas não elimina a necessidade do talento humano.</p>
                    <p>Portanto, os agentes de IA da Weagles são parceiros digitais que otimizam o desempenho das equipes, promovendo uma integração inteligente entre pessoas e tecnologia para alcançar melhores resultados.</p>
                </div>
            </details>
        </section>
    </main>

    <?php include '../php/footer.php'; ?>
</body>
</html>