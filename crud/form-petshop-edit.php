<?php
require_once('../database.php');
$db = new Database();
$id = $_GET['id'];

$stmt = $db->conn->prepare("SELECT * FROM hewan WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php if ($data): ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Animal</title>
    <link rel="stylesheet" href="styleformpetshop.css">
</head>
<body>

<div class="form-container">
    <h2>Edit Animal</h2>

    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id; ?>">

        <label for="nama_hewan">Name</label>
        <input type="text" name="nama_hewan" value="<?= htmlspecialchars($data['nama_hewan']); ?>" required>

        <label for="jenis">Type</label>
        <input type="text" name="jenis" value="<?= htmlspecialchars($data['jenis']); ?>" required>

        <label for="usia">Age (years)</label>
        <input type="number" name="usia" value="<?= $data['usia']; ?>" required>

        <label for="cover">Cover</label>
        <input type="file" name="cover">
        <small>Current: <?= $data['cover']; ?></small>

        <button type="submit">Update Animal</button>
    </form>
</div>

</body>
</html>
<?php else: ?>
    <p style="text-align: center;">Animal not found.</p>
<?php endif; ?>
