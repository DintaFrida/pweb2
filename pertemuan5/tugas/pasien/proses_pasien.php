<?php
require_once '../dbkoneksi.php';

// Initialize variables to avoid undefined index warnings
$kode = $_POST['kode'] ?? '';
$nama = $_POST['nama'] ?? '';
$tmp_lahir = $_POST['tmp_lahir'] ?? '';
$tgl_lahir = $_POST['tgl_lahir'] ?? '';
$gender = $_POST['gender'] ?? '';
$email = $_POST['email'] ?? '';
$alamat = $_POST['alamat'] ?? '';
$kelurahan_id = $_POST['kelurahan_id'] ?? '';
$proses = $_POST['proses'] ?? '';
$id_edit = $_POST['id_edit'] ?? null;
$id_hapus = $_GET['id'] ?? null; // Mendapatkan ID untuk proses hapus dari URL

// Proses Hapus Data
if (isset($id_hapus)) {
    try {
        $sql = "DELETE FROM pasien WHERE id = ?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$id_hapus]);

        if ($stmt->rowCount() > 0) {
            echo "<script>alert('Data pasien berhasil dihapus.'); window.location.href='list_pasien.php';</script>";
        } else {
            echo "<script>alert('Data pasien dengan ID tersebut tidak ditemukan.'); window.location.href='list_pasien.php';</script>";
        }
        exit;

    } catch (PDOException $e) {
        echo "<script>alert('Terjadi kesalahan database saat menghapus data: " . $e->getMessage() . "'); window.location.href='list_pasien.php';</script>";
        exit;
    }
}

// Proses Simpan atau Update Data
if (isset($_POST['proses'])) {
    // Validasi sederhana (Anda bisa menambahkan validasi yang lebih kompleks)
    if (empty($kode) || empty($nama)) {
        echo "<script>alert('Kode dan Nama pasien tidak boleh kosong.'); window.location.href='form_pasien.php';</script>";
        exit;
    }

    try {
        if ($proses == 'simpan') {
            // Proses INSERT
            $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id]);

            echo "<script>alert('Data pasien berhasil disimpan.'); window.location.href='list_pasien.php';</script>";
            exit;

        } elseif ($proses == 'Update' && $id_edit !== null) {
            // Proses UPDATE
            $sql = "UPDATE pasien SET kode = ?, nama = ?, tmp_lahir = ?, tgl_lahir = ?, gender = ?, email = ?, alamat = ?, kelurahan_id = ? WHERE id = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $email, $alamat, $kelurahan_id, $id_edit]);

            echo "<script>alert('Data pasien berhasil diupdate.'); window.location.href='list_pasien.php';</script>";
            exit;

        } else {
            echo "<script>alert('Proses tidak dikenali atau ID edit tidak valid.'); window.location.href='list_pasien.php';</script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<script>alert('Terjadi kesalahan database: " . $e->getMessage() . "'); window.location.href='form_pasien.php';</script>";
        exit;
    }
}

// Jika tidak ada proses yang dikenali
header("Location: list_pasien.php");
exit;
?>