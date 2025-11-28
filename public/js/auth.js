document.addEventListener("DOMContentLoaded", function () {
    // Add simple animation to form elements
    const formElements = document.querySelectorAll(
        ".form-group, .btn, .auth-links"
    );
    formElements.forEach((el, index) => {
        el.style.opacity = "0";
        el.style.transform = "translateY(20px)";
        el.style.transition = "all 0.5s ease";

        setTimeout(() => {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
        }, 100 * index);
    });

    // Password visibility toggle (if we add an icon later)
    // This is a placeholder for future functionality
});
