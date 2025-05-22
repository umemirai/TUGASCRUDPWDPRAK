<?php
require_once('../../../model/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = $_POST['id'] ?? null;
    $nama       = $_POST['nama'] ?? null;
    $jenis      = $_POST['jenis'] ?? null;
    $usia       = $_POST['usia'] ?? null;
    $coverLama  = $_POST['cover_lama'] ?? null;

    $coverBaru = $_FILES['cover']['name'] ?? '';
    $coverFinal = $coverLama;

    if ($coverBaru) {
        $ext = pathinfo($coverBaru, PATHINFO_EXTENSION);
        $filename = 'img_' . time() . '.' . $ext;
        $tujuan = '../../../uploads/img/' . $filename;

        if (move_uploaded_file($_FILES['cover']['tmp_name'], $tujuan)) {
            $coverFinal = $filename;
        }
    }

    if (!$id || !$nama || !$jenis || !$usia) {
        header('Location: ../../index.php?module=hewan&page=form-edit&id=' . $id . '&pesan=gagal');
        exit;
    }

    $db = new Database();
    $sql = "UPDATE hewan SET nama_hewan = :nama, jenis = :jenis, usia = :usia, cover = :cover WHERE id = :id";
    $stmt = $db->conn->prepare($sql);
    $result = $stmt->execute([
        ':nama' => $nama,
        ':jenis' => $jenis,
        ':usia' => $usia,
        ':cover' => $coverFinal,
        ':id' => $id
    ]);

    $pesan = $result ? 'sukses' : 'gagal';
    header('Location: ../../index.php?module=hewan&page=form-edit&id=' . $id . '&pesan=' . $pesan);
    exit;

} else {
    header('Location: ../../index.php');
    exit;
}
