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
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/sobre_nos.css">
    <link rel="stylesheet" href="../style/header_fixed.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <title>Weagles - Sobre Nós</title>
</head>
<body>
    <?php include '../php/header.php'; ?>

    <main>
        <div class="main-container">
            <div class="breadcrumb">
                <p><a href = "../pages/home.php">Início</a> > Sobre Nós </p>
                
            </div>
            
            <section class="sobre-nos-container">
                <div class="carousel-track">
                    <div class="carousel-slide">
                        <div class="carousel-imagem">
                            <img src="../image/ceo.jpg" alt="CEO da Weagles">
                        </div>
                        <div class="carousel-texto">
                            <h2>CEO</h2>
                            <h3>Conheça nosso CEO:</h3>
                            <p>
                                João Gabriel Cozentino tem 48 anos e é formado em Análise e Desenvolvimento de Sistemas pela USP. Empresário experiente e visionário, ele também é proprietário da Alimufer, uma das principais empresas de móveis planejados em alumínio da região de Ribeirão Preto. Com uma trajetória sólida no mundo dos negócios e um olhar técnico afiado, ele une seu conhecimento em tecnologia com uma inteligência estratégica admirável.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-slide">
                        <div class="carousel-imagem">
                            <img src="../image/marketing.jpg" alt="Especialista em Marketing">
                        </div>
                        <div class="carousel-texto">
                            <h2>Especialista em Marketing</h2>
                            <h3>Conheça nosso Especialista:</h3>
                            <p>
                                Vitor Augusto Garbim é especialista em marketing digital, formado pela FGV, com mais de 15 anos de experiência em estratégias de comunicação e posicionamento de marca. Sua criatividade e visão inovadora ajudam a Weagles a se destacar no mercado, conectando a empresa ao público certo e impulsionando o crescimento com campanhas impactantes.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-slide">
                        <div class="carousel-imagem">
                            <img src="../image/weaglesSala.jpg" alt="Sala Weagles">
                        </div>
                        <div class="carousel-texto">
                            <h2>Weagles</h2>
                            <h3>Conheça nossa Empresa:</h3>
                            <p>
                                A Weagles é uma empresa especializada em consultoria estratégica e soluções tecnológicas inovadoras. Seu objetivo principal é auxiliar outras empresas a otimizar seus processos comerciais, melhorar seus lucros e aumentar a conversão de leads. A empresa surgiu da necessidade de uma abordagem integrada entre tecnologia e estratégia empresarial, ajudando seus clientes a se tornarem mais eficientes e competitivos no mercado.
                            </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-btn prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="carousel-btn next" onclick="moveSlide(1)">&#10095;</button>
                <div class="carousel-indicators">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </section>

            <a href="consultoria.php" class="btn-consultoria">Agendar Consultoria</a>
        </div>
    </main>

    <script>
        let slideIndex = 1;
        const track = document.querySelector('.carousel-track');
        const slides = document.getElementsByClassName("carousel-slide");
        const dots = document.getElementsByClassName("dot");
        if (slides.length > 0) {
            showSlides(slideIndex);
        }
        function moveSlide(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            const offset = (slideIndex - 1) * -100;
            if (track) {
                track.style.transform = `translateX(${offset}%)`;
            }
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            if (dots[slideIndex-1]) {
                dots[slideIndex-1].className += " active";
            }
        }
    </script>

    <?php include '../php/footer.php'; ?>
</body>
</html>