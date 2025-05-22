<?php
require_once('../model/Hewan.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_hewan'];
    $jenis = $_POST['jenis'];
    $usia = $_POST['usia'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "../img/" . $gambar;
    move_uploaded_file($tmp, $folder);

    $hewan = new Hewan();
    $result = $hewan->simpan($nama, $jenis, $usia, $gambar);

    if ($result) {
        header('Location: ../index.php?pesan=sukses');
    } else {
        header('Location: ../index.php?pesan=gagal');
    }
}
?>
