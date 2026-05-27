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
    <title>Consultoria - Weagles</title>
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/cons.css">
    <link rel="stylesheet" href="../style/header_fixed.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    <?php include '../php/header.php'; ?>

    <main class="container-consultoria">
        <div class="breadcrumb">
            <p><a href="../pages/home.php">Início</a> > Consultoria</p>
        </div>

        <div class="texto-consultoria">
            <h2>Transformando Desafios em Oportunidades</h2>
            <p>
                No cenário de negócios atual, a capacidade de se adaptar e inovar é crucial. Nossa consultoria é projetada para ser sua parceira estratégica, ajudando sua empresa a navegar pela complexidade do mercado com soluções baseadas em tecnologia e dados. Analisamos profundamente seus processos para identificar gargalos e oportunidades de otimização.
            </p>
        </div>

        <section id="diagrama">
            <div class="diagrama-secao">
                <div class="diagrama-processo">
                    <div class="diagrama-etapa animate-on-scroll">
                        <div class="icon"><i class="fa-solid fa-sliders"></i></div>
                        <h4>Consultoria Personalizada</h4>
                        <p>Nada de soluções genéricas: mergulhamos na realidade do seu negócio para criar, junto com você, uma estratégia de vendas sob medida e realmente eficaz.</p>
                    </div>
                    <div class="diagrama-etapa animate-on-scroll">
                        <div class="icon"><i class="fa-solid fa-bullseye"></i></div>
                        <h4>Time Especialista em Conversão</h4>
                        <p>Transformamos seu time em especialistas em conversão, com treinamentos práticos focados em resultados e técnicas para negociar, fidelizar e superar objeções.</p>
                    </div>
                    <div class="diagrama-etapa animate-on-scroll">
                        <div class="icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                        <h4>Plataforma com Resultados Visíveis</h4>
                        <p>Nossa plataforma permite acompanhar, em tempo real, o desempenho da equipe, analisar estratégias, identificar oportunidades e mensurar o retorno do investimento.</p>
                    </div>
                    <div class="diagrama-etapa animate-on-scroll">
                        <div class="icon"><i class="fa-solid fa-trophy"></i></div>
                        <h4>Hora de Conquistar Resultados</h4>
                        <p>Invista em uma consultoria que entende suas dores, entrega soluções inovadoras e resultados comprovados. Fale conosco e transforme sua equipe!</p>
                    </div>
                </div>
            </div>
        </section>

       
        <section class="depoimentos-container">
            <h2>O que nossos clientes dizem</h2>
            
            <div class="carousel-depoimentos">
                <div class="carousel-track">
                    <div class="carousel-slide">
                        <div class="carousel-imagem">
                            <video controls poster="../image/poster_kasa_langerie.jpg">
                                <source src="../videos/relatoKasaLangeries.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="carousel-texto">
                            <h3>Kasa da Langerie</h3>
                            <h4>Monte Alto/SP</h4>
                            <p>"Desde que implementamos as soluções da Weagles, nosso controle de estoque ficou muito mais preciso e o atendimento ao cliente, mais ágil. Os resultados foram imediatos!"</p>
                        </div>
                    </div>
                    
                    <div class="carousel-slide">
                        <div class="carousel-imagem">
                            <video controls poster="../image/poster_porto_sono.jpg">
                                <source src="../videos/relatoPortoSono.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="carousel-texto">
                            <h3>Porto do Sono</h3>
                            <h4>Jaboticabal/SP</h4>
                            <p>"A consultoria e a plataforma da Weagles transformaram nossa gestão de vendas. Agora temos uma visão clara do desempenho da equipe e conseguimos otimizar nossos processos para vender mais."</p>
                        </div>
                    </div>
                </div>
                
                <button class="carousel-btn prev" onclick="moveSlideDepoimento(-1)">&#10094;</button>
                <button class="carousel-btn next" onclick="moveSlideDepoimento(1)">&#10095;</button>
                
                <div class="carousel-indicators">
                    <span class="dot active" onclick="currentSlideDepoimento(1)"></span>
                    <span class="dot" onclick="currentSlideDepoimento(2)"></span>
                </div>
            </div>
        </section>

        <div class="agendar-consultoria">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="formulario_consultoria.php"><button class="btn-destaque">Agendar Consultoria</button></a>
            <?php else: ?>
                <button class="btn-destaque trigger-login-modal">Agendar Consultoria</button>
            <?php endif; ?>
        </div>
    </main>

    <script>
        // JAVASCRIPT DO CARROSSEL DE DEPOIMENTOS
        let slideIndexDepoimento = 1;
        const trackDepoimento = document.querySelector('.depoimentos-container .carousel-track');
        const slidesDepoimento = document.querySelectorAll('.depoimentos-container .carousel-slide');
        const dotsDepoimento = document.querySelectorAll('.depoimentos-container .dot');
        
        if (slidesDepoimento.length > 0) {
            showSlidesDepoimento(slideIndexDepoimento);
        }

        function moveSlideDepoimento(n) {
            showSlidesDepoimento(slideIndexDepoimento += n);
        }

        function currentSlideDepoimento(n) {
            showSlidesDepoimento(slideIndexDepoimento = n);
        }

        function showSlidesDepoimento(n) {
            if (n > slidesDepoimento.length) { slideIndexDepoimento = 1 }
            if (n < 1) { slideIndexDepoimento = slidesDepoimento.length }
            
            const offset = (slideIndexDepoimento - 1) * -100;
            if (trackDepoimento) {
                trackDepoimento.style.transform = `translateX(${offset}%)`;
            }
            
            dotsDepoimento.forEach(dot => dot.classList.remove("active"));
            if (dotsDepoimento[slideIndexDepoimento - 1]) {
                dotsDepoimento[slideIndexDepoimento - 1].classList.add("active");
            }
        }
    </script>

    <?php include '../php/footer.php'; ?>
</body>
</html>