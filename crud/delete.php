<?php
require_once('../model/Hewan.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hewan = new Hewan();
    $result = $hewan->delete($id);

    if ($result) {
        header('Location: ../index.php?pesan=sukses_hapus');
    } else {
        header('Location: ../index.php?pesan=gagal_hapus');
    }
} else {
    header('Location: ../index.php');
}
