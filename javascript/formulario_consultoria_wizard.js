document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal-consultoria-wizard");
    const btnsAbrir = document.querySelectorAll(".abrir-modal-consultoria");
    const btnFechar = document.querySelector(".fechar-wizard");
    
    const steps = document.querySelectorAll(".wizard-step");
    const btnNext = document.getElementById("btn-next");
    const btnPrev = document.getElementById("btn-prev");
    const btnSubmit = document.getElementById("btn-submit");
    const progressBar = document.getElementById("wizard-progress-bar");
    const currentStepText = document.getElementById("current-step");

    let currentStepIndex = 0;

    // Abrir Modal
    btnsAbrir.forEach(btn => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            modal.style.display = "flex";
            resetWizard();
        });
    });

    // Fechar Modal
    if (btnFechar) {
        btnFechar.addEventListener("click", () => {
            modal.style.display = "none";
        });
    }

    // Fechar clicando fora
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

    // Navegação
    btnNext.addEventListener("click", () => {
        if (validateStep(currentStepIndex)) {
            currentStepIndex++;
            updateWizard();
        } else {
            alert("Por favor, preencha o campo obrigatório antes de prosseguir.");
        }
    });

    btnPrev.addEventListener("click", () => {
        currentStepIndex--;
        updateWizard();
    });

    // Opcional: Avançar automaticamente ao selecionar radio buttons (UX)
    const radioInputs = document.querySelectorAll('.wizard-step input[type="radio"]');
    radioInputs.forEach(input => {
        input.addEventListener('change', () => {
            setTimeout(() => {
                if (currentStepIndex < steps.length - 1) {
                    btnNext.click();
                }
            }, 300); // pequeno delay para mostrar a seleção
        });
    });

    function updateWizard() {
        // Esconder todos
        steps.forEach((step, index) => {
            step.style.display = index === currentStepIndex ? "block" : "none";
        });

        // Atualizar Progresso
        const progressPercentage = ((currentStepIndex + 1) / steps.length) * 100;
        progressBar.style.width = progressPercentage + "%";
        currentStepText.textContent = currentStepIndex + 1;

        // Botoes
        btnPrev.style.display = currentStepIndex > 0 ? "block" : "none";
        
        if (currentStepIndex === steps.length - 1) {
            btnNext.style.display = "none";
            btnSubmit.style.display = "block";
        } else {
            btnNext.style.display = "block";
            btnSubmit.style.display = "none";
        }
    }

    function validateStep(index) {
        const currentStepEl = steps[index];
        const requiredInputs = currentStepEl.querySelectorAll("[required]");
        
        if (requiredInputs.length === 0) return true;

        let isValid = true;
        // Se for radio, verifica se algum está checado pelo nome
        const radioGroups = new Set();
        requiredInputs.forEach(input => {
            if (input.type === 'radio') {
                radioGroups.add(input.name);
            } else {
                if (!input.value.trim()) isValid = false;
            }
        });

        radioGroups.forEach(name => {
            const checked = currentStepEl.querySelector(`input[name="${name}"]:checked`);
            if (!checked) isValid = false;
        });

        return isValid;
    }

    function resetWizard() {
        currentStepIndex = 0;
        document.getElementById("form-consultoria-wizard").reset();
        updateWizard();
    }
});