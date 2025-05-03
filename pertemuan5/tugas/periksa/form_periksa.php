<?php
// Koneksi database jika diperlukan
require_once '../dbkoneksi.php';

$id = $_GET['id'] ?? '';
$data = [
    'tanggal' => '',
    'berat' => '',
    'tinggi' => '',
    'tensi' => '',
    'keterangan' => '',
    'pasien_id' => '',
    'dokter_id' => ''
];

if ($id) {
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}

$pasien = $dbh->query("SELECT id, nama FROM pasien")->fetchAll(PDO::FETCH_ASSOC);
$dokter = $dbh->query("SELECT id, nama FROM paramedik WHERE kategori = 'dokter'")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? 'Edit' : 'Tambah' ?> Pemeriksaan - Pink Puskesmas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #fff0f5; /* Warna latar belakang pink muda */
        }

        .navbar {
            background-color: #e83e8c; /* Warna navbar pink */
        }

        .navbar-brand, .nav-link {
            color: white !important; /* Warna teks navbar putih */
        }

        .container-fluid {
            padding-top: 20px;
        }

        .form-container {
            background-color: white;
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            color: #e83e8c; /* Warna label pink */
            font-weight: bold;
        }

        .form-control {
            border-color: #f8bbd0; /* Warna border input pink muda */
        }

        .form-select {
            border-color: #f8bbd0; /* Warna border select pink muda */
        }

        .btn-pink {
            background-color: #e83e8c; /* Warna tombol pink */
            color: white; /* Warna teks tombol putih */
            border: none;
        }

        .btn-pink:hover {
            background-color: #d11a69; /* Warna tombol pink lebih gelap saat dihover */
        }

        .btn-secondary {
            background-color: #6c757d; /* Warna tombol kembali abu-abu */
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #545b62; /* Warna tombol kembali lebih gelap saat dihover */
        }

        .footer {
            text-align: center;
            font-size: 14px;
            padding: 20px;
            color: #b03a6f; /* Warna teks footer pink gelap */
            margin-top: 30px;
        }

        .breadcrumb {
            background-color: #ffe4e1; /* Warna latar belakang breadcrumb pink paling muda */
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .breadcrumb-item a {
            color: #e83e8c; /* Warna teks link breadcrumb pink */
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #b03a6f; /* Warna teks breadcrumb aktif pink gelap */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="../halaman_utama/halaman.php">💖 Puskesmas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../halaman_utama/halaman.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="../kelurahan/list_kelurahan.php">Kelurahan</a></li>
                    <li class="nav-item"><a class="nav-link" href="../paramedik/list_paramedik.php">Paramedik</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pasien/list_pasien.php">Pasien</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../periksa/list_periksa.php">Periksa</a></li>
                    <li class="nav-item"><a class="nav-link" href="../unit_kerja/list_unit.php">Unit</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="container form-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../halaman_utama/halaman.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="../periksa/list_periksa.php">Periksa</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $id ? 'Edit' : 'Tambah' ?></li>
                </ol>
            </nav>

            <h2><?= $id ? 'Edit' : 'Tambah' ?> Data Pemeriksaan</h2>

            <form method="POST" action="proses_periksa.php">
                <input type="hidden" name="id_edit" value="<?= htmlspecialchars($id) ?>">

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= htmlspecialchars($data['tanggal']) ?>">
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat (kg)</label>
                    <input type="number" class="form-control" id="berat" name="berat" step="0.1" value="<?= htmlspecialchars($data['berat']) ?>">
                </div>
                <div class="mb-3">
                    <label for="tinggi" class="form-label">Tinggi (cm)</label>
                    <input type="number" class="form-control" id="tinggi" name="tinggi" step="0.1" value="<?= htmlspecialchars($data['tinggi']) ?>">
                </div>
                <div class="mb-3">
                    <label for="tensi" class="form-label">Tensi</label>
                    <input type="text" class="form-control" id="tensi" name="tensi" value="<?= htmlspecialchars($data['tensi']) ?>">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"><?= htmlspecialchars($data['keterangan']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="pasien_id" class="form-label">Pasien</label>
                    <select class="form-select" id="pasien_id" name="pasien_id" required>
                        <option value="">-- Pilih Pasien --</option>
                        <?php foreach ($pasien as $ps): ?>
                            <option value="<?= $ps['id'] ?>" <?= ($ps['id'] == $data['pasien_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($ps['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dokter_id" class="form-label">Dokter</label>
                    <select class="form-select" id="dokter_id" name="dokter_id" required>
                        <option value="">-- Pilih Dokter --</option>
                        <?php foreach ($dokter as $dr): ?>
                            <option value="<?= $dr['id'] ?>" <?= ($dr['id'] == $data['dokter_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($dr['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-pink" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>"><?= $id ? 'Update' : 'Simpan' ?></button>
                <a href="list_periksa.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 💕 Puskesmas Pink. Semua hak dilindungi.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>