document.getElementById('registrationForm').addEventListener('submit', function (e) {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];

    if (file) {
        const fileSize = file.size / 1024 / 1024; // Convert to MB
        const fileType = file.type;

        if (fileSize > 2) {
            e.preventDefault();
            alert('File terlalu besar, maksimum ukuran adalah 2 MB.');
        }

        if (fileType !== 'text/plain') {
            e.preventDefault();
            alert('Hanya file teks (txt) yang diperbolehkan.');
        }
    } else {
        e.preventDefault();
        alert('Harap unggah file.');
    }
});
