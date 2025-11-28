document.addEventListener("DOMContentLoaded", function () {
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            if (
                confirm(
                    "¿Estás seguro de eliminar esta campaña? Esta acción no se puede deshacer."
                )
            ) {
                this.submit();
            }
        });
    });
});
