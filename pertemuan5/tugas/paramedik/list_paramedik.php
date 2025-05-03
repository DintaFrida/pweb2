<?php
require_once '../dbkoneksi.php';

// Query untuk mengambil data paramedik beserta nama unit kerjanya
$sql = "SELECT p.*, nama AS nama_unit 
        FROM paramedik p 
        JOIN unit_kerja u ON p.unitkerja_id = u.id";

// Eksekusi query
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Paramedik - Pink Puskesmas</title>
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

        .table {
            background-color: white; /* Warna latar belakang tabel putih */
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan tipis */
        }

        .table th {
            background-color: #f8bbd0; /* Warna header tabel pink lebih muda */
            color: #e83e8c; /* Warna teks header tabel pink */
            border-bottom: 2px solid #e83e8c; /* Garis bawah header pink */
        }

        .btn-pink {
            background-color: #e83e8c; /* Warna tombol pink */
            color: white; /* Warna teks tombol putih */
            border: none;
        }

        .btn-pink:hover {
            background-color: #d11a69; /* Warna tombol pink lebih gelap saat dihover */
        }

        .btn-outline-pink {
            border-color: #e83e8c; /* Warna border tombol outline pink */
            color: #e83e8c; /* Warna teks tombol outline pink */
        }

        .btn-outline-pink:hover {
            background-color: #e83e8c; /* Warna latar belakang tombol outline pink saat dihover */
            color: white; /* Warna teks tombol outline saat dihover */
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

    
    </div>
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
                    <li class="nav-item"><a class="nav-link" href="../pasien/list_pasien.php">Pasien</a></li>
                    <li class="nav-item"><a class="nav-link active" href="list_paramedik.php">Paramedik</a></li>
                    <li class="nav-item"><a class="nav-link" href="../periksa/list_periksa.php">Periksa</a></li>
                    <li class="nav-item"><a class="nav-link" href="../unit_kerja/list_unit.php">Unit</a></li>
                    <li class="nav-item"><a class="nav-link" href="list_kluran.php">Kelurahan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../halaman_utama/halaman.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Paramedik</li>
                </ol>
            </nav>
            <h2>Daftar Paramedik</h2>
            <a href="form_paramedik.php" class="btn btn-pink mb-3">Tambah Paramedik</a>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Kategori</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Unit Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach($rs as $row){
                    ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->gender ?></td>
                            <td><?= $row->tmp_lahir ?></td>
                            <td><?= $row->tgl_lahir ?></td>
                            <td><?= $row->kategori ?></td>
                            <td><?= $row->telpon ?></td>
                            <td><?= $row->alamat ?></td>
                            <td><?= $row->nama_unit ?></td>
                            <td>
                                <a href="form_paramedik.php?id=<?= $row->id ?>" class="btn btn-sm btn-outline-pink">Edit</a>
                                <a href="proses_paramedik.php?hapus=1&id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
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