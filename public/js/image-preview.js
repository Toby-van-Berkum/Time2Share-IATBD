document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.querySelector('input[name="image"]');
    if (fileInput) {
        fileInput.addEventListener('change', function (event) {
            const input = event.target;
            const reader = new FileReader();
            
            reader.onload = function () {
                const dataURL = reader.result;
                const imagePreview = document.getElementById('image-preview');
                imagePreview.src = dataURL;
                imagePreview.classList.remove('hidden');
            };
            
            reader.readAsDataURL(input.files[0]);
        });
    }
});