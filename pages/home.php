<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$metaPixelId = getenv('META_PIXEL_ID') ?: '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEAGLES | Programa de Aceleração Comercial</title>
    <meta name="description" content="A Weagles mapeia os indicadores do seu funil comercial e cria um plano de ação semana a semana para seu time bater meta com previsibilidade.">
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/header_fixed.css">
    <link rel="stylesheet" href="../style/formulario_consultoria_modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<?php if ($metaPixelId !== ''): ?>
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo htmlspecialchars($metaPixelId, ENT_QUOTES, 'UTF-8'); ?>');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=<?php echo rawurlencode($metaPixelId); ?>&ev=PageView&noscript=1"
            alt="">
    </noscript>
<?php endif; ?>
</head>
<body>
    <?php include '../php/header.php'; ?>

    <section id="inicio" class="hero">
        <div class="hero-shell container">
            <div class="hero-content">
                <span class="hero-badge">Programa de Aceleração Comercial</span>
                <h1>Sua empresa tem meta. Mas você sabe o que cada vendedor precisa fazer essa semana para bater?</h1>
                <p class="hero-subtitle">A Weagles mapeia os indicadores do seu funil comercial e cria um plano de ação semana a semana. Sem achismo. Sem depender do mercado. Só números e execução.</p>
                <div class="hero-actions">
                    <button class="btn-conversao-extrema abrir-modal-consultoria" type="button">Quero meu diagnóstico gratuito</button>
                </div>
                <p class="hero-proof">★★★★★ +100 empresas aceleradas · Times que batem meta todo mês</p>
            </div>
        </div>
    </section>

    <section class="social-proof">
        <div class="container">
            <p class="eyebrow">Empresas que aceleraram com a Weagles:</p>
            <div class="logos-carousel" aria-label="Empresas que aceleraram com a Weagles">
                <div class="logos-track">
                    <span>Kasa da Langerie</span>
                    <span>Porto Sono</span>
                    <span>AP Móveis</span>
                    <span>Mad Lajes</span>
                    <span>Volplast</span>
                    <span>Mundo Encantado</span>
                    <span>Viveiro Santo Antonio</span>
                    <span>Protecom</span>
                    <span>Kasa da Langerie</span>
                    <span>Porto Sono</span>
                    <span>AP Móveis</span>
                    <span>Mad Lajes</span>
                    <span>Volplast</span>
                    <span>Mundo Encantado</span>
                    <span>Viveiro Santo Antonio</span>
                    <span>Protecom</span>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section id="programa" class="container padding-section">
            <h2 class="section-title">Reconhece algum desses sintomas na sua operação?</h2>
            <div class="blocos-grid sintomas-grid">
                <article class="bloco animate-on-scroll">
                    <span class="card-kicker">Meta virou esperança</span>
                    <p>Você coloca a meta no início do mês, o time olha pra cima e reza. No final do mês, você descobre se bateu ou não. Sem controle, sem previsão, sem plano.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <span class="card-kicker">Vendedor que some no follow-up</span>
                    <p>O lead chegou, foi atendido, mandou mensagem e o vendedor parou de acompanhar. A venda que poderia ter fechado foi pra concorrente que insistiu um dia a mais.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <span class="card-kicker">Você não sabe onde está o buraco</span>
                    <p>Você sente que está perdendo venda, mas não sabe se é no atendimento, no agendamento, no fechamento ou no ticket médio. Sem número, você não sabe o que consertar.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <span class="card-kicker">Cada mês começa do zero</span>
                    <p>Não tem processo, não tem cadência, não tem rotina. O que funcionou esse mês depende de quem estava animado. No próximo mês, começa tudo de novo.</p>
                </article>
                <article class="bloco animate-on-scroll">
                    <span class="card-kicker">Cobrança sem direção</span>
                    <p>Você cobra meta, mas não sabe o que pedir para cada vendedor fazer. Quantos leads ele precisa? Quantas ligações? Quantos agendamentos? Sem número, a cobrança não tem fundamento.</p>
                </article>
            </div>
        </section>

        <section class="trap-section">
            <div class="container padding-section">
                <h2 class="section-title light">Você provavelmente está tentando resolver isso do jeito errado.</h2>
                <div class="myths-grid">
                    <article class="myth-card animate-on-scroll">
                        <h3>"Preciso contratar mais vendedor"</h3>
                        <p><strong>Falso.</strong> Mais vendedor sem processo só multiplica o problema. Se o funil está furado, mais gente dentro do funil só aumenta o desperdício. O problema não é quantidade, é estrutura.</p>
                    </article>
                    <article class="myth-card animate-on-scroll">
                        <h3>"Preciso investir mais em tráfego"</h3>
                        <p><strong>Falso.</strong> Mais lead entrando num funil sem acompanhamento é mais lead perdido. Tráfego amplifica o resultado que você já tem. Se o resultado está ruim, mais tráfego só aumenta o custo.</p>
                    </article>
                    <article class="myth-card animate-on-scroll">
                        <h3>"Preciso de um CRM melhor"</h3>
                        <p><strong>Falso.</strong> Ferramenta sem processo é agenda cara. CRM não cria follow-up, não treina vendedor, não define meta por indicador. Quem faz isso é o método, o CRM só registra.</p>
                    </article>
                    <article class="myth-card animate-on-scroll">
                        <h3>"O mercado está difícil"</h3>
                        <p><strong>Falso.</strong> Meta não depende do presidente, da inflação ou do mercado desaquecido. Meta depende de matemática. Quem conhece seus números consegue planejar e bater meta em qualquer cenário.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="indicadores" class="container padding-section">
            <h2 class="section-title">Meta não é sorte. Meta é matemática.</h2>
            <p class="texto-central">A Weagles acredita que por trás de toda meta existem cálculos. E para cada cálculo, existe um plano de ação. Quando você entende seus números, você para de torcer e começa a planejar.</p>
            <div class="indicators-grid">
                <article class="indicator-card animate-on-scroll">
                    <h3>Geração de Oportunidades</h3>
                    <p>Quantos leads chegam por semana? Por qual canal? Sua empresa tem leads suficientes para bater a meta ou está pedindo milagre com volume insuficiente?</p>
                </article>
                <article class="indicator-card animate-on-scroll">
                    <h3>Taxa de Resposta</h3>
                    <p>Dos leads que chegam, quantos respondem? Um lead que não responde é dinheiro que você já gastou e jogou fora. Existe um processo para recuperar esses leads?</p>
                </article>
                <article class="indicator-card animate-on-scroll">
                    <h3>Taxa de Agendamento</h3>
                    <p>Dos leads que respondem, quantos avançam para uma reunião ou avaliação? Seu pré-vendedor está vendendo o agendamento ou só marcando horário?</p>
                </article>
                <article class="indicator-card animate-on-scroll">
                    <h3>Taxa de Comparecimento</h3>
                    <p>Dos que agendaram, quantos aparecem? No-show alto é sinal de agendamento fraco, sem confirmação, sem expectativa criada, sem compromisso.</p>
                </article>
                <article class="indicator-card animate-on-scroll">
                    <h3>Taxa de Fechamento</h3>
                    <p>Dos que aparecem, quantos fecham? Seu vendedor sabe contornar objeção? Tem script? Tem arsenal de fechamento? Ou improvisa toda reunião?</p>
                </article>
                <article class="indicator-card animate-on-scroll">
                    <h3>Ticket Médio</h3>
                    <p>Quanto cada venda vale? Existe upsell, cross-sell, oferta de maior valor? Ou o vendedor sempre vai pelo menor preço para fechar mais fácil?</p>
                </article>
            </div>
            <div class="center-cta">
                <button class="btn-conversao-extrema abrir-modal-consultoria" type="button">Quero mapear meus indicadores</button>
            </div>
        </section>

        <section class="deliveries-section">
            <div class="container padding-section">
                <h2 class="section-title light">Um programa completo. Semana após semana.</h2>
                <div class="deliveries-grid">
                    <article class="delivery-card animate-on-scroll">
                        <h3>Calculadora Comercial</h3>
                        <p>Você descobre exatamente quantas oportunidades, agendamentos e fechamentos seu time precisa para bater a meta. O número deixa de ser meta e vira missão com plano.</p>
                    </article>
                    <article class="delivery-card animate-on-scroll">
                        <h3>Treinamento do Time</h3>
                        <p>Pré-vendedor aprende a qualificar, agendar e vender o próximo passo. Closer aprende a apresentar, contornar objeção e fechar. Tudo documentado, tudo replicável.</p>
                    </article>
                    <article class="delivery-card animate-on-scroll">
                        <h3>Acompanhamento Semanal</h3>
                        <p>A Weagles acompanha os indicadores do seu time toda semana. Se um número caiu, a gente identifica onde está o problema e define o plano de ação. Sem achismo.</p>
                    </article>
                    <article class="delivery-card animate-on-scroll">
                        <h3>CRM com Método</h3>
                        <p>Cada lead registrado. Cada follow-up controlado. Cada etapa do funil visível. Você para de perder venda por esquecimento e começa a vender por processo.</p>
                    </article>
                    <article class="delivery-card animate-on-scroll">
                        <h3>Diagnóstico de Vazamentos</h3>
                        <p>A Weagles mostra exatamente onde sua empresa está perdendo dinheiro, se é na resposta, no agendamento, no fechamento ou no ticket médio. E define a ação corretiva certa para cada um.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="cases" class="container padding-section">
            <h2 class="section-title">Empresários que pararam de torcer e começaram a planejar.</h2>
            <div class="cases-grid">
                <article class="case-card animate-on-scroll">
                    <div class="case-media">
                        <video controls poster="../image/poster_kasa_langerie.jpg">
                            <source src="../videos/relatoKasaLangeries.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="case-copy">
                        <h3>Kasa da Langerie</h3>
                        <p>Reorganizou o processo comercial e ganhou previsibilidade sobre atendimento, follow-up e conversão no varejo.</p>
                    </div>
                </article>
                <article class="case-card animate-on-scroll">
                    <div class="case-media">
                        <video controls poster="../image/poster_porto_sono.jpg">
                            <source src="../videos/relatoPortoSono.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="case-copy">
                        <h3>Porto Sono</h3>
                        <p>Melhorou a gestão comercial com acompanhamento de indicadores e clareza sobre o que cada etapa do funil precisava entregar.</p>
                    </div>
                </article>
                <article class="case-quote animate-on-scroll">
                    <p>"Clínica de estética em Monte Alto aumentou o faturamento em X% em 60 dias após mapear os indicadores comerciais com a Weagles."</p>
                    <span>Modelo de case sem nome</span>
                </article>
            </div>
        </section>

        <section id="sobre" class="about-section">
            <div class="container padding-section about-layout">
                <div class="about-copy">
                    <h2 class="section-title text-left light">Quem está por trás da Weagles</h2>
                    <p>Vitor Garbin e João construíram a Weagles com uma crença simples: meta não é sorte. É matemática.</p>
                    <p>Depois de anos acompanhando empresas de perto, percebemos que o problema nunca era o mercado ou o vendedor. Era a falta de número. Sem indicador, não tem cobrança. Sem cobrança, não tem resultado.</p>
                    <p>Por isso criamos o Programa de Aceleração Comercial, um método que mapeia os números do seu funil, treina o time e acompanha a execução semana a semana. Até a meta ser uma consequência, não uma esperança.</p>
                    <div class="about-stats">
                        <div>
                            <strong>+100</strong>
                            <span>empresas aceleradas</span>
                        </div>
                        <div>
                            <strong>+3</strong>
                            <span>cidades atendidas na região de Ribeirão Preto</span>
                        </div>
                        <div>
                            <strong>Todo mês</strong>
                            <span>times treinados batendo meta</span>
                        </div>
                    </div>
                </div>
                <div class="about-images animate-on-scroll">
                    <img src="../image/marketing.JPG" alt="Vitor Garbin">
                    <img src="../image/ceo.jpg" alt="João, sócio da Weagles">
                </div>
            </div>
        </section>

        <section class="container padding-section">
            <h2 class="section-title">O diagnóstico não é papo de vendedor. É análise real da sua operação.</h2>
            <div class="diagnostic-grid">
                <article class="diagnostic-card animate-on-scroll">
                    <h3>Mapa do seu funil</h3>
                    <p>Onde está o maior vazamento, geração, resposta, agendamento, fechamento ou ticket.</p>
                </article>
                <article class="diagnostic-card animate-on-scroll">
                    <h3>Sua calculadora comercial</h3>
                    <p>Quantas oportunidades, agendamentos e fechamentos seu time precisa por semana para bater a meta.</p>
                </article>
                <article class="diagnostic-card animate-on-scroll">
                    <h3>Plano de ação imediato</h3>
                    <p>O que fazer primeiro para melhorar o indicador mais crítico da sua operação.</p>
                </article>
                <article class="diagnostic-card animate-on-scroll">
                    <h3>Diagnóstico do seu time</h3>
                    <p>Se o problema está no processo, no treinamento ou na ferramenta, e o que precisa mudar.</p>
                </article>
            </div>
            <div class="center-cta">
                <button class="btn-conversao-extrema abrir-modal-consultoria" type="button">Quero meu diagnóstico gratuito</button>
            </div>
        </section>

        <section class="fit-section">
            <div class="container padding-section fit-layout">
                <div>
                    <h2 class="section-title text-left light">É para você se:</h2>
                    <ul class="fit-list">
                        <li>Você tem um time comercial ativo, pré-vendedor, vendedor ou você mesmo fazendo os dois.</li>
                        <li>Você vende por reunião, proposta, orçamento, avaliação ou call.</li>
                        <li>Você quer bater meta com processo, não com sorte.</li>
                        <li>Você aceita ser cobrado por número toda semana.</li>
                        <li>Você está disposto a implementar, não só ouvir.</li>
                    </ul>
                </div>
                <div>
                    <h2 class="section-title text-left light">Não é para você se:</h2>
                    <ul class="fit-list muted">
                        <li>Você depende só de cliente entrar na loja e não tem processo comercial nenhum.</li>
                        <li>Você acha que o problema é o mercado, não a operação.</li>
                        <li>Você não quer que seu time seja cobrado por indicador.</li>
                        <li>Você quer resultado sem mudança de processo.</li>
                        <li>Você quer só testar sem compromisso de implementar.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="faq" class="container padding-section">
            <h2 class="section-title">FAQ</h2>
            <div class="faq-container">
                <details class="faq-item animate-on-scroll">
                    <summary>O diagnóstico tem custo?</summary>
                    <p>Zero custo, zero compromisso. É 100% gratuito. A Weagles investe no diagnóstico porque sabe que parte dos empresários que passa por ele decide contratar o programa. Mas isso é decisão sua, sem pressão.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>Funciona para o tamanho da minha empresa?</summary>
                    <p>Se você tem time comercial ativo e vende por reunião, proposta ou call, funciona. Já aceleramos empresas de diferentes tamanhos e segmentos. O método se adapta ao seu funil, não o contrário.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>Em quanto tempo vejo resultado?</summary>
                    <p>Os primeiros resultados aparecem nas primeiras semanas, quando o time passa a ter número para correr atrás. Melhora de indicadores começa em 30 a 60 dias. Meta batida de forma consistente entre 3 e 6 meses.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>Meu segmento é diferente. Funciona?</summary>
                    <p>Se você vende com processo, reunião, proposta, avaliação ou orçamento, funciona. Já aceleramos clínicas, agências, prestadores de serviço, varejo de alto ticket e empresas B2B.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>Posso trazer meu sócio?</summary>
                    <p>Sim, e recomendamos. Decisões que envolvem time comercial são mais rápidas quando os dois sócios ouvem juntos.</p>
                </details>
                <details class="faq-item animate-on-scroll">
                    <summary>O que acontece depois do diagnóstico?</summary>
                    <p>Você sai com o mapa dos seus indicadores e o plano de ação. Se houver fit para trabalhar junto, apresentamos o programa. Você decide depois, sem pressão.</p>
                </details>
            </div>
        </section>

        <section class="final-cta-section">
            <div class="container padding-section final-cta-box">
                <h2 class="section-title light">Pronto para descobrir onde sua empresa está perdendo venda?</h2>
                <p>Diagnóstico comercial 1:1 com Vitor ou João. Zero custo. Vagas limitadas por semana.</p>
                <button class="btn-conversao-extrema abrir-modal-consultoria" type="button">Quero meu diagnóstico gratuito</button>
                <span>Dados protegidos · LGPD · Resposta em até 4h úteis</span>
            </div>
        </section>
    </main>

    <div id="exit-intent-popup" class="exit-popup" aria-hidden="true">
        <div class="exit-popup-card">
            <button id="close-exit-popup" class="exit-popup-close" type="button" aria-label="Fechar popup">&times;</button>
            <span class="hero-badge">Antes de sair</span>
            <h3>Você sabe onde sua empresa está perdendo venda?</h3>
            <p>Abra o formulário e saia com um mapa inicial do seu funil comercial.</p>
            <button id="exit-popup-cta" class="btn-conversao-extrema" type="button">Ir para o formulário</button>
        </div>
    </div>

    <?php include '../php/footer.php'; ?>
    <?php include '../pages/formulario_consultoria_modal.php'; ?>

    <script>
        window.WEAGLES_META_PIXEL_ENABLED = <?php echo $metaPixelId !== '' ? 'true' : 'false'; ?>;
    </script>
    <script src="../javascript/formulario_consultoria_wizard.js"></script>
    <script src="../javascript/exit_intent.js"></script>
    <script src="../javascript/quem_somos_carousel.js"></script>
</body>
</html>
