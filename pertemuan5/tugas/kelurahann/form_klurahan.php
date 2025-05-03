<?php
// Koneksi database jika diperlukan
require_once '../dbkoneksi.php';

// Inisialisasi data untuk form (jika ada edit)
$data = [];
if (isset($_GET['id'])) {
    $id_kelurahan = $_GET['id'];
    $sql_edit = "SELECT * FROM kelurahan WHERE id = :id";
    $stmt_edit = $dbh->prepare($sql_edit);
    $stmt_edit->bindParam(':id', $id_kelurahan);
    $stmt_edit->execute();
    $data = $stmt_edit->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Kelurahan - Pink Puskesmas</title>
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
                    <li class="nav-item"><a class="nav-link active" href="../kelurahan/list_kelurahan.php">Kelurahan</a></li>
                    <li class="nav-item"><a class="nav-link" href="../paramedik/list_paramedik.php">Paramedik</a></li>
                    <li class="nav-item"><a class="nav-link" href="../pasien/list_pasien.php">Pasien</a></li>
                    <li class="nav-item"><a class="nav-link" href="../periksa/list_periksa.php">Periksa</a></li>
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
                    <li class="breadcrumb-item"><a href="../kelurahan/list_kelurahan.php">Kelurahan</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?></li>
                </ol>
            </nav>

            <h2><?= isset($_GET['id']) ? 'Edit' : 'Tambah' ?> Data Kelurahan</h2>

            <form method="POST" action="proses_kelurahan.php">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kelurahan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kelurahan" value="<?= $data['nama'] ?? '' ?>" required>
                </div>
                <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

                <button type="submit" class="btn btn-pink" name="proses" value="simpan"><?= isset($_GET['id']) ? 'Update' : 'Simpan' ?></button>
                <a href="../kelurahan/list_kelurahan.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 💕 Puskesmas Pink. Semua hak dilindungi.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>