<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Pendaftaran</title>
</head>
<body>
    <h1>Form Pendaftaran</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data" id="registrationForm">
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required minlength="3" maxlength="50"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" required min="18" max="100"><br>
        
        <label for="file">Upload File (txt):</label>
        <input type="file" id="file" name="file" accept=".txt" required><br>
        
        <label for="comments">Komentar:</label>
        <textarea id="comments" name="comments" rows="4" required></textarea><br>
        
        <button type="submit">Submit</button>
    </form>
    <script src="script.js"></script>
</body>
</html>
