document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');

    if (input && preview) {
        input.addEventListener('change', function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    }
});
