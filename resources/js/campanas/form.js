document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("campaignForm");
    const fechaInicio = document.getElementById("fecha_inicio");
    const fechaFin = document.getElementById("fecha_fin");

    if (form && fechaInicio && fechaFin) {
        form.addEventListener("submit", function (e) {
            if (fechaInicio.value && fechaFin.value) {
                if (new Date(fechaInicio.value) > new Date(fechaFin.value)) {
                    e.preventDefault();
                    alert(
                        "La fecha de fin no puede ser anterior a la fecha de inicio."
                    );
                }
            }
        });

        // Optional: Real-time validation
        fechaFin.addEventListener("change", function () {
            if (fechaInicio.value && this.value) {
                if (new Date(fechaInicio.value) > new Date(this.value)) {
                    alert(
                        "La fecha de fin no puede ser anterior a la fecha de inicio."
                    );
                    this.value = "";
                }
            }
        });

        fechaInicio.addEventListener("change", function () {
            if (fechaFin.value && this.value) {
                if (new Date(this.value) > new Date(fechaFin.value)) {
                    // Just clear end date if start date is moved after it
                    fechaFin.value = "";
                }
            }
        });
    }
});
