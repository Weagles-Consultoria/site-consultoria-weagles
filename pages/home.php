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
    <title>Weagles - Transformando Ideias em Resultados</title>
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/home.css"> 
    <link rel="stylesheet" href="../style/header_fixed.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <?php include '../php/header.php'; ?>

    <section class="hero">
        <div class="hero-content">
            <h1>Transformamos ideias em resultados reais.</h1>
            <a href="#blocos" class="cta-button">Conheça nossa abordagem</a>
        </div>
    </section>

<main>
  <section id="blocos" class="container">
    <div class="blocos-grid">
      
    
      <article class="bloco animate-on-scroll">
        <h3>Quem Somos</h3>
        <p>
          Somos a Weagles Consultoria e Tecnologia, fundada em 2024 em Monte Alto/SP, especializada em soluções de inteligência artificial e estratégia empresarial para otimizar processos e maximizar resultados.
        </p>
        <div class="logos-grid">
          <i class="fa-solid fa-users" title="Equipe"></i>
          <i class="fa-solid fa-handshake" title="Parcerias"></i>
          <i class="fa-solid fa-globe" title="Brasil"></i>
        </div>
      </article>
      
      
      <article class="bloco animate-on-scroll">
        <h3>Nossa Missão</h3>
        <p>
          Capacitar empresas a otimizar processos comerciais e acelerar resultados por meio de agentes de IA personalizados, que automatizam tarefas e geram insights valiosos para decisões estratégicas.
        </p>
        <div class="logos-grid">
          <i class="fa-solid fa-bullseye" title="Foco"></i>
          <i class="fa-solid fa-lightbulb" title="Inovação"></i>
          <i class="fa-solid fa-chart-line" title="Resultados"></i>
        </div>
      </article>
      
      
      <article class="bloco animate-on-scroll">
        <h3>Nossa Visão</h3>
        <p>
            Ser referência nacional em consultoria de IA, quebrando barreiras tecnológicas e promovendo crescimento para nossos clientes, transformando desafios em oportunidades de forma sustentável e ética.
        </p>
        <div class="logos-grid">
          <i class="fa-solid fa-eye" title="Visão"></i>
          <i class="fa-solid fa-binoculars" title="Projeção"></i>
          <i class="fa-solid fa-mountain" title="Ambição"></i>
        </div>
      </article>
      
      
      <article class="bloco animate-on-scroll">
        <h3>O que Fazemos</h3>
        <p>
          Desenvolvemos chatbots, assistentes virtuais, sistemas de análise de dados e automação de processos sob medida, atendendo segmentos como varejo, saúde, finanças e indústria.
        </p>
        <div class="logos-grid">
          <i class="fa-solid fa-robot" title="Automação"></i>
          <i class="fa-solid fa-cogs" title="Processos"></i>
          <i class="fa-solid fa-brain" title="Inteligência"></i>
          <i class="fa-solid fa-chart-bar" title="Métricas"></i>
        </div>
      </article>
      
    </div>
  </section>
</main>

    <?php include '../php/footer.php'; ?>
</body>
</html>