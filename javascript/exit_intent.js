document.addEventListener("DOMContentLoaded", function () {
    let popupShown = false;
    const modal = document.getElementById("modal-consultoria-wizard");

    // Exit Intent Logic
    document.addEventListener("mouseleave", function (e) {
        // Verifica se o cursor saiu pela parte superior da janela (indicando intenção de fechar/mudar aba)
        // e se o popup ainda não foi mostrado nesta sessão.
        if (e.clientY < 10 && !popupShown && modal) {
            
            // Opcional: Usar sessionStorage para garantir que só mostre 1x por sessão do navegador
            if (!sessionStorage.getItem('exitIntentShown')) {
                modal.style.display = "flex";
                popupShown = true;
                sessionStorage.setItem('exitIntentShown', 'true');
            }
        }
    });
});