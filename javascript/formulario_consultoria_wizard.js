document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("modal-consultoria-wizard");
    const form = document.getElementById("form-consultoria-wizard");

    if (!modal || !form) {
        return;
    }

    const btnsAbrir = document.querySelectorAll(".abrir-modal-consultoria");
    const btnFechar = document.querySelector(".fechar-wizard");
    const progressBar = document.getElementById("wizard-progress-bar");
    const currentStepText = document.getElementById("current-step");
    const initialBodyHtml = form.querySelector(".wizard-body").innerHTML;
    const initialFooterHtml = form.querySelector(".wizard-footer").innerHTML;

    let currentStepIndex = 0;
    let isSubmitting = false;

    btnsAbrir.forEach(function (btn) {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            modal.style.display = "flex";
            restoreWizard();
        });
    });

    if (btnFechar) {
        btnFechar.addEventListener("click", function () {
            modal.style.display = "none";
        });
    }

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    form.addEventListener("submit", async function (event) {
        event.preventDefault();

        if (isSubmitting || !validateStep(getSteps()[currentStepIndex])) {
            return;
        }

        const submitButton = document.getElementById("btn-submit");
        isSubmitting = true;

        if (submitButton) {
            submitButton.disabled = true;
            submitButton.textContent = "Enviando...";
        }

        try {
            const response = await fetch(form.action, {
                method: "POST",
                body: new FormData(form)
            });
            const data = await response.json();

            if (!response.ok || !data.success) {
                throw new Error(data.message || "Não foi possível enviar seus dados.");
            }

            if (typeof window.fbq === "function") {
                window.fbq("track", "Lead");
            }

            const wizardBody = form.querySelector(".wizard-body");
            const wizardFooter = form.querySelector(".wizard-footer");

            wizardBody.innerHTML = `
                <div class="wizard-success">
                    <span class="hero-badge">Diagnóstico solicitado</span>
                    <h4>Recebemos seus dados.</h4>
                    <p>Um especialista da Weagles entra em contato via WhatsApp em até 4h úteis para confirmar sua vaga.</p>
                </div>
            `;
            wizardFooter.innerHTML = '<button type="button" class="btn-conversao-extrema-sm" id="btn-close-success">Fechar</button>';

            const closeBtn = document.getElementById("btn-close-success");
            if (closeBtn) {
                closeBtn.addEventListener("click", function () {
                    modal.style.display = "none";
                    restoreWizard();
                });
            }
        } catch (error) {
            alert(error.message || "Não foi possível enviar o formulário.");
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.textContent = "Quero meu diagnóstico gratuito";
            }
            isSubmitting = false;
        }
    });

    function getSteps() {
        return Array.from(form.querySelectorAll(".wizard-step"));
    }

    function bindWizardControls() {
        const btnNext = document.getElementById("btn-next");
        const btnPrev = document.getElementById("btn-prev");

        if (btnNext) {
            btnNext.addEventListener("click", function () {
                const steps = getSteps();
                if (validateStep(steps[currentStepIndex])) {
                    currentStepIndex += 1;
                    updateWizard();
                    return;
                }

                alert("Preencha o campo obrigatório antes de prosseguir.");
            });
        }

        if (btnPrev) {
            btnPrev.addEventListener("click", function () {
                currentStepIndex -= 1;
                updateWizard();
            });
        }

        form.querySelectorAll('.wizard-step input[type="radio"]').forEach(function (input) {
            input.addEventListener("change", function () {
                window.setTimeout(function () {
                    const nextButton = document.getElementById("btn-next");
                    if (currentStepIndex < getSteps().length - 1 && nextButton) {
                        nextButton.click();
                    }
                }, 220);
            });
        });
    }

    function updateWizard() {
        const steps = getSteps();
        const btnNext = document.getElementById("btn-next");
        const btnPrev = document.getElementById("btn-prev");
        const btnSubmit = document.getElementById("btn-submit");

        steps.forEach(function (step, index) {
            step.style.display = index === currentStepIndex ? "block" : "none";
        });

        progressBar.style.width = (((currentStepIndex + 1) / steps.length) * 100) + "%";
        currentStepText.textContent = String(currentStepIndex + 1);

        if (btnPrev) {
            btnPrev.style.display = currentStepIndex > 0 ? "block" : "none";
        }

        if (btnNext && btnSubmit) {
            if (currentStepIndex === steps.length - 1) {
                btnNext.style.display = "none";
                btnSubmit.style.display = "block";
            } else {
                btnNext.style.display = "block";
                btnSubmit.style.display = "none";
            }
        }
    }

    function validateStep(step) {
        if (!step) {
            return false;
        }

        const requiredInputs = step.querySelectorAll("[required]");
        if (requiredInputs.length === 0) {
            return true;
        }

        let isValid = true;
        const radioGroups = new Set();

        requiredInputs.forEach(function (input) {
            if (input.type === "radio") {
                radioGroups.add(input.name);
            } else if (!input.value.trim()) {
                isValid = false;
            }
        });

        radioGroups.forEach(function (name) {
            if (!step.querySelector(`input[name="${name}"]:checked`)) {
                isValid = false;
            }
        });

        return isValid;
    }

    function restoreWizard() {
        form.reset();
        form.querySelector(".wizard-body").innerHTML = initialBodyHtml;
        form.querySelector(".wizard-footer").innerHTML = initialFooterHtml;
        currentStepIndex = 0;
        isSubmitting = false;
        bindWizardControls();
        updateWizard();
    }

    restoreWizard();
});
