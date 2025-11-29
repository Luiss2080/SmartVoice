document.addEventListener("DOMContentLoaded", function () {
    const photoInput = document.getElementById("photo");
    const avatarPreview = document.getElementById("avatar-preview");
    const avatarPlaceholder = document.getElementById("avatar-placeholder");

    if (photoInput) {
        photoInput.addEventListener("change", function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    avatarPreview.src = e.target.result;
                    avatarPreview.style.display = "block";
                    if (avatarPlaceholder) {
                        avatarPlaceholder.style.display = "none";
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
