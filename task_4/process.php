<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi Data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $age = (int)$_POST['age'];
    $comments = trim($_POST['comments']);
    $file = $_FILES['file'];

    if (empty($name) || empty($email) || empty($age) || empty($comments) || empty($file)) {
        die('Semua data wajib diisi.');
    }

    if ($file['size'] > 2 * 1024 * 1024) {
        die('Ukuran file terlalu besar (maksimum 2 MB).');
    }

    $fileType = mime_content_type($file['tmp_name']);
    if ($fileType !== 'text/plain') {
        die('Hanya file teks yang diperbolehkan.');
    }

    // Simpan file
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $filePath = $uploadDir . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $filePath);

    // Baca isi file
    $fileContent = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Redirect ke result.php
    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'age' => $age,
        'comments' => $comments,
        'fileContent' => $fileContent,
        'browser' => $_SERVER['HTTP_USER_AGENT']
    ];
    header('Location: result.php');
    exit;
} else {
    die('Akses tidak valid.');
}
