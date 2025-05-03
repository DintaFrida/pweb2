<?php
require_once '../dbkoneksi.php';

// Ambil data dari tabel kelurahan
$sql = "SELECT * FROM klurahan";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kelurahan - Pink Puskesmas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #fff0f5;
        }

        .navbar {
            background-color: #e83e8c;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .container-fluid {
            padding-top: 20px;
        }

        .table {
            background-color: white;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #f8bbd0;
            color: #e83e8c;
            border-bottom: 2px solid #e83e8c;
        }

        .btn-pink {
            background-color: #e83e8c;
            color: white;
            border: none;
        }

        .btn-pink:hover {
            background-color: #d11a69;
        }

        .btn-outline-pink {
            border-color: #e83e8c;
            color: #e83e8c;
        }

        .btn-outline-pink:hover {
            background-color: #e83e8c;
            color: white;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            padding: 20px;
            color: #b03a6f;
            margin-top: 30px;
        }

        .breadcrumb {
            background-color: #ffe4e1;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .breadcrumb-item a {
            color: #e83e8c;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #b03a6f;
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
                <li class="nav-item"><a class="nav-link" href="../pasien/list_pasien.php">Pasien</a></li>
                <li class="nav-item"><a class="nav-link" href="../paramedik/list_paramedik.php">Paramedik</a></li>
                <li class="nav-item"><a class="nav-link" href="../periksa/list_periksa.php">Periksa</a></li>
                <li class="nav-item"><a class="nav-link" href="../unit_kerja/list_unit.php">Unit</a></li>
                <li class="nav-item"><a class="nav-link active" href="list_klurahan.php"ah>Kelurahan</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../halaman_utama/halaman.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelurahan</li>
            </ol>
        </nav>

        <h2>Daftar Kelurahan</h2>
        <a href="form_klurahan.php" class="btn btn-pink mb-3">Tambah Kelurahan</a>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelurahan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($rs as $row){
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama_kelurahan; ?></td>
                        <td>
                            <a href="form_klurahan.php?id=<?= $row->id; ?>" class="btn btn-sm btn-outline-pink">Edit</a>
                            <a href="proses_klurahan.php?Hapus=1&id=<?= $row->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="footer">
    &copy; 2025 💕 Puskesmas Pink. Semua hak dilindungi.
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>