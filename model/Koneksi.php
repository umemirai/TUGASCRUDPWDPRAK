<?php

class Koneksi {

    protected $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_petshop");

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
