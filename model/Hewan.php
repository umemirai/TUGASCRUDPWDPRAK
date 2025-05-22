<?php
require_once(__DIR__ . '/Koneksi.php');

class Hewan extends Koneksi {

    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        $query = "SELECT * FROM hewan ORDER BY id DESC";
        $result = $this->conn->query($query);

        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function simpan($nama_hewan, $jenis, $usia, $cover) {
        $sql = "INSERT INTO hewan(nama_hewan, jenis, usia, cover) VALUES (?, ?, ?, ?)";
        $query = $this->conn->prepare($sql);
        $query->bind_param("ssis", $nama_hewan, $jenis, $usia, $cover);
        return $query->execute();
    }

    public function edit($id, $nama_hewan, $jenis, $usia, $cover) {
        $sql = "UPDATE hewan SET nama_hewan = ?, jenis = ?, usia = ?, cover = ? WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("ssisi", $nama_hewan, $jenis, $usia, $cover, $id);
        return $query->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM hewan WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        return $query->execute();
    }

    public function get_by_id($id) {
        $sql = "SELECT * FROM hewan WHERE id = ?";
        $query = $this->conn->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();
        return $query->get_result();
    }
}
