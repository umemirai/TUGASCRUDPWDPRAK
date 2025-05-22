<?php
include 'database.php';

$db = new Database();
$dataHewan = $db->getDataHewan();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Petshop Sederhana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Petshop Details</h1>
            <p>View and manage petshop animals</p>
            <a href="crud/form-petshop.php" class="add-btn">+ Add Animal</a>
        </div>

        <table class="animal-table">
            <thead>
                <tr>
                    <th>COVER</th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>AGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($dataHewan as $hewan): ?>
                <tr>
                    <td><img src="images/<?= $hewan['gambar'] ?>" class="animal-cover" alt="Image"></td>
                    <td><strong><?= $hewan['nama_hewan'] ?></strong></td>
                    <td class="type"><?= $hewan['jenis'] ?></td>
                    <td><?= $hewan['usia'] ?> years</td>
                    <td>
                    
                    <a href="crud/form-petshop-edit.php?id=<?= $hewan['id'] ?>" class="edit-btn">Edit</a>
                    <a href="crud/delete.php?id=<?= $hewan['id'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
