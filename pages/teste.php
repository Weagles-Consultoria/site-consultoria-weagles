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
  <title>Weagles - Testes</title>
  <link rel="icon" type="image/png" href="../image/favicon-weagles.png">
  <link rel="stylesheet" href="../style/reset1.css">
  <link rel="stylesheet" href="../style/login.css">
  <link rel="stylesheet" href="../style/teste.css"> 
  <link rel="stylesheet" href="../style/header_fixed.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  
</head>
<body>
  <?php include '../php/header.php'; ?>

  <main>
    <div class="main-container"> 
        <div class="breadcrumb">
            <p><a href="../pages/home.php">Início</a> > Nossas IAs</p>
        </div>
        
        <div class="cards-container">
            <div class="card">
                <div class="card-image">
                    <img src="../image/iara.jpg" alt="IARA">
                </div>
                <div class="card-content">
                    <h2 class="card-title">IARA</h2>
                    <p class="card-description">Iara será como sua funcionária dos sonhos!!!. Ela não falta, trabalha 24h e não fica doente. Ela poderá atender seus clientes sempre, com bom humor e simpatia todos os dias.</p>
                    <?php if (!isset($_SESSION['usuario_id'])): ?>
                        <a href="#" class="card-link trigger-login-modal">Teste agora</a>
                    <?php else: ?>
                        <a href="URL_DO_TESTE_DA_IARA" class="card-link" target="_blank">Teste agora</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="../image/iael.jpeg" alt="IAEL">
                </div>
                <div class="card-content">
                    <h2 class="card-title">IAEL</h2>
                    <p class="card-description">Iael é um agente de IA especializado em finanças que monitora receitas, controla despesas e oferece projeções em tempo real para orientar decisões econômicas.</p>
                    <?php if (!isset($_SESSION['usuario_id'])): ?>
                        <a href="#" class="card-link trigger-login-modal">Teste agora</a>
                    <?php else: ?>
                        <a href="https://iaelweagles.flutterflow.app/" class="card-link" target="_blank">Teste agora</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="../image/iago.jpg" alt="IAGO">
                </div>
                <div class="card-content">
                    <h2 class="card-title">IAGO</h2>
                    <p class="card-description">Iago será como seu gerente, ou auxiliar de gerente. Ele terá acesso aos dados, informando sua meta, vendedores destaque e lucro, além de cobrar o time para aumentar a conversão.</p>
                    <?php if (!isset($_SESSION['usuario_id'])): ?>
                        <a href="#" class="card-link trigger-login-modal">Teste agora</a>
                    <?php else: ?>
                        <a href="URL_DO_TESTE_DO_IAGO" class="card-link" target="_blank">Teste agora</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
  </main>
 
  <?php include '../php/footer.php'; ?>
</body>
</html>
