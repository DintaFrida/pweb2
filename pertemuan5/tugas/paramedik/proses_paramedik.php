<?php
require_once '../dbkoneksi.php';

// Ambil data dari form (POST)
$nama        = $_POST['nama'] ?? null;
$gender      = $_POST['gender'] ?? null;
$tmp_lahir   = $_POST['tmp_lahir'] ?? null;
$tgl_lahir   = $_POST['tgl_lahir'] ?? null;
$kategori    = $_POST['kategori'] ?? null;
$telpon      = $_POST['telpon'] ?? null;
$alamat      = $_POST['alamat'] ?? null;
$unitkerja_id  = $_POST['unitkerja_id'] ?? null;
$proses      = $_POST['proses'] ?? null;

// Cek proses simpan/update
if ($proses == "simpan") {
    // Proses INSERT
    $sql = "INSERT INTO paramedik 
            (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unitkerja_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $ar_data = [
        $nama, $gender, $tmp_lahir, $tgl_lahir, 
        $kategori, $telpon, $alamat, $unitkerja_id
    ];


} elseif ($proses == "Update") {
    // Proses UPDATE
    $id_edit = $_POST['id_edit'] ?? null;

    $sql = "UPDATE paramedik SET 
                nama = ?, gender = ?, tmp_lahir = ?, tgl_lahir = ?, 
                kategori = ?, telpon = ?, alamat = ?, unitkerja_id = ?
            WHERE id = ?";
    $ar_data = [
        $nama, $gender, $tmp_lahir, $tgl_lahir, 
        $kategori, $telpon, $alamat, $unitkerja_id, $id_edit
    ];

} elseif (isset($_GET['hapus']) && isset($_GET['id'])) {
    // Proses DELETE
    $id = $_GET['id'];
    $sql = "DELETE FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);

    // Redirect setelah hapus
    header("Location: list_paramedik.php");
    exit;

} else {
    // Jika tidak dikenali prosesnya
    die("Proses tidak dikenali. Pastikan tombol yang ditekan adalah simpan, Update, atau Hapus.");
}

// Eksekusi query untuk simpan/update
$stmt = $dbh->prepare($sql);
$stmt->execute($ar_data);

// Redirect setelah simpan/update
header("Location: list_paramedik.php");
exit;
?>