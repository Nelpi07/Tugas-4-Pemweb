<?php
session_start();
if (!isset($_SESSION['data'])) {
    die('Data tidak ditemukan.');
}
$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hasil Pendaftaran</title>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table border="1">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= htmlspecialchars($data['name']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($data['email']) ?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?= htmlspecialchars($data['age']) ?></td>
        </tr>
        <tr>
            <td>Komentar</td>
            <td><?= nl2br(htmlspecialchars($data['comments'])) ?></td>
        </tr>
        <tr>
            <td>Browser</td>
            <td><?= htmlspecialchars($data['browser']) ?></td>
        </tr>
    </table>

    <h2>Isi File</h2>
    <table border="1">
        <tr>
            <th>Baris</th>
            <th>Isi</th>
        </tr>
        <?php foreach ($data['fileContent'] as $lineNumber => $lineContent): ?>
        <tr>
            <td><?= $lineNumber + 1 ?></td>
            <td><?= htmlspecialchars($lineContent) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
