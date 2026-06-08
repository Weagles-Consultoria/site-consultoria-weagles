document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("exit-intent-popup");
    const closeButton = document.getElementById("close-exit-popup");
    const ctaButton = document.getElementById("exit-popup-cta");
    const openWizardButton = document.querySelector(".abrir-modal-consultoria");

    if (!popup) {
        return;
    }

    function openPopup() {
        popup.classList.add("is-visible");
        popup.setAttribute("aria-hidden", "false");
        sessionStorage.setItem("exitIntentShown", "true");
    }

    function closePopup() {
        popup.classList.remove("is-visible");
        popup.setAttribute("aria-hidden", "true");
    }

    document.addEventListener("mouseleave", function (event) {
        if (event.clientY >= 10 || sessionStorage.getItem("exitIntentShown")) {
            return;
        }

        openPopup();
    });

    if (closeButton) {
        closeButton.addEventListener("click", closePopup);
    }

    if (ctaButton) {
        ctaButton.addEventListener("click", function () {
            closePopup();
            if (openWizardButton) {
                openWizardButton.click();
            }
        });
    }
});
