function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            const preview = document.getElementById("avatar-preview");
            const placeholder = document.getElementById("avatar-placeholder");

            preview.src = e.target.result;
            preview.style.display = "block";
            if (placeholder) placeholder.style.display = "none";
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Attach to window so it can be called from HTML onclick
window.previewImage = previewImage;
