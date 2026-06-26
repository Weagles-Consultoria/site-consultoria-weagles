<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Marcar Consultoria - WEAGLES</title>
    <link rel="icon" type="image/png" href="../image/favicon-weagles.png">
    <link rel="stylesheet" href="../style/reset1.css">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/formulario_consultoria.css">
    <link rel="stylesheet" href="../style/header_fixed.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
</head>
<body>
    <?php include '../php/header.php'; ?>

    <main>
        <div class="form-container">
            
            <div class="breadcrumb">
                <p><a href="../pages/home.php">Início</a> &gt; <a href="../pages/consultoria.php">Consultoria</a> &gt; Cadastro de Consultoria</p>
            </div>

            <form action="../php/criar_cliente.php" method="POST" class="formulario-consultoria">
                <div class="linha">
                    <div class="campo">
                        <label for="razao">Razão Social</label>
                        <input type="text" id="razao" name="razao" placeholder="Minha Empresa LTDA." required>
                    </div>
                    <div class="campo">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0000-00" required>
                        <span class="erro-cnpj">❌ Insira um CNPJ válido</span>
                    </div>
                </div>
                <div class="linha">
                    <div class="campo">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="exemplo@email.com" required>
                    </div>
                    <div class="campo">
                        <label for="telefone">Telefone/Celular</label>
                        <input type="text" id="telefone" name="telefone" placeholder="+55 (XX) XXXXX-XXXX" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="campo">
                        <label for="area">Área da Empresa</label>
                        <input type="text" id="area" name="area" placeholder="Ex: Marketing" required>
                    </div>
                    <div class="campo">
                        <label for="dor">Dor da Empresa</label>
                        <input type="text" id="dor" name="dor" placeholder="Ex: Processos manuais lentos" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="campo" style="flex:1;">
                        <label for="descricao">Descrição do Problema</label>
                        <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o problema..." required></textarea>
                    </div>
                </div>
                <div class="botao-container">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.formulario-consultoria');
        const formContainer = document.querySelector('.form-container');

        if(form){
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(form);
                const submitButton = form.querySelector('button[type="submit"]');
                
                submitButton.disabled = true;
                submitButton.textContent = 'Enviando...';

                fetch('../php/criar_cliente.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json()) 
                .then(data => {
                    if (data.success) {
                        formContainer.innerHTML = `
                            <div style="text-align: center; padding: 80px 20px; min-height: 300px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <h1 style="font-family: 'Poppins', sans-serif; font-size: 2.5em; color:rgb(255, 255, 255); margin-bottom: 20px;">Dados Enviados com Sucesso!</h1>
                                <p style="font-family: 'Inter', sans-serif; font-size: 1.2em; color:rgb(255, 255, 255);">Sua solicitação foi recebida. Entraremos em contato em breve.</p>
                            </div>
                        `;
                    } else {
                        alert('Erro: ' + data.message);
                        submitButton.disabled = false;
                        submitButton.textContent = 'Enviar';
                    }
                })
                .catch(error => {
                    console.error('Erro de rede:', error);
                    alert('Não foi possível conectar ao servidor. Tente novamente mais tarde.');
                    submitButton.disabled = false;
                    submitButton.textContent = 'Enviar';
                });
            });
        }
    });
    </script>

    <?php include '../php/footer.php'; ?>
</body>
</html>
