import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// displays attached file name when creating a post
document.getElementById('fileInput').addEventListener('change', function() {
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const fileNameSpan = document.getElementById('fileName');
    const fileInput = document.getElementById('fileInput');

    // Check if a file is selected
    if (fileInput.files.length > 0) {
        const fileName = fileInput.files[0].name;
        fileNameSpan.textContent = fileName;
        fileNameDisplay.classList.remove('hidden');
    } else {
        fileNameDisplay.classList.add('hidden');
    }
});