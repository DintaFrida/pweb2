<?php
require_once '../dbkoneksi.php';

// Aktifkan error reporting (untuk debugging jika diperlukan)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Tangkap data dari form
$_nama_kelurahan = $_POST['nama'] ?? null;
$_proses = $_POST['proses'] ?? null;

// Proses Hapus
if (isset($_GET['Hapus']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM kelurahan WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    header("Location: list_kelurahan.php");
    exit();
}

// Proses Simpan
if ($_proses === "simpan") {
    $sql = "INSERT INTO kelurahan (nama_kelurahan) VALUES (?)";
    $ar_data = [$_nama_kelurahan];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($ar_data);
    header("Location: list_kelurahan.php");
    exit();
}

// Proses Update
if ($_proses === "Update") {
    $id_edit = $_POST['id_edit'] ?? null;

    if (!$id_edit) {
        die("ID kelurahan tidak ditemukan untuk update.");
    }

    $sql = "UPDATE kelurahan SET nama_kelurahan = ? WHERE id = ?";
    $ar_data = [$_nama_kelurahan, $id_edit];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($ar_data);
    header("Location: list_kelurahan.php");
    exit();
}

// Jika tidak ada proses yang dikenali
die("Proses tidak dikenali. Pastikan tombol yang ditekan adalah Simpan, Update, atau Hapus.");
?>